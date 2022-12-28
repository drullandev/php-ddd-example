<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Mooc\Users\Domain\UserId;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    public function __construct(private readonly UserId $id, private UserName $name)
    {
    }

    public static function create(UserId $id, UserName $name): self
    {
        $User = new self($id, $name);

        $User->record(new UserCreatedDomainEvent($id->value(), $name->value()));

        return $User;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function rename(UserName $newName): void
    {
        $this->name = $newName;
    }
}
