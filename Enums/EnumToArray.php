/**
* Trait EnumToArray
* Provide static functions to backed enums - specifically strings
* that allows access to names and values as arrays
*/
trait EnumToArray {
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }
}