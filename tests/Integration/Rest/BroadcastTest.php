<?php
namespace CallFire\Api\Rest;

use CallFire\Api\Rest\AbstractIntegrationTest as TestCase;
use CallFire\Api\Client;
use CallFire\Api\Rest\Request;
use CallFire\Common\Resource;

class BroadcastTest extends TestCase
{
    public function testQueryBroadcasts()
    {
        $client = $this->getBroadcastClient();

        $request = new Request\QueryBroadcasts;
        $response = $client->QueryBroadcasts($request);

        $this->assertStringStartsWith("<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>\n<r:ResourceList", $response);

        $broadcasts = $client::response($response);
        $this->assertInstanceOf('CallFire\Api\Rest\Response\ResourceList', $broadcasts);

        $this->validateBroadcasts($broadcasts);
    }

    public function testGetBroadcast()
    {
        $this->expectOutputString(''); // REMOVE
        $client = $this->getBroadcastClient();

        $request = new Request\QueryBroadcasts;
        $response = $client->QueryBroadcasts($request);
        $broadcasts = $client::response($response)->getResources();
        $knownBroadcast = reset($broadcasts);

        if ($knownBroadcast instanceof Resource\Broadcast) {
            $response = $client->GetBroadcast($knownBroadcast->getId());
            $this->assertStringStartsWith("<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>\n<r:Resource", $response);

            $resource = $client::response($response);
            $this->assertInstanceOf('CallFire\Api\Rest\Response\Resource', $resource);

            $broadcast = $resource->getResource();
            $this->assertInstanceOf('CallFire\Common\Resource\Broadcast', $broadcast);

            $this->validateBroadcasts(array(
                $broadcast
            ));
        } else {
            $this->markTestSkipped('No broadcasts available to test with.');
        }
    }

    public function getBroadcastClient()
    {
        $client = Client::Rest($this->getUsername(), $this->getPassword(), 'Broadcast');

        return $client;
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
