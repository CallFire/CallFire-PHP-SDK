<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateContactList extends AbstractRequest
{

    public $RequestId = null;

    public $Name = null;

    /**
     * List of existing contact ids
     */
    public $ContactId = null;

    /**
     * Csv file attachment containing list of contacts or numbers
     */
    public $File = null;

}
