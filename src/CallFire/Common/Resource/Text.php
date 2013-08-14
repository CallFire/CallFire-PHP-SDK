<?php

namespace CallFire\Common\Resource;

class Text extends Action
{

    /**
     * @var string
     */
    protected $message = null;

    /**
     * @var TextRecord[]
     */
    protected $textRecords = array();

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getTextRecords()
    {
        return $this->textRecords;
    }

    public function setTextRecords($textRecords)
    {
        $this->textRecords = $textRecords;

        return $this;
    }

}
