<?php

namespace CallFire\Common\Resource;

class CallTrackingConfig extends InboundConfig
{

    /**
     * @var boolean
     */
    public $screen = null;

    /**
     * @var boolean
     */
    public $record = null;

    /**
     * @var long
     */
    public $introSoundId = null;

    /**
     * @var long
     */
    public $whisperSoundId = null;

    /**
     * @var TransferNumber
     */
    public $transferNumber = null;

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

    public function getTransferNumber()
    {
        return $this->transferNumber;
    }

    public function setTransferNumber($transferNumber)
    {
        $this->transferNumber = $transferNumber;

        return $this;
    }

}
