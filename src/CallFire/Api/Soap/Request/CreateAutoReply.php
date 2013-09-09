<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class CreateAutoReply extends AbstractRequest
{

    /**
     * @var anyURI
     */
    protected $requestId = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

}
