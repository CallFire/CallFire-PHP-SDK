<?php
namespace CallFire\Api\Soap\Response;

use CallFire\Api\Soap\AbstractResult as AbstractResponse;
use CallFire\Common\Response\ResourceExceptionInterface;

class ResourceException extends AbstractResponse implements ResourceExceptionInterface
{
    protected $message;

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
