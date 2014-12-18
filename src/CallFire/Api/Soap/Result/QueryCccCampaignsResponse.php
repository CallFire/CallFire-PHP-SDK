<?php

namespace CallFire\Api\Soap\Result;

class QueryCccCampaignsResponse extends QueryResult
{

    /**
     * @var CccCampaign[]
     */
    protected $cccCampaigns = array();

    public function getCccCampaigns()
    {
        return $this->resources;
    }

    public function setCccCampaigns($cccCampaigns)
    {
        $this->resources = $cccCampaigns;

        return $this;
    }

    public function addCccCampaign($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
