<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateContactBatch extends AbstractRequest
{

    protected $requestId = null;

    protected $name = null;

    /**
     * List of E.164 11 digit numbers space or comma separated
     */
    protected $to = null;

    /**
     * PhoneNumber 'To' param represents (default: homePhone)
     */
    protected $toNumber = null;

    protected $contactListId = null;

    protected $scrubBroadcastDuplicates = null;

    protected $start = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;

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

    public function getContactListId()
    {
        return $this->contactListId;
    }

    public function setContactListId($contactListId)
    {
        $this->contactListId = $contactListId;

        return $this;
    }

    public function getScrubBroadcastDuplicates()
    {
        return $this->scrubBroadcastDuplicates;
    }

    public function setScrubBroadcastDuplicates($scrubBroadcastDuplicates)
    {
        $this->scrubBroadcastDuplicates = $scrubBroadcastDuplicates;

        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

}
