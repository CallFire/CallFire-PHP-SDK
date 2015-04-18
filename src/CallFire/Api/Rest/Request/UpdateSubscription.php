<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class UpdateSubscription extends AbstractRequest
{

    /**
     * Unique ID of web request needed for de-duping
     */
    protected $requestId = null;

    /**
     * Enable publishing of postback notifications for subscribed events.
     */
    protected $enabled = null;

    /**
     * Email or URI endpoint to publish notification event to.
     */
    protected $endpoint = null;

    /**
     * Allowable values: [XML, JSON, SOAP, EMAIL, LEGACY]
     */
    protected $notificationFormat = null;

    /**
     * Event to trigger on
     *
     * Allowable values: [UNDEFINED_EVENT, INBOUND_CALL_FINISHED,
     * INBOUND_TEXT_FINISHED, OUTBOUND_CALL_FINISHED, OUTBOUND_TEXT_FINISHED,
     * CAMPAIGN_STARTED, CAMPAIGN_STOPPED, CAMPAIGN_FINISHED]
     */
    protected $triggerEvent = null;

    /**
     * Broadcast ID to filter on
     */
    protected $broadcastId = null;

    /**
     * Batch ID to filter on
     */
    protected $batchId = null;

    /**
     * From number (11 digit) or shortcode to filter on
     */
    protected $fromNumber = null;

    /**
     * E.164 11 digit phone number
     */
    protected $toNumber = null;

    /**
     * Deprecated, use TriggerEvent
     */
    protected $inbound = null;

    /**
     * Unique ID of Subscription
     */
    protected $subscription = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

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

    public function getBroadcastId()
    {
        return $this->broadcastId;
    }

    public function setBroadcastId($broadcastId)
    {
        $this->broadcastId = $broadcastId;

        return $this;
    }

    public function getBatchId()
    {
        return $this->batchId;
    }

    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;

        return $this;
    }

    public function getFromNumber()
    {
        return $this->fromNumber;
    }

    public function setFromNumber($fromNumber)
    {
        $this->fromNumber = $fromNumber;

        return $this;
    }

    public function getToNumber()
    {
        return $this->toNumber;
    }

    public function setToNumber($toNumber)
    {
        $this->toNumber = $toNumber;

        return $this;
    }

    public function getInbound()
    {
        return $this->inbound;
    }

    public function setInbound($inbound)
    {
        $this->inbound = $inbound;

        return $this;
    }

    public function getSubscription()
    {
        return $this->subscription;
    }

    public function setSubscription($subscription)
    {
        $this->subscription = $subscription;

        return $this;
    }

}
