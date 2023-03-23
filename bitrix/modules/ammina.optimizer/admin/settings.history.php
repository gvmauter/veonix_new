<?

use Bitrix\Main\Localization\Loc;

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");
Bitrix\Main\Loader::includeModule('ammina.optimizer');
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/ammina.optimizer/prolog.php");

Loc::loadMessages(__FILE__);
global $USER, $APPLICATION, $DB;
$modulePermissions = CMain::GetGroupRight("ammina.optimizer");
if ($modulePermissions < "W") {
	$APPLICATION->AuthForm(Loc::getMessage("ACCESS_DENIED"));
}

if (CAmminaOptimizer::getTestPeriodInfo() == \Bitrix\Main\Loader::MODULE_DEMO_EXPIRED) {
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
	CAdminMessage::ShowMessage(array("MESSAGE" => Loc::getMessage("AMMINA_OPTIMIZER_SYS_MODULE_IS_DEMO_EXPIRED"), "HTML" => true));
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");
	die();
}

$sTableID = "tbl_ammina_optimizer_settings_history";

$oSort = new CAdminSorting($sTableID, "DATE_CHANGE", "desc");
$arOrder = (amopt_strtoupper($by) === "ID" ? array($by => $order) : array($by => $order, "ID" => "ASC"));
$lAdmin = new CAdminUiList($sTableID, $oSort);

$filterFields = array(
	array(
		"id" => "ID",
		"name" => Loc::getMessage("AMMINA_OPTIMIZER_FILTER_ID"),
		"type" => "number",
		"filterable" => "",
	),
	array(
		"id" => "SITE_ID",
		"name" => Loc::getMessage("AMMINA_OPTIMIZER_FILTER_SITE_ID"),
		"filterable" => "?",
		"quickSearch" => "?",
		"default" => true,
	),
);

$arFilter = array();
$lAdmin->AddFilter($filterFields, $arFilter);

if ($lAdmin->EditAction()) {
	foreach ($FIELDS as $ID => $postFields) {
		$DB->StartTransaction();
		$ID = IntVal($ID);

		if (!$lAdmin->IsUpdated($ID))
			continue;

		$allowedFields = array(
			"DESCRIPTION"
		);
		$arFields = array();
		foreach ($allowedFields as $fieldId) {
			if (array_key_exists($fieldId, $postFields))
				$arFields[$fieldId] = $postFields[$fieldId];
		}

		$oUpdate = \Ammina\Optimizer\SettingsHistoryTable::update($ID, $arFields);
		if (!$oUpdate->isSuccess()) {
			$lAdmin->AddUpdateError(Loc::getMessage("AMMINA_OPTIMIZER_UPDATE_ERROR", array("#ID#" => $ID, "#ERROR_TEXT#" => implode(", ", $oUpdate->getErrorMessages()))), $ID);
			$DB->Rollback();
		}
		$DB->Commit();
	}
}
$linkList = [];
if (($arID = $lAdmin->GroupAction()) && $modulePermissions >= "W") {
	if ($_REQUEST['action_target'] === 'selected') {
		$arID = array();
		$dbResultList = \Ammina\Optimizer\SettingsHistoryTable::getList(array(
			"order" => $arOrder,
			"filter" => $arFilter,
			"select" => array("ID")));
		while ($arResult = $dbResultList->Fetch()) {
			$arID[] = $arResult['ID'];
		}
	}
	$deltaTime = 0;
	foreach ($arID as $ID) {
		if (amopt_strlen($ID) <= 0) {
			continue;
		}

		switch ($_REQUEST['action']) {
			case "export":
				@set_time_limit(0);
				$arElement = \Ammina\Optimizer\SettingsHistoryTable::getById($ID)->fetch();
				if ($arElement) {
					CheckDirPath($_SERVER['DOCUMENT_ROOT'] . '/upload/ammina.optimizer.settings/');
					$fileName = '/upload/ammina.optimizer.settings/ammina.optimizer.settings.' . $arElement['DATE_CHANGE']->format('Y-m-d-H-i-s') . '.bin';
					file_put_contents($_SERVER['DOCUMENT_ROOT'] . $fileName, json_encode($arElement['SETTINGS']));
				}
				break;
			case "delete":
				@set_time_limit(0);
				$DB->StartTransaction();
				$rOperation = \Ammina\Optimizer\SettingsHistoryTable::delete($ID);
				if (!$rOperation->isSuccess()) {
					$DB->Rollback();
					if ($ex = $APPLICATION->GetException()) {
						$lAdmin->AddGroupError($ex->GetString(), $ID);
					} else {
						$lAdmin->AddGroupError(Loc::getMessage("AMMINA_OPTIMIZER_DELETE_ERROR"), $ID);
					}
				}
				$DB->Commit();
				break;
		}
	}

	if (!empty($linkList)) {
		//LocalRedirect($APPLICATION->GetCurPageParam());

		$lAdmin->AddActionSuccessMessage('Успешно выполнено');
		//CAdminMessage::ShowMessage(array("MESSAGE" => Loc::getMessage("AMMINA_OPTIMIZER_SYS_MODULE_IS_DEMO"), "HTML" => true));
	}

}


$arHeader = array(
	array(
		"id" => "ID",
		"content" => Loc::getMessage("AMMINA_OPTIMIZER_FIELD_ID"),
		"sort" => "ID",
		"default" => true,
	),
	array(
		"id" => "SITE_ID",
		"content" => Loc::getMessage("AMMINA_OPTIMIZER_FIELD_SITE_ID"),
		"sort" => "SITE_ID",
		"default" => true,
	),
	array(
		"id" => "DATE_CHANGE",
		"content" => Loc::getMessage("AMMINA_OPTIMIZER_FIELD_DATE_CHANGE"),
		"sort" => "DATE_CHANGE",
		"default" => true,
	),
	array(
		"id" => "DESCRIPTION",
		"content" => Loc::getMessage("AMMINA_OPTIMIZER_FIELD_DESCRIPTION"),
		"default" => true,
	), array(
		"id" => "LINK",
		"content" => Loc::getMessage("AMMINA_OPTIMIZER_FIELD_LINK"),
		"default" => true,
	),
);

$lAdmin->AddHeaders($arHeader);

$usePageNavigation = true;
$navyParams = array();
if (isset($_REQUEST['mode']) && $_REQUEST['mode'] === 'excel') {
	$usePageNavigation = false;
} else {
	$navyParams = CDBResult::GetNavParams(CAdminUiResult::GetNavSize($sTableID));
	if ($navyParams['SHOW_ALL']) {
		$usePageNavigation = false;
	} else {
		$navyParams['PAGEN'] = (int)$navyParams['PAGEN'];
		$navyParams['SIZEN'] = (int)$navyParams['SIZEN'];
	}
}

$getListParams = array(
	"order" => $arOrder,
	"filter" => $arFilter,
	"select" => array("ID", "SITE_ID", "DATE_CHANGE", "DESCRIPTION"),
);

if ($usePageNavigation) {
	$getListParams['limit'] = $navyParams['SIZEN'];
	$getListParams['offset'] = $navyParams['SIZEN'] * ($navyParams['PAGEN'] - 1);
}
$totalCount = 0;
$totalPages = 0;
if ($usePageNavigation) {
	$totalCount = \Ammina\Optimizer\SettingsHistoryTable::getCount($getListParams['filter']);
	if ($totalCount > 0) {
		$totalPages = ceil($totalCount / $navyParams['SIZEN']);
		if ($navyParams['PAGEN'] > $totalPages)
			$navyParams['PAGEN'] = $totalPages;
	} else {
		$navyParams['PAGEN'] = 1;
	}
	$getListParams['limit'] = $navyParams['SIZEN'];
	$getListParams['offset'] = $navyParams['SIZEN'] * ($navyParams['PAGEN'] - 1);
}

$rsItems = \Ammina\Optimizer\SettingsHistoryTable::getList($getListParams);
$rsItems = new CAdminUiResult($rsItems, $sTableID);
if ($usePageNavigation) {
	$rsItems->NavStart($getListParams['limit'], $navyParams['SHOW_ALL'], $navyParams['PAGEN']);
	$rsItems->NavRecordCount = $totalCount;
	$rsItems->NavPageCount = $totalPages;
	$rsItems->NavPageNomer = $navyParams['PAGEN'];
} else {
	$rsItems->NavStart();
}
$lAdmin->SetNavigationParams($rsItems);

$arSites = [
	'all' => Loc::getMessage('AMMINA_OPTIMIZER_SITES_ALL')
];
$rSites = CSite::GetList($b, $o);
while ($arSite = $rSites->Fetch()) {
	$arSites[$arSite['LID']] = "[" . $arSite['LID'] . "] " . $arSite['NAME'];
}


while ($arData = $rsItems->NavNext()) {
	$row =& $lAdmin->AddRow($arData['ID'], $arData, false, '');

	$row->AddInputField("DESCRIPTION");

	$fileName = '/upload/ammina.optimizer.settings/ammina.optimizer.settings.' . $arData['DATE_CHANGE']->format('Y-m-d-H-i-s') . '.bin';
	if (file_exists($_SERVER['DOCUMENT_ROOT'] . $fileName)) {
		$row->AddViewField('LINK', '<a href="' . $fileName . '">' . Loc::getMessage('AMMINA_OPTIMIZER_FIELD_LINK_DOWNLOAD') . '</a>');
	}
	if (array_key_exists($arData['SITE_ID'], $arSites)) {
		$row->AddViewField('SITE_ID', $arSites[$arData['SITE_ID']]);
	}

	$arActions = array();

	if ($modulePermissions >= "W") {
		$arActions[] = array(
			"ICON" => "export",
			"TEXT" => Loc::getMessage("AMMINA_OPTIMIZER_ACTION_EXPORT"),
			"DEFAULT" => true,
			"ACTION" => $lAdmin->ActionDoGroup($arData['ID'], "export"),
		);
		$arActions[] = array(
			"SEPARATOR" => true,
		);
		$arActions[] = array(
			"ICON" => "delete",
			"TEXT" => Loc::getMessage("AMMINA_OPTIMIZER_ACTION_DELETE"),
			"ACTION" => "if(confirm('" . Loc::getMessage('AMMINA_OPTIMIZER_ACTION_DELETE_CONFIRM') . "')) " . $lAdmin->ActionDoGroup($arData['ID'], "delete"),
		);

	}

	if (count($arActions) > 0) {
		$row->AddActions($arActions);
	}
}

$lAdmin->AddFooter(
	array(
		array("title" => Loc::getMessage("MAIN_ADMIN_LIST_SELECTED"), "value" => $rsItems->SelectedRowsCount()),
		array("counter" => true, "title" => Loc::getMessage("MAIN_ADMIN_LIST_CHECKED"), "value" => "0"),
	)
);

if ($modulePermissions >= "W") {
	$aContext = array();

	$lAdmin->AddAdminContextMenu($aContext);

	$lAdmin->AddGroupActionTable(array(
		"edit" => true,
		"delete" => true,
		"export" => Loc::getMessage("AMMINA_OPTIMIZER_ACTION_EXPORT"),
	));
}

$lAdmin->CheckListMode();

$APPLICATION->SetTitle(Loc::getMessage("AMMINA_OPTIMIZER_PAGE_TITLE"));

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
CAmminaOptimizer::checkApiKey();
$lAdmin->DisplayFilter($filterFields);

if (CAmminaOptimizer::getTestPeriodInfo() == \Bitrix\Main\Loader::MODULE_DEMO) {
	CAdminMessage::ShowMessage(array("MESSAGE" => Loc::getMessage("AMMINA_OPTIMIZER_SYS_MODULE_IS_DEMO"), "HTML" => true));
} elseif (CAmminaOptimizer::getTestPeriodInfo() == \Bitrix\Main\Loader::MODULE_DEMO_EXPIRED) {
	CAdminMessage::ShowMessage(array("MESSAGE" => Loc::getMessage("AMMINA_OPTIMIZER_SYS_MODULE_IS_DEMO_EXPIRED"), "HTML" => true));
} elseif (COption::GetOptionString("ammina.optimizer", "module_status", '') === 'ended') {
	CAdminMessage::ShowMessage(array("MESSAGE" => Loc::getMessage("AMMINA_OPTIMIZER_SYS_MODULE_RENEWAL", [
		'#LINK#' => COption::GetOptionString("ammina.optimizer", "module_renewal", ''),
		'#DATE_END#' => COption::GetOptionString("ammina.optimizer", "module_active_to", '')
	]), "HTML" => true));
} elseif (COption::GetOptionString("ammina.optimizer", "module_status", '') === 'timeout') {
	CAdminMessage::ShowMessage(array("MESSAGE" => Loc::getMessage("AMMINA_OPTIMIZER_SYS_MODULE_RENEWAL_END", [
		'#LINK#' => COption::GetOptionString("ammina.optimizer", "module_renewal", ''),
		'#DATE_END#' => COption::GetOptionString("ammina.optimizer", "module_active_to", '')
	]), "HTML" => true));
}

$lAdmin->DisplayList();
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");
