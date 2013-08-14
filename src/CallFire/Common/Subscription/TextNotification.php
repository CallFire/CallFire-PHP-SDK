<?php
namespace CallFire\Common\Subscription;

use CallFire\Common\Subscription as AbstractSubscription;
use CallFire\Common\Resource;

class TextNotification extends AbstractSubscription
{
    protected $text;

    public static function fromXml($document)
    {
        $textNotification = new self;
        $textNotification->loadXml($document);

        return $textNotification;
    }

    public function getResource()
    {
        return $this->getText();
    }

    public function setResource($resource)
    {
        return $this->setText($resource);
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText(Resource\Text $text)
    {
        $this->text = $text;

        return $this;
    }
}
