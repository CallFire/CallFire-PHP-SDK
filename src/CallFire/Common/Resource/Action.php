<?php

namespace CallFire\Common\Resource;

class Action extends AbstractResource
{

    /**
     * @var long
     */
    public $id = null;

    /**
     * @var string
     */
    public $fromNumber = null;

    /**
     * @var string
     */
    public $toNumber = null;

    /**
     * @var string
     */
    public $state = null;

    /**
     * @var long
     */
    public $batchId = null;

    /**
     * @var long
     */
    public $broadcastId = null;

    /**
     * @var long
     */
    public $contactId = null;

    /**
     * @var boolean
     */
    public $inbound = null;

    /**
     * @var dateTime
     */
    public $created = null;

    /**
     * @var dateTime
     */
    public $modified = null;

    /**
     * @var string
     */
    public $finalResult = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

    public function getToNumber()
    {
        return $this->toNumber;
    }

    public function setToNumber($toNumber)
    {
        $this->toNumber = $toNumber;

        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    public function getBatchId()
    {
        return $this->batchId;
    }

    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;

        return $this;
    }

    public function getBroadcastId()
    {
        return $this->broadcastId;
    }

    public function setBroadcastId($broadcastId)
    {
        $this->broadcastId = $broadcastId;

        return $this;
    }

    public function getContactId()
    {
        return $this->contactId;
    }

    public function setContactId($contactId)
    {
        $this->contactId = $contactId;

        return $this;
    }

    public function getInbound()
    {
        return $this->inbound;
    }

    public function setInbound($inbound)
    {
        $this->inbound = $inbound;

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

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    public function getFinalResult()
    {
        return $this->finalResult;
    }

    public function setFinalResult($finalResult)
    {
        $this->finalResult = $finalResult;

        return $this;
    }

}
