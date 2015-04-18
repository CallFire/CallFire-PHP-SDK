<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class UpdateDncNumberRequest extends AbstractRequest
{

    /**
     * @var string
     */
    protected $number = null;

    /**
     * @var boolean
     */
    protected $callDnc = null;

    /**
     * @var boolean
     */
    protected $textDnc = null;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getCallDnc()
    {
        return $this->callDnc;
    }

    public function setCallDnc($callDnc)
    {
        $this->callDnc = $callDnc;

        return $this;
    }

    public function getTextDnc()
    {
        return $this->textDnc;
    }

    public function setTextDnc($textDnc)
    {
        $this->textDnc = $textDnc;

        return $this;
    }

}
