<?php

namespace Anddye\Filtering\Tests\Fixtures\Ordering;

use Anddye\Filtering\Filter;
use Illuminate\Database\Eloquent\Builder;

class ViewsOrder extends Filter
{
    public function filter(Builder $builder, $value): Builder
    {
        return $builder->orderBy('views', $this->resolveOrderDirection($value));
    }
}
