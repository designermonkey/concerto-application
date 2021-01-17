<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

interface ResponseBoundary
{
    public function respond(ResponsePayload $payload): void;
}
