<?php
use CallFire\Api\Soap\Result;
use CallFire\Common\Resource;

$sparseBroadcast = new Resource\Broadcast;

return array(
    "BroadcastQueryResult" => array(
        "data" => array(
            "TotalResults" => 1,
            "Broadcast" => array(
                $sparseBroadcast
            )
        ),
        "result" => array(
            "totalResults" => 1,
            "broadcasts" => array(
                $sparseBroadcast
            )
        )
    )
);
