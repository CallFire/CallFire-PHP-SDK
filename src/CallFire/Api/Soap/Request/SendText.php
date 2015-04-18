<?php

namespace CallFire\Api\Soap\Request;

class SendText extends SendRequest
{

    /**
     * @var long
     */
    protected $broadcastId = null;

    /**
     * @var boolean
     */
    protected $useDefaultBroadcast = null;

    /**
     * @var TextBroadcastConfig
     */
    protected $textBroadcastConfig = null;

    public function getBroadcastId()
    {
        return $this->broadcastId;
    }

    public function setBroadcastId($broadcastId)
    {
        $this->broadcastId = $broadcastId;

        return $this;
    }

    public function getUseDefaultBroadcast()
    {
        return $this->useDefaultBroadcast;
    }

    public function setUseDefaultBroadcast($useDefaultBroadcast)
    {
        $this->useDefaultBroadcast = $useDefaultBroadcast;

        return $this;
    }

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
