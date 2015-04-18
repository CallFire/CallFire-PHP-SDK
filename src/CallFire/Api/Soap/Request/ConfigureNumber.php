<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class ConfigureNumber extends AbstractRequest
{

    /**
     * @var string
     */
    protected $number = null;

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
