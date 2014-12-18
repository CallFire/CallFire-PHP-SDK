<?php

namespace CallFire\Api\Soap\Result;

class GetAgentGroupsResponse extends QueryResult
{

    /**
     * @var AgentGroup[]
     */
    protected $agentGroups = array();

    public function getAgentGroups()
    {
        return $this->resources;
    }

    public function setAgentGroups($agentGroups)
    {
        $this->resources = $agentGroups;

        return $this;
    }

    public function addAgentGroup($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
