<?php

namespace Anddye\Filtering\Tests;

use Anddye\Filtering\FilterException;
use Anddye\Filtering\Tests\Fixtures\Filterers\CourseFilterer;
use Anddye\Filtering\Tests\Fixtures\Filters\AccessFilter;
use Anddye\Filtering\Tests\Fixtures\Filters\DifficultyFilter;
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

    public function testCanProgrammaticallyAddFilters(): void
    {
        $filterer = new CourseFilterer();
        $filterer->addFilters(['difficulty' => DifficultyFilter::class]);

        $class = new ReflectionClass($filterer);
        $method = $class->getMethod('getFilteredFilters');
        $method->setAccessible(true);

        $result = $method->invokeArgs($filterer, [['access' => 'free', 'difficulty' => 'beginner']]);

        $this->assertEquals(['access' => 'free', 'difficulty' => 'beginner'], $result);
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
        $this->expectException(FilterException::class);

        $filterer = new CourseFilterer();

        $class = new ReflectionClass($filterer);
        $method = $class->getMethod('resolveFilter');
        $method->setAccessible(true);

        $method->invokeArgs($filterer, ['hello']);
    }
}
