<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

/**
 * The InputBoundary is the interface from a Delivery layer to the Application.
 * Your Application logic lives inside a InputBoundary implementation.
 * Implementers of this interface live in the Application layer of your software.
 */
interface InputBoundary
{
    public function execute(Model $requestModel, OutputBoundary $boundary): void;
}
