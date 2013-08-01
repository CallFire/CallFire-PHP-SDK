<?php

namespace CallFire\Api\Rest\Request;

class SendCall extends AbstractRequest
{

    public $RequestId = null;

    public $Type = null;

    public $BroadcastName = null;

    public $To = null;

    public $ScrubBroadcastDuplicates = null;

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

    public $DialplanXml = null;

}
