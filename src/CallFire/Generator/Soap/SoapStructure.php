<?php
namespace CallFire\Generator\Soap;

use CallFire\Generator\Soap;

use Zend\Code\Generator as CodeGenerator;

class SoapStructure
{
    protected $classGenerator;

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

        foreach ($lines as $property) {
            $property = trim($property, " \t\n\r\0\x0B;");
            list($propertyType, $propertyName) = explode(" ", $property);
            $propertyGenerator = $this->generateProperty($propertyType, $propertyName);
            $this->addProperty($propertyGenerator);
        }

        $classGenerator = $this->getClassGenerator();
        $classGenerator->setName($structName);
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

    protected function generateProperty($type, $name)
    {
        $property = new CodeGenerator\PropertyGenerator;
        $property->setName($name);

        return $property;
    }
}
