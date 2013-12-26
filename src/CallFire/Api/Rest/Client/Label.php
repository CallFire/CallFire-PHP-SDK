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
     * Delete label identified by name. All broadcasts and numbers currently containing
     * the label will have the label association removed.
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
     * Return list of all defined label names. The labels may be associated with
     * broadcasts or numbers.
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
     * Label broadcast (Voice, Text, or IVR) by specifying broadcastId and label name.
     * If label name doesn't currently exist on system it will be created and saved.
     *
     * @api
     * @param int                    $Id             Unique ID of resource
     * @param Request\LabelBroadcast $LabelBroadcast
     */
    public function LabelBroadcast($Id, Request\LabelBroadcast $LabelBroadcast)
    {
        $uri = $this->getUri('/label/broadcast/%s', array($Id));

        return $this->post($uri, $LabelBroadcast);
    }

    /**
     * Removes a label from a single broadcast
     *
     * Remove label from broadcast. This doesn't remove label from system, it just
     * removes association between broadcast and label.
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
     * Label number by specifying E.164 11 digit number identifier and label name. If
     * label name doesn't currently exist on system it will be created and saved.
     *
     * @api
     * @param string $Number List of E.164 11 digit numbers space seperated and
     * optional fieldName
     * @param Request\LabelNumber $LabelNumber
     */
    public function LabelNumber($Number, Request\LabelNumber $LabelNumber)
    {
        $uri = $this->getUri('/label/number/%s', array($Number));

        return $this->post($uri, $LabelNumber);
    }

    /**
     * Removes a label from a single number
     *
     * Remove label from number. This doesn't remove label from system, it just removes
     * association between number and label.
     *
     * @api
     * @param string $Number List of E.164 11 digit numbers space seperated and
     * optional fieldName
     * @param Request\UnlabelNumber $UnlabelNumber
     */
    public function UnlabelNumber($Number, Request\UnlabelNumber $UnlabelNumber)
    {
        $uri = $this->getUri('/label/number/%s', array($Number));

        return $this->delete($uri, $UnlabelNumber);
    }

}
