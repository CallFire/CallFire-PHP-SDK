<?php

namespace CallFire\Common\Resource;

class RetryConfig extends AbstractResource
{

    /**
     * @var int
     */
    public $maxAttempts = null;

    /**
     * @var int
     */
    public $minutesBetweenAttempts = null;

    /**
     * @var RetryResults
     */
    public $retryResults = null;

    public function getMaxAttempts()
    {
        return $this->maxAttempts;
    }

    public function setMaxAttempts($maxAttempts)
    {
        $this->maxAttempts = $maxAttempts;

        return $this;
    }

    public function getMinutesBetweenAttempts()
    {
        return $this->minutesBetweenAttempts;
    }

    public function setMinutesBetweenAttempts($minutesBetweenAttempts)
    {
        $this->minutesBetweenAttempts = $minutesBetweenAttempts;

        return $this;
    }

    public function getRetryResults()
    {
        return $this->retryResults;
    }

    public function setRetryResults($retryResults)
    {
        $this->retryResults = $retryResults;

        return $this;
    }

}
