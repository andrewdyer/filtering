# Filtering

<p align="center">
  <img width="460" height="300" src="https://raw.githubusercontent.com/andrewdyer/filtering/main/.github/logo.png" />
</p>

<p align="center">
    <a href="https://packagist.org/packages/andrewdyer/filtering"><img src="https://poser.pugx.org/andrewdyer/filtering/downloads?style=for-the-badge" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/andrewdyer/filtering"><img src="https://poser.pugx.org/andrewdyer/filtering/v?style=for-the-badge" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/andrewdyer/filtering"><img src="https://poser.pugx.org/andrewdyer/filtering/license?style=for-the-badge" alt="License"></a>
</p>

A super tidy and easy to extend solution for filtering Laravel database results with a query string.

## License
Licensed under MIT. Totally free for private or commercial projects.

## Installation
```text
composer require andrewdyer/filtering
```

## Usage

### Creating Filters
```php
namespace App\Filters;

use Anddye\Filtering\Filter;
use Illuminate\Database\Eloquent\Builder;

class AccessFilter extends Filter
{
    public function filter(Builder $builder, $value): Builder
    {
        return $builder->where('free', $value);
    }
}
```

### Creating Filterers

```php
namespace App\Filterers;

use Anddye\Filtering\Filterer;
use Anddye\Filters\AccessFilter;

class CourseFilterer extends Filterer
{
    protected array $filters = [
        'access' => AccessFilter::class,
    ];
}
```

### Create Filter Scope

```php
namespace App\Models;

use App\Filterers\CourseFilterer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function scopeFilter(Builder $builder, array $queryParams): Builder
    {
        return (new CourseFilterer())->filter($builder, $queryParams);
    }
}
```

## Support
If you're using this package, I'd love to hear your thoughts! Feel free to contact me on [Twitter](https://twitter.com/andyer92).

Found a bug? Please report it using the [issue tracker](https://github.com/andrewdyer/filtering/issues), or better yet, fork the repository and submit a pull request.
