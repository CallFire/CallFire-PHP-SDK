<?php

namespace CallFire\Api\Soap\Request;

class GetSoundData extends IdRequest
{

    /**
     * @var string
     */
    protected $format = null;

    public function getFormat()
    {
        return $this->format;
    }

    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

}
