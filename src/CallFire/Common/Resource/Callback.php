<?php

namespace CallFire\Common\Resource;

class Callback extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var long
     */
    protected $userId = null;

    /**
     * @var long
     */
    protected $outboundCallId = null;

    /**
     * @var boolean
     */
    protected $notificationSent = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function getOutboundCallId()
    {
        return $this->outboundCallId;
    }

    public function setOutboundCallId($outboundCallId)
    {
        $this->outboundCallId = $outboundCallId;

        return $this;
    }

    public function getNotificationSent()
    {
        return $this->notificationSent;
    }

    public function setNotificationSent($notificationSent)
    {
        $this->notificationSent = $notificationSent;

        return $this;
    }

}
