<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class GetCallerIds extends AbstractRequest
{

    /**
     * Max number of results to return limited to 1000 (default: 1000)
     */
    protected $maxResults = null;

    /**
     * Start of next result set (default: 0)
     */
    protected $firstResult = null;

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

}
