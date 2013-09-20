<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Soap\AbstractIntegrationTest as TestCase;
use CallFire\Api\Client;
use CallFire\Api\Soap\Request;
use CallFire\Common\Resource;

class CallTest extends TestCase
{
    public function testQueryCalls()
    {
        $client = $this->getCallClient();
        $knownBroadcast = $this->getKnownBroadcast($client::BROADCAST_VOICE);
        
        if($knownBroadcast instanceof Resource\Broadcast) {
            $request = new Request\QueryCalls;
            $request->setBroadcastId($knownBroadcast->getId());
            $response = $client->QueryCalls($request);

            $calls = $client::response($response);
            $this->assertInstanceOf('CallFire\Api\Soap\Response\ResourceList', $calls);
            
            if(!$calls->getTotalResults()) {
                $this->markTestIncomplete('No resources to validate');
            }

            $this->validateCalls($calls);
        } else {
            $this->markTestSkipped('No broadcasts available to test with.');
        }
    }
    
    protected function validateCalls($calls)
    {
        foreach($calls as $call) {
            $this->assertInstanceOf('CallFire\Common\Resource\Call', $call);
        }
    }
}
