<?php

namespace Anddye\Filtering;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function filter(Builder $builder, $value): Builder;
}
