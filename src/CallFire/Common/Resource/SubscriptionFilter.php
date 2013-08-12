<?php

namespace CallFire\Common\Resource;

class SubscriptionFilter extends AbstractResource
{

    /**
     * @var long
     */
    protected $broadcastId = null;

    /**
     * @var long
     */
    protected $batchId = null;

    /**
     * @var string
     */
    protected $fromNumber = null;

    /**
     * @var string
     */
    protected $toNumber = null;

    /**
     * @var boolean
     */
    protected $inbound = null;

    public function getBroadcastId()
    {
        return $this->broadcastId;
    }

    public function setBroadcastId($broadcastId)
    {
        $this->broadcastId = $broadcastId;

        return $this;
    }

    public function getBatchId()
    {
        return $this->batchId;
    }

    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;

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

    public function getToNumber()
    {
        return $this->toNumber;
    }

    public function setToNumber($toNumber)
    {
        $this->toNumber = $toNumber;

        return $this;
    }

    public function getInbound()
    {
        return $this->inbound;
    }

    public function setInbound($inbound)
    {
        $this->inbound = $inbound;

        return $this;
    }

}
