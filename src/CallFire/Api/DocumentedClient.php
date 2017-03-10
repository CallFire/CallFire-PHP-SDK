<?php
namespace CallFire\Api;

use Swagger\Client as SwaggerClient;

/**
 * Api client class
 *
 * The class is used to instantiate api client
 *
 * @package    Callfire
 * @subpackage Api
 * @author     Justin Martin <jmart@callfire.com>

 * @method SwaggerClient\Request findCalls()
 *
 * findCalls example
 * $client = Client::createClient("login", "password");
 * $request = $client->findCalls();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "id" => [],
 *                                                          "campaignId" => integer,
 *                                                          "batchId" => integer,
 *                                                          "fromNumber" => "string",
 *                                                          "toNumber" => "string",
 *                                                          "label" => "string",
 *                                                          "states" => "string",
 *                                                          "results" => "string",
 *                                                          "inbound" => boolean,
 *                                                          "intervalBegin" => integer,
 *                                                          "intervalEnd" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request sendCalls()
 *
 * sendCalls example
 * $client = Client::createClient("login", "password");
 * $request = $client->sendCalls();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "campaignId" => integer,
 *                                                          "defaultLiveMessage" => "string",
 *                                                          "defaultMachineMessage" => "string",
 *                                                          "defaultLiveMessageSoundId" => integer,
 *                                                          "defaultMachineMessageSoundId" => integer,
 *                                                          "defaultVoice" => "string"));
 * $request->getOperationConfig()->setBodyParameter("[
 *                                                     {
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ],
 *                                                        "dialplanXml" : "string",
 *                                                        "liveMessage" : "string",
 *                                                        "liveMessageSoundId" : integer,
 *                                                        "machineMessage" : "string",
 *                                                        "machineMessageSoundId" : integer,
 *                                                        "transferMessage" : "string",
 *                                                        "transferMessageSoundId" : integer,
 *                                                        "transferDigit" : "string",
 *                                                        "transferNumber" : "string",
 *                                                        "voice" : "string"
 *                                                     }
 *                                                   ]");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findCallBroadcasts()
 *
 * findCallBroadcasts example
 * $client = Client::createClient("login", "password");
 * $request = $client->findCallBroadcasts();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "label" => "string",
 *                                                          "name" => "string",
 *                                                          "running" => boolean));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request createCallBroadcast()
 *
 * createCallBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->createCallBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setQueryParameters(array("start" => boolean));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "name" : "string",
 *                                                      "status" : "string",
 *                                                      "lastModified" : integer,
 *                                                      "fromNumber" : "string",
 *                                                      "localTimeRestriction" : {
 *                                                        "enabled" : boolean,
 *                                                        "beginHour" : integer,
 *                                                        "beginMinute" : integer,
 *                                                        "endHour" : integer,
 *                                                        "endMinute" : integer
 *                                                      },
 *                                                      "schedules" : [{
 *                                                        "startTimeOfDay" : {
 *                                                          "hour" : integer,
 *                                                          "minute" : integer,
 *                                                          "second" : integer
 *                                                        },
 *                                                        "stopTimeOfDay" : {
 *                                                          "hour" : integer,
 *                                                          "minute" : integer,
 *                                                          "second" : integer
 *                                                        },
 *                                                        "daysOfWeek" : [ "string" ],
 *                                                        "timeZone" : "string",
 *                                                        "id" : integer,
 *                                                        "campaignId" : integer,
 *                                                        "startDate" : {
 *                                                          "year" : integer,
 *                                                          "month" : integer,
 *                                                          "day" : integer
 *                                                        },
 *                                                        "stopDate" : {
 *                                                          "year" : integer,
 *                                                          "month" : integer,
 *                                                          "day" : integer
 *                                                        }
 *                                                      }],
 *                                                      "maxActive" : integer,
 *                                                      "labels" : [ "string" ],
 *                                                      "resumeNextDay" : boolean,
 *                                                      "retryConfig" : {
 *                                                        "maxAttempts" : integer,
 *                                                        "minutesBetweenAttempts" : integer,
 *                                                        "retryResults" : [ "string" ],
 *                                                        "retryPhoneTypes" : [ "string" ]
 *                                                      },
 *                                                      "recipients" : [{
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ]
 *                                                      }],
 *                                                      "dialplanXml" : "string",
 *                                                      "sounds" : {
 *                                                        "liveSoundText" : "string",
 *                                                        "liveSoundTextVoice" : "string",
 *                                                        "liveSoundId" : integer,
 *                                                        "machineSoundText" : "string",
 *                                                        "machineSoundTextVoice" : "string",
 *                                                        "machineSoundId" : integer,
 *                                                        "transferSoundText" : "string",
 *                                                        "transferSoundTextVoice" : "string",
 *                                                        "transferSoundId" : integer,
 *                                                        "transferDigit" : "string",
 *                                                        "transferNumber" : "string",
 *                                                        "dncSoundText" : "string",
 *                                                        "dncSoundTextVoice" : "string",
 *                                                        "dncSoundId" : integer,
 *                                                        "dncDigit" : "string"
 *                                                      },
 *                                                      "answeringMachineConfig" : "string",
 *                                                      "maxActiveTransfers" : integer
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallBroadcast()
 *
 * getCallBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallBroadcast();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateCallBroadcast()
 *
 * updateCallBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateCallBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "name" : "string",
 *                                                      "status" : "string",
 *                                                      "lastModified" : integer,
 *                                                      "fromNumber" : "string",
 *                                                      "localTimeRestriction" : {
 *                                                        "enabled" : boolean,
 *                                                        "beginHour" : integer,
 *                                                        "beginMinute" : integer,
 *                                                        "endHour" : integer,
 *                                                        "endMinute" : integer
 *                                                      },
 *                                                      "schedules" : [{
 *                                                        "startTimeOfDay" : {
 *                                                          "hour" : integer,
 *                                                          "minute" : integer,
 *                                                          "second" : integer
 *                                                        },
 *                                                        "stopTimeOfDay" : {
 *                                                          "hour" : integer,
 *                                                          "minute" : integer,
 *                                                          "second" : integer
 *                                                        },
 *                                                        "daysOfWeek" : [ "string" ],
 *                                                        "timeZone" : "string",
 *                                                        "id" : integer,
 *                                                        "campaignId" : integer,
 *                                                        "startDate" : {
 *                                                          "year" : integer,
 *                                                          "month" : integer,
 *                                                          "day" : integer
 *                                                        },
 *                                                        "stopDate" : {
 *                                                          "year" : integer,
 *                                                          "month" : integer,
 *                                                          "day" : integer
 *                                                        }
 *                                                      }],
 *                                                      "maxActive" : integer,
 *                                                      "labels" : [ "string" ],
 *                                                      "resumeNextDay" : boolean,
 *                                                      "retryConfig" : {
 *                                                        "maxAttempts" : integer,
 *                                                        "minutesBetweenAttempts" : integer,
 *                                                        "retryResults" : [ "string" ],
 *                                                        "retryPhoneTypes" : [ "string" ]
 *                                                      },
 *                                                      "recipients" : [{
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ]
 *                                                      }],
 *                                                      "dialplanXml" : "string",
 *                                                      "sounds" : {
 *                                                        "liveSoundText" : "string",
 *                                                        "liveSoundTextVoice" : "string",
 *                                                        "liveSoundId" : integer,
 *                                                        "machineSoundText" : "string",
 *                                                        "machineSoundTextVoice" : "string",
 *                                                        "machineSoundId" : integer,
 *                                                        "transferSoundText" : "string",
 *                                                        "transferSoundTextVoice" : "string",
 *                                                        "transferSoundId" : integer,
 *                                                        "transferDigit" : "string",
 *                                                        "transferNumber" : "string",
 *                                                        "dncSoundText" : "string",
 *                                                        "dncSoundTextVoice" : "string",
 *                                                        "dncSoundId" : integer,
 *                                                        "dncDigit" : "string"
 *                                                      },
 *                                                      "answeringMachineConfig" : "string",
 *                                                      "maxActiveTransfers" : integer
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request archiveVoiceBroadcast()
 *
 * archiveVoiceBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->archiveVoiceBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallBroadcastBatches()
 *
 * getCallBroadcastBatches example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallBroadcastBatches();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request addCallBroadcastBatch()
 *
 * addCallBroadcastBatch example
 * $client = Client::createClient("login", "password");
 * $request = $client->addCallBroadcastBatch();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "name" : "string",
 *                                                      "contactListId" : integer,
 *                                                      "recipients" : [{
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ]
 *                                                      }],
 *                                                      "scrubDuplicates" : boolean
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallBroadcastCalls()
 *
 * getCallBroadcastCalls example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallBroadcastCalls();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("batchId" => integer,
 *                                                          "fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request addCallBroadcastRecipients()
 *
 * addCallBroadcastRecipients example
 * $client = Client::createClient("login", "password");
 * $request = $client->addCallBroadcastRecipients();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $request->getOperationConfig()->setBodyParameter("[
 *                                                     {
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ]
 *                                                     }
 *                                                   ]");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request startVoiceBroadcast()
 *
 * startVoiceBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->startVoiceBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallBroadcastStats()
 *
 * getCallBroadcastStats example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallBroadcastStats();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "begin" => integer,
 *                                                          "end" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request stopVoiceBroadcast()
 *
 * stopVoiceBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->stopVoiceBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallRecording()
 *
 * getCallRecording example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallRecording();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallRecordingMp3()
 *
 * getCallRecordingMp3 example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallRecordingMp3();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCall()
 *
 * getCall example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCall();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallRecordings()
 *
 * getCallRecordings example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallRecordings();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallRecordingByName()
 *
 * getCallRecordingByName example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallRecordingByName();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer,
 *                                                         "name" => "string"));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallRecordingMp3ByName()
 *
 * getCallRecordingMp3ByName example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallRecordingMp3ByName();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer,
 *                                                         "name" => "string"));
 * $result = $client->request($request);


 * @method SwaggerClient\Request getCampaignBatch()
 *
 * getCampaignBatch example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCampaignBatch();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateCampaignBatch()
 *
 * updateCampaignBatch example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateCampaignBatch();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "name" : "string",
 *                                                      "status" : "string",
 *                                                      "broadcastId" : integer,
 *                                                      "created" : integer,
 *                                                      "size" : integer,
 *                                                      "remaining" : integer,
 *                                                      "enabled" : boolean
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findCampaignSounds()
 *
 * findCampaignSounds example
 * $client = Client::createClient("login", "password");
 * $request = $client->findCampaignSounds();
 * $request->getOperationConfig()->setQueryParameters(array("limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "filter" => "string",
 *                                                          "includeArchived" => boolean,
 *                                                          "includePending" => boolean,
 *                                                          "includeScrubbed" => boolean,
 *                                                          "fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request postCallCampaignSound()
 *
 * postCallCampaignSound example
 * $client = Client::createClient("login", "password");
 * $request = $client->postCallCampaignSound();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "name" : "string",
 *                                                      "toNumber" : "string"
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request postFileCampaignSound()
 *
 * postFileCampaignSound example
 * $client = Client::createClient("login", "password");
 * $request = $client->postFileCampaignSound();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $request->getOperationConfig()->setFileUpload("fullFilePath", "fileName");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request postTTSCampaignSound()
 *
 * postTTSCampaignSound example
 * $client = Client::createClient("login", "password");
 * $request = $client->postTTSCampaignSound();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "voice" : "string",
 *                                                      "message" : "string"
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCampaignSound()
 *
 * getCampaignSound example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCampaignSound();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request deleteCampaignSound()
 *
 * deleteCampaignSound example
 * $client = Client::createClient("login", "password");
 * $request = $client->deleteCampaignSound();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCampaignSoundDataMp3()
 *
 * getCampaignSoundDataMp3 example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCampaignSoundDataMp3();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->request($request);


 * @method SwaggerClient\Request getCampaignSoundDataWav()
 *
 * getCampaignSoundDataWav example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCampaignSoundDataWav();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->request($request);


 * @method SwaggerClient\Request findContacts()
 *
 * findContacts example
 * $client = Client::createClient("login", "password");
 * $request = $client->findContacts();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "id" => [],
 *                                                          "number" => [],
 *                                                          "contactListId" => integer,
 *                                                          "propertyName" => "string",
 *                                                          "propertyValue" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request createContacts()
 *
 * createContacts example
 * $client = Client::createClient("login", "password");
 * $request = $client->createContacts();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setBodyParameter("[
 *                                                     {
 *                                                        "id" : integer,
 *                                                        "firstName" : "string",
 *                                                        "lastName" : "string",
 *                                                        "zipcode" : "string",
 *                                                        "homePhone" : "string",
 *                                                        "workPhone" : "string",
 *                                                        "mobilePhone" : "string",
 *                                                        "extraPhone1" : "string",
 *                                                        "extraPhone2" : "string",
 *                                                        "extraPhone3" : "string",
 *                                                        "externalId" : "string",
 *                                                        "externalSystem" : "string",
 *                                                        "properties" : [ "string" ],
 *                                                        "deleted" : boolean
 *                                                     }
 *                                                   ]");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findDoNotContacts()
 *
 * findDoNotContacts example
 * $client = Client::createClient("login", "password");
 * $request = $client->findDoNotContacts();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "prefix" => "string",
 *                                                          "campaignId" => integer,
 *                                                          "source" => "string",
 *                                                          "call" => boolean,
 *                                                          "text" => boolean,
 *                                                          "number" => []));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request addDoNotContacts()
 *
 * addDoNotContacts example
 * $client = Client::createClient("login", "password");
 * $request = $client->addDoNotContacts();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "source" : "string",
 *                                                      "call" : boolean,
 *                                                      "text" : boolean,
 *                                                      "numbers" : [ "string" ]
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request deleteDoNotContactsBySource()
 *
 * deleteDoNotContactsBySource example
 * $client = Client::createClient("login", "password");
 * $request = $client->deleteDoNotContactsBySource();
 * $request->getOperationConfig()->setPathParameters(array("source" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getUniversalDoNotContacts()
 *
 * getUniversalDoNotContacts example
 * $client = Client::createClient("login", "password");
 * $request = $client->getUniversalDoNotContacts();
 * $request->getOperationConfig()->setPathParameters(array("toNumber" => "string"));
 * $request->getOperationConfig()->setQueryParameters(array("fromNumber" => "string",
 *                                                          "fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getDoNotContact()
 *
 * getDoNotContact example
 * $client = Client::createClient("login", "password");
 * $request = $client->getDoNotContact();
 * $request->getOperationConfig()->setPathParameters(array("number" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateDoNotContact()
 *
 * updateDoNotContact example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateDoNotContact();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("number" => "string"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "number" : "string",
 *                                                      "call" : boolean,
 *                                                      "text" : boolean,
 *                                                      "source" : "string",
 *                                                      "campaignId" : integer,
 *                                                      "created" : integer
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request deleteDoNotContact()
 *
 * deleteDoNotContact example
 * $client = Client::createClient("login", "password");
 * $request = $client->deleteDoNotContact();
 * $request->getOperationConfig()->setPathParameters(array("number" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findContactLists()
 *
 * findContactLists example
 * $client = Client::createClient("login", "password");
 * $request = $client->findContactLists();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "name" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request createContactList()
 *
 * createContactList example
 * $client = Client::createClient("login", "password");
 * $request = $client->createContactList();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "contacts" : [{
 *                                                        "id" : integer,
 *                                                        "firstName" : "string",
 *                                                        "lastName" : "string",
 *                                                        "zipcode" : "string",
 *                                                        "homePhone" : "string",
 *                                                        "workPhone" : "string",
 *                                                        "mobilePhone" : "string",
 *                                                        "extraPhone1" : "string",
 *                                                        "extraPhone2" : "string",
 *                                                        "extraPhone3" : "string",
 *                                                        "externalId" : "string",
 *                                                        "externalSystem" : "string",
 *                                                        "properties" : [ "string" ],
 *                                                        "deleted" : boolean
 *                                                      }],
 *                                                      "contactIds" : [ integer ],
 *                                                      "contactNumbers" : [ "string" ],
 *                                                      "contactNumbersField" : "string",
 *                                                      "name" : "string"
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request createContactListFromFile()
 *
 * createContactListFromFile example
 * $client = Client::createClient("login", "password");
 * $request = $client->createContactListFromFile();
 * $request->getOperationConfig()->setFileUpload("fullFilePath", "fileName");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getContactList()
 *
 * getContactList example
 * $client = Client::createClient("login", "password");
 * $request = $client->getContactList();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateContactList()
 *
 * updateContactList example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateContactList();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "name" : "string"
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request deleteContactList()
 *
 * deleteContactList example
 * $client = Client::createClient("login", "password");
 * $request = $client->deleteContactList();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getContactListItems()
 *
 * getContactListItems example
 * $client = Client::createClient("login", "password");
 * $request = $client->getContactListItems();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request addContactListItems()
 *
 * addContactListItems example
 * $client = Client::createClient("login", "password");
 * $request = $client->addContactListItems();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "contacts" : [{
 *                                                        "id" : integer,
 *                                                        "firstName" : "string",
 *                                                        "lastName" : "string",
 *                                                        "zipcode" : "string",
 *                                                        "homePhone" : "string",
 *                                                        "workPhone" : "string",
 *                                                        "mobilePhone" : "string",
 *                                                        "extraPhone1" : "string",
 *                                                        "extraPhone2" : "string",
 *                                                        "extraPhone3" : "string",
 *                                                        "externalId" : "string",
 *                                                        "externalSystem" : "string",
 *                                                        "properties" : [ "string" ],
 *                                                        "deleted" : boolean
 *                                                      }],
 *                                                      "contactIds" : [ integer ],
 *                                                      "contactNumbers" : [ "string" ],
 *                                                      "contactNumbersField" : "string"
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request removeContactListItems()
 *
 * removeContactListItems example
 * $client = Client::createClient("login", "password");
 * $request = $client->removeContactListItems();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("contactId" => []));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request removeContactListItem()
 *
 * removeContactListItem example
 * $client = Client::createClient("login", "password");
 * $request = $client->removeContactListItem();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer,
 *                                                         "contactId" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getContact()
 *
 * getContact example
 * $client = Client::createClient("login", "password");
 * $request = $client->getContact();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateContact()
 *
 * updateContact example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateContact();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "firstName" : "string",
 *                                                      "lastName" : "string",
 *                                                      "zipcode" : "string",
 *                                                      "homePhone" : "string",
 *                                                      "workPhone" : "string",
 *                                                      "mobilePhone" : "string",
 *                                                      "extraPhone1" : "string",
 *                                                      "extraPhone2" : "string",
 *                                                      "extraPhone3" : "string",
 *                                                      "externalId" : "string",
 *                                                      "externalSystem" : "string",
 *                                                      "properties" : [ "string" ],
 *                                                      "deleted" : boolean
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request deleteContact()
 *
 * deleteContact example
 * $client = Client::createClient("login", "password");
 * $request = $client->deleteContact();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getContactHistory()
 *
 * getContactHistory example
 * $client = Client::createClient("login", "password");
 * $request = $client->getContactHistory();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findKeywords()
 *
 * findKeywords example
 * $client = Client::createClient("login", "password");
 * $request = $client->findKeywords();
 * $request->getOperationConfig()->setQueryParameters(array("keywords" => []));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findKeywordLeases()
 *
 * findKeywordLeases example
 * $client = Client::createClient("login", "password");
 * $request = $client->findKeywordLeases();
 * $request->getOperationConfig()->setQueryParameters(array("limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getKeywordLease()
 *
 * getKeywordLease example
 * $client = Client::createClient("login", "password");
 * $request = $client->getKeywordLease();
 * $request->getOperationConfig()->setPathParameters(array("keyword" => "string"));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateKeywordLease()
 *
 * updateKeywordLease example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateKeywordLease();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("keyword" => "string"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "shortCode" : "string",
 *                                                      "keyword" : "string",
 *                                                      "leaseBegin" : integer,
 *                                                      "leaseEnd" : integer,
 *                                                      "autoRenew" : boolean,
 *                                                      "status" : "string"
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request isKeywordAvailable()
 *
 * isKeywordAvailable example
 * $client = Client::createClient("login", "password");
 * $request = $client->isKeywordAvailable();
 * $request->getOperationConfig()->setPathParameters(array("keyword" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getAccount()
 *
 * getAccount example
 * $client = Client::createClient("login", "password");
 * $request = $client->getAccount();
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findApiCredentials()
 *
 * findApiCredentials example
 * $client = Client::createClient("login", "password");
 * $request = $client->findApiCredentials();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request createApiCredential()
 *
 * createApiCredential example
 * $client = Client::createClient("login", "password");
 * $request = $client->createApiCredential();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "name" : "string",
 *                                                      "username" : "string",
 *                                                      "password" : "string",
 *                                                      "enabled" : boolean
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getApiCredential()
 *
 * getApiCredential example
 * $client = Client::createClient("login", "password");
 * $request = $client->getApiCredential();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request deleteApiCredential()
 *
 * deleteApiCredential example
 * $client = Client::createClient("login", "password");
 * $request = $client->deleteApiCredential();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCreditUsage()
 *
 * getCreditUsage example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCreditUsage();
 * $request->getOperationConfig()->setQueryParameters(array("intervalBegin" => integer,
 *                                                          "intervalEnd" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getBillingPlanUsage()
 *
 * getBillingPlanUsage example
 * $client = Client::createClient("login", "password");
 * $request = $client->getBillingPlanUsage();
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getCallerIds()
 *
 * getCallerIds example
 * $client = Client::createClient("login", "password");
 * $request = $client->getCallerIds();
 * $result = $client->execute($request);


 * @method SwaggerClient\Request sendVerificationCodeToCallerId()
 *
 * sendVerificationCodeToCallerId example
 * $client = Client::createClient("login", "password");
 * $request = $client->sendVerificationCodeToCallerId();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("callerid" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request verifyCallerId()
 *
 * verifyCallerId example
 * $client = Client::createClient("login", "password");
 * $request = $client->verifyCallerId();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("callerid" => "string"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "verificationCode" : "string"
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request createMedia()
 *
 * createMedia example
 * $client = Client::createClient("login", "password");
 * $request = $client->createMedia();
 * $request->getOperationConfig()->setFileUpload("fullFilePath", "fileName");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getMediaDataByKey()
 *
 * getMediaDataByKey example
 * $client = Client::createClient("login", "password");
 * $request = $client->getMediaDataByKey();
 * $request->getOperationConfig()->setPathParameters(array("key" => "string",
 *                                                         "extension" => "string"));
 * $result = $client->request($request);


 * @method SwaggerClient\Request getMedia()
 *
 * getMedia example
 * $client = Client::createClient("login", "password");
 * $request = $client->getMedia();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getMediaData()
 *
 * getMediaData example
 * $client = Client::createClient("login", "password");
 * $request = $client->getMediaData();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer,
 *                                                         "extension" => "string"));
 * $result = $client->request($request);


 * @method SwaggerClient\Request getMediaDataBinary()
 *
 * getMediaDataBinary example
 * $client = Client::createClient("login", "password");
 * $request = $client->getMediaDataBinary();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->request($request);


 * @method SwaggerClient\Request findNumberLeases()
 *
 * findNumberLeases example
 * $client = Client::createClient("login", "password");
 * $request = $client->findNumberLeases();
 * $request->getOperationConfig()->setQueryParameters(array("limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "prefix" => "string",
 *                                                          "city" => "string",
 *                                                          "state" => "string",
 *                                                          "zipcode" => "string",
 *                                                          "lata" => "string",
 *                                                          "rateCenter" => "string",
 *                                                          "labelName" => "string",
 *                                                          "fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findNumberLeaseConfigs()
 *
 * findNumberLeaseConfigs example
 * $client = Client::createClient("login", "password");
 * $request = $client->findNumberLeaseConfigs();
 * $request->getOperationConfig()->setQueryParameters(array("limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "prefix" => "string",
 *                                                          "city" => "string",
 *                                                          "state" => "string",
 *                                                          "zipcode" => "string",
 *                                                          "lata" => "string",
 *                                                          "rateCenter" => "string",
 *                                                          "labelName" => "string",
 *                                                          "fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getNumberLeaseConfig()
 *
 * getNumberLeaseConfig example
 * $client = Client::createClient("login", "password");
 * $request = $client->getNumberLeaseConfig();
 * $request->getOperationConfig()->setPathParameters(array("number" => "string"));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateNumberLeaseConfig()
 *
 * updateNumberLeaseConfig example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateNumberLeaseConfig();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("number" => "string"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "number" : "string",
 *                                                      "configType" : "string",
 *                                                      "callTrackingConfig" : {
 *                                                        "transferNumbers" : [ "string" ],
 *                                                        "screen" : boolean,
 *                                                        "recorded" : boolean,
 *                                                        "voicemail" : boolean,
 *                                                        "introSoundId" : integer,
 *                                                        "whisperSoundId" : integer,
 *                                                        "voicemailSoundId" : integer,
 *                                                        "failedTransferSoundId" : integer,
 *                                                        "weeklySchedule" : {
 *                                                          "startTimeOfDay" : {
 *                                                            "hour" : integer,
 *                                                            "minute" : integer,
 *                                                            "second" : integer
 *                                                          },
 *                                                          "stopTimeOfDay" : {
 *                                                            "hour" : integer,
 *                                                            "minute" : integer,
 *                                                            "second" : integer
 *                                                          },
 *                                                          "daysOfWeek" : [ "string" ],
 *                                                          "timeZone" : "string"
 *                                                        },
 *                                                        "googleAnalytics" : {
 *                                                          "domain" : "string",
 *                                                          "googleAccountId" : "string",
 *                                                          "category" : "string"
 *                                                        }
 *                                                      },
 *                                                      "ivrInboundConfig" : {
 *                                                        "dialplanXml" : "string"
 *                                                      }
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getNumberLease()
 *
 * getNumberLease example
 * $client = Client::createClient("login", "password");
 * $request = $client->getNumberLease();
 * $request->getOperationConfig()->setPathParameters(array("number" => "string"));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateNumberLease()
 *
 * updateNumberLease example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateNumberLease();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("number" => "string"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "number" : "string",
 *                                                      "nationalFormat" : "string",
 *                                                      "tollFree" : boolean,
 *                                                      "region" : {
 *                                                        "prefix" : "string",
 *                                                        "city" : "string",
 *                                                        "state" : "string",
 *                                                        "zipcode" : "string",
 *                                                        "country" : "string",
 *                                                        "lata" : "string",
 *                                                        "rateCenter" : "string",
 *                                                        "latitude" : number,
 *                                                        "longitude" : number,
 *                                                        "timeZone" : "string"
 *                                                      },
 *                                                      "leaseBegin" : integer,
 *                                                      "leaseEnd" : integer,
 *                                                      "autoRenew" : boolean,
 *                                                      "status" : "string",
 *                                                      "callFeatureStatus" : "string",
 *                                                      "textFeatureStatus" : "string",
 *                                                      "labels" : [ "string" ]
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findNumbersLocal()
 *
 * findNumbersLocal example
 * $client = Client::createClient("login", "password");
 * $request = $client->findNumbersLocal();
 * $request->getOperationConfig()->setQueryParameters(array("limit" => integer,
 *                                                          "prefix" => "string",
 *                                                          "city" => "string",
 *                                                          "state" => "string",
 *                                                          "zipcode" => "string",
 *                                                          "lata" => "string",
 *                                                          "rateCenter" => "string",
 *                                                          "fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findNumberRegions()
 *
 * findNumberRegions example
 * $client = Client::createClient("login", "password");
 * $request = $client->findNumberRegions();
 * $request->getOperationConfig()->setQueryParameters(array("limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "prefix" => "string",
 *                                                          "city" => "string",
 *                                                          "state" => "string",
 *                                                          "zipcode" => "string",
 *                                                          "lata" => "string",
 *                                                          "rateCenter" => "string",
 *                                                          "fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findNumbersTollfree()
 *
 * findNumbersTollfree example
 * $client = Client::createClient("login", "password");
 * $request = $client->findNumbersTollfree();
 * $request->getOperationConfig()->setQueryParameters(array("pattern" => "string",
 *                                                          "limit" => integer,
 *                                                          "fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request orderKeywords()
 *
 * orderKeywords example
 * $client = Client::createClient("login", "password");
 * $request = $client->orderKeywords();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "keywords" : [ "string" ]
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request orderNumbers()
 *
 * orderNumbers example
 * $client = Client::createClient("login", "password");
 * $request = $client->orderNumbers();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "tollFreeCount" : integer,
 *                                                      "localCount" : integer,
 *                                                      "prefix" : "string",
 *                                                      "city" : "string",
 *                                                      "state" : "string",
 *                                                      "zipcode" : "string",
 *                                                      "lata" : "string",
 *                                                      "rateCenter" : "string",
 *                                                      "numbers" : [ "string" ]
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getOrder()
 *
 * getOrder example
 * $client = Client::createClient("login", "password");
 * $request = $client->getOrder();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findTexts()
 *
 * findTexts example
 * $client = Client::createClient("login", "password");
 * $request = $client->findTexts();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "id" => [],
 *                                                          "campaignId" => integer,
 *                                                          "batchId" => integer,
 *                                                          "fromNumber" => "string",
 *                                                          "toNumber" => "string",
 *                                                          "label" => "string",
 *                                                          "states" => "string",
 *                                                          "results" => "string",
 *                                                          "inbound" => boolean,
 *                                                          "intervalBegin" => integer,
 *                                                          "intervalEnd" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request sendTexts()
 *
 * sendTexts example
 * $client = Client::createClient("login", "password");
 * $request = $client->sendTexts();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "campaignId" => integer,
 *                                                          "defaultMessage" => "string"));
 * $request->getOperationConfig()->setBodyParameter("[
 *                                                     {
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ],
 *                                                        "message" : "string",
 *                                                        "media" : [{
 *                                                          "id" : integer,
 *                                                          "accountId" : integer,
 *                                                          "name" : "string",
 *                                                          "created" : integer,
 *                                                          "lengthInBytes" : integer,
 *                                                          "mediaType" : "string",
 *                                                          "publicUrl" : "string"
 *                                                        }]
 *                                                     }
 *                                                   ]");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findTextAutoReplys()
 *
 * findTextAutoReplys example
 * $client = Client::createClient("login", "password");
 * $request = $client->findTextAutoReplys();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "number" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request createTextAutoReply()
 *
 * createTextAutoReply example
 * $client = Client::createClient("login", "password");
 * $request = $client->createTextAutoReply();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "number" : "string",
 *                                                      "keyword" : "string",
 *                                                      "match" : "string",
 *                                                      "message" : "string"
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getTextAutoReply()
 *
 * getTextAutoReply example
 * $client = Client::createClient("login", "password");
 * $request = $client->getTextAutoReply();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request deleteTextAutoReply()
 *
 * deleteTextAutoReply example
 * $client = Client::createClient("login", "password");
 * $request = $client->deleteTextAutoReply();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findTextBroadcasts()
 *
 * findTextBroadcasts example
 * $client = Client::createClient("login", "password");
 * $request = $client->findTextBroadcasts();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "label" => "string",
 *                                                          "name" => "string",
 *                                                          "running" => boolean));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request createTextBroadcast()
 *
 * createTextBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->createTextBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setQueryParameters(array("start" => boolean));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "name" : "string",
 *                                                      "status" : "string",
 *                                                      "lastModified" : integer,
 *                                                      "fromNumber" : "string",
 *                                                      "localTimeRestriction" : {
 *                                                        "enabled" : boolean,
 *                                                        "beginHour" : integer,
 *                                                        "beginMinute" : integer,
 *                                                        "endHour" : integer,
 *                                                        "endMinute" : integer
 *                                                      },
 *                                                      "schedules" : [{
 *                                                        "startTimeOfDay" : {
 *                                                          "hour" : integer,
 *                                                          "minute" : integer,
 *                                                          "second" : integer
 *                                                        },
 *                                                        "stopTimeOfDay" : {
 *                                                          "hour" : integer,
 *                                                          "minute" : integer,
 *                                                          "second" : integer
 *                                                        },
 *                                                        "daysOfWeek" : [ "string" ],
 *                                                        "timeZone" : "string",
 *                                                        "id" : integer,
 *                                                        "campaignId" : integer,
 *                                                        "startDate" : {
 *                                                          "year" : integer,
 *                                                          "month" : integer,
 *                                                          "day" : integer
 *                                                        },
 *                                                        "stopDate" : {
 *                                                          "year" : integer,
 *                                                          "month" : integer,
 *                                                          "day" : integer
 *                                                        }
 *                                                      }],
 *                                                      "maxActive" : integer,
 *                                                      "labels" : [ "string" ],
 *                                                      "resumeNextDay" : boolean,
 *                                                      "recipients" : [{
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ],
 *                                                        "message" : "string",
 *                                                        "media" : [{
 *                                                          "id" : integer,
 *                                                          "accountId" : integer,
 *                                                          "name" : "string",
 *                                                          "created" : integer,
 *                                                          "lengthInBytes" : integer,
 *                                                          "mediaType" : "string",
 *                                                          "publicUrl" : "string"
 *                                                        }]
 *                                                      }],
 *                                                      "message" : "string",
 *                                                      "bigMessageStrategy" : "string",
 *                                                      "media" : [{
 *                                                        "id" : integer,
 *                                                        "accountId" : integer,
 *                                                        "name" : "string",
 *                                                        "created" : integer,
 *                                                        "lengthInBytes" : integer,
 *                                                        "mediaType" : "string",
 *                                                        "publicUrl" : "string"
 *                                                      }]
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getTextBroadcast()
 *
 * getTextBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->getTextBroadcast();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateTextBroadcast()
 *
 * updateTextBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateTextBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "name" : "string",
 *                                                      "status" : "string",
 *                                                      "lastModified" : integer,
 *                                                      "fromNumber" : "string",
 *                                                      "localTimeRestriction" : {
 *                                                        "enabled" : boolean,
 *                                                        "beginHour" : integer,
 *                                                        "beginMinute" : integer,
 *                                                        "endHour" : integer,
 *                                                        "endMinute" : integer
 *                                                      },
 *                                                      "schedules" : [{
 *                                                        "startTimeOfDay" : {
 *                                                          "hour" : integer,
 *                                                          "minute" : integer,
 *                                                          "second" : integer
 *                                                        },
 *                                                        "stopTimeOfDay" : {
 *                                                          "hour" : integer,
 *                                                          "minute" : integer,
 *                                                          "second" : integer
 *                                                        },
 *                                                        "daysOfWeek" : [ "string" ],
 *                                                        "timeZone" : "string",
 *                                                        "id" : integer,
 *                                                        "campaignId" : integer,
 *                                                        "startDate" : {
 *                                                          "year" : integer,
 *                                                          "month" : integer,
 *                                                          "day" : integer
 *                                                        },
 *                                                        "stopDate" : {
 *                                                          "year" : integer,
 *                                                          "month" : integer,
 *                                                          "day" : integer
 *                                                        }
 *                                                      }],
 *                                                      "maxActive" : integer,
 *                                                      "labels" : [ "string" ],
 *                                                      "resumeNextDay" : boolean,
 *                                                      "recipients" : [{
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ],
 *                                                        "message" : "string",
 *                                                        "media" : [{
 *                                                          "id" : integer,
 *                                                          "accountId" : integer,
 *                                                          "name" : "string",
 *                                                          "created" : integer,
 *                                                          "lengthInBytes" : integer,
 *                                                          "mediaType" : "string",
 *                                                          "publicUrl" : "string"
 *                                                        }]
 *                                                      }],
 *                                                      "message" : "string",
 *                                                      "bigMessageStrategy" : "string",
 *                                                      "media" : [{
 *                                                        "id" : integer,
 *                                                        "accountId" : integer,
 *                                                        "name" : "string",
 *                                                        "created" : integer,
 *                                                        "lengthInBytes" : integer,
 *                                                        "mediaType" : "string",
 *                                                        "publicUrl" : "string"
 *                                                      }]
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request archiveTextBroadcast()
 *
 * archiveTextBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->archiveTextBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getTextBroadcastBatches()
 *
 * getTextBroadcastBatches example
 * $client = Client::createClient("login", "password");
 * $request = $client->getTextBroadcastBatches();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request addTextBroadcastBatch()
 *
 * addTextBroadcastBatch example
 * $client = Client::createClient("login", "password");
 * $request = $client->addTextBroadcastBatch();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "name" : "string",
 *                                                      "contactListId" : integer,
 *                                                      "recipients" : [{
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ]
 *                                                      }],
 *                                                      "scrubDuplicates" : boolean
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request addTextBroadcastRecipients()
 *
 * addTextBroadcastRecipients example
 * $client = Client::createClient("login", "password");
 * $request = $client->addTextBroadcastRecipients();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $request->getOperationConfig()->setBodyParameter("[
 *                                                     {
 *                                                        "phoneNumber" : "string",
 *                                                        "contactId" : integer,
 *                                                        "attributes" : [ "string" ],
 *                                                        "message" : "string",
 *                                                        "media" : [{
 *                                                          "id" : integer,
 *                                                          "accountId" : integer,
 *                                                          "name" : "string",
 *                                                          "created" : integer,
 *                                                          "lengthInBytes" : integer,
 *                                                          "mediaType" : "string",
 *                                                          "publicUrl" : "string"
 *                                                        }]
 *                                                     }
 *                                                   ]");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request startTextBroadcast()
 *
 * startTextBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->startTextBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getTextBroadcastStats()
 *
 * getTextBroadcastStats example
 * $client = Client::createClient("login", "password");
 * $request = $client->getTextBroadcastStats();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "begin" => integer,
 *                                                          "end" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request stopTextBroadcast()
 *
 * stopTextBroadcast example
 * $client = Client::createClient("login", "password");
 * $request = $client->stopTextBroadcast();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getTextBroadcastTexts()
 *
 * getTextBroadcastTexts example
 * $client = Client::createClient("login", "password");
 * $request = $client->getTextBroadcastTexts();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("batchId" => integer,
 *                                                          "fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getText()
 *
 * getText example
 * $client = Client::createClient("login", "password");
 * $request = $client->getText();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findWebhooks()
 *
 * findWebhooks example
 * $client = Client::createClient("login", "password");
 * $request = $client->findWebhooks();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string",
 *                                                          "limit" => integer,
 *                                                          "offset" => integer,
 *                                                          "name" => "string",
 *                                                          "resource" => "string",
 *                                                          "event" => "string",
 *                                                          "callback" => "string",
 *                                                          "enabled" => boolean));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request createWebhook()
 *
 * createWebhook example
 * $client = Client::createClient("login", "password");
 * $request = $client->createWebhook();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "enabled" : boolean,
 *                                                      "nonStrictSsl" : boolean,
 *                                                      "name" : "string",
 *                                                      "resource" : "string",
 *                                                      "events" : [ "string" ],
 *                                                      "fields" : "string",
 *                                                      "callback" : "string",
 *                                                      "secret" : "string",
 *                                                      "singleUse" : boolean,
 *                                                      "createdAt" : integer,
 *                                                      "updatedAt" : integer
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request findWebhookResources()
 *
 * findWebhookResources example
 * $client = Client::createClient("login", "password");
 * $request = $client->findWebhookResources();
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getWebhookResource()
 *
 * getWebhookResource example
 * $client = Client::createClient("login", "password");
 * $request = $client->getWebhookResource();
 * $request->getOperationConfig()->setPathParameters(array("resource" => "string"));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request getWebhook()
 *
 * getWebhook example
 * $client = Client::createClient("login", "password");
 * $request = $client->getWebhook();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setQueryParameters(array("fields" => "string"));
 * $result = $client->execute($request);


 * @method SwaggerClient\Request updateWebhook()
 *
 * updateWebhook example
 * $client = Client::createClient("login", "password");
 * $request = $client->updateWebhook();
 * $request->getOperationConfig()->setHeaderParameters(array("Content-Type" => "application/json"));
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $request->getOperationConfig()->setBodyParameter("{
 *                                                      "id" : integer,
 *                                                      "enabled" : boolean,
 *                                                      "nonStrictSsl" : boolean,
 *                                                      "name" : "string",
 *                                                      "resource" : "string",
 *                                                      "events" : [ "string" ],
 *                                                      "fields" : "string",
 *                                                      "callback" : "string",
 *                                                      "secret" : "string",
 *                                                      "singleUse" : boolean,
 *                                                      "createdAt" : integer,
 *                                                      "updatedAt" : integer
 *                                                   }");
 * $result = $client->execute($request);


 * @method SwaggerClient\Request deleteWebhook()
 *
 * deleteWebhook example
 * $client = Client::createClient("login", "password");
 * $request = $client->deleteWebhook();
 * $request->getOperationConfig()->setPathParameters(array("id" => integer));
 * $result = $client->execute($request);
 */
class DocumentedClient extends Client
{
}
