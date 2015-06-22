<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryTexts extends AbstractRequest
{

    /**
     * Max number of results to return limited to 1000 (default: 1000)
     */
    protected $maxResults = null;

    /**
     * Start of next result set (default: 0)
     */
    protected $firstResult = null;

    /**
     * BroadcastId to query on
     */
    protected $broadcastId = null;

    /**
     * BatchId to query on
     */
    protected $batchId = null;

    /**
     * List of Action States to query on
     *
     * Allowable values: [READY, SELECTED, CALLBACK, DISABLED, FINISHED, DNC, DUP,
     * INVALID, TIMEOUT]
     */
    protected $state = null;

    /**
     * List of Results to query on
     *
     * Allowable values: [LA, AM, BUSY, DNC, XFER, XFER_LEG, NO_ANS, UNDIALED, SENT,
     * RECEIVED, DNT, TOO_BIG, INTERNAL_ERROR, CARRIER_ERROR, CARRIER_TEMP_ERROR, SD,
     * POSTPONED, ABANDONED, SKIPPED]
     */
    protected $result = null;

    /**
     * Is call inbound
     */
    protected $inbound = null;

    /**
     * Beginning of DateTime interval to search on
     */
    protected $intervalBegin = null;

    /**
     * End of DateTime interval to search on
     */
    protected $intervalEnd = null;

    /**
     * E.164 11 digit number
     */
    protected $fromNumber = null;

    /**
     * E.164 11 digit number
     */
    protected $toNumber = null;

    /**
     * Label that result must have to be included
     */
    protected $labelName = null;

    public function getMaxResults()
    {
        return $this->maxResults;
    }

    public function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;

        return $this;
    }

    public function getFirstResult()
    {
        return $this->firstResult;
    }

    public function setFirstResult($firstResult)
    {
        $this->firstResult = $firstResult;

        return $this;
    }

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

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;

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
