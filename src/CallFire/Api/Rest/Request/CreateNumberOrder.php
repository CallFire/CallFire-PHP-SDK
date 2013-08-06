<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateNumberOrder extends AbstractRequest
{

    /**
     * List E.164 11 digit numbers space seperated
     */
    public $Numbers = null;

    /**
     * List of keywords space seperated
     */
    public $Keywords = null;

    public $localCount = null;

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

    /**
     * Amount of phone numbers to aquire
     */
    public $tollFreeCount = null;

}
