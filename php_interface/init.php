<?
use Bitrix\Main\Loader;

foreach (glob(__DIR__ . '/../modules/companyname.*') as $modulePath) {
    if (!is_dir($modulePath)) continue;
    
    Loader::includeModule(basename($modulePath));
}
