<?php

namespace Anddye\Filtering\Tests\Fixtures\Filters;

use Anddye\Filtering\Filter;
use Illuminate\Database\Eloquent\Builder;

class AccessFilter extends Filter
{
    public function filter(Builder $builder, $value): Builder
    {
        $builder->where('free', $value);

        return $builder;
    }
}
