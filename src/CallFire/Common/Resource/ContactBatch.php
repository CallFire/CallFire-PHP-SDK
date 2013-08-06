<?php
namespace CallFire\Common\Resource;

class ContactBatch extends AbstractResource
{
    protected $id;
    
    protected $name;
    
    protected $status;
    
    protected $broadcastId;
    
    protected $created;
    
    protected $size;
    
    protected $remaining;
    
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
    
    public function getBroadcastId() {
        return $this->broadcastId;
    }
    
    public function setBroadcastId($broadcastId) {
        $this->broadcastId = $broadcastId;
        return $this;
    }
    
    public function getCreated() {
        return $this->created;
    }
    
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }
    
    public function getSize() {
        return $this->size;
    }
    
    public function setSize($size) {
        $this->size = $size;
        return $this;
    }
    
    public function getRemaining() {
        return $this->remaining;
    }
    
    public function setRemaining($remaining) {
        $this->remaining = $remaining;
        return $this;
    }
}
