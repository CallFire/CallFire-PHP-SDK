<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class RemoveContactsFromList extends AbstractRequest
{

    public $ContactListId = null;

    public $ContactId = null;

    public $File = null;

}
