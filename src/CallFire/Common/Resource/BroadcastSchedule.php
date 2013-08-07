<?php

namespace CallFire\Common\Resource;

class BroadcastSchedule extends AbstractResource
{

    /**
     * @var long
     */
    public $id = null;

    /**
     * @var time
     */
    public $startTimeOfDay = null;

    /**
     * @var time
     */
    public $stopTimeOfDay = null;

    /**
     * @var string
     */
    public $timeZone = null;

    /**
     * @var date
     */
    public $beginDate = null;

    /**
     * @var date
     */
    public $endDate = null;

    /**
     * @var DaysOfWeek
     */
    public $daysOfWeek = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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
