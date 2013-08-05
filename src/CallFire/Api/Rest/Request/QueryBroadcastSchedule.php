<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryBroadcastSchedule extends AbstractRequest
{

    public $MaxResults = null;

    public $FirstResult = null;

    public $BroadcastId = null;

}
