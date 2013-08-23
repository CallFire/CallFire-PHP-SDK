<?php
namespace CallFire\Common\Ivr\Dialplan;

class RecordTag extends AbstractTag
{
    const NODE_NAME = 'record';
    const VARNAME_ATTR = 'varname';
    const BACKGROUND_ATTR = 'background';
    const TIMEOUT_ATTR = 'timeout';
    
    public function getVarName() {
        return $this->getAttribute(static::VARNAME_ATTR);
    }
    
    public function setVarName($varName) {
        $this->setAttribute(static::VARNAME_ATTR, $varName);
        return $this;
    }
    
    public function getBackground() {
        return $this->getAttribute(static::BACKGROUND_ATTR);
    }
    
    public function setBackground($background) {
        $this->setAttribute(static::BACKGROUND_ATTR, $background);
        return $this;
    }
    
    public function getTimeout() {
        return $this->getAttribute(static::TIMEOUT_ATTR);
    }
    
    public function setTimeout($timeout) {
        $this->setAttribute(static::TIMEOUT_ATTR, $timeout);
        return $this;
    }
}
