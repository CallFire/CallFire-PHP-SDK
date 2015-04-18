<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class AddAgentGroups extends AbstractRequest
{

    /**
     * Unique ID of campaign
     */
    protected $campaignId = null;

    /**
     * ID List of AgentGroups
     */
    protected $agentGroupIds = null;

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    public function getAgentGroupIds()
    {
        return $this->agentGroupIds;
    }

    public function setAgentGroupIds($agentGroupIds)
    {
        $this->agentGroupIds = $agentGroupIds;

        return $this;
    }

}
