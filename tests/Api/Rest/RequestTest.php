<?php
namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

use PHPUnit_Framework_TestCase as TestCase;

use Zend\Stdlib\Hydrator\ClassMethods;

use ReflectionClass;
use ReflectionMethod;

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
    
    /**
     * Test that each request type's path parameters are balanced by corresponding
     * method parameters.
     * 
     * @dataProvider provideRequestMethods
     *
     * @param ReflectionMethod $method
     */
    public function testPathParameterBalance(ReflectionMethod $method)
    {
        $this->expectOutputString('');
    
        $startLine = $method->getStartLine() + 1;
        $endLine = $method->getEndLine() - 1;
        $length = $endLine - $startLine;
        
        $source = file($method->getFileName());
        
        $body = implode("", array_slice($source, $startLine, $length));
        
        preg_match('#getUri\(\'(.*)\'#', $body, $matches);
        if(!isset($matches[1])) {
            return;
        }
        
        $path = $matches[1];
        unset($matches);
        
        if(!preg_match_all('#(\%[s,d]{1})#', $path, $matches)) {
            return;
        }
        
        $pathParamCount = count($matches[1]);
        
        $methodParamCount = 0;
        foreach($method->getParameters() as $parameter) {
            if(!$parameter->getClass()) {
                $methodParamCount++;
            }
        }
        
        $this->assertEquals($pathParamCount, $methodParamCount, 'Method has unbalanced path parameters');
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
    
    public function provideRequestMethods()
    {
        $data = array();
        foreach(glob(__DIR__.'/../../../src/CallFire/Api/Rest/Client/*.php') as $filename) {
            $clientName = basename($filename, ".php");
            $clientFQName = 'CallFire\Api\Rest\Client\\'.$clientName;
            $clientReflection = new ReflectionClass($clientFQName);
            
            foreach($clientReflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                if(strpos($method->getDocComment(), '@api') === false)
                    continue;
                
                $data[] = array($method);
            }
        }
        
        return $data;
    }
    
    public function getMockClient()
    {
        $client = $this->getMockForAbstractClass('CallFire\Api\Rest\AbstractClient');

        return $client;
    }
}
