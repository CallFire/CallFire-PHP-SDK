<?php
namespace CallFire\Generator\Rest\Swagger;

use Zend\Stdlib\Hydrator;

class AllowableValues
{
    protected $valueType;

    protected $values = array();

    protected $hydrator;

    public function getValueType()
    {
        return $this->valueType;
    }

    public function setValueType($valueType)
    {
        $this->valueType = $valueType;

        return $this;
    }

    public function getValues()
    {
        return $this->values;
    }

    public function setValues($values)
    {
        $this->values = $values;

        return $this;
    }

    public function addValue($value)
    {
        $this->values[] = $value;

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

    public function hydrate($data)
    {
        $hydrator = $this->getHydrator();
        $hydrator->hydrate($data, $this);

        return $this;
    }
}
