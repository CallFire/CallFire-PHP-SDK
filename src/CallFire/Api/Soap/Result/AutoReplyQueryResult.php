<?php

namespace CallFire\Api\Soap\Result;

class AutoReplyQueryResult extends QueryResult
{

    /**
     * @var AutoReply[]
     */
    protected $autoReplys = array();

    public function getAutoReplys()
    {
        return $this->resources;
    }

    public function setAutoReplys($autoReplys)
    {
        $this->resources = $autoReplys;

        return $this;
    }

    public function addAutoReply($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
