<?php

namespace CallFire\Common\Resource;

class ResultStat extends AbstractResource
{

    /**
     * @var string
     */
    protected $result = null;

    /**
     * @var int
     */
    protected $attempts = null;

    /**
     * @var int
     */
    protected $actions = null;

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    public function getAttempts()
    {
        return $this->attempts;
    }

    public function setAttempts($attempts)
    {
        $this->attempts = $attempts;

        return $this;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function setActions($actions)
    {
        $this->actions = $actions;

        return $this;
    }

}
