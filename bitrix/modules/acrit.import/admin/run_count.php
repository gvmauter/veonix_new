<?
$moduleId = "acrit.import";
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/interface/admin_lib.php");

CModule::IncludeModule($moduleId);

use Acrit\Import,
	Acrit\Import\Agents,
    Bitrix\Main\Config\Option;

$arErrors = array();
$count = 0;

$profile_id = $_REQUEST['profile']?$_REQUEST['profile']:0;
if (!$profile_id) {
    $arErrors[] = 'Profile ID is empty';
}

// Check other import runs
if (Agents::isLocked($profile_id)) {
    $arErrors[] = 'Profile locked';
}

if (!$arErrors) {
    $obImport = AcritImportGetImportObj($profile_id);
    if ($obImport) {
        $obImport->prepareSource();
        $count = $obImport->count();
    }
}

echo json_encode(array(
    'count' => (int)$count,
    'errors' => $arErrors,
));
