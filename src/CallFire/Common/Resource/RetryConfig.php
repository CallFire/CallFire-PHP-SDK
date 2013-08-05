<?php
namespace CallFire\Common\Resource;

use \DateTime;
use Zend\Stdlib\Hydrator\Filter\MethodMatchFilter;
use Zend\Stdlib\Hydrator\Filter\FilterComposite;

class RetryConfig extends AbstractResource
{
    protected $maxAttempts;
    
    protected $minutesBetweenAttempts;
    
    protected $retryResults;
    
    public function getMaxAttempts() {
        return $this->maxAttempts;
    }
    
    public function setMaxAttempts($maxAttempts) {
        $this->maxAttempts = $maxAttempts;
        return $this;
    }
    
    public function getMinutesBetweenAttempts() {
        return $this->minutesBetweenAttempts;
    }
    
    public function setMinutesBetweenAttempts($minutesBetweenAttempts) {
        $this->minutesBetweenAttempts = $minutesBetweenAttempts;
        return $this;
    }
    
    public function getRetryResults() {
        return $this->retryResults;
    }
    
    public function setRetryResults($retryResults) {
        $this->retryResults = $retryResults;
        return $this;
    }
}
