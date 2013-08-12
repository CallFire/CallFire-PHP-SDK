<?php

namespace CallFire\Common\Resource;

class NumberOrder extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $status = null;

    /**
     * @var dateTime
     */
    protected $created = null;

    /**
     * @var float
     */
    protected $totalCost = null;

    /**
     * @var string
     */
    protected $localNumbers = null;

    /**
     * @var string
     */
    protected $tollFreeNumbers = null;

    /**
     * @var string
     */
    protected $keywords = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    public function getTotalCost()
    {
        return $this->totalCost;
    }

    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;

        return $this;
    }

    public function getLocalNumbers()
    {
        return $this->localNumbers;
    }

    public function setLocalNumbers($localNumbers)
    {
        $this->localNumbers = $localNumbers;

        return $this;
    }

    public function getTollFreeNumbers()
    {
        return $this->tollFreeNumbers;
    }

    public function setTollFreeNumbers($tollFreeNumbers)
    {
        $this->tollFreeNumbers = $tollFreeNumbers;

        return $this;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

}
