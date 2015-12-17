<?php

namespace CallFire\Api\Soap\Request;

class ControlCccCampaignRequest extends IdRequest
{

    /**
     * @var anyURI
     */
    protected $requestId = null;

    /**
     * @var string
     */
    protected $command = null;

    /**
     * @var int
     */
    protected $maxActive = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getCommand()
    {
        return $this->command;
    }

    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    public function getMaxActive()
    {
        return $this->maxActive;
    }

    public function setMaxActive($maxActive)
    {
        $this->maxActive = $maxActive;

        return $this;
    }

}
