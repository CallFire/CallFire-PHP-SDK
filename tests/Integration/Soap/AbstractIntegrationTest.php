<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Client;
use CallFire\Common\Resource;

use PHPUnit_Framework_TestCase as TestCase;

abstract class AbstractIntegrationTest extends TestCase
{
    protected $username;

    protected $password;

    public function setUp()
    {
        if (empty($_ENV['API_Username']) || empty($_ENV['API_Password'])) {
            $this->markTestSkipped(
                'Integration testing requires API credentials'
            );
        }

        $this->setUsername($_ENV['API_Username']);
        $this->setPassword($_ENV['API_Password']);
    }
    
    public function getKnownBroadcast($type = null)
    {
        $broadcastClient = $this->getBroadcastClient();
        
        $request = new Request\QueryBroadcasts;
        if($type) {
            $request->setType($type);
        }
        $request->setMaxResults(2);
        $response = $broadcastClient->QueryBroadcasts($request);
        $broadcasts = $broadcastClient::response($response)->getResources();
        $knownBroadcast = reset($broadcasts);
        
        return $knownBroadcast;
    }
    
    public function getBroadcastClient()
    {
        $client = Client::Soap($this->getUsername(), $this->getPassword(), 'Broadcast');

        return $client;
    }
    
    public function getCallClient()
    {
        $client = Client::Soap($this->getUsername(), $this->getPassword(), 'Call');

        return $client;
    }
    
    public function getContactClient()
    {
        $client = Client::Soap($this->getUsername(), $this->getPassword(), 'Contact');
        
        return $client;
    }
    
    public function getLabelClient()
    {
        $client = Client::Soap($this->getUsername(), $this->getPassword(), 'Label');
        
        return $client;
    }
    
    public function getNumberClient()
    {
        $client = Client::Soap($this->getUsername(), $this->getPassword(), 'Number');
        
        return $client;
    }
    
    public function getSubscriptionClient()
    {
        $client = Client::Soap($this->getUsername(), $this->getPassword(), 'Subscription');
        
        return $client;
    }
    
    public function getTextClient()
    {
        $client = Client::Soap($this->getUsername(), $this->getPassword(), 'Text');
        
        return $client;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
