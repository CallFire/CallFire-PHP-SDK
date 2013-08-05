<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class UpdateSubscription extends AbstractRequest
{

    public $RequestId = null;

    public $Enabled = null;

    public $Endpoint = null;

    public $NotificationFormat = null;

    public $TriggerEvent = null;

    public $BroadcastId = null;

    public $BatchId = null;

    public $FromNumber = null;

    public $ToNumber = null;

    public $Inbound = null;

}
