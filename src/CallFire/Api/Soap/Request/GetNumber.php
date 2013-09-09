<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class GetNumber extends AbstractRequest
{

    /**
     * @var data:PhoneNumber
     */
    protected $number = null;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

}
