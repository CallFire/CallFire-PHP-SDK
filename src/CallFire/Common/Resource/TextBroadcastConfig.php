<?php

namespace CallFire\Common\Resource;

class TextBroadcastConfig extends BroadcastConfig
{

    /**
     * @var string
     */
    protected $message = null;

    /**
     * @var string
     */
    protected $bigMessageStrategy = null;

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getBigMessageStrategy()
    {
        return $this->bigMessageStrategy;
    }

    public function setBigMessageStrategy($bigMessageStrategy)
    {
        $this->bigMessageStrategy = $bigMessageStrategy;

        return $this;
    }

}
