<?php

namespace CallFire\Api\Soap\Request;

class UpdateCccScriptContentRequest extends CampaignIdRequest
{

    /**
     * @var string
     */
    protected $content = null;

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

}
