<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class BroadcastRequest extends AbstractRequest
{

    /**
     * @var anyURI
     */
    protected $requestId = null;

    /**
     * @var Broadcast
     */
    protected $broadcast = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getBroadcast()
    {
        return $this->broadcast;
    }

    public function setBroadcast($broadcast)
    {
        $this->broadcast = $broadcast;

        return $this;
    }

}
