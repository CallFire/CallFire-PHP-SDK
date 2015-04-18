<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class AddNumbersToDncList extends AbstractRequest
{

    /**
     * Update call do not contact list with numbers
     */
    protected $callDnc = null;

    /**
     * Update text do not contact list with numbers
     */
    protected $textDnc = null;

    /**
     * List E.164 11 digit numbers space or comma seperated
     */
    protected $numbers = null;

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

    public function getNumbers()
    {
        return $this->numbers;
    }

    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

}
