<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class ConfigureNumber extends AbstractRequest
{

    public $Number = null;

    /**
     * Allowable values: [UNSUPPORTED, PENDING, DISABLED, ENABLED]
     */
    public $CallFeature = null;

    /**
     * Allowable values: [UNSUPPORTED, PENDING, DISABLED, ENABLED]
     */
    public $TextFeature = null;

    /**
     * Allowable values: [TRACKING, IVR]
     */
    public $InboundCallConfigurationType = null;

    public $TransferNumber = null;

    public $Screen = null;

    public $Record = null;

    public $IntroSoundId = null;

    public $WhisperSoundId = null;

    public $DialplanXml = null;

}
