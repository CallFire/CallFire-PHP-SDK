<?php

namespace CallFire\Common\Resource;

class Number extends AbstractResource
{

    /**
     * @var string
     */
    protected $number = null;

    /**
     * @var string
     */
    protected $nationalFormat = null;

    /**
     * @var boolean
     */
    protected $tollFree = null;

    /**
     * @var string
     */
    protected $status = null;

    /**
     * @var Region
     */
    protected $region = null;

    /**
     * @var LeaseInfo
     */
    protected $leaseInfo = null;

    /**
     * @var NumberConfiguration
     */
    protected $numberConfiguration = null;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getNationalFormat()
    {
        return $this->nationalFormat;
    }

    public function setNationalFormat($nationalFormat)
    {
        $this->nationalFormat = $nationalFormat;

        return $this;
    }

    public function getTollFree()
    {
        return $this->tollFree;
    }

    public function setTollFree($tollFree)
    {
        $this->tollFree = $tollFree;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    public function getLeaseInfo()
    {
        return $this->leaseInfo;
    }

    public function setLeaseInfo($leaseInfo)
    {
        $this->leaseInfo = $leaseInfo;

        return $this;
    }

    public function getNumberConfiguration()
    {
        return $this->numberConfiguration;
    }

    public function setNumberConfiguration($numberConfiguration)
    {
        $this->numberConfiguration = $numberConfiguration;

        return $this;
    }

}
