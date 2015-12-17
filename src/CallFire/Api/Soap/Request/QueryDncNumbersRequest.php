<?php

namespace CallFire\Api\Soap\Request;

class QueryDncNumbersRequest extends Query
{

    /**
     * @var string
     */
    protected $prefix = null;

    /**
     * @var long
     */
    protected $dncListId = null;

    /**
     * @var string
     */
    protected $dncListName = null;

    /**
     * @var boolean
     */
    protected $callDnc = null;

    /**
     * @var boolean
     */
    protected $textDnc = null;

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

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

    public function getDncListName()
    {
        return $this->dncListName;
    }

    public function setDncListName($dncListName)
    {
        $this->dncListName = $dncListName;

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
