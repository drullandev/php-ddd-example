<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Shared\Domain\DomainError;

final class UserNotExist extends DomainError
{
    public function __construct(private readonly UserId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'User_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The User <%s> does not exist', $this->id->value());
    }
}
