<?php

namespace CallFire\Api\Rest\Request;

class CreateContactBatch extends AbstractRequest
{

    public $RequestId = null;

    public $BroadcastId = null;

    public $Name = null;

    public $To = null;

    public $ContactListId = null;

    public $ScrubBroadcastDuplicates = null;

}
