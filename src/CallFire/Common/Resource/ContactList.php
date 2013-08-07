<?php

namespace CallFire\Common\Resource;

class ContactList extends AbstractResource
{

    /**
     * @var long
     */
    public $id = null;

    /**
     * @var string
     */
    public $name = null;

    /**
     * @var integer
     */
    public $size = null;

    /**
     * @var dateTime
     */
    public $created = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

}
