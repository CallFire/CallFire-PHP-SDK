<?php
namespace CallFire\Api\Rest\Request;

use CallFire\Api\Rest\Request as AbstractRequest;

class MockRequest extends AbstractRequest
{
    protected $a = "a";
    protected $b = "b";
    protected $c = "c";

    public function getA()
    {
        return $this->a;
    }

    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    public function getB()
    {
        return $this->b;
    }

    public function setB($b)
    {
        $this->b = $b;

        return $this;
    }

    public function getC()
    {
        return $this->c;
    }

    public function setC($c)
    {
        $this->c = $c;

        return $this;
    }
}
