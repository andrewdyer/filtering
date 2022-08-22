<?php

namespace Anddye\Filtering\Tests\Fixtures\Filters;

use Anddye\Filtering\Filter;
use Illuminate\Database\Eloquent\Builder;

class DifficultyFilter extends Filter
{
    public function filter(Builder $builder, $value): Builder
    {
        return $builder;
    }
}
