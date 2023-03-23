<?

use Bitrix\Main\Localization\Loc;

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");
Bitrix\Main\Loader::includeModule('ammina.optimizer');
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/ammina.optimizer/prolog.php");

Loc::loadMessages(__FILE__);

$isSavingOperation = (
	$_SERVER["REQUEST_METHOD"] === "POST"
	&& (
		isset($_POST["apply"])
		|| isset($_POST["save"])
	)
	&& check_bitrix_sessid()
);
global $USER, $APPLICATION;
$arUserGroups = $USER->GetUserGroupArray();
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

$needFieldsRestore = $_SERVER["REQUEST_METHOD"] === "POST" && !$isSavingOperation;

$result = new \Bitrix\Main\Entity\Result();

$customTabber = new CAdminTabEngine("OnAdminAmminaOptimizerSettingsImport");
$customDraggableBlocks = new CAdminDraggableBlockEngine('OnAdminAmminaOptimizerSettingsImportDraggable');


if ($isSavingOperation) {
	global $AMMINA_OPTIMIZER_NO_SET_HISTORY;
	$errorMessage = false;
	if (strlen($_REQUEST['FIELD']['SITE_ID']) <= 0) {
		$result->addError(new \Bitrix\Main\Error(Loc::getMessage('AMMINA_OPTIMIZER_ERROR_FILED_SITE_ID')));
	}
	if (strlen($_FILES['FIELDS']['tmp_name']['SETTINGS']) <= 0 || !file_exists($_FILES['FIELDS']['tmp_name']['SETTINGS'])) {
		$result->addError(new \Bitrix\Main\Error(Loc::getMessage('AMMINA_OPTIMIZER_ERROR_FILED_SETTINGS')));
	}
	if ($result->isSuccess()) {
		$fileContent = json_decode(file_get_contents($_FILES['FIELDS']['tmp_name']['SETTINGS']), true);
		if (!array_key_exists('MAIN', $fileContent)) {
			$result->addError(new \Bitrix\Main\Error(Loc::getMessage('AMMINA_OPTIMIZER_ERROR_FILED_SETTINGS')));
		}
	}
	if ($result->isSuccess()) {
		$arSettings = \Ammina\Optimizer\SettingsTable::getList([
			'filter' => [
				'SITE_ID' => $_REQUEST['FIELD']['SITE_ID']
			]
		])->fetch();
		$AMMINA_OPTIMIZER_NO_SET_HISTORY = true;
		if ($arSettings) {
			$tableResult = \Ammina\Optimizer\SettingsTable::update($arSettings['ID'], [
				'SETTINGS' => $fileContent
			]);
		} else {
			$tableResult = \Ammina\Optimizer\SettingsTable::add([
				'SITE_ID' => $_REQUEST['FIELD']['SITE_ID'],
				'SETTINGS' => $fileContent
			]);
		}
		if (!$tableResult->isSuccess()) {
			$result->addErrors($tableResult->getErrors());
		}
		if ($result->isSuccess()) {
			if (isset($_POST["save"])) {
				LocalRedirect("/bitrix/admin/ammina.optimizer.settings.php?lang=" . LANGUAGE_ID . '&site=' . $_REQUEST['FIELD']['SITE_ID']);
			} else {
				LocalRedirect("/bitrix/admin/ammina.optimizer.settings.import.php?lang=" . LANGUAGE_ID . '&itsok=yes');
			}
		}
	}
}

$APPLICATION->SetTitle(Loc::getMessage("AMMINA_OPTIMIZER_PAGE_TITLE"));

CJSCore::Init();

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");

//errors
$errorMessage = "";

if (!$result->isSuccess()) {
	foreach ($result->getErrors() as $error) {
		$errorMessage .= $error->getMessage() . "<br>\n";
	}
}
if (!empty($errorMessage)) {
	$admMessage = new CAdminMessage($errorMessage);
	echo $admMessage->Show();
}
if ($_REQUEST['itsok'] == 'yes') {
	$admMessage = new CAdminMessage([
		'MESSAGE' => Loc::getMessage('AMMINA_OPTIMIZER_IMPORT_OK'),
		'TYPE' => 'OK'
	]);
	echo $admMessage->Show();
}
//prepare blocks order
$defaultBlocksPage = array(
	"import",
);

$formId = "AMMINA_OPTIMIZER_settings_import";

$aTabs = array(
	array("DIV" => "tab_ammina", "TAB" => Loc::getMessage("AMMINA_OPTIMIZER_TAB_IMPORT"), "SHOW_WRAP" => "N", "IS_DRAGGABLE" => "Y"),
);

//echo \Ammina\Optimizer\Helpers\Admin\Blocks\Page::getScripts();
?>
<form method="POST" action="<?= $APPLICATION->GetCurPage() . "?lang=" . LANGUAGE_ID . GetFilterParams("filter_", false) ?>" name="<?= $formId ?>_form" id="<?= $formId ?>_form" enctype="multipart/form-data">
<?
$moduleId = 'ammina.optimizer';
$tabControl = new CAdminTabControlDrag($formId, $aTabs, $moduleId, false, true);
$tabControl->AddTabs($customTabber);
$tabControl->Begin();

$tabControl->BeginNextTab();
$customFastNavItems = array();
$customBlocksPage = array();
$fastNavItems = array();

foreach ($customDraggableBlocks->getBlocksBrief() as $blockId => $blockParams) {
	$defaultBlocksPage[] = $blockId;
	$customFastNavItems[$blockId] = $blockParams['TITLE'];
	$customBlocksPage[] = $blockId;
}

$blocksPage = $tabControl->getCurrentTabBlocksOrder($defaultBlocksPage);
$customNewBlockIds = array_diff($customBlocksPage, $blocksPage);
$blocksPage = array_merge($blocksPage, $customNewBlockIds);

foreach ($blocksPage as $item) {
	if (isset($customFastNavItems[$item]))
		$fastNavItems[$item] = $customFastNavItems[$item];
	else {
		$fastNavItems[$item] = Loc::getMessage("AMMINA_OPTIMIZER_BLOCK_TITLE_" . toUpper($item));
	}
}
?>
	<tr>
		<td>
			<?= bitrix_sessid_post() ?>
			<div style="position: relative; vertical-align: top">
				<? $tabControl->DraggableBlocksStart(); ?>
				<?
				foreach ($blocksPage as $blockCode) {
					echo '<a id="' . $blockCode . '" class="adm-ammina-optimizer-fastnav-anchor"></a>';
					$tabControl->DraggableBlockBegin($fastNavItems[$blockCode], $blockCode);
					switch ($blockCode) {
						case "import":
							echo \Ammina\Optimizer\Helpers\Admin\Blocks\SettingsImport::getEdit();
							break;
						default:
							echo $customDraggableBlocks->getBlockContent($blockCode, $tabControl->selectedTab);
							break;
					}
					$tabControl->DraggableBlockEnd();
				}
				?>
			</div>
		</td>
	</tr>
<?

$tabControl->EndTab();

$tabControl->Buttons([]);

$tabControl->End();
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");