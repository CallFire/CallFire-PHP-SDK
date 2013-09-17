<?php

namespace CallFire\Api\Soap\Result;

class SubscriptionQueryResult extends QueryResult
{

    /**
     * @var Subscription[]
     */
    protected $subscriptions = array();

    public function getSubscriptions()
    {
        return $this->resources;
    }

    public function setSubscriptions($subscriptions)
    {
        $this->resources = $subscriptions;

        return $this;
    }

    public function addSubscription($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
