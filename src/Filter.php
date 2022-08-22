<?php

namespace Anddye\Filtering;

use Illuminate\Support\Arr;

abstract class Filter implements FilterInterface
{
    protected function mappings(): array
    {
        return [];
    }

    protected function resolveFilterValue(string $key)
    {
        return Arr::get($this->mappings(), $key);
    }
}
