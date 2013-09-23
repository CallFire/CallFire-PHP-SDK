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
        
        $this->assertInstanceOf(get_class($tag), $blindTag);
    }
    
    public function testTagTypeLostOnClone()
    {
        $ivr = new Ivr;
        $dialplan = $ivr->getDialplan();
        $tag = $dialplan->Amd();
        
        $cloneTag = $tag->cloneNode();
        
        $this->assertNotInstanceOf(get_class($tag), $cloneTag);
    }
    
    /**
     * Test loading an existing IVR
     *
     * @dataProvider provideIvrFixtures
     * 
     * @param string filename
     */
    public function testLoad($filename)
    {
        $this->markTestIncomplete('IVR loading not implemented properly');
        
        $ivr = new Ivr;
        $ivr->load($filename);
        
        $result = $ivr->saveXML();
        $this->assertXmlStringEqualsXmlFile($filename, $result);
        
        $tagList = $ivr->getTagList();
        $xpath = new DOMXPath($ivr);
        foreach($xpath->query('//*') as $tag) {
            if($tagName = array_search($tag->nodeName, $tagList)) {
                $this->assertInstanceOf(Ivr\Dialplan::ns().'\\'.$tagName, $tag);
            }
        }
    }
    
    public function provideIvrFixtures()
    {
        $data = array();
        foreach(glob(__DIR__.'/fixtures/*.ivr.xml') as $filename) {
            $data[] = array($filename);
        }
        return $data;
    }
}
