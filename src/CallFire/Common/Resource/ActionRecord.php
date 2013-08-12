<?php

namespace CallFire\Common\Resource;

abstract class ActionRecord extends AbstractResource
{

    /**
     * @var long
     */
    protected $id = null;

    /**
     * @var string
     */
    protected $result = null;

    /**
     * @var dateTime
     */
    protected $finishTime = null;

    /**
     * @var float
     */
    protected $billedAmount = null;

    /**
     * @var QuestionResponse[]
     */
    protected $questionResponses = array();

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    public function getFinishTime()
    {
        return $this->finishTime;
    }

    public function setFinishTime($finishTime)
    {
        $this->finishTime = $finishTime;

        return $this;
    }

    public function getBilledAmount()
    {
        return $this->billedAmount;
    }

    public function setBilledAmount($billedAmount)
    {
        $this->billedAmount = $billedAmount;

        return $this;
    }

    public function getQuestionResponses()
    {
        return $this->questionResponses;
    }

    public function setQuestionResponses($questionResponses)
    {
        $this->questionResponses = $questionResponses;

        return $this;
    }

}
