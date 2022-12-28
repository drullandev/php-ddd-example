<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Application\Create;

use CodelyTv\Backoffice\Users\Domain\BackofficeUser;
use CodelyTv\Backoffice\Users\Domain\BackofficeUserRepository;

final class BackofficeUserCreator
{
    public function __construct(private readonly BackofficeUserRepository $repository)
    {
    }

    public function create(string $id, string $name): void
    {
        $this->repository->save(new BackofficeUser($id, $name));
    }
}
