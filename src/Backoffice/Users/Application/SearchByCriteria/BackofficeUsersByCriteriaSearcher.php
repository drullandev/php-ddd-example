<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Application\SearchByCriteria;

use CodelyTv\Backoffice\Users\Application\BackofficeUserResponse;
use CodelyTv\Backoffice\Users\Application\BackofficeUsersResponse;
use CodelyTv\Backoffice\Users\Domain\BackofficeUser;
use CodelyTv\Backoffice\Users\Domain\BackofficeUserRepository;
use CodelyTv\Shared\Domain\Criteria\Criteria;
use CodelyTv\Shared\Domain\Criteria\Filters;
use CodelyTv\Shared\Domain\Criteria\Order;
use function Lambdish\Phunctional\map;

final class BackofficeUsersByCriteriaSearcher
{
    public function __construct(private readonly BackofficeUserRepository $repository)
    {
    }

    public function search(Filters $filters, Order $order, ?int $limit, ?int $offset): BackofficeUsersResponse
    {
        $criteria = new Criteria($filters, $order, $offset, $limit);

        return new BackofficeUsersResponse(...map($this->toResponse(), $this->repository->matching($criteria)));
    }

    private function toResponse(): callable
    {
        return static fn (BackofficeUser $User) => new BackofficeUserResponse(
            $User->id(),
            $User->name()
        );
    }
}
