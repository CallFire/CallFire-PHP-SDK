<?php
namespace CallFire\Api\Rest;

use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMXPath;

class ClientTest extends TestCase
{
    public function testBasePath()
    {
        $client = $this->getClient();
        $client->setBasePath('foo');
        
        $basePath = $client->getBasePath();
        $this->assertEquals('foo', $basePath);
    }
    
    public function testUsername()
    {
        $client = $this->getClient();
        $client->setUsername('foo');
        
        $username = $client->getUsername();
        $this->assertEquals('foo', $username);
    }
    
    public function testPassword()
    {
        $client = $this->getClient();
        $client->setPassword('foo');
        
        $password = $client->getPassword();
        $this->assertEquals('foo', $password);
    }
    
    public function testHttp()
    {
        $client = $this->getClient();
        
        $http = $client->getHttp();
        $this->assertInstanceOf('CallFire\\Api\\Rest\\Http\Curl', $http);
        
        $http = $this->getMock("CallFire\\Api\\Rest\\Http\\Request");
        $client->setHttp($http);
        
        $http = $client->getHttp();
        $this->assertInstanceOf('CallFire\\Api\\Rest\\Http\\Request', $http);
        $this->assertNotInstanceOf('CallFire\\Api\\Rest\\Http\Curl', $http);
    }

    /**
     * Test construction of parametrized URIs
     * 
     * @dataProvider uriProvider
     */
    public function testGetUri($path, $parameters, $expected)
    {
        $client = $this->getClient();
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
    
    protected function getClient()
    {
        return $this->getMockForAbstractClass('CallFire\\Api\\Rest\\AbstractClient');
    }
}
