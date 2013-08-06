<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryTexts extends AbstractRequest
{

    /**
     * Max number of results to return limited to 1000 (default: 1000)
     */
    public $MaxResults = null;

    /**
     * Start of next result set (default: 0)
     */
    public $FirstResult = null;

    /**
     * BroadcastId to query on
     */
    public $BroadcastId = null;

    /**
     * BatchId to query on
     */
    public $BatchId = null;

    /**
     * List of Action States to query on
     */
    public $State = null;

    /**
     * List of Results to query on
     */
    public $Result = null;

    /**
     * Is call inbound
     */
    public $Inbound = null;

    /**
     * Beginning of DateTime interval to search on
     */
    public $IntervalBegin = null;

    /**
     * End of DateTime interval to search on
     */
    public $IntervalEnd = null;

    /**
     * E.164 11 digit number
     */
    public $FromNumber = null;

    /**
     * E.164 11 digit number
     */
    public $ToNumber = null;

    /**
     * Label that result must have to be included
     */
    public $LabelName = null;

}
