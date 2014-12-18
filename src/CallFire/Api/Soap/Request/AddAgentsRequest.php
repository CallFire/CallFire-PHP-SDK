<?php

namespace CallFire\Api\Soap\Request;

class AddAgentsRequest extends CampaignIdRequest
{

    /**
     * @var string
     */
    protected $agentIds = null;

    public function getAgentIds()
    {
        return $this->agentIds;
    }

    public function setAgentIds($agentIds)
    {
        $this->agentIds = $agentIds;

        return $this;
    }

}
