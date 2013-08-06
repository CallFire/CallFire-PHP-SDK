<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class ControlContactBatch extends AbstractRequest
{

    /**
     * Unique ID of resource
     */
    public $Id = null;

    public $Name = null;

    public $Enabled = null;

}
