<?php

namespace CallFire\Api\Soap\Request;

class QueryDncListsRequest extends Query
{

    /**
     * @var long
     */
    protected $campaignId = null;

    /**
     * @var string
     */
    protected $name = null;

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

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

}
