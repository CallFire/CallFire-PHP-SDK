<?php
namespace CallFire\Generator\Rest\Transform\Client;

class Broadcast extends AbstractTransform
{
    public function transform()
    {
        $classGenerator = $this->getService()->getClassGenerator();

        $this->fixPathParameters($classGenerator, 'UpdateBroadcast', array(
            'id' => 'int',
        ));
    }
}
