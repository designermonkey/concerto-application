<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

/**
 * The ResponseBoundary is the interface back to the Delivery layer from the Application layer.
 * It is used by the UseCaseBoundary to return any relevant Models to construct a ViewModel.
 * Implementers of this interface live in the Delivery layer of your software.
 */
interface ResponseBoundary
{
    public function respond(ResponsePayload $payload): void;
}
