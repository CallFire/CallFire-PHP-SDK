<?php

namespace CallFire\Common\Resource;

class Call extends Action
{

    /**
     * @var CallRecord[]
     */
    protected $callRecords = array();

    public function getCallRecords()
    {
        return $this->callRecords;
    }

    public function setCallRecords($callRecords)
    {
        $this->callRecords = $callRecords;

        return $this;
    }

}
