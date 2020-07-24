<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Jorpo\Concerto\Application\Model;

class Notification extends Model
{
    protected string $message;
    protected ?string $key;
    protected ?Model $source;

    public function __construct(string $message, string $key = null, Model $source = null)
    {
        $this->message = $message;
        $this->key = $key;
        $this->source = $source;
    }
}
