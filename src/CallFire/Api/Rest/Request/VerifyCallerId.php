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
     * 4-digit verification code that was sent to phone number in CallerId
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
