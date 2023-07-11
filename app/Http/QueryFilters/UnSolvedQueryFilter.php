<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class UnSolvedQueryFilter implements Filter
{

    /**
     * @inheritDoc
     */
    public function __invoke(Builder $query, $value, string $property): void
    {
        $query->whereNull('solution_post_id');
    }
}
