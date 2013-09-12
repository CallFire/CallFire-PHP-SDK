<?php

namespace CallFire\Common\Resource;

class ActionStatistics extends AbstractResource
{

    /**
     * @var int
     */
    protected $unattempted = null;

    /**
     * @var int
     */
    protected $retryWait = null;

    /**
     * @var int
     */
    protected $finished = null;

    public function getUnattempted()
    {
        return $this->unattempted;
    }

    public function setUnattempted($unattempted)
    {
        $this->unattempted = $unattempted;

        return $this;
    }

    public function getRetryWait()
    {
        return $this->retryWait;
    }

    public function setRetryWait($retryWait)
    {
        $this->retryWait = $retryWait;

        return $this;
    }

    public function getFinished()
    {
        return $this->finished;
    }

    public function setFinished($finished)
    {
        $this->finished = $finished;

        return $this;
    }

}
