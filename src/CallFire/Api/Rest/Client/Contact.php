<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Contact extends AbstractClient
{

    public function CreateContactList(Request\CreateContactList $CreateContactList = null)
    {
        $uri = $this->getUri('/contact/list', array());

        return $this->post($uri, $CreateContactList);
    }

    public function AddContactsToList(Request\AddContactsToList $AddContactsToList = null)
    {
        $uri = $this->getUri('/contact/list/%s/add', array());

        return $this->post($uri, $AddContactsToList);
    }

    public function RemoveContactsFromList(Request\RemoveContactsFromList $RemoveContactsFromList = null)
    {
        $uri = $this->getUri('/contact/list/%s/remove', array());

        return $this->post($uri, $RemoveContactsFromList);
    }

}
