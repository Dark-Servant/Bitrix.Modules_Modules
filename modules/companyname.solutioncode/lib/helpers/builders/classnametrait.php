<?
namespace CompanyName\SolutionCode\Helpers\Builders;

trait ClassNameTrait
{
    /**
     * Возвращает в верхнем регистре название класса без указания пространства имен
     *
     * @return string
     */
    public static function getSimpleClassName()
    {
        static $names = [];
        if (!empty($names[static::class])) return $names[static::class];

        return $names[static::class] = end(preg_split('/\\\\/', static::class));
    }
}