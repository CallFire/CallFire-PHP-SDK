<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Client as HelperClient;
use CallFire\Api\Soap\AbstractClient as SoapClient;

use PHPUnit_Framework_TestCase as TestCase;

use ReflectionClass;

class AbstractClientTest extends TestCase
{
    public static $credentials = array(
        'username',
        'password'
    );
    
    public static $services = array(
        'Broadcast',
        'Call',
        'Contact',
        'Label',
        'Number',
        'Subscription',
        'Text'
    );

    /**
     * Test the existence and instantiation of the request types of service methods
     *
     * @dataProvider serviceProvider
     */
    public function testRequestMethodParameters($client)
    {
        $this->expectOutputString('');
    
        $clientReflection = new ReflectionClass($client);
        
        foreach($clientReflection->getMethods() as $method) {
            $parameters = $method->getParameters();
            if($firstParameter = reset($parameters)) {
                $requestClass = $firstParameter->getClass();
            }
        }
    }
    
    public function serviceProvider()
    {
        $data = array();
        $clients = HelperClient::Soap(static::$credentials[0], static::$credentials[1], static::$services);
        
        foreach($clients as $client) {
            $data[] = array($client);
        }
        
        return $data;
    }
}
