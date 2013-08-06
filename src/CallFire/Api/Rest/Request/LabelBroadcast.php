<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class LabelBroadcast extends AbstractRequest
{

    /**
     * Unique ID of resource
     */
    public $Id = null;

    /**
     * Label name
     */
    public $LabelName = null;

}
