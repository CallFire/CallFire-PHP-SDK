<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Label extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    /**
     * Removes a label from all labeled objects and deletes it
     *
     *
     *
     * @api
     * @param Request\DeleteLabel $DeleteLabel = null
     */
    public function DeleteLabel(Request\DeleteLabel $DeleteLabel = null)
    {
        $uri = $this->getUri('/label', array());

        return $this->delete($uri, $DeleteLabel);
    }

    /**
     * Returns all defined labels
     *
     *
     *
     * @api
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
     * @api
     * @param Request\LabelBroadcast $LabelBroadcast = null
     */
    public function LabelBroadcast(Request\LabelBroadcast $LabelBroadcast = null)
    {
        $uri = $this->getUri('/label/broadcast/%s', array());

        return $this->post($uri, $LabelBroadcast);
    }

    /**
     * Removes a label from a single broadcast
     *
     *
     *
     * @api
     * @param int                      $Id               Unique ID of resource
     * @param Request\UnlabelBroadcast $UnlabelBroadcast
     */
    public function UnlabelBroadcast($Id, Request\UnlabelBroadcast $UnlabelBroadcast)
    {
        $uri = $this->getUri('/label/broadcast/%s', array($Id));

        return $this->delete($uri, $UnlabelBroadcast);
    }

    /**
     * Adds a label to a single number
     *
     *
     *
     * @api
     * @param Request\LabelNumber $LabelNumber = null
     */
    public function LabelNumber(Request\LabelNumber $LabelNumber = null)
    {
        $uri = $this->getUri('/label/number/%s', array());

        return $this->post($uri, $LabelNumber);
    }

    /**
     * Removes a label from a single number
     *
     *
     *
     * @api
     * @param Request\UnlabelNumber $UnlabelNumber = null
     */
    public function UnlabelNumber(Request\UnlabelNumber $UnlabelNumber = null)
    {
        $uri = $this->getUri('/label/number/%s', array());

        return $this->delete($uri, $UnlabelNumber);
    }

}
