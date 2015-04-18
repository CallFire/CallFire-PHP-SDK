<?php

namespace CallFire\Api\Soap\Result;

use CallFire\Api\Soap\AbstractResult as AbstractResponse;

class VerifyCallerIdResponse extends AbstractResponse
{

    /**
     * @var boolean
     */
    protected $verified = null;

    public function getVerified()
    {
        return $this->verified;
    }

    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

}
