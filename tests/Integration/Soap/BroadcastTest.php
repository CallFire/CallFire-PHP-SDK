<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Soap\AbstractIntegrationTest as TestCase;
use CallFire\Api\Client;
use CallFire\Api\Soap\Request;
use CallFire\Common\Resource;

class BroadcastTest extends TestCase
{
    public function testQueryBroadcasts()
    {
        $client = $this->getBroadcastClient();

        $request = new Request\QueryBroadcasts;
        $response = $client->QueryBroadcasts($request);

        $broadcasts = $client::response($response);
        $this->assertInstanceOf('CallFire\Api\Soap\Response\ResourceList', $broadcasts);
        
        if(!$broadcasts->getTotalResults()) {
            $this->markTestIncomplete('No resources to validate');
        }

        $this->validateBroadcasts($broadcasts);
    }

    public function testGetBroadcast()
    {
        $client = $this->getBroadcastClient();
        $knownBroadcast = $this->getKnownBroadcast();

        if ($knownBroadcast instanceof Resource\Broadcast) {
            $request = new Request\GetBroadcast;
            $request->setId($knownBroadcast->getId());
            
            $response = $client->GetBroadcast($request);

            $resource = $client::response($response);
            $this->assertInstanceOf('CallFire\Api\Soap\Response\Resource', $resource);

            $broadcast = $resource->getResource();
            $this->assertInstanceOf('CallFire\Common\Resource\Broadcast', $broadcast);

            $this->validateBroadcasts(array(
                $broadcast
            ));
        } else {
            $this->markTestSkipped('No broadcasts available to test with.');
        }
    }

    protected function validateBroadcasts($broadcasts)
    {
        foreach ($broadcasts as $broadcast) {
            $this->assertInstanceOf('CallFire\Common\Resource\Broadcast', $broadcast);
            $this->assertNotEmpty($broadcast->getId());
            $this->assertNotEmpty($broadcast->getName());
            $this->assertNotEmpty($broadcast->getStatus());
            $this->assertNotEmpty($broadcast->getType());

            if ($ivrBroadcastConfig = $broadcast->getIvrBroadcastConfig()) {
                $this->assertInstanceOf('CallFire\Common\Resource\IvrBroadcastConfig', $ivrBroadcastConfig);
                $this->assertNotEmpty($ivrBroadcastConfig->getFromNumber());
                $this->assertNotEmpty($ivrBroadcastConfig->getDialplanXml());

                if ($retryConfig = $ivrBroadcastConfig->getRetryConfig()) {
                    $this->assertInstanceOf('CallFire\Common\Resource\RetryConfig', $retryConfig);
                    $this->assertNotEmpty($retryConfig->getMaxAttempts());
                    $this->assertNotEmpty($retryConfig->getMinutesBetweenAttempts());
                }
            }
        }
    }
}
