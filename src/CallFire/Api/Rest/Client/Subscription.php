<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Subscription extends AbstractClient
{

    public function CreateSubscription(Request\CreateSubscription $CreateSubscription = null)
    {
        $uri = $this->getUri('/subscription', array());

        return $this->post($uri, $CreateSubscription);
    }

    public function QuerySubscriptions(Request\QuerySubscriptions $QuerySubscriptions = null)
    {
        $uri = $this->getUri('/subscription', array());

        return $this->get($uri, $QuerySubscriptions);
    }

    public function GetSubscription($Id)
    {
        $uri = $this->getUri('/subscription/%s', array($Id));

        return $this->get($uri);
    }

    public function UpdateSubscription($Id, Request\UpdateSubscription $UpdateSubscription)
    {
        $uri = $this->getUri('/subscription/%s', array($Id));

        return $this->put($uri, $UpdateSubscription);
    }

}
