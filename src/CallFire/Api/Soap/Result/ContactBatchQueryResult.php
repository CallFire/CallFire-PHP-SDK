<?php

namespace CallFire\Api\Soap\Result;

class ContactBatchQueryResult extends QueryResult
{

    /**
     * @var ContactBatch[]
     */
    protected $contactBatchs = array();

    public function getContactBatchs()
    {
        return $this->resources;
    }

    public function setContactBatchs($contactBatchs)
    {
        $this->resources = $contactBatchs;

        return $this;
    }

    public function addContactBatch($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
