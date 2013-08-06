<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateBroadcast extends AbstractRequest
{

    /**
     * Unique ID of web request to de-dup on
     */
    public $RequestId = null;

    /**
     * Name of Broadcast
     */
    public $Name = null;

    /**
     * Type of Broadcast (required for create)
     *
     * Allowable values: [VOICE, IVR, TEXT]
     */
    public $Type = null;

    public $From = null;

    /**
     * Earliest time a client can be contacted in the timezone associated with the
     * number's NPA/NXX
     */
    public $LocalRestrictBegin = null;

    /**
     * Latest time a client can be contacted in the timezone associated with the
     * number's NPA/NXX
     */
    public $LocalRestrictEnd = null;

    /**
     * Max attempts to retry broadcast (default: 1)
     */
    public $MaxAttempts = null;

    /**
     * Minutes between broadcast attempts (default: 60)
     */
    public $MinutesBetweenAttempts = null;

    /**
     * Allowable values: [LA, AM, BUSY, DNC, XFER, XFER_LEG, NO_ANS, UNDIALED, SENT,
     * RECEIVED, DNT, TOO_BIG, INTERNAL_ERROR, CARRIER_ERROR, CARRIER_TEMP_ERROR]
     */
    public $RetryResults = null;

    /**
     * Action to take if machine answers
     *
     * Allowable values: [AM_ONLY, AM_AND_LIVE, LIVE_WITH_AMD, LIVE_IMMEDIATE]
     */
    public $AnsweringMachineConfig = null;

    /**
     * ID of Sound to play if call answered by live person
     */
    public $LiveSoundId = null;

    /**
     * ID of Sound to play if call answered by machine
     */
    public $MachineSoundId = null;

    /**
     * ID of Sound to play if call transfered
     */
    public $TransferSoundId = null;

    /**
     * Phone digit call transfers on if pressed
     */
    public $TransferDigit = null;

    /**
     * Number to transfer call to
     */
    public $TransferNumber = null;

    /**
     * Do Not Call unique ID of sound
     */
    public $DncSoundId = null;

    /**
     * Do Not Call Digit
     */
    public $DncDigit = null;

    /**
     * Max Transfers
     */
    public $MaxActiveTransfers = null;

    /**
     * 160 char or less message to be sent in text broadcast. Use rented 'keyword' in
     * message if need response
     */
    public $Message = null;

    /**
     * Set strategy if message is over 160 chars (default: SEND_MULTIPLE)
     *
     * Allowable values: [SEND_MULTIPLE, DO_NOT_SEND, TRIM]
     */
    public $BigMessageStrategy = null;

    /**
     * IVR xml document describing dialplan
     */
    public $DialplanXml = null;

}
