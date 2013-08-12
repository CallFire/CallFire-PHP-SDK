<?php

namespace CallFire\Common\Resource;

class IvrBroadcastConfig extends BroadcastConfig
{

    /**
     * @var string
     */
    protected $dialplanXml = null;

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
