<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class SendText extends AbstractRequest
{

    /**
     * Unique ID, used to de-dup requests and make sure request is not processed twice
     */
    public $RequestId = null;

    /**
     * Type of Broadcast
     *
     * Allowable values: [VOICE, IVR, TEXT]
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

    /**
     * Allowable values: [LA, AM, BUSY, DNC, XFER, XFER_LEG, NO_ANS, UNDIALED, SENT,
     * RECEIVED, DNT, TOO_BIG, INTERNAL_ERROR, CARRIER_ERROR, CARRIER_TEMP_ERROR]
     */
    public $RetryResults = null;

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

}
