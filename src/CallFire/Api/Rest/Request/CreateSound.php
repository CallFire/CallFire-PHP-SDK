<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateSound extends AbstractRequest
{

    /**
     * The name of your sound. This name is included in SoundMeta and shown in the web
     * interface.
     */
    protected $name = null;

    /**
     * E.164 11 digit number to call to record a new sound.
     */
    protected $toNumber = null;

    protected $soundText = null;

    protected $soundTextVoice = null;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

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

    public function getSoundText()
    {
        return $this->soundText;
    }

    public function setSoundText($soundText)
    {
        $this->soundText = $soundText;

        return $this;
    }

    public function getSoundTextVoice()
    {
        return $this->soundTextVoice;
    }

    public function setSoundTextVoice($soundTextVoice)
    {
        $this->soundTextVoice = $soundTextVoice;

        return $this;
    }

}
