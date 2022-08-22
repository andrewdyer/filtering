<?php

namespace Anddye\Filtering\Tests;

use Anddye\Filtering\Tests\Fixtures\Filterers\CourseFilterer;
use Anddye\Filtering\Tests\Fixtures\Filters\AccessFilter;
use Anddye\Filtering\UnresolvedFilterException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

final class FiltererTest extends TestCase
{
    public function testCanGetFilteredFilters(): void
    {
        $filterer = new CourseFilterer();

        $class = new ReflectionClass($filterer);
        $method = $class->getMethod('getFilteredFilters');
        $method->setAccessible(true);

        $result = $method->invokeArgs($filterer, [['access' => 'free', 'hello' => 'world', '' => '']]);

        $this->assertEquals(['access' => 'free'], $result);
    }

    public function testCanResolveFilter(): void
    {
        $filterer = new CourseFilterer();

        $class = new ReflectionClass($filterer);
        $method = $class->getMethod('resolveFilter');
        $method->setAccessible(true);

        $result = $method->invokeArgs($filterer, ['access']);

        $this->assertInstanceOf(AccessFilter::class, $result);
    }

    public function testExceptionIsThrownIfCannotResolveFilter(): void
    {
        $this->expectException(UnresolvedFilterException::class);

        $filterer = new CourseFilterer();

        $class = new ReflectionClass($filterer);
        $method = $class->getMethod('resolveFilter');
        $method->setAccessible(true);

        $method->invokeArgs($filterer, ['hello']);
    }
}
