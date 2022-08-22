<?php

namespace Anddye\Filtering\Tests\Fixtures\Filters;

use Anddye\Filtering\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class DifficultyFilter implements FilterInterface
{
    public function filter(Builder $builder, $value): Builder
    {
        return $builder;
    }
}
