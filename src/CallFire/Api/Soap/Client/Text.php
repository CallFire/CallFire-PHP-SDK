<?php

namespace CallFire\Api\Soap\Client;

use CallFire\Api\Soap\AbstractClient;
use CallFire\Api\Soap\Request as Request;
use CallFire\Api\Soap\Result as Result;

class Text extends AbstractClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::__construct($wsdl, $options);
    }

    /**
     * @param  Request\SendText   $sendText
     * @return Result\BroadcastId
     */
    public function SendText(Request\SendText $sendText)
    {
        $method = __FUNCTION__;

        return parent::$method($sendText);
    }

    /**
     * @param  Request\QueryTexts     $queryTexts
     * @return Result\TextQueryResult
     */
    public function QueryTexts(Request\QueryTexts $queryTexts)
    {
        $method = __FUNCTION__;

        return parent::$method($queryTexts);
    }

    /**
     * @param  Request\GetText $getText
     * @return Result\Text
     */
    public function GetText(Request\GetText $getText)
    {
        $method = __FUNCTION__;

        return parent::$method($getText);
    }

    /**
     * @param  Request\CreateAutoReply $createAutoReply
     * @return Result\AutoReplyId
     */
    public function CreateAutoReply(Request\CreateAutoReply $createAutoReply)
    {
        $method = __FUNCTION__;

        return parent::$method($createAutoReply);
    }

    /**
     * @param  Request\QueryAutoReplies    $queryAutoReplies
     * @return Result\AutoReplyQueryResult
     */
    public function QueryAutoReplies(Request\QueryAutoReplies $queryAutoReplies)
    {
        $method = __FUNCTION__;

        return parent::$method($queryAutoReplies);
    }

    /**
     * @param  Request\GetAutoReply $getAutoReply
     * @return Result\AutoReply
     */
    public function GetAutoReply(Request\GetAutoReply $getAutoReply)
    {
        $method = __FUNCTION__;

        return parent::$method($getAutoReply);
    }

    /**
     * @param  Request\DeleteAutoReply $deleteAutoReply
     * @return Result\Empty
     */
    public function DeleteAutoReply(Request\DeleteAutoReply $request)
    {
        $method = __FUNCTION__;

        return parent::$method($request);
    }

}
