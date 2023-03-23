<?
/**
 * Example:
 * sudo -u bitrix php -d mbstring.func_overload=0 -d mbstring.internal_encoding=CP1251 -f ROOT_PATH/bitrix/modules/acrit.import/scripts/cron.php 4
 */

// performance fixs
define("STOP_STATISTICS",       true);
define("NO_KEEP_STATISTIC",     true);
define("NO_AGENT_STATISTIC",    "Y");
define("NOT_CHECK_PERMISSIONS", true);
define("DisableEventsCheck",    true);
define("BX_SECURITY_SHOW_MESSAGE", true);

$_SERVER["DOCUMENT_ROOT"] = $DOCUMENT_ROOT = realpath(__DIR__ . "/../../../../");
require $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

set_time_limit(0);
CModule::IncludeModule('acrit.import');
$profile_id = (int)$argv[1];
\Acrit\Import\Agents::runImport($profile_id, 1);
