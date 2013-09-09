<?php
namespace CallFire\Api\Rest\Response;

use CallFire\Api\Rest\Response as AbstractResponse;
use CallFire\Common\Resource\AbstractResource;
use CallFire\Common\Response\ResourceListInterface;

use DOMDocument;
use DOMNode;
use ArrayIterator;

class ResourceList extends AbstractResponse implements ResourceListInterface
{
    protected $totalResults = 0;

    protected $resources = array();

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
            $contextNode = $xpath->query('/r:ResourceList')->item(0);
        }

        $totalResults = $xpath->query('@totalResults', $contextNode)->item(0)->textContent;
        $this->setTotalResults($totalResults);

        $resourceNodes = $xpath->query('*', $contextNode);

        foreach ($resourceNodes as $resourceNode) {
            $resource = $this->parseResourceNode($resourceNode);
            if ($resource instanceof AbstractResource) {
                $this->addResource($resource);
            }
        }

        if ($cleanup) {
            $this->setXPath(null);
            $this->setDomHydrator(null);
        }
    }

    public function getIterator()
    {
        return new ArrayIterator($this->getResources());
    }

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;

        return $this;
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
    }

    public function addResource(AbstractResource $resource)
    {
        $this->resources[] = $resource;

        return $this;
    }
}
