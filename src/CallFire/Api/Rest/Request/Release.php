<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class Release extends AbstractRequest
{

    /**
     * List of E.164 11 digit numbers to release (space seperated)
     */
    public $Numbers = null;

    /**
     * List of keywords to release (space seperated)
     */
    public $Keywords = null;

}
