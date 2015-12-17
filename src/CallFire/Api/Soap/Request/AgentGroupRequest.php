<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class AgentGroupRequest extends AbstractRequest
{

    /**
     * @var anyURI
     */
    protected $requestId = null;

    /**
     * @var AgentGroup
     */
    protected $agentGroup = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getAgentGroup()
    {
        return $this->agentGroup;
    }

    public function setAgentGroup($agentGroup)
    {
        $this->agentGroup = $agentGroup;

        return $this;
    }

}
