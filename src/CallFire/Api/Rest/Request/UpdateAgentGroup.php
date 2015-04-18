<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class UpdateAgentGroup extends AbstractRequest
{

    /**
     * Unique ID of web request to de-dup on
     */
    protected $requestId = null;

    /**
     * Name of Agent
     */
    protected $name = null;

    /**
     * List of CampaignIds this AgentGroup belongs to
     */
    protected $campaignIds = null;

    /**
     * List of AgentIds that belong to this AgentGroup
     */
    protected $agentIds = null;

    /**
     * List of AgentEmails that belong to this AgentGroup
     */
    protected $agentEmails = null;

    /**
     * Unique ID of Ccc AgentGroup
     */
    protected $agentGroup = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getCampaignIds()
    {
        return $this->campaignIds;
    }

    public function setCampaignIds($campaignIds)
    {
        $this->campaignIds = $campaignIds;

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

    public function getAgentGroup()
    {
        return $this->agentGroup;
    }

    public function setAgentGroup($agentGroup)
    {
        $this->agentGroup = $agentGroup;

        return $this;
    }

}
