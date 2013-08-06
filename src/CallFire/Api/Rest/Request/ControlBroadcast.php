<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class ControlBroadcast extends AbstractRequest
{

    /**
     * Unique ID of resource
     */
    public $Id = null;

    public $RequestId = null;

    public $Command = null;

    /**
     * Max simultaneous calls
     */
    public $MaxActive = null;

}
