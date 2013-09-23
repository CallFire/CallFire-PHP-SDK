<?php
namespace CallFire\Common\Ivr\Dialplan;

class TextTag extends AbstractTag
{
    const NODE_NAME = 'text';
    const TO_ATTR = 'to';
    
    public function getTo() {
        return $this->getAttribute(static::TO_ATTR);
    }
    
    public function setTo($to) {
        $this->setAttribute(static::TO_ATTR, $to);
        return $this;
    }
}
