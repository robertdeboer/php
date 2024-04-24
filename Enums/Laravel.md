## Models
Backed enums can be used in laravel to provide a constrained list of values available for a column. This can be acheived by creating a backed enum
and then providing the class to the cast definition of a model
### The enum
```php
enum Colors : string {
    RED = 'red';
    BLUE = 'blue';
}
```
### The model
#### v10
```php
use Enums\Colors;

class Car extends Model {
    public $casts = [
        'color' => Colors::class
    ];
}
```
#### v11
```php
use Enums\Colors;

class Car extends Model {
    protected function casts(): array {
        return [
            'color' => Colors::class
        ]
    }
}
```
## Validation
Backed enums can also be used in validation to constrain a given value against a list of acceptable values
### The enum
```php
enum Colors : string {
    RED = 'red';
    BLUE = 'blue';
}
```
### Inline validation
```php
use Enums\Color;
use Illuminate\Validation\Rules\Enum;

$request->validate([
    'color' => [new Enum(Color::class)],
]);
```
### A validation rule
```php
namespace App\Rules;

use App\Enums\Colors;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SocialNetworkRule implements ValidationRule
{
    /**
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!in_array($value, Colors::values())) {
            $fail('The :attribute field must be a valid color.');
        }
    }
}
```