<?php

namespace CallFire\Api\Soap\Result;

class ContactQueryResult extends QueryResult
{

    /**
     * @var Contact[]
     */
    protected $contacts = array();

    public function getContacts()
    {
        return $this->resources;
    }

    public function setContacts($contacts)
    {
        $this->resources = $contacts;

        return $this;
    }

    public function addContact($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
