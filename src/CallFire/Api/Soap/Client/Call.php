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
     * @param  Request\SendCall   $sendCall
     * @return Result\BroadcastId
     */
    public function SendCall(Request\SendCall $sendCall)
    {
        $method = __FUNCTION__;

        return parent::$method($sendCall);
    }

    /**
     * @param  Request\QueryCalls     $queryCalls
     * @return Result\CallQueryResult
     */
    public function QueryCalls(Request\QueryCalls $queryCalls)
    {
        $method = __FUNCTION__;

        return parent::$method($queryCalls);
    }

    /**
     * @param  Request\GetCall $getCall
     * @return Result\Call
     */
    public function GetCall(Request\GetCall $getCall)
    {
        $method = __FUNCTION__;

        return parent::$method($getCall);
    }

    /**
     * @param  Request\CreateSound $createSound
     * @return Result\SoundMetaId
     */
    public function CreateSound(Request\CreateSound $createSound)
    {
        $method = __FUNCTION__;

        return parent::$method($createSound);
    }

    /**
     * @param  Request\QuerySoundMeta      $querySoundMeta
     * @return Result\SoundMetaQueryResult
     */
    public function QuerySoundMeta(Request\QuerySoundMeta $querySoundMeta)
    {
        $method = __FUNCTION__;

        return parent::$method($querySoundMeta);
    }

    /**
     * @param  Request\GetSoundMeta $getSoundMeta
     * @return Result\SoundMeta
     */
    public function GetSoundMeta(Request\GetSoundMeta $getSoundMeta)
    {
        $method = __FUNCTION__;

        return parent::$method($getSoundMeta);
    }

    /**
     * @param  Request\GetSoundData $getSoundData
     * @return Result\SoundData
     */
    public function GetSoundData(Request\GetSoundData $getSoundData)
    {
        $method = __FUNCTION__;

        return parent::$method($getSoundData);
    }

    /**
     * @param  Request\GetRecordingData $getRecordingData
     * @return Result\RecordingData
     */
    public function GetRecordingData(Request\GetRecordingData $getRecordingData)
    {
        $method = __FUNCTION__;

        return parent::$method($getRecordingData);
    }

}
