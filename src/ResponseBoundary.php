<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

/**
 * @template TResponseModel
 * @template TResponsePayload of ResponsePayload<TResponseModel>
 */
interface ResponseBoundary
{
    /**
     * @param TResponsePayload $payload
     */
    public function respond(ResponsePayload $payload): void;
}
