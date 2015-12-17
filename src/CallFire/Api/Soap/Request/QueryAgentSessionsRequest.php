<?php

namespace CallFire\Api\Soap\Request;

class QueryAgentSessionsRequest extends Query
{

    /**
     * @var long
     */
    protected $campaignId = null;

    /**
     * @var long
     */
    protected $agentId = null;

    /**
     * @var string
     */
    protected $agentEmail = null;

    /**
     * @var boolean
     */
    protected $active = null;

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

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

    public function getAgentEmail()
    {
        return $this->agentEmail;
    }

    public function setAgentEmail($agentEmail)
    {
        $this->agentEmail = $agentEmail;

        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

}
