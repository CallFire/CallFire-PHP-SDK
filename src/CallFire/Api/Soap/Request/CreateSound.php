<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class CreateSound extends AbstractRequest
{

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var string
     */
    protected $soundTextVoice = null;

    /**
     * @var base64Binary
     */
    protected $data = null;

    /**
     * @var string
     */
    protected $soundText = null;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

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

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;

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

}
