<?php

namespace CallFire\Api\Soap\Result;

class QueryAgentSessionsResponse extends QueryResult
{

    /**
     * @var AgentSession[]
     */
    protected $agentSessions = array();

    public function getAgentSessions()
    {
        return $this->resources;
    }

    public function setAgentSessions($agentSessions)
    {
        $this->resources = $agentSessions;

        return $this;
    }

    public function addAgentSession($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
