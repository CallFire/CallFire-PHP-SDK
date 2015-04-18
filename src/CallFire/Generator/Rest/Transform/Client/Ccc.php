<?php
namespace CallFire\Generator\Rest\Transform\Client;

class Ccc extends AbstractTransform
{
    public function transform()
    {
        $classGenerator = $this->getService()->getClassGenerator();

        $this->fixPathParameters($classGenerator, 'GetCccCampaignStats', array(
            'CampaignId' => 'int',
        ));
        
        $this->fixPathParameters($classGenerator, 'UpdateCccCampaign', array(
            'Id' => 'int',
        ));
        
        $this->fixPathParameters($classGenerator, 'AddAgents', array(
            'CampaignId' => 'int',
        ));
        
        $this->fixPathParameters($classGenerator, 'GetAgents', array(
            'CampaignId' => 'int',
        ));
        
        $this->fixPathParameters($classGenerator, 'RemoveAgent', array(
            'CampaignId' => 'int',
            'Id' => 'int',
        ));
        
        $this->fixPathParameters($classGenerator, 'UpdateAgentGroup', array(
            'Id' => 'int',
        ));
        
        $this->fixPathParameters($classGenerator, 'AddAgentGroups', array(
            'CampaignId' => 'int',
        ));
        
        $this->fixPathParameters($classGenerator, 'GetAgentGroups', array(
            'CampaignId' => 'int',
        ));
        
        $this->fixPathParameters($classGenerator, 'RemoveAgentGroup', array(
            'CampaignId' => 'int',
            'Id' => 'int',
        ));
    }
}
