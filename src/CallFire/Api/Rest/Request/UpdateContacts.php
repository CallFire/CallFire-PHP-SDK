<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class UpdateContacts extends AbstractRequest
{

    /**
     * Unique ID of Contact
     */
    protected $contact = null;

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

}
