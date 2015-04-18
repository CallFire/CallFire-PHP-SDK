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
     * @param  Request\GetContactList $getContactList
     * @return Result\ContactList
     */
    public function GetContactList(Request\GetContactList $getContactList)
    {
        $method = __FUNCTION__;

        return parent::$method($getContactList);
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

    /**
     * @api
     * @param  Request\QueryDncNumbers        $queryDncNumbersRequest
     * @return Result\QueryDncNumbersResponse
     */
    public function QueryDncNumbers(Request\QueryDncNumbersRequest $queryDncNumbersRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($queryDncNumbersRequest);
    }

    /**
     * @api
     * @param  Request\UpdateDncNumber        $updateDncNumberRequest
     * @return Result\UpdateDncNumberResponse
     */
    public function UpdateDncNumber(Request\UpdateDncNumberRequest $updateDncNumberRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($updateDncNumberRequest);
    }

    /**
     * @api
     * @param  Request\QueryDncLists        $queryDncListsRequest
     * @return Result\QueryDncListsResponse
     */
    public function QueryDncLists(Request\QueryDncListsRequest $queryDncListsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($queryDncListsRequest);
    }

    /**
     * @api
     * @param  Request\CreateDncList $createDncListRequest
     * @return Result\DncListId
     */
    public function CreateDncList(Request\CreateDncListRequest $createDncListRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($createDncListRequest);
    }

    /**
     * @api
     * @param  Request\GetDncList $getDncListRequest
     * @return Result\DncList
     */
    public function GetDncList(Request\GetDncListRequest $getDncListRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getDncListRequest);
    }

    /**
     * @api
     * @param  Request\DeleteDncList        $deleteDncListRequest
     * @return Result\DeleteDncListResponse
     */
    public function DeleteDncList(Request\DeleteDncListRequest $deleteDncListRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($deleteDncListRequest);
    }

    /**
     * @api
     * @param  Request\AddNumbersToDncList        $addNumbersToDncListRequest
     * @return Result\AddNumbersToDncListResponse
     */
    public function AddNumbersToDncList(Request\AddNumbersToDncListRequest $addNumbersToDncListRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($addNumbersToDncListRequest);
    }

    /**
     * @api
     * @param  Request\RemoveNumbersFromDncList        $removeNumbersFromDncListRequest
     * @return Result\RemoveNumbersFromDncListResponse
     */
    public function RemoveNumbersFromDncList(Request\RemoveNumbersFromDncListRequest $removeNumbersFromDncListRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($removeNumbersFromDncListRequest);
    }

}
