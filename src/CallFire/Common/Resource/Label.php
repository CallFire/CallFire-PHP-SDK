<?php

namespace CallFire\Common\Resource;

class Label extends AbstractResource
{

    /**
     * @var string
     */
    protected $name = null;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

}
