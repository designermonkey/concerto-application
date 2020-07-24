<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

class DummyModel extends Model
{
    protected string $badger;

    public function __construct(string $badger = null)
    {
        if (null !== $badger) {
            $this->badger = $badger;
        }
    }
}
