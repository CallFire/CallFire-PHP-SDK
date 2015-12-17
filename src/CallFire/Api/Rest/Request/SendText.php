<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class SendText extends AbstractRequest
{

    /**
     * Unique ID, used to de-dup requests and make sure request is not processed twice
     */
    protected $requestId = null;

    /**
     * Type of Broadcast
     *
     * Allowable values: [VOICE, IVR, TEXT, CCC]
     */
    protected $type = null;

    /**
     * Title of Broadcast (default: API Send)
     */
    protected $broadcastName = null;

    /**
     * List of E.164 11 digit numbers space or comma separated
     */
    protected $to = null;

    /**
     * PhoneNumber 'To' param represents (default: homePhone)
     */
    protected $toNumber = null;

    /**
     * Scrub duplicates (default: false)
     */
    protected $scrubBroadcastDuplicates = null;

    /**
     * DateTime Broadcast was created 'CCYY-MM-DDThh:mm:ss[Z|(+|-)hh:mm]'
     */
    protected $created = null;

    /**
     * E.164 11 digit number or short code
     */
    protected $from = null;

    /**
     * Earliest time a client can be contacted in the timezone associated with the
     * number's NPA/NXX
     */
    protected $localRestrictBegin = null;

    /**
     * Latest time a client can be contacted in the timezone associated with the
     * number's NPA/NXX
     */
    protected $localRestrictEnd = null;

    /**
     * Max attempts to retry broadcast (default: 1)
     */
    protected $maxAttempts = null;

    /**
     * Minutes between broadcast attempts (default: 60)
     */
    protected $minutesBetweenAttempts = null;

    /**
     * Conditions to retry on
     *
     * Allowable values: [LA, AM, BUSY, DNC, XFER, XFER_LEG, NO_ANS, UNDIALED, SENT,
     * RECEIVED, DNT, TOO_BIG, INTERNAL_ERROR, CARRIER_ERROR, CARRIER_TEMP_ERROR, SD,
     * POSTPONED, ABANDONED, SKIPPED]
     */
    protected $retryResults = null;

    /**
     * Phone types to call in retry
     *
     * Allowable values: [FIRST_NUMBER, HOME_PHONE, WORK_PHONE, MOBILE_PHONE]
     */
    protected $retryPhoneTypes = null;

    /**
     * 160 char or less message to be sent in text broadcast. Use rented 'keyword' in
     * message if need response
     */
    protected $message = null;

    /**
     * Set strategy if message is over 160 chars (default: SEND_MULTIPLE)
     *
     * Allowable values: [SEND_MULTIPLE, DO_NOT_SEND, TRIM]
     */
    protected $bigMessageStrategy = null;

    /**
     * BroadcastId to send message from
     */
    protected $broadcastId = null;

    /**
     * If true send text through existing default broadcast (default: false)
     */
    protected $useDefaultBroadcast = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getBroadcastName()
    {
        return $this->broadcastName;
    }

    public function setBroadcastName($broadcastName)
    {
        $this->broadcastName = $broadcastName;

        return $this;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    public function getToNumber()
    {
        return $this->toNumber;
    }

    public function setToNumber($toNumber)
    {
        $this->toNumber = $toNumber;

        return $this;
    }

    public function getScrubBroadcastDuplicates()
    {
        return $this->scrubBroadcastDuplicates;
    }

    public function setScrubBroadcastDuplicates($scrubBroadcastDuplicates)
    {
        $this->scrubBroadcastDuplicates = $scrubBroadcastDuplicates;

        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    public function getLocalRestrictBegin()
    {
        return $this->localRestrictBegin;
    }

    public function setLocalRestrictBegin($localRestrictBegin)
    {
        $this->localRestrictBegin = $localRestrictBegin;

        return $this;
    }

    public function getLocalRestrictEnd()
    {
        return $this->localRestrictEnd;
    }

    public function setLocalRestrictEnd($localRestrictEnd)
    {
        $this->localRestrictEnd = $localRestrictEnd;

        return $this;
    }

    public function getMaxAttempts()
    {
        return $this->maxAttempts;
    }

    public function setMaxAttempts($maxAttempts)
    {
        $this->maxAttempts = $maxAttempts;

        return $this;
    }

    public function getMinutesBetweenAttempts()
    {
        return $this->minutesBetweenAttempts;
    }

    public function setMinutesBetweenAttempts($minutesBetweenAttempts)
    {
        $this->minutesBetweenAttempts = $minutesBetweenAttempts;

        return $this;
    }

    public function getRetryResults()
    {
        return $this->retryResults;
    }

    public function setRetryResults($retryResults)
    {
        $this->retryResults = $retryResults;

        return $this;
    }

    public function getRetryPhoneTypes()
    {
        return $this->retryPhoneTypes;
    }

    public function setRetryPhoneTypes($retryPhoneTypes)
    {
        $this->retryPhoneTypes = $retryPhoneTypes;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getBigMessageStrategy()
    {
        return $this->bigMessageStrategy;
    }

    public function setBigMessageStrategy($bigMessageStrategy)
    {
        $this->bigMessageStrategy = $bigMessageStrategy;

        return $this;
    }

    public function getBroadcastId()
    {
        return $this->broadcastId;
    }

    public function setBroadcastId($broadcastId)
    {
        $this->broadcastId = $broadcastId;

        return $this;
    }

    public function getUseDefaultBroadcast()
    {
        return $this->useDefaultBroadcast;
    }

    public function setUseDefaultBroadcast($useDefaultBroadcast)
    {
        $this->useDefaultBroadcast = $useDefaultBroadcast;

        return $this;
    }

}
