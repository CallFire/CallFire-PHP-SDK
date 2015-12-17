<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateCccCampaign extends AbstractRequest
{

    /**
     * Unique ID of web request to de-dup on
     */
    protected $requestId = null;

    /**
     * Name of Campaign
     */
    protected $name = null;

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
     * Script content
     */
    protected $script = null;

    /**
     * Question label
     */
    protected $question = null;

    /**
     * Transfer Number name
     */
    protected $transferNumber = null;

    /**
     * E.164 11 digit number or short code
     */
    protected $fromNumber = null;

    /**
     * Retry logic for campaign
     */
    protected $retryConfig = null;

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
     * Unique ID of AgentGroup
     */
    protected $agentGroupId = null;

    /**
     * Name of AgentGroup
     */
    protected $agentGroupName = null;

    /**
     * Unique ID of SmartDropSound
     */
    protected $smartDropSoundId = null;

    /**
     * URI of SmartDropSound
     */
    protected $smartDropSoundRef = null;

    /**
     * Allow any transfer
     */
    protected $allowAnyTransfer = null;

    /**
     * Recorded
     */
    protected $recorded = null;

    /**
     * Allow calling up to 4 lines at a time (default = 1). This feature will increase
     * your abandoned rate.
     */
    protected $multilineDialingRatio = null;

    /**
     * Enable calling up to 4 lines at a time (MultilineDialingRatio default = 1).
     * Enabling this feature will increase your abandoned rate.
     */
    protected $multilineDialingEnabled = null;

    /**
     * Scrub level
     */
    protected $scrubLevel = null;

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

    public function getScript()
    {
        return $this->script;
    }

    public function setScript($script)
    {
        $this->script = $script;

        return $this;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;

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

    public function getFromNumber()
    {
        return $this->fromNumber;
    }

    public function setFromNumber($fromNumber)
    {
        $this->fromNumber = $fromNumber;

        return $this;
    }

    public function getRetryConfig()
    {
        return $this->retryConfig;
    }

    public function setRetryConfig($retryConfig)
    {
        $this->retryConfig = $retryConfig;

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

    public function getAgentGroupId()
    {
        return $this->agentGroupId;
    }

    public function setAgentGroupId($agentGroupId)
    {
        $this->agentGroupId = $agentGroupId;

        return $this;
    }

    public function getAgentGroupName()
    {
        return $this->agentGroupName;
    }

    public function setAgentGroupName($agentGroupName)
    {
        $this->agentGroupName = $agentGroupName;

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

    public function getSmartDropSoundRef()
    {
        return $this->smartDropSoundRef;
    }

    public function setSmartDropSoundRef($smartDropSoundRef)
    {
        $this->smartDropSoundRef = $smartDropSoundRef;

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

    public function getMultilineDialingRatio()
    {
        return $this->multilineDialingRatio;
    }

    public function setMultilineDialingRatio($multilineDialingRatio)
    {
        $this->multilineDialingRatio = $multilineDialingRatio;

        return $this;
    }

    public function getMultilineDialingEnabled()
    {
        return $this->multilineDialingEnabled;
    }

    public function setMultilineDialingEnabled($multilineDialingEnabled)
    {
        $this->multilineDialingEnabled = $multilineDialingEnabled;

        return $this;
    }

    public function getScrubLevel()
    {
        return $this->scrubLevel;
    }

    public function setScrubLevel($scrubLevel)
    {
        $this->scrubLevel = $scrubLevel;

        return $this;
    }

}
