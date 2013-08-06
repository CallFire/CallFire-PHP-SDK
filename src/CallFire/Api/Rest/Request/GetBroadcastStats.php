<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class GetBroadcastStats extends AbstractRequest
{

    /**
     * Beginning of DateTime interval to search on
     */
    public $IntervalBegin = null;

    /**
     * End of DateTime interval to search on
     */
    public $IntervalEnd = null;

}
