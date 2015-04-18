<?php

namespace CallFire\Common\Resource;

class Contact extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $firstName = null;

    /**
     * @var string
     */
    protected $lastName = null;

    /**
     * @var string
     */
    protected $zipcode = null;

    /**
     * @var string
     */
    protected $homePhone = null;

    /**
     * @var string
     */
    protected $workPhone = null;

    /**
     * @var string
     */
    protected $mobilePhone = null;

    /**
     * @var string
     */
    protected $externalId = null;

    /**
     * @var string
     */
    protected $externalSystem = null;

    protected $attributes = array();

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

    public function getExternalId()
    {
        return $this->externalId;
    }

    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getExternalSystem()
    {
        return $this->externalSystem;
    }

    public function setExternalSystem($externalSystem)
    {
        $this->externalSystem = $externalSystem;

        return $this;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function addAttribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;

        return $this;
    }

    public function __toString()
    {
        $attributes = array($this->id);
        if (!empty($this->firstName)) {
            $attributes[] = "firstName={$this->firstName}";
        }
        if (!empty($this->lastName)) {
            $attributes[] = "lastName={$this->lastName}";
        }
        if (!empty($this->zipcode)) {
            $attributes[] = "zipcode={$this->zipcode}";
        }
        if (!empty($this->homePhone)) {
            $attributes[] = "homePhone={$this->homePhone}";
        }
        if (!empty($this->workPhone)) {
            $attributes[] = "workPhone={$this->workPhone}";
        }
        if (!empty($this->mobilePhone)) {
            $attributes[] = "mobilePhone={$this->mobilePhone}";
        }
        foreach ($this->attributes as $attributeName => $value) {
            if (!empty($value)) {
                $attributes[] = "{$attributeName}={$value}";
            }
        }

        return implode('!', $attributes);
    }

}
