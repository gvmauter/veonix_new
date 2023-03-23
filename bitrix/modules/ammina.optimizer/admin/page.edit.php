<?

use Bitrix\Main\Localization\Loc;

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");
Bitrix\Main\Loader::includeModule('ammina.optimizer');
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/ammina.optimizer/prolog.php");

Loc::loadMessages(__FILE__);
$ID = isset($_REQUEST["ID"]) ? intval($_REQUEST["ID"]) : 0;

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
$isNewItem = ($ID <= 0);
$arCurrentItem = false;
if ($ID > 0) {
	$arCurrentItem = \Ammina\Optimizer\PageTable::getById($ID)->fetch();
	if (!$arCurrentItem) {
		$isNewItem = false;
		$ID = false;
	}
}

$result = new \Bitrix\Main\Entity\Result();

$customTabber = new CAdminTabEngine("OnAdminAmminaOptimizerPageEdit");
$customDraggableBlocks = new CAdminDraggableBlockEngine('OnAdminAmminaOptimizerPageEditDraggable');

if ($isSavingOperation) {

	$errorMessage = '';
	if (!$customTabber->Check()) {
		if ($ex = $APPLICATION->GetException())
			$errorMessage .= $ex->GetString();
		else
			$errorMessage .= "Custom tabber check unknown error!";

		$result->addError(new \Bitrix\Main\Entity\EntityError($errorMessage));
	}

	if (!$customDraggableBlocks->check()) {
		if ($ex = $APPLICATION->GetException())
			$errorMessage .= $ex->GetString();
		else
			$errorMessage .= "Custom draggable block check unknown error!";

		$result->addError(new \Bitrix\Main\Entity\EntityError($errorMessage));
	}

	if ($isNewItem) {
		$oTableResult = \Ammina\Optimizer\PageTable::add($_POST['FIELDS']);
		$ID = $oTableResult->getId();
	} else {
		$oTableResult = \Ammina\Optimizer\PageTable::update($ID, $_POST['FIELDS']);
	}
	if (!$oTableResult->isSuccess()) {
		$result->addErrors($oTableResult->getErrors());
	}
	if ($result->isSuccess()) {
		if (isset($_POST["save"])) {
			LocalRedirect("/bitrix/admin/ammina.optimizer.page.php?lang=" . LANGUAGE_ID . GetFilterParams("filter_", false));
		} else {
			LocalRedirect("/bitrix/admin/ammina.optimizer.page.edit.php?lang=" . LANGUAGE_ID . "&ID=" . $ID . GetFilterParams("filter_", false));
		}
	}
}

if ($ID > 0) {
	$APPLICATION->SetTitle(Loc::getMessage("AMMINA_OPTIMIZER_PAGE_TITLE_EDIT"));
} else {
	$APPLICATION->SetTitle(Loc::getMessage("AMMINA_OPTIMIZER_PAGE_TITLE_ADD"));
}

CUtil::InitJSCore();

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
CAmminaOptimizer::checkApiKey();
// context menu
$aMenu = array();
$aMenu[] = array(
	"ICON" => "btn_list",
	"TEXT" => Loc::getMessage("AMMINA_OPTIMIZER_TO_LIST"),
	"TITLE" => Loc::getMessage("AMMINA_OPTIMIZER_TO_LIST_TITLE"),
	"LINK" => "/bitrix/admin/ammina.optimizer.page.php?lang=" . LANGUAGE_ID . GetFilterParams("filter_"),
);


$context = new CAdminContextMenu($aMenu);
$context->Show();

//errors
$errorMessage = "";

if (!$result->isSuccess())
	foreach ($result->getErrors() as $error) {
		$errorMessage .= $error->getMessage() . "<br>\n";
	}

if (!empty($errorMessage)) {
	$admMessage = new CAdminMessage($errorMessage);
	echo $admMessage->Show();
}

//prepare blocks order
$defaultBlocksPage = array(
	"page",
	"pagemonitoring",
);

$formId = "AMMINA_OPTIMIZER_page_edit";

$aTabs = array(
	array("DIV" => "tab_ammina", "TAB" => Loc::getMessage("AMMINA_OPTIMIZER_TAB_PAGE"), "SHOW_WRAP" => "N", "IS_DRAGGABLE" => "Y"),
);
//echo \Ammina\Optimizer\Helpers\Admin\Blocks\Page::getScripts();
?>
<form method="POST" action="<?= $APPLICATION->GetCurPage() . "?lang=" . LANGUAGE_ID . GetFilterParams("filter_", false) ?>" name="<?= $formId ?>_form" id="<?= $formId ?>_form" enctype="multipart/form-data">
	<input type="hidden" name="ID" value="<?= $arCurrentItem['ID'] ?>"/>
	<?
	$moduleId='ammina.optimizer';
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
						case "page":
							echo \Ammina\Optimizer\Helpers\Admin\Blocks\Page::getEdit($arCurrentItem);
							break;
						case "pagemonitoring":
							echo \Ammina\Optimizer\Helpers\Admin\Blocks\PageMonitoring::getEdit($arCurrentItem);
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

$tabControl->Buttons(
	array(
		"back_url" => "/bitrix/admin/ammina.optimizer.page.php?lang=" . LANGUAGE_ID . GetFilterParams("filter_"))
);

$tabControl->End();
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");