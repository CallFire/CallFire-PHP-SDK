<?php

namespace CallFire\Common\Resource;

class Keyword extends AbstractResource
{

    /**
     * @var string
     */
    protected $shortCode = null;

    /**
     * @var string
     */
    protected $keyword = null;

    /**
     * @var string
     */
    protected $status = null;

    /**
     * @var LeaseInfo
     */
    protected $leaseInfo = null;

    public function getShortCode()
    {
        return $this->shortCode;
    }

    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;

        return $this;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

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

    public function getLeaseInfo()
    {
        return $this->leaseInfo;
    }

    public function setLeaseInfo($leaseInfo)
    {
        $this->leaseInfo = $leaseInfo;

        return $this;
    }

}
