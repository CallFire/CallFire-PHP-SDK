<?php
namespace CallFire\Api\Rest\Response;

use CallFire\Api\Rest\Response as AbstractResponse;
use CallFire\Common\Resource;

use CallFire\Common\Hydrator\DOM as DomHydrator;
use Zend\Stdlib\Hydrator\ClassMethods;

use DOMDocument;
use DOMXPath;
use DOMNode;
use LogicException;
use Iterator;

class ResourceList extends AbstractResponse implements Iterator
{
    protected $resources = array();
    
    protected $xpath;
    
    protected $hydrator;
    
    protected $domHydrator;
    
    protected $queryMap;
    
    protected $iteratorValid = false;

    public static function fromXml(DOMDocument $document)
    {
        $resourceList = new self;
        $resourceList->loadXml($document);
        
        return $resourceList;
    }
    
    public function loadXml(DOMDocument $document, DOMNode $contextNode = null, $cleanup = true)
    {
        if(!($xpath = $this->getXPath())) {
            $xpath = static::createXPath($document);
            $this->setXPath($xpath);
        }
        
        if(!$contextNode) {
            $contextNode = $xpath->query('/r:ResourceList')->item(0);
        }
        
        $resourceNodes = $xpath->query('*', $contextNode);
        
        foreach($resourceNodes as $resourceNode) {
            $resource = $this->parseResourceNode($resourceNode);
            if($resource instanceof Resource\AbstractResource) {
                $this->addResource($resource);
            }
        }
        
        if($cleanup) {
            $this->setXPath(null);
            $this->setDomHydrator(null);
        }
    }
    
    public function parseResourceNode(DOMNode $resourceNode)
    {
        $xpath = $this->getXPath();
        $hydrator = $this->getDomHydrator();
        $methodsHydrator = $this->getHydrator();
        
        $queryMap = $this->getQueryMap();
        if(!$queryMap) {
            throw new LogicException('Unable to access query map');
        }
        
        $resourceName = $resourceNode->nodeName;
        if(!isset($queryMap[$resourceName])) {
            return false;
        }
        $resourceMap = $queryMap[$resourceName];
        $hydrator->setQueryMap($resourceMap);
        
        $childResourceMap = array();
        foreach($resourceMap as $key => $query) {
            if(substr($key, 0, 1) == '#') {
                unset($resourceMap[$key]);
                $childResourceMap[substr($key, 1)] = $query;
            }
        }
        
        $resourceClassName = "CallFire\\Common\\Resource\\{$resourceName}";
        if(!class_exists($resourceClassName)) {
            return false;
        }
        
        $resourceData = $hydrator->extract($resourceNode);
        $resource = $methodsHydrator->hydrate($resourceData, new $resourceClassName);
        foreach($childResourceMap as $key => $query) {
            $childResourceNode = $xpath->query($query, $resourceNode)->item(0);
            if(!$childResourceNode) {
                continue;
            }
            
            $childResource = $this->parseResourceNode($childResourceNode);
            if(!$childResource) {
                continue;
            }
            
            $methodsHydrator->hydrate(array(
                $key => $childResource
            ), $resource);
        }
        
        return $resource;
    }
    
    public function current()
    {
        return current($this->resources);
    }
    
    public function key()
    {
        return key($this->resources);
    }
    
    public function next()
    {
        $next = next($this->resources);
        $this->iteratorValid = (bool) $next;
        
        return $next;
    }
    
    public function rewind()
    {
        return reset($this->resources);
    }
    
    public function valid()
    {
        return $this->iteratorValid;
    }
    
    public function getResources() {
        return $this->resources;
    }
    
    public function setResources($resources) {
        $this->resources = $resources;
        $this->iteratorValid = !empty($resources);
        return $this;
    }
    
    public function addResource(Resource\AbstractResource $resource) {
        $this->resources[] = $resource;
        $this->iteratorValid = true;
        return $this;
    }
    
    public function getXPath() {
        return $this->xpath;
    }
    
    public function setXPath($xpath) {
        $this->xpath = $xpath;
        return $this;
    }
    
    public function getHydrator() {
        if(!$this->hydrator) {
            $this->hydrator = new ClassMethods;
        }
        return $this->hydrator;
    }
    
    public function setHydrator($hydrator) {
        $this->hydrator = $hydrator;
        return $this;
    }
    
    public function getDomHydrator() {
        if(!$this->domHydrator) {
            $this->domHydrator = new DomHydrator;
            if($xpath = $this->getXPath()) {
                $this->domHydrator->setXPath($xpath);
            }
        }
        return $this->domHydrator;
    }
    
    public function setDomHydrator($domHydrator) {
        $this->domHydrator = $domHydrator;
        return $this;
    }
    
    public function getQueryMap() {
        if(!$this->queryMap) {
            $this->queryMap = static::loadQueryMap();
        }
        return $this->queryMap;
    }
    
    public function setQueryMap($queryMap) {
        $this->queryMap = $queryMap;
        return $this;
    }
    
    private static function loadQueryMap()
    {
        $queryMap = include dirname(__DIR__).'/querymap.php';
        if($queryMap) {
            return $queryMap;
        }
        return null;
    }
}
