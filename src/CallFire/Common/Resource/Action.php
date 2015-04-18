<?php

namespace CallFire\Common\Resource;

class Action extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $fromNumber = null;

    /**
     * @var string
     */
    protected $toNumber = null;

    /**
     * @var string
     */
    protected $state = null;

    /**
     * @var long
     */
    protected $batchId = null;

    /**
     * @var long
     */
    protected $broadcastId = null;

    /**
     * @var long
     */
    protected $contactId = null;

    /**
     * @var boolean
     */
    protected $inbound = null;

    /**
     * @var dateTime
     */
    protected $created = null;

    /**
     * @var dateTime
     */
    protected $modified = null;

    /**
     * @var string
     */
    protected $finalResult = null;

    /**
     * @var Label[]
     */
    protected $labels = array();

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

    public function getLabels()
    {
        return $this->labels;
    }

    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

}
