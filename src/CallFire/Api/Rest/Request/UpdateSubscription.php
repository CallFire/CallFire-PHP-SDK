<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class UpdateSubscription extends AbstractRequest
{

    /**
     * Unique ID of web request needed for de-duping
     */
    public $RequestId = null;

    /**
     * Enable publishing of postback notifications for subscribed events.
     */
    public $Enabled = null;

    /**
     * Email or URI endpoint to publish notification event to.
     */
    public $Endpoint = null;

    /**
     * Allowable values: [XML, JSON, SOAP, EMAIL]
     */
    public $NotificationFormat = null;

    /**
     * Event to trigger on
     *
     * Allowable values: [UNDEFINED_EVENT, INBOUND_CALL_FINISHED,
     * INBOUND_TEXT_FINISHED, OUTBOUND_CALL_FINISHED, OUTBOUND_TEXT_FINISHED,
     * CAMPAIGN_STARTED, CAMPAIGN_STOPPED, CAMPAIGN_FINISHED]
     */
    public $TriggerEvent = null;

    /**
     * Broadcast ID to filter on
     */
    public $BroadcastId = null;

    /**
     * Batch ID to filter on
     */
    public $BatchId = null;

    /**
     * From number (11 digit) or shortcode to filter on
     */
    public $FromNumber = null;

    /**
     * E.164 11 digit phone number
     */
    public $ToNumber = null;

    /**
     * Deprecated, use TriggerEvent
     */
    public $Inbound = null;

}
