<?php
namespace CallFire\Api\Rest\Http;

class Curl implements Request
{
    protected $curl;

    public function setOption($name, $value)
    {
        curl_setopt($this->getCurl(), $name, $value);
    }

    public function setOptions($options)
    {
        curl_setopt_array($this->getCurl(), $options);
    }

    public function execute()
    {
        return curl_exec($this->getCurl());
    }

    public function getInfo($name)
    {
        return curl_getinfo($this->getCurl(), $name);
    }

    public function close()
    {
        curl_close($this->getCurl());
    }

    public function getCurl()
    {
        if (!$this->curl) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true
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

    public function __clone()
    {
        $this->curl = curl_copy_handle($this->curl);
    }
}
