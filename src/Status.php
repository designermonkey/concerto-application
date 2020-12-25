<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Jorpo\Enum\Enum;

class Status extends Enum
{
    public const CREATED = 'created';
    public const NOT_CREATED = 'not-created';

    public const FOUND = 'found';
    public const NOT_FOUND = 'not-found';

    public const CHANGED = 'changed';
    public const NOT_CHANGED = 'not-changed';

    public const REMOVED = 'removed';
    public const NOT_REMOVED = 'not-removed';

    public const COLLECTION = 'collection';
    public const EMPTY = 'empty';

    public const NOTIFICATIONS = 'notifications';
}
