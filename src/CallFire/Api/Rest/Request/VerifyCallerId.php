<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class VerifyCallerId extends AbstractRequest
{

    /**
     * CallerId number to verify
     */
    protected $callerId = null;

    /**
     * CallerId number to verify
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
