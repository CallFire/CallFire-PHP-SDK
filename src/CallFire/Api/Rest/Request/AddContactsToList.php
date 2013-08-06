<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class AddContactsToList extends AbstractRequest
{

    /**
     * Unique ID of ContactList
     */
    protected $contactListId = null;

    /**
     * List of existing contact ids
     */
    protected $contactId = null;

    /**
     * Csv file attachment containing list of contacts or numbers
     */
    protected $file = null;

    public function getContactListId()
    {
        return $this->contactListId;
    }

    public function setContactListId($contactListId)
    {
        $this->contactListId = $contactListId;

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

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

}
