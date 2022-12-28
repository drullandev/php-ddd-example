<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Mooc\Users\Domain\UserName;

interface UserRepository
{
    public function save(User $user): void;

    public function search(UserId $id): ?User;
}
