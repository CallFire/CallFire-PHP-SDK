<?php
namespace CallFire\Common\Resource;

use \DateTime;

class Call extends AbstractResource
{
    protected $id;
    protected $fromNumber;
    protected $toNumber;
    protected $state;
    protected $batchID;
    protected $broadcastID;
    protected $contactID;
    protected $inbound;
    protected $created;
    protected $modified;
    protected $finalResult;
    protected $callRecord;

    public function __construct()
    {
        $this->created = new DateTime();
        $this->modified = new DateTime();
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID($id)
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

    public function getBatchID()
    {
        return $this->batchID;
    }

    public function setBatchID($batchID)
    {
        $this->batchID = $batchID;

        return $this;
    }

    public function getBroadcastID()
    {
        return $this->broadcastID;
    }

    public function setBroadcastID($broadcastID)
    {
        $this->broadcastID = $broadcastID;

        return $this;
    }

    public function getContactID()
    {
        return $this->contactID;
    }

    public function setContactID($contactID)
    {
        $this->contactID = $contactID;

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
        if(is_string($created))
            $created = new DateTime($created);

        $this->created = $created;

        return $this;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified)
    {
        if(is_string($modified))
            $modified = new DateTime($modified);

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

    public function getCallRecord()
    {
        return $this->callRecord;
    }

    public function setCallRecord($callRecord)
    {
        $this->callRecord = $callRecord;

        return $this;
    }
}
