<?php

namespace CallFire\Api\Soap;

use SoapClient;
use CallFire\Api\Soap\Request as Request;
use CallFire\Api\Soap\Response as Response;

class Client extends SoapClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::SoapClient($wsdl, $options);
    }

    /**
     * @param  Request\BroadcastRequest $Create
     * @return int
     */
    public function CreateBroadcast(Request\BroadcastRequest $Create)
    {
        $method = __FUNCTION__;

        return parent::$method($Create);
    }

    /**
     * @param  Request\QueryBroadcasts       $Query
     * @return Response\BroadcastQueryResult
     */
    public function QueryBroadcasts(Request\QueryBroadcasts $Query)
    {
        $method = __FUNCTION__;

        return parent::$method($Query);
    }

    /**
     * @param  Request\IdRequest  $Request
     * @return Response\Broadcast
     */
    public function GetBroadcast(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\BroadcastRequest $Update
     * @return void
     */
    public function UpdateBroadcast(Request\BroadcastRequest $Update)
    {
        $method = __FUNCTION__;

        return parent::$method($Update);
    }

    /**
     * @param  Request\GetBroadcastStats $Request
     * @return Response\BroadcastStats
     */
    public function GetBroadcastStats(Request\GetBroadcastStats $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\ControlBroadcast $Control
     * @return void
     */
    public function ControlBroadcast(Request\ControlBroadcast $Control)
    {
        $method = __FUNCTION__;

        return parent::$method($Control);
    }

    /**
     * @param  Request\CreateContactBatch $Create
     * @return int
     */
    public function CreateContactBatch(Request\CreateContactBatch $Create)
    {
        $method = __FUNCTION__;

        return parent::$method($Create);
    }

    /**
     * @param  Request\QueryContactBatches      $Query
     * @return Response\ContactBatchQueryResult
     */
    public function QueryContactBatches(Request\QueryContactBatches $Query)
    {
        $method = __FUNCTION__;

        return parent::$method($Query);
    }

    /**
     * @param  Request\IdRequest     $Request
     * @return Response\ContactBatch
     */
    public function GetContactBatch(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\ControlContactBatch $Update
     * @return void
     */
    public function ControlContactBatch(Request\ControlContactBatch $Update)
    {
        $method = __FUNCTION__;

        return parent::$method($Update);
    }

    /**
     * @param  Request\CreateBroadcastSchedule $Create
     * @return int
     */
    public function CreateBroadcastSchedule(Request\CreateBroadcastSchedule $Create)
    {
        $method = __FUNCTION__;

        return parent::$method($Create);
    }

    /**
     * @param  Request\QueryBroadcastSchedules       $Query
     * @return Response\BroadcastScheduleQueryResult
     */
    public function QueryBroadcastSchedule(Request\QueryBroadcastSchedules $Query)
    {
        $method = __FUNCTION__;

        return parent::$method($Query);
    }

    /**
     * @param  Request\IdRequest          $Request
     * @return Response\BroadcastSchedule
     */
    public function GetBroadcastSchedule(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest $Delete
     * @return void
     */
    public function DeleteBroadcastSchedule(Request\IdRequest $Delete)
    {
        $method = __FUNCTION__;

        return parent::$method($Delete);
    }

    /**
     * @param  Request\SubscriptionRequest $Request
     * @return int
     */
    public function CreateSubscription(Request\SubscriptionRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\Query                    $Request
     * @return Response\SubscriptionQueryResult
     */
    public function QuerySubscriptions(Request\Query $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest     $Request
     * @return Response\Subscription
     */
    public function GetSubscription(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\SubscriptionRequest $Request
     * @return void
     */
    public function UpdateSubscription(Request\SubscriptionRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest $Request
     * @return void
     */
    public function DeleteSubscription(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\SendText $Request
     * @return int
     */
    public function SendText(Request\SendText $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\ActionQuery      $Request
     * @return Response\TextQueryResult
     */
    public function QueryTexts(Request\ActionQuery $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest $Request
     * @return Response\Text
     */
    public function GetText(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\CreateAutoReply $Request
     * @return int
     */
    public function CreateAutoReply(Request\CreateAutoReply $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\QueryAutoReplies      $Request
     * @return Response\AutoReplyQueryResult
     */
    public function QueryAutoReplies(Request\QueryAutoReplies $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest  $Request
     * @return Response\AutoReply
     */
    public function GetAutoReply(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest $Request
     * @return void
     */
    public function DeleteAutoReply(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\SendCall $Request
     * @return int
     */
    public function SendCall(Request\SendCall $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\ActionQuery      $Request
     * @return Response\CallQueryResult
     */
    public function QueryCalls(Request\ActionQuery $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest $Request
     * @return Response\Call
     */
    public function GetCall(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\CreateSound $Create
     * @return int
     */
    public function CreateSound(Request\CreateSound $Create)
    {
        $method = __FUNCTION__;

        return parent::$method($Create);
    }

    /**
     * @param  Request\Query                 $Request
     * @return Response\SoundMetaQueryResult
     */
    public function QuerySoundMeta(Request\Query $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest  $Request
     * @return Response\SoundMeta
     */
    public function GetSoundMeta(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\GetSoundData $Get
     * @return string
     */
    public function GetSoundData(Request\GetSoundData $Get)
    {
        $method = __FUNCTION__;

        return parent::$method($Get);
    }

    /**
     * @param  Request\GetRecordingData $Get
     * @return string
     */
    public function GetRecordingData(Request\GetRecordingData $Get)
    {
        $method = __FUNCTION__;

        return parent::$method($Get);
    }

    /**
     * @param  Request\QueryContacts       $Request
     * @return Response\ContactQueryResult
     */
    public function QueryContacts(Request\QueryContacts $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\UpdateContacts $Request
     * @return void
     */
    public function UpdateContacts(Request\UpdateContacts $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\RemoveContacts $Request
     * @return void
     */
    public function RemoveContacts(Request\RemoveContacts $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest $Request
     * @return Response\Contact
     */
    public function GetContact(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest       $Request
     * @return Response\ContactHistory
     */
    public function GetContactHistory(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\CreateContactList $Request
     * @return int
     */
    public function CreateContactList(Request\CreateContactList $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\Query                   $Request
     * @return Response\ContactListQueryResult
     */
    public function QueryContactLists(Request\Query $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest $Request
     * @return void
     */
    public function DeleteContactList(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\ContactListRequest $Request
     * @return void
     */
    public function AddContactsToList(Request\ContactListRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\ContactListRequest $Request
     * @return void
     */
    public function RemoveContactsFromList(Request\ContactListRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\RegionQuery        $Request
     * @return Response\RegionQueryResult
     */
    public function QueryRegions(Request\RegionQuery $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\QueryNumbers       $Request
     * @return Response\NumberQueryResult
     */
    public function QueryNumbers(Request\QueryNumbers $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\GetNumber $Request
     * @return Response\Number
     */
    public function GetNumber(Request\GetNumber $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\ConfigureNumber $Request
     * @return void
     */
    public function ConfigureNumber(Request\ConfigureNumber $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\SearchAvailableNumbers $Request
     * @return Response\NumberQueryResult
     */
    public function SearchAvailableNumbers(Request\SearchAvailableNumbers $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\Query               $Request
     * @return Response\KeywordQueryResult
     */
    public function QueryKeywords(Request\Query $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\SearchAvailableKeywords $Request
     * @return Response\KeywordQueryResult
     */
    public function SearchAvailableKeywords(Request\SearchAvailableKeywords $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\CreateNumberOrder $Request
     * @return int
     */
    public function CreateNumberOrder(Request\CreateNumberOrder $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\IdRequest    $Request
     * @return Response\NumberOrder
     */
    public function GetNumberOrder(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\Release $Request
     * @return void
     */
    public function Release(Request\Release $Request)
    {
        $method = __FUNCTION__;

        return parent::$method($Request);
    }

    /**
     * @param  Request\DeleteLabel $DeleteLabel
     * @return void
     */
    public function DeleteLabel(Request\DeleteLabel $DeleteLabel)
    {
        $method = __FUNCTION__;

        return parent::$method($DeleteLabel);
    }

    /**
     * @param  Request\Query             $QueryLabels
     * @return Response\LabelQueryResult
     */
    public function QueryLabels(Request\Query $QueryLabels)
    {
        $method = __FUNCTION__;

        return parent::$method($QueryLabels);
    }

    /**
     * @param  Request\IdLabelRequest $LabelBroadcast
     * @return void
     */
    public function LabelBroadcast(Request\IdLabelRequest $LabelBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method($LabelBroadcast);
    }

    /**
     * @param  Request\IdLabelRequest $UnlabelBroadcast
     * @return void
     */
    public function UnlabelBroadcast(Request\IdLabelRequest $UnlabelBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method($UnlabelBroadcast);
    }

    /**
     * @param  Request\NumberLabelRequest $LabelNumber
     * @return void
     */
    public function LabelNumber(Request\NumberLabelRequest $LabelNumber)
    {
        $method = __FUNCTION__;

        return parent::$method($LabelNumber);
    }

    /**
     * @param  Request\NumberLabelRequest $UnlabelNumber
     * @return void
     */
    public function UnlabelNumber(Request\NumberLabelRequest $UnlabelNumber)
    {
        $method = __FUNCTION__;

        return parent::$method($UnlabelNumber);
    }

}
