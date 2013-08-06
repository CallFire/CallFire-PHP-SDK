<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class LabelNumber extends AbstractRequest
{

    /**
     * List of E.164 11 digit numbers space seperated and optional fieldName
     */
    public $Number = null;

    /**
     * Label name
     */
    public $LabelName = null;

}
