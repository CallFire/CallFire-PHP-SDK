<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class CreateBroadcastSchedule extends AbstractRequest
{

    /**
     * @var anyURI
     */
    protected $requestId = null;

    /**
     * @var long
     */
    protected $broadcastId = null;

    /**
     * @var BroadcastSchedule
     */
    protected $broadcastSchedule = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getBroadcastId()
    {
        return $this->broadcastId;
    }

    public function setBroadcastId($broadcastId)
    {
        $this->broadcastId = $broadcastId;

        return $this;
    }

    public function getBroadcastSchedule()
    {
        return $this->broadcastSchedule;
    }

    public function setBroadcastSchedule($broadcastSchedule)
    {
        $this->broadcastSchedule = $broadcastSchedule;

        return $this;
    }

}
