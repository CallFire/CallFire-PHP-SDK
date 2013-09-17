<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Soap\AbstractRequest;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\Stdlib\Hydrator\ClassMethods;

use ReflectionClass;

class AbstractRequestTest extends TestCase
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
        $requestReflection = new ReflectionClass(AbstractRequest::ns()."\\{$requestType}");
        if($requestReflection->isAbstract()) {
            return;
        }
    
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
        foreach(glob(__DIR__.'/../../../src/CallFire/Api/Soap/Request/*.php') as $filename) {
            $requestType = basename($filename, ".php");
            $data[] = array(
                $requestType
            );
        }
        
        return $data;
    }
    
    public function getMockClient()
    {
        $client = $this->getMockForAbstractClass('CallFire\Api\Soap\AbstractClient');

        return $client;
    }
}
