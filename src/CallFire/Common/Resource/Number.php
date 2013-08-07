<?php

namespace CallFire\Common\Resource;

class Number extends AbstractResource
{

    /**
     * @var string
     */
    public $number = null;

    /**
     * @var string
     */
    public $nationalFormat = null;

    /**
     * @var boolean
     */
    public $tollFree = null;

    /**
     * @var string
     */
    public $status = null;

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

}
