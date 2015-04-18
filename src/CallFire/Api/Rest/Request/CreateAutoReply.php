<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class CreateAutoReply extends AbstractRequest
{

    protected $requestId = null;

    /**
     * Phone number to configure an auto reply message
     */
    protected $number = null;

    protected $keyword = null;

    protected $match = null;

    protected $message = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function getMatch()
    {
        return $this->match;
    }

    public function setMatch($match)
    {
        $this->match = $match;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

}
