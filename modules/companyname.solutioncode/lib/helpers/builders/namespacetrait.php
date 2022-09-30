<?
namespace CompanyName\SolutionCode\Helpers\Builders;

trait NameSpaceTrait
{
    /**
     * Из переданного значения именного пространства выделяет часть, указывающую на идентификатор
     * модуля
     *
     * @param string $namespace - значение с именным пространством какого-то класса
     *
     * @return string
     */
    protected static function getModuleID(string $namespace)
    {
        return strtolower(implode('.', array_slice(explode('\\', $namespace), 0, 2)));
    }

    /**
     * Возвращает подходящее местоположение класса, используя именное пространство класса,
     * так как иные способы определения местоположения класса вроде классов Reflection*
     * могут привести к неправильной работе, если в процессе тестирования класс будет в
     * месте вне кода портала, а на это место просто ведет символьная ссылка
     *
     * @return false|string
     */
    protected static function getPath()
    {
        $classPath = strtolower((new \ReflectionClass(static::class))->getNamespaceName());
        if (empty($classPath)) return false;

        $classPath = '/local/modules/' . preg_replace('/^([^\/]+)\/([^\/]+)/', '$1.$2/lib', strtr($classPath, '\\', '/'));
        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $classPath))  return false;

        return $classPath . '/';
    }
}