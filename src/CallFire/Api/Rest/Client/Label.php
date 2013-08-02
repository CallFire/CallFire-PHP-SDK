<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Label extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    public function QueryLabels(Request\QueryLabels $QueryLabels = null)
    {
        $uri = $this->getUri('/label', array());

        return $this->get($uri, $QueryLabels);
    }

    public function LabelBroadcast(Request\LabelBroadcast $LabelBroadcast = null)
    {
        $uri = $this->getUri('/label/broadcast/%s', array());

        return $this->post($uri, $LabelBroadcast);
    }

    public function LabelNumber(Request\LabelNumber $LabelNumber = null)
    {
        $uri = $this->getUri('/label/number/%s', array());

        return $this->post($uri, $LabelNumber);
    }

}
