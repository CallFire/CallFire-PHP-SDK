<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateNumberOrder extends AbstractRequest
{

    /**
     * List E.164 11 digit numbers space seperated
     */
    protected $numbers = null;

    /**
     * List of keywords space seperated
     */
    protected $keywords = null;

    protected $localCount = null;

    /**
     * 4-7 digit prefix
     */
    protected $prefix = null;

    /**
     * Name of a city
     */
    protected $city = null;

    /**
     * State abbreviation
     */
    protected $state = null;

    /**
     * 5 digit zipcode
     */
    protected $zipcode = null;

    /**
     * 2 digit country code
     */
    protected $country = null;

    /**
     * Lata
     */
    protected $lata = null;

    protected $rateCenter = null;

    /**
     * Latitude
     */
    protected $latitude = null;

    /**
     * Longitude
     */
    protected $longitude = null;

    protected $timeZone = null;

    /**
     * Amount of phone numbers to aquire
     */
    protected $tollFreeCount = null;

    public function getNumbers()
    {
        return $this->numbers;
    }

    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getLocalCount()
    {
        return $this->localCount;
    }

    public function setLocalCount($localCount)
    {
        $this->localCount = $localCount;

        return $this;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getLata()
    {
        return $this->lata;
    }

    public function setLata($lata)
    {
        $this->lata = $lata;

        return $this;
    }

    public function getRateCenter()
    {
        return $this->rateCenter;
    }

    public function setRateCenter($rateCenter)
    {
        $this->rateCenter = $rateCenter;

        return $this;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getTimeZone()
    {
        return $this->timeZone;
    }

    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    public function getTollFreeCount()
    {
        return $this->tollFreeCount;
    }

    public function setTollFreeCount($tollFreeCount)
    {
        $this->tollFreeCount = $tollFreeCount;

        return $this;
    }

}
