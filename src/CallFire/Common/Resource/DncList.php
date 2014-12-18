<?php

namespace CallFire\Common\Resource;

class DncList extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var long
     */
    protected $campaignId = null;

    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var int
     */
    protected $size = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCampaignId()
    {
        return $this->campaignId;
    }

    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

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

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

}
