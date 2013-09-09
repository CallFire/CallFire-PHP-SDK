<?php

namespace CallFire\Api\Soap\Result;

class BroadcastQueryResult extends QueryResult
{

    /**
     * @var Broadcast[]
     */
    protected $broadcasts = array();

    public function getBroadcasts()
    {
        return $this->resources;
    }

    public function setBroadcasts($broadcasts)
    {
        $this->resources = $broadcasts;

        return $this;
    }

    public function addBroadcast($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
