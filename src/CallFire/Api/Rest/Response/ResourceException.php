<?php
namespace CallFire\Api\Rest\Response;

use CallFire\Api\Rest\Response as AbstractResponse;
use CallFire\Common\Resource;

use CallFire\Common\Hydrator\DOM as DomHydrator;
use Zend\Stdlib\Hydrator\ClassMethods;

use DOMDocument;
use DOMNode;
use LogicException;

class ResourceException extends AbstractResponse
{
    protected $httpStatus;
    
    protected $message;

    protected $xpath;

    protected $hydrator;

    protected $domHydrator;
    
    protected $queryMap;

    public static function fromXml(DOMDocument $document)
    {
        $resourceList = new self;
        $resourceList->loadXml($document);

        return $resourceList;
    }

    public function loadXml(DOMDocument $document, DOMNode $contextNode = null, $cleanup = true)
    {
        if (!($xpath = $this->getXPath())) {
            $xpath = static::createXPath($document);
            $this->setXPath($xpath);
        }
        
        $hydrator = $this->getDomHydrator();
        $methodsHydrator = $this->getHydrator();

        if (!$contextNode) {
            $contextNode = $xpath->query('/r:ResourceException')->item(0);
        }
        
        $data = $hydrator->extract($contextNode);
        $methodsHydrator->hydrate($data, $this);

        if ($cleanup) {
            $this->setXPath(null);
            $this->setDomHydrator(null);
        }
    }
    
    public function getHttpStatus() {
        return $this->httpStatus;
    }
    
    public function setHttpStatus($httpStatus) {
        $this->httpStatus = $httpStatus;
        return $this;
    }
    
    public function getMessage() {
        return $this->message;
    }
    
    public function setMessage($message) {
        $this->message = $message;
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
            if ($queryMap = $this->getQueryMap()) {
                $this->domHydrator->setQuerymap($queryMap);
            }
        }

        return $this->domHydrator;
    }

    public function setDomHydrator($domHydrator)
    {
        $this->domHydrator = $domHydrator;

        return $this;
    }
    
    public function getQueryMap() {
        if(!$this->queryMap) {
            $this->queryMap = array(
                'HttpStatus' => 'r:HttpStatus',
                'Message' => 'r:Message'
            );
        }
        return $this->queryMap;
    }
    
    public function setQueryMap($queryMap) {
        $this->queryMap = $queryMap;
        return $this;
    }
}
