<?php

namespace CallFire\Api\Soap\Result;

use CallFire\Api\Soap\AbstractResult as AbstractResponse;

class GetAgentInviteUriResponse extends AbstractResponse
{

    /**
     * @var anyURI
     */
    protected $agentInviteUri = null;

    /**
     * @var long
     */
    protected $campaignId = null;

    public function getAgentInviteUri()
    {
        return $this->agentInviteUri;
    }

    public function setAgentInviteUri($agentInviteUri)
    {
        $this->agentInviteUri = $agentInviteUri;

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

}
