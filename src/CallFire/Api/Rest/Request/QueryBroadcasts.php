<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryBroadcasts extends AbstractRequest
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
     * Allowable values: [VOICE, IVR, TEXT, CCC]
     */
    protected $type = null;

    /**
     * Filter on running Broadcasts
     */
    protected $running = null;

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

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getRunning()
    {
        return $this->running;
    }

    public function setRunning($running)
    {
        $this->running = $running;

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
