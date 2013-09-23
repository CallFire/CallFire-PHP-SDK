<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Soap\AbstractIntegrationTest as TestCase;
use CallFire\Api\Client;
use CallFire\Api\Soap\Request;
use CallFire\Common\Resource;

class NumberTest extends TestCase
{
    public function testQueryNumbers()
    {
        $client = $this->getNumberClient();
        
        $request = new Request\QueryNumbers;
        $response = $client->QueryNumbers($request);
        $numbers = $client::response($response);
        
        $this->assertInstanceOf('CallFire\Api\Soap\Response\ResourceList', $numbers);
        
        if(!$numbers->getTotalResults()) {
            $this->markTestIncomplete('No resources to validate');
        }
        
        $this->validateNumbers($numbers);
    }
    
    protected function validateNumbers($numbers)
    {
        foreach($numbers as $number) {
            $this->assertInstanceOf('CallFire\Common\Resource\Number', $number);
        }
    }
}
