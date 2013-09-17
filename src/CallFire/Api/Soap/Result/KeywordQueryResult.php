<?php

namespace CallFire\Api\Soap\Result;

class KeywordQueryResult extends QueryResult
{

    /**
     * @var Keyword[]
     */
    protected $keywords = array();

    public function getKeywords()
    {
        return $this->resources;
    }

    public function setKeywords($keywords)
    {
        $this->resources = $keywords;

        return $this;
    }

    public function addKeyword($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
