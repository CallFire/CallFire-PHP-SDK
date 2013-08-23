<?php
namespace CallFire\Common\Ivr\Dialplan;

class DncTag extends AbstractTag
{
    const NODE_NAME = 'dnc';
    const LOGGING_ENABLED_ATTR = 'loggingEnabled';
    
    public function getLoggingEnabled() {
        return $this->getAttribute(static::LOGGING_ENABLED_ATTR);
    }
    
    public function setLoggingEnabled($loggingEnabled) {
        $this->setAttribute(static::LOGGING_ENABLED_ATTR, $loggingEnabled);
        return $this;
    }
    
}
