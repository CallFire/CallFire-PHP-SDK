<?php
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
);
