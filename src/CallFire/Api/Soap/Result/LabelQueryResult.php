<?php

namespace CallFire\Api\Soap\Result;

class LabelQueryResult extends QueryResult
{

    /**
     * @var Label[]
     */
    protected $labels = array();

    public function getLabels()
    {
        return $this->resources;
    }

    public function setLabels($labels)
    {
        $this->resources = $labels;

        return $this;
    }

    public function addLabel($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
