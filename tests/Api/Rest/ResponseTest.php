<?php
namespace CallFire\Api\Rest\Response;

use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMNode;

class ResponseTest extends TestCase
{
    /**
     * Test resolving/parsing of response XML into response
     * objects.
     *
     * @dataProvider provideResponseFixtures
     *
     * @param string $responseType
     * @param string $fixture
     */
    public function testResponseFixtures($responseType, $fixture)
    {
        $client = $this->getMockClient();

        $response = $client::response($fixture);
        $this->assertInstanceOf("CallFire\Api\Rest\Response\\{$responseType}", $response);
    }

    /**
     * Tests parsing of fixtures into resource nodes
     *
     * @dataProvider provideResourceFixtures
     *
     * @param string  $resourceName
     * @param DOMNode $resourceNode
     */
    public function testParseResourceNode($resourceName, $resourceNode)
    {
        $response = $this->getMockResponse();
        $response->setXPath($response::createXPath($resourceNode->ownerDocument));
        $resource = $response->parseResourceNode($resourceNode);

        if (class_exists($resourceName)) {
            $this->assertInstanceOf($resourceName, $resource);
        } else {
            $this->assertFalse($resource);
        }
    }

    public function provideResponseFixtures()
    {
        $data = array();
        foreach (glob(__DIR__.'/Response/fixtures/*.response.xml') as $fixture) {
            $data[] = array(
                basename($fixture, '.response.xml'),
                file_get_contents($fixture)
            );
        }

        return $data;
    }

    public function provideResourceFixtures()
    {
        $data = array();
        $response = $this->getMockResponse();
        foreach (glob(__DIR__.'/Response/fixtures/*.resource.xml') as $fixture) {
            $fixtureName = basename($fixture, ".xml");
            list($className, $resourceType) = (explode('.', $fixtureName) + array_fill(0, 2, null));
            $qualifiedClassName = "CallFire\Common\Resource\\{$className}";

            $document = new DOMDocument;
            $document->load($fixture);
            $xpath = $response::createXPath($document);
            $contextNode = $xpath->query('/r:Resource')->item(0);
            $resourceNode = $xpath->query('*[1]', $contextNode)->item(0);

            $data[] = array(
                $qualifiedClassName,
                $resourceNode
            );
        }

        return $data;
    }

    public function getMockClient()
    {
        $client = $this->getMockForAbstractClass('CallFire\Api\Rest\AbstractClient');

        return $client;
    }

    public function getMockResponse()
    {
        $response = $this->getMockForAbstractClass('CallFire\Api\Rest\Response');

        return $response;
    }
}
