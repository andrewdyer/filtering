<?php

namespace Anddye\Filtering\Tests;

use Anddye\Filtering\Tests\Fixtures\Filters\AccessFilter;
use Anddye\Filtering\Tests\Fixtures\Ordering\ViewsOrder;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

final class FilterTest extends TestCase
{
    public function testResolveFilterValue(): void
    {
        $filter = new AccessFilter();

        $class = new ReflectionClass($filter);
        $method = $class->getMethod('resolveFilterValue');
        $method->setAccessible(true);

        $this->assertEquals(true, $method->invokeArgs($filter, ['free']));
        $this->assertEquals(false, $method->invokeArgs($filter, ['premium']));
        $this->assertEquals(null, $method->invokeArgs($filter, ['hello-world']));
    }

    public function testResolveOrderDirection(): void
    {
        $filter = new ViewsOrder();

        $class = new ReflectionClass($filter);
        $method = $class->getMethod('resolveOrderDirection');
        $method->setAccessible(true);

        $this->assertEquals('desc', $method->invokeArgs($filter, ['desc']));
        $this->assertEquals('asc', $method->invokeArgs($filter, ['asc']));
        $this->assertEquals(null, $method->invokeArgs($filter, ['latest']));
    }
}
