<?php
namespace CallFire\Api\Soap\Response;

use CallFire\Api\Soap\AbstractResult as AbstractResponse;
use CallFire\Common\Resource\AbstractResource;
use CallFire\Common\Response\ResourceInterface;

class Resource extends AbstractResponse implements ResourceInterface
{
    protected $resource;

    public function getResource()
    {
        return $this->resource;
    }

    public function setResource(AbstractResource $resource)
    {
        $this->resource = $resource;

        return $this;
    }
}
