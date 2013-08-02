<?php
namespace CallFire\Api\Rest;

abstract class Request
{
    public function getQuery()
    {
        return (array) $this;
    }
}
