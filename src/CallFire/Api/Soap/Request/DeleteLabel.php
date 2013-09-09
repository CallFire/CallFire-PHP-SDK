<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class DeleteLabel extends AbstractRequest
{

    /**
     * @var string
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
