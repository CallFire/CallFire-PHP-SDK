<?php

namespace CallFire\Api\Soap\Request;

class GetContactHistory extends Query
{

    /**
     * @var long
     */
    protected $contactId = null;

    public function getContactId()
    {
        return $this->contactId;
    }

    public function setContactId($contactId)
    {
        $this->contactId = $contactId;

        return $this;
    }

}
