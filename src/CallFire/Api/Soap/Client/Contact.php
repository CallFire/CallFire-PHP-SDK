<?php

namespace CallFire\Api\Soap\Client;

use CallFire\Api\Soap\AbstractClient;
use CallFire\Api\Soap\Request as Request;
use CallFire\Api\Soap\Result as Result;

class Contact extends AbstractClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::__construct($wsdl, $options);
    }

    /**
     * @api
     * @param  Request\QueryContacts     $queryContacts
     * @return Result\ContactQueryResult
     */
    public function QueryContacts(Request\QueryContacts $queryContacts)
    {
        $method = __FUNCTION__;

        return parent::$method($queryContacts);
    }

    /**
     * @api
     * @param  Request\UpdateContacts        $updateContacts
     * @return Result\UpdateContactsResponse
     */
    public function UpdateContacts(Request\UpdateContacts $updateContacts)
    {
        $method = __FUNCTION__;

        return parent::$method($updateContacts);
    }

    /**
     * @api
     * @param  Request\RemoveContacts        $removeContacts
     * @return Result\RemoveContactsResponse
     */
    public function RemoveContacts(Request\RemoveContacts $removeContacts)
    {
        $method = __FUNCTION__;

        return parent::$method($removeContacts);
    }

    /**
     * @api
     * @param  Request\GetContact $getContact
     * @return Result\Contact
     */
    public function GetContact(Request\GetContact $getContact)
    {
        $method = __FUNCTION__;

        return parent::$method($getContact);
    }

    /**
     * @api
     * @param  Request\GetContactHistory $getContactHistory
     * @return Result\ContactHistory
     */
    public function GetContactHistory(Request\GetContactHistory $getContactHistory)
    {
        $method = __FUNCTION__;

        return parent::$method($getContactHistory);
    }

    /**
     * @api
     * @param  Request\CreateContactList $createContactList
     * @return Result\ContactListId
     */
    public function CreateContactList(Request\CreateContactList $createContactList)
    {
        $method = __FUNCTION__;

        return parent::$method($createContactList);
    }

    /**
     * @api
     * @param  Request\QueryContactLists     $queryContactLists
     * @return Result\ContactListQueryResult
     */
    public function QueryContactLists(Request\QueryContactLists $queryContactLists)
    {
        $method = __FUNCTION__;

        return parent::$method($queryContactLists);
    }

    /**
     * @api
     * @param  Request\DeleteContactList        $deleteContactList
     * @return Result\DeleteContactListResponse
     */
    public function DeleteContactList(Request\DeleteContactList $deleteContactList)
    {
        $method = __FUNCTION__;

        return parent::$method($deleteContactList);
    }

    /**
     * @api
     * @param  Request\AddContactsToList        $addContactsToList
     * @return Result\AddContactsToListResponse
     */
    public function AddContactsToList(Request\AddContactsToList $addContactsToList)
    {
        $method = __FUNCTION__;

        return parent::$method($addContactsToList);
    }

    /**
     * @api
     * @param  Request\RemoveContactsFromList        $removeContactsFromList
     * @return Result\RemoveContactsFromListResponse
     */
    public function RemoveContactsFromList(Request\RemoveContactsFromList $removeContactsFromList)
    {
        $method = __FUNCTION__;

        return parent::$method($removeContactsFromList);
    }

}
