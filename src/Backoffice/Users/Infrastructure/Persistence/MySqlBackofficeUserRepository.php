<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Infrastructure\Persistence;

use CodelyTv\Backoffice\Users\Domain\BackofficeUser;
use CodelyTv\Backoffice\Users\Domain\BackofficeUserRepository;
use CodelyTv\Shared\Domain\Criteria\Criteria;
use CodelyTv\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use CodelyTv\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlBackofficeUserRepository extends DoctrineRepository implements BackofficeUserRepository
{
    public function save(BackofficeUser $User): void
    {
        $this->persist($User);
    }

    public function searchAll(): array
    {
        return $this->repository(BackofficeUser::class)->findAll();
    }

    public function matching(Criteria $criteria): array
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria);

        return $this->repository(BackofficeUser::class)->matching($doctrineCriteria)->toArray();
    }
}
