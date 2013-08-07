<?php

namespace CallFire\Common\Resource;

class NumberConfiguration extends AbstractResource
{

    /**
     * @var string
     */
    public $callFeature = null;

    /**
     * @var string
     */
    public $textFeature = null;

    /**
     * @var string
     */
    public $inboundCallConfigurationType = null;

    /**
     * @var InboundCallConfiguration
     */
    public $inboundCallConfiguration = null;

    public function getCallFeature()
    {
        return $this->callFeature;
    }

    public function setCallFeature($callFeature)
    {
        $this->callFeature = $callFeature;

        return $this;
    }

    public function getTextFeature()
    {
        return $this->textFeature;
    }

    public function setTextFeature($textFeature)
    {
        $this->textFeature = $textFeature;

        return $this;
    }

    public function getInboundCallConfigurationType()
    {
        return $this->inboundCallConfigurationType;
    }

    public function setInboundCallConfigurationType($inboundCallConfigurationType)
    {
        $this->inboundCallConfigurationType = $inboundCallConfigurationType;

        return $this;
    }

    public function getInboundCallConfiguration()
    {
        return $this->inboundCallConfiguration;
    }

    public function setInboundCallConfiguration($inboundCallConfiguration)
    {
        $this->inboundCallConfiguration = $inboundCallConfiguration;

        return $this;
    }

}
