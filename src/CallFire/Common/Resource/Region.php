<?php

namespace CallFire\Common\Resource;

class Region extends AbstractResource
{

    /**
     * @var string
     */
    public $prefix = null;

    /**
     * @var string
     */
    public $city = null;

    /**
     * @var string
     */
    public $state = null;

    /**
     * @var string
     */
    public $zipcode = null;

    /**
     * @var string
     */
    public $country = null;

    /**
     * @var string
     */
    public $lata = null;

    /**
     * @var string
     */
    public $rateCenter = null;

    /**
     * @var float
     */
    public $latitude = null;

    /**
     * @var float
     */
    public $longitude = null;

    /**
     * @var string
     */
    public $timeZone = null;

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

}
