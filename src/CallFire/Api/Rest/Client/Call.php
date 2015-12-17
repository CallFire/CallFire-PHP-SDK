<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Call extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    /**
     * Creates a call broadcast, adds numbers to it, and sends it immediately
     *
     * Start sending calls using VoiceBroadcastConfig or by setting up an IVR using
     * IvrBroadcastConfig. Sending a call requires at least a ToNumber and sound id or
     * an IVR. The returned broadcastId can be passed to QueryCalls to get state of
     * call actions in campaign and get list of individual callIds for use in GetCall
     * request. The broadcastId can also be passed to GetBroadcastStats to get
     * information about the call campaign, such as BilledAmount, Duration, State,
     * etc...
     *
     * @api
     * @param Request\SendCall $SendCall = null
     */
    public function SendCall(Request\SendCall $SendCall = null)
    {
        $uri = $this->getUri('/call', array());

        return $this->post($uri, $SendCall);
    }

    /**
     * Lists inbound and outbound calls
     *
     * Query for calls using standard ActionQuery which filters on batchId,
     * broadcastId, toNumber, etc... Returns a list of calls and all associated info.
     * See GetCall to return just a single call action by id.
     *
     * @api
     * @param Request\QueryCalls $QueryCalls = null
     */
    public function QueryCalls(Request\QueryCalls $QueryCalls = null)
    {
        $uri = $this->getUri('/call', array());

        return $this->get($uri, $QueryCalls);
    }

    /**
     * Gets a call by ID
     *
     * Return individual call action. See QueryCalls to return a list of call actions
     * and determine individual callIds.  General usage is to start a call campaign
     * using SendCall, then to pass returned broadcastId to QueryCalls to determine
     * callIds of call actions created. This GetCall can then be called with unique
     * callId to determine info and state of call action.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetCall($Id)
    {
        $uri = $this->getUri('/call/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Creates a new CallFire-hosted sound for use in calls.
     *
     * There are two ways to create a sound: (1) uploading a pre-recorded WAV or MP3,
     * or (2) initiating a call to record a sound over the phone.  Duplicate uploads
     * are not allowed. If a duplicate sound data are provided, a new sound is not
     * created. Instead, the ID of the previous sound is returned.  Recording a sound
     * over the phone works by first creating a sound asset using the RecordingCall
     * option, then call the ToNumber to record live voice as sound. If sound is
     * created using RecordingCall then need to wait for sound to be active by calling
     * GetSoundMeta until Status = 'ACTIVE'.  Use the returned soundId in a subsequent
     * SendCall request.
     *
     * @api
     * @param Request\CreateSound $CreateSound = null
     */
    public function CreateSound(Request\CreateSound $CreateSound = null)
    {
        $uri = $this->getUri('/call/sound', array());

        return $this->post($uri, $CreateSound);
    }

    /**
     * Lists sounds available for use in calls.
     *
     * Return list of sound meta info that includes id, status, name, length, etc...
     * This operation only returns meta info, not the actual sound data. The raw binary
     * sound data can be obtained from the GetSoundData.
     *
     * @api
     * @param Request\QuerySoundMeta $QuerySoundMeta = null
     */
    public function QuerySoundMeta(Request\QuerySoundMeta $QuerySoundMeta = null)
    {
        $uri = $this->getUri('/call/sound', array());

        return $this->get($uri, $QuerySoundMeta);
    }

    /**
     * Gets metadata for a sound for use in calls
     *
     * Return sound meta info for specified sound that includes id, status, name,
     * length, etc... This operation only returns meta info, not the actual sound data.
     * The raw binary sound data can be obtained from the GetSoundData.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetSoundMeta($Id)
    {
        $uri = $this->getUri('/call/sound/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Sends call to callerId number and voice verification code
     *
     * Creating broadcasts requires a verified callerId (FromNumber) as one of the
     * mandatory parameters. This api method along with VerifyCallerIdRequest can be
     * used to verify a callerId that can be used in subsequent create broadcast
     * requests.
     *
     * @api
     * @param Request\SendVerificationCodeToCallerId $SendVerificationCodeToCallerId =
     * null
     */
    public function SendVerificationCodeToCallerId(Request\SendVerificationCodeToCallerId $SendVerificationCodeToCallerId = null)
    {
        $uri = $this->getUri('/call/callerid/send-verification', array());

        return $this->post($uri, $SendVerificationCodeToCallerId);
    }

    /**
     * Verify callerId by including verification code
     *
     * Verifying a callerId is a two step process. First a verification code must be
     * sent to callerId SendVerificationCodeToCallerId. Then the verificationCode sent
     * to callerId must be entered here to mark callerId as verified.
     *
     * @api
     * @param Request\VerifyCallerId $VerifyCallerId = null
     */
    public function VerifyCallerId(Request\VerifyCallerId $VerifyCallerId = null)
    {
        $uri = $this->getUri('/call/callerid/verify', array());

        return $this->post($uri, $VerifyCallerId);
    }

    /**
     * Return list of verified callerIds
     *
     * Creating broadcasts requires verified callerId as FromNumber. This method
     * returns the list of callerId numbers that have been verified and can be used to
     * create broadcasts. See SendVerificationCodeToCallerId and VerifyCallerIdRequest
     * for instructions on how to verify a callerId.
     *
     * @api
     * @param Request\GetCallerIds $GetCallerIds = null
     */
    public function GetCallerIds(Request\GetCallerIds $GetCallerIds = null)
    {
        $uri = $this->getUri('/call/callerid', array());

        return $this->get($uri, $GetCallerIds);
    }

}
