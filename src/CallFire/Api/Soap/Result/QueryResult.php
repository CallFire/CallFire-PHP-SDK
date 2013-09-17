<?php

namespace CallFire\Api\Soap\Result;

use CallFire\Api\Soap\Response;

abstract class QueryResult extends Response\ResourceList
{

    /**
     * @var long
     */
    protected $totalResults = null;

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;

        return $this;
    }

}
