<?php

namespace CallFire\Api\Soap\Request;

class ActionQuery extends Query
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
     * @var boolean
     */
    protected $inbound = null;

    /**
     * @var dateTime
     */
    protected $intervalBegin = null;

    /**
     * @var dateTime
     */
    protected $intervalEnd = null;

    /**
     * @var string
     */
    protected $fromNumber = null;

    /**
     * @var string
     */
    protected $toNumber = null;

    /**
     * @var string
     */
    protected $labelName = null;

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

    public function getInbound()
    {
        return $this->inbound;
    }

    public function setInbound($inbound)
    {
        $this->inbound = $inbound;

        return $this;
    }

    public function getIntervalBegin()
    {
        return $this->intervalBegin;
    }

    public function setIntervalBegin($intervalBegin)
    {
        $this->intervalBegin = $intervalBegin;

        return $this;
    }

    public function getIntervalEnd()
    {
        return $this->intervalEnd;
    }

    public function setIntervalEnd($intervalEnd)
    {
        $this->intervalEnd = $intervalEnd;

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

    public function getLabelName()
    {
        return $this->labelName;
    }

    public function setLabelName($labelName)
    {
        $this->labelName = $labelName;

        return $this;
    }

}
