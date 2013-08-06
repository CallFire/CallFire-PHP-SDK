<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class ConfigureNumber extends AbstractRequest
{

    protected $number = null;

    /**
     * Allowable values: [UNSUPPORTED, PENDING, DISABLED, ENABLED]
     */
    protected $callFeature = null;

    /**
     * Allowable values: [UNSUPPORTED, PENDING, DISABLED, ENABLED]
     */
    protected $textFeature = null;

    /**
     * Allowable values: [TRACKING, IVR]
     */
    protected $inboundCallConfigurationType = null;

    protected $transferNumber = null;

    protected $screen = null;

    protected $record = null;

    protected $introSoundId = null;

    protected $whisperSoundId = null;

    protected $dialplanXml = null;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getCallFeature()
    {
        return $this->callFeature;
    }

    public function setCallFeature($callFeature)
    {
        $this->callFeature = $callFeature;

        return $this;
    }

    public function getTextFeature()
    {
        return $this->textFeature;
    }

    public function setTextFeature($textFeature)
    {
        $this->textFeature = $textFeature;

        return $this;
    }

    public function getInboundCallConfigurationType()
    {
        return $this->inboundCallConfigurationType;
    }

    public function setInboundCallConfigurationType($inboundCallConfigurationType)
    {
        $this->inboundCallConfigurationType = $inboundCallConfigurationType;

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

    public function getScreen()
    {
        return $this->screen;
    }

    public function setScreen($screen)
    {
        $this->screen = $screen;

        return $this;
    }

    public function getRecord()
    {
        return $this->record;
    }

    public function setRecord($record)
    {
        $this->record = $record;

        return $this;
    }

    public function getIntroSoundId()
    {
        return $this->introSoundId;
    }

    public function setIntroSoundId($introSoundId)
    {
        $this->introSoundId = $introSoundId;

        return $this;
    }

    public function getWhisperSoundId()
    {
        return $this->whisperSoundId;
    }

    public function setWhisperSoundId($whisperSoundId)
    {
        $this->whisperSoundId = $whisperSoundId;

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
