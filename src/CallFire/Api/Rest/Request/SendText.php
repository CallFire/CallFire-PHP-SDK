<?php

namespace CallFire\Api\Rest\Request;

class SendText extends AbstractRequest
{

    public $RequestId = null;

    public $Type = null;

    public $BroadcastName = null;

    public $To = null;

    public $ScrubBroadcastDuplicates = null;

    public $From = null;

    public $LocalRestrictBegin = null;

    public $LocalRestrictEnd = null;

    public $MaxAttempts = null;

    public $MinutesBetweenAttempts = null;

    public $RetryResults = null;

    public $Message = null;

    public $BigMessageStrategy = null;

}
