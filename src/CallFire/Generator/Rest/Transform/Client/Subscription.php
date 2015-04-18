<?php
namespace CallFire\Generator\Rest\Transform\Client;

class Subscription extends AbstractTransform
{
    public function transform()
    {
        $classGenerator = $this->getService()->getClassGenerator();

        $this->fixPathParameters($classGenerator, 'UpdateSubscription', array(
            'Id' => 'int',
        ));
    }
}
