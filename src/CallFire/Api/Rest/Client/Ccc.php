<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;

class Ccc extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    /**
     * Get CCC Campaign by id
     *
     * Get ccc campaign identified by id.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetCccCampaign($Id)
    {
        $uri = $this->getUri('/ccc/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Create CCC Campaign
     *
     * Create ccc campaign. Returns id of newly created ccc campaign.
     *
     * @api
     * @param Request\CreateCccCampaign $CreateCccCampaign = null
     */
    public function CreateCccCampaign(Request\CreateCccCampaign $CreateCccCampaign = null)
    {
        $uri = $this->getUri('/ccc', array());

        return $this->post($uri, $CreateCccCampaign);
    }

    /**
     * Query CCC Campaigns
     *
     * Query for existing ccc campaigns using optional filters such as name, status,
     * labels, etc... Returns a list of ccc campaigns and all associated info. See
     * GetCccCampaign to return just a single ccc campaign by id.
     *
     * @api
     * @param Request\QueryCccCampaigns $QueryCccCampaigns = null
     */
    public function QueryCccCampaigns(Request\QueryCccCampaigns $QueryCccCampaigns = null)
    {
        $uri = $this->getUri('/ccc', array());

        return $this->get($uri, $QueryCccCampaigns);
    }

    /**
     * Delete all transfer numbers from existing CCC Campaign
     *
     * Delete all transfer numbers from an existing CCC Campaign. To add or update
     * transfer numbers on ccc campaign use UpdateCccCampaign. This call is only needed
     * when deletion of all transfer numbers is needed.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function DeleteCccCampaignTransferNumbers($Id)
    {
        $uri = $this->getUri('/ccc/%s/transfer-numbers', array($Id));

        return $this->delete($uri);
    }

    /**
     * Delete all questions from existing CCC Campaign
     *
     * Delete all questions from an existing CCC Campaign. To add or update questions
     * on ccc campaign use UpdateCccCampaign. This call is only needed when deletion of
     * all questions is needed.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function DeleteCccCampaignQuestions($Id)
    {
        $uri = $this->getUri('/ccc/%s/questions', array($Id));

        return $this->delete($uri);
    }

    /**
     * Starts, Stops or Archives a CCC Campaign
     *
     * Apply command START, STOP, or ARCHIVE to ccc campaign. Also can change the max
     * active count of campaign.
     *
     * @api
     * @param int                        $Id                 Unique ID of resource
     * @param Request\ControlCccCampaign $ControlCccCampaign
     */
    public function ControlCccCampaign($Id, Request\ControlCccCampaign $ControlCccCampaign)
    {
        $uri = $this->getUri('/ccc/%s/control', array($Id));

        return $this->put($uri, $ControlCccCampaign);
    }

    /**
     * Deletes a Ccc Campaign by ID
     *
     * Delete ccc campaign identified by id.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function DeleteCccCampaign($Id)
    {
        $uri = $this->getUri('/ccc/%s', array($Id));

        return $this->delete($uri);
    }

    /**
     * Get CCC Agent by Id
     *
     * Return individual agent by id. See QueryAgents to return list of agents.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetAgent($Id)
    {
        $uri = $this->getUri('/ccc/agent/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Lists existing Agents
     *
     * Query for existing Agents using optional filters such as campaignId, name,
     * etc... Returns a list of Agents and all associated info. See GetAgent to return
     * just a single Agent by id.
     *
     * @api
     * @param Request\QueryAgents $QueryAgents = null
     */
    public function QueryAgents(Request\QueryAgents $QueryAgents = null)
    {
        $uri = $this->getUri('/ccc/agent', array());

        return $this->get($uri, $QueryAgents);
    }

    /**
     * Get CCC AgentGroup by Id
     *
     * Return individual agent group by id. See QueryAgentGroups to return list of
     * agent groups.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetAgentGroup($Id)
    {
        $uri = $this->getUri('/ccc/agent-group/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Lists existing AgentGroups
     *
     * Query for existing agent groups using optional filters such as campaignId, name,
     * etc... Returns a list of AgentGroups and all associated info. See GetAgentGroup
     * to return just a single AgentGroup by id.
     *
     * @api
     * @param Request\QueryAgentGroups $QueryAgentGroups = null
     */
    public function QueryAgentGroups(Request\QueryAgentGroups $QueryAgentGroups = null)
    {
        $uri = $this->getUri('/ccc/agent-group', array());

        return $this->get($uri, $QueryAgentGroups);
    }

    /**
     * Create CCC AgentGroup
     *
     * Create agent group using either list of agent ids or list of agent emails but
     * not both.
     *
     * @api
     * @param Request\CreateAgentGroup $CreateAgentGroup = null
     */
    public function CreateAgentGroup(Request\CreateAgentGroup $CreateAgentGroup = null)
    {
        $uri = $this->getUri('/ccc/agent-group', array());

        return $this->post($uri, $CreateAgentGroup);
    }

    /**
     * Deletes a CCC AgentGroup by ID
     *
     * Delete agent group identified by id.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function DeleteAgentGroup($Id)
    {
        $uri = $this->getUri('/ccc/agent-group/%s', array($Id));

        return $this->delete($uri);
    }

    /**
     * Get CCC AgentSession by Id
     *
     * Return ccc agent session by id. See QueryAgentSessions to return list of agent
     * sessions and determine individual agent session id.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetAgentSession($Id)
    {
        $uri = $this->getUri('/ccc/agent-session/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Lists existing AgentSessions
     *
     * Query for existing agent sessions using optional filters such as CampaignId,
     * AgentEmail, etc... Returns a list of agent sessions and all associated info. See
     * GetAgentSession to return just a single agent session by id.
     *
     * @api
     * @param Request\QueryAgentSessions $QueryAgentSessions = null
     */
    public function QueryAgentSessions(Request\QueryAgentSessions $QueryAgentSessions = null)
    {
        $uri = $this->getUri('/ccc/agent-session', array());

        return $this->get($uri, $QueryAgentSessions);
    }

    /**
     * Send CCC AgentInvite
     *
     * Send ccc agent invite email which includes a link inside email for agent to
     * register with campaign.
     *
     * @api
     * @param int                      $CampaignId       CCC Campaign to invite agents to
     * @param Request\SendAgentInvites $SendAgentInvites
     */
    public function SendAgentInvites($CampaignId, Request\SendAgentInvites $SendAgentInvites)
    {
        $uri = $this->getUri('/ccc/%s/agent-invite', array($CampaignId));

        return $this->post($uri, $SendAgentInvites);
    }

    /**
     * Get CCC AgentInvite URI
     *
     * Return campaign registration link that agents can use to register for a
     * campaign. (ex:
     * https://www.callfire.com/ui/register/agent/c1ca1280-64c8-11e4-8fe5-00136e4efdeb)
     *
     * @api
     * @param int                       $CampaignId        CCC Campaign to invite agents to
     * @param Request\GetAgentInviteUri $GetAgentInviteUri
     */
    public function GetAgentInviteUri($CampaignId, Request\GetAgentInviteUri $GetAgentInviteUri)
    {
        $uri = $this->getUri('/ccc/%s/agent-invite-uri', array($CampaignId));

        return $this->get($uri, $GetAgentInviteUri);
    }

    /**
     * Get CCC Campaign statistics by campaign id
     *
     * Return campaign stats that includes call counts and billing amounts.
     *
     * @api
     * @param Request\GetCccCampaignStats $GetCccCampaignStats = null
     * @param int                         $CampaignId
     */
    public function GetCccCampaignStats($CampaignId, Request\GetCccCampaignStats $GetCccCampaignStats = null)
    {
        $uri = $this->getUri('/ccc/%s/stats', array($CampaignId));

        return $this->get($uri, $GetCccCampaignStats);
    }

    /**
     * Updates an existing CCC Campaigns configuration
     *
     * Update existing campaign's configuration such as time zone restrictions or retry
     * logic. Currently all fields from config are updated so the 'Message' field needs
     * to be populated just like in CreateCccCampaign operation.  Use unique ID to
     * specify campaign. Need to provide dummy 'Name' field Campaign even though the
     * field will not be overwritten.
     *
     * @api
     * @param Request\UpdateCccCampaign $UpdateCccCampaign = null
     * @param int                       $Id
     */
    public function UpdateCccCampaign($Id, Request\UpdateCccCampaign $UpdateCccCampaign = null)
    {
        $uri = $this->getUri('/ccc/%s', array($Id));

        return $this->put($uri, $UpdateCccCampaign);
    }

    /**
     * Add Agents to Campaign
     *
     * Add agents identified by id or email to existing ccc campaign.
     *
     * @api
     * @param Request\AddAgents $AddAgents  = null
     * @param int               $CampaignId
     */
    public function AddAgents($CampaignId, Request\AddAgents $AddAgents = null)
    {
        $uri = $this->getUri('/ccc/%s/agent', array($CampaignId));

        return $this->post($uri, $AddAgents);
    }

    /**
     * Get Agents attached with Campaign
     *
     * Get list of agents attached to ccc campaign.
     *
     * @api
     * @param Request\GetAgents $GetAgents  = null
     * @param int               $CampaignId
     */
    public function GetAgents($CampaignId, Request\GetAgents $GetAgents = null)
    {
        $uri = $this->getUri('/ccc/%s/agent', array($CampaignId));

        return $this->get($uri, $GetAgents);
    }

    /**
     * Remove Agents from CCC Campaign
     *
     * Remove individual agent identified by id from ccc campaign identified by
     * campaign id.
     *
     * @api
     * @param Request\RemoveAgent $RemoveAgent = null
     * @param int                 $CampaignId
     * @param int                 $Id
     */
    public function RemoveAgent($CampaignId, $Id, Request\RemoveAgent $RemoveAgent = null)
    {
        $uri = $this->getUri('/ccc/%s/agent/%s', array($CampaignId, $Id));

        return $this->delete($uri, $RemoveAgent);
    }

    /**
     * Updates an existing CCC AgentGroup
     *
     * Update existing agent group identified by id. Change name, etc...
     *
     * @api
     * @param Request\UpdateAgentGroup $UpdateAgentGroup = null
     * @param int                      $Id
     */
    public function UpdateAgentGroup($Id, Request\UpdateAgentGroup $UpdateAgentGroup = null)
    {
        $uri = $this->getUri('/ccc/agent-group/%s', array($Id));

        return $this->put($uri, $UpdateAgentGroup);
    }

    /**
     * Add AgentGroups to Campaign
     *
     * Add agent groups identified by ids to campaign.
     *
     * @api
     * @param Request\AddAgentGroups $AddAgentGroups = null
     * @param int                    $CampaignId
     */
    public function AddAgentGroups($CampaignId, Request\AddAgentGroups $AddAgentGroups = null)
    {
        $uri = $this->getUri('/ccc/%s/agent-group', array($CampaignId));

        return $this->post($uri, $AddAgentGroups);
    }

    /**
     * Get all AgentGroups attached to Campaign
     *
     * Returns a list of agent groups attached to campaign.
     *
     * @api
     * @param Request\GetAgentGroups $GetAgentGroups = null
     * @param int                    $CampaignId
     */
    public function GetAgentGroups($CampaignId, Request\GetAgentGroups $GetAgentGroups = null)
    {
        $uri = $this->getUri('/ccc/%s/agent-group', array($CampaignId));

        return $this->get($uri, $GetAgentGroups);
    }

    /**
     * Remove AgentGroup from Campaign
     *
     * Remove agent group identified by id from campaign. If id points to non-existent
     * agent group then ServiceFault or 404 error will be thrown.
     *
     * @api
     * @param Request\RemoveAgentGroup $RemoveAgentGroup = null
     * @param int                      $CampaignId
     * @param int                      $Id
     */
    public function RemoveAgentGroup($CampaignId, $Id, Request\RemoveAgentGroup $RemoveAgentGroup = null)
    {
        $uri = $this->getUri('/ccc/%s/agent-group/%s', array($CampaignId, $Id));

        return $this->delete($uri, $RemoveAgentGroup);
    }

}
