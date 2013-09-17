<?php

namespace CallFire\Api\Soap\Client;

use CallFire\Api\Soap\AbstractClient;
use CallFire\Api\Soap\Request as Request;
use CallFire\Api\Soap\Result as Result;

class Label extends AbstractClient
{

    public function __construct($wsdl = 'http://callfire.com/api/1.0/wsdl/callfire-service-http-soap12.wsdl', $options = array())
    {
        parent::__construct($wsdl, $options);
    }

    /**
     * @param  Request\DeleteLabel   $deleteLabel
     * @return Result\DeleteResponse
     */
    public function DeleteLabel(Request\DeleteLabel $delete)
    {
        $method = __FUNCTION__;

        return parent::$method($delete);
    }

    /**
     * @param  Request\QueryLabels $queryLabels
     * @return Result\QueryResult
     */
    public function QueryLabels(Request\QueryLabels $query)
    {
        $method = __FUNCTION__;

        return parent::$method($query);
    }

    /**
     * @param  Request\LabelBroadcast $labelBroadcast
     * @return Result\Result
     */
    public function LabelBroadcast(Request\LabelBroadcast $labelBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method($labelBroadcast);
    }

    /**
     * @param  Request\UnlabelBroadcast $unlabelBroadcast
     * @return Result\Result
     */
    public function UnlabelBroadcast(Request\UnlabelBroadcast $unlabelBroadcast)
    {
        $method = __FUNCTION__;

        return parent::$method($unlabelBroadcast);
    }

    /**
     * @param  Request\LabelNumber $labelNumber
     * @return Result\Result
     */
    public function LabelNumber(Request\LabelNumber $labelNumber)
    {
        $method = __FUNCTION__;

        return parent::$method($labelNumber);
    }

    /**
     * @param  Request\UnlabelNumber $unlabelNumber
     * @return Result\Result
     */
    public function UnlabelNumber(Request\UnlabelNumber $unlabelNumber)
    {
        $method = __FUNCTION__;

        return parent::$method($unlabelNumber);
    }

}
