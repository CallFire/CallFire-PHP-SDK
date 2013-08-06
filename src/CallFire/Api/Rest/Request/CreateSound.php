<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateSound extends AbstractRequest
{

    /**
     * The name of your sound.
     */
    public $Name = null;

    /**
     * MP3 or WAV bytes.
     */
    public $Data = null;

    /**
     * E.164 11 digit number to call to record a new sound.
     */
    public $ToNumber = null;

}
