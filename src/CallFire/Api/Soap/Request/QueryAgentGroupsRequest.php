<?php

namespace CallFire\Api\Soap\Request;

class QueryAgentGroupsRequest extends Query
{

    /**
     * @var long
     */
    protected $campaignId = null;

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var long
     */
    protected $agentId = null;

    /**
     * @var string
     */
    protected $agentEmail = null;

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

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

}
