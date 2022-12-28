<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Application\SearchByCriteria;

use CodelyTv\Backoffice\Users\Application\BackofficeUsersResponse;
use CodelyTv\Backoffice\Users\Application\SearchByCriteria\SearchBackofficeUsersByCriteriaQuery;
use CodelyTv\Shared\Domain\Bus\Query\QueryHandler;
use CodelyTv\Shared\Domain\Criteria\Filters;
use CodelyTv\Shared\Domain\Criteria\Order;

final class SearchBackofficeUsersByCriteriaQueryHandler implements QueryHandler
{
    public function __construct(private readonly BackofficeUsersByCriteriaSearcher $searcher)
    {
    }

    public function __invoke(SearchBackofficeUsersByCriteriaQuery $query): BackofficeUsersResponse
    {
        $filters = Filters::fromValues($query->filters());
        $order   = Order::fromValues($query->orderBy(), $query->order());

        return $this->searcher->search($filters, $order, $query->limit(), $query->offset());
    }
}
