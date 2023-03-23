<?
@set_time_limit(0);
ignore_user_abort(true);

ini_set('display_errors', true);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);

// performance fixs
define("STOP_STATISTICS",       true);
define("NO_KEEP_STATISTIC",     true);
define("NO_AGENT_STATISTIC",    "Y");
define("NOT_CHECK_PERMISSIONS", true);
define("DisableEventsCheck",    true);
define("BX_SECURITY_SHOW_MESSAGE", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/interface/admin_lib.php");

CModule::IncludeModule("acrit.import");

use Acrit\Import,
	Acrit\Import\Agents,
	Bitrix\Main\Config\Option,
	Bitrix\Main\Diag\Debug;

// Prepare
$profile_id = $_REQUEST['profile'] ? $_REQUEST['profile'] : 0;
if ((int)$argv[1] > 0) {
	$profile_id = (int)$argv[1];
}
if (!$profile_id) {
    return false;
}

$count = $_REQUEST['count'] ? $_REQUEST['count'] : 0;
if ((int)$argv[2] > 0) {
	$count = (int)$argv[2];
}

$next_item = $_REQUEST['next_item'] ? $_REQUEST['next_item'] : 0;
if ((int)$argv[3] > 0) {
	$next_item = (int)$argv[3];
}

// Run mode
$run_mode = ((int)$argc > 1) ? 'console' : 'agent';

if ($run_mode == 'agent') {
	// Check other import runs
	if (Agents::isLocked($profile_id)) {
		return;
	}
	// Check if is duplicate run
	if (Agents::isDoubleRun($profile_id, $next_item)) {
		return;
	}
}

// Lock the profile
Agents::addLock($profile_id);
Agents::addRunPos($profile_id, $next_item);


// Import
$obImport = AcritImportGetImportObj($profile_id);

if ($obImport) {

	// Run import
	$step_type = ($run_mode == 'console') ? Import\Import::STEP_BY_COUNT : Import\Import::STEP_BY_TYME;
	$limit = ($run_mode == 'console') ? 1000 : 1;
	$next_item_new = $obImport->import($step_type, $limit, $next_item);
	saveLog('(run background) ' . $next_item_new);

    // Update last start
    if ($next_item == 0) {
        $arFields = array(
            'START_LAST_TIME' => new Bitrix\Main\Type\DateTime(date('Y-m-d H:i:s'), 'Y-m-d H:i:s'),
        );
        Acrit\Import\ProfileTable::update($profile_id, $arFields);
    }
    // Agents lock
    Agents::delLock($profile_id);
    // Logs
    $obLogs = $obImport->getLog();
    $arErrors = $obLogs->getList(array(Import\Log::TYPE_ERROR, Import\Log::TYPE_SKIP), true);
    $arStat = $obLogs->getStat();
    $arReport = array(
        'success' => $arStat[Import\Log::TYPE_SUCCESS],
        'errors' => $arStat[Import\Log::TYPE_ERROR],
        'skip' => $arStat[Import\Log::TYPE_SKIP],
    );
    $obLogs->save();
    $arImportStat = $obLogs->getImportStat();
    $imported_count = $arImportStat['imported_items'];
    //$imported_count += $obLogs->getCount();
    //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/test/import.log', $next_item_new."\n".$imported_count."\narReport: ".print_r($arReport, true)."\n", FILE_APPEND);
    // Run next step
	if ($next_item_new && $next_item_new < $count) {
        CAcritImport::runBgrRequest('/bitrix/acrit.import_run_bgrnd.php', [
		    'profile' => $profile_id,
		    'count' => $count,
		    'next_item' => $next_item_new,
		    'mark' => md5(rand(1000, 1000000)),
	    ]);
    }
    elseif ($next_item_new >= $count) {
        Agents::delRunPos($profile_id);
	    foreach (GetModuleEvents("acrit.import", "OnAfterAcritImportProcess", true) as $arEvent) {
		    ExecuteModuleEventEx($arEvent, [$profile_id]);
	    }
        // Run facet indexing
	    $is_indexing = Option::get("acrit.import", "indexing") == 'Y' ? true : false;
	    if ($is_indexing) {
		    CAcritImport::runBgrRequest('/bitrix/acrit.import_run_index.php', [
			    'profile' => $profile_id,
			    'mark' => md5(rand(1000, 1000000)),
		    ]);
	    }
    }
}
else {
    Agents::delLock($profile_id);
    Agents::delRunPos($profile_id);
}
