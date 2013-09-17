<?php

namespace CallFire\Api\Soap\Request;

class QueryContacts extends Query
{

    /**
     * @var string
     */
    protected $field = null;

    /**
     * @var long
     */
    protected $contactListId = null;

    /**
     * @var string
     */
    protected $string = null;

    public function getField()
    {
        return $this->field;
    }

    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    public function getContactListId()
    {
        return $this->contactListId;
    }

    public function setContactListId($contactListId)
    {
        $this->contactListId = $contactListId;

        return $this;
    }

    public function getString()
    {
        return $this->string;
    }

    public function setString($string)
    {
        $this->string = $string;

        return $this;
    }

}
