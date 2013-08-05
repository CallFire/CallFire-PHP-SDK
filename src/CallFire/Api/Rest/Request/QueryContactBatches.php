<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryContactBatches extends AbstractRequest
{

    public $MaxResults = null;

    public $FirstResult = null;

    public $BroadcastId = null;

}
