<?php

namespace CallFire\Api\Soap\Client;

use CallFire\Api\Soap\AbstractClient;
use CallFire\Api\Soap\Request as Request;
use CallFire\Api\Soap\Result as Result;

class Ccc extends AbstractClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::__construct($wsdl, $options);
    }

    /**
     * @api
     * @param  Request\GetCccCampaign $getCccCampaignRequest
     * @return Result\CccCampaign
     */
    public function GetCccCampaign(Request\GetCccCampaignRequest $getCccCampaignRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getCccCampaignRequest);
    }

    /**
     * @api
     * @param  Request\GetCccCampaignStats $getCccCampaignStatsRequest
     * @return Result\CccCampaignStats
     */
    public function GetCccCampaignStats(Request\GetCccCampaignStatsRequest $getCccCampaignStatsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getCccCampaignStatsRequest);
    }

    /**
     * @api
     * @param  Request\CreateCccCampaign $createCccCampaignRequest
     * @return Result\CccCampaignId
     */
    public function CreateCccCampaign(Request\CreateCccCampaignRequest $createCccCampaignRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($createCccCampaignRequest);
    }

    /**
     * @api
     * @param  Request\QueryCccCampaigns        $queryCccCampaignsRequest
     * @return Result\QueryCccCampaignsResponse
     */
    public function QueryCccCampaigns(Request\QueryCccCampaignsRequest $queryCccCampaignsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($queryCccCampaignsRequest);
    }

    /**
     * @api
     * @param  Request\UpdateCccCampaign        $updateCccCampaignRequest
     * @return Result\UpdateCccCampaignResponse
     */
    public function UpdateCccCampaign(Request\UpdateCccCampaignRequest $updateCccCampaignRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($updateCccCampaignRequest);
    }

    /**
     * @api
     * @param Request\DeleteCccCampaignTransferNumbers
     * $deleteCccCampaignTransferNumbersRequest
     * @return Result\DeleteCccCampaignTransferNumbersResponse
     */
    public function DeleteCccCampaignTransferNumbers(Request\DeleteCccCampaignTransferNumbersRequest $deleteCccCampaignTransferNumbersRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($deleteCccCampaignTransferNumbersRequest);
    }

    /**
     * @api
     * @param  Request\DeleteCccCampaignQuestions        $deleteCccCampaignQuestionsRequest
     * @return Result\DeleteCccCampaignQuestionsResponse
     */
    public function DeleteCccCampaignQuestions(Request\DeleteCccCampaignQuestionsRequest $deleteCccCampaignQuestionsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($deleteCccCampaignQuestionsRequest);
    }

    /**
     * @api
     * @param  Request\ControlCccCampaign        $controlCccCampaignRequest
     * @return Result\ControlCccCampaignResponse
     */
    public function ControlCccCampaign(Request\ControlCccCampaignRequest $controlCccCampaignRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($controlCccCampaignRequest);
    }

    /**
     * @api
     * @param  Request\DeleteCccCampaign        $deleteCccCampaignRequest
     * @return Result\DeleteCccCampaignResponse
     */
    public function DeleteCccCampaign(Request\DeleteCccCampaignRequest $deleteCccCampaignRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($deleteCccCampaignRequest);
    }

    /**
     * @api
     * @param  Request\GetAgent $getAgentRequest
     * @return Result\Agent
     */
    public function GetAgent(Request\GetAgentRequest $getAgentRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getAgentRequest);
    }

    /**
     * @api
     * @param  Request\QueryAgents        $queryAgentsRequest
     * @return Result\QueryAgentsResponse
     */
    public function QueryAgents(Request\QueryAgentsRequest $queryAgentsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($queryAgentsRequest);
    }

    /**
     * @api
     * @param  Request\AddAgents        $addAgentsRequest
     * @return Result\AddAgentsResponse
     */
    public function AddAgents(Request\AddAgentsRequest $addAgentsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($addAgentsRequest);
    }

    /**
     * @api
     * @param  Request\GetAgents        $getAgentsRequest
     * @return Result\GetAgentsResponse
     */
    public function GetAgents(Request\GetAgentsRequest $getAgentsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getAgentsRequest);
    }

    /**
     * @api
     * @param  Request\RemoveAgent        $removeAgentRequest
     * @return Result\RemoveAgentResponse
     */
    public function RemoveAgent(Request\RemoveAgentRequest $removeAgentRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($removeAgentRequest);
    }

    /**
     * @api
     * @param  Request\GetAgentGroup $getAgentGroupRequest
     * @return Result\AgentGroup
     */
    public function GetAgentGroup(Request\GetAgentGroupRequest $getAgentGroupRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getAgentGroupRequest);
    }

    /**
     * @api
     * @param  Request\QueryAgentGroups        $queryAgentGroupsRequest
     * @return Result\QueryAgentGroupsResponse
     */
    public function QueryAgentGroups(Request\QueryAgentGroupsRequest $queryAgentGroupsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($queryAgentGroupsRequest);
    }

    /**
     * @api
     * @param  Request\CreateAgentGroup $createAgentGroupRequest
     * @return Result\AgentGroupId
     */
    public function CreateAgentGroup(Request\CreateAgentGroupRequest $createAgentGroupRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($createAgentGroupRequest);
    }

    /**
     * @api
     * @param  Request\UpdateAgentGroup        $updateAgentGroupRequest
     * @return Result\UpdateAgentGroupResponse
     */
    public function UpdateAgentGroup(Request\UpdateAgentGroupRequest $updateAgentGroupRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($updateAgentGroupRequest);
    }

    /**
     * @api
     * @param  Request\AddAgentGroups        $addAgentGroupsRequest
     * @return Result\AddAgentGroupsResponse
     */
    public function AddAgentGroups(Request\AddAgentGroupsRequest $addAgentGroupsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($addAgentGroupsRequest);
    }

    /**
     * @api
     * @param  Request\GetAgentGroups        $getAgentGroupsRequest
     * @return Result\AddAgentGroupsResponse
     */
    public function GetAgentGroups(Request\GetAgentGroupsRequest $getAgentGroupsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getAgentGroupsRequest);
    }

    /**
     * @api
     * @param  Request\DeleteAgentGroup        $deleteAgentGroupRequest
     * @return Result\DeleteAgentGroupResponse
     */
    public function DeleteAgentGroup(Request\DeleteAgentGroupRequest $deleteAgentGroupRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($deleteAgentGroupRequest);
    }

    /**
     * @api
     * @param  Request\RemoveAgentGroup        $removeAgentGroupRequest
     * @return Result\RemoveAgentGroupResponse
     */
    public function RemoveAgentGroup(Request\RemoveAgentGroupRequest $removeAgentGroupRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($removeAgentGroupRequest);
    }

    /**
     * @api
     * @param  Request\GetAgentSession $getAgentSessionRequest
     * @return Result\AgentSession
     */
    public function GetAgentSession(Request\GetAgentSessionRequest $getAgentSessionRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getAgentSessionRequest);
    }

    /**
     * @api
     * @param  Request\QueryAgentSessions        $queryAgentSessionsRequest
     * @return Result\QueryAgentSessionsResponse
     */
    public function QueryAgentSessions(Request\QueryAgentSessionsRequest $queryAgentSessionsRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($queryAgentSessionsRequest);
    }

    /**
     * @api
     * @param  Request\SendAgentInvites        $sendAgentInvitesRequest
     * @return Result\SendAgentInvitesResponse
     */
    public function SendAgentInvites(Request\SendAgentInvitesRequest $sendAgentInvitesRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($sendAgentInvitesRequest);
    }

    /**
     * @api
     * @param  Request\GetAgentInviteUri        $getAgentInviteUriRequest
     * @return Result\GetAgentInviteUriResponse
     */
    public function GetAgentInviteUri(Request\GetAgentInviteUriRequest $getAgentInviteUriRequest)
    {
        $method = __FUNCTION__;

        return parent::$method($getAgentInviteUriRequest);
    }

}
