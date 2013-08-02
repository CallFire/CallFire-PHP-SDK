<?php
namespace CallFire\Api;

use PHPUnit_Framework_TestCase as TestCase;

class ClientTest extends TestCase
{
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
     * @return void
     */
    public function testRest($username, $password, $service)
    {
        $client = Client::Rest($username, $password, $service);
        $this->assertInstanceOf('CallFire\\Api\\Client', $client);
    }
    
    public function restProvider()
    {
        $credentials = array(
            'username',
            'password'
        );
        
        $data = array();
        
        foreach(static::$restServices as $service) {
            $parameters = $credentials;
            $parameters[] = $service;
            $data[] = $parameters;
        }
        
        return $data;
    }
}
