<?php
namespace CallFire\Api\Rest\Response;

use CallFire\Api\Rest\AbstractClient;

use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMNode;
use DOMXPath;

class ResourceReferenceTest extends TestCase
{
    /**
     * Test Location
     *
     * @dataProvider provideResourceReferenceFixtures
     * 
     * @param string $fixture
     */
    public function testLocation($fixture)
    {
        $reference = AbstractClient::response($fixture);
        
        $location = $reference->getLocation();
        $parsed = parse_url($location);
        
        $this->assertStringEndsWith('callfire.com', $parsed['host']);
        $this->assertStringStartsWith('/api/1.1/rest/', $parsed['path']);
    }
    
    /**
     * Test ID
     *
     * @dataProvider provideResourceReferenceFixtures
     * 
     * @param string $fixture
     */
    public function testId($fixture)
    {
        $reference = AbstractClient::response($fixture);
        
        $id = $reference->getId();
        $this->assertTrue(is_numeric($id));
    }
    /**
     * Test query map
     *
     * @dataProvider provideResourceReferenceFixtures
     * 
     * @param string $fixture
     */
    public function testQueryMap($fixture)
    {
        $reference = AbstractClient::response($fixture);
        
        $map = array(
            'a' => 'a',
            'b' => 'b',
            'c' => 'c'
        );
        $reference->setQueryMap($map);
        
        $idempotentMap = $reference->getQueryMap();
        $this->assertEquals($map, $idempotentMap);
    }
    
    public function provideResourceReferenceFixtures()
    {
        $data = array();
        
        $data[] = array(
            file_get_contents(__DIR__.'/fixtures/ResourceReference.response.xml')
        );

        return $data;
    }
}
