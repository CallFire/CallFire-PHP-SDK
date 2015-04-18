<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateAgentGroup extends AbstractRequest
{

    /**
     * Unique ID of web request to de-dup on
     */
    protected $requestId = null;

    /**
     * Name of Agent
     */
    protected $name = null;

    /**
     * List of AgentIds that belong to this AgentGroup
     */
    protected $agentIds = null;

    /**
     * List of AgentEmails that belong to this AgentGroup
     */
    protected $agentEmails = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

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
