<?php

namespace CallFire\Common\Resource;

class Broadcast extends AbstractResource
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
    protected $status = null;

    /**
     * @var dateTime
     */
    protected $lastModified = null;

    /**
     * @var string
     */
    protected $type = null;

    /**
     * @var VoiceBroadcastConfig
     */
    protected $voiceBroadcastConfig = null;

    /**
     * @var TextBroadcastConfig
     */
    protected $textBroadcastConfig = null;

    /**
     * @var IvrBroadcastConfig
     */
    protected $ivrBroadcastConfig = null;

    /**
     * @var CccBroadcastConfig
     */
    protected $cccBroadcastConfig = null;

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

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getLastModified()
    {
        return $this->lastModified;
    }

    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getVoiceBroadcastConfig()
    {
        return $this->voiceBroadcastConfig;
    }

    public function setVoiceBroadcastConfig(VoiceBroadcastConfig $voiceBroadcastConfig)
    {
        $this->voiceBroadcastConfig = $voiceBroadcastConfig;

        return $this;
    }

    public function getTextBroadcastConfig()
    {
        return $this->textBroadcastConfig;
    }

    public function setTextBroadcastConfig(TextBroadcastConfig $textBroadcastConfig)
    {
        $this->textBroadcastConfig = $textBroadcastConfig;

        return $this;
    }

    public function getIvrBroadcastConfig()
    {
        return $this->ivrBroadcastConfig;
    }

    public function setIvrBroadcastConfig(IvrBroadcastConfig $ivrBroadcastConfig)
    {
        $this->ivrBroadcastConfig = $ivrBroadcastConfig;

        return $this;
    }

    public function getCccBroadcastConfig()
    {
        return $this->cccBroadcastConfig;
    }

    public function setCccBroadcastConfig(CccBroadcastConfig $cccBroadcastConfig)
    {
        $this->cccBroadcastConfig = $cccBroadcastConfig;

        return $this;
    }

}
