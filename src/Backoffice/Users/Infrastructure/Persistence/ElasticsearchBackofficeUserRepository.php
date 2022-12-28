<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Infrastructure\Persistence;

use CodelyTv\Backoffice\Users\Domain\BackofficeUser;
use CodelyTv\Backoffice\Users\Domain\BackofficeUserRepository;
use CodelyTv\Shared\Domain\Criteria\Criteria;
use CodelyTv\Shared\Infrastructure\Persistence\Elasticsearch\ElasticsearchRepository;
use function Lambdish\Phunctional\map;

final class ElasticsearchBackofficeUserRepository extends ElasticsearchRepository implements BackofficeUserRepository
{
    public function save(BackofficeUser $user): void
    {
        $this->persist($user->id(), $user->toPrimitives());
    }

    public function searchAll(): array
    {
        return map($this->toUser(), $this->searchAllInElastic());
    }

    public function matching(Criteria $criteria): array
    {
        return map($this->toUser(), $this->searchByCriteria($criteria));
    }

    protected function aggregateName(): string
    {
        return 'Users';
    }

    private function toUser(): callable
    {
        return static fn (array $primitives) => BackofficeUser::fromPrimitives($primitives);
    }
}
