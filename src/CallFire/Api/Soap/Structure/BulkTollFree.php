<?php

namespace CallFire\Api\Soap\Structure;

class BulkTollFree
{

    /**
     * @var int
     */
    protected $count = null;

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

}
