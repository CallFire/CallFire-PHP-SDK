<?php

namespace CallFire\Common\Resource;

class AgentSession extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var long
     */
    protected $agentId = null;

    /**
     * @var long
     */
    protected $campaignId = null;

    /**
     * @var string
     */
    protected $agentState = null;

    /**
     * @var int
     */
    protected $callCount = null;

    /**
     * @var dateTime
     */
    protected $start = null;

    /**
     * @var dateTime
     */
    protected $lastUpdate = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getAgentId()
    {
        return $this->agentId;
    }

    public function setAgentId($agentId)
    {
        $this->agentId = $agentId;

        return $this;
    }

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    public function getAgentState()
    {
        return $this->agentState;
    }

    public function setAgentState($agentState)
    {
        $this->agentState = $agentState;

        return $this;
    }

    public function getCallCount()
    {
        return $this->callCount;
    }

    public function setCallCount($callCount)
    {
        $this->callCount = $callCount;

        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

}
