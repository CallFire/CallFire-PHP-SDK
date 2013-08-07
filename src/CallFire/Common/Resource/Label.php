<?php

namespace CallFire\Common\Resource;

class Label extends AbstractResource
{

    /**
     * @var string
     */
    public $name = null;

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
