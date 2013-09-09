<?php

namespace CallFire\Api\Soap\Request;

class ControlContactBatch extends IdRequest
{

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var boolean
     */
    protected $enabled = null;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

}
