<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class AddAgents extends AbstractRequest
{

    /**
     * Unique ID of campaign
     */
    protected $campaignId = null;

    /**
     * ID List of Agents
     */
    protected $agentIds = null;

    /**
     * List of agents by email to add to campaign
     */
    protected $agentEmails = null;

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    public function getAgentIds()
    {
        return $this->agentIds;
    }

    public function setAgentIds($agentIds)
    {
        $this->agentIds = $agentIds;

        return $this;
    }

    public function getAgentEmails()
    {
        return $this->agentEmails;
    }

    public function setAgentEmails($agentEmails)
    {
        $this->agentEmails = $agentEmails;

        return $this;
    }

}
