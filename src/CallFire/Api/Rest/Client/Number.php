<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Number extends AbstractClient
{

    public function QueryRegions(Request\QueryRegions $QueryRegions = null)
    {
        $uri = $this->getUri('/number/regions', array());

        return $this->get($uri, $QueryRegions);
    }

    public function QueryNumbers(Request\QueryNumbers $QueryNumbers = null)
    {
        $uri = $this->getUri('/number', array());

        return $this->get($uri, $QueryNumbers);
    }

    public function GetNumber(Request\GetNumber $GetNumber = null)
    {
        $uri = $this->getUri('/number/%s', array());

        return $this->get($uri, $GetNumber);
    }

    public function ConfigureNumber($Id, Request\ConfigureNumber $ConfigureNumber)
    {
        $uri = $this->getUri('/number/%s', array($Id));

        return $this->put($uri, $ConfigureNumber);
    }

    public function SearchAvailableNumbers(Request\SearchAvailableNumbers $SearchAvailableNumbers = null)
    {
        $uri = $this->getUri('/number/search', array());

        return $this->get($uri, $SearchAvailableNumbers);
    }

    public function QueryKeywords(Request\QueryKeywords $QueryKeywords = null)
    {
        $uri = $this->getUri('/number/keyword', array());

        return $this->get($uri, $QueryKeywords);
    }

    public function SearchAvailableKeywords(Request\SearchAvailableKeywords $SearchAvailableKeywords = null)
    {
        $uri = $this->getUri('/number/keyword/search', array());

        return $this->get($uri, $SearchAvailableKeywords);
    }

    public function CreateNumberOrder(Request\CreateNumberOrder $CreateNumberOrder = null)
    {
        $uri = $this->getUri('/number/order', array());

        return $this->post($uri, $CreateNumberOrder);
    }

    public function GetNumberOrder($Id)
    {
        $uri = $this->getUri('/number/order/%s', array($Id));

        return $this->get($uri);
    }

    public function Release($Id, Request\Release $Release)
    {
        $uri = $this->getUri('/number/release', array($Id));

        return $this->put($uri, $Release);
    }

}
