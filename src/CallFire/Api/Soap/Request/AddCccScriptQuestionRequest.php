<?php

namespace CallFire\Api\Soap\Request;

class AddCccScriptQuestionRequest extends CampaignIdRequest
{

    /**
     * @var CccQuestion
     */
    protected $cccQuestion = null;

    public function getCccQuestion()
    {
        return $this->cccQuestion;
    }

    public function setCccQuestion($cccQuestion)
    {
        $this->cccQuestion = $cccQuestion;

        return $this;
    }

}
