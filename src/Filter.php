<?php

namespace Anddye\Filtering;

use Illuminate\Support\Arr;

abstract class Filter implements FilterInterface
{
    protected function mappings(): array
    {
        return [];
    }

    protected function ordering(): array
    {
        return ['desc' => 'desc', 'asc' => 'asc'];
    }

    protected function resolveFilterValue(string $key)
    {
        return Arr::get($this->mappings(), $key);
    }

    protected function resolveOrderDirection(string $key)
    {
        return Arr::get($this->ordering(), $key);
    }
}
