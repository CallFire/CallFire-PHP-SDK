<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class DncNumbersRequest extends AbstractRequest
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var boolean
     */
    protected $callDnc = null;

    /**
     * @var boolean
     */
    protected $textDnc = null;

    /**
     * @var string
     */
    protected $numbers = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

    public function getNumbers()
    {
        return $this->numbers;
    }

    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

}
