<?php
namespace CallFire\Generator\Rest;

use CallFire\Generator\Rest as RestGenerator;
use CallFire\Generator\Rest\Swagger\Api as SwaggerApi;
use CallFire\Generator\Rest\Swagger\Operation as SwaggerOperation;

use Zend\Code\Generator as CodeGenerator;

abstract class Action
{
    const ROUTE_REGEX = "#(?:\{(\w+)\})#U";

    const PARAM_TYPE_QUERY = "query";
    const PARAM_TYPE_FORM = "form";
    const PARAM_TYPE_PATH = "path";

    protected $api;

    protected $operation;

    protected $methodGenerator;

    protected $parameterClassGenerator;

    protected $parameterGenerator;

    protected $propertyGenerator;

    public function generate()
    {
        $method = $this->getMethodGenerator();
        $api = $this->getApi();
        $operation = $this->getOperation();

        $method->setName($operation->getNickname());

        $parameterClassGenerator = $this->getParameterClassGenerator();
        $parameterClassGenerator->setName($operation->getNickname());

        $parameterGenerator = $this->getParameterGenerator();
        $propertyGenerator = $this->getPropertyGenerator();

        $hasRequired = false;
        $routeParams = array();
        foreach ($operation->getParameters() as $swaggerParameter) {
            switch ($swaggerParameter->getParamType()) {
                case self::PARAM_TYPE_PATH:
                    if ($swaggerParameter->getRequired()) {
                        $hasRequired = true;
                    }
                    $parameters = $method->getParameters();
                    if (isset($parameters[$swaggerParameter->getName()])) {
                        continue;
                    }
                    $parameter = clone $parameterGenerator;
                    $parameter->setName($swaggerParameter->getName());
                    $method->setParameter($parameter);
                    $routeParams[] = $parameter;
                    break;
                case self::PARAM_TYPE_QUERY:
                case self::PARAM_TYPE_FORM:
                    if ($parameterClassGenerator->hasProperty($swaggerParameter->getName())) {
                        continue;
                    }
                    $property = clone $propertyGenerator;
                    $property->setName($swaggerParameter->getName());
                    $parameterClassGenerator->addPropertyFromGenerator($property);
                    break;
            }
        }
        if (count($parameterClassGenerator->getProperties())) {
            $queryParameter = clone $parameterGenerator;
            $queryParameter->setName($operation->getNickname());
            $queryParameter->setType(RestGenerator::REQUEST_NAMESPACE_ALIAS.'\\'.$operation->getNickname());
            if (!$hasRequired) {
                $queryParameter->setDefaultValue(new CodeGenerator\ValueGenerator(null));
            }
            $method->setParameter($queryParameter);;
        } else {
            $queryParameter = null;
        }

        $body = $this->getBody($routeParams, $queryParameter);
        $method->setBody($body);
    }

    abstract protected function getBody($routeParams = array(), $queryParameter = null);

    protected function getRoute()
    {
        $api = $this->getApi();
        preg_match(self::ROUTE_REGEX, $api->getPath(), $segments);
        array_shift($segments);

        $route = preg_replace(self::ROUTE_REGEX, "%s", $api->getPath());

        return array(
            0 => $route,
            1 => $segments
        );
    }

    public function getApi()
    {
        return $this->api;
    }

    public function setApi(SwaggerApi $api)
    {
        $this->api = $api;

        return $this;
    }

    public function getOperation()
    {
        return $this->operation;
    }

    public function setOperation(SwaggerOperation $operation)
    {
        $this->operation = $operation;

        return $this;
    }

    public function getMethodGenerator()
    {
        if (!$this->methodGenerator) {
            $this->methodGenerator = new CodeGenerator\MethodGenerator;
        }

        return $this->methodGenerator;
    }

    public function setMethodGenerator(CodeGenerator\MethodGenerator $methodGenerator)
    {
        $this->methodGenerator = $methodGenerator;

        return $this;
    }

    public function getParameterClassGenerator()
    {
        if (!$this->parameterClassGenerator) {
            $generator = new CodeGenerator\ClassGenerator;
            $generator->setExtendedClass(RestGenerator::ABSTRACT_REQUEST_ALIAS);

            $this->parameterClassGenerator = $generator;
        }

        return $this->parameterClassGenerator;
    }

    public function setParameterClassGenerator($parameterClassGenerator)
    {
        $this->parameterClassGenerator = $parameterClassGenerator;

        return $this;
    }

    public function getParameterGenerator()
    {
        if (!$this->parameterGenerator) {
            $this->parameterGenerator = new CodeGenerator\ParameterGenerator;
        }

        return $this->parameterGenerator;
    }

    public function setParameterGenerator(CodeGenerator\ParameterGenerator $parameterGenerator)
    {
        $this->parameterGenerator = $parameterGenerator;

        return $this;
    }

    public function getPropertyGenerator()
    {
        if (!$this->propertyGenerator) {
            $this->propertyGenerator = new CodeGenerator\PropertyGenerator;
        }

        return $this->propertyGenerator;
    }

    public function setPropertyGenerator(CodeGenerator\PropertyGenerator $propertyGenerator)
    {
        $this->propertyGenerator = $propertyGenerator;

        return $this;
    }
}
