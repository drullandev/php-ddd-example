<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Application\SearchAll;

use CodelyTv\Backoffice\Users\Application\BackofficeUserResponse;
use CodelyTv\Backoffice\Users\Application\BackofficeUsersResponse;
use CodelyTv\Backoffice\Users\Domain\BackofficeUser;
use CodelyTv\Backoffice\Users\Domain\BackofficeUserRepository;
use function Lambdish\Phunctional\map;

final class AllBackofficeUsersSearcher
{
    public function __construct(private readonly BackofficeUserRepository $repository)
    {
    }

    public function searchAll(): BackofficeUsersResponse
    {
        return new BackofficeUsersResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static fn (BackofficeUser $user) => new BackofficeUserResponse(
            $user->id(),
            $user->name()
        );
    }
}
