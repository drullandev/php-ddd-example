<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Users\Domain\User;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Mooc\Users\Domain\UserId;
use CodelyTv\Shared\Domain\Bus\Event\EventBus;

final class UserCreator
{
    public function __construct(private readonly UserRepository $repository, private readonly EventBus $bus)
    {
    }

    public function __invoke(UserId $id, UserName $name): void
    {
        $User = User::create($id, $name);

        $this->repository->save($User);
        $this->bus->publish(...$User->pullDomainEvents());
    }
}
