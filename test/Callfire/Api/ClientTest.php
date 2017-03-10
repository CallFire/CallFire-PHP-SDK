<?php
namespace test\Integration;


class ClientTest extends AbstractTest
{

    public function testQueryCallBroadcastsWithoutResponseParsing()
    {
        $request = $this->client->findCallBroadcasts();
        $response = $this->client->request($request);

        echo $response->getBody();
    }

    //TO DO: uncomment when responses parsing issues will be fixed in php swagger client
    //Also add some tests for checking parsed responses
    /*public function testQueryCallBroadcastsWithResponseParsing()
    {
        $request = $this->getClient()->findCallBroadcasts();
        $result = $this->client->execute($request);

        var_dump($this->client->getHttpClient()->getLastRawRequest());
        var_dump($result);
    }*/

    public function testFindCalls()
    {
        $request = $this->client->findCalls();

        $queryParameters = array('fields' => 'items(id)', 'limit' => 1, 'offset' => 0);
        $request->getOperationConfig()->setQueryParameters($queryParameters);

        $response = $this->client->request($request);
        echo $response->getBody();
    }

    public function testCreateCallBroadcast()
    {
        $request = $this->client->createCallBroadcast();

        $queryParameters = array('start' => false);
        $body = '{
                    "name": "TEST Voice Broadcast from Php sdk",
                    "status": "FINISHED",
                    "localTimeRestriction": {
                        "enabled": false,
                        "beginHour": 8,
                        "beginMinute": 0,
                        "endHour": 21,
                        "endMinute": 0
                    },
                    "maxActive": 100,
                    "recipients" : [ {
                        "phoneNumber": "12132041238"
                    }],
                    "answeringMachineConfig": "LIVE_WITH_AMD",
                    "sounds" : {
                        "liveSoundText": "Hello PHP!!!!"
                    },
                    "resumeNextDay" : true
                 }';
        $request->getOperationConfig()->setQueryParameters($queryParameters);
        $request->getOperationConfig()->setBodyParameter($body);
        $request->getOperationConfig()->setHeaderParameters(array('Content-Type' => 'application/json'));

        $response = $this->client->request($request);
        echo $response->getBody();
    }

    public function testUploadSound()
    {
        $request = $this->client->postFileCampaignSound();
        $request->getOperationConfig()->setFileUpload(__dir__.'\train1.mp3', 'file');
        $response = $this->client->request($request);
        echo $response->getBody();
    }

    public function testCreateAndDeleteContact()
    {
        $request = $this->client->createContacts();

        $body = '[{
                  "firstName": "testFirstNameFromPhp",
                  "lastName": "testLastNameFromPhp",
                  "zipcode": "90025",
                  "homePhone": "12132212384"
                 }]';
        $request->getOperationConfig()->setBodyParameter($body);
        $request->getOperationConfig()->setHeaderParameters(array('Content-Type' => 'application/json'));
        $response = $this->client->request($request);
        echo $response->getBody();

        $contactId = $this->getCreatedContactId($response->getBody());

        $deleteRequest = $this->client->deleteContact();
        $deleteRequest->getOperationConfig()->setPathParameters(array('id' => $contactId));
        $deleteRequest->getOperationConfig()->setHeaderParameters(array('Content-Type' => 'application/json'));
        $response = $this->client->request($deleteRequest);
        echo $response;
    }

    function getCreatedContactId($response) {
        $firstPart = '{"items":[{"id":';
        $remainedPart = substr($response, strlen($firstPart));
        return substr($remainedPart, 0, strpos($remainedPart, '}]}'));
    }

}

