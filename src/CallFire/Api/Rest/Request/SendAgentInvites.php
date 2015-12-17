<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class SendAgentInvites extends AbstractRequest
{

    /**
     * Unique ID of web request to de-dup on
     */
    protected $requestId = null;

    /**
     * Optional agent group name to add agents to
     */
    protected $agentGroupName = null;

    /**
     * List of agent emails to send invites to
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

    public function getAgentGroupName()
    {
        return $this->agentGroupName;
    }

    public function setAgentGroupName($agentGroupName)
    {
        $this->agentGroupName = $agentGroupName;

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
