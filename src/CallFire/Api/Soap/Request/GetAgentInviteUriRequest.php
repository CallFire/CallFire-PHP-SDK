<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class GetAgentInviteUriRequest extends AbstractRequest
{

    /**
     * @var long
     */
    protected $campaignId = null;

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
