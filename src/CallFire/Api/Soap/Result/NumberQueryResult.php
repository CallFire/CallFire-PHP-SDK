<?php

namespace CallFire\Api\Soap\Result;

class NumberQueryResult extends QueryResult
{

    /**
     * @var Number[]
     */
    protected $numbers = array();

    public function getNumbers()
    {
        return $this->resources;
    }

    public function setNumbers($numbers)
    {
        $this->resources = $numbers;

        return $this;
    }

    public function addNumber($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
