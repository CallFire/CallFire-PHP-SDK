<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class ControlBroadcast extends AbstractRequest
{

    /**
     * Unique ID of resource
     */
    protected $id = null;

    protected $requestId = null;

    /**
     * Allowable values: [START, STOP, ARCHIVE]
     */
    protected $command = null;

    /**
     * Max simultaneous calls
     */
    protected $maxActive = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
