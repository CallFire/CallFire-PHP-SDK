<?php

namespace CallFire\Common\Resource;

class NumberOrderItem extends AbstractResource
{

    /**
     * @var int
     */
    public $ordered = null;

    /**
     * @var float
     */
    public $unitCost = null;

    /**
     * @var Fulfilled
     */
    public $fulfilled = null;

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
