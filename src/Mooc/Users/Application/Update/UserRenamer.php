<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Application\Update;

use CodelyTv\Mooc\Users\Application\Find\UserFinder;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Users\Domain\UserId;
use CodelyTv\Mooc\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\Bus\Event\EventBus;

final class UserRenamer
{
    private readonly UserFinder     $finder;

    public function __construct(private readonly UserRepository $repository, private readonly EventBus $bus)
    {
        $this->finder = new UserFinder($repository);
    }

    public function __invoke(UserId $id, UserName $newName): void
    {
        $User = $this->finder->__invoke($id);

        $User->rename($newName);

        $this->repository->save($User);
        $this->bus->publish(...$User->pullDomainEvents());
    }
}
