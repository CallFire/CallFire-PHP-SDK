<?php
namespace CallFire\Common\Ivr\Dialplan;

class EqualTag extends IfTag
{
    const NODE_NAME = 'equal';
    const VAR_ATTR = 'var';
    
    public function getVar() {
        return $this->getAttribute(static::VAR_ATTR);
    }
    
    public function setVar($var) {
        $this->setAttribute(static::VAR_ATTR, $var);
        return $this;
    }
}
