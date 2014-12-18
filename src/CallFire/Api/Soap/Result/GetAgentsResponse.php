<?php

namespace CallFire\Api\Soap\Result;

class GetAgentsResponse extends QueryResult
{

    /**
     * @var Agent[]
     */
    protected $agents = array();

    public function getAgents()
    {
        return $this->resources;
    }

    public function setAgents($agents)
    {
        $this->resources = $agents;

        return $this;
    }

    public function addAgent($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
