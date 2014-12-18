<?php

namespace CallFire\Api\Soap\Result;

class QueryDncListsResponse extends QueryResult
{

    /**
     * @var DncList[]
     */
    protected $dncLists = array();

    public function getDncLists()
    {
        return $this->resources;
    }

    public function setDncLists($dncLists)
    {
        $this->resources = $dncLists;

        return $this;
    }

    public function addDncList($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
