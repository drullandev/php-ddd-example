<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Users\Domain;

use CodelyTv\Shared\Domain\Bus\Event\DomainEvent;

final class UserCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        string $id,
        private readonly string $name,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'User.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['name'], $eventId, $occurredOn);
    }

    public function toPrimitives(): array
    {
        return [
            'name'     => $this->name,
        ];
    }

    public function name(): string
    {
        return $this->name;
    }

}
