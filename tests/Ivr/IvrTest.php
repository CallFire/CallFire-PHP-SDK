<?php
namespace CallFire\Common;

use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMNode;

class IvrTest extends TestCase
{
    public function testGetDialplan()
    {
        $ivr = new Ivr;
        $dialplan = $ivr->getDialplan();
        
        $this->assertInstanceOf('CallFire\Common\Ivr\Dialplan', $dialplan);
    }
}
