<?php

namespace CallFire\Api\Soap\Client;

use CallFire\Api\Soap\AbstractClient;
use CallFire\Api\Soap\Request as Request;
use CallFire\Api\Soap\Result as Result;

class Number extends AbstractClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.0/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::__construct($wsdl, $options);
    }

    /**
     * @param  Request\QueryRegions $queryRegions
     * @return Result\Response
     */
    public function QueryRegions(Request\QueryRegions $request)
    {
        $method = __FUNCTION__;

        return parent::$method($request);
    }

    /**
     * @param  Request\QueryNumbers     $queryNumbers
     * @return Result\NumberQueryResult
     */
    public function QueryNumbers(Request\QueryNumbers $queryNumbers)
    {
        $method = __FUNCTION__;

        return parent::$method($queryNumbers);
    }

    /**
     * @param  Request\GetNumber $getNumber
     * @return Result\Number
     */
    public function GetNumber(Request\GetNumber $getNumber)
    {
        $method = __FUNCTION__;

        return parent::$method($getNumber);
    }

    /**
     * @param  Request\ConfigureNumber        $configureNumber
     * @return Result\ConfigureNumberResponse
     */
    public function ConfigureNumber(Request\ConfigureNumber $configureNumber)
    {
        $method = __FUNCTION__;

        return parent::$method($configureNumber);
    }

    /**
     * @param  Request\SearchAvailableNumbers $searchAvailableNumbers
     * @return Result\AvailableNumbers
     */
    public function SearchAvailableNumbers(Request\SearchAvailableNumbers $searchAvailableNumbers)
    {
        $method = __FUNCTION__;

        return parent::$method($searchAvailableNumbers);
    }

    /**
     * @param  Request\QueryKeywords     $queryKeywords
     * @return Result\KeywordQueryResult
     */
    public function QueryKeywords(Request\QueryKeywords $queryKeywords)
    {
        $method = __FUNCTION__;

        return parent::$method($queryKeywords);
    }

    /**
     * @param  Request\SearchAvailableKeywords $searchAvailableKeywords
     * @return Result\AvailableKeywordList
     */
    public function SearchAvailableKeywords(Request\SearchAvailableKeywords $searchAvailableKeywords)
    {
        $method = __FUNCTION__;

        return parent::$method($searchAvailableKeywords);
    }

    /**
     * @param  Request\CreateNumberOrder $createNumberOrder
     * @return Result\NumberOrderId
     */
    public function CreateNumberOrder(Request\CreateNumberOrder $createNumberOrder)
    {
        $method = __FUNCTION__;

        return parent::$method($createNumberOrder);
    }

    /**
     * @param  Request\GetNumberOrder $getNumberOrder
     * @return Result\NumberOrder
     */
    public function GetNumberOrder(Request\GetNumberOrder $getNumberOrder)
    {
        $method = __FUNCTION__;

        return parent::$method($getNumberOrder);
    }

    /**
     * @param  Request\Release        $release
     * @return Result\ReleaseResponse
     */
    public function Release(Request\Release $release)
    {
        $method = __FUNCTION__;

        return parent::$method($release);
    }

}
