<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class UpdateContacts extends AbstractRequest
{

    /**
     * @var Contact[]
     */
    protected $contacts = array();

    public function getContacts()
    {
        return $this->contacts;
    }

    public function setContacts($contacts)
    {
        $this->contacts = $contacts;

        return $this;
    }

}
