<?php
namespace CallFire\Api;

use CallFire\Api\Soap\Client as SoapClient;

class Client
{
    public static function Soap($username, $password, $version = 'SOAP_1_2')
    {
        $headers = array(
            'soap_version' => $version,
            'login' => $username,
            'password' => $password
        );
    
        $client = new SoapClient;
        $client->__setSoapHeaders($headers);
        
        return $client;
    }

    public function __construct()
    {
        throw new \BadMethodCallException('The API client cannot be instantiated directly');
    }
}
