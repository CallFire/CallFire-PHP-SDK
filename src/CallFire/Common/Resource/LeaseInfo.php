<?php

namespace CallFire\Common\Resource;

class LeaseInfo extends AbstractResource
{

    /**
     * @var date
     */
    protected $leaseBegin = null;

    /**
     * @var date
     */
    protected $leaseEnd = null;

    /**
     * @var boolean
     */
    protected $autoRenew = null;

    public function getLeaseBegin()
    {
        return $this->leaseBegin;
    }

    public function setLeaseBegin($leaseBegin)
    {
        $this->leaseBegin = $leaseBegin;

        return $this;
    }

    public function getLeaseEnd()
    {
        return $this->leaseEnd;
    }

    public function setLeaseEnd($leaseEnd)
    {
        $this->leaseEnd = $leaseEnd;

        return $this;
    }

    public function getAutoRenew()
    {
        return $this->autoRenew;
    }

    public function setAutoRenew($autoRenew)
    {
        $this->autoRenew = $autoRenew;

        return $this;
    }

}
