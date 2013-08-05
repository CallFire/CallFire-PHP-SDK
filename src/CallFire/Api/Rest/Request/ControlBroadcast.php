<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class ControlBroadcast extends AbstractRequest
{

    public $Id = null;

    public $RequestId = null;

    public $Command = null;

    public $MaxActive = null;

}
