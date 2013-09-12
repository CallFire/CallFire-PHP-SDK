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

    /**
     * @var ActionStatistics
     */
    protected $actionStatistics = null;

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

    public function getActionStatistics()
    {
        return $this->actionStatistics;
    }

    public function setActionStatistics($actionStatistics)
    {
        $this->actionStatistics = $actionStatistics;

        return $this;
    }

}
