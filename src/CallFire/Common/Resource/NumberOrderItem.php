<?php

namespace CallFire\Common\Resource;

class NumberOrderItem extends AbstractResource
{

    /**
     * @var int
     */
    protected $ordered = null;

    /**
     * @var float
     */
    protected $unitCost = null;

    /**
     * @var Fulfilled
     */
    protected $fulfilled = null;

    public function getOrdered()
    {
        return $this->ordered;
    }

    public function setOrdered($ordered)
    {
        $this->ordered = $ordered;

        return $this;
    }

    public function getUnitCost()
    {
        return $this->unitCost;
    }

    public function setUnitCost($unitCost)
    {
        $this->unitCost = $unitCost;

        return $this;
    }

    public function getFulfilled()
    {
        return $this->fulfilled;
    }

    public function setFulfilled($fulfilled)
    {
        $this->fulfilled = $fulfilled;

        return $this;
    }

}
