<?php
namespace CallFire\Generator\Resource\Transform;

use Zend\Code\Generator as CodeGenerator;

class Contact extends AbstractTransform
{
    public static $mainProperty = 'id';

    public static $secondaryProperties = array(
        'firstName' => 'firstName',
        'lastName' => 'lastName',
        'zipcode' => 'zipcode',
        'homePhone' => 'homePhone',
        'workPhone' => 'workPhone',
        'mobilePhone' => 'mobilePhone'
    );

    public function transform()
    {
        $this->addAnyAttribute();
        $this->addToString();
    }

    public function addAnyAttribute()
    {
        $classGenerator = $this->getClassGenerator();

        $propertyName = 'attributes';

        $propertyGenerator = clone $this->getPropertyGenerator();
        $propertyGenerator->setName($propertyName);
        $propertyGenerator->setVisibility($propertyGenerator::VISIBILITY_PROTECTED);
        $propertyGenerator->setDefaultValue(new CodeGenerator\PropertyValueGenerator(array()));
        $classGenerator->addPropertyFromGenerator($propertyGenerator);

        $getterGenerator = $this->generatePropertyGetter($propertyName);
        $classGenerator->addMethodFromGenerator($getterGenerator);

        $setterGenerator = $this->generatePropertySetter($propertyName);
        $classGenerator->addMethodFromGenerator($setterGenerator);

        $adderGenerator = $this->generatePropertyAdder($propertyName);
        $classGenerator->addMethodFromGenerator($adderGenerator);
    }

    public function addToString()
    {
        $classGenerator = $this->getClassGenerator();

        $methodGenerator = new CodeGenerator\MethodGenerator;
        $methodGenerator->setName('__toString');

        $idAttribute = 'id';

        $body = <<<METHODBODY
\$attributes = array(\$this->{$idAttribute});

METHODBODY;

        foreach (static::$secondaryProperties as $attributeName => $propertyName) {
            $body .= <<<METHODBODY
if (!empty(\$this->{$propertyName})) {
    \$attributes[] = "{$attributeName}={\$this->{$propertyName}}";
}

METHODBODY;
        }

        $body .= <<<METHODBODY
foreach (\$this->attributes as \$attributeName => \$value) {
    if (!empty(\$value)) {
        \$attributes[] = "{\$attributeName}={\$value}";
    }
}
return implode('!', \$attributes);
METHODBODY;

        $methodGenerator->setBody($body);

        $classGenerator->addMethodFromGenerator($methodGenerator);
    }
}
