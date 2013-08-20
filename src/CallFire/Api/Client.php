<?php
namespace CallFire\Api;

use CallFire\Api\Rest\AbstractClient as RestClient;

use InvalidArgumentException;

abstract class Client
{
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
}
