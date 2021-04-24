<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

use Countable;
use DomainException;

class Issues extends DomainException implements Countable
{
    private Models $issues;

    public function __construct(Issue ...$issues)
    {
        $this->issues = new Models(...$issues);

        parent::__construct('Issues were found in the domain model.', 1);
    }

    public function add(Issue $issue): void
    {
        $this->issues->push($issue);
    }

    public function getIssues(): Models
    {
        return $this->issues;
    }

    public function count(): int
    {
        return $this->issues->count();
    }
}
