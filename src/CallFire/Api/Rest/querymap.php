<?php

return array(
        'TextToSpeech' => array(),
        'InboundConfig' => array('id' => '@id'),
        'RetryResults' => array(),
        'RetryConfig' => array(
            'MaxAttempts' => '_:MaxAttempts',
            'MinutesBetweenAttempts' => '_:MinutesBetweenAttempts',
            '#RetryResults' => '_:RetryResults'
            ),
        'BroadcastConfig' => array(
            'id' => '@id',
            'Created' => '_:Created',
            'FromNumber' => '_:FromNumber',
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
            '#QuestionResponse' => '_:QuestionResponse'
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
            'FinalResult' => '_:FinalResult'
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
            '#IvrBroadcastConfig' => 'IvrBroadcastConfig'
            ),
        'VoiceBroadcastConfig' => array(
            'AnsweringMachineConfig' => '_:AnsweringMachineConfig',
            'TransferDigit' => '_:TransferDigit',
            'TransferNumber' => '_:TransferNumber',
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
        'BroadcastStats' => array(
            '#UsageStats' => '_:UsageStats',
            '#ResultStat' => '_:ResultStat'
            ),
        'CallRecord' => array(
            'OriginateTime' => '_:OriginateTime',
            'AnswerTime' => '_:AnswerTime',
            'Duration' => '_:Duration',
            '#RecordingMeta' => '_:RecordingMeta'
            ),
        'Call' => array('#CallRecord' => '_:CallRecord'),
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
            'LengthInSeconds' => '_:LengthInSeconds'
            ),
        'TextRecord' => array('Message' => '_:Message'),
        'Text' => array(
            'Message' => '_:Message',
            '#TextRecord' => '_:TextRecord'
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
            'mobilePhone' => '@mobilePhone'
            ),
        'ContactHistory' => array(),
        'ContactList' => array(
            'id' => '@id',
            'Name' => '_:Name',
            'Size' => '_:Size',
            'Created' => '_:Created'
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
        'Number' => array(
            'Number' => '_:Number',
            'NationalFormat' => '_:NationalFormat',
            'TollFree' => '_:TollFree',
            'Status' => '_:Status'
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
            'Status' => '_:Status'
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
        'Label' => array('Name' => '_:Name')
        );
