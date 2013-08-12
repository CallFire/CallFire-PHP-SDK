<?php

namespace CallFire\Common\Resource;

class SoundMeta extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $status = null;

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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

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

}
