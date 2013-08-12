<?php

namespace CallFire\Common\Resource;

class QuestionResponse extends AbstractResource
{

    /**
     * @var string
     */
    protected $question = null;

    /**
     * @var string
     */
    protected $response = null;

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

}
