<?php
namespace CallFire\Common\Ivr;

use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMNode;

class DialplanTest extends TestCase
{
    public function testConstructor()
    {
        $dialplan = new Dialplan;
        $this->assertEquals(Dialplan::NODE_NAME, $dialplan->nodeName);
    }
}
