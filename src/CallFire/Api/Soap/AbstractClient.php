<?php
namespace CallFire\Api\Soap;

use CallFire\Common\Client\ClientInterface;
use CallFire\Common\Resource\AbstractResource;

use SoapClient;
use SoapFault;

abstract class AbstractClient extends SoapClient implements ClientInterface
{
    public static function ns()
    {
        $ns = explode('\\', __CLASS__);
        array_pop($ns);
        $ns = implode('\\', $ns);

        return "{$ns}\\Client";
    }

    public static function request($type)
    {
        $requestClass = AbstractRequest::ns()."\\{$type}";

        return new $requestClass;
    }

    public static function response($result)
    {
        if (is_numeric($result)) {
            $reference = new Response\ResourceReference;
            $reference->setId((int) $result);

            $result = $reference;
        }

        if ($result instanceof SoapFault) {
            $exception = new Response\ResourceException;
            $exception->setMessage($result->getMessage());

            $result = $exception;
        }

        if ($result instanceof AbstractResource) {
            $resource = new Response\Resource;
            $resource->setResource($result);

            $result = $resource;
        }

        return $result;
    }

    public function __construct($wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::SoapClient($wsdl, $options);
    }

    public function __call($name, $arguments)
    {
        if (isset($arguments[0]) && $arguments[0] instanceof AbstractRequest) {
            if ($param = $arguments[0]->marshall()) {
                $arguments[0] = $param;
            }
        }

        try {
            $result = parent::__call($name, $arguments);
        } catch (SoapFault $fault) {
            $result = $fault;
        }

        $result = static::response($result);

        return $result;
    }
}
