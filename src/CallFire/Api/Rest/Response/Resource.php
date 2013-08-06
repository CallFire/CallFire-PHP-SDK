<?php
namespace CallFire\Api\Rest\Response;

use CallFire\Api\Rest\Response as AbstractResponse;
use CallFire\Common\Resource\AbstractResource;

use CallFire\Common\Hydrator\DOM as DomHydrator;
use Zend\Stdlib\Hydrator\ClassMethods;

use DOMDocument;
use DOMNode;
use LogicException;

class Resource extends AbstractResponse
{
    protected $resource;
    
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

        if (!$contextNode) {
            $contextNode = $xpath->query('/r:Resource')->item(0);
        }

        $resourceNode = $xpath->query('*[1]', $contextNode)->item(0);
        if($resourceNode instanceof DOMNode) {
            $resource = $this->parseResourceNode($resourceNode);
            if ($resource instanceof AbstractResource) {
                $this->setResource($resource);
            }
        }

        if ($cleanup) {
            $this->setXPath(null);
            $this->setDomHydrator(null);
        }
    }
    
    public function getResource() {
        return $this->resource;
    }
    
    public function setResource(AbstractResource $resource) {
        $this->resource = $resource;
        return $this;
    }
}
