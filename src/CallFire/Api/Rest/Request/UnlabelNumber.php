<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class UnlabelNumber extends AbstractRequest
{

    /**
     * List of E.164 11 digit numbers space seperated and optional fieldName
     */
    protected $number = null;

    /**
     * Label name
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
