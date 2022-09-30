<?
// Основные константы
define('SHORTNAME_SOLUTIONCODE_MODULE_ID', basename(__DIR__));

// Данные о версии модуля
require __DIR__ . '/install/version.php';
foreach ($arModuleVersion as $key => $value) {
    define('SHORTNAME_SOLUTIONCODE_' . $key, $value);
}