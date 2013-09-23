<?php
namespace CallFire\Common\Ivr\Dialplan;

class IfTag extends AbstractTag
{
    const NODE_NAME = 'if';
    const EXPR_ATTR = 'expr';
    
    public function getExpr() {
        return $this->getAttribute(static::EXPR_ATTR);
    }
    
    public function setExpr($expr) {
        $this->setAttribute(static::EXPR_ATTR, $expr);
        return $this;
    }
}
