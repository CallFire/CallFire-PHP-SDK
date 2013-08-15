<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class SendCall extends AbstractRequest
{

    /**
     * Unique ID, used to de-dup requests and make sure request is not processed twice
     */
    protected $requestId = null;

    /**
     * Type of Broadcast
     *
     * Allowable values: [VOICE, IVR, TEXT]
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
     * Scrub duplicates (default: false)
     */
    protected $scrubBroadcastDuplicates = null;

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
     * Allowable values: [LA, AM, BUSY, DNC, XFER, XFER_LEG, NO_ANS, UNDIALED, SENT,
     * RECEIVED, DNT, TOO_BIG, INTERNAL_ERROR, CARRIER_ERROR, CARRIER_TEMP_ERROR]
     */
    protected $retryResults = null;

    /**
     * Action to take if machine answers
     *
     * Allowable values: [AM_ONLY, AM_AND_LIVE, LIVE_WITH_AMD, LIVE_IMMEDIATE]
     */
    protected $answeringMachineConfig = null;

    protected $liveSoundText = null;

    /**
     * ID of Sound to play if call answered by live person
     */
    protected $liveSoundId = null;

    protected $machineSoundText = null;

    /**
     * ID of Sound to play if call answered by machine
     */
    protected $machineSoundId = null;

    protected $transferSoundText = null;

    /**
     * ID of Sound to play if call transfered
     */
    protected $transferSoundId = null;

    /**
     * Phone digit call transfers on if pressed
     */
    protected $transferDigit = null;

    /**
     * Number to transfer call to
     */
    protected $transferNumber = null;

    protected $dncSoundText = null;

    /**
     * Do Not Call unique ID of sound
     */
    protected $dncSoundId = null;

    /**
     * Do Not Call Digit
     */
    protected $dncDigit = null;

    /**
     * Max Transfers
     */
    protected $maxActiveTransfers = null;

    /**
     * IVR xml document describing dialplan
     */
    protected $dialplanXml = null;

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

    public function getScrubBroadcastDuplicates()
    {
        return $this->scrubBroadcastDuplicates;
    }

    public function setScrubBroadcastDuplicates($scrubBroadcastDuplicates)
    {
        $this->scrubBroadcastDuplicates = $scrubBroadcastDuplicates;

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

    public function getAnsweringMachineConfig()
    {
        return $this->answeringMachineConfig;
    }

    public function setAnsweringMachineConfig($answeringMachineConfig)
    {
        $this->answeringMachineConfig = $answeringMachineConfig;

        return $this;
    }

    public function getLiveSoundText()
    {
        return $this->liveSoundText;
    }

    public function setLiveSoundText($liveSoundText)
    {
        $this->liveSoundText = $liveSoundText;

        return $this;
    }

    public function getLiveSoundId()
    {
        return $this->liveSoundId;
    }

    public function setLiveSoundId($liveSoundId)
    {
        $this->liveSoundId = $liveSoundId;

        return $this;
    }

    public function getMachineSoundText()
    {
        return $this->machineSoundText;
    }

    public function setMachineSoundText($machineSoundText)
    {
        $this->machineSoundText = $machineSoundText;

        return $this;
    }

    public function getMachineSoundId()
    {
        return $this->machineSoundId;
    }

    public function setMachineSoundId($machineSoundId)
    {
        $this->machineSoundId = $machineSoundId;

        return $this;
    }

    public function getTransferSoundText()
    {
        return $this->transferSoundText;
    }

    public function setTransferSoundText($transferSoundText)
    {
        $this->transferSoundText = $transferSoundText;

        return $this;
    }

    public function getTransferSoundId()
    {
        return $this->transferSoundId;
    }

    public function setTransferSoundId($transferSoundId)
    {
        $this->transferSoundId = $transferSoundId;

        return $this;
    }

    public function getTransferDigit()
    {
        return $this->transferDigit;
    }

    public function setTransferDigit($transferDigit)
    {
        $this->transferDigit = $transferDigit;

        return $this;
    }

    public function getTransferNumber()
    {
        return $this->transferNumber;
    }

    public function setTransferNumber($transferNumber)
    {
        $this->transferNumber = $transferNumber;

        return $this;
    }

    public function getDncSoundText()
    {
        return $this->dncSoundText;
    }

    public function setDncSoundText($dncSoundText)
    {
        $this->dncSoundText = $dncSoundText;

        return $this;
    }

    public function getDncSoundId()
    {
        return $this->dncSoundId;
    }

    public function setDncSoundId($dncSoundId)
    {
        $this->dncSoundId = $dncSoundId;

        return $this;
    }

    public function getDncDigit()
    {
        return $this->dncDigit;
    }

    public function setDncDigit($dncDigit)
    {
        $this->dncDigit = $dncDigit;

        return $this;
    }

    public function getMaxActiveTransfers()
    {
        return $this->maxActiveTransfers;
    }

    public function setMaxActiveTransfers($maxActiveTransfers)
    {
        $this->maxActiveTransfers = $maxActiveTransfers;

        return $this;
    }

    public function getDialplanXml()
    {
        return $this->dialplanXml;
    }

    public function setDialplanXml($dialplanXml)
    {
        $this->dialplanXml = $dialplanXml;

        return $this;
    }

}
