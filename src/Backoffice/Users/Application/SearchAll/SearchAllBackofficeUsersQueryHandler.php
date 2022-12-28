<?php

declare(strict_types=1);

namespace CodelyTv\Backoffice\Users\Application\SearchAll;

use CodelyTv\Backoffice\Users\Application\BackofficeUsersResponse;
use CodelyTv\Shared\Domain\Bus\Query\QueryHandler;

final class SearchAllBackofficeUsersQueryHandler implements QueryHandler
{
    public function __construct(private readonly AllBackofficeUsersSearcher $searcher)
    {
    }

    public function __invoke(SearchAllBackofficeUsersQuery $query): BackofficeUsersResponse
    {
        return $this->searcher->searchAll();
    }
}
