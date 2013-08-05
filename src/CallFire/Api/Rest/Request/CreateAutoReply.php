<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateAutoReply extends AbstractRequest
{

    public $RequestId = null;

    public $Number = null;

    public $Keyword = null;

    public $Match = null;

    public $Message = null;

}
