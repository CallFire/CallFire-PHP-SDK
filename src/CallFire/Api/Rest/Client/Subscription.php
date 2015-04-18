<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;
use CallFire\Api\Rest\Response as Response;

class Subscription extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    /**
     * Creates a new subscription for CallFire event notifications
     *
     * CreateSubscription registers a URI endpoint to start receiving CallFire
     * notification events on. Returned is the subscriptionId that can be used later to
     * query, update, or delete the subscription. The subscriptionId is also returned
     * as part of all notification events as 'subscriptionId'.  A URI endpoint will
     * need to be provided that can handle the HTTP notification events coming from
     * CallFire.com.
     *
     * @api
     * @param Request\CreateSubscription $CreateSubscription = null
     */
    public function CreateSubscription(Request\CreateSubscription $CreateSubscription = null)
    {
        $uri = $this->getUri('/subscription', array());

        return $this->post($uri, $CreateSubscription);
    }

    /**
     * Get a list of registered subscriptions
     *
     * Return a list of all subscriptions registered to an account. Subscriptions
     * returned contain info like id, enabled, endpoint, filter, etc...
     *
     * @api
     * @param Request\QuerySubscriptions $QuerySubscriptions = null
     */
    public function QuerySubscriptions(Request\QuerySubscriptions $QuerySubscriptions = null)
    {
        $uri = $this->getUri('/subscription', array());

        return $this->get($uri, $QuerySubscriptions);
    }

    /**
     * Gets an existing individual subscription by ID
     *
     * Return a subscription registered to an account using subscriptionId returned
     * from CreateSubscription request. Subscription returned contain info like id,
     * enabled, endpoint, filter, etc...
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetSubscription($Id)
    {
        $uri = $this->getUri('/subscription/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Deletes a subscription by ID
     *
     * Delete subscription to stop receiving CallFire notification events at the
     * registered URI postback endpoint.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function DeleteSubscription($Id)
    {
        $uri = $this->getUri('/subscription/%s', array($Id));

        return $this->delete($uri);
    }

    /**
     * Updates an existing subscription
     *
     * Update existing subscription by ID Use this to enable or disable notification
     * events, change the notification endpoint URI, or change the filtering so only
     * receive notification for a subset of events.  UpdateSubscription service call
     * returns no response. Testing this method using swagger doc REST interface (Try
     * Me! button) does not work correctly. Please use curl or other rest client to
     * test api call.
     *
     * @api
     * @param Request\UpdateSubscription $UpdateSubscription = null
     * @param int                        $Id
     */
    public function UpdateSubscription($Id, Request\UpdateSubscription $UpdateSubscription = null)
    {
        $uri = $this->getUri('/subscription/%s', array($Id));

        return $this->put($uri, $UpdateSubscription);
    }

}
