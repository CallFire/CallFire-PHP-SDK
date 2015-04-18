<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateBroadcastSchedule extends AbstractRequest
{

    protected $requestId = null;

    /**
     * Earliest time a client can be contacted in the timezone associated with the
     * number's NPA/NXX
     */
    protected $startTimeOfDay = null;

    /**
     * Latest time a client can be contacted in the timezone associated with the
     * number's NPA/NXX
     */
    protected $stopTimeOfDay = null;

    /**
     * Time Zone
     */
    protected $timeZone = null;

    /**
     * Start date of Campaign
     */
    protected $beginDate = null;

    /**
     * End date of Campaign
     */
    protected $endDate = null;

    /**
     * Allowable values: [SUNDAY, MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY,
     * SATURDAY]
     */
    protected $daysOfWeek = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getStartTimeOfDay()
    {
        return $this->startTimeOfDay;
    }

    public function setStartTimeOfDay($startTimeOfDay)
    {
        $this->startTimeOfDay = $startTimeOfDay;

        return $this;
    }

    public function getStopTimeOfDay()
    {
        return $this->stopTimeOfDay;
    }

    public function setStopTimeOfDay($stopTimeOfDay)
    {
        $this->stopTimeOfDay = $stopTimeOfDay;

        return $this;
    }

    public function getTimeZone()
    {
        return $this->timeZone;
    }

    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    public function getBeginDate()
    {
        return $this->beginDate;
    }

    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDaysOfWeek()
    {
        return $this->daysOfWeek;
    }

    public function setDaysOfWeek($daysOfWeek)
    {
        $this->daysOfWeek = $daysOfWeek;

        return $this;
    }

}
