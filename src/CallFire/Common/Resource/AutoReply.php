<?php

namespace CallFire\Common\Resource;

class AutoReply extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $number = null;

    /**
     * @var string
     */
    protected $keyword = null;

    /**
     * @var string
     */
    protected $match = null;

    /**
     * @var string
     */
    protected $message = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function getMatch()
    {
        return $this->match;
    }

    public function setMatch($match)
    {
        $this->match = $match;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

}
