<?php

namespace CallFire\Api\Rest\Request;

class UpdateBroadcast extends AbstractRequest
{

    public $RequestId = null;

    public $Name = null;

    public $Type = null;

    public $From = null;

    public $LocalRestrictBegin = null;

    public $LocalRestrictEnd = null;

    public $MaxAttempts = null;

    public $MinutesBetweenAttempts = null;

    public $RetryResults = null;

    public $AnsweringMachineConfig = null;

    public $LiveSoundId = null;

    public $MachineSoundId = null;

    public $TransferSoundId = null;

    public $TransferDigit = null;

    public $TransferNumber = null;

    public $DncSoundId = null;

    public $DncDigit = null;

    public $MaxActiveTransfers = null;

    public $Message = null;

    public $BigMessageStrategy = null;

    public $DialplanXml = null;

}
