<?php

namespace CallFire\Api\Soap\Request;

class SendCall extends SendRequest
{

    /**
     * @var int
     */
    protected $maxActive = null;

    public function getMaxActive()
    {
        return $this->maxActive;
    }

    public function setMaxActive($maxActive)
    {
        $this->maxActive = $maxActive;

        return $this;
    }

}
