<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class SendCall extends AbstractRequest
{

    /**
     * Unique ID, used to de-dup requests and make sure request is not processed twice
     */
    public $RequestId = null;

    /**
     * Type of Broadcast
     */
    public $Type = null;

    /**
     * Title of Broadcast (default: API Send)
     */
    public $BroadcastName = null;

    /**
     * List of E.164 11 digit numbers space seperated
     */
    public $To = null;

    /**
     * Scrub duplicates (default: false)
     */
    public $ScrubBroadcastDuplicates = null;

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

    public $RetryResults = null;

    /**
     * Action to take if machine answers
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
     * IVR xml document describing dialplan
     */
    public $DialplanXml = null;

}
