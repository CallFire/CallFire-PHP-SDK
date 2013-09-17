<?php
namespace CallFire\Api\Soap;

use CallFire\Common\Resource;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Filter;

abstract class AbstractRequest
{
    protected $hydrator;

    public static function ns()
    {
        $ns = explode('\\', __CLASS__);
        array_pop($ns);
        $ns = implode('\\', $ns);

        return "{$ns}\\Request";
    }

    public function marshall()
    {
        $hydrator = $this->getHydrator();
        $data = $hydrator->extract($this);

        $this->marshallData($data);

        return $data;
    }

    public function marshallData(&$data)
    {
        foreach ($data as $key => $value) {
            if (($newKey = ucfirst($key)) !== $key) {
                unset($data[$key]);
            }

            if ($value instanceof Resource\AbstractResource) {
                $valueHydrator = $value->getHydrator();
                $value = $valueHydrator->extract($value);
                $this->marshallData($value);
            }

            $data[$newKey] = $value;
        }
    }

    public function getHydrator()
    {
        if (!$this->hydrator) {
            $hydrator = new ClassMethods;
            $hydrator->setUnderscoreSeparatedKeys(false);
            $hydrator->addFilter('getHydrator', new Filter\MethodMatchFilter('getHydrator'), Filter\FilterComposite::CONDITION_AND);

            $this->hydrator = $hydrator;
        }

        return $this->hydrator;
    }

    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;

        return $this;
    }
}
