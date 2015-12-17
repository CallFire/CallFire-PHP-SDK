<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;
use CallFire\Api\Rest\Response as Response;

class Contact extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    /**
     * Lists existing contacts
     *
     * Query for existing contacts using optional filters such as ContactListId, Field,
     * etc... Returns a list of contacts and all associated info. See GetContact to
     * return just a single contact by id.
     *
     * @api
     * @param Request\QueryContacts $QueryContacts = null
     */
    public function QueryContacts(Request\QueryContacts $QueryContacts = null)
    {
        $uri = $this->getUri('/contact', array());

        return $this->get($uri, $QueryContacts);
    }

    /**
     * Updates existing contacts
     *
     * Update existing contacts.
     *
     * @api
     * @param Request\UpdateContacts $UpdateContacts = null
     */
    public function UpdateContacts(Request\UpdateContacts $UpdateContacts = null)
    {
        $uri = $this->getUri('/contact', array());

        return $this->put($uri, $UpdateContacts);
    }

    /**
     * Removes contacts
     *
     * Delete contacts identified by contactIds from system. If id points to
     * non-existent contact the id will be ignored and processing will continue.
     *
     * @api
     * @param Request\RemoveContacts $RemoveContacts = null
     */
    public function RemoveContacts(Request\RemoveContacts $RemoveContacts = null)
    {
        $uri = $this->getUri('/contact', array());

        return $this->delete($uri, $RemoveContacts);
    }

    /**
     * Gets the contact by ID
     *
     * Return individual contact by ID. See QueryContacts to return a list of contacts
     * and determine individual contactIds.  Note: GetContact returns all contact
     * fields however when using PHP SoapClient only the predifined fields (lastName,
     * mobileNumber, firstName, homePhone, workPhone, and zipcode) will show in
     * $response. This is problem with SoapClient, not the underlying Soap message. Use
     * our PHP REST API or another PHP SOAP client to work around the problem.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetContact($Id)
    {
        $uri = $this->getUri('/contact/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Gets a contact's history by contact ID
     *
     * List all calls and texts associated with a contact.
     *
     * @api
     * @param int                       $ContactId         Contact to get history
     * @param Request\GetContactHistory $GetContactHistory
     */
    public function GetContactHistory($ContactId, Request\GetContactHistory $GetContactHistory)
    {
        $uri = $this->getUri('/contact/%s/history', array($ContactId));

        return $this->get($uri, $GetContactHistory);
    }

    /**
     * Create new contact list and add to account
     *
     * Add contact list to account using 1 of 4 inputs: list of contacts, numbers
     * string, list of contactIds, or csv file containing contacts or numbers. If more
     * then one ContactSource specified then only load from 1 source with precedence as
     * listed above.  On import contact lists go through seven system safeguards that
     * check the accuracy of the list. For example, our system checks if a number is
     * formatted correctly, is invalid, is duplicated in another contact list, or is on
     * your Do Not Contact list. API calls have their default validation error
     * resolutions set differently then the defaults set on the CallFire web site under
     * Settings | List Validation. The API validation defaults are:
     * LIST_COLUMNS_UNMAPPEDResolution USE_DEFAULT_COLUMNS
     * LIST_HAS_DUPLICATE_NUMBERSResolution SCRUB LIST_HAS_DNC_CONTACTSResolution SCRUB
     * LIST_HAS_CONTACT_CONFLICTSResolution MERGE LIST_HAS_INVALID_NUMBERSResolution
     * SCRUB
     *
     * @api
     * @param Request\CreateContactList $CreateContactList = null
     */
    public function CreateContactList(Request\CreateContactList $CreateContactList = null)
    {
        $uri = $this->getUri('/contact/list', array());

        return $this->post($uri, $CreateContactList);
    }

    /**
     * Lists existing contact lists
     *
     * Query for existing contact lists. Currently does no filtering and returns all
     * contact lists.
     *
     * @api
     * @param Request\QueryContactLists $QueryContactLists = null
     */
    public function QueryContactLists(Request\QueryContactLists $QueryContactLists = null)
    {
        $uri = $this->getUri('/contact/list', array());

        return $this->get($uri, $QueryContactLists);
    }

    /**
     * Deletes a contact list by ID
     *
     * Delete contact list identified by id.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function DeleteContactList($Id)
    {
        $uri = $this->getUri('/contact/list/%s', array($Id));

        return $this->delete($uri);
    }

    /**
     * Adds contacts to an existing list
     *
     * See CreateContactList.
     *
     * @api
     * @param int                       $ContactListId     Unique ID of ContactList
     * @param Request\AddContactsToList $AddContactsToList
     */
    public function AddContactsToList($ContactListId, Request\AddContactsToList $AddContactsToList)
    {
        $uri = $this->getUri('/contact/list/%s/add', array($ContactListId));

        return $this->post($uri, $AddContactsToList);
    }

    /**
     * Gets the contact list by ID
     *
     * Return individual contact list by ID. See QueryContactLists to return a list of
     * contact lists and determine individual contactListIds.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetContactList($Id)
    {
        $uri = $this->getUri('/contact/list/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Removes contacts from a list without deleting the contacts
     *
     * Removes contacts from a list without deleting the contacts.
     *
     * @api
     * @param int                            $ContactListId          Unique ID of ContactList
     * @param Request\RemoveContactsFromList $RemoveContactsFromList
     */
    public function RemoveContactsFromList($ContactListId, Request\RemoveContactsFromList $RemoveContactsFromList)
    {
        $uri = $this->getUri('/contact/list/%s/remove', array($ContactListId));

        return $this->post($uri, $RemoveContactsFromList);
    }

    /**
     * Query for existing do not contact (DNC) numbers
     *
     * Query for existing do not contact (DNC) numbers.
     *
     * @api
     * @param Request\QueryDncNumbers $QueryDncNumbers = null
     */
    public function QueryDncNumbers(Request\QueryDncNumbers $QueryDncNumbers = null)
    {
        $uri = $this->getUri('/contact/dnc', array());

        return $this->get($uri, $QueryDncNumbers);
    }

    /**
     * Update existing do not contact (DNC) number
     *
     * Update existing do not contact (DNC) numbers.
     *
     * @api
     * @param string                  $Number          Do not call number to update
     * @param Request\UpdateDncNumber $UpdateDncNumber
     */
    public function UpdateDncNumber($Number, Request\UpdateDncNumber $UpdateDncNumber)
    {
        $uri = $this->getUri('/contact/dnc/%s', array($Number));

        return $this->put($uri, $UpdateDncNumber);
    }

    /**
     * Query for existing do not contact (DNC) lists
     *
     * Query for existing do not contact (DNC) lists.
     *
     * @api
     * @param Request\QueryDncLists $QueryDncLists = null
     */
    public function QueryDncLists(Request\QueryDncLists $QueryDncLists = null)
    {
        $uri = $this->getUri('/contact/dnc/list', array());

        return $this->get($uri, $QueryDncLists);
    }

    /**
     * Create do not contact (DNC) list
     *
     * Create do not contact (DNC) list.
     *
     * @api
     * @param Request\CreateDncList $CreateDncList = null
     */
    public function CreateDncList(Request\CreateDncList $CreateDncList = null)
    {
        $uri = $this->getUri('/contact/dnc/list', array());

        return $this->post($uri, $CreateDncList);
    }

    /**
     * Get do not contact (DNC) list
     *
     * Get do not contact (DNC) list by id.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetDncList($Id)
    {
        $uri = $this->getUri('/contact/dnc/list/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Delete do not contact (DNC) list
     *
     * Delete do not contact (DNC) list by id.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function DeleteDncList($Id)
    {
        $uri = $this->getUri('/contact/dnc/list/%s', array($Id));

        return $this->delete($uri);
    }

    /**
     * Add numbers to do not contact (DNC) list
     *
     * Add numbers to do not contact (DNC) list.
     *
     * @api
     * @param int                         $Id                  DNC List ID
     * @param Request\AddNumbersToDncList $AddNumbersToDncList
     */
    public function AddNumbersToDncList($Id, Request\AddNumbersToDncList $AddNumbersToDncList)
    {
        $uri = $this->getUri('/contact/dnc/list/%s/add', array($Id));

        return $this->post($uri, $AddNumbersToDncList);
    }

    /**
     * Removes number from do not contact (DNC) list
     *
     * Remove numbers from do not contact (DNC) list.
     *
     * @api
     * @param int                              $Id                       DNC List ID
     * @param Request\RemoveNumbersFromDncList $RemoveNumbersFromDncList
     */
    public function RemoveNumbersFromDncList($Id, Request\RemoveNumbersFromDncList $RemoveNumbersFromDncList)
    {
        $uri = $this->getUri('/contact/dnc/list/%s/remove', array($Id));

        return $this->post($uri, $RemoveNumbersFromDncList);
    }

}
