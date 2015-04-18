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

    protected $parameterGetterGenerator;

    protected $parameterSetterGenerator;

    protected $propertyGenerator;

    protected $docBlockGenerator;

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
        $docBlockGenerator = $this->getDocblockGenerator();

        $docBlockGenerator->setShortDescription($operation->getSummary());
        $docBlockGenerator->setLongDescription(strip_tags($operation->getNotes()));

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

                    $paramTag = new CodeGenerator\DocBlock\Tag\ParamTag;
                    $paramTag->setDataType($swaggerParameter::getType($swaggerParameter->getDataType()));
                    $paramTag->setParamName($swaggerParameter->getName());

                    $paramDescription = $swaggerParameter->getDescription();

                    $paramTag->setDescription($paramDescription);
                    $docBlockGenerator->setTag($paramTag);

                    $routeParams[] = $parameter;
                    break;
                case self::PARAM_TYPE_QUERY:
                case self::PARAM_TYPE_FORM:
                    $propertyName = lcfirst($swaggerParameter->getName());

                    if (($postParamStart = strpos($propertyName, '[')) !== false) {
                        $propertyPostParams = substr($propertyName, $postParamStart);
                        $propertyName = substr($propertyName, 0, $postParamStart);

                        echo "{$method->getName()}::\${$propertyName} has: {$propertyPostParams}".PHP_EOL;
                    }

                    if ($parameterClassGenerator->hasProperty($propertyName)) {
                        continue;
                    }

                    $property = clone $propertyGenerator;
                    $property->setName($propertyName);

                    $propertyDocblock = new CodeGenerator\DocBlockGenerator;
                    $propertyDocblock->setShortDescription($swaggerParameter->getDescription());

                    $propertyDescription = '';
                    if ($allowableValues = $swaggerParameter->getAllowableValues()) {
                        if ($allowableValues->getValueType() == 'LIST') {
                            $propertyDescription .= 'Allowable values: ['.implode(', ', $allowableValues->getValues()).']'.PHP_EOL;
                        }
                    }

                    $propertyDocblock->setLongDescription($propertyDescription);

                    if (!$this->isDocBlockEmpty($propertyDocblock)) {
                        $property->setDocBlock($propertyDocblock);
                    }

                    $parameterClassGenerator->addPropertyFromGenerator($property);

                    $getterGenerator = $this->generateParameterGetter($propertyName, $swaggerParameter);
                    $setterGenerator = $this->generateParameterSetter($propertyName, $swaggerParameter);
                    $parameterClassGenerator->addMethods(array(
                        $getterGenerator,
                        $setterGenerator
                    ));
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

            $paramTag = new CodeGenerator\DocBlock\Tag\ParamTag;
            $paramTag->setDataType(RestGenerator::REQUEST_NAMESPACE_ALIAS.'\\'.$operation->getNickname());
            $paramTag->setParamName($operation->getNickname());
            if (!$hasRequired) {
                $paramTag->setDescription(' = null');
            }
            $docBlockGenerator->setTag($paramTag);

            $method->setParameter($queryParameter);
        } else {
            $queryParameter = null;
        }

        $method->setDocBlock($docBlockGenerator);

        $body = $this->getBody($routeParams, $queryParameter);
        $method->setBody($body);
    }

    public function generateParameterGetter($parameter, $swaggerParameter)
    {
        $methodName = 'get'.ucfirst($parameter);

        $getterGenerator = clone $this->getParameterGetterGenerator();
        $getterGenerator->setName($methodName);

        $getterGenerator->setBody("return \$this->{$parameter};");

        return $getterGenerator;
    }

    public function generateParameterSetter($parameterName, $swaggerParameter)
    {
        $methodName = 'set'.ucfirst($parameterName);

        $setterGenerator = clone $this->getParameterSetterGenerator();
        $setterGenerator->setName($methodName);

        $parameter = new CodeGenerator\ParameterGenerator;
        $parameter->setName($parameterName);
        $setterGenerator->setParameter($parameter);

        $setterGenerator->setBody("\$this->{$parameterName} = \${$parameterName};\nreturn \$this;");

        return $setterGenerator;
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

    public function getParameterGetterGenerator()
    {
        if (!$this->parameterGetterGenerator) {
            $this->parameterGetterGenerator = new CodeGenerator\MethodGenerator;
        }

        return $this->parameterGetterGenerator;
    }

    public function setParameterGetterGenerator($parameterGetterGenerator)
    {
        $this->parameterGetterGenerator = $parameterGetterGenerator;

        return $this;
    }

    public function getParameterSetterGenerator()
    {
        if (!$this->parameterSetterGenerator) {
            $this->parameterSetterGenerator = new CodeGenerator\MethodGenerator;
        }

        return $this->parameterSetterGenerator;
    }

    public function setParameterSetterGenerator($parameterSetterGenerator)
    {
        $this->parameterSetterGenerator = $parameterSetterGenerator;

        return $this;
    }

    public function getPropertyGenerator()
    {
        if (!$this->propertyGenerator) {
            $generator = new CodeGenerator\PropertyGenerator;
            $generator->setVisibility($generator::VISIBILITY_PROTECTED);

            $this->propertyGenerator = $generator;
        }

        return $this->propertyGenerator;
    }

    public function setPropertyGenerator(CodeGenerator\PropertyGenerator $propertyGenerator)
    {
        $this->propertyGenerator = $propertyGenerator;

        return $this;
    }

    public function getDocBlockGenerator()
    {
        if (!$this->docBlockGenerator) {
             $generator = new CodeGenerator\DocBlockGenerator;
             $apiTag = new CodeGenerator\DocBlock\Tag;
             $apiTag->setName('api');
             $generator->setTag($apiTag);
             $this->docBlockGenerator = $generator;
        }

        return $this->docBlockGenerator;
    }

    public function setDocBlockGenerator($docBlockGenerator)
    {
        $this->docBlockGenerator = $docBlockGenerator;

        return $this;
    }

    protected function isDocBlockEmpty(CodeGenerator\DocBlockGenerator $docblock)
    {
        if(
            !empty($docblock->getShortDescription())
            || !empty($docblock->getLongDescription())
            || !empty($docblock->getTags())
        ) return false;

        return true;
    }
}
