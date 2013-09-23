<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Soap\AbstractIntegrationTest as TestCase;
use CallFire\Api\Client;
use CallFire\Api\Soap\Request;
use CallFire\Common\Resource;

class LabelTest extends TestCase
{
    public function testQueryLabels()
    {
        $client = $this->getLabelClient();
        
        $request = new Request\QueryLabels;
        $response = $client->QueryLabels($request);
        $labels = $client::response($response);
        
        $this->assertInstanceOf('CallFire\Api\Soap\Response\ResourceList', $labels);
        
        if(!$labels->getTotalResults()) {
            $this->markTestIncomplete('No resources to validate');
        }
        
        $this->validateLabels($labels);
    }
    
    protected function validateLabels($labels)
    {
        foreach($labels as $label) {
            $this->assertInstanceOf('CallFire\Common\Resource\Label', $label);
        }
    }
}
