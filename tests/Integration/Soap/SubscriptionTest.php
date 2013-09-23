<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Soap\AbstractIntegrationTest as TestCase;
use CallFire\Api\Client;
use CallFire\Api\Soap\Request;
use CallFire\Common\Resource;

class SubscriptionTest extends TestCase
{
    public function testQuerySubscriptions()
    {
        $client = $this->getSubscriptionClient();
        
        $request = new Request\QuerySubscriptions;
        $response = $client->QuerySubscriptions($request);
        $subscriptions = $client::response($response);
        
        $this->assertInstanceOf('CallFire\Api\Soap\Response\ResourceList', $subscriptions);
        
        if(!$subscriptions->getTotalResults()) {
            $this->markTestIncomplete('No resources to validate');
        }
        
        $this->validateSubscriptions($subscriptions);
    }
    
    protected function validateSubscriptions($subscriptions)
    {
        foreach($subscriptions as $subscription) {
            $this->assertInstanceOf('CallFire\Common\Resource\Subscription', $subscription);
        }
    }
}
