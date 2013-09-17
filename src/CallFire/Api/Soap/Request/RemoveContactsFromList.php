<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class RemoveContactsFromList extends AbstractRequest
{

    /**
     * @var long
     */
    protected $contactListId = null;

    public function getContactListId()
    {
        return $this->contactListId;
    }

    public function setContactListId($contactListId)
    {
        $this->contactListId = $contactListId;

        return $this;
    }

}
