<?php
namespace CallFire\Api\Rest;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Filter;

abstract class Request
{
    protected $hydrator;

    public static function ns()
    {
        return __CLASS__;
    }

    public function getQuery()
    {
        $hydrator = $this->getHydrator();
        $data = $hydrator->extract($this);
        $remap = array();
        foreach ($data as $key => $value) {
            if (is_null($value)) {
                continue;
            }
            $remap[ucfirst($key)] = $value;
        }

        return $remap;
    }

    public function getHydrator()
    {
        if (!$this->hydrator) {
            $hydrator = new ClassMethods;
            $hydrator->setUnderscoreSeparatedKeys(false);
            $hydrator->addFilter('getQuery', new Filter\MethodMatchFilter('getQuery'), Filter\FilterComposite::CONDITION_AND);
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
