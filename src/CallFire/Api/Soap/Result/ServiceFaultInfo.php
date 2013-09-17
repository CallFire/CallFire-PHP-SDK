<?php

namespace CallFire\Api\Soap\Result;

use CallFire\Api\Soap\AbstractResult as AbstractResponse;

class ServiceFaultInfo extends AbstractResponse
{

    /**
     * @var string
     */
    protected $faultCode = null;

    /**
     * @var string
     */
    protected $message = null;

    /**
     * @var string
     */
    protected $detail = null;

    public function getFaultCode()
    {
        return $this->faultCode;
    }

    public function setFaultCode($faultCode)
    {
        $this->faultCode = $faultCode;

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

    public function getDetail()
    {
        return $this->detail;
    }

    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

}
