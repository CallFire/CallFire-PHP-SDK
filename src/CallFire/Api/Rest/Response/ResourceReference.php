<?php
namespace CallFire\Api\Rest\Response;

use CallFire\Api\Rest\Response as AbstractResponse;
use CallFire\Common\Response\ResourceReferenceInterface;

use DOMDocument;
use DOMNode;

class ResourceReference extends AbstractResponse implements ResourceReferenceInterface
{
    protected $id;

    protected $location;

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
            $contextNode = $xpath->query('/r:ResourceReference')->item(0);
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    public function getQueryMap()
    {
        if (!$this->queryMap) {
            $this->queryMap = array(
                'Id' => 'r:Id',
                'Location' => 'r:Location'
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
