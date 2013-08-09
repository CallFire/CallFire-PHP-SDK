<?php
namespace CallFire\Api\Rest\Response;

use PHPUnit_Framework_TestCase as TestCase;

use CallFire\Api\Rest\Response as AbstractResponse;

use DOMDocument;
use DOMNode;
use DOMXPath;

class ResponseTest extends TestCase
{
    /**
     * Tests parsing of fixtures into resource nodes
     *
     * @dataProvider provideResourceFixtures
     * 
     * @param string $resourceName
     * @param DOMNode $resourceNode
     */
    public function testParseResourceNode($resourceName, $resourceNode)
    {
        $response = $this->getMockResponse();
        $response->setXPath($response::createXPath($resourceNode->ownerDocument));
        $resource = $response->parseResourceNode($resourceNode);
        
        if(class_exists($resourceName)) {
            $this->assertInstanceOf($resourceName, $resource);
        } else {
            $this->assertFalse($resource);
        }
    }
    
    public function provideResourceFixtures()
    {
        $data = array();
        $response = $this->getMockResponse();
        foreach(glob(__DIR__.'/Response/fixtures/*.resource.xml') as $fixture) {
            $fixtureName = basename($fixture, ".xml");
            list($className, $resourceType) = (explode('.', $fixtureName) + array_fill(0, 2, null));
            $qualifiedClassName = "CallFire\\Common\\Resource\\{$className}";
            
            $document = new DOMDocument;
            $document->load($fixture);
            $xpath = $response::createXPath($document);
            $contextNode = $xpath->query('/r:Resource')->item(0);
            $resourceNode = $xpath->query('*[1]', $contextNode)->item(0);
            
            $data[] = array(
                $qualifiedClassName,
                $resourceNode
            );
        }
        
        return $data;
    }
    
    public function getMockResponse()
    {
        $response = $this->getMockForAbstractClass('CallFire\\Api\\Rest\\Response');
        
        return $response;
    }
}
