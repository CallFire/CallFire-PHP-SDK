<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryRegions extends AbstractRequest
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
     * 4-7 digit prefix
     */
    public $Prefix = null;

    /**
     * Name of a city
     */
    public $City = null;

    /**
     * State abbreviation
     */
    public $State = null;

    /**
     * 5 digit zipcode
     */
    public $Zipcode = null;

    /**
     * 2 digit country code
     */
    public $Country = null;

    /**
     * Lata
     */
    public $Lata = null;

    public $RateCenter = null;

    /**
     * Latitude
     */
    public $Latitude = null;

    /**
     * Longitude
     */
    public $Longitude = null;

    public $TimeZone = null;

}
