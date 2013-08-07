<?php

namespace CallFire\Common\Resource;

abstract class BroadcastConfig extends AbstractResource
{

    /**
     * @var long
     */
    public $id = null;

    /**
     * @var dateTime
     */
    public $created = null;

    /**
     * @var string
     */
    public $fromNumber = null;

    /**
     * @var RetryConfig
     */
    public $retryConfig = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    public function getFromNumber()
    {
        return $this->fromNumber;
    }

    public function setFromNumber($fromNumber)
    {
        $this->fromNumber = $fromNumber;

        return $this;
    }

    public function getRetryConfig()
    {
        return $this->retryConfig;
    }

    public function setRetryConfig($retryConfig)
    {
        $this->retryConfig = $retryConfig;

        return $this;
    }

}
