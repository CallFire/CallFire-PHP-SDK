<?php

namespace CallFire\Api\Soap\Request;

class AddAgentsRequest extends CampaignIdRequest
{

    /**
     * @var string
     */
    protected $agentIds = null;

    /**
     * @var string
     */
    protected $agentEmails = null;

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
