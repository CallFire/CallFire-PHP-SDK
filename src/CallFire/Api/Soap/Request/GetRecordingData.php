<?php

namespace CallFire\Api\Soap\Request;

use CallFire\Api\Soap\AbstractRequest as AbstractRequest;

class GetRecordingData extends AbstractRequest
{

    /**
     * @var string
     */
    protected $format = null;

    /**
     * @var long
     */
    protected $recordingId = null;

    public function getFormat()
    {
        return $this->format;
    }

    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    public function getRecordingId()
    {
        return $this->recordingId;
    }

    public function setRecordingId($recordingId)
    {
        $this->recordingId = $recordingId;

        return $this;
    }

}
