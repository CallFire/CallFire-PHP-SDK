<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class LabelBroadcast extends AbstractRequest
{

    /**
     * Label name
     */
    protected $labelName = null;

    public function getLabelName()
    {
        return $this->labelName;
    }

    public function setLabelName($labelName)
    {
        $this->labelName = $labelName;

        return $this;
    }

}
