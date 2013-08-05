<?php
namespace CallFire\Common\Resource;

use \DateTime;
use Zend\Stdlib\Hydrator\Filter\MethodMatchFilter;
use Zend\Stdlib\Hydrator\Filter\FilterComposite;

class IvrBroadcastConfig extends AbstractResource
{
    protected $fromNumber;
    
    protected $retryConfig;
    
    protected $dialplanXml;
    
    public function getFromNumber() {
        return $this->fromNumber;
    }
    
    public function setFromNumber($fromNumber) {
        $this->fromNumber = $fromNumber;
        return $this;
    }
    
    public function getRetryConfig() {
        return $this->retryConfig;
    }
    
    public function setRetryConfig($retryConfig) {
        $this->retryConfig = $retryConfig;
        return $this;
    }
    
    public function getDialplanXml() {
        return $this->dialplanXml;
    }
    
    public function setDialplanXml($dialplanXml) {
        $this->dialplanXml = $dialplanXml;
        return $this;
    }
}
