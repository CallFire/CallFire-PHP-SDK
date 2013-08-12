<?php

namespace CallFire\Common\Resource;

abstract class InboundConfig extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

}
