<?php

namespace CallFire\Common\Resource;

class VoiceBroadcastConfig extends BroadcastConfig
{

    /**
     * @var string
     */
    protected $answeringMachineConfig = null;

    /**
     * @var string
     */
    protected $liveSoundTextVoice = null;

    /**
     * @var string
     */
    protected $machineSoundTextVoice = null;

    /**
     * @var string
     */
    protected $transferSoundTextVoice = null;

    /**
     * @var string
     */
    protected $transferDigit = null;

    /**
     * @var string
     */
    protected $transferNumber = null;

    /**
     * @var string
     */
    protected $dncSoundTextVoice = null;

    /**
     * @var string
     */
    protected $dncDigit = null;

    /**
     * @var int
     */
    protected $maxActiveTransfers = null;

    /**
     * @var string
     */
    protected $liveSoundText = null;

    /**
     * @var long
     */
    protected $liveSoundId = null;

    /**
     * @var string
     */
    protected $machineSoundText = null;

    /**
     * @var long
     */
    protected $machineSoundId = null;

    /**
     * @var string
     */
    protected $transferSoundText = null;

    /**
     * @var long
     */
    protected $transferSoundId = null;

    /**
     * @var string
     */
    protected $dncSoundText = null;

    /**
     * @var long
     */
    protected $dncSoundId = null;

    public function getAnsweringMachineConfig()
    {
        return $this->answeringMachineConfig;
    }

    public function setAnsweringMachineConfig($answeringMachineConfig)
    {
        $this->answeringMachineConfig = $answeringMachineConfig;

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

    public function getMachineSoundTextVoice()
    {
        return $this->machineSoundTextVoice;
    }

    public function setMachineSoundTextVoice($machineSoundTextVoice)
    {
        $this->machineSoundTextVoice = $machineSoundTextVoice;

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

}
