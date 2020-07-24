<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Jorpo\Enum\Enum;

class Status extends Enum
{
    public const CREATED = 'created';
    public const NOT_CREATED = 'notCreated';

    public const FOUND = 'found';
    public const NOT_FOUND = 'notFound';

    public const CHANGED = 'changed';
    public const NOT_CHANGED = 'notChanged';

    public const REMOVED = 'removed';
    public const NOT_REMOVED = 'notRemoved';

    public const COLLECTION = 'collection';
    public const EMPTY = 'empty';

    public const NOTIFICATIONS = 'notifications';
    public const EXCEPTION = 'exception';
}
