<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use IteratorAggregate;
use Jorpo\Concerto\Application\Status;
use Jorpo\ObjectAccess\ImmutableObjectAccess;
use Traversable;

/**
 * @template TModel of Model
 */
class ResponsePayload implements IteratorAggregate
{
    use ImmutableObjectAccess;

    protected Status $status;
    protected Models $models;

    /**
     * @param TModel ...$models
     */
    public function __construct(Status $status, Model ...$models)
    {
        $this->status = $status;
        $this->models = new Models(...$models);
    }

    public function status(): Status
    {
        return $this->status;
    }

    public function getIterator(): Traversable
    {
        return $this->models->getIterator();
    }
}
