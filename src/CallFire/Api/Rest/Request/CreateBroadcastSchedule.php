<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateBroadcastSchedule extends AbstractRequest
{

    public $RequestId = null;

    public $BroadcastId = null;

    public $StartTimeOfDay = null;

    public $StopTimeOfDay = null;

    public $TimeZone = null;

    public $BeginDate = null;

    public $EndDate = null;

    public $DaysOfWeek = null;

}
