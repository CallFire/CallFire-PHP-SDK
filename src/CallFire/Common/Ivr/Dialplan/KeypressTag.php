<?php
namespace CallFire\Common\Ivr\Dialplan;

class KeypressTag extends AbstractTag
{
    const NODE_NAME = 'keypress';
    const PRESSED_ATTR = 'pressed';
    
    public function getPressed() {
        return $this->getAttribute(static::PRESSED_ATTR);
    }
    
    public function setPressed($pressed) {
        $this->setAttribute(static::PRESSED_ATTR, $pressed);
        return $this;
    }
}
