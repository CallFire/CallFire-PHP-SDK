<?php

namespace CallFire\Common\Resource;

class LocalTimeZoneRestriction extends AbstractResource
{

    /**
     * @var time
     */
    public $beginTime = null;

    /**
     * @var time
     */
    public $endTime = null;

    public function getBeginTime()
    {
        return $this->beginTime;
    }

    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;

        return $this;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

}
