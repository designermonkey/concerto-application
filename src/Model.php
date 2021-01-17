<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Ds\Hashable;
use Jorpo\ObjectAccess\ImmutableObjectAccess;
use function get_called_class;
use function get_class;
use function serialize;

abstract class Model implements Hashable
{
    use ImmutableObjectAccess;

    public function hash(): string
    {
        return serialize($this);
    }

    /**
     * @param Hashable $obj
     */
    public function equals($obj): bool
    {
        return get_called_class() === get_class($obj) && $this->hash() === $obj->hash();
    }
}
