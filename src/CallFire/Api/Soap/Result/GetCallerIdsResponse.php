<?php

namespace CallFire\Api\Soap\Result;

class GetCallerIdsResponse extends QueryResult
{

    /**
     * @var string[]
     */
    protected $callerId = null;

    public function getCallerId()
    {
        return $this->callerId;
    }

    public function setCallerId($callerId)
    {
        $this->callerId = $callerId;

        return $this;
    }

}
