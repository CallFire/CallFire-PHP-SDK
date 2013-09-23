<?php
namespace CallFire\Common\Ivr\Dialplan;

class CatchTag extends AbstractTag
{
    const NODE_NAME = 'catch';
    const TYPE_ATTR = 'type';
    const VALUE_ATTR = 'value';
    const GOTO_ATTR = 'goto';
    
    public function getType() {
        return $this->getAttribute(static::TYPE_ATTR);
    }
    
    public function setType($type) {
        $this->setAttribute(static::TYPE_ATTR, $type);
        return $this;
    }
    
    public function getValue() {
        return $this->getAttribute(static::VALUE_ATTR);
    }
    
    public function setValue($value) {
        $this->setAttribute(static::VALUE_ATTR, $value);
        return $this;
    }
    
    public function getGoto() {
        return $this->getAttribute(static::GOTO_ATTR);
    }
    
    public function setGoto($goto) {
        $this->setAttribute(static::GOTO_ATTR, $goto);
        return $this;
    }
}
