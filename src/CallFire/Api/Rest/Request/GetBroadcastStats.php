<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class GetBroadcastStats extends AbstractRequest
{

    /**
     * Beginning of DateTime interval to search on
     */
    protected $intervalBegin = null;

    /**
     * End of DateTime interval to search on
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
