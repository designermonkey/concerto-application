<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Jorpo\Concerto\Application\Status;
use Jorpo\ObjectAccess\ImmutableObjectAccessTrait;

/**
 * The properties of a response payload work in tandem with the status, which tells
 * us which property to access.
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ResponsePayload
{
    use ImmutableObjectAccessTrait;
    
    protected Status $status;

    protected Model $created;
    protected Model $notCreated;

    protected Model $found;
    protected Model $notFound;

    protected Model $changed;
    protected Model $notChanged;

    protected Model $removed;
    protected Model $notRemoved;

    protected Models $collection;
    protected Models $empty;

    protected Models $notifications;
    protected Model $exception;

    public function __construct(Status $status, Model ...$models)
    {
        $this->status = $status;

        $method = (string) $status;

        $models = ($this->shouldBeModelsNotModel($status))
            ? $this->modelsFromArray($models)
            : $this->modelFromArray($models);

        $this->$method = $models;
    }

    public function __call(string $name, $value)
    {
        return @$this->{$name} ?? null;
    }

    private function shouldBeModelsNotModel(Status $status): bool
    {
        return in_array((string) $status, [Status::COLLECTION, Status::EMPTY, Status::NOTIFICATIONS]);
    }

    private function modelFromArray(array $models): Model
    {
        return array_shift($models);
    }

    private function modelsFromArray(array $models): Models
    {
        return new Models(...$models);
    }
}
