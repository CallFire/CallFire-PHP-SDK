<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Contact extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

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
     * @param Request\CreateContactList $CreateContactList = null
     */
    public function CreateContactList(Request\CreateContactList $CreateContactList = null)
    {
        $uri = $this->getUri('/contact/list', array());

        return $this->post($uri, $CreateContactList);
    }

    /**
     * Adds contacts to an existing list
     *
     * See CreateContactList. Currently only supports adding ContactSource numbers, not
     * contact lists, contactId lists, or csv files.
     *
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
     * Currently only supports removing contacts by ContactSource numbers, not contact
     * lists, contactId lists, or csv files. Just specify the contact list ID and the
     * numbers to remove from list.
     *
     * @param Request\RemoveContactsFromList $RemoveContactsFromList = null
     */
    public function RemoveContactsFromList(Request\RemoveContactsFromList $RemoveContactsFromList = null)
    {
        $uri = $this->getUri('/contact/list/%s/remove', array());

        return $this->post($uri, $RemoveContactsFromList);
    }

}
