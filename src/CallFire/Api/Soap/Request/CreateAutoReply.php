<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class CreateAutoReply extends AbstractRequest
{

    /**
     * @var anyURI
     */
    protected $requestId = null;

    /**
     * @var AutoReply
     */
    protected $autoReply = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getAutoReply()
    {
        return $this->autoReply;
    }

    public function setAutoReply($autoReply)
    {
        $this->autoReply = $autoReply;

        return $this;
    }

}
