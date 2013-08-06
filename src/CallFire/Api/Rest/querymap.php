<?php
// _: is the default namespace
return array(
    "Broadcast" => array(
        "id" => "@id",
        "Name" => "_:Name",
        "Status" => "_:Status",
        "Type" => "_:Type",
        "#IvrBroadcastConfig" => "_:IvrBroadcastConfig"
    ),
    "IvrBroadcastConfig" => array(
        "FromNumber" => "_:FromNumber",
        "#RetryConfig" => "_:RetryConfig",
        "DialplanXml" => "_:DialplanXml"
    ),
    "RetryConfig" => array(
        "MaxAttempts" => "_:MaxAttempts",
        "MinutesBetweenAttempts" => "_:MinutesBetweenAttempts",
        "RetryResults" => "_:RetryResults"
    ),
    "ContactBatch" => array(
        "Id" => "@id",
        "Name" => "_:Name",
        "Status" => "_:Status",
        "BroadcastId" => "_:BroadcastId",
        "Created" => "_:Created",
        "Size" => "_:Size",
        "Remaining" => "_:Remaining"
    ),
    "BroadcastStats" => array(
        "#Stats" => "*"
    ),
    "UsageStats" => array(
        "Duration" => "_:Duration",
        "BilledDuration" => "_:BilledDuration",
        "BilledAmount" => "_:BilledAmount",
        "Attempts" => "_:Attempts",
        "Actions" => "_:Actions"
    ),
    "ResultStat" => array(
        "Result" => "_:Result",
        "Attempts" => "_:Attempts",
        "Actions" => "_:Actions"
    )
);
