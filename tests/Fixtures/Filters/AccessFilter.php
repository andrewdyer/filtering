<?php

namespace Anddye\Filtering\Tests\Fixtures\Filters;

use Anddye\Filtering\Filter;
use Illuminate\Database\Eloquent\Builder;

class AccessFilter extends Filter
{
    public function filter(Builder $builder, $value): Builder
    {
        if ($value = $this->resolveFilterValue($value)) {
            $builder->where('free', $value);
        }

        return $builder;
    }

    protected function mappings(): array
    {
        return [
            'free' => true,
            'premium' => false,
        ];
    }
}
