<?php

namespace Anddye\Filtering;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    abstract public function filter(Builder $builder, $value): Builder;
}
