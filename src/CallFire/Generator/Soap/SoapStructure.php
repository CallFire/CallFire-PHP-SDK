<?php
namespace CallFire\Generator\Soap;

use CallFire\Generator\Soap;

use Zend\Code\Generator as CodeGenerator;

class SoapStructure
{
    protected $classGenerator;

    protected $propertyGetterGenerator;

    protected $propertySetterGenerator;

    protected $isStructure = false;

    protected $properties = array();

    public function generateFromDescription($description)
    {
        if (substr($description, 0, 6) !== "struct") {
            $this->isStructure = false;

            return;
        }
        $this->isStructure = true;

        $lines = explode(PHP_EOL, $description);
        list(,$structName) = explode(" ", array_shift($lines));
        array_pop($lines); // Closing brace

        $classGenerator = $this->getClassGenerator();
        $classGenerator->setName($structName);

        foreach ($lines as $property) {
            $property = trim($property, " \t\n\r\0\x0B;");
            list($propertyType, $propertyName) = explode(" ", $property);
            $propertyGenerator = $this->generateProperty($propertyType, $propertyName);
            $this->addProperty($propertyGenerator);

            $classGenerator->addMethodFromGenerator($this->generatePropertyGetter($propertyName));
            $classGenerator->addMethodFromGenerator($this->generatePropertySetter($propertyName));
        }

        $classGenerator->addProperties($this->getProperties());
    }

    public function isStructure()
    {
        return $this->isStructure;
    }

    public function getClassGenerator()
    {
        if (!$this->classGenerator) {
            $this->classGenerator = new CodeGenerator\ClassGenerator;
        }

        return $this->classGenerator;
    }

    public function setClassGenerator($classGenerator)
    {
        $this->classGenerator = $classGenerator;

        return $this;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function setProperties($properties)
    {
        $this->properties = $properties;

        return $this;
    }

    public function addProperty(CodeGenerator\PropertyGenerator $property)
    {
        $this->properties[] = $property;
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

    public function generatePropertyGetter($property)
    {
        $property = lcfirst($property);
        $methodName = 'get'.ucfirst($property);

        $getterGenerator = clone $this->getPropertyGetterGenerator();
        $getterGenerator->setName($methodName);

        $getterGenerator->setBody("return \$this->{$property};");

        return $getterGenerator;
    }

    public function generatePropertySetter($property)
    {
        $property = lcfirst($property);
        $methodName = 'set'.ucfirst($property);

        $setterGenerator = clone $this->getPropertySetterGenerator();
        $setterGenerator->setName($methodName);

        $parameter = new CodeGenerator\ParameterGenerator;
        $parameter->setName($property);
        $setterGenerator->setParameter($parameter);

        $setterGenerator->setBody("\$this->{$property} = \${$property};\nreturn \$this;");

        return $setterGenerator;
    }

    protected function generateProperty($type, $name)
    {
        $property = new CodeGenerator\PropertyGenerator;
        $property->setName(lcfirst($name));
        $property->setVisibility($property::VISIBILITY_PROTECTED);

        return $property;
    }
}
