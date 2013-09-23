<?php

namespace CallFire\Api\Soap\Request;

class RegionQuery extends Query
{

    /**
     * @var Region
     */
    protected $region = null;

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

}
