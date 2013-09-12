<?php
namespace CallFire\Api\Rest;

use CallFire\Common\Resource;
use CallFire\Common\Resource\AbstractResource;

use CallFire\Common\Hydrator\DOM as DomHydrator;
use Zend\Stdlib\Hydrator\ClassMethods;

use DOMDocument;
use DOMNode;
use DOMXPath;
use UnexpectedValueException;

abstract class Response
{
    protected static $namespaces = array(
        '_' => 'http://api.callfire.com/data',
        'r' => 'http://api.callfire.com/resource'
    );

    protected $xpath;

    protected $hydrator;

    protected $domHydrator;

    protected $queryMap;

    public static function ns()
    {
        return __CLASS__;
    }

    public static function fromXml($document)
    {
        $document = static::getXmlDocument($document);

        switch ($document->firstChild->nodeName) {
            case 'r:ResourceList':
                return Response\ResourceList::fromXml($document);
            case 'r:Resource':
                return Response\Resource::fromXml($document);
            case 'r:ResourceReference':
                return Response\ResourceReference::fromXml($document);
            case 'r:ResourceException':
                return Response\ResourceException::fromXml($document);
        }

        throw new UnexpectedValueException('Response type not recognized');
    }

    public static function fromJson($data)
    {
        throw new UnexpectedValueException('JSON is not yet supported');
    }

    protected static function getXmlDocument($document)
    {
        if (is_string($document)) {
            $data = $document;
            $document = new DOMDocument;
            $document->loadXML($data);
            unset($data);
        }

        return $document;
    }

    public static function createXPath(DOMDocument $document)
    {
        $xpath = new DOMXPath($document);
        foreach (static::$namespaces as $prefix => $uri) {
            $xpath->registerNamespace($prefix, $uri);
        }

        return $xpath;
    }

    abstract public function loadXml(DOMDocument $document);

    public function parseResourceNode(DOMNode $resourceNode)
    {
        $xpath = $this->getXPath();
        $hydrator = $this->getDomHydrator();
        $methodsHydrator = $this->getHydrator();

        $queryMap = $this->getQueryMap();
        if (!$queryMap) {
            throw new LogicException('Unable to access query map');
        }

        $resourceName = $resourceNode->nodeName;
        if (!isset($queryMap[$resourceName])) {
            return false;
        }
        $resourceMap = $queryMap[$resourceName];

        $childResourceMap = array();
        foreach ($resourceMap as $key => $query) {
            if (substr($key, 0, 1) == '#') {
                unset($resourceMap[$key]);
                $childResourceMap[substr($key, 1)] = $query;
            }
        }

        $resourceClassName = AbstractResource::ns()."\\{$resourceName}";
        if (!class_exists($resourceClassName)) {
            return false;
        }

        $resource = new $resourceClassName;
        $parentClass = get_parent_class($resource);
        if ($parentClass) {
            $parentClass = substr($parentClass, strlen(AbstractResource::ns().'\\'));
            if ($parentClass != 'AbstractResource' && isset($queryMap[$parentClass])) {
                $resourceMap += $queryMap[$parentClass];
            }
        }
        $hydrator->setQueryMap($resourceMap);

        $resourceData = $hydrator->extract($resourceNode);
        $resource = $methodsHydrator->hydrate($resourceData, $resource);
        foreach ($childResourceMap as $key => $query) {
            if (substr($key, 0, 1) == '@') {
                $key = substr($key, 1);
                $unbounded = true;
            } else {
                $unbounded = false;
            }

            $childResourceNodes = $xpath->query($query, $resourceNode);
            if (!$childResourceNodes || $childResourceNodes->length == 0) {
                continue;
            }

            if ($unbounded) {
                $childValue = array();
                foreach ($childResourceNodes as $childResourceNode) {
                    $childResource = $this->parseResourceNode($childResourceNode);
                    if (!$childResource) {
                        continue;
                    }
                    $childValue[] = $childResource;
                }
            } else {
                $childResourceNode = $childResourceNodes->item(0);
                $childValue = $this->parseResourceNode($childResourceNode);
                if (!$childValue) {
                    continue;
                }
            }

            $methodsHydrator->hydrate(array(
                $key => $childValue
            ), $resource);
        }

        return $resource;
    }

    public function getXPath()
    {
        return $this->xpath;
    }

    public function setXPath($xpath)
    {
        $this->xpath = $xpath;

        return $this;
    }

    public function getHydrator()
    {
        if (!$this->hydrator) {
            $this->hydrator = new ClassMethods;
        }

        return $this->hydrator;
    }

    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;

        return $this;
    }

    public function getDomHydrator()
    {
        if (!$this->domHydrator) {
            $this->domHydrator = new DomHydrator;
            if ($xpath = $this->getXPath()) {
                $this->domHydrator->setXPath($xpath);
            }
        }

        return $this->domHydrator;
    }

    public function setDomHydrator($domHydrator)
    {
        $this->domHydrator = $domHydrator;

        return $this;
    }

    public function getQueryMap()
    {
        if (!$this->queryMap) {
            $this->queryMap = static::loadQueryMap();
        }

        return $this->queryMap;
    }

    public function setQueryMap($queryMap)
    {
        $this->queryMap = $queryMap;

        return $this;
    }

    private static function loadQueryMap()
    {
        $queryMap = include __DIR__.'/querymap.php';
        if ($queryMap) {
            return $queryMap;
        }

        return null;
    }
}
