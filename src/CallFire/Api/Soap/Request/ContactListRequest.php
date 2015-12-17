<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class ContactListRequest extends AbstractRequest
{

    /**
     * @var long
     */
    protected $contactListId = null;

    /**
     * @var boolean
     */
    protected $validate = null;

    /**
     * @var ContactSource
     */
    protected $contactSource = null;

    public function getContactListId()
    {
        return $this->contactListId;
    }

    public function setContactListId($contactListId)
    {
        $this->contactListId = $contactListId;

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

    public function getContactSource()
    {
        return $this->contactSource;
    }

    public function setContactSource($contactSource)
    {
        $this->contactSource = $contactSource;

        return $this;
    }

}
