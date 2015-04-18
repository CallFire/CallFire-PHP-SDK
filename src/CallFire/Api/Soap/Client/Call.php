<?php

namespace CallFire\Api\Soap\Client;

use CallFire\Api\Soap\AbstractClient;
use CallFire\Api\Soap\Request as Request;
use CallFire\Api\Soap\Result as Result;

class Call extends AbstractClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::__construct($wsdl, $options);
    }

    /**
     * @api
     * @param  Request\SendCall   $sendCall
     * @return Result\BroadcastId
     */
    public function SendCall(Request\SendCall $sendCall)
    {
        $method = __FUNCTION__;

        return parent::$method($sendCall);
    }

    /**
     * @api
     * @param  Request\QueryCalls     $queryCalls
     * @return Result\CallQueryResult
     */
    public function QueryCalls(Request\QueryCalls $queryCalls)
    {
        $method = __FUNCTION__;

        return parent::$method($queryCalls);
    }

    /**
     * @api
     * @param  Request\GetCall $getCall
     * @return Result\Call
     */
    public function GetCall(Request\GetCall $getCall)
    {
        $method = __FUNCTION__;

        return parent::$method($getCall);
    }

    /**
     * @api
     * @param  Request\CreateSound $createSound
     * @return Result\SoundMetaId
     */
    public function CreateSound(Request\CreateSound $createSound)
    {
        $method = __FUNCTION__;

        return parent::$method($createSound);
    }

    /**
     * @api
     * @param  Request\QuerySoundMeta      $querySoundMeta
     * @return Result\SoundMetaQueryResult
     */
    public function QuerySoundMeta(Request\QuerySoundMeta $querySoundMeta)
    {
        $method = __FUNCTION__;

        return parent::$method($querySoundMeta);
    }

    /**
     * @api
     * @param  Request\GetSoundMeta $getSoundMeta
     * @return Result\SoundMeta
     */
    public function GetSoundMeta(Request\GetSoundMeta $getSoundMeta)
    {
        $method = __FUNCTION__;

        return parent::$method($getSoundMeta);
    }

    /**
     * @api
     * @param  Request\GetSoundData $getSoundData
     * @return Result\SoundData
     */
    public function GetSoundData(Request\GetSoundData $getSoundData)
    {
        $method = __FUNCTION__;

        return parent::$method($getSoundData);
    }

    /**
     * @api
     * @param  Request\GetRecordingData $getRecordingData
     * @return Result\RecordingData
     */
    public function GetRecordingData(Request\GetRecordingData $getRecordingData)
    {
        $method = __FUNCTION__;

        return parent::$method($getRecordingData);
    }

    /**
     * @api
     * @param Request\SendVerificationCodeToCallerId
     * $sendVerificationCodeToCallerIdRequest
     * @return Result\Empty
     */
    public function SendVerificationCodeToCallerId(Request\SendVerificationCodeToCallerIdRequest $sendVerificationCodeToCallerIdRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($sendVerificationCodeToCallerIdRequest);
    }

    /**
     * @api
     * @param  Request\VerifyCallerId        $verifyCallerIdRequest
     * @return Result\VerifyCallerIdResponse
     */
    public function VerifyCallerId(Request\VerifyCallerIdRequest $verifyCallerIdRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($verifyCallerIdRequest);
    }

    /**
     * @api
     * @param  Request\GetCallerIds        $getCallerIdsRequest
     * @return Result\GetCallerIdsResponse
     */
    public function GetCallerIds(Request\GetCallerIdsRequest $getCallerIdsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getCallerIdsRequest);
    }

}
