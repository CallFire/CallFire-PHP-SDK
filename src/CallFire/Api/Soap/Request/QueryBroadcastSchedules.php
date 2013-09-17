<?php

namespace CallFire\Api\Soap\Request;

class QueryBroadcastSchedules extends Query
{

    /**
     * @var long
     */
    protected $broadcastId = null;

    public function getBroadcastId()
    {
        return $this->broadcastId;
    }

    public function setBroadcastId($broadcastId)
    {
        $this->broadcastId = $broadcastId;

        return $this;
    }

}
