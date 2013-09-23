<?php
namespace CallFire\Common\Ivr\Dialplan;

class AnalyticsTag extends AbstractTag
{
    const NODE_NAME = 'analytics';
    const ACCOUNT_ATTR = 'account';
    const DOMAIN_ATTR = 'domain';
    const CATEGORY_ATTR = 'category';
    const ACTION_ATTR = 'action';
    const LABEL_ATTR = 'label';
    const VALUE_ATTR = 'value';
    
    public function getAccount() {
        return $this->getAttribute(static::ACCOUNT_ATTR);
    }
    
    public function setAccount($account) {
        $this->setAttribute(static::ACCOUNT_ATTR, $account);
        return $this;
    }
    
    public function getDomain() {
        return $this->getAttribute(static::DOMAIN_ATTR);
    }
    
    public function setDomain($domain) {
        $this->setAttribute(static::DOMAIN_ATTR, $domain);
        return $this;
    }
    
    public function getCategory() {
        return $this->getAttribute(static::CATEGORY_ATTR);
    }
    
    public function setCategory($category) {
        $this->setAttribute(static::CATEGORY_ATTR, $category);
        return $this;
    }
    
    public function getAction() {
        return $this->getAttribute(static::ACTION_ATTR);
    }
    
    public function setAction($action) {
        $this->setAttribute(static::ACTION_ATTR, $action);
        return $this;
    }
    
    public function getLabel() {
        return $this->getAttribute(static::LABEL_ATTR);
    }
    
    public function setLabel($label) {
        $this->setAttribute(static::LABEL_ATTR, $label);
        return $this;
    }
    
    public function getValue() {
        return $this->getAttribute(static::VALUE_ATTR);
    }
    
    public function setValue($value) {
        $this->setAttribute(static::VALUE_ATTR, $value);
        return $this;
    }
}
