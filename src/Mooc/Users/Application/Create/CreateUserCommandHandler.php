<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Application\Create;

use CodelyTv\Mooc\Users\Domain\UserDuration;
use CodelyTv\Mooc\Users\Domain\UserName;
use CodelyTv\Mooc\Shared\Domain\Users\UserId;
use CodelyTv\Shared\Domain\Bus\Command\CommandHandler;

final class CreateUserCommandHandler implements CommandHandler
{
    public function __construct(private readonly UserCreator $creator)
    {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $id       = new UserId($command->id());
        $name     = new UserName($command->name());
        $duration = new UserDuration($command->duration());

        $this->creator->__invoke($id, $name, $duration);
    }
}
