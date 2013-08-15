<?php
namespace CallFire\Common;

use CallFire\Common\Subscription;

use PHPUnit_Framework_TestCase as TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * Test event request validity verification
     *
     * @dataProvider provideRequestData
     *
     * @param array $requestData
     */
    public function testIsEventRequest($requestData, $expected)
    {
        $result = Subscription::is_event_request($requestData);
        $this->assertEquals($expected, $result);
    }

    /**
     * Test instantiation of each subscription notification
     * type.
     *
     * @dataProvider provideNotificationFixtures
     *
     * @param string $notificationType
     * @param string $fixture
     * @param string $format
     */
    public function testNotificationInstantiation($notificationType, $fixture, $format)
    {
        $event = Subscription::event($fixture, $format);
        $this->assertInstanceOf("CallFire\Common\Subscription\\{$notificationType}", $event);
    }

    public function provideRequestData()
    {
        $data = array();

        foreach (glob(__DIR__.'/Subscription/fixtures/*.request-data.php') as $filename) {
            $data[] = array(
                include $filename,
                Subscription::FORMAT_XML
            );
        }

        return $data;
    }

    public function provideNotificationFixtures()
    {
        $data = array();
        foreach (glob(__DIR__.'/Subscription/fixtures/*.notification.xml') as $filename) {
            $data[] = array(basename($filename, '.notification.xml'), file_get_contents($filename), Subscription::FORMAT_XML);
        }

        return $data;
    }
}
