<?php

namespace CallFire\Api\Soap\Result;

class RegionQueryResult extends QueryResult
{

    /**
     * @var Region[]
     */
    protected $regions = array();

    public function getRegions()
    {
        return $this->resources;
    }

    public function setRegions($regions)
    {
        $this->resources = $regions;

        return $this;
    }

    public function addRegion($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
