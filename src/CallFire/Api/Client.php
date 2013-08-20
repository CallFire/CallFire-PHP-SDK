<?php
namespace CallFire\Api;

use CallFire\Api\Rest\AbstractClient as RestClient;
use CallFire\Api\Soap\Client as SoapClient;

use InvalidArgumentException;

abstract class Client
{
    protected static $sdkVersion;
    
    public static function getSdkVersion() {
        if(!static::$sdkVersion) {
            $versionFile = __DIR__.'/../../VERSION';
            if(is_readable($versionFile)) {
                static::$sdkVersion = file_get_contents($versionFile);
            }
        }
        return static::$sdkVersion;
    }
    
    public static function setSdkVersion($sdkVersion) {
        static::$sdkVersion = $sdkVersion;
        return $this;
    }

    /**
     * Create one or more REST service clients
     *
     * @static
     * @param  string                                              $username API Login
     * @param  string                                              $password API Password
     * @param  string|array                                        $service  Service name(s)
     * @return CallFire\Api\Rest\Client|CallFire\Api\Rest\Client[] REST API client(s)
     */
    public static function Rest($username, $password, $service)
    {
        if (is_string($service)) {
            return static::createRestClient($username, $password, $service);
        } elseif (is_array($service)) {
            $services = array();

            foreach ($service as $serviceName) {
                $services[] = static::createRestClient($username, $password, $serviceName);
            }

            return $services;
        }
        
        throw new InvalidArgumentException('Client::Rest accepts either a service name, or an array of service names');
    }

    /**
     * Instantiate a REST service client
     *
     * @static
     * @param  string                   $username API Login
     * @param  string                   $password API Password
     * @param  string                   $service  Service name
     * @return CallFire\Api\Rest\Client REST API client
     */
    protected static function createRestClient($username, $password, $service)
    {
        $serviceClass = RestClient::ns()."\\{$service}";
        $client = new $serviceClass;

        $client->setUsername($username);
        $client->setPassword($password);

        return $client;
    }

    /**
     * Create a SOAP client
     *
     * @static
     * @param  string                   $username API Login
     * @param  string                   $password API Password
     * @param  string                   $version  = 'SOAP_1_2' SOAP version
     * @param  string                   $wsdl     = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl' SOAP WSDL
     * @return CallFire\Api\Soap\Client SOAP API client
     */
    public static function Soap($username, $password, $version = 'SOAP_1_2', $wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl')
    {
        $options = array(
            'soap_version' => $version,
            'login' => $username,
            'password' => $password
        );

        $classmap = include __DIR__.'/Soap/classmap.php';
        if (is_array($classmap)) {
            $options['classmap'] = $classmap;
        }

        $client = new SoapClient($wsdl, $options);

        return $client;
    }
}
