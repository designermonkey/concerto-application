<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Countable;
use Ds\Vector;
use IteratorAggregate;
use IteratorIterator;
use Traversable;
use UnderflowException;

/**
 * @template TModel of Model
 */
class Models implements IteratorAggregate, Countable
{
    private Vector $models;

    /**
     * @param TModel ...$models
     */
    public function __construct(Model ...$models)
    {
        $this->models = new Vector(...$models);
    }

    /**
     * @param TModel ...$models
     */
    public function push(Model $model): void
    {
        $this->models->push($model);
    }

    /**
     * @return TModel
     * @throws UnderflowException
     */
    public function pop(): Model
    {
        /** @var TModel */
        return $this->models->pop();
    }

    public function getIterator(): Traversable
    {
        return new IteratorIterator($this->models);
    }

    public function count()
    {
        return $this->models->count();
    }
}
