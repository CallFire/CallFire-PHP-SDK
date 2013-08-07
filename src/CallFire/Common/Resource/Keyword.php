<?php

namespace CallFire\Common\Resource;

class Keyword extends AbstractResource
{

    /**
     * @var string
     */
    public $shortCode = null;

    /**
     * @var string
     */
    public $keyword = null;

    /**
     * @var string
     */
    public $status = null;

    public function getShortCode()
    {
        return $this->shortCode;
    }

    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;

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

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

}
