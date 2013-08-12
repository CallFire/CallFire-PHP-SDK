<?php

namespace CallFire\Common\Resource;

class VoiceBroadcastConfig extends BroadcastConfig
{

    /**
     * @var string
     */
    protected $answeringMachineConfig = null;

    /**
     * @var long
     */
    protected $liveSoundId = null;

    /**
     * @var long
     */
    protected $machineSoundId = null;

    /**
     * @var long
     */
    protected $transferSoundId = null;

    /**
     * @var string
     */
    protected $transferDigit = null;

    /**
     * @var string
     */
    protected $transferNumber = null;

    /**
     * @var long
     */
    protected $dncSoundId = null;

    /**
     * @var string
     */
    protected $dncDigit = null;

    /**
     * @var int
     */
    protected $maxActiveTransfers = null;

    public function getAnsweringMachineConfig()
    {
        return $this->answeringMachineConfig;
    }

    public function setAnsweringMachineConfig($answeringMachineConfig)
    {
        $this->answeringMachineConfig = $answeringMachineConfig;

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

    public function getMachineSoundId()
    {
        return $this->machineSoundId;
    }

    public function setMachineSoundId($machineSoundId)
    {
        $this->machineSoundId = $machineSoundId;

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

}
