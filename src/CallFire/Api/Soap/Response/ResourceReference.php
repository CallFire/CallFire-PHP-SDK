<?php
namespace CallFire\Api\Soap\Response;

use CallFire\Api\Soap\AbstractResult as AbstractResponse;
use CallFire\Common\Response\ResourceReferenceInterface;

class ResourceReference extends AbstractResponse implements ResourceReferenceInterface
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
