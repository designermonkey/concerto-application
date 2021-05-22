<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Countable;
use Ds\Vector;
use IteratorAggregate;
use IteratorIterator;
use Traversable;
use UnderflowException;

class Models implements IteratorAggregate, Countable
{
    /**
     * @var Vector<Model>
     */
    private Vector $models;

    public function __construct(Model ...$models)
    {
        $this->models = new Vector($models);
    }

    public function push(Model $model): void
    {
        $this->models->push($model);
    }

    /**
     * @throws UnderflowException
     */
    public function pop(): Model
    {
        return $this->models->pop();
    }

    /**
     * @return Traversable<int, Model>
     */
    public function getIterator(): Traversable
    {
        return new IteratorIterator($this->models);
    }

    public function count()
    {
        return $this->models->count();
    }
}
