<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Soap\AbstractIntegrationTest as TestCase;
use CallFire\Api\Client;
use CallFire\Api\Soap\Request;
use CallFire\Common\Resource;

class ContactTest extends TestCase
{
    public function testQueryContacts()
    {
        $client = $this->getContactClient();
        
        $request = new Request\QueryContacts;
        $response = $client->QueryContacts($request);
        $contacts = $client::response($response);
        
        $this->assertInstanceOf('CallFire\Api\Soap\Response\ResourceList', $contacts);
        
        if(!$contacts->getTotalResults()) {
            $this->markTestIncomplete('No resources to validate');
        }
        
        $this->validateContacts($contacts);
    }
    
    protected function validateContacts($contacts)
    {
        foreach($contacts as $contact) {
            $this->assertInstanceOf('CallFire\Common\Resource\Contact', $contact);
        }
    }
}
