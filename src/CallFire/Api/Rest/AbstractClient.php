<?php
namespace CallFire\Api\Rest;

use AbstractRequest;

abstract class AbstractClient
{
    protected $basePath;

    protected $username;

    protected $password;

    protected $curl;

    public function get($uri, AbstractRequest $request)
    {
        $curl = $this->getCurlClone();

        $queryParameters = http_build_query($request->getQuery());
        $requestUri = "{$uri}?{$queryParameters}";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $requestUri
        ));

        return curl_exec($curl);
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

    public function getCurlClone()
    {
        $curl = $this->getCurl();

        return curl_copy_handle($curl);
    }

    public function getCurl()
    {
        if ($this->curl) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_USERPWD => implode(":", array($this->getUsername(), $this->getPassword()))
            ));
            $this->curl = $curl;
        }

        return $this->curl;
    }

    public function setCurl($curl)
    {
        $this->curl = $curl;

        return $this;
    }

    protected function getUri($path, $parameters = array())
    {
        $uri = $this->getBasePath().vsprintf($path, $parameters);

        return $uri;
    }
}
