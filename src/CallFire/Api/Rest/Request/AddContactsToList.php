<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class AddContactsToList extends AbstractRequest
{

    /**
     * Turn off list validation (default: true)
     */
    protected $validate = null;

    /**
     * Unique ID of Contact
     */
    protected $contact = null;

    /**
     * List of existing contact ids
     */
    protected $contactId = null;

    protected $numbers = null;

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
