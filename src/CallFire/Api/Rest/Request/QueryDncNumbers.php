<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryDncNumbers extends AbstractRequest
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
     * Prefix (1-10 digits) of numbers
     */
    protected $prefix = null;

    /**
     * DNC List ID
     */
    protected $dncListId = null;

    /**
     * DNC List name
     */
    protected $dncListName = null;

    /**
     * Filter by call do not contact list
     */
    protected $callDnc = null;

    /**
     * Filter by text do not contact list
     */
    protected $textDnc = null;

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

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getDncListId()
    {
        return $this->dncListId;
    }

    public function setDncListId($dncListId)
    {
        $this->dncListId = $dncListId;

        return $this;
    }

    public function getDncListName()
    {
        return $this->dncListName;
    }

    public function setDncListName($dncListName)
    {
        $this->dncListName = $dncListName;

        return $this;
    }

    public function getCallDnc()
    {
        return $this->callDnc;
    }

    public function setCallDnc($callDnc)
    {
        $this->callDnc = $callDnc;

        return $this;
    }

    public function getTextDnc()
    {
        return $this->textDnc;
    }

    public function setTextDnc($textDnc)
    {
        $this->textDnc = $textDnc;

        return $this;
    }

}
