<?php
namespace CallFire\Common\Subscription;

use CallFire\Common\Subscription;

use PHPUnit_Framework_TestCase as TestCase;

class TextNotificationTest extends TestCase
{
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
        $this->expectOutputString('');
    
        $event = Subscription::event($fixture, $format);
        $this->assertInstanceOf("CallFire\Common\Subscription\\{$notificationType}", $event);
        
        $text = $event->getText();
        $this->assertInstanceOf("CallFire\Common\Resource\Text", $text);
        
        $this->assertNotNull($text->getMessage());
        $this->assertNotNull($text->getId());
        $this->assertNotNull($text->getToNumber());
        $this->assertNotNull($text->getState());
        $this->assertNotNull($text->getCreated());
        $this->assertNotNull($text->getModified());
        $this->assertNotNull($text->getFinalResult());
        
        $this->assertNotEmpty($text->getTextRecords());
    }

    public function provideNotificationFixtures()
    {
        $data = array();
        foreach (glob(__DIR__.'/fixtures/TextNotification.notification.xml') as $filename) {
            $data[] = array(basename($filename, '.notification.xml'), file_get_contents($filename), Subscription::FORMAT_XML);
        }

        return $data;
    }
}
