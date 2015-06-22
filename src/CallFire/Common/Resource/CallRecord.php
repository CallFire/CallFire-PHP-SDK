<?php

namespace CallFire\Common\Resource;

class CallRecord extends ActionRecord
{

    /**
     * @var dateTime
     */
    protected $originateTime = null;

    /**
     * @var dateTime
     */
    protected $answerTime = null;

    /**
     * @var int
     */
    protected $duration = null;

    /**
     * @var RecordingMeta[]
     */
    protected $recordingMetas = array();

    /**
     * @var Note[]
     */
    protected $notes = array();

    public function getOriginateTime()
    {
        return $this->originateTime;
    }

    public function setOriginateTime($originateTime)
    {
        $this->originateTime = $originateTime;

        return $this;
    }

    public function getAnswerTime()
    {
        return $this->answerTime;
    }

    public function setAnswerTime($answerTime)
    {
        $this->answerTime = $answerTime;

        return $this;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    public function getRecordingMetas()
    {
        return $this->recordingMetas;
    }

    public function setRecordingMetas($recordingMetas)
    {
        $this->recordingMetas = $recordingMetas;

        return $this;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

}
