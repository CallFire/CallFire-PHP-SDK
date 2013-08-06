<?php
namespace CallFire\Common\Resource;

class UsageStats extends AbstractResource
{
    protected $duration;
    
    protected $billedDuration;
    
    protected $billedAmount;
    
    protected $attempts;
    
    protected $actions;
    
    public function getDuration() {
        return $this->duration;
    }
    
    public function setDuration($duration) {
        $this->duration = $duration;
        return $this;
    }
    
    public function getBilledDuration() {
        return $this->billedDuration;
    }
    
    public function setBilledDuration($billedDuration) {
        $this->billedDuration = $billedDuration;
        return $this;
    }
    
    public function getBilledAmount() {
        return $this->billedAmount;
    }
    
    public function setBilledAmount($billedAmount) {
        $this->billedAmount = $billedAmount;
        return $this;
    }
    
    public function getAttempts() {
        return $this->attempts;
    }
    
    public function setAttempts($attempts) {
        $this->attempts = $attempts;
        return $this;
    }
    
    public function getActions() {
        return $this->actions;
    }
    
    public function setActions($actions) {
        $this->actions = $actions;
        return $this;
    }
}
