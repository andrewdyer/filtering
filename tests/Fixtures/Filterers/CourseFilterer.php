<?php

namespace Anddye\Filtering\Tests\Fixtures\Filterers;

use Anddye\Filtering\Filterer;
use Anddye\Filtering\Tests\Fixtures\Filters\AccessFilter;

class CourseFilterer extends Filterer
{
    protected array $filters = [
        'access' => AccessFilter::class,
    ];
}
