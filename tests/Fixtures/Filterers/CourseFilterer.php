<?php

namespace Anddye\Filtering\Tests\Fixtures\Filterers;

use Anddye\Filtering\Filterer;
use Anddye\Filtering\Tests\Fixtures\Filters\AccessFilter;
use Anddye\Filtering\Tests\Fixtures\Ordering\ViewsOrder;

class CourseFilterer extends Filterer
{
    protected array $filters = [
        'access' => AccessFilter::class,
        'views' => ViewsOrder::class,
    ];
}
