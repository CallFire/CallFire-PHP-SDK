<?php

namespace CallFire\Api\Soap\Request;

class UpdateCccScriptQuestionLabelRequest extends IdCampaignIdRequest
{

    /**
     * @var string
     */
    protected $label = null;

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

}
