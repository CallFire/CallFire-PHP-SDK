<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Soap\AbstractIntegrationTest as TestCase;
use CallFire\Api\Client;
use CallFire\Api\Soap\Request;
use CallFire\Common\Resource;

class TextTest extends TestCase
{
    public function testQueryTexts()
    {
        $client = $this->getTextClient();
        $knownBroadcast = $this->getKnownBroadcast($client::BROADCAST_TEXT);
        
        if($knownBroadcast instanceof Resource\Broadcast) {
            $request = new Request\QueryTexts;
            $request->setBroadcastId($knownBroadcast->getId());
            $response = $client->QueryTexts($request);

            $texts = $client::response($response);
            $this->assertInstanceOf('CallFire\Api\Soap\Response\ResourceList', $texts);
            
            if(!$texts->getTotalResults()) {
                $this->markTestIncomplete('No resources to validate');
            }

            $this->validateTexts($texts);
        } else {
            $this->markTestSkipped('No broadcasts available to test with.');
        }
    }
    
    protected function validateTexts($texts)
    {
        foreach($texts as $text) {
            $this->assertInstanceOf('CallFire\Common\Resource\Text', $text);
        }
    }
}
