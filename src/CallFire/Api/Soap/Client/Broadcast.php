<?php

namespace CallFire\Api\Soap\Client;

use CallFire\Api\Soap\AbstractClient;
use CallFire\Api\Soap\Request as Request;
use CallFire\Api\Soap\Result as Result;

class Broadcast extends AbstractClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::__construct($wsdl, $options);
    }

    /**
     * @param  Request\CreateBroadcast $createBroadcast
     * @return Result\BroadcastId
     */
    public function CreateBroadcast(Request\CreateBroadcast $createBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method($createBroadcast);
    }

    /**
     * @param  Request\QueryBroadcasts     $queryBroadcasts
     * @return Result\BroadcastQueryResult
     */
    public function QueryBroadcasts(Request\QueryBroadcasts $queryBroadcasts)
    {
        $method = __FUNCTION__;

        return parent::$method($queryBroadcasts);
    }

    /**
     * @param  Request\GetBroadcast $getBroadcast
     * @return Result\Broadcast
     */
    public function GetBroadcast(Request\GetBroadcast $getBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method($getBroadcast);
    }

    /**
     * @param  Request\UpdateBroadcast        $updateBroadcast
     * @return Result\UpdateBroadcastResponse
     */
    public function UpdateBroadcast(Request\UpdateBroadcast $updateBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method($updateBroadcast);
    }

    /**
     * @param  Request\GetBroadcastStats $getBroadcastStats
     * @return Result\BroadcastStats
     */
    public function GetBroadcastStats(Request\GetBroadcastStats $getBroadcastStats)
    {
        $method = __FUNCTION__;

        return parent::$method($getBroadcastStats);
    }

    /**
     * @param  Request\ControlBroadcast        $controlBroadcast
     * @return Result\ControlBroadcastResponse
     */
    public function ControlBroadcast(Request\ControlBroadcast $controlBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method($controlBroadcast);
    }

    /**
     * @param  Request\CreateContactBatch $createContactBatch
     * @return Result\ContactBatchId
     */
    public function CreateContactBatch(Request\CreateContactBatch $createContactBatch)
    {
        $method = __FUNCTION__;

        return parent::$method($createContactBatch);
    }

    /**
     * @param  Request\QueryContactBatches $queryContactBatches
     * @return Result\ContactBatches
     */
    public function QueryContactBatches(Request\QueryContactBatches $queryContactBatches)
    {
        $method = __FUNCTION__;

        return parent::$method($queryContactBatches);
    }

    /**
     * @param  Request\GetContactBatch     $getContactBatch
     * @return Result\ContactBatchResponse
     */
    public function GetContactBatch(Request\GetContactBatch $getContactBatch)
    {
        $method = __FUNCTION__;

        return parent::$method($getContactBatch);
    }

    /**
     * @param  Request\ControlContactBatch        $controlContactBatch
     * @return Result\ControlContactBatchResponse
     */
    public function ControlContactBatch(Request\ControlContactBatch $controlContactBatch)
    {
        $method = __FUNCTION__;

        return parent::$method($controlContactBatch);
    }

    /**
     * @param  Request\CreateBroadcastSchedule $createBroadcastSchedule
     * @return Result\BroadcastScheduleId
     */
    public function CreateBroadcastSchedule(Request\CreateBroadcastSchedule $createBroadcastSchedule)
    {
        $method = __FUNCTION__;

        return parent::$method($createBroadcastSchedule);
    }

    /**
     * @param  Request\QueryBroadcastSchedule $queryBroadcastSchedules
     * @return Result\BroadcastSchedules
     */
    public function QueryBroadcastSchedule(Request\QueryBroadcastSchedules $queryBroadcastSchedule)
    {
        $method = __FUNCTION__;

        return parent::$method($queryBroadcastSchedule);
    }

    /**
     * @param  Request\GetBroadcastSchedule     $getBroadcastSchedule
     * @return Result\BroadcastScheduleResponse
     */
    public function GetBroadcastSchedule(Request\GetBroadcastSchedule $getBroadcastSchedule)
    {
        $method = __FUNCTION__;

        return parent::$method($getBroadcastSchedule);
    }

    /**
     * @param  Request\DeleteBroadcastSchedule       $deleteBroadcastSchedule
     * @return Result\DeleteBroadcastServiceResponse
     */
    public function DeleteBroadcastSchedule(Request\DeleteBroadcastSchedule $deleteBroadcastSchedule)
    {
        $method = __FUNCTION__;

        return parent::$method($deleteBroadcastSchedule);
    }

}
