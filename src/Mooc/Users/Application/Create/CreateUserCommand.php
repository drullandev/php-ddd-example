<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Application\Create;

use CodelyTv\Shared\Domain\Bus\Command\Command;

final class CreateUserCommand implements Command
{
    public function __construct(private readonly string $id, private readonly string $name)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

}
