<?php

namespace CallFire\Common\Resource;

class Note extends AbstractResource
{

    /**
     * @var string
     */
    protected $text = null;

    /**
     * @var dateTime
     */
    protected $created = null;

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;

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
