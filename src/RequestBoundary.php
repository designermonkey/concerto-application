<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

interface RequestBoundary
{
    public function execute(Model $requestModel, ResponseBoundary $boundary): void;
}
