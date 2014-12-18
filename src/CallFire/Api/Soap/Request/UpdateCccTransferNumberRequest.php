<?php

namespace CallFire\Api\Soap\Request;

class UpdateCccTransferNumberRequest extends IdRequest
{

    /**
     * @var TransferNumber
     */
    protected $transferNumber = null;

    public function getTransferNumber()
    {
        return $this->transferNumber;
    }

    public function setTransferNumber($transferNumber)
    {
        $this->transferNumber = $transferNumber;

        return $this;
    }

}
