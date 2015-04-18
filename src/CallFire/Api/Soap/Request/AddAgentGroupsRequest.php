<?php

namespace CallFire\Api\Soap\Request;

class AddAgentGroupsRequest extends CampaignIdRequest
{

    /**
     * @var string
     */
    protected $agentGroupIds = null;

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
