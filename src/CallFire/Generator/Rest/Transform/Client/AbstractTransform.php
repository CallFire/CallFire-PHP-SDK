<?php
namespace CallFire\Generator\Rest\Transform\Client;

use CallFire\Generator\Rest\Service;

use Zend\Code\Generator as CodeGenerator;

abstract class AbstractTransform
{
    protected $service;

    protected $propertyGenerator;

    protected $propertyGetterGenerator;

    protected $propertySetterGenerator;

    protected $propertyAdderGenerator;

    public function __construct(Service $service)
    {
        $this->setService($service);
    }

    abstract public function transform();

    public function generatePropertyGetter($propertyName)
    {
        $methodName = 'get'.ucfirst($propertyName);

        $getterGenerator = clone $this->getPropertyGetterGenerator();
        $getterGenerator->setName($methodName);

        $getterGenerator->setBody("return \$this->{$propertyName};");

        return $getterGenerator;
    }

    public function generatePropertySetter($propertyName)
    {
        $methodName = 'set'.ucfirst($propertyName);

        $setterGenerator = clone $this->getPropertySetterGenerator();
        $setterGenerator->setName($methodName);

        $parameter = new CodeGenerator\ParameterGenerator;
        $parameter->setName($propertyName);
        $setterGenerator->setParameter($parameter);

        $setterGenerator->setBody("\$this->{$propertyName} = \${$propertyName};\nreturn \$this;");

        return $setterGenerator;
    }

    public function generatePropertyAdder($propertyName)
    {
        $parameterName = rtrim($propertyName, 's');

        $methodName = 'add'.ucfirst($parameterName);

        $setterGenerator = clone $this->getPropertySetterGenerator();
        $setterGenerator->setName($methodName);

        $parameter = new CodeGenerator\ParameterGenerator;
        $parameter->setName($parameterName);
        $setterGenerator->setParameter($parameter);

        $valueParameter = new CodeGenerator\ParameterGenerator;
        $valueParameter->setName('value');
        $setterGenerator->setParameter($valueParameter);

        $setterGenerator->setBody("\$this->{$propertyName}[\${$parameterName}] = \$value;\nreturn \$this;");

        return $setterGenerator;
    }

    public function getClassGenerator()
    {
        return $this->classGenerator;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setService(Service $service)
    {
        $this->service = $service;

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

    public function setPropertyGenerator($propertyGenerator)
    {
        $this->propertyGenerator = $propertyGenerator;

        return $this;
    }

    public function getPropertyGetterGenerator()
    {
        if (!$this->propertyGetterGenerator) {
            $this->propertyGetterGenerator = new CodeGenerator\MethodGenerator;
        }

        return $this->propertyGetterGenerator;
    }

    public function setPropertyGetterGenerator($propertyGetterGenerator)
    {
        $this->propertyGetterGenerator = $propertyGetterGenerator;

        return $this;
    }

    public function getPropertySetterGenerator()
    {
        if (!$this->propertySetterGenerator) {
            $this->propertySetterGenerator = new CodeGenerator\MethodGenerator;
        }

        return $this->propertySetterGenerator;
    }

    public function setPropertySetterGenerator($propertySetterGenerator)
    {
        $this->propertySetterGenerator = $propertySetterGenerator;

        return $this;
    }

    public function getPropertyAdderGenerator()
    {
        if (!$this->propertyAdderGenerator) {
            $this->propertyAdderGenerator = new CodeGenerator\MethodGenerator;
        }

        return $this->propertyAdderGenerator;
    }

    public function setPropertyAdderGenerator($propertyAdderGenerator)
    {
        $this->propertyAdderGenerator = $propertyAdderGenerator;

        return $this;
    }
}
