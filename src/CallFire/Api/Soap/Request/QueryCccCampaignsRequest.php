<?php

namespace CallFire\Api\Soap\Request;

class QueryCccCampaignsRequest extends Query
{

    /**
     * @var boolean
     */
    protected $running = null;

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var string
     */
    protected $labelName = null;

    public function getRunning()
    {
        return $this->running;
    }

    public function setRunning($running)
    {
        $this->running = $running;

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

    public function getLabelName()
    {
        return $this->labelName;
    }

    public function setLabelName($labelName)
    {
        $this->labelName = $labelName;

        return $this;
    }

}
