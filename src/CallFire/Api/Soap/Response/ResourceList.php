<?php
namespace CallFire\Api\Soap\Response;

use CallFire\Api\Soap\AbstractResult as AbstractResponse;
use CallFire\Common\Resource\AbstractResource;
use CallFire\Common\Response\ResourceListInterface;

use Zend\Stdlib\Hydrator\Filter;

use ArrayIterator;

class ResourceList extends AbstractResponse implements ResourceListInterface
{
    protected $totalResults = 0;

    protected $resources = array();

    public function getIterator()
    {
        return new ArrayIterator($this->getResources());
    }

    public function getTotalResults()
    {
        return $this->totalResults;
    }

    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;

        return $this;
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
    }

    public function addResource(AbstractResource $resource)
    {
        $this->resources[] = $resource;

        return $this;
    }

    public function getHydrator()
    {
        $hydrator = parent::getHydrator();
        $hydrator->addFilter('getIterator', new Filter\MethodMatchFilter('getIterator'), Filter\FilterComposite::CONDITION_AND);
        $hydrator->addFilter('getResources', new Filter\MethodMatchFilter('getResources'), Filter\FilterComposite::CONDITION_AND);

        return $hydrator;
    }
}
