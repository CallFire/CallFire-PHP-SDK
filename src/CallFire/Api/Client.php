<?php
namespace CallFire\Api;

use CallFire\Api\Soap\Client as SoapClient;

class Client
{
    public static function Soap($username, $password, $version = 'SOAP_1_2', $wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl')
    {
        $options = array(
            'soap_version' => $version,
            'login' => $username,
            'password' => $password
        );

        $classmap = include __DIR__.'/classmap.php';
        if (is_array($classmap)) {
            $options['classmap'] = $classmap;
        }

        $client = new SoapClient($wsdl, $options);

        return $client;
    }

    public function __construct()
    {
        throw new \BadMethodCallException('The API client cannot be instantiated directly');
    }
}
