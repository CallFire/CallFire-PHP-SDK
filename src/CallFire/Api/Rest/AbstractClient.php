<?php
namespace CallFire\Api\Rest;

use AbstractRequest;

abstract class AbstractClient
{
    protected $basePath;

    protected $username;

    protected $password;

    protected $http;

    public function get($uri, AbstractRequest $request)
    {
        $http = $this->getHttpClone();

        $queryParameters = http_build_query($request->getQuery());
        $requestUri = "{$uri}?{$queryParameters}";

        $http->setOption(CURLOPT_URL, $requestUri);

        return $http->execute();
    }

    public function post($uri, AbstractRequest $request)
    {

    }

    public function put($uri, AbstractRequest $request)
    {

    }

    public function getBasePath()
    {
        return $this->basePath;
    }

    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    
    public function getHttpClone()
    {
        $http = $this->getHttp();
        return clone $http;
    }
    
    public function getHttp() {
        if(!$this->http) {
            $http = new Http\Curl;
            $http->setOption(CURLOPT_USERPWD, implode(":", array(
                $this->getUsername(),
                $this->getPassword()
            )));
            
            $this->http = $http;
        }
        return $this->http;
    }
    
    public function setHttp($http) {
        $this->http = $http;
        return $this;
    }

    public function getUri($path, $parameters = array())
    {
        $uri = $this->getBasePath().vsprintf($path, $parameters);

        return $uri;
    }
}
