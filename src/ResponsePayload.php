<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use IteratorAggregate;
use Jorpo\Concerto\Application\Status;
use Jorpo\ObjectAccess\ImmutableObjectAccess;
use Traversable;

class ResponsePayload implements IteratorAggregate
{
    use ImmutableObjectAccess;

    protected Status $status;
    protected Model $requestModel;
    protected Models $models;

    public function __construct(Status $status, Model $requestModel, Model ...$models)
    {
        $this->status = $status;
        $this->requestModel = $requestModel;
        $this->models = new Models(...$models);
    }

    public function status(): Status
    {
        return $this->status;
    }

    public function requestModel(): Model
    {
        return $this->requestModel;
    }

    public function getIterator(): Traversable
    {
        return $this->models->getIterator();
    }
}
