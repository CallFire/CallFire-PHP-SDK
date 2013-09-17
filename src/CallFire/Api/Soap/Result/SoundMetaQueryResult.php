<?php

namespace CallFire\Api\Soap\Result;

class SoundMetaQueryResult extends QueryResult
{

    /**
     * @var SoundMeta[]
     */
    protected $soundMetas = array();

    public function getSoundMetas()
    {
        return $this->resources;
    }

    public function setSoundMetas($soundMetas)
    {
        $this->resources = $soundMetas;

        return $this;
    }

    public function addSoundMeta($value)
    {
        $this->resources[] = $value;

        return $this;
    }

}
