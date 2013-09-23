<?php
namespace CallFire\Common\Ivr\Dialplan;

class MenuTag extends AbstractTag
{
    const NODE_NAME = 'menu';
    const TIMEOUT_ATTR = 'timeout';
    const MAXDIGITS_ATTR = 'maxDigits';
    
    public function getTimeout() {
        return $this->getAttribute(static::TIMEOUT_ATTR);
    }
    
    public function setTimeout($timeout) {
        $this->setAttribute(static::TIMEOUT_ATTR, $timeout);
        return $this;
    }
    
    public function getMaxDigits() {
        return $this->getAttribute(static::MAXDIGITS_ATTR);
    }
    
    public function setMaxDigits($maxDigits) {
        $this->setAttribute(static::MAXDIGITS_ATTR, $maxDigits);
        return $this;
    }
}
