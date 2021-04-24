<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Throwable;
use Jorpo\Concerto\Application\Model;

class Issue extends Model
{
    protected string $message;
    protected string $key;
    protected ?Throwable $error;

    public function __construct(string $message, string $key, Throwable $error = null)
    {
        $this->message = $message;
        $this->key = $key;
        $this->error = $error;
    }
}
