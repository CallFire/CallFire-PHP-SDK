<?php
namespace CallFire\Common\Resource;

class QuestionResponse extends AbstractResource {
	protected $question;
	protected $response;
	
	public function getQuestion() {
		return $this->question;
	}
	
	public function setQuestion($question) {
		$this->question = $question;
		return $this;
	}
	
	public function getResponse() {
		return $this->response;
	}
	
	public function setResponse($response) {
		$this->response = $response;
		return $this;
	}
}
