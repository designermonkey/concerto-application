<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use PHPUnit\Framework\TestCase;
use Traversable;

class NotificationsTest extends TestCase
{
    public function testThatNotificationsAreIterable()
    {
        $subject = new Notifications(
            new Notification('test', 'test1'),
            new Notification('test', 'test2'),
            new Notification('test', 'test3')
        );

        $this->assertInstanceOf(Traversable::class, $subject);

        $count = 0;

        foreach ($subject as $item) {
            $count++;
        }

        $this->assertSame(3, $count);
    }

    public function testThatNotificationsCanBeCounted()
    {
        $subject = new Notifications(
            new Notification('test', 'test1'),
            new Notification('test', 'test2')
        );

        $this->assertCount(2, $subject);
    }

    public function testThatNotificationsCanBeAddedTo()
    {
        $subject = new Notifications(
            new Notification('test', 'test1'),
            new Notification('test', 'test2')
        );

        $this->assertCount(2, $subject);

        $subject->add(new Notification('test', 'test3'));

        $this->assertCount(3, $subject);
    }

    public function testThatNotificationHasProperties()
    {
        $subject = new Notification('test', 'test');

        $this->assertSame('test', $subject->message);
        $this->assertSame('test', $subject->key);
    }

    public function testThatNotificationObjectCnanotHaveMorePropeties()
    {
        $subject = new Notification('test', 'test');
        $subject->badger = 'mushroom';

        $this->assertNull($subject->badger);
    }

    public function testThatNotificationObjectChecksEquality()
    {
        $subjectOne = new Notification('test', 'test');
        $subjectTwo = new Notification('test', 'test');
        $subjectThree = new Notification('mushroom', 'badger');

        $this->assertTrue($subjectOne->equals($subjectTwo));
        $this->assertFalse($subjectOne->equals($subjectThree));
    }
}
