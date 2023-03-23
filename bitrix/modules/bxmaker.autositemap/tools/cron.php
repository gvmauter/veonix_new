<?

    define("NO_KEEP_STATISTIC", true);
    define("NOT_CHECK_PERMISSIONS", true);
    define('CHK_EVENT', true);

    $_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__) . "/../../../..");
    $DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];


    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

    \Bitrix\Main\Loader::includeModule('bxmaker.autositemap');

    if(isset($argv[1]) && strlen($argv[1]) == 2)
    {
        \BXmaker\AutoSitemap\Manager::getInstance()->setCurrentSite($argv[1]);
    }

    \BXmaker\AutoSitemap\Manager::getInstance()->startCron();


    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
?>