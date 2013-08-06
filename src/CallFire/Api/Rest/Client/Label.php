<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Label extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    /**
     * Returns all defined labels
     *
     *
     *
     * @param Request\QueryLabels $QueryLabels = null
     */
    public function QueryLabels(Request\QueryLabels $QueryLabels = null)
    {
        $uri = $this->getUri('/label', array());

        return $this->get($uri, $QueryLabels);
    }

    /**
     * Adds a label to a broadcast, creating the label if it doesn't already exist
     *
     *
     *
     * @param Request\LabelBroadcast $LabelBroadcast = null
     */
    public function LabelBroadcast(Request\LabelBroadcast $LabelBroadcast = null)
    {
        $uri = $this->getUri('/label/broadcast/%s', array());

        return $this->post($uri, $LabelBroadcast);
    }

    /**
     * Adds a label to a single number
     *
     *
     *
     * @param Request\LabelNumber $LabelNumber = null
     */
    public function LabelNumber(Request\LabelNumber $LabelNumber = null)
    {
        $uri = $this->getUri('/label/number/%s', array());

        return $this->post($uri, $LabelNumber);
    }

}
