<?php

namespace CallFire\Api\Soap\Result;

class GetCccTransferNumbersResponse extends QueryResult
{

    /**
     * @var TransferNumber[]
     */
    protected $transferNumbers = array();

    public function getTransferNumbers()
    {
        return $this->resources;
    }

    public function setTransferNumbers($transferNumbers)
    {
        $this->resources = $transferNumbers;

        return $this;
    }

    public function addTransferNumber($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
