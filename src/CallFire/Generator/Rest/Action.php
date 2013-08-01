<?php
namespace CallFire\Generator\Rest;

use CallFire\Generator\Rest\Swagger\Api as SwaggerApi;
use CallFire\Generator\Rest\Swagger\Operation as SwaggerOperation;

use Zend\Code\Generator as CodeGenerator;

abstract class Action {
    const PARAM_TYPE_QUERY = "query";
    const PARAM_TYPE_PATH = "path";

    protected $api;
    
    protected $operation;

    protected $methodGenerator;
    
    protected $parameterClassGenerator;
    
    protected $parameterGenerator;
    
    protected $propertyGenerator;
    
    public function generate() {
        $method = $this->getMethodGenerator();
        $api = $this->getApi();
        $operation = $this->getOperation();
        
        $method->setName($operation->getNickname());
        
        $parameterClassGenerator = $this->getParameterClassGenerator();
        $parameterGenerator = $this->getParameterGenerator();
        $propertyGenerator = $this->getPropertyGenerator();
        foreach($operation->getParameters() as $swaggerParameter) {
            switch($swaggerParameter->getParamType()) {
                case self::PARAM_TYPE_PATH:
                    $parameter = clone $parameterGenerator;
                    $parameter->setName($swaggerParameter->getName());
                    $method->setParameter($parameter);
                    break;
                case self::PARAM_TYPE_QUERY:
                    $property = clone $propertyGenerator;
                    $property->setName($swaggerParameter->getName());
                    $parameterClassGenerator->addPropertyFromGenerator($property);
                    break;
            }
        }
    }
    
    public function getApi() {
        return $this->api;
    }
    
    public function setApi(SwaggerApi $api) {
        $this->api = $api;
        return $this;
    }
    
    public function getOperation() {
        return $this->operation;
    }
    
    public function setOperation(SwaggerOperation $operation) {
        $this->operation = $operation;
        return $this;
    }
    
    public function getMethodGenerator() {
        if(!$this->methodGenerator) {
            $this->methodGenerator = new CodeGenerator\MethodGenerator;
        }
    
        return $this->methodGenerator;
    }
    
    public function setMethodGenerator(CodeGenerator\MethodGenerator $methodGenerator) {
        $this->methodGenerator = $methodGenerator;
        return $this;
    }
    
    public function getParameterClassGenerator() {
        if(!$this->parameterClassGenerator) {
            $this->parameterClassGenerator = new CodeGenerator\ClassGenerator;
        }
        return $this->parameterClassGenerator;
    }
    
    public function setParameterClassGenerator($parameterClassGenerator) {
        $this->parameterClassGenerator = $parameterClassGenerator;
        return $this;
    }
    
    public function getParameterGenerator() {
        if(!$this->parameterGenerator) {
            $this->parameterGenerator = new CodeGenerator\ParameterGenerator;
        }
        return $this->parameterGenerator;
    }
    
    public function setParameterGenerator(CodeGenerator\ParameterGenerator $parameterGenerator) {
        $this->parameterGenerator = $parameterGenerator;
        return $this;
    }
    
    public function getPropertyGenerator() {
        if(!$this->propertyGenerator) {
            $this->propertyGenerator = new CodeGenerator\PropertyGenerator;
        }
        return $this->propertyGenerator;
    }
    
    public function setPropertyGenerator(CodeGenerator\PropertyGenerator $propertyGenerator) {
        $this->propertyGenerator = $propertyGenerator;
        return $this;
    }
}
