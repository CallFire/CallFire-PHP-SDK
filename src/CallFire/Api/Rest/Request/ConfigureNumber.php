<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class ConfigureNumber extends AbstractRequest
{

    public $Number = null;

    public $CallFeature = null;

    public $TextFeature = null;

    public $InboundCallConfigurationType = null;

    public $TransferNumber = null;

    public $Screen = null;

    public $Record = null;

    public $IntroSoundId = null;

    public $WhisperSoundId = null;

    public $DialplanXml = null;

}
