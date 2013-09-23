<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class CreateNumberOrder extends AbstractRequest
{

    /**
     * @var string
     */
    protected $numbers = null;

    /**
     * @var string
     */
    protected $keywords = null;

    /**
     * @var BulkLocal
     */
    protected $bulkLocal = null;

    /**
     * @var BulkTollFree
     */
    protected $bulkTollFree = null;

    public function getNumbers()
    {
        return $this->numbers;
    }

    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

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

    public function getBulkLocal()
    {
        return $this->bulkLocal;
    }

    public function setBulkLocal($bulkLocal)
    {
        $this->bulkLocal = $bulkLocal;

        return $this;
    }

    public function getBulkTollFree()
    {
        return $this->bulkTollFree;
    }

    public function setBulkTollFree($bulkTollFree)
    {
        $this->bulkTollFree = $bulkTollFree;

        return $this;
    }

}
