<?php
namespace CallFire\Common\Resource;

use PHPUnit_Framework_TestCase as TestCase;

class AbstractResourceTest extends TestCase
{
    public function testResourceInstantiation()
    {
        foreach (glob(__DIR__.'/../../../src/Common/Resource/*.php') as $filename) {
            $className = basename($filename, ".xml");
            if ($className == 'AbstractResource') {
                continue;
            }

            $qualifiedClassName = "CallFire\Common\Resource\\{$className}";

            $resource = new $qualifiedClassName;
            $this->assertInstanceOf($qualifiedClassName, $resource);
        }
    }
}
