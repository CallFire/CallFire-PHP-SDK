<?php

namespace CallFire\Common\Resource;

class BroadcastStats extends AbstractResource
{

    /**
     * @var UsageStats
     */
    protected $usageStats = null;

    /**
     * @var ResultStat[]
     */
    protected $resultStats = array();

    public function getUsageStats()
    {
        return $this->usageStats;
    }

    public function setUsageStats($usageStats)
    {
        $this->usageStats = $usageStats;

        return $this;
    }

    public function getResultStats()
    {
        return $this->resultStats;
    }

    public function setResultStats($resultStats)
    {
        $this->resultStats = $resultStats;

        return $this;
    }

}
