<?php
namespace CallFire\Common\Resource;

class BroadcastStats extends AbstractResource
{
    protected $stats;
    
    public function getStats() {
        return $this->stats;
    }
    
    public function setStats($stats) {
        $this->stats = $stats;
        return $this;
    }
}
