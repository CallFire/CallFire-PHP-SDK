<?php
namespace CallFire\Api\Rest\Http;

interface Request
{
    public function setOption($name, $value);
    public function setOptions($options);
    public function execute();
    public function getInfo($name);
    public function close();
}
