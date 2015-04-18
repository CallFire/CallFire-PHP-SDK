<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class CccCampaignRequest extends AbstractRequest
{

    /**
     * @var anyURI
     */
    protected $requestId = null;

    /**
     * @var CccCampaign
     */
    protected $cccCampaign = null;

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getCccCampaign()
    {
        return $this->cccCampaign;
    }

    public function setCccCampaign($cccCampaign)
    {
        $this->cccCampaign = $cccCampaign;

        return $this;
    }

}
