<?php

namespace CallFire\Common\Resource;

class Agent extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var boolean
     */
    protected $enabled = null;

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var string
     */
    protected $email = null;

    /**
     * @var dateTime
     */
    protected $lastLogin = null;

    /**
     * @var string
     */
    protected $campaignIds = null;

    /**
     * @var string
     */
    protected $groupIds = null;

    /**
     * @var long
     */
    protected $activeSessionId = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getCampaignIds()
    {
        return $this->campaignIds;
    }

    public function setCampaignIds($campaignIds)
    {
        $this->campaignIds = $campaignIds;

        return $this;
    }

    public function getGroupIds()
    {
        return $this->groupIds;
    }

    public function setGroupIds($groupIds)
    {
        $this->groupIds = $groupIds;

        return $this;
    }

    public function getActiveSessionId()
    {
        return $this->activeSessionId;
    }

    public function setActiveSessionId($activeSessionId)
    {
        $this->activeSessionId = $activeSessionId;

        return $this;
    }

}
