<?php

namespace CallFire\Common\Resource;

class Contact extends AbstractResource
{

    /**
     * @var long
     */
    public $id = null;

    /**
     * @var string
     */
    public $firstName = null;

    /**
     * @var string
     */
    public $lastName = null;

    /**
     * @var string
     */
    public $zipcode = null;

    /**
     * @var string
     */
    public $homePhone = null;

    /**
     * @var string
     */
    public $workPhone = null;

    /**
     * @var string
     */
    public $mobilePhone = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getHomePhone()
    {
        return $this->homePhone;
    }

    public function setHomePhone($homePhone)
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    public function getWorkPhone()
    {
        return $this->workPhone;
    }

    public function setWorkPhone($workPhone)
    {
        $this->workPhone = $workPhone;

        return $this;
    }

    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

}
