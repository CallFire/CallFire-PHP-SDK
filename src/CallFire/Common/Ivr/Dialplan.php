<?php
namespace CallFire\Common\Ivr;

use CallFire\Common\Ivr\Dialplan\AbstractTag;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;

class Dialplan extends AbstractTag
{
    const NODE_NAME = 'dialplan';
    const NAME_ATTR = 'name';
    
    public function __construct($name = null, $value = null, $namespaceURI = null)
    {
        parent::__construct($name?:static::NODE_NAME, $value, $namespaceURI);
    }
    
    public function getName() {
        return $this->getAttribute(static::NAME_ATTR);
    }
    
    public function setName($name) {
        $this->setAttribute(static::NAME_ATTR, $name);
        return $this;
    }
}
