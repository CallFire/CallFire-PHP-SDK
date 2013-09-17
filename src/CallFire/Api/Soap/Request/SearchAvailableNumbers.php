<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class SearchAvailableNumbers extends AbstractRequest
{

    /**
     * @var boolean
     */
    protected $tollFree = null;

    /**
     * @var int
     */
    protected $count = null;

    public function getTollFree()
    {
        return $this->tollFree;
    }

    public function setTollFree($tollFree)
    {
        $this->tollFree = $tollFree;

        return $this;
    }

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
