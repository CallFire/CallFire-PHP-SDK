<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Text extends AbstractClient
{

    public function SendText(Request\SendText $SendText = null)
    {
        $uri = $this->getUri('/text', array());

        return $this->post($uri, $SendText);
    }

    public function QueryTexts(Request\QueryTexts $QueryTexts = null)
    {
        $uri = $this->getUri('/text', array());

        return $this->get($uri, $QueryTexts);
    }

    public function GetText($Id)
    {
        $uri = $this->getUri('/text/%s', array($Id));

        return $this->get($uri);
    }

    public function CreateAutoReply(Request\CreateAutoReply $CreateAutoReply = null)
    {
        $uri = $this->getUri('/text/auto-reply', array());

        return $this->post($uri, $CreateAutoReply);
    }

    public function QueryAutoReplies(Request\QueryAutoReplies $QueryAutoReplies = null)
    {
        $uri = $this->getUri('/text/auto-reply', array());

        return $this->get($uri, $QueryAutoReplies);
    }

    public function GetAutoReply($Id)
    {
        $uri = $this->getUri('/text/auto-reply/%s', array($Id));

        return $this->get($uri);
    }

}
