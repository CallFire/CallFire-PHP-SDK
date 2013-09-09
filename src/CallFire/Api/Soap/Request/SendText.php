<?php

namespace CallFire\Api\Soap\Request;

class SendText extends SendRequest
{

    /**
     * @var TextBroadcastConfig
     */
    protected $textBroadcastConfig = null;

    public function getTextBroadcastConfig()
    {
        return $this->textBroadcastConfig;
    }

    public function setTextBroadcastConfig($textBroadcastConfig)
    {
        $this->textBroadcastConfig = $textBroadcastConfig;

        return $this;
    }

}
