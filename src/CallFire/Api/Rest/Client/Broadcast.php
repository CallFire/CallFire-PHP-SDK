<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Broadcast extends AbstractClient
{

    public function CreateBroadcast(Request\CreateBroadcast $CreateBroadcast = null)
    {
        $uri = $this->getUri('/broadcast', array());

        return $this->post($uri, $CreateBroadcast);
    }

    public function QueryBroadcasts(Request\QueryBroadcasts $QueryBroadcasts = null)
    {
        $uri = $this->getUri('/broadcast', array());

        return $this->get($uri, $QueryBroadcasts);
    }

    public function GetBroadcast($Id)
    {
        $uri = $this->getUri('/broadcast/%s', array($Id));

        return $this->get($uri);
    }

    public function UpdateBroadcast($Id, Request\UpdateBroadcast $UpdateBroadcast)
    {
        $uri = $this->getUri('/broadcast/%s', array($Id));

        return $this->put($uri, $UpdateBroadcast);
    }

    public function GetBroadcastStats($Id, Request\GetBroadcastStats $GetBroadcastStats)
    {
        $uri = $this->getUri('/broadcast/%s/stats', array($Id));

        return $this->get($uri, $GetBroadcastStats);
    }

    public function ControlBroadcast($Id, Request\ControlBroadcast $ControlBroadcast)
    {
        $uri = $this->getUri('/broadcast/%s/control', array($Id));

        return $this->put($uri, $ControlBroadcast);
    }

    public function CreateContactBatch(Request\CreateContactBatch $CreateContactBatch = null)
    {
        $uri = $this->getUri('/broadcast/%s/batch', array());

        return $this->post($uri, $CreateContactBatch);
    }

    public function QueryContactBatches(Request\QueryContactBatches $QueryContactBatches = null)
    {
        $uri = $this->getUri('/broadcast/%s/batch', array());

        return $this->get($uri, $QueryContactBatches);
    }

    public function GetContactBatch($Id)
    {
        $uri = $this->getUri('/broadcast/batch/%s', array($Id));

        return $this->get($uri);
    }

    public function ControlContactBatch($Id, Request\ControlContactBatch $ControlContactBatch)
    {
        $uri = $this->getUri('/broadcast/batch/%s/control', array($Id));

        return $this->put($uri, $ControlContactBatch);
    }

    public function CreateBroadcastSchedule(Request\CreateBroadcastSchedule $CreateBroadcastSchedule = null)
    {
        $uri = $this->getUri('/broadcast/schedule', array());

        return $this->post($uri, $CreateBroadcastSchedule);
    }

    public function QueryBroadcastSchedule(Request\QueryBroadcastSchedule $QueryBroadcastSchedule = null)
    {
        $uri = $this->getUri('/broadcast/schedule', array());

        return $this->get($uri, $QueryBroadcastSchedule);
    }

    public function GetBroadcastSchedule($Id)
    {
        $uri = $this->getUri('/broadcast/schedule/%s', array($Id));

        return $this->get($uri);
    }

}
