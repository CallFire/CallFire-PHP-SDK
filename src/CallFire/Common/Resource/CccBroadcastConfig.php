<?php

namespace CallFire\Common\Resource;

class CccBroadcastConfig extends BroadcastConfig
{

    /**
     * @var long
     */
    protected $agentGroupId = null;

    /**
     * @var long
     */
    protected $smartDropSoundId = null;

    /**
     * @var long
     */
    protected $scriptId = null;

    /**
     * @var string
     */
    protected $transferNumberIdList = null;

    /**
     * @var boolean
     */
    protected $allowAnyTransfer = null;

    /**
     * @var boolean
     */
    protected $recorded = null;

    public function getAgentGroupId()
    {
        return $this->agentGroupId;
    }

    public function setAgentGroupId($agentGroupId)
    {
        $this->agentGroupId = $agentGroupId;

        return $this;
    }

    public function getSmartDropSoundId()
    {
        return $this->smartDropSoundId;
    }

    public function setSmartDropSoundId($smartDropSoundId)
    {
        $this->smartDropSoundId = $smartDropSoundId;

        return $this;
    }

    public function getScriptId()
    {
        return $this->scriptId;
    }

    public function setScriptId($scriptId)
    {
        $this->scriptId = $scriptId;

        return $this;
    }

    public function getTransferNumberIdList()
    {
        return $this->transferNumberIdList;
    }

    public function setTransferNumberIdList($transferNumberIdList)
    {
        $this->transferNumberIdList = $transferNumberIdList;

        return $this;
    }

    public function getAllowAnyTransfer()
    {
        return $this->allowAnyTransfer;
    }

    public function setAllowAnyTransfer($allowAnyTransfer)
    {
        $this->allowAnyTransfer = $allowAnyTransfer;

        return $this;
    }

    public function getRecorded()
    {
        return $this->recorded;
    }

    public function setRecorded($recorded)
    {
        $this->recorded = $recorded;

        return $this;
    }

}
