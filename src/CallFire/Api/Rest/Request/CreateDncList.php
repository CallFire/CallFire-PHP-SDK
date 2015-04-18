<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateDncList extends AbstractRequest
{

    /**
     * DNC List Name
     */
    protected $name = null;

    /**
     * DNC List Name
     */
    protected $campaignId = null;

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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

        return $this;
    }

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
