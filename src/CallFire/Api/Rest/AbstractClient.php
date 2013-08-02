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
        $this->updateCredentials();

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        $this->updateCredentials();

        return $this;
    }
    
    public function getHttpClone()
    {
        $http = $this->getHttp();
        return clone $http;
    }
    
    public function getHttp() {
        if(!$this->http) {
            $this->http = new Http\Curl;
            $this->updateCredentials();
        }
        return $this->http;
    }
    
    public function setHttp(Http\Request $http) {
        $this->http = $http;
        return $this;
    }

    public function getUri($path, $parameters = array())
    {
        $uri = $this->getBasePath().vsprintf($path, $parameters);

        return $uri;
    }
    
    protected function updateCredentials()
    {
        if($this->http) {
            $this->http->setOption(CURLOPT_USERPWD, implode(":", array(
                $this->getUsername(),
                $this->getPassword()
            )));
        }
    }
}
