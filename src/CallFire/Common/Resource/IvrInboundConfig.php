<?php

namespace CallFire\Common\Resource;

class IvrInboundConfig extends InboundConfig
{

    /**
     * @var string
     */
    public $dialplanXml = null;

    public function getDialplanXml()
    {
        return $this->dialplanXml;
    }

    public function setDialplanXml($dialplanXml)
    {
        $this->dialplanXml = $dialplanXml;

        return $this;
    }

}
