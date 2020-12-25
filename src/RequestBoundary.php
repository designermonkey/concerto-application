<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

/**
 * The RequestBoundary is the interface from a Delivery layer to the Application.
 * Your Application logic lives inside a RequestBoundary implementation.
 * Implementers of this interface live in the Application layer of your software.
 */
interface RequestBoundary
{
    public function execute(Model $requestModel, ResponseBoundary $boundary): void;
}
