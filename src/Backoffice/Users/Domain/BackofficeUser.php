<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Domain;

use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class BackofficeUser extends AggregateRoot
{
    public function __construct(private readonly string $id, private readonly string $name)
    {
    }

    public static function fromPrimitives(array $primitives): BackofficeUser
    {
        return new self($primitives['id'], $primitives['name']);
    }

    public function toPrimitives(): array
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name,
        ];
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
