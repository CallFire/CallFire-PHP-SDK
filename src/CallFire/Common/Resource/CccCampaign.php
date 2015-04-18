<?php

namespace CallFire\Common\Resource;

class CccCampaign extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var string
     */
    protected $status = null;

    /**
     * @var dateTime
     */
    protected $created = null;

    /**
     * @var dateTime
     */
    protected $lastModified = null;

    /**
     * @var time
     */
    protected $localRestrictBegin = null;

    /**
     * @var time
     */
    protected $localRestrictEnd = null;

    /**
     * @var dateTime
     */
    protected $configUpdated = null;

    /**
     * @var string
     */
    protected $script = null;

    /**
     * @var string
     */
    protected $fromNumber = null;

    /**
     * @var string
     */
    protected $retryConfig = null;

    /**
     * @var long
     */
    protected $agentGroupId = null;

    /**
     * @var string
     */
    protected $agentGroupName = null;

    /**
     * @var long
     */
    protected $smartDropSoundId = null;

    /**
     * @var anyURI
     */
    protected $smartDropSoundRef = null;

    /**
     * @var boolean
     */
    protected $allowAnyTransfer = null;

    /**
     * @var boolean
     */
    protected $recorded = null;

    /**
     * @var int
     */
    protected $scrubLevel = null;

    /**
     * @var Question[]
     */
    protected $questions = array();

    /**
     * @var TransferNumber[]
     */
    protected $transferNumbers = array();

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

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

    public function getLastModified()
    {
        return $this->lastModified;
    }

    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

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

    public function getConfigUpdated()
    {
        return $this->configUpdated;
    }

    public function setConfigUpdated($configUpdated)
    {
        $this->configUpdated = $configUpdated;

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

    public function getScrubLevel()
    {
        return $this->scrubLevel;
    }

    public function setScrubLevel($scrubLevel)
    {
        $this->scrubLevel = $scrubLevel;

        return $this;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    public function getTransferNumbers()
    {
        return $this->transferNumbers;
    }

    public function setTransferNumbers($transferNumbers)
    {
        $this->transferNumbers = $transferNumbers;

        return $this;
    }

}
