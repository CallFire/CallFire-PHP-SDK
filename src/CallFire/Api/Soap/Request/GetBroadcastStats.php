<?php

namespace CallFire\Api\Soap\Request;

class GetBroadcastStats extends IdRequest
{

    /**
     * @var dateTime
     */
    protected $intervalBegin = null;

    /**
     * @var dateTime
     */
    protected $intervalEnd = null;

    public function getIntervalBegin()
    {
        return $this->intervalBegin;
    }

    public function setIntervalBegin($intervalBegin)
    {
        $this->intervalBegin = $intervalBegin;

        return $this;
    }

    public function getIntervalEnd()
    {
        return $this->intervalEnd;
    }

    public function setIntervalEnd($intervalEnd)
    {
        $this->intervalEnd = $intervalEnd;

        return $this;
    }

}
