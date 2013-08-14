<?php
namespace CallFire\Generator\Rest\Swagger;

use Zend\Stdlib\Hydrator;

class Parameter
{
    /**
     * Maps swagger types to PHP types. All
     * types default to string if not found.
     *
     * @static
     * @var array
     */
    protected static $typeMap = array();

    protected $paramType;

    protected $name;

    protected $description;

    protected $dataType;

    protected $required = false;

    protected $allowableValues;

    protected $conditions = array();

    protected $hydrator;

    public static function getTypeMap()
    {
        if (!self::$typeMap) {
            self::$typeMap = include(__DIR__.'/typemap.php');
        }

        return self::$typeMap;
    }

    public static function setTypeMap($typeMap)
    {
        self::$typeMap = $typeMap;

        return $this;
    }

    public static function getType($type)
    {
        $map = self::getTypeMap();
        if (isset($map[$type])) {
            return $map[$type];
        }

        return "string";
    }

    public function getParamType()
    {
        return $this->paramType;
    }

    public function setParamType($paramType)
    {
        $this->paramType = $paramType;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDataType()
    {
        return $this->dataType;
    }

    public function setDataType($dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }

    public function getRequired()
    {
        return $this->required;
    }

    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    public function getAllowableValues()
    {
        return $this->allowableValues;
    }

    public function setAllowableValues(AllowableValues $allowableValues)
    {
        $this->allowableValues = $allowableValues;

        return $this;
    }

    public function getConditions()
    {
        return $this->conditions;
    }

    public function setConditions($conditions)
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function addCondition(Condition $condition)
    {
        $this->conditions[] = $condition;

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

    public function hydrate($data, Hydrator\HydratorInterface $allowableValuesHydrator = null, Hydrator\HydratorInterface $conditionHydrator = null)
    {
        if (isset($data['allowableValues']) && ($allowableValuesData = $data['allowableValues'])) {
            unset($data['allowableValues']);

            $allowableValues = new AllowableValues;
            if ($allowableValuesHydrator) {
                $allowableValues->setHydrator($allowableValuesHydrator);
            }

            $allowableValues->hydrate($allowableValuesData);

            $this->setAllowableValues($allowableValues);
        }

        if (isset($data['conditions']) && ($conditions = $data['conditions'])) {
            unset($data['conditions']);

            $conditionProto = new Condition;
            if ($conditionHydrator) {
                $conditionProto->setHydrator($conditionHydrator);
            }

            foreach ($conditions as $conditionData) {
                $condition = clone $conditionProto;
                $condition->hydrate($conditionData);
                $this->addCondition($condition);
            }
        }

        $hydrator = $this->getHydrator();
        $hydrator->hydrate($data, $this);

        return $this;
    }
}
