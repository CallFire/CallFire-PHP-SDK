<?php

namespace CallFire\Common\Resource;

class DncNumber extends AbstractResource
{

    /**
     * @var string
     */
    protected $number = null;

    /**
     * @var long
     */
    protected $dncListId = null;

    /**
     * @var boolean
     */
    protected $callDnc = null;

    /**
     * @var boolean
     */
    protected $textDnc = null;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getDncListId()
    {
        return $this->dncListId;
    }

    public function setDncListId($dncListId)
    {
        $this->dncListId = $dncListId;

        return $this;
    }

    public function getCallDnc()
    {
        return $this->callDnc;
    }

    public function setCallDnc($callDnc)
    {
        $this->callDnc = $callDnc;

        return $this;
    }

    public function getTextDnc()
    {
        return $this->textDnc;
    }

    public function setTextDnc($textDnc)
    {
        $this->textDnc = $textDnc;

        return $this;
    }

}
