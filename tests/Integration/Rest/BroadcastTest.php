<?php
namespace CallFire\Api\Rest;

use CallFire\Api\Rest\AbstractIntegrationTest as TestCase;
use CallFire\Api\Client;
use CallFire\Api\Rest\Request;

class BroadcastTest extends TestCase
{
    public function testQueryBroadcasts()
    {
        $client = $this->getBroadcastClient();
        
        $request = new Request\QueryBroadcasts;
        $response = $client->QueryBroadcasts($request);
        
        $this->assertStringStartsWith("<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>\n<r:ResourceList", $response);
        
        $broadcasts = $client::response($response);
    }

    public function getBroadcastClient()
    {
        $client = Client::Rest($this->getUsername(), $this->getPassword(), 'Broadcast');
        
        return $client;
    }
}
