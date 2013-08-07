<?php

namespace CallFire\Common\Resource;

class TextBroadcastConfig extends BroadcastConfig
{

    /**
     * @var string
     */
    public $message = null;

    /**
     * @var string
     */
    public $bigMessageStrategy = null;

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
