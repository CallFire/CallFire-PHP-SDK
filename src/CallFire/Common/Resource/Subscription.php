<?php

namespace CallFire\Common\Resource;

class Subscription extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var boolean
     */
    protected $enabled = null;

    /**
     * @var anyURI
     */
    protected $endpoint = null;

    /**
     * @var string
     */
    protected $notificationFormat = null;

    /**
     * @var string
     */
    protected $triggerEvent = null;

    /**
     * @var SubscriptionFilter
     */
    protected $subscriptionFilter = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function getNotificationFormat()
    {
        return $this->notificationFormat;
    }

    public function setNotificationFormat($notificationFormat)
    {
        $this->notificationFormat = $notificationFormat;

        return $this;
    }

    public function getTriggerEvent()
    {
        return $this->triggerEvent;
    }

    public function setTriggerEvent($triggerEvent)
    {
        $this->triggerEvent = $triggerEvent;

        return $this;
    }

    public function getSubscriptionFilter()
    {
        return $this->subscriptionFilter;
    }

    public function setSubscriptionFilter($subscriptionFilter)
    {
        $this->subscriptionFilter = $subscriptionFilter;

        return $this;
    }

}
