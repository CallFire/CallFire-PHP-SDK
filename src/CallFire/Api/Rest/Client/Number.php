<?php

namespace CallFire\Api\Rest\Client;

use CallFire\Api\Rest\AbstractClient;
use CallFire\Api\Rest\Request as Request;
use CallFire\Api\Rest\Response as Response;

class Number extends AbstractClient
{

    public $basePath = 'https://www.callfire.com/api/1.1/rest';

    /**
     * Queries regions for use in subsequent searches and purchase requests
     *
     * Use a know subset of info on a region to query for the full set of info on a
     * region. Example, if you know the city you can query for phone number prefixes,
     * rate-centers, etc... associated with that city.
     *
     * @api
     * @param Request\QueryRegions $QueryRegions = null
     */
    public function QueryRegions(Request\QueryRegions $QueryRegions = null)
    {
        $uri = $this->getUri('/number/regions', array());

        return $this->get($uri, $QueryRegions);
    }

    /**
     * Lists numbers owned by your account
     *
     * Search for numbers already purchased and in your account by region info such as
     * prefix, city, state, zipcode, rate center, etc... Returns info on the numbers in
     * your account such as status, lease info, configuration, etc...
     *
     * @api
     * @param Request\QueryNumbers $QueryNumbers = null
     */
    public function QueryNumbers(Request\QueryNumbers $QueryNumbers = null)
    {
        $uri = $this->getUri('/number', array());

        return $this->get($uri, $QueryNumbers);
    }

    /**
     * Get information about a single number owned by your account
     *
     * Select number, using 11 digit E.164 format, already purchased and in your
     * account. Returns info on the number in your account such as status, lease info,
     * configuration, etc...
     *
     * @api
     * @param string $Number 11 digit telephone number
     */
    public function GetNumber($Number)
    {
        $uri = $this->getUri('/number/%s', array($Number));

        return $this->get($uri);
    }

    /**
     * Configure a number owned by your account
     *
     * Update number configuration, such as ENABLE / DISABLE or turn call recording on,
     * using 11 diget E.164 format to select number. No response is returned.
     *
     * @api
     * @param string                  $Number
     * @param Request\ConfigureNumber $ConfigureNumber
     */
    public function ConfigureNumber($Number, Request\ConfigureNumber $ConfigureNumber)
    {
        $uri = $this->getUri('/number/%s', array($Number));

        return $this->put($uri, $ConfigureNumber);
    }

    /**
     * Search for new numbers that are available for purchase
     *
     * Find numbers available for purchase using either TollFree = true or by region
     * info, such as prefix, city, zipcode, etc... The max count of numbers to return
     * must also be specified.
     *
     * @api
     * @param Request\SearchAvailableNumbers $SearchAvailableNumbers = null
     */
    public function SearchAvailableNumbers(Request\SearchAvailableNumbers $SearchAvailableNumbers = null)
    {
        $uri = $this->getUri('/number/search', array());

        return $this->get($uri, $SearchAvailableNumbers);
    }

    /**
     * Lists keywords owned by your account
     *
     * Get info such as status, lease dates, etc... on keywords owned by your account.
     *
     * @api
     * @param Request\QueryKeywords $QueryKeywords = null
     */
    public function QueryKeywords(Request\QueryKeywords $QueryKeywords = null)
    {
        $uri = $this->getUri('/number/keyword', array());

        return $this->get($uri, $QueryKeywords);
    }

    /**
     * Search for keywords available for purchase
     *
     * Supply list of keywords to see if they are available for purchase. If keyword is
     * available for purchase it will be returned in result. If not available then it
     * will not be returned in result.  Once available keywords are found they can be
     * purchase using CreateNumberOrder
     *
     * @api
     * @param Request\SearchAvailableKeywords $SearchAvailableKeywords = null
     */
    public function SearchAvailableKeywords(Request\SearchAvailableKeywords $SearchAvailableKeywords = null)
    {
        $uri = $this->getUri('/number/keyword/search', array());

        return $this->get($uri, $SearchAvailableKeywords);
    }

    /**
     * Order new numbers and/or keywords
     *
     * Purchase numbers and keywords by creating a number order that includes a list of
     * numbers, list of keywords, region info, or specifying toll-free. OrderId is
     * returned from request. Creating a number order is an asynchronous process. The
     * returned orderId can be used in a GetNumberOrder request to see the status of
     * the order. However, there is no guarantee the order will be finished by the time
     * GetNumberOrder is called therefore the GetNumberOrder operation must be polled
     * (no more than once a second) untill the order is in a terminal state (FINISHED
     * or ERRORED).  The recommended way to determine if an order is finished is not to
     * poll but to use a Postback. See SubscriptionService for information on
     * registering a postback using subscriptions.
     *
     * @api
     * @param Request\CreateNumberOrder $CreateNumberOrder = null
     */
    public function CreateNumberOrder(Request\CreateNumberOrder $CreateNumberOrder = null)
    {
        $uri = $this->getUri('/number/order', array());

        return $this->post($uri, $CreateNumberOrder);
    }

    /**
     * Get the status and results of a previous order
     *
     * Returns information on the order status, cost, and assets aquired. Since
     * CreateNumberOrder is an asynchronous process this GetNumberOrder operation may
     * need to be polled for up to 20 seconds at a rate of no more than once a second
     * to determine when the order is in a terminal state of FINISHED or ERRORED. Order
     * will be in 'PROCESSING' status untill finished.
     *
     * @api
     * @param int $Id Unique ID of resource
     */
    public function GetNumberOrder($Id)
    {
        $uri = $this->getUri('/number/order/%s', array($Id));

        return $this->get($uri);
    }

    /**
     * Disable auto-renew for a number or keyword
     *
     * CallFire's system automatically "renews" your numbers and keywords each month
     * and bills you accordingly. When you no longer need a number or keyword, you can
     * easily 'Release' it and stop your recurring monthly charge.  Once you release a
     * keyword, you will not be able to repurchase it for a month after the release
     * becomes effective. For example, if your keyword is slated to auto-renew for
     * another month on April 29th, and you release it on April 15th, you will still be
     * able to use it until April 29th. However, you will not be able to repurchase it
     * until May 29th. Therefore, please be sure of your decision before releasing.
     *
     * @api
     * @param Request\Release $Release = null
     */
    public function Release(Request\Release $Release = null)
    {
        $uri = $this->getUri('/number/release', array());

        return $this->put($uri, $Release);
    }

}
