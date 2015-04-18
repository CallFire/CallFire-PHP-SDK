<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class RemoveContactsFromList extends AbstractRequest
{

    /**
     * List of existing contact ids
     */
    protected $contactId = null;

    /**
     * List E.164 11 digit numbers space or comma seperated
     */
    protected $numbers = null;

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
