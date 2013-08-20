<?php
namespace CallFire\Api\Rest\Http;

use CallFire\Api\Client as HelperClient;

class Curl implements Request
{
    protected static $curlFeatures = array(
        CURL_VERSION_IPV6 => 'ipv6',
        CURL_VERSION_KERBEROS4 => 'kerberos4',
        CURL_VERSION_SSL => 'ssl',
        CURL_VERSION_LIBZ => 'libz'
    );

    protected $curl;

    public static function getCurlFeatures() {
        return static::$curlFeatures;
    }
    
    public static function setCurlFeatures($curlFeatures) {
        static::$curlFeatures = $curlFeatures;
    }
    
    public static function getUserAgent($fromAgent = true)
    {
        $userAgent = ini_get('user_agent');
        if(!$userAgent || !$fromAgent) {
            $sdkVersion = HelperClient::getSdkVersion();
            $versionData = curl_version();
            $features = array();
            foreach(static::getCurlFeatures() as $featureMask => $featureName) {
                if($versionData['features'] & $featureMask) {
                    $features[] = $featureName;
                }
            }
            $features = implode('; ', $features);
            $userAgent = "CallFire-PHP-SDK {$sdkVersion}; ext/cURL {$versionData['version']} ({$versionData['host']}) {$versionData['ssl_version']} ({$features})";
        }
    }

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
            if($userAgent = static::getUserAgent()) {
                curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
            }
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
