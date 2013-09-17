<?php

namespace CallFire\Api\Soap\Result;

class ContactListQueryResult extends QueryResult
{

    /**
     * @var ContactList[]
     */
    protected $contactLists = array();

    public function getContactLists()
    {
        return $this->resources;
    }

    public function setContactLists($contactLists)
    {
        $this->resources = $contactLists;

        return $this;
    }

    public function addContactList($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
