<?php

namespace Anddye\Filtering;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

abstract class Filterer
{
    protected array $filters;

    public function addFilters(array $filters): self
    {
        $this->filters = array_merge($this->filters, $filters);

        return $this;
    }

    public function filter(Builder $builder, array $filters = []): Builder
    {
        foreach ($this->getFilteredFilters($filters) as $filter => $class) {
            $this->resolveFilter($filter);
        }

        return $builder;
    }

    private function getFilteredFilters(array $filters): array
    {
        $filteredFilters = [];

        $placeholder = new \stdClass();

        foreach (array_keys($this->filters) as $key) {
            $value = Arr::get($filters, $key, $placeholder);

            if ($value !== $placeholder) {
                Arr::set($filteredFilters, $key, $value);
            }
        }

        return array_filter($filteredFilters);
    }

    private function resolveFilter(string $filter)
    {
        if ($class = Arr::get($this->filters, $filter)) {
            return new $class();
        }

        throw new UnresolvedFilterException();
    }
}
