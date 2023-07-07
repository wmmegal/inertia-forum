<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class MineQueryFilter implements Filter
{

    /**
     * @inheritDoc
     */
    public function __invoke(Builder $query, $value, string $property): void
    {
        if (!auth()->check()) {
            return;
        }

        $query->whereBelongsTo(auth()->user());
    }
}
