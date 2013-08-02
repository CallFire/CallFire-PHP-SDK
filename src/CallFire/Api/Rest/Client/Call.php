<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Call extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    public function SendCall(Request\SendCall $SendCall = null)
    {
        $uri = $this->getUri('/call', array());

        return $this->post($uri, $SendCall);
    }

    public function QueryCalls(Request\QueryCalls $QueryCalls = null)
    {
        $uri = $this->getUri('/call', array());

        return $this->get($uri, $QueryCalls);
    }

    public function GetCall($Id)
    {
        $uri = $this->getUri('/call/%s', array($Id));

        return $this->get($uri);
    }

    public function CreateSound(Request\CreateSound $CreateSound = null)
    {
        $uri = $this->getUri('/call/sound', array());

        return $this->post($uri, $CreateSound);
    }

    public function QuerySoundMeta(Request\QuerySoundMeta $QuerySoundMeta = null)
    {
        $uri = $this->getUri('/call/sound', array());

        return $this->get($uri, $QuerySoundMeta);
    }

    public function GetSoundMeta($Id)
    {
        $uri = $this->getUri('/call/sound/%s', array($Id));

        return $this->get($uri);
    }

}
