<?php
namespace CallFire\Api;

use CallFire\Api\Rest\AbstractClient as RestClient;
use CallFire\Api\Soap\AbstractClient as SoapClient;

use PHPUnit_Framework_TestCase as TestCase;

class ClientTest extends TestCase
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
     * Test instantiation of the Rest client
     *
     * @dataProvider serviceProvider
     *
     * @param string $username
     * @param string $password
     * @param string $service
     */
    public function testRest($username, $password, $service)
    {
        $client = Client::Rest($username, $password, $service);
        $this->assertInstanceOf(RestClient::ns()."\\{$service}", $client);
    }

    public function testRestArray()
    {
        $clients = Client::Rest(static::$credentials[0], static::$credentials[1], static::$services);
        foreach ($clients as $key => $client) {
            $matchingServiceName = static::$services[$key];
            $this->assertInstanceOf(RestClient::ns()."\\{$matchingServiceName}", $client);
        }
    }
    
    public function testRestInvalid()
    {
        $this->setExpectedException('InvalidArgumentException');
        Client::Rest(static::$credentials[0], static::$credentials[1], true);
    }

    /**
     * Test instantiation of the Soap client
     * 
     * @dataProvider serviceProvider
     *
     * @param string $username
     * @param string $password
     * @param string $service
     */
    public function testSoap($username, $password, $service)
    {
        $client = Client::Soap($username, $password, $service);
        $this->assertInstanceOf("CallFire\Api\Soap\AbstractClient", $client);
    }
    
    public function testSoapArray()
    {
        $clients = Client::Soap(static::$credentials[0], static::$credentials[1], static::$services);
        foreach ($clients as $key => $client) {
            $matchingServiceName = static::$services[$key];
            $this->assertInstanceOf(SoapClient::ns()."\\{$matchingServiceName}", $client);
        }
    }

    public function serviceProvider()
    {
        $data = array();

        foreach (static::$services as $service) {
            $parameters = static::$credentials;
            $parameters[] = $service;
            $data[] = $parameters;
        }

        return $data;
    }
}
