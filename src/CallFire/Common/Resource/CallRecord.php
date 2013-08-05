<?php
namespace CallFire\Common\Resource;

class CallRecord extends AbstractResource {
	protected $result;
	protected $finishTime;
	protected $billedAmount;
	protected $questionResponses;
	protected $answerTime;
	protected $duration;
	
	public function getResult() {
		return $this->result;
	}

	public function setResult($result) {
		$this->result = $result;
		return $this;
	}

	public function getFinishTime() {
		return $this->finishTime;
	}

	public function setFinishTime($finishTime) {
		$this->finishTime = $finishTime;
		return $this;
	}

	public function getBilledAmount() {
		return $this->billedAmount;
	}

	public function setBilledAmount($billedAmount) {
		$this->billedAmount = $billedAmount;
		return $this;
	}
	
	public function getQuestionResponse($question) {
		foreach($this->getQuestionResponses() as $questionResponse) {
			if($questionResponse->getQuestion() == $question)
				return $questionResponse->getResponse();
		}
		
		return null;
	}

	public function getQuestionResponses() {
		return $this->questionResponses?:array();
	}

	public function setQuestionResponses($questionResponses) {
		$this->questionResponses = $questionResponses;
		return $this;
	}

	public function getAnswerTime() {
		return $this->answerTime;
	}

	public function setAnswerTime($answerTime) {
		$this->answerTime = $answerTime;
		return $this;
	}

	public function getDuration() {
		return $this->duration;
	}

	public function setDuration($duration) {
		$this->duration = $duration;
		return $this;
	}
}
