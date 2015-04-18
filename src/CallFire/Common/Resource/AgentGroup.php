<?php

namespace CallFire\Common\Resource;

class AgentGroup extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var string
     */
    protected $campaignIds = null;

    /**
     * @var string
     */
    protected $agentIds = null;

    /**
     * @var string
     */
    protected $agentEmails = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

    public function getCampaignIds()
    {
        return $this->campaignIds;
    }

    public function setCampaignIds($campaignIds)
    {
        $this->campaignIds = $campaignIds;

        return $this;
    }

    public function getAgentIds()
    {
        return $this->agentIds;
    }

    public function setAgentIds($agentIds)
    {
        $this->agentIds = $agentIds;

        return $this;
    }

    public function getAgentEmails()
    {
        return $this->agentEmails;
    }

    public function setAgentEmails($agentEmails)
    {
        $this->agentEmails = $agentEmails;

        return $this;
    }

}
