<?php

namespace CallFire\Common\Resource;

class Question extends AbstractResource
{

    /**
     * @var string
     */
    protected $label = null;

    /**
     * @var string
     */
    protected $responseType = null;

    /**
     * @var string[]
     */
    protected $choices = null;

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    public function getResponseType()
    {
        return $this->responseType;
    }

    public function setResponseType($responseType)
    {
        $this->responseType = $responseType;

        return $this;
    }

    public function getChoices()
    {
        return $this->choices;
    }

    public function setChoices($choices)
    {
        $this->choices = $choices;

        return $this;
    }

}
