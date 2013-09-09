<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class IdRequest extends AbstractRequest
{

    /**
     * @var long
     */
    protected $id = null;

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
