<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class GetCccCampaignStats extends AbstractRequest
{

    /**
     * Unique ID of campaign
     */
    protected $campaignId = null;

    /**
     * Beginning of DateTime interval to search on
     */
    protected $intervalBegin = null;

    /**
     * End of DateTime interval to search on
     */
    protected $intervalEnd = null;

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    public function getIntervalBegin()
    {
        return $this->intervalBegin;
    }

    public function setIntervalBegin($intervalBegin)
    {
        $this->intervalBegin = $intervalBegin;

        return $this;
    }

    public function getIntervalEnd()
    {
        return $this->intervalEnd;
    }

    public function setIntervalEnd($intervalEnd)
    {
        $this->intervalEnd = $intervalEnd;

        return $this;
    }

}
