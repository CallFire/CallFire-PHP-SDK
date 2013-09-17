<?php
namespace CallFire\Common;

use CallFire\Common\Resource;
use CallFire\Common\Resource\AbstractResource;

use CallFire\Common\Hydrator\DOM as DomHydrator;
use Zend\Stdlib\Hydrator\ClassMethods;

use DOMDocument;
use DOMNode;
use DOMXPath;
use UnexpectedValueException;

abstract class Subscription
{
    const FORMAT_XML = 'xml';
    const FORMAT_JSON = 'json';

    protected static $namespaces = array(
        '_' => 'http://api.callfire.com/data',
        'n' => 'http://api.callfire.com/notification/xsd'
    );

    public static $eventContentTypes = array(
        self::FORMAT_XML => 'text/xml; charset=UTF-8'
    );

    protected $subscriptionId;

    protected $xpath;

    protected $hydrator;

    protected $domHydrator;

    protected $queryMap;

    /**
     * Determines if the request is an event notification,
     * and returns the corresponding format identifier.
     *
     * @static
     * @param  array  $requestData  = null
     * @param  array  $contentTypes = null
     * @return string
     */
    public static function is_event_request($requestData = null, $contentTypes = null)
    {
        if (!$requestData) {
            $requestData = $_SERVER;
        }

        if (!$contentTypes) {
            $contentTypes = static::$eventContentTypes;
        }

        switch (false) { // All of these things must be true
            case isset($requestData['REQUEST_METHOD']):
            case $requestData['REQUEST_METHOD'] == 'POST':
            case isset($requestData['CONTENT_TYPE']):
            case in_array($requestData['CONTENT_TYPE'], $contentTypes):
                return false;
        }

        return array_search($requestData['CONTENT_TYPE'], $contentTypes);
    }

    public static function event($postData, $format)
    {
        switch ($format) {
            case self::FORMAT_XML:
                return static::fromXml($postData);
            case self::FORMAT_JSON:
                return static::fromJson($postData);
        }

        throw new UnexpectedValueException('Event format not recognized');
    }

    public static function fromXml($document)
    {
        $document = static::getXmlDocument($document);

        switch ($document->firstChild->nodeName) {
            case 'n:TextNotification':
                return Subscription\TextNotification::fromXml($document);
            case 'n:CallFinished':
                return Subscription\CallFinished::fromXml($document);
        }

        throw new UnexpectedValueException('Event type not recognized');
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

    public function loadXml(DOMDocument $document, DOMNode $contextNode = null, $cleanup = true)
    {
        if (!($xpath = $this->getXPath())) {
            $xpath = static::createXPath($document);
            $this->setXPath($xpath);
        }

        if (!$contextNode) {
            $contextNode = $xpath->query('/n:*[1]')->item(0);
        }

        $subscriptionId = $xpath->query('n:SubscriptionId', $contextNode)->item(0)->textContent;
        $this->setSubscriptionId($subscriptionId);

        $resourceNode = $xpath->query('_:*[1]', $contextNode)->item(0);
        if ($resourceNode instanceof DOMNode) {
            $resource = $this->parseResourceNode($resourceNode);
            if ($resource instanceof AbstractResource) {
                $this->setResource($resource);
            }
        }

        if ($cleanup) {
            $this->cleanup();
        }
    }

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
        $hydrator->setQueryMap($resourceMap);

        $childResourceMap = array();
        foreach ($resourceMap as $key => $query) {
            if (substr($key, 0, 1) == '#') {
                unset($resourceMap[$key]);
                $childResourceMap[substr($key, 1)] = $query;
            }
        }

        $resourceClassName = "CallFire\Common\Resource\\{$resourceName}";
        if (!class_exists($resourceClassName)) {
            return false;
        }

        $resource = new $resourceClassName;
        $parentClass = get_parent_class($resource);
        if ($parentClass) {
            $parentClass = substr($parentClass, strlen('CallFire\Common\Resource\\'));
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

    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;

        return $this;
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

    abstract public function getResource();

    abstract public function setResource($resource);

    protected function cleanup()
    {
        $this->setXPath(null);
        $this->setDomHydrator(null);
    }

    private static function loadQueryMap()
    {
        $queryMap = include __DIR__.'/../Api/Rest/querymap.php';
        if ($queryMap) {
            return $queryMap;
        }

        return null;
    }
}
