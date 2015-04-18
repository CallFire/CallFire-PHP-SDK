<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Broadcast extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    /**
     * Creates a new Broadcast
     *
     * This operation creates a Broadcast campaign and returns a broadcastId. To see
     * the status of this campaign call GetBroadcast with the returned broadcastId.
     * There are 3 types of Broadcast: TEXT, IVR, or VOICE. Select the appropriate
     * config to match the broadcast type, TextBroadcastConfig, IvrBroadcastConfig, or
     * VoiceBroadcastConfig. Prefer the Text Service operations (ex: SendText) and Call
     * Service operations (ex: SendCall) over this operation when managing simple text
     * and call campaigns since those operations are simpler and more concise.
     *
     * @api
     * @param Request\CreateBroadcast $CreateBroadcast = null
     */
    public function CreateBroadcast(Request\CreateBroadcast $CreateBroadcast = null)
    {
        $uri = $this->getUri('/broadcast', array());

        return $this->post($uri, $CreateBroadcast);
    }

    /**
     * Lists existing Broadcasts
     *
     * Use this operation to see the status of Broadcasts in account. Filter by type of
     * campaign whether currently running. Returns a list of Broadcast info such as
     * campaign name, type, status, ect...
     *
     * @api
     * @param Request\QueryBroadcasts $QueryBroadcasts = null
     */
    public function QueryBroadcasts(Request\QueryBroadcasts $QueryBroadcasts = null)
    {
        $uri = $this->getUri('/broadcast', array());

        return $this->get($uri, $QueryBroadcasts);
    }

    /**
     * Gets a single Broadcast by ID
     *
     * Use ID returned from CreateBroadcast or from QueryBroadcast to retreive
     * information on indivual Broadcast. Include info such as campaign name, type,
     * status, ect...
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetBroadcast($Id)
    {
        $uri = $this->getUri('/broadcast/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Gets performance and result statistics for a Broadcast
     *
     * Get broadcast stats by broadcastId or by interval range. Stats include
     * information like billed amount, billed duration, actions count, attempt count,
     * etc...
     *
     * @api
     * @param int                       $Id                Unique ID of resource
     * @param Request\GetBroadcastStats $GetBroadcastStats
     */
    public function GetBroadcastStats($Id, Request\GetBroadcastStats $GetBroadcastStats)
    {
        $uri = $this->getUri('/broadcast/%s/stats', array($Id));

        return $this->get($uri, $GetBroadcastStats);
    }

    /**
     * Starts, Stops or Archives a Broadcast
     *
     * Apply command START, STOP, or ARCHIVE to Broadcast. Also can change the max
     * active count of Broadcast.
     *
     * @api
     * @param int                      $Id               Unique ID of resource
     * @param Request\ControlBroadcast $ControlBroadcast
     */
    public function ControlBroadcast($Id, Request\ControlBroadcast $ControlBroadcast)
    {
        $uri = $this->getUri('/broadcast/%s/control', array($Id));

        return $this->put($uri, $ControlBroadcast);
    }

    /**
     * Creates a new ContactBatch
     *
     * Contact Batch is a list of contacts to associate with a broadcast. Use this
     * operation to attach a list of contacts to an existing Campaign. A list of
     * ToNumbers or an existing Contact List ID is required to create and attach the
     * Contact List. Returned is the unique contactListId that can be used in
     * ControlContactBatch to enable or disable this batch.
     *
     * @api
     * @param int                        $BroadcastId        Id of Broadcast
     * @param Request\CreateContactBatch $CreateContactBatch
     */
    public function CreateContactBatch($BroadcastId, Request\CreateContactBatch $CreateContactBatch)
    {
        $uri = $this->getUri('/broadcast/%s/batch', array($BroadcastId));

        return $this->post($uri, $CreateContactBatch);
    }

    /**
     * Lists a Broadcast's ContactBatch
     *
     * Return list of Contact Batches associated with this Broadcast. The
     * contactBatchIds returned from this campaign can then be used to enable, disable,
     * or delete the individual Batches.
     *
     * @api
     * @param int                         $BroadcastId         Unique ID of Broadcast
     * @param Request\QueryContactBatches $QueryContactBatches
     */
    public function QueryContactBatches($BroadcastId, Request\QueryContactBatches $QueryContactBatches)
    {
        $uri = $this->getUri('/broadcast/%s/batch', array($BroadcastId));

        return $this->get($uri, $QueryContactBatches);
    }

    /**
     * Gets a ContactBatch by ID
     *
     * Retrieve info on individual Contact Batch using contactId returned from
     * CreateContactBatch
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetContactBatch($Id)
    {
        $uri = $this->getUri('/broadcast/batch/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Enables or Disables a Broadcast's ContactBatch
     *
     * This operation provides the ability to enable or disable on a Broadcast the list
     * of contacts associated with a ContactBatch.
     *
     * @api
     * @param int                         $Id                  Unique ID of resource
     * @param Request\ControlContactBatch $ControlContactBatch
     */
    public function ControlContactBatch($Id, Request\ControlContactBatch $ControlContactBatch)
    {
        $uri = $this->getUri('/broadcast/batch/%s/control', array($Id));

        return $this->put($uri, $ControlContactBatch);
    }

    /**
     * Creates a new Schedule for a Broadcast
     *
     * Broadcast can be set to run at scheduled times a prescribed by
     * BroadcastSchedule. Can pick start time, stop time, begin date, and day of week.
     * Returns broadcastScheduleId that can be used in GetBroadcastSchedule and
     * DeleteBroadcastSchedule
     *
     * @api
     * @param int                             $BroadcastId
     * @param Request\CreateBroadcastSchedule $CreateBroadcastSchedule
     */
    public function CreateBroadcastSchedule($BroadcastId, Request\CreateBroadcastSchedule $CreateBroadcastSchedule)
    {
        $uri = $this->getUri('/broadcast/%s/schedule', array($BroadcastId));

        return $this->post($uri, $CreateBroadcastSchedule);
    }

    /**
     * Lists existing BroadcastSchedules
     *
     * List information about Broadcast Schedules attached to a Broadcast.
     *
     * @api
     * @param int                            $BroadcastId            Unique ID of Broadcast
     * @param Request\QueryBroadcastSchedule $QueryBroadcastSchedule
     */
    public function QueryBroadcastSchedule($BroadcastId, Request\QueryBroadcastSchedule $QueryBroadcastSchedule)
    {
        $uri = $this->getUri('/broadcast/%s/schedule', array($BroadcastId));

        return $this->get($uri, $QueryBroadcastSchedule);
    }

    /**
     * Gets a BroadcastSchedule by ID
     *
     * List information about individual Broadcast Schedule attached to a Broadcast.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetBroadcastSchedule($Id)
    {
        $uri = $this->getUri('/broadcast/schedule/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Deletes a BroadcastSchedule by ID
     *
     * Delete BroadcastSchedule associated with a Broadcast.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function DeleteBroadcastSchedule($Id)
    {
        $uri = $this->getUri('/broadcast/schedule/%s', array($Id));

        return $this->delete($uri);
    }

    /**
     * Updates an existing Broadcast's configuration
     *
     * Update existing broadcast's configuration such as time zone restrictions or
     * retry logic. Currently all fields from config are updated so the 'Message' field
     * needs to be populated just like in CreateBroadcast operation.  Use unique ID to
     * specify broadcast. Need to provide dummy 'Name' field Broadcast even though the
     * field will not be overwritten.  Testing this method using swagger doc REST
     * interface (Try Me! button) does not work correctly. Please use curl or other
     * rest client to test api call.
     *
     * @api
     * @param Request\UpdateBroadcast $UpdateBroadcast = null
     * @param int                     $id
     */
    public function UpdateBroadcast($id, Request\UpdateBroadcast $UpdateBroadcast = null)
    {
        $uri = $this->getUri('/broadcast/%s', array($id));

        return $this->put($uri, $UpdateBroadcast);
    }

}
