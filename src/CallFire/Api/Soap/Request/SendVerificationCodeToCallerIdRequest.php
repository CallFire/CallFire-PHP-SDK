<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class SendVerificationCodeToCallerIdRequest extends AbstractRequest
{

    /**
     * @var anyURI
     */
    protected $requestId = null;

    /**
     * @var string
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
