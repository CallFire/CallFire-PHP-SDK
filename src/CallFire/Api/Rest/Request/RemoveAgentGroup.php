<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class RemoveAgentGroup extends AbstractRequest
{

    /**
     * Unique ID of campaign
     */
    protected $campaignId = null;

    /**
     * Unique ID of resource
     */
    protected $id = null;

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

}
