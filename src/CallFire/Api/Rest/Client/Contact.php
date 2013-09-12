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
     * REST service parameters: Accepts string of the form-encoded key-value contact
     * pairs. Each contact's value contains URL-encoded (using UTF-8 encoding)
     * attribute name and value separated by collon. Each attribute pair separated by
     * semicolon. Format:
     * contact=attributeName:attributeValue[;attributeName:attributeValue;...][&amp;contact=attributeName:attributeValue[;attributeName:attributeValue;...]&amp;...]
     * Example:
     * contact=id:1;firstName:John;customAttribute:value&amp;contact=id:2;secondName:Doe
     *
     * @api
     */
    public function UpdateContacts()
    {
        $uri = $this->getUri('/contact', array());

        return $this->put($uri);
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
     * @param Request\GetContactHistory $GetContactHistory = null
     */
    public function GetContactHistory(Request\GetContactHistory $GetContactHistory = null)
    {
        $uri = $this->getUri('/contact/%s/history', array());

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
     * See CreateContactList. Currently only supports adding ContactSource numbers, not
     * contact lists, contactId lists, or csv files.
     *
     * @api
     * @param Request\AddContactsToList $AddContactsToList = null
     */
    public function AddContactsToList(Request\AddContactsToList $AddContactsToList = null)
    {
        $uri = $this->getUri('/contact/list/%s/add', array());

        return $this->post($uri, $AddContactsToList);
    }

    /**
     * Removes contacts from a list without deleting the contacts
     *
     *
     *
     * @api
     * @param Request\RemoveContactsFromList $RemoveContactsFromList = null
     */
    public function RemoveContactsFromList(Request\RemoveContactsFromList $RemoveContactsFromList = null)
    {
        $uri = $this->getUri('/contact/list/%s/remove', array());

        return $this->post($uri, $RemoveContactsFromList);
    }

}
