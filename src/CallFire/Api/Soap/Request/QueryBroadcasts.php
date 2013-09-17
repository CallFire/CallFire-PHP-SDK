<?php

namespace CallFire\Api\Soap\Request;

class QueryBroadcasts extends Query
{

    /**
     * @var boolean
     */
    protected $running = null;

    /**
     * @var string
     */
    protected $labelName = null;

    /**
     * @var Type
     */
    protected $type = null;

    public function getRunning()
    {
        return $this->running;
    }

    public function setRunning($running)
    {
        $this->running = $running;

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

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

}
