<?php

namespace Anddye\Filtering\Tests;

use Anddye\Filtering\Tests\Fixtures\Filters\AccessFilter;
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
}
