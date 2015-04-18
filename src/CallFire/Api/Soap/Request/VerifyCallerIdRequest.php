<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class VerifyCallerIdRequest extends AbstractRequest
{

    /**
     * @var string
     */
    protected $callerId = null;

    /**
     * @var string
     */
    protected $verificationCode = null;

    public function getCallerId()
    {
        return $this->callerId;
    }

    public function setCallerId($callerId)
    {
        $this->callerId = $callerId;

        return $this;
    }

    public function getVerificationCode()
    {
        return $this->verificationCode;
    }

    public function setVerificationCode($verificationCode)
    {
        $this->verificationCode = $verificationCode;

        return $this;
    }

}
