<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class CreateContactList extends AbstractRequest
{

    /**
     * @var anyURI
     */
    protected $requestId = null;

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var boolean
     */
    protected $validate = null;

    /**
     * @var ContactSource
     */
    protected $contactSource = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

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
