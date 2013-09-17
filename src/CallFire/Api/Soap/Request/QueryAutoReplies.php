<?php

namespace CallFire\Api\Soap\Request;

class QueryAutoReplies extends Query
{

    /**
     * @var data:PhoneNumber
     */
    protected $number = null;

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

}
