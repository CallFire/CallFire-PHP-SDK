<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class RemoveContactsFromList extends AbstractRequest
{

    /**
     * @var long
     */
    protected $contactListId = null;

    /**
     * @var string
     */
    protected $contactId = null;

    /**
     * @var string
     */
    protected $numbers = null;

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
