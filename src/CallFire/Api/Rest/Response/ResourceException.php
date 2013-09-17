<?php
namespace CallFire\Api\Rest\Response;

use CallFire\Api\Rest\Response as AbstractResponse;
use CallFire\Common\Response\ResourceExceptionInterface;

use DOMDocument;
use DOMNode;

class ResourceException extends AbstractResponse implements ResourceExceptionInterface
{
    protected $httpStatus;

    protected $message;

    public static function fromXml($document)
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

        if (!$contextNode) {
            $contextNode = $xpath->query('/r:ResourceException')->item(0);
        }

        $queryMap = $this->getQueryMap();
        $hydrator = $this->getDomHydrator();
        $hydrator->setQueryMap($queryMap);
        $methodsHydrator = $this->getHydrator();

        $data = $hydrator->extract($contextNode);
        $methodsHydrator->hydrate($data, $this);

        if ($cleanup) {
            $this->setXPath(null);
            $this->setDomHydrator(null);
        }
    }

    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    public function setHttpStatus($httpStatus)
    {
        $this->httpStatus = $httpStatus;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getQueryMap()
    {
        if (!$this->queryMap) {
            $this->queryMap = array(
                'HttpStatus' => 'r:HttpStatus',
                'Message' => 'r:Message'
            );
        }

        return $this->queryMap;
    }

    public function setQueryMap($queryMap)
    {
        $this->queryMap = $queryMap;

        return $this;
    }
}
