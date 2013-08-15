<?php
namespace CallFire\Common\Resource;

abstract class AbstractResource
{
    public static function ns()
    {
        $ns = explode('\\', __CLASS__);
        array_pop($ns);
        $ns = implode('\\', $ns);
        return $ns;
    }
}
