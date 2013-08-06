<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateBroadcastSchedule extends AbstractRequest
{

    public $RequestId = null;

    public $BroadcastId = null;

    /**
     * Earliest time a client can be contacted in the timezone associated with the
     * number's NPA/NXX
     */
    public $StartTimeOfDay = null;

    /**
     * Latest time a client can be contacted in the timezone associated with the
     * number's NPA/NXX
     */
    public $StopTimeOfDay = null;

    /**
     * Time Zone
     */
    public $TimeZone = null;

    /**
     * Start date of Campaign
     */
    public $BeginDate = null;

    /**
     * End date of Campaign
     */
    public $EndDate = null;

    /**
     * Allowable values: [SUNDAY, MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY,
     * SATURDAY]
     */
    public $DaysOfWeek = null;

}
