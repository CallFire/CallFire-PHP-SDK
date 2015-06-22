<?php

namespace CallFire\Common\Resource;

class Call extends Action
{

    /**
     * @var boolean
     */
    protected $agentCall = null;

    /**
     * @var CallRecord[]
     */
    protected $callRecords = array();

    /**
     * @var Note[]
     */
    protected $notes = array();

    public function getAgentCall()
    {
        return $this->agentCall;
    }

    public function setAgentCall($agentCall)
    {
        $this->agentCall = $agentCall;

        return $this;
    }

    public function getCallRecords()
    {
        return $this->callRecords;
    }

    public function setCallRecords($callRecords)
    {
        $this->callRecords = $callRecords;

        return $this;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

}
