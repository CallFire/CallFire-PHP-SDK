<?php
namespace CallFire\Common;

use CallFire\Common\Ivr\Dialplan;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;

class Ivr extends DOMDocument
{
    public function getDialplan() {
        if(!$this->firstChild) {
            $dialplan = new Dialplan;
            $this->appendChild($dialplan);
        }
        return $this->firstChild;
    }
    
    public function setDialplan(DOMElement $dialplan) {
        $this->replaceChild($dialplan, $this->firstChild);
        return $this;
    }
}
