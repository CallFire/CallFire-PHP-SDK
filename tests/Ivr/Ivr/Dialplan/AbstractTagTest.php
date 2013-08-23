<?php
namespace CallFire\Common\Ivr\Dialplan;

use CallFire\Common\Ivr;
use CallFire\Common\Ivr\Dialplan;

use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMNode;

class AbstractTagTest extends TestCase
{
    /**
     * Test __call
     * 
     * @dataProvider provideTagNames
     *
     * @param string $tagName
     */
    public function testCall($tagName)
    {
        $ivr = new Ivr;
        $dialplan = $ivr->getDialplan();
        
        $tag = $dialplan->$tagName();
        $this->assertInstanceOf($dialplan::ns()."\\{$tagName}Tag", $tag);
    }
    
    public function provideTagNames()
    {
        $data = array();
        foreach(glob(__DIR__.'/../../../../src/CallFire/Common/Ivr/Dialplan/*.php') as $filename) {
            $tagName = basename($filename, 'Tag.php');
            if($tagName == 'Abstract') {
                continue;
            }
            $data[] = array($tagName);
        }
        
        return $data;
    }
}
