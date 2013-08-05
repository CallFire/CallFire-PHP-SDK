<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateContactBatch extends AbstractRequest
{

    public $RequestId = null;

    public $BroadcastId = null;

    public $Name = null;

    public $To = null;

    public $ContactListId = null;

    public $ScrubBroadcastDuplicates = null;

}
