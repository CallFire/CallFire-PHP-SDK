<?php
namespace CallFire\Api\Rest;

use CallFire\Api\Rest\Request as AbstractRequest;

abstract class AbstractClient
{
    protected $basePath;

    protected $username;

    protected $password;

    protected $http;

    public function get($uri, AbstractRequest $request = null)
    {
        $http = $this->getHttpClone();
        
        if($request) {
            $requestUri = $this->buildQuery($uri, $request->getQuery());
        } else {
            $requestUri = $uri;
        }

        $http->setOption(CURLOPT_URL, $requestUri);

        return $http->execute();
    }

    public function post($uri, AbstractRequest $request = null)
    {
        $http = $this->getHttpClone();
        
        $http->setOption(CURLOPT_POST, true);
        $http->setOption(CURLOPT_URL, $uri);
        if($request) {
            $http->setOption(CURLOPT_POSTFIELDS, $this->buildPostData($request->getQuery()));
        }
        
        return $http->execute();
    }

    public function put($uri, AbstractRequest $request = null)
    {
        $http = $this->getHttpClone();
        
        $http->setOption(CURLOPT_CUSTOMREQUEST, 'PUT');
        $http->setOption(CURLOPT_URL, $uri);
        if($request) {
            $http->setOption(CURLOPT_POSTFIELDS, $this->buildPostData($request->getQuery()));
        }
        
        return $http->execute();
    }
    
    public function buildQuery($uri, $parameters) {
        $queryParameters = http_build_query($parameters);
        return "{$uri}?{$queryParameters}";
    }
    
    public function buildPostData($parameters) {
        $data = array();
        foreach($parameters as $key => $value) {
            if(is_scalar($value)) {
                $data[] = implode("=", array(
                    rawurlencode($key),
                    rawurlencode($value)
                ));
            } elseif(is_array($value)) {
                foreach($value as $innerValue) {
                    $data[] = implode("=", array(
                        rawurlencode($key),
                        rawurlencode($innerValue)
                    ));
                }
            }
        }
        $data = implode("&", $data);
        
        return $data;
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
