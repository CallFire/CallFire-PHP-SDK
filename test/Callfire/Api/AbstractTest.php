<?php
namespace test\Integration;

use PHPUnit_Framework_TestCase as TestCase;

abstract class AbstractTest extends TestCase
{
    protected $username;

    protected $password;

    protected $client;

    public function setUp()
    {
        if (empty($_ENV['API_Username']) || empty($_ENV['API_Password'])) {
            $this->markTestSkipped(
                'Integration testing requires API credentials'
            );
        }

        $this->setUsername($_ENV['API_Username']);
        $this->setPassword($_ENV['API_Password']);

        $this->client = \CallFire\Api\DocumentedClient::createClient($this->getUsername(), $this->getPassword());
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
