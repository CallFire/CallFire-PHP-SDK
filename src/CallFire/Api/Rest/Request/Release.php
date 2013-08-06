<?php

namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class Release extends AbstractRequest
{

    /**
     * List of E.164 11 digit numbers to release (space seperated)
     */
    protected $numbers = null;

    /**
     * List of keywords to release (space seperated)
     */
    protected $keywords = null;

    public function getNumbers()
    {
        return $this->numbers;
    }

    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

}
