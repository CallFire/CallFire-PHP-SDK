<?php

namespace CallFire\Common\Resource;

class RetryConfig extends AbstractResource
{

    /**
     * @var int
     */
    protected $maxAttempts = null;

    /**
     * @var int
     */
    protected $minutesBetweenAttempts = null;

    /**
     * @var RetryResults
     */
    protected $retryResults = null;

    /**
     * @var RetryPhoneTypes
     */
    protected $retryPhoneTypes = null;

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

    public function getRetryPhoneTypes()
    {
        return $this->retryPhoneTypes;
    }

    public function setRetryPhoneTypes($retryPhoneTypes)
    {
        $this->retryPhoneTypes = $retryPhoneTypes;

        return $this;
    }

}
