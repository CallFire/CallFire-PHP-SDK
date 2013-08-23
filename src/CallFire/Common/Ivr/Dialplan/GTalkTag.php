<?php
namespace CallFire\Common\Ivr\Dialplan;

class GTalkTag extends AbstractTag
{
    const NODE_NAME = 'gtalk';
    const USERNAME_ATTR = 'username';
    const PASSWORD_ATTR = 'password';
    const TO_ATTR = 'to';
    
    public function getUsername() {
        return $this->getAttribute(static::USERNAME_ATTR);
    }
    
    public function setUsername($username) {
        $this->setAttribute(static::USERNAME_ATTR, $username);
        return $this;
    }
    
    public function getPassword() {
        return $this->getAttribute(static::PASSWORD_ATTR);
    }
    
    public function setPassword($password) {
        $this->setAttribute(static::PASSWORD_ATTR, $password);
        return $this;
    }
    
    public function getTo() {
        return $this->getAttribute(static::TO_ATTR);
    }
    
    public function setTo($to) {
        $this->setAttribute(static::TO_ATTR, $to);
        return $this;
    }
}
