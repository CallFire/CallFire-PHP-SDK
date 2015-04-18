<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class SendVerificationCodeToCallerId extends AbstractRequest
{

    /**
     * Unique ID, used to de-dup requests and make sure request is not processed twice
     */
    protected $requestId = null;

    /**
     * CallerId number to verify
     */
    protected $callerId = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getCallerId()
    {
        return $this->callerId;
    }

    public function setCallerId($callerId)
    {
        $this->callerId = $callerId;

        return $this;
    }

}
