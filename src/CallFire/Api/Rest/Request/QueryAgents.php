<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class QueryAgents extends AbstractRequest
{

    /**
     * Max number of results to return limited to 1000 (default: 1000)
     */
    protected $maxResults = null;

    /**
     * Start of next result set (default: 0)
     */
    protected $firstResult = null;

    /**
     * Unique ID of CCC Campaign
     */
    protected $campaignId = null;

    /**
     * Unique ID of CCC Campaign
     */
    protected $agentEmail = null;

    /**
     * Unique ID of AgentGroup
     */
    protected $agentGroupId = null;

    /**
     * AgentGroup name
     */
    protected $agentGroupName = null;

    /**
     * Agent enabled or not
     */
    protected $enabled = null;

    public function getMaxResults()
    {
        return $this->maxResults;
    }

    public function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;

        return $this;
    }

    public function getFirstResult()
    {
        return $this->firstResult;
    }

    public function setFirstResult($firstResult)
    {
        $this->firstResult = $firstResult;

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

    public function getAgentEmail()
    {
        return $this->agentEmail;
    }

    public function setAgentEmail($agentEmail)
    {
        $this->agentEmail = $agentEmail;

        return $this;
    }

    public function getAgentGroupId()
    {
        return $this->agentGroupId;
    }

    public function setAgentGroupId($agentGroupId)
    {
        $this->agentGroupId = $agentGroupId;

        return $this;
    }

    public function getAgentGroupName()
    {
        return $this->agentGroupName;
    }

    public function setAgentGroupName($agentGroupName)
    {
        $this->agentGroupName = $agentGroupName;

        return $this;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

}
