<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateBroadcast extends AbstractRequest
{

    /**
     * Unique ID of web request to de-dup on
     */
    protected $requestId = null;

    /**
     * Name of Broadcast
     */
    protected $name = null;

    /**
     * Type of Broadcast
     *
     * Allowable values: [VOICE, IVR, TEXT, CCC]
     */
    protected $type = null;

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

    protected $liveSoundTextVoice = null;

    protected $machineSoundText = null;

    /**
     * ID of Sound to play if call answered by machine
     */
    protected $machineSoundId = null;

    protected $machineSoundTextVoice = null;

    protected $transferSoundText = null;

    /**
     * ID of Sound to play if call transfered
     */
    protected $transferSoundId = null;

    protected $transferSoundTextVoice = null;

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

    protected $dncSoundTextVoice = null;

    /**
     * Do Not Call Digit
     */
    protected $dncDigit = null;

    /**
     * Max Transfers
     */
    protected $maxActiveTransfers = null;

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
     * Unique ID of AgentGroup
     */
    protected $agentGroupId = null;

    /**
     * Unique ID of SmartDropSound
     */
    protected $smartDropSoundId = null;

    /**
     * Unique ID of Script
     */
    protected $scriptId = null;

    /**
     * ID List of TransferNumbers
     */
    protected $transferNumberIdList = null;

    /**
     * Allow any transfer
     */
    protected $allowAnyTransfer = null;

    /**
     * Recorded
     */
    protected $recorded = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

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

    public function getLiveSoundTextVoice()
    {
        return $this->liveSoundTextVoice;
    }

    public function setLiveSoundTextVoice($liveSoundTextVoice)
    {
        $this->liveSoundTextVoice = $liveSoundTextVoice;

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

    public function getMachineSoundTextVoice()
    {
        return $this->machineSoundTextVoice;
    }

    public function setMachineSoundTextVoice($machineSoundTextVoice)
    {
        $this->machineSoundTextVoice = $machineSoundTextVoice;

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

    public function getTransferSoundTextVoice()
    {
        return $this->transferSoundTextVoice;
    }

    public function setTransferSoundTextVoice($transferSoundTextVoice)
    {
        $this->transferSoundTextVoice = $transferSoundTextVoice;

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

    public function getDncSoundTextVoice()
    {
        return $this->dncSoundTextVoice;
    }

    public function setDncSoundTextVoice($dncSoundTextVoice)
    {
        $this->dncSoundTextVoice = $dncSoundTextVoice;

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

    public function getAgentGroupId()
    {
        return $this->agentGroupId;
    }

    public function setAgentGroupId($agentGroupId)
    {
        $this->agentGroupId = $agentGroupId;

        return $this;
    }

    public function getSmartDropSoundId()
    {
        return $this->smartDropSoundId;
    }

    public function setSmartDropSoundId($smartDropSoundId)
    {
        $this->smartDropSoundId = $smartDropSoundId;

        return $this;
    }

    public function getScriptId()
    {
        return $this->scriptId;
    }

    public function setScriptId($scriptId)
    {
        $this->scriptId = $scriptId;

        return $this;
    }

    public function getTransferNumberIdList()
    {
        return $this->transferNumberIdList;
    }

    public function setTransferNumberIdList($transferNumberIdList)
    {
        $this->transferNumberIdList = $transferNumberIdList;

        return $this;
    }

    public function getAllowAnyTransfer()
    {
        return $this->allowAnyTransfer;
    }

    public function setAllowAnyTransfer($allowAnyTransfer)
    {
        $this->allowAnyTransfer = $allowAnyTransfer;

        return $this;
    }

    public function getRecorded()
    {
        return $this->recorded;
    }

    public function setRecorded($recorded)
    {
        $this->recorded = $recorded;

        return $this;
    }

}
