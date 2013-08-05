<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class SearchAvailableNumbers extends AbstractRequest
{

    public $Prefix = null;

    public $City = null;

    public $State = null;

    public $Zipcode = null;

    public $Country = null;

    public $Lata = null;

    public $RateCenter = null;

    public $Latitude = null;

    public $Longitude = null;

    public $TimeZone = null;

    public $TollFree = null;

    public $Count = null;

}
