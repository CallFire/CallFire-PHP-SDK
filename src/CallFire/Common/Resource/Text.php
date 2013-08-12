<?php

namespace CallFire\Common\Resource;

class Text extends Action
{

    /**
     * @var string
     */
    protected $message = null;

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
