<?php

namespace CallFire\Api\Soap\Result;

class CallQueryResult extends QueryResult
{

    /**
     * @var Call[]
     */
    protected $calls = array();

    public function getCalls()
    {
        return $this->resources;
    }

    public function setCalls($calls)
    {
        $this->resources = $calls;

        return $this;
    }

    public function addCall($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
