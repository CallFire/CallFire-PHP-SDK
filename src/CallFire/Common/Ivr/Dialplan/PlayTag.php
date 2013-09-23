<?php
namespace CallFire\Common\Ivr\Dialplan;

class PlayTag extends AbstractTag
{
    const NODE_NAME = 'play';
    const TYPE_ATTR = 'type';
    const VOICE_ATTR = 'voice';
    const CACHE_ATTR = 'cache';
    
    public function getType() {
        return $this->getAttribute(static::TYPE_ATTR);
    }
    
    public function setType($type) {
        $this->setAttribute(static::TYPE_ATTR, $type);
        return $this;
    }
    
    public function getVoice() {
        return $this->getAttribute(static::VOICE_ATTR);
    }
    
    public function setVoice($voice) {
        $this->setAttribute(static::VOICE_ATTR, $voice);
        return $this;
    }
    
    public function getCache() {
        return $this->getAttribute(static::CACHE_ATTR);
    }
    
    public function setCache($cache) {
        $this->setAttribute(static::CACHE_ATTR, $cache);
        return $this;
    }
}
