<?php
namespace CallFire\Generator\Rest\Swagger;

use Zend\Stdlib\Hydrator;

class Operation
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    protected $httpMethod;

    protected $nickname;

    protected $responseClass;

    protected $summary;

    protected $notes;

    protected $parameters = array();

    protected $hydrator;

    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    public function setHttpMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;

        return $this;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getResponseClass()
    {
        return $this->responseClass;
    }

    public function setResponseClass($responseClass)
    {
        $this->responseClass = $responseClass;

        return $this;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    public function addParameter(Parameter $parameter)
    {
        $this->parameters[] = $parameter;

        return $this;
    }

    public function getHydrator()
    {
        if (!$this->hydrator) {
            $this->hydrator = new Hydrator\ClassMethods;
        }

        return $this->hydrator;
    }

    public function setHydrator(Hydrator\HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;

        return $this;
    }

    public function hydrate($data, Hydrator\HydratorInterface $parameterHydrator = null)
    {
        if (isset($data['parameters']) && ($parameters = $data['parameters'])) {
            unset($data['parameters']);

            $parameterProto = new Parameter;
            if ($parameterHydrator) {
                $parameterProto->setHydrator($parameterHydrator);
            }

            foreach ($parameters as $parameterData) {
                $parameter = clone $parameterProto;
                $parameter->hydrate($parameterData);
                $this->addParameter($parameter);
            }
        }

        $hydrator = $this->getHydrator();
        $hydrator->hydrate($data, $this);

        return $this;
    }
}
