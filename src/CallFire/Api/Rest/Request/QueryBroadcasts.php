<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryBroadcasts extends AbstractRequest
{

    /**
     * Max number of results to return limited to 1000 (default: 1000)
     */
    public $MaxResults = null;

    /**
     * Start of next result set (default: 0)
     */
    public $FirstResult = null;

    public $Type = null;

    /**
     * Filter on running Broadcasts
     */
    public $Running = null;

    /**
     * Label that result must have to be included
     */
    public $LabelName = null;

}
