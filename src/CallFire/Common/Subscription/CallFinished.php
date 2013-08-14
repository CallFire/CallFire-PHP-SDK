<?php
namespace CallFire\Common\Subscription;

use CallFire\Common\Subscription as AbstractSubscription;
use CallFire\Common\Resource;

class CallFinished extends AbstractSubscription
{
    protected $call;

    public static function fromXml($document)
    {
        $callNotification = new self;
        $callNotification->loadXml($document);

        return $callNotification;
    }

    public function getResource()
    {
        return $this->getCall();
    }

    public function setResource($resource)
    {
        return $this->setCall($resource);
    }

    public function getCall()
    {
        return $this->call;
    }

    public function setCall(Resource\Call $call)
    {
        $this->call = $call;

        return $this;
    }
}
