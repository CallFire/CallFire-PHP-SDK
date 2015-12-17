<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class UpdateDncNumber extends AbstractRequest
{

    /**
     * Filter by call do not contact list
     */
    protected $callDnc = null;

    /**
     * Filter by text do not contact list
     */
    protected $textDnc = null;

    public function getCallDnc()
    {
        return $this->callDnc;
    }

    public function setCallDnc($callDnc)
    {
        $this->callDnc = $callDnc;

        return $this;
    }

    public function getTextDnc()
    {
        return $this->textDnc;
    }

    public function setTextDnc($textDnc)
    {
        $this->textDnc = $textDnc;

        return $this;
    }

}
