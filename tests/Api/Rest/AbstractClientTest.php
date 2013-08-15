<?php
namespace CallFire\Api\Rest;

use PHPUnit_Framework_TestCase as TestCase;

use DOMDocument;
use DOMXPath;

class ClientTest extends TestCase
{
    public function testGet()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->once())
            ->method('setOption')
            ->with(
                CURLOPT_URL,
                '/test'
            );
        $http->expects($this->once())
            ->method('execute');

        $client->get('/test');
    }

    public function testGetWithRequest()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->once())
            ->method('setOption')
            ->with(
                CURLOPT_URL,
                '/test?A=a&B=b&C=c'
            );
        $http->expects($this->once())
            ->method('execute');

        $request = new Request\MockRequest;

        $client->get('/test', $request);
    }

    public function testPost()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->at(0))
            ->method('setOption')
            ->with(CURLOPT_POST, true);
        $http->expects($this->at(1))
            ->method('setOption')
            ->with(CURLOPT_URL, '/test');
        $http->expects($this->once())
            ->method('execute');

        $client->post('/test');
    }

    public function testPostWithRequest()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->at(0))
            ->method('setOption')
            ->with(CURLOPT_POST, true);
        $http->expects($this->at(1))
            ->method('setOption')
            ->with(CURLOPT_URL, '/test');
        $http->expects($this->at(2))
            ->method('setOption')
            ->with(CURLOPT_POSTFIELDS, 'A=a&B=b&C=c');
        $http->expects($this->once())
            ->method('execute');

        $request = new Request\MockRequest;

        $client->post('/test', $request);
    }

    public function testPostWithRequestArray()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->at(0))
            ->method('setOption')
            ->with(CURLOPT_POST, true);
        $http->expects($this->at(1))
            ->method('setOption')
            ->with(CURLOPT_URL, '/test');
        $http->expects($this->at(2))
            ->method('setOption')
            ->with(CURLOPT_POSTFIELDS, 'A=a&B=b+b2+b3&C=c');
        $http->expects($this->once())
            ->method('execute');

        $request = new Request\MockRequest;
        $request->setB(array(
            'b',
            'b2',
            'b3'
        ));

        $client->post('/test', $request);
    }

    public function testPut()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->at(0))
            ->method('setOption')
            ->with(CURLOPT_CUSTOMREQUEST, 'PUT');
        $http->expects($this->at(1))
            ->method('setOption')
            ->with(CURLOPT_URL, '/test');
        $http->expects($this->once())
            ->method('execute');

        $client->put('/test');
    }

    public function testPutWithRequest()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->at(0))
            ->method('setOption')
            ->with(CURLOPT_CUSTOMREQUEST, 'PUT');
        $http->expects($this->at(1))
            ->method('setOption')
            ->with(CURLOPT_URL, '/test');
        $http->expects($this->at(2))
            ->method('setOption')
            ->with(CURLOPT_POSTFIELDS, 'A=a&B=b&C=c');
        $http->expects($this->once())
            ->method('execute');

        $request = new Request\MockRequest;

        $client->put('/test', $request);
    }

    public function testPutWithRequestArray()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->at(0))
            ->method('setOption')
            ->with(CURLOPT_CUSTOMREQUEST, 'PUT');
        $http->expects($this->at(1))
            ->method('setOption')
            ->with(CURLOPT_URL, '/test');
        $http->expects($this->at(2))
            ->method('setOption')
            ->with(CURLOPT_POSTFIELDS, 'A=a&B=b+b2+b3&C=c');
        $http->expects($this->once())
            ->method('execute');

        $request = new Request\MockRequest;
        $request->setB(array(
            'b',
            'b2',
            'b3'
        ));

        $client->put('/test', $request);
    }
    
    public function testDelete()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->at(0))
            ->method('setOption')
            ->with(CURLOPT_CUSTOMREQUEST, 'DELETE');
        $http->expects($this->at(1))
            ->method('setOption')
            ->with(CURLOPT_URL, '/test');
        $http->expects($this->once())
            ->method('execute');

        $client->delete('/test');
    }
    
    public function testDeleteWithRequest()
    {
        $client = $this->getMockClient();
        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http->expects($this->at(0))
            ->method('setOption')
            ->with(CURLOPT_CUSTOMREQUEST, 'DELETE');
        $http->expects($this->at(1))
            ->method('setOption')
            ->with(CURLOPT_URL, '/test');
        $http->expects($this->at(2))
            ->method('setOption')
            ->with(CURLOPT_POSTFIELDS, 'A=a&B=b&C=c');
        $http->expects($this->once())
            ->method('execute');

        $request = new Request\MockRequest;

        $client->delete('/test', $request);
    }

    public function testBuildQuery()
    {
        $client = $this->getMockClient();
        $request = new Request\MockRequest;

        $query = $client->buildQuery('foo', $request->getQuery());

        $this->assertEquals('foo?A=a&B=b&C=c', $query);
    }

    /**
     * testBuildPostData
     *
     * @dataProvider postRequestProvider
     */
    public function testBuildPostData($request, $expected)
    {
        $client = $this->getMockClient();

        $query = $client->buildPostData($request->getQuery());

        $this->assertEquals($expected, $query);
    }

    public function testBasePath()
    {
        $client = $this->getMockClient();
        $client->setBasePath('foo');

        $basePath = $client->getBasePath();
        $this->assertEquals('foo', $basePath);
    }

    public function testUsername()
    {
        $client = $this->getMockClient();
        $client->setUsername('foo');

        $username = $client->getUsername();
        $this->assertEquals('foo', $username);
    }

    public function testPassword()
    {
        $client = $this->getMockClient();
        $client->setPassword('foo');

        $password = $client->getPassword();
        $this->assertEquals('foo', $password);
    }

    public function testHttp()
    {
        $client = $this->getMockClient();

        $http = $client->getHttp();
        $this->assertInstanceOf('CallFire\Api\Rest\Http\Curl', $http);

        $http = $this->getMockHttp();
        $client->setHttp($http);

        $http = $client->getHttp();
        $this->assertInstanceOf('CallFire\Api\Rest\Http\Request', $http);
        $this->assertNotInstanceOf('CallFire\Api\Rest\Http\Curl', $http);
    }

    /**
     * Test construction of parametrized URIs
     *
     * @dataProvider uriProvider
     */
    public function testGetUri($path, $parameters, $expected)
    {
        $client = $this->getMockClient();
        $result = $client->getUri($path, $parameters);

        $this->assertEquals($expected, $result);
    }

    public function uriProvider()
    {
        $data = array();

        $fixture = new DOMDocument;
        $fixture->load(__DIR__.'/fixtures/uri.xml');
        $xpath = new DOMXPath($fixture);

        foreach ($xpath->query('/fixture/uri') as $uri) {
            $uriData = array();
            $uriData[] = $xpath->query('path', $uri)->item(0)->textContent;

            $parameters = $xpath->query('parameters/parameter', $uri);
            $parametersData = array();
            foreach ($parameters as $parameter) {
                $parametersData[] = $parameter->textContent;
            }
            $uriData[] = $parametersData;

            $uriData[] = $xpath->query('result', $uri)->item(0)->textContent;
            $data[] = $uriData;
        }

        return $data;
    }

    public function postRequestProvider()
    {
        $data = array();
        $request = new Request\MockRequest;

        $data[] = array(
            $request,
            'A=a&B=b&C=c'
        );

        $arrayRequest = clone $request;
        $arrayRequest->setB(array(
            'b',
            'b2',
            'b3'
        ));
        $data[] = array(
            $arrayRequest,
            'A=a&B=b+b2+b3&C=c'
        );

        return $data;
    }

    protected function getMockClient()
    {
        return $this->getMockForAbstractClass('CallFire\Api\Rest\AbstractClient');
    }

    protected function getMockHttp()
    {
        return $this->getMock("CallFire\Api\Rest\Http\Request");
    }
}
