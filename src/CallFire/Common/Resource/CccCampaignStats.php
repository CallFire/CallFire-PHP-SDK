<?php

namespace CallFire\Common\Resource;

class CccCampaignStats extends AbstractResource
{

    /**
     * @var int
     */
    protected $agentCount = null;

    /**
     * @var int
     */
    protected $activeAgentCount = null;

    /**
     * @var int
     */
    protected $callsAttempted = null;

    /**
     * @var int
     */
    protected $callsPlaced = null;

    /**
     * @var int
     */
    protected $callsDuration = null;

    /**
     * @var int
     */
    protected $billedDuration = null;

    /**
     * @var decimal
     */
    protected $billedAmount = null;

    /**
     * @var int
     */
    protected $callsRemaining = null;

    /**
     * @var int
     */
    protected $callsAwaitingRedial = null;

    /**
     * @var int
     */
    protected $callsLiveAnswer = null;

    /**
     * @var int
     */
    protected $responseRatePercent = null;

    /**
     * @var ResultStat[]
     */
    protected $resultStats = array();

    public function getAgentCount()
    {
        return $this->agentCount;
    }

    public function setAgentCount($agentCount)
    {
        $this->agentCount = $agentCount;

        return $this;
    }

    public function getActiveAgentCount()
    {
        return $this->activeAgentCount;
    }

    public function setActiveAgentCount($activeAgentCount)
    {
        $this->activeAgentCount = $activeAgentCount;

        return $this;
    }

    public function getCallsAttempted()
    {
        return $this->callsAttempted;
    }

    public function setCallsAttempted($callsAttempted)
    {
        $this->callsAttempted = $callsAttempted;

        return $this;
    }

    public function getCallsPlaced()
    {
        return $this->callsPlaced;
    }

    public function setCallsPlaced($callsPlaced)
    {
        $this->callsPlaced = $callsPlaced;

        return $this;
    }

    public function getCallsDuration()
    {
        return $this->callsDuration;
    }

    public function setCallsDuration($callsDuration)
    {
        $this->callsDuration = $callsDuration;

        return $this;
    }

    public function getBilledDuration()
    {
        return $this->billedDuration;
    }

    public function setBilledDuration($billedDuration)
    {
        $this->billedDuration = $billedDuration;

        return $this;
    }

    public function getBilledAmount()
    {
        return $this->billedAmount;
    }

    public function setBilledAmount($billedAmount)
    {
        $this->billedAmount = $billedAmount;

        return $this;
    }

    public function getCallsRemaining()
    {
        return $this->callsRemaining;
    }

    public function setCallsRemaining($callsRemaining)
    {
        $this->callsRemaining = $callsRemaining;

        return $this;
    }

    public function getCallsAwaitingRedial()
    {
        return $this->callsAwaitingRedial;
    }

    public function setCallsAwaitingRedial($callsAwaitingRedial)
    {
        $this->callsAwaitingRedial = $callsAwaitingRedial;

        return $this;
    }

    public function getCallsLiveAnswer()
    {
        return $this->callsLiveAnswer;
    }

    public function setCallsLiveAnswer($callsLiveAnswer)
    {
        $this->callsLiveAnswer = $callsLiveAnswer;

        return $this;
    }

    public function getResponseRatePercent()
    {
        return $this->responseRatePercent;
    }

    public function setResponseRatePercent($responseRatePercent)
    {
        $this->responseRatePercent = $responseRatePercent;

        return $this;
    }

    public function getResultStats()
    {
        return $this->resultStats;
    }

    public function setResultStats($resultStats)
    {
        $this->resultStats = $resultStats;

        return $this;
    }

}
