<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateSound extends AbstractRequest
{

    public $Name = null;

    public $Data = null;

    public $ToNumber = null;

}
