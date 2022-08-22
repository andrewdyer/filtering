<?php

namespace Anddye\Filtering;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

abstract class Filter
{
    abstract public function filter(Builder $builder, $value): Builder;

    protected function mappings(): array
    {
        return [];
    }

    protected function resolveFilterValue(string $key)
    {
        return Arr::get($this->mappings(), $key);
    }
}
