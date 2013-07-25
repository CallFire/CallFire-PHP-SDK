<?php

namespace CallFire\Api\Soap;

use SoapClient;
use CallFire\Api\Soap\Request as Request;

class Client extends SoapClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::SoapClient($wsdl, $options);
    }

    public function CreateBroadcast(Request\BroadcastRequest $Create)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryBroadcasts(Request\QueryBroadcasts $Query)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetBroadcast(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function UpdateBroadcast(Request\BroadcastRequest $Update)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetBroadcastStats(Request\GetBroadcastStats $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function ControlBroadcast(Request\ControlBroadcast $Control)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function CreateContactBatch(Request\CreateContactBatch $Create)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryContactBatches(Request\QueryContactBatches $Query)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetContactBatch(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function ControlContactBatch(Request\ControlContactBatch $Update)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function CreateBroadcastSchedule(Request\CreateBroadcastSchedule $Create)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryBroadcastSchedule(Request\QueryBroadcastSchedules $Query)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetBroadcastSchedule(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function DeleteBroadcastSchedule(Request\IdRequest $Delete)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function CreateSubscription(Request\SubscriptionRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QuerySubscriptions(Request\Query $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetSubscription(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function UpdateSubscription(Request\SubscriptionRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function DeleteSubscription(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function SendText(Request\SendText $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryTexts(Request\ActionQuery $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetText(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function CreateAutoReply(Request\CreateAutoReply $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryAutoReplies(Request\Query $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetAutoReply(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function DeleteAutoReply(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function SendCall(Request\SendCall $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryCalls(Request\ActionQuery $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetCall(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function CreateSound(Request\CreateSound $Create)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QuerySoundMeta(Request\Query $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetSoundMeta(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetSoundData(Request\GetSoundData $Get)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetRecordingData(Request\GetRecordingData $Get)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryContacts(Request\QueryContacts $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function UpdateContacts(Request\UpdateContacts $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function RemoveContacts(Request\RemoveContacts $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetContact(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetContactHistory(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function CreateContactList(Request\CreateContactList $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryContactLists(Request\Query $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function DeleteContactList(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function AddContactsToList(Request\ContactListRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function RemoveContactsFromList(Request\ContactListRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryRegions(Request\RegionQuery $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryNumbers(Request\QueryNumbers $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetNumber(Request\GetNumber $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function ConfigureNumber(Request\ConfigureNumber $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function SearchAvailableNumbers(Request\SearchAvailableNumbers $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryKeywords(Request\Query $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function SearchAvailableKeywords(Request\SearchAvailableKeywords $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function CreateNumberOrder(Request\CreateNumberOrder $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function GetNumberOrder(Request\IdRequest $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function Release(Request\Release $Request)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function DeleteLabel(Request\DeleteLabel $DeleteLabel)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function QueryLabels(Request\Query $QueryLabels)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function LabelBroadcast(Request\IdLabelRequest $LabelBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function UnlabelBroadcast(Request\IdLabelRequest $UnlabelBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function LabelNumber(Request\NumberLabelRequest $LabelNumber)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

    public function UnlabelNumber(Request\NumberLabelRequest $UnlabelNumber)
    {
        $method = __FUNCTION__;

        return parent::$method();
    }

}
