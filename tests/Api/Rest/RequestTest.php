<?php
namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\Stdlib\Hydrator\ClassMethods;

class RequestTest extends TestCase
{
    /**
     * Test population of each request type
     *
     * @dataProvider provideRequestTypes
     *
     * @param string $requestType
     */
    public function testRequestHydration($requestType)
    {
        $client = $this->getMockClient();

        $request = $client::request($requestType);
        $this->assertInstanceOf(AbstractRequest::ns()."\\{$requestType}", $request);
    
        $hydrator = $request->getHydrator();
        $data = $hydrator->extract($request);
        
        foreach($data as &$value) {
            $value = ' ';
        }
        
        $request = $hydrator->hydrate($data, $request);
        
        $idempotentData = $hydrator->extract($request);
        
        $this->assertEquals($data, $idempotentData);
    }
    
    public function provideRequestTypes()
    {
        $data = array();
        foreach(glob(__DIR__.'/../../../src/CallFire/Api/Rest/Request/*.php') as $filename) {
            $requestType = basename($filename, ".php");
            $data[] = array(
                $requestType
            );
        }
        
        return $data;
    }
    
    public function getMockClient()
    {
        $client = $this->getMockForAbstractClass('CallFire\Api\Rest\AbstractClient');

        return $client;
    }
}
