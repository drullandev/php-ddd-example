<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Application;

use CodelyTv\Shared\Domain\Bus\Query\Response;

final class BackofficeUsersResponse implements Response
{
    private readonly array $users;

    public function __construct(BackofficeUsersResponse ...$users)
    {
        $this->users = $users;
    }

    public function users(): array
    {
        return $this->users;
    }
}
