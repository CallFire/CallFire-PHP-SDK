<?php
namespace CallFire\Common\Ivr\Dialplan;

class TransferTag extends AbstractTag
{
    const NODE_NAME = 'transfer';
    const CALLER_ID_ATTR = 'callerid';
    const CALLER_ID_ALPHA_ATTR = 'calleridalpha';
    const MUSIC_ON_HOLD_ATTR = 'musiconhold';
    const CONTINUE_AFTER_ATTR = 'continue-after';
    const MODE_ATTR = 'mode';
    const TIMEOUT_ATTR = 'timeout';
    const WHISPER_TTS_ATTR = 'whisper-tts';
    
    public function getCallerId() {
        return $this->getAttribute(static::CALLER_ID_ATTR);
    }
    
    public function setCallerId($callerId) {
        $this->setAttribute(static::CALLER_ID_ATTR, $callerId);
        return $this;
    }
    
    public function getCallerIdAlpha() {
        return $this->getAttribute(static::CALLER_ID_ALPHA_ATTR);
    }
    
    public function setCallerIdAlpha($callerIdAlpha) {
        $this->setAttribute(static::CALLER_ID_ALPHA_ATTR, $callerIdAlpha);
        return $this;
    }
    
    public function getMusicOnHold() {
        return $this->getAttribute(static::MUSIC_ON_HOLD_ATTR);
    }
    
    public function setMusicOnHold($musicOnHold) {
        $this->setAttribute(static::MUSIC_ON_HOLD_ATTR, $musicOnHold);
        return $this;
    }
    
    public function getContinueAfter() {
        return $this->getAttribute(static::CONTINUE_AFTER_ATTR);
    }
    
    public function setContinueAfter($continueAfter) {
        $this->setAttribute(static::CONTINUE_AFTER_ATTR, $continueAfter);
        return $this;
    }
    
    public function getMode() {
        return $this->getAttribute(static::MODE_ATTR);
    }
    
    public function setMode($mode) {
        $this->setAttribute(static::MODE_ATTR, $mode);
        return $this;
    }
    
    public function getTimeout() {
        return $this->getAttribute(static::TIMEOUT_ATTR);
    }
    
    public function setTimeout($timeout) {
        $this->setAttribute(static::TIMEOUT_ATTR, $timeout);
        return $this;
    }
    
    public function getWhisperTts() {
        return $this->getAttribute(static::WHISPER_TTS_ATTR);
    }
    
    public function setWhisperTts($whisperTts) {
        $this->setAttribute(static::WHISPER_TTS_ATTR, $whisperTts);
        return $this;
    }
}
