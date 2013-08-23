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
    
    /**
     * Test hydration of each tag type
     *
     * @dataProvider provideTagNames
     * 
     * @param string $tagName
     */
    public function testHydration($tagName)
    {
        $ivr = new Ivr;
        $dialplan = $ivr->getDialplan();
        $tag = $dialplan->$tagName();
    
        $hydrator = $tag->getHydrator();
        $fields = $hydrator->extract($tag);
        
        foreach($fields as &$value) {
            $value = ' ';
        }
        
        $hydrator->hydrate($fields, $tag);
        
        $idempotentFields = $hydrator->extract($tag);
        
        $this->assertEquals($fields, $idempotentFields);
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
