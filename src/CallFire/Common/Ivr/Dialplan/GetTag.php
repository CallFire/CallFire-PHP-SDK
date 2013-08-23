<?php
namespace CallFire\Common\Ivr\Dialplan;

class GetTag extends AbstractTag
{
    const NODE_NAME = 'get';
    const VARNAME_ATTR = 'varname';
    
    public function getVarName() {
        return $this->getAttribute(static::VARNAME_ATTR);
    }
    
    public function setVarName($varName) {
        $this->setAttribute(static::VARNAME_ATTR, $varName);
        return $this;
    }
}
