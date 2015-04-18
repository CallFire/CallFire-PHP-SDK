<?php

namespace CallFire\Api\Soap\Result;

class QueryDncNumbersResponse extends QueryResult
{

    /**
     * @var DncNumber[]
     */
    protected $dncNumbers = array();

    public function getDncNumbers()
    {
        return $this->resources;
    }

    public function setDncNumbers($dncNumbers)
    {
        $this->resources = $dncNumbers;

        return $this;
    }

    public function addDncNumber($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
