<?php

namespace CallFire\Api\Soap\Structure;

class BulkLocal
{

    /**
     * @var int
     */
    protected $count = null;

    /**
     * @var Region
     */
    protected $region = null;

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

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
