<?php

namespace CallFire\Api\Soap\Result;

class BroadcastScheduleQueryResult extends QueryResult
{

    /**
     * @var BroadcastSchedule[]
     */
    protected $broadcastSchedules = array();

    public function getBroadcastSchedules()
    {
        return $this->resources;
    }

    public function setBroadcastSchedules($broadcastSchedules)
    {
        $this->resources = $broadcastSchedules;

        return $this;
    }

    public function addBroadcastSchedule($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
