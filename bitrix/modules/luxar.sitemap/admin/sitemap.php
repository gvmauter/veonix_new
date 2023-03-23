<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_admin_before.php");

$module_id = $MODULE_ID = 'luxar.sitemap';
define("ADMIN_MODULE_NAME", $MODULE_ID);

$modulePermissions = $APPLICATION->GetGroupRight($MODULE_ID);
if ($modulePermissions < 'W')
    $APPLICATION->AuthForm('');

use Bitrix\Main\Loader,
	Bitrix\Main\Application,
	Luxar\Sitemap\SitemapTable,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\SiteTable,
	Bitrix\Main\UserTable,
	Bitrix\Main\Text\Converter;

Loc::loadMessages(dirname(__FILE__).'/sitemap.php');
Loc::loadMessages(dirname(__FILE__).'/sitemap_run.php');

$includeResult = Loader::includeSharewareModule($MODULE_ID);
if ($includeResult == MODULE_DEMO_EXPIRED) {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
    echo CLuxarSitemap::GetDemoMessage();
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
    die();
}

if(!$includeResult)
{
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
	ShowError(Loc::getMessage("SEO_ERROR_NO_MODULE"));
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
}

$adminListTableID = "tbl_sitemap";
$BASE_FILE = $module_id.'_sitemap.php';

\Bitrix\Main\UI\Extension::load("ui.alerts");
\Bitrix\Main\UI\Extension::load("ui.progressbar");

$adminSort = new CAdminUiSorting($adminListTableID, 'ID', 'ASC');
$adminList = new CAdminUiList($adminListTableID, $adminSort);

$sitesList = array();
$siteIterator = SiteTable::getList(array(
	'select' => array('LID', 'NAME', 'ACTIVE', 'SORT'),
	'order' => array('SORT' => 'ASC')
));
while ($site = $siteIterator->fetch())
{
	$sitesList[$site['LID']] = '['.$site['LID'].'] '.$site['NAME'];
	$filterSiteList[] = $site;
	$siteList[$site['LID']] = $site['LID'];
}

$filterFields = array(
	array(
		"id" => "ID",
		"name" => "ID",
		"type" => "number",
		"filterable" => "=",
		"default" => true
	),
	array(
		"id" => "NAME",
		"name" => GetMessage("SITEMAP_NAME"),
		"filterable" => "%",
		"quickSearch" => "%"
	),
	array(
		"id" => "DESCRIPTION",
		"name" => GetMessage("SITEMAP_DESCRIPTION"),
		"filterable" => "%",
	),
	array(
		"id" => "SITE_ID",
		"name" => GetMessage("SITEMAP_SITE_ID"),
		"type" => "list",
		"items" => $sitesList,
		"filterable" => "@"
	),
	array(
		"id" => "ACTIVE",
		"name" => GetMessage("SITEMAP_ACTIVE"),
		"type" => "list",
		"items" => array(
			"Y" => GetMessage("LUXAR_INDEXCONTROL_DA"),
			"N" => GetMessage("LUXAR_INDEXCONTROL_NET")
		),
		"filterable" => "="
	),
	array(
		"id" => "DATE_CREATE",
		"name" => GetMessage("LUXAR_INDEXCONTROL_SOZDAN"),
		"type" => "date",
		"filterable" => ""
	),
	array(
		"id" => "TIMESTAMP_X",
		"name" => GetMessage("LUXAR_INDEXCONTROL_IZMENEN"),
		"type" => "date",
		"filterable" => ""
	),
	array(
		"id" => "CREATED",
		"name" => GetMessage("SITEMAP_CREATED_NAME"),
		"type" => "number",
		"filterable" => "=",
	),
	array(
		"id" => "MODIFIED",
		"name" => GetMessage("SITEMAP_MODIFY_NAME"),
		"type" => "number",
		"filterable" => "=",
	),
);

$filter = array();
$adminList->AddFilter($filterFields, $filter);


if ($adminList->EditAction())
{
	if (isset($FIELDS) && is_array($FIELDS))
	{
		$conn = Application::getConnection();
		foreach ($FIELDS as $ID => $fields)
		{
			$ID = (int)$ID;
			if ($ID <= 0 || !$adminList->IsUpdated($ID))
				continue;

			$conn->startTransaction();
			$result = SitemapTable::update($ID, $fields);
			if ($result->isSuccess())
			{
				$conn->commitTransaction();
			}
			else
			{
				$conn->rollbackTransaction();
				$adminList->AddUpdateError(implode('<br>', $result->getErrorMessages()), $ID);
			}
		}
		unset($fields, $ID);
	}
}

if ($listID = $adminList->GroupAction())
{
	if ($_REQUEST['action_target'] == 'selected')
	{
		$listID = array();
		$rowsIterator = SitemapTable::getList(array(
			'select' => array('ID'),
			'filter' => $filter
		));
		while ($item = $rowsIterator->fetch())
			$listID[] = $item['ID'];
	}

	$listID = array_filter($listID);
	if (!empty($listID))
	{
		switch ($_REQUEST['action'])
		{
			case 'activate':
			case 'deactivate':
				$fields = array(
					'ACTIVE' => ($_REQUEST['action'] == 'activate' ? 'Y' : 'N')
				);
				foreach ($listID as &$itemID)
				{
					$result = SitemapTable::update($itemID, $fields);
					if (!$result->isSuccess())
						$adminList->AddGroupError(implode('<br>', $result->getErrorMessages()), $itemID);
					unset($result);
				}
				unset($itemID, $fields);
				break;
			case 'delete':
				foreach ($listID as &$itemID)
				{
					$result = SitemapTable::delete($itemID);
					if (!$result->isSuccess())
						$adminList->AddGroupError(implode('<br>', $result->getErrorMessages()), $itemID);
					unset($result);
				}
				unset($itemID);
				break;
			case 'addAgent':
				foreach ($listID as $itemID) {
					\Luxar\Sitemap\SitemapAgent::add($itemID);
                }
				break;
			case 'removeAgent':
				foreach ($listID as $itemID) {
					\Luxar\Sitemap\SitemapAgent::remove($itemID);
				}
				unset($itemID);
				break;
		}
	}
	unset($listID);

	if ($adminList->hasGroupErrors())
	{
		$adminSidePanelHelper->sendJsonErrorResponse($adminList->getGroupErrors());
	}
	else
	{
		$adminSidePanelHelper->sendSuccessResponse();
	}
}

$headerList = array();
$headerList['ID'] = array(
	'id' => 'ID',
	'content' => 'ID',
	'title' => '',
	'sort' => 'ID',
	'default' => true
);
$headerList['SITE_ID'] = array(
	'id' => 'SITE_ID',
	'content' => GetMessage("SITEMAP_SITE_ID"),
	'title' => '',
	'sort' => 'SITE_ID',
);
$headerList['NAME'] = array(
	'id' => 'NAME',
	'content' => Loc::getMessage('SITEMAP_NAME'),
	'title' => Loc::getMessage('SITEMAP_NAME'),
	'sort' => 'NAME',
	'default' => true
);
$headerList['ACTIVE'] = array(
	'id' => 'ACTIVE',
	'content' => GetMessage("LUXAR_INDEXCONTROL_AKTIVEN"),
	'title' => GetMessage("LUXAR_INDEXCONTROL_AKTIVEN"),
	'sort' => 'ACTIVE',
	'default' => true
);
$headerList['DESCRIPTION'] = array(
	'id' => 'DESCRIPTION',
	'content' => Loc::getMessage('SITEMAP_DESCRIPTION'),
	'title' => Loc::getMessage('SITEMAP_DESCRIPTION'),
	'sort' => 'DESCRIPTION',
	'default' => true
);
$headerList['IS_AGENT'] = array(
	'id' => 'IS_AGENT',
	'content' => Loc::getMessage('SITEMAP_IS_AGENT'),
	'title' => Loc::getMessage('SITEMAP_IS_AGENT'),
	'default' => true
);
$headerList['LAST_RUN'] = array(
	'id' => 'LAST_RUN',
	'content' => Loc::getMessage('SITEMAP_LAST_RUN'),
	'title' => Loc::getMessage('SITEMAP_LAST_RUN'),
	'sort' => 'LAST_RUN',
    'default' => true
);
$headerList['DATE_CREATE'] = array(
	'id' => 'DATE_CREATE',
	'content' => GetMessage("LUXAR_INDEXCONTROL_SOZDAN"),
	'title' => GetMessage("LUXAR_INDEXCONTROL_SOZDAN"),
	'sort' => 'DATE_CREATE',
);
$headerList['TIMESTAMP_X'] = array(
	'id' => 'TIMESTAMP_X',
	'content' => GetMessage("LUXAR_INDEXCONTROL_IZMENEN"),
	'title' => GetMessage("LUXAR_INDEXCONTROL_IZMENEN"),
	'sort' => 'TIMESTAMP_X',
	'default' => true
);
$headerList['MODIFIED'] = array(
	'id' => 'MODIFIED',
	'content' => GetMessage("SITEMAP_MODIFY_NAME"),
	'title' => GetMessage("SITEMAP_MODIFY_NAME"),
	'sort' => 'MODIFIED',
);
$headerList['CREATED'] = array(
	'id' => 'CREATED',
	'content' => GetMessage("SITEMAP_CREATED_NAME"),
	'title' => GetMessage("SITEMAP_CREATED_NAME"),
	'sort' => 'CREATED',
);
$headerList['RUN'] = array(
	'id' => 'RUN',
    'default' => true,
);
$adminList->AddHeaders($headerList);

$selectFields = array_fill_keys($adminList->GetVisibleHeaderColumns(), true);

unset(
    $selectFields['RUN'],
    $headerList['RUN'],
	$selectFields['IS_AGENT'],
    $headerList['IS_AGENT']
);

$selectFields['ID'] = true;
$selectFieldsMap = array_fill_keys(array_keys($headerList), false);

$selectFieldsMap = array_merge($selectFieldsMap, $selectFields);
$selectFields['ACTIVE'] = true;

global $by, $order;
if (!isset($by))
	$by = 'ID';
if (!isset($order))
	$order = 'ASC';

$usePageNavigation = true;
$navyParams = array();
if (isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'excel')
{
	$usePageNavigation = false;
}
else
{
	$navyParams = CDBResult::GetNavParams(CAdminUiResult::GetNavSize($adminListTableID));
	if ($navyParams['SHOW_ALL'])
	{
		$usePageNavigation = false;
	}
	else
	{
		$navyParams['PAGEN'] = (int)$navyParams['PAGEN'];
		$navyParams['SIZEN'] = (int)$navyParams['SIZEN'];
	}
}

$getListParams = array(
	'select' => array_keys($selectFields),
	'filter' => $filter,
	'order' => array($by => $order)
);
if ($usePageNavigation)
{
	$getListParams['limit'] = $navyParams['SIZEN'];
	$getListParams['offset'] = $navyParams['SIZEN']*($navyParams['PAGEN']-1);
}
$totalCount = 0;
$totalPages = 0;
if ($usePageNavigation)
{
	$totalCount = SitemapTable::getCount($getListParams['filter']);

	if ($totalCount > 0)
	{
		$totalPages = ceil($totalCount/$navyParams['SIZEN']);
		if ($navyParams['PAGEN'] > $totalPages)
			$navyParams['PAGEN'] = $totalPages;
	}
	else
	{
		$navyParams['PAGEN'] = 1;
	}
	$getListParams['limit'] = $navyParams['SIZEN'];
	$getListParams['offset'] = $navyParams['SIZEN']*($navyParams['PAGEN']-1);
}

$rowsIterator = new CAdminUiResult(SitemapTable::getList($getListParams), $adminListTableID);
if ($usePageNavigation)
{
	$rowsIterator->NavStart($getListParams['limit'], $navyParams['SHOW_ALL'], $navyParams['PAGEN']);
	$rowsIterator->NavRecordCount = $totalCount;
	$rowsIterator->NavPageCount = $totalPages;
	$rowsIterator->NavPageNomer = $navyParams['PAGEN'];
}
else
{
	$rowsIterator->NavStart();
}

$adminList->SetNavigationParams($rowsIterator, array("BASE_LINK" => $selfFolderUrl.$BASE_FILE));

$userList = array();
$arUserID = array();
$nameFormat = CSite::GetNameFormat(true);

$arRows = array();


$arRows = array();
while ($arRow = $rowsIterator->fetch())
{
	$id = intval($arRow['ID']);

	if ($selectFieldsMap['CREATED'])
	{
		$arRow['CREATED'] = (int)$arRow['CREATED'];
		if ($arRow['CREATED'] > 0)
			$arUserID[$arRow['CREATED']] = true;
	}
	if ($selectFieldsMap['MODIFIED'])
	{
		$arRow['MODIFIED'] = (int)$arRow['MODIFIED'];
		if ($arRow['MODIFIED'] > 0)
			$arUserID[$arRow['MODIFIED']] = true;
	}
	$urlEdit = $MODULE_ID.'_sitemap_edit.php?ID='.$arRow['ID'];
	$urlEdit = $adminSidePanelHelper->editUrlToPublicPage($urlEdit);

	$arRows[$arRow['ID']] = $row = &$adminList->AddRow(
		$arRow['ID'],
		$arRow,
		$urlEdit,
		GetMessage("LUXAR_INDEXCONTROL_IZMENITQ")
	);

	$inAgent = \Luxar\Sitemap\SitemapAgent::checkExist($arRow["ID"]);

	$row->AddCheckField('ACTIVE');
	$row->AddViewField("ID", $arRows['ID']);
	$row->AddViewField('TIMESTAMP_X', $arRows['TIMESTAMP_X']);
	$row->AddViewField('DATE_RUN', $arRows['DATE_RUN'] ? $arRows['DATE_RUN'] : Loc::getMessage('SITEMAP_DATE_RUN_NEVER'));
	$row->AddViewField('SITE_ID', '<a href="'.$module_id.'_site_edit.php?lang='.LANGUAGE_ID.'&amp;LID='.$arRows['SITE_ID'].'">['.$arRow['SITE_ID'].'] '.$arSites[$arRow['SITE_ID']]['NAME'].'</a>');

	$row->AddViewField("NAME", '<a href="'.$module_id.'_sitemap_edit.php?ID='.$arRow["ID"].'&amp;lang='.LANGUAGE_ID.'" title="'.Loc::getMessage("SITEMAP_EDIT_TITLE").'">'.Converter::getHtmlConverter()->encode($arRow['NAME']).'</a>');
	$row->AddInputField("NAME", ['size' => 50, 'maxlength' => 255]);
	$row->AddViewField("DESCRIPTION", $arRow['DESCRIPTION']);
	$row->AddInputField("DESCRIPTION", ['size' => 50, 'maxlength' => 255]);

	$row->AddViewField("IS_AGENT", $inAgent?GetMessage("LUXAR_INDEXCONTROL_DA"):GetMessage("LUXAR_INDEXCONTROL_NET"));

	$row->AddViewField("RUN", '<button type="button" class="ui-btn ui-btn-success ui-btn-sm" onclick="generateSitemap('.$arRow['ID'].')" name="save" id="sitemap_run_button_'.$arRow['ID'].'">'.Converter::getHtmlConverter()->encode(Loc::getMessage('SITEMAP_RUN')).'</button>');

	$rowAction = array(
		array(
			"TEXT" => Loc::getMessage("SITEMAP_EDIT"),
			"ACTION" => $adminList->ActionRedirect($module_id."_sitemap_edit.php?ID=".$arRow["ID"]."&lang=".LANGUAGE_ID),
			"DEFAULT" => true,
		),
		array(
			"TEXT" => Loc::getMessage("SITEMAP_RUN"),
			"ACTION" => 'generateSitemap('.$arRow['ID'].');',
		),
		array(
			"TEXT" => !$inAgent?GetMessage("LUXAR_INDEXCONTROL_DOBAVITQ_AGENTA"):GetMessage("LUXAR_INDEXCONTROL_UBRATQ_AGENTA"),
			"ACTION" => $adminList->ActionDoGroup($id, !$inAgent?'addAgent':'removeAgent'),
		),
        array(
            "TEXT" => Loc::getMessage("SITEMAP_DELETE"),
            "ACTION" => "if(confirm('".\CUtil::JSEscape(Loc::getMessage('SITEMAP_DELETE_CONFIRM'))."')) ".$adminList->ActionDoGroup($id, "delete")
        ),
	);


	$row->AddActions($rowAction);
}
if (isset($row))
	unset($row);

if (isset($arRow))
	unset($arRow);

if ($selectFieldsMap['CREATED'] || $selectFieldsMap['MODIFIED'])
{
	if (!empty($arUserID))
	{
		$userIterator = UserTable::getList(array(
			'select' => array('ID', 'LOGIN', 'NAME', 'LAST_NAME', 'SECOND_NAME', 'EMAIL'),
			'filter' => array('ID' => array_keys($arUserID)),
		));
		while ($arOneUser = $userIterator->fetch())
		{
			$arOneUser['ID'] = (int)$arOneUser['ID'];
			$userList[$arOneUser['ID']] = '<a href="/bitrix/admin/user_edit.php?lang='.LANGUAGE_ID.'&ID='.$arOneUser['ID'].'">'.CUser::FormatName($nameFormat, $arOneUser).'</a>';
		}
		unset($arOneUser, $userIterator);
	}

	foreach ($arRows as &$row)
	{
		if ($selectFieldsMap['CREATED'])
		{
			$strCreatedBy = '';
			if ($row->arRes['CREATED'] > 0 && isset($userList[$row->arRes['CREATED']]))
			{
				$strCreatedBy = $userList[$row->arRes['CREATED']];
			}
			$row->AddViewField("CREATED", $strCreatedBy);
		}
		if ($selectFieldsMap['MODIFIED'])
		{
			$strModifiedBy = '';
			if ($row->arRes['MODIFIED'] > 0 && isset($userList[$row->arRes['MODIFIED']]))
			{
				$strModifiedBy = $userList[$row->arRes['MODIFIED']];
			}
			$row->AddViewField("MODIFIED", $strModifiedBy);
		}
	}
	if (isset($row))
		unset($row);
}

$adminList->AddGroupActionTable(
	array(
		"edit" => true,
		"delete" => true,
		"activate" => Loc::getMessage("MAIN_ADMIN_LIST_ACTIVATE"),
		"deactivate" => Loc::getMessage("MAIN_ADMIN_LIST_DEACTIVATE"),
	)
);

$arDDMenu = array();
foreach($sitesList as $k => $v)
{
	$arDDMenu[] = array(
		"HTML" => $v,
		"LINK" => $module_id."_sitemap_edit.php?lang=".LANGUAGE_ID."&site_id=".$k
	);
}

$aContext = array();
$aContext[] = array(
	"TEXT"	=> Loc::getMessage("SEO_ADD_SITEMAP").' ('.$arDDMenu[0]['HTML'].')',
	"TITLE"	=> Loc::getMessage("SEO_ADD_SITEMAP_TITLE").' ('.$arDDMenu[0]['HTML'].')',
	"ICON"	=> "btn_new",
    "LINK" => $arDDMenu[0]['LINK'],
	"MENU" => $arDDMenu
);

$adminList->AddAdminContextMenu($aContext);

$adminList->CheckListMode();

$APPLICATION->SetTitle(Loc::getMessage("SEO_SITEMAP_TITLE"));
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');

echo CLuxarSitemap::GetDemoMessage();

$adminList->DisplayFilter($filterFields);
$adminList->DisplayList();

?>
	<script>
      function generateSitemap(ID, NS) {
        if (NS === undefined) {
          NS = {};
        }

        var node = BX('sitemap_run');

        node.style.display = 'block';

        var windowPos = BX.GetWindowSize();
        var pos = BX.pos(node);

        if(pos.top > windowPos.scrollTop + windowPos.innerHeight)
        {
          window.scrollTo(windowPos.scrollLeft, pos.top + 150 - windowPos.innerHeight);
        }

        BX.runSitemap(ID, NS);
      }

      BX.runSitemap = function(ID, NS)
      {
        BX.adminPanel.showWait(BX('sitemap_run_button_' + ID));

        BX.ajax.post('/bitrix/admin/<?=$module_id?>_sitemap_run.php', {
          lang:'<?=LANGUAGE_ID?>',
          action: 'sitemap_run',
          ID: ID,
          NS: NS,
          sessid: BX.bitrix_sessid()
        }, function(data)
        {
          BX.adminPanel.closeWait(BX('sitemap_run_button_' + ID));
          BX('sitemap_progress').innerHTML = data;
        });
      };

      BX.finishSitemap = function()
      {

      };
	</script>

	<div id="sitemap_run" style="display: none; margin: 20px 0; width: 50%;">
		<div id="sitemap_progress">
            <div class="ui-progressbar ui-progressbar-bg ui-progressbar-success ui-progressbar-lg">
                <div class="ui-progressbar-text-before"><?= Loc::getMessage("SITEMAP_GENERATE_PROGRESSBAR_TITLE") ?></div>
                <div class="ui-progressbar-track">
                    <div class="ui-progressbar-bar" style="width:0%;"></div>
                </div>
                <div class="ui-progressbar-text-after"><?= Loc::getMessage("SITEMAP_GENERATE_STEPS_PROGRESS", ['#STEP#' => 1, '#TOTAL#' => count(\Luxar\Sitemap\Sitemap::$generateSteps)]) ?></div>
            </div>
        </div>
	</div>
<?
if(isset($_REQUEST['run']) && check_bitrix_sessid())
{
	$ID = intval($_REQUEST['run']);
	if($ID > 0)
	{
		?>
		<script>BX.ready(BX.defer(function(){
            generateSitemap(<?=$ID?>, {});
          }));
		</script>
		<?
	}
}
?>
<?
require_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>