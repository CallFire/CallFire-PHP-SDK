<?php
namespace CallFire\Common;

use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMNode;
use DOMXPath;

class IvrTest extends TestCase
{
    public function testGetDialplan()
    {
        $ivr = new Ivr;
        $dialplan = $ivr->getDialplan();
        
        $this->assertInstanceOf('CallFire\Common\Ivr\Dialplan', $dialplan);
    }
    
    public function testTagTypeNotLost()
    {
        $ivr = new Ivr;
        $dialplan = $ivr->getDialplan();
        $tag = $dialplan->Amd();
        
        $blindTag = $dialplan->firstChild;
        $this->assertInstanceOf(get_class($tag), $blindTag);
    }
    
    public function testTagTypeNotLostOnQuery()
    {
        $ivr = new Ivr;
        $dialplan = $ivr->getDialplan();
        $tag = $dialplan->Amd();
        
        $xpath = new DOMXPath($ivr);
        $blindTag = $xpath->query($tag::NODE_NAME, $dialplan)->item(0);
        
        $this->assertInstanceOf(get_clasS($tag), $blindTag);
    }
}
