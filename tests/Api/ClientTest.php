<?php
namespace CallFire\Api;

use CallFire\Api\Rest\AbstractClient as RestClient;

use PHPUnit_Framework_TestCase as TestCase;

class ClientTest extends TestCase
{
    public static $credentials = array(
        'username',
        'password'
    );

    public static $restServices = array(
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
     * @dataProvider restProvider
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
        $clients = Client::Rest(static::$credentials[0], static::$credentials[1], static::$restServices);
        foreach ($clients as $key => $client) {
            $matchingServiceName = static::$restServices[$key];
            $this->assertInstanceOf(RestClient::ns()."\\{$matchingServiceName}", $client);
        }
    }
    
    public function testRestInvalid()
    {
        $this->setExpectedException('InvalidArgumentException');
        Client::Rest(static::$credentials[0], static::$credentials[1], true);
    }

    public function restProvider()
    {
        $data = array();

        foreach (static::$restServices as $service) {
            $parameters = static::$credentials;
            $parameters[] = $service;
            $data[] = $parameters;
        }

        return $data;
    }
}
