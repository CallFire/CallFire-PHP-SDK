<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Text extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    /**
     * Send text message and return broadcastId
     *
     * Sending a text message requires at least a toNumber and a message. SendText
     * starts a text campaign and returns the broadcastId if campaign is successful
     * started. This returned broadcastId can be passed to QueryTexts to get state of
     * text messages in campaign and get list of individual textId for use in GetText
     * calls. The broadcastId can also be passed to GetBroadcastStats to get
     * information about the text campaign, such as BilledAmount, Duration, State,
     * etc...  The industry standard is for text messages to be limited to 160
     * characters or less. If the message is over 160 characters then a
     * BigMessageStrategy should be selected in the TextBroadcastConfig.
     *
     * @api
     * @param Request\SendText $SendText = null
     */
    public function SendText(Request\SendText $SendText = null)
    {
        $uri = $this->getUri('/text', array());

        return $this->post($uri, $SendText);
    }

    /**
     * List sent and received text messages
     *
     * Query for text messages using standard ActionQuery which filters on batchId,
     * broadcastId, toNumber, etc... Returns a list of text messages and all associated
     * info. See GetText to return just a single text action by id.
     *
     * @api
     * @param Request\QueryTexts $QueryTexts = null
     */
    public function QueryTexts(Request\QueryTexts $QueryTexts = null)
    {
        $uri = $this->getUri('/text', array());

        return $this->get($uri, $QueryTexts);
    }

    /**
     * Gets a text message by ID
     *
     * Return individual text message. See QueryTexts to return a list of text messages
     * and determine individual textIds.  General usage is to start a text campaign
     * using SendText, then to pass returned broadcastId to QueryTexts to determine
     * textIds of text messages created. This GetText can then be called with unique
     * textId to determine info and state of text message.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetText($Id)
    {
        $uri = $this->getUri('/text/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Configures a new auto-reply
     *
     * Create and configure new autoreply message for existing Did Auto-Replys are text
     * message replys sent to a customer when a customer replys to a text message from
     * a campaign. A keyword will need to have been purchased before an Auto-Reply can
     * be created.
     *
     * @api
     * @param Request\CreateAutoReply $CreateAutoReply = null
     */
    public function CreateAutoReply(Request\CreateAutoReply $CreateAutoReply = null)
    {
        $uri = $this->getUri('/text/auto-reply', array());

        return $this->post($uri, $CreateAutoReply);
    }

    /**
     * Lists configured auto-replies
     *
     * Query for autoreplies using optional number
     *
     * @api
     * @param Request\QueryAutoReplies $QueryAutoReplies = null
     */
    public function QueryAutoReplies(Request\QueryAutoReplies $QueryAutoReplies = null)
    {
        $uri = $this->getUri('/text/auto-reply', array());

        return $this->get($uri, $QueryAutoReplies);
    }

    /**
     * Gets an auto-reply by ID
     *
     * Returns autoreply by id or error if doesn't exist
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetAutoReply($Id)
    {
        $uri = $this->getUri('/text/auto-reply/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Deletes an auto-reply by ID
     *
     * Delete autoreply by id if exists. Returns error if doesn't exist
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function DeleteAutoReply($Id)
    {
        $uri = $this->getUri('/text/auto-reply/%s', array($Id));

        return $this->delete($uri);
    }

}
