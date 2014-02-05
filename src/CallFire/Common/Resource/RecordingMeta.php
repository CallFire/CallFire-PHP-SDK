<?php

namespace CallFire\Common\Resource;

class RecordingMeta extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var dateTime
     */
    protected $created = null;

    /**
     * @var int
     */
    protected $lengthInSeconds = null;

    /**
     * @var string
     */
    protected $link = null;

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

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    public function getLengthInSeconds()
    {
        return $this->lengthInSeconds;
    }

    public function setLengthInSeconds($lengthInSeconds)
    {
        $this->lengthInSeconds = $lengthInSeconds;

        return $this;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

}
