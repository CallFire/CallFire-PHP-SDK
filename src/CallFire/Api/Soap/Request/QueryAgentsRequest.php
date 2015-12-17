<?php

namespace CallFire\Api\Soap\Request;

class QueryAgentsRequest extends Query
{

    /**
     * @var long
     */
    protected $campaignId = null;

    /**
     * @var string
     */
    protected $agentEmail = null;

    /**
     * @var long
     */
    protected $agentGroupId = null;

    /**
     * @var string
     */
    protected $agentGroupName = null;

    /**
     * @var boolean
     */
    protected $enabled = null;

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
