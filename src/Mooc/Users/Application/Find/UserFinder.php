<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Application\Find;

use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserNotExist;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Mooc\Users\Domain\UserId;

final class UserFinder
{
    public function __construct(private readonly UserRepository $repository)
    {
    }

    public function __invoke(UserId $id): User
    {
        $User = $this->repository->search($id);

        if (null === $User) {
            throw new UserNotExist($id);
        }

        return $User;
    }
}
