<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

/**
 * @template TModel of Model
 */
interface RequestBoundary
{
    /**
     * @param TModel $requestModel
     */
    public function execute(Model $requestModel, ResponseBoundary $boundary): void;
}
