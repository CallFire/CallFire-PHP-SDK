<?php

return array(
        'InboundConfig' => array('id' => '@id'),
        'RetryResults' => array(),
        'RetryPhoneTypes' => array(),
        'RetryConfig' => array(
            'MaxAttempts' => '_:MaxAttempts',
            'MinutesBetweenAttempts' => '_:MinutesBetweenAttempts',
            '#RetryResults' => '_:RetryResults',
            '#RetryPhoneTypes' => '_:RetryPhoneTypes'
            ),
        'BroadcastConfig' => array(
            'id' => '@id',
            'Created' => '_:Created',
            'FromNumber' => '_:FromNumber',
            '#LocalTimeZoneRestriction' => '_:LocalTimeZoneRestriction',
            '#RetryConfig' => '_:RetryConfig'
            ),
        'ToNumber' => array(),
        'QuestionResponse' => array(
            'Question' => '_:Question',
            'Response' => '_:Response'
            ),
        'ActionRecord' => array(
            'id' => '@id',
            'Result' => '_:Result',
            'FinishTime' => '_:FinishTime',
            'BilledAmount' => '_:BilledAmount',
            '#@QuestionResponses' => '_:QuestionResponse'
            ),
        'Action' => array(
            'id' => '@id',
            'FromNumber' => '_:FromNumber',
            'ToNumber' => '_:ToNumber',
            'State' => '_:State',
            'BatchId' => '_:BatchId',
            'BroadcastId' => '_:BroadcastId',
            'ContactId' => '_:ContactId',
            'Inbound' => '_:Inbound',
            'Created' => '_:Created',
            'Modified' => '_:Modified',
            'FinalResult' => '_:FinalResult',
            '#@Labels' => '_:Label'
            ),
        'Fulfilled' => array(),
        'NumberOrderItem' => array(
            'Ordered' => '_:Ordered',
            'UnitCost' => '_:UnitCost',
            '#Fulfilled' => '_:Fulfilled'
            ),
        'Broadcast' => array(
            'id' => '@id',
            'Name' => '_:Name',
            'Status' => '_:Status',
            'LastModified' => '_:LastModified',
            'Type' => '_:Type',
            '#VoiceBroadcastConfig' => 'VoiceBroadcastConfig',
            '#TextBroadcastConfig' => 'TextBroadcastConfig',
            '#IvrBroadcastConfig' => 'IvrBroadcastConfig',
            '#CccBroadcastConfig' => 'CccBroadcastConfig'
            ),
        'VoiceBroadcastConfig' => array(
            'AnsweringMachineConfig' => '_:AnsweringMachineConfig',
            'LiveSoundTextVoice' => '_:LiveSoundTextVoice',
            'MachineSoundTextVoice' => '_:MachineSoundTextVoice',
            'TransferSoundTextVoice' => '_:TransferSoundTextVoice',
            'TransferDigit' => '_:TransferDigit',
            'TransferNumber' => '_:TransferNumber',
            'DncSoundTextVoice' => '_:DncSoundTextVoice',
            'DncDigit' => '_:DncDigit',
            'MaxActiveTransfers' => '_:MaxActiveTransfers',
            'LiveSoundText' => '_:LiveSoundText',
            'LiveSoundId' => '_:LiveSoundId',
            'MachineSoundText' => '_:MachineSoundText',
            'MachineSoundId' => '_:MachineSoundId',
            'TransferSoundText' => '_:TransferSoundText',
            'TransferSoundId' => '_:TransferSoundId',
            'DncSoundText' => '_:DncSoundText',
            'DncSoundId' => '_:DncSoundId'
            ),
        'CccBroadcastConfig' => array(
            'AgentGroupId' => '_:AgentGroupId',
            'SmartDropSoundId' => '_:SmartDropSoundId',
            'ScriptId' => '_:ScriptId',
            'TransferNumberIdList' => '_:TransferNumberIdList',
            'AllowAnyTransfer' => '_:AllowAnyTransfer',
            'Recorded' => '_:Recorded'
            ),
        'TextBroadcastConfig' => array(
            'Message' => '_:Message',
            'BigMessageStrategy' => '_:BigMessageStrategy'
            ),
        'IvrBroadcastConfig' => array('DialplanXml' => '_:DialplanXml'),
        'TransferNumber' => array(),
        'CallTrackingConfig' => array(
            'Screen' => '_:Screen',
            'Record' => '_:Record',
            'IntroSoundId' => '_:IntroSoundId',
            'WhisperSoundId' => '_:WhisperSoundId',
            '#TransferNumber' => '_:TransferNumber'
            ),
        'IvrInboundConfig' => array('DialplanXml' => '_:DialplanXml'),
        'LocalTimeZoneRestriction' => array(
            'BeginTime' => '_:BeginTime',
            'EndTime' => '_:EndTime'
            ),
        'ContactBatch' => array(
            'id' => '@id',
            'Name' => '_:Name',
            'Status' => '_:Status',
            'BroadcastId' => '_:BroadcastId',
            'Created' => '_:Created',
            'Size' => '_:Size',
            'Remaining' => '_:Remaining'
            ),
        'DaysOfWeek' => array(),
        'BroadcastSchedule' => array(
            'id' => '@id',
            'StartTimeOfDay' => '_:StartTimeOfDay',
            'StopTimeOfDay' => '_:StopTimeOfDay',
            'TimeZone' => '_:TimeZone',
            'BeginDate' => '_:BeginDate',
            'EndDate' => '_:EndDate',
            '#DaysOfWeek' => '_:DaysOfWeek'
            ),
        'UsageStats' => array(
            'Duration' => '_:Duration',
            'BilledDuration' => '_:BilledDuration',
            'BilledAmount' => '_:BilledAmount',
            'Attempts' => '_:Attempts',
            'Actions' => '_:Actions'
            ),
        'ResultStat' => array(
            'Result' => '_:Result',
            'Attempts' => '_:Attempts',
            'Actions' => '_:Actions'
            ),
        'ActionStatistics' => array(
            'Unattempted' => '_:Unattempted',
            'RetryWait' => '_:RetryWait',
            'Finished' => '_:Finished'
            ),
        'BroadcastStats' => array(
            '#UsageStats' => '_:UsageStats',
            '#@ResultStats' => '_:ResultStat',
            '#ActionStatistics' => '_:ActionStatistics'
            ),
        'Note' => array(
            'Text' => '_:Text',
            'Created' => '_:Created'
            ),
        'CallRecord' => array(
            'OriginateTime' => '_:OriginateTime',
            'AnswerTime' => '_:AnswerTime',
            'Duration' => '_:Duration',
            '#@RecordingMetas' => '_:RecordingMeta',
            '#@Notes' => '_:Note'
            ),
        'Call' => array(
            'AgentCall' => '_:AgentCall',
            '#@CallRecords' => '_:CallRecord',
            '#@Notes' => '_:Note'
            ),
        'SoundMeta' => array(
            'id' => '@id',
            'Status' => '_:Status',
            'Name' => '_:Name',
            'Created' => '_:Created',
            'LengthInSeconds' => '_:LengthInSeconds'
            ),
        'RecordingMeta' => array(
            'id' => '@id',
            'Name' => '_:Name',
            'Created' => '_:Created',
            'LengthInSeconds' => '_:LengthInSeconds',
            'Link' => '_:Link'
            ),
        'TextRecord' => array('Message' => '_:Message'),
        'Text' => array(
            'Message' => '_:Message',
            '#@TextRecords' => '_:TextRecord'
            ),
        'AutoReply' => array(
            'id' => '@id',
            'Number' => '_:Number',
            'Keyword' => '_:Keyword',
            'Match' => '_:Match',
            'Message' => '_:Message'
            ),
        'SubscriptionFilter' => array(
            'BroadcastId' => '_:BroadcastId',
            'BatchId' => '_:BatchId',
            'FromNumber' => '_:FromNumber',
            'ToNumber' => '_:ToNumber',
            'Inbound' => '_:Inbound'
            ),
        'Subscription' => array(
            'id' => '@id',
            'Enabled' => '_:Enabled',
            'Endpoint' => '_:Endpoint',
            'NotificationFormat' => '_:NotificationFormat',
            'TriggerEvent' => '_:TriggerEvent',
            '#SubscriptionFilter' => '_:SubscriptionFilter'
            ),
        'Contact' => array(
            'id' => '@id',
            'firstName' => '@firstName',
            'lastName' => '@lastName',
            'zipcode' => '@zipcode',
            'homePhone' => '@homePhone',
            'workPhone' => '@workPhone',
            'mobilePhone' => '@mobilePhone',
            'externalId' => '@externalId',
            'externalSystem' => '@externalSystem'
            ),
        'ContactHistory' => array(),
        'ContactList' => array(
            'id' => '@id',
            'Name' => '_:Name',
            'Size' => '_:Size',
            'Created' => '_:Created',
            'Status' => '_:Status'
            ),
        'Region' => array(
            'Prefix' => '_:Prefix',
            'City' => '_:City',
            'State' => '_:State',
            'Zipcode' => '_:Zipcode',
            'Country' => '_:Country',
            'Lata' => '_:Lata',
            'RateCenter' => '_:RateCenter',
            'Latitude' => '_:Latitude',
            'Longitude' => '_:Longitude',
            'TimeZone' => '_:TimeZone'
            ),
        'LeaseInfo' => array(
            'LeaseBegin' => '_:LeaseBegin',
            'LeaseEnd' => '_:LeaseEnd',
            'AutoRenew' => '_:AutoRenew'
            ),
        'DncList' => array(
            'id' => '@id',
            'CampaignId' => '_:CampaignId',
            'Name' => '_:Name',
            'Size' => '_:Size'
            ),
        'DncNumber' => array(
            'Number' => '_:Number',
            'DncListId' => '_:DncListId',
            'CallDnc' => '_:CallDnc',
            'TextDnc' => '_:TextDnc'
            ),
        'Number' => array(
            'Number' => '_:Number',
            'NationalFormat' => '_:NationalFormat',
            'TollFree' => '_:TollFree',
            'Status' => '_:Status',
            '#Region' => '_:Region',
            '#LeaseInfo' => '_:LeaseInfo',
            '#NumberConfiguration' => '_:NumberConfiguration'
            ),
        'InboundCallConfiguration' => array(),
        'NumberConfiguration' => array(
            'CallFeature' => '_:CallFeature',
            'TextFeature' => '_:TextFeature',
            'InboundCallConfigurationType' => '_:InboundCallConfigurationType',
            '#InboundCallConfiguration' => '_:InboundCallConfiguration'
            ),
        'Keyword' => array(
            'ShortCode' => '_:ShortCode',
            'Keyword' => '_:Keyword',
            'Status' => '_:Status',
            '#LeaseInfo' => '_:LeaseInfo'
            ),
        'NumberOrder' => array(
            'id' => '@id',
            'Status' => '_:Status',
            'Created' => '_:Created',
            'TotalCost' => '_:TotalCost',
            'LocalNumbers' => '_:LocalNumbers',
            'TollFreeNumbers' => '_:TollFreeNumbers',
            'Keywords' => '_:Keywords'
            ),
        'Label' => array('Name' => '_:Name'),
        'Question' => array(
            'Label' => '_:Label',
            'ResponseType' => '_:ResponseType',
            'Choices' => '_:Choices'
            ),
        'CccCampaign' => array(
            'id' => '@id',
            'Name' => '_:Name',
            'Status' => '_:Status',
            'Created' => '_:Created',
            'LastModified' => '_:LastModified',
            'LocalRestrictBegin' => '_:LocalRestrictBegin',
            'LocalRestrictEnd' => '_:LocalRestrictEnd',
            'ConfigUpdated' => '_:ConfigUpdated',
            'Script' => '_:Script',
            'FromNumber' => '_:FromNumber',
            'RetryConfig' => '_:RetryConfig',
            'AgentGroupId' => '_:AgentGroupId',
            'AgentGroupName' => '_:AgentGroupName',
            'SmartDropSoundId' => '_:SmartDropSoundId',
            'SmartDropSoundRef' => '_:SmartDropSoundRef',
            'AllowAnyTransfer' => '_:AllowAnyTransfer',
            'Recorded' => '_:Recorded',
            'ScrubLevel' => '_:ScrubLevel',
            '#@Questions' => '_:Question',
            '#@TransferNumbers' => '_:TransferNumber'
            ),
        'CccCampaignStats' => array(
            'AgentCount' => '_:AgentCount',
            'ActiveAgentCount' => '_:ActiveAgentCount',
            'CallsAttempted' => '_:CallsAttempted',
            'CallsPlaced' => '_:CallsPlaced',
            'CallsDuration' => '_:CallsDuration',
            'BilledDuration' => '_:BilledDuration',
            'BilledAmount' => '_:BilledAmount',
            'CallsRemaining' => '_:CallsRemaining',
            'CallsAwaitingRedial' => '_:CallsAwaitingRedial',
            'CallsLiveAnswer' => '_:CallsLiveAnswer',
            'ResponseRatePercent' => '_:ResponseRatePercent',
            '#@ResultStats' => '_:ResultStat'
            ),
        'Callback' => array(
            'id' => '@id',
            'UserId' => '_:UserId',
            'OutboundCallId' => '_:OutboundCallId',
            'NotificationSent' => '_:NotificationSent'
            ),
        'Agent' => array(
            'id' => '@id',
            'Enabled' => '_:Enabled',
            'Name' => '_:Name',
            'Email' => '_:Email',
            'LastLogin' => '_:LastLogin',
            'CampaignIds' => '_:CampaignIds',
            'GroupIds' => '_:GroupIds',
            'ActiveSessionId' => '_:ActiveSessionId'
            ),
        'AgentGroup' => array(
            'id' => '@id',
            'Name' => '_:Name',
            'CampaignIds' => '_:CampaignIds',
            'AgentIds' => '_:AgentIds',
            'AgentEmails' => '_:AgentEmails'
            ),
        'AgentSession' => array(
            'id' => '@id',
            'AgentId' => '_:AgentId',
            'CampaignId' => '_:CampaignId',
            'AgentState' => '_:AgentState',
            'CallCount' => '_:CallCount',
            'Start' => '_:Start',
            'LastUpdate' => '_:LastUpdate'
            )
        );