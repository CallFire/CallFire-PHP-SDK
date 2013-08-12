<?php

namespace CallFire\Common\Resource;

class NumberConfiguration extends AbstractResource
{

    /**
     * @var string
     */
    protected $callFeature = null;

    /**
     * @var string
     */
    protected $textFeature = null;

    /**
     * @var string
     */
    protected $inboundCallConfigurationType = null;

    /**
     * @var InboundCallConfiguration
     */
    protected $inboundCallConfiguration = null;

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
