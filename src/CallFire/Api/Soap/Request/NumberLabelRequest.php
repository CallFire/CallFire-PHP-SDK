<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class NumberLabelRequest extends AbstractRequest
{

    /**
     * @var string
     */
    protected $number = null;

    /**
     * @var string
     */
    protected $labelName = null;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

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
