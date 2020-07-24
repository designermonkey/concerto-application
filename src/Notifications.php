<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Countable;
use Ds\Set;
use IteratorAggregate;
use RuntimeException;
use Traversable;

class Notifications extends RuntimeException implements IteratorAggregate, Countable
{
    private Set $notifications;

    public function __construct(Notification ...$notifications)
    {
        $this->notifications = new Set($notifications);
    }

    public function add(Notification $notification): void
    {
        $this->notifications->add($notification);
    }

    public function getIterator(): Traversable
    {
        return $this->notifications;
    }

    public function count(): int
    {
        return $this->notifications->count();
    }
}
