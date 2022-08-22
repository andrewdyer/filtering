<?php

namespace Anddye\Filtering\Tests\Fixtures\Models;

use Anddye\Filtering\Tests\Fixtures\Filterers\CourseFilterer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function scopeFilter(Builder $builder, array $filters = []): Builder
    {
        return (new CourseFilterer())->filter($builder, $filters);
    }
}
