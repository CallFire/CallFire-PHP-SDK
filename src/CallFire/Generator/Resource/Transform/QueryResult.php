<?php
namespace CallFire\Generator\Resource\Transform;

class QueryResult extends AbstractTransform
{
    public function transform()
    {
        $generator = $this->getClassGenerator();
        $generator->setExtendedClass('Response\ResourceList')
            ->addUse('CallFire\Api\Soap\Response');
    }

    public function transformDescendent()
    {
        $generator = $this->getClassGenerator();

        $properties = $generator->getProperties();
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            if ($defaultValue = $property->getDefaultValue()) {
                if ($defaultValue->getValue() === array()) {
                    $oldGetterName = $this->generatePropertyGetterName($propertyName);
                    $oldSetterName = $this->generatePropertySetterName($propertyName);
                    list($oldAdderParameterName, $oldAdderName) = $this->generatePropertyAdderName($propertyName);

                    $generator->removeMethod($oldGetterName);
                    $generator->removeMethod($oldSetterName);
                    $generator->removeMethod($oldAdderName);

                    $getter = $this->generatePropertyGetter("resources", $propertyName);
                    $setter = $this->generatePropertySetter("resources", $propertyName);
                    $adder = $this->generatePropertyAdder("resources", false, $propertyName);

                    $generator->addMethods(array(
                        $getter,
                        $setter,
                        $adder
                    ));
                    break;
                }
            }
        }
    }
}
