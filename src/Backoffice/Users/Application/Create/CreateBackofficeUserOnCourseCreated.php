<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Application\Create;

use CodelyTv\Mooc\Users\Domain\UserCreatedDomainEvent;
use CodelyTv\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class CreateBackofficeUserOnUserCreated implements DomainEventSubscriber
{
    public function __construct(private readonly BackofficeUserCreator $creator)
    {
    }

    public static function subscribedTo(): array
    {
        return [UserCreatedDomainEvent::class];
    }

    public function __invoke(UserCreatedDomainEvent $event): void
    {
        $this->creator->create($event->aggregateId(), $event->name());
    }
}
