<?php
namespace CallFire\Api\Rest\Response;

use CallFire\Api\Rest\Response as AbstractResponse;


use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMNode;
use DOMXPath;

class ResourceListTest extends TestCase
{
    /**
     * Test total results
     */
    public function testTotalResults()
    {
        $client = $this->getMockClient();
        
        $fixture = file_get_contents(__DIR__.'/fixtures/ResourceList.response.xml');
        
        $resourceList = $client::response($fixture);
        $this->assertInstanceOf(AbstractResponse::ns().'\\ResourceList', $resourceList);
        
        $totalResults = $resourceList->getTotalResults();
        $this->assertEquals(5, $totalResults);
        
        $this->assertEquals($totalResults, count($resourceList->getResources()));
    }
    
    public function testSetResources()
    {
        $client = $this->getMockClient();
        
        $fixture = file_get_contents(__DIR__.'/fixtures/ResourceList.response.xml');
        
        $resourceList = $client::response($fixture);
        $this->assertInstanceOf(AbstractResponse::ns().'\\ResourceList', $resourceList);
        
        $resources = $resourceList->getResources();
        $resourceList->setResources($resources);
        
        $this->assertEquals($resources, $resourceList->getResources());
    }
    
    public function provideResourceListFixtures()
    {
        $data = array();
        // Intentionally only one. For future purposes
        foreach (glob(__DIR__.'/fixtures/ResourceList.response.xml') as $filename) {
            $data[] = array(
                file_get_contents($filename)
            );
        }

        return $data;
    }
    
    public function provideResourceListNodes()
    {
        $data = $this->providerResourceListFixtures();
        
        $newData = array();
        foreach($data as $fixtureData) {
            $document = new DOMDocument;
            $document->loadXML($fixtureData);
            $xpath = $response::createXPath($document);
            $contextNode = $xpath->query('/r:ResourceList')->item(0);

            $newData[] = array(
                $contextNode,
                $xpath
            );
        }
        
        return $newData;
    }
    
    public function getMockClient()
    {
        $client = $this->getMockForAbstractClass('CallFire\Api\Rest\AbstractClient');

        return $client;
    }
}
