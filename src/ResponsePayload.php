<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Iterator;
use IteratorAggregate;
use IteratorIterator;
use Jorpo\Concerto\Application\Status;
use Jorpo\ObjectAccess\ImmutableObjectAccess;

class ResponsePayload implements IteratorAggregate
{
    use ImmutableObjectAccess;
    
    protected Status $status;
    protected Models $models;

    public function __construct(Status $status, Model ...$models)
    {
        $this->status = $status;
        $this->models = $this->modelsFromArray($models);
    }

    public function status(): Status
    {
        return $this->status;
    }

    public function getIterator(): Iterator
    {
        return new IteratorIterator($this->models);
    }

    private function modelsFromArray(array $models): Models
    {
        return new Models(...$models);
    }
}
