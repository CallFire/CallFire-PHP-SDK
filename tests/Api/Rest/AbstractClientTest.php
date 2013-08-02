<?php
namespace CallFire\Api\Rest;

use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMXPath;

class ClientTest extends TestCase
{
    /**
     * Test construction of parametrized URIs
     * 
     * @dataProvider uriProvider
     */
    public function testGetUri($path, $parameters, $expected)
    {
        $client = $this->getMockForAbstractClass('CallFire\\Api\\Rest\\AbstractClient');
        $result = $client->getUri($path, $parameters);
        
        $this->assertEquals($expected, $result);
    }
    
    public function uriProvider()
    {
        $data = array();
    
        $fixture = new DOMDocument;
        $fixture->load(__DIR__.'/fixtures/uri.xml');
        $xpath = new DOMXPath($fixture);
        
        foreach($xpath->query('/fixture/uri') as $uri) {
            $uriData = array();
            $uriData[] = $xpath->query('path', $uri)->item(0)->textContent;
            
            $parameters = $xpath->query('parameters/parameter', $uri);
            $parametersData = array();
            foreach($parameters as $parameter) {
                $parametersData[] = $parameter->textContent;
            }
            $uriData[] = $parametersData;
            
            $uriData[] = $xpath->query('result', $uri)->item(0)->textContent;
            $data[] = $uriData;
        }
        
        return $data;
    }
}
