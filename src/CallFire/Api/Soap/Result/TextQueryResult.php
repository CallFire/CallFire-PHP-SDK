<?php

namespace CallFire\Api\Soap\Result;

class TextQueryResult extends QueryResult
{

    /**
     * @var Text[]
     */
    protected $texts = array();

    public function getTexts()
    {
        return $this->resources;
    }

    public function setTexts($texts)
    {
        $this->resources = $texts;

        return $this;
    }

    public function addText($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
