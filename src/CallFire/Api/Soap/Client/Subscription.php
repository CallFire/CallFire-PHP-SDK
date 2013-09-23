<?php

namespace CallFire\Api\Soap\Client;

use CallFire\Api\Soap\AbstractClient;
use CallFire\Api\Soap\Request as Request;
use CallFire\Api\Soap\Result as Result;

class Subscription extends AbstractClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::__construct($wsdl, $options);
    }

    /**
     * @api
     * @param  Request\CreateSubscription $createSubscription
     * @return Result\SubscriptionId
     */
    public function CreateSubscription(Request\CreateSubscription $create)
    {
        $method = __FUNCTION__;

        return parent::$method($create);
    }

    /**
     * @api
     * @param  Request\QuerySubscriptions     $querySubscriptions
     * @return Result\SubscriptionQueryResult
     */
    public function QuerySubscriptions(Request\QuerySubscriptions $querySubscriptions)
    {
        $method = __FUNCTION__;

        return parent::$method($querySubscriptions);
    }

    /**
     * @api
     * @param  Request\GetSubscription $getSubscription
     * @return Result\Response
     */
    public function GetSubscription(Request\GetSubscription $getSubscription)
    {
        $method = __FUNCTION__;

        return parent::$method($getSubscription);
    }

    /**
     * @api
     * @param  Request\UpdateSubscription        $updateSubscription
     * @return Result\UpdateSubscriptionResponse
     */
    public function UpdateSubscription(Request\UpdateSubscription $updateSubscription)
    {
        $method = __FUNCTION__;

        return parent::$method($updateSubscription);
    }

    /**
     * @api
     * @param  Request\DeleteSubscription        $deleteSubscription
     * @return Result\DeleteSubscriptionResponse
     */
    public function DeleteSubscription(Request\DeleteSubscription $deleteSubscription)
    {
        $method = __FUNCTION__;

        return parent::$method($deleteSubscription);
    }

}
