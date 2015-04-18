<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateContactList extends AbstractRequest
{

    /**
     * Unique ID, used to de-dup requests and make sure request is not processed twice
     */
    protected $requestId = null;

    /**
     * Name of contact list
     */
    protected $name = null;

    /**
     * Turn off list validation (default: true)
     */
    protected $validate = null;

    /**
     * First name
     */
    protected $contact = null;

    /**
     * List of existing contact ids
     */
    protected $contactId = null;

    protected $numbers = null;

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

    public function getValidate()
    {
        return $this->validate;
    }

    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;

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

    public function getNumbers()
    {
        return $this->numbers;
    }

    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

}
