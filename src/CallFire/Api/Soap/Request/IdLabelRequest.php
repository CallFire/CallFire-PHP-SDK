<?php

namespace CallFire\Api\Soap\Request;

class IdLabelRequest extends IdRequest
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
