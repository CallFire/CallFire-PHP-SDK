<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryBroadcasts extends AbstractRequest
{

    public $MaxResults = null;

    public $FirstResult = null;

    public $Type = null;

    public $Running = null;

    public $LabelName = null;

}
