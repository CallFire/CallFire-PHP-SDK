<?php
namespace CallFire\Common\Ivr\Dialplan;

class SetVarTag extends AbstractTag
{
    const NODE_NAME = 'setvar';
    const VARNAME_ATTR = 'varname';
    
    public function getVarName() {
        return $this->getAttribute(static::VARNAME_ATTR);
    }
    
    public function setVarName($varName) {
        $this->setAttribute(static::VARNAME_ATTR, $varName);
        return $this;
    }
}
