<?php
namespace CallFire\Common\Resource;

use \DateTime;
use Zend\Stdlib\Hydrator\Filter\MethodMatchFilter;
use Zend\Stdlib\Hydrator\Filter\FilterComposite;

class Broadcast extends AbstractResource
{
    protected $id;
    
    protected $name;
    
    protected $status;
    
    protected $type;
    
    protected $ivrBroadcastConfig;
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    
    public function getStatus() {
        return $this->status;
    }
    
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
        return $this;
    }
    
    public function getIvrBroadcastConfig() {
        return $this->ivrBroadcastConfig;
    }
    
    public function setIvrBroadcastConfig($ivrBroadcastConfig) {
        $this->ivrBroadcastConfig = $ivrBroadcastConfig;
        return $this;
    }
}
