<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");

/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Loader;
use Luxar\Sitemap\SitemapIblock;
use Luxar\Sitemap\SitemapIblockTable;

define("STOP_STATISTICS", true);
define("BX_SECURITY_SHOW_MESSAGE", true);

$MODULE_ID = $module_id = 'luxar.sitemap';

$modulePermissions = $APPLICATION->GetGroupRight($MODULE_ID);
if ($modulePermissions < 'W')
    $APPLICATION->AuthForm('');

Loc::loadMessages(dirname(__FILE__).'/sitemap.php');
Loc::loadMessages(__FILE__);

$includeResult = Loader::includeSharewareModule($MODULE_ID);
if ($includeResult == MODULE_DEMO_EXPIRED) {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
    echo CLuxarSitemap::GetDemoMessage();
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
	die();
}

if (!check_bitrix_sessid())
{
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
	$APPLICATION->AuthForm(GetMessage("LUXAR_INDEXCONTROL_DOSTUP_ZAPRESEN"));
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
	die();
}

$APPLICATION->SetTitle(GetMessage("LUXAR_INDEXCONTROL_DETALQNYE_NASTROYKI"));

if (!$includeResult) {
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
	ShowError(GetMessage("LUXAR_INDEXCONTROL_NE_USTANOVLEN_MODULQ").$module_id);
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
	die();
}


if ((!isset($_REQUEST['IBLOCK_ID'])) || (0 == strlen($_REQUEST['IBLOCK_ID'])))
{
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
	ShowError(GetMessage("LUXAR_INDEXCONTROL_NE_UKAZAN_INFOBLOK"));
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
	die();
}

$intIBlockID = (int)$_REQUEST['IBLOCK_ID'];

\Bitrix\Main\Loader::includeModule('iblock');

if (!$arIBlock = CIBlock::GetByID($intIBlockID)->Fetch())
{
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
	ShowError(str_replace('#ID#',$intIBlockID,GetMessage("LUXAR_INDEXCONTROL_INFOLOK_NE_NAYD")));
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
	die();
}

$SITEMAP_ID = (int)$_REQUEST['SITEMAP_ID'];
/*if ($SITEMAP_ID < 1)
{
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
	ShowError('Отсутствует SITEMAP_ID');
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
	die();
}*/

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if ($SITEMAP_ID > 0) {
		$arSettings = \Luxar\Sitemap\Sitemap::getSettings($SITEMAP_ID);
        $iblockSettings = $arSettings['SETTINGS']['IBLOCK'][$intIBlockID];
    }
	else {
	    $arSettings = array();

	    $detail = '';
		if (isset($_REQUEST['DETAIL'])) {
			$detail = unserialize($_REQUEST['DETAIL']);
		}

		$min_count_element = '';
		if (isset($_REQUEST['MIN_COUNT_ELEMENT'])) {
			$min_count_element = $_REQUEST['MIN_COUNT_ELEMENT'];
		}

		$exclude = '';
		if (isset($_REQUEST['EXCLUDE'])) {
			$exclude = unserialize($_REQUEST['EXCLUDE']);
		}

	    $iblockSettings = array(
            'SETTINGS' => array(
                'DETAIL' => $detail,
                'EXCLUDE' => $exclude,
                'MIN_COUNT_ELEMENT' => $min_count_element,
            )
        );
    }


	if (!empty($_REQUEST['save']))
	{
		$arErrors = array();

		$SETTINGS = $iblockSettings['SETTINGS'];
        if (is_array($SETTINGS))
		    $SETTINGS = array_merge($SETTINGS, $_POST['IBLOCK']);
        else {
            $SETTINGS = $_POST['IBLOCK'];
        }

		if ($SITEMAP_ID > 0) {
			$arFields = [
				'SETTINGS' => serialize(SitemapIblock::prepareSettings($SETTINGS)),
			];

			if (empty($arErrors))

                if (!empty($iblockSettings)) {
                    $result = SitemapIblockTable::update($iblockSettings['ID'], $arFields);
                }
                else {
                    $arFields['IBLOCK_ID'] = $intIBlockID;
                    $arFields['SITEMAP_ID'] = $SITEMAP_ID;

                    $result = SitemapIblockTable::add($arFields);
                }


			if (!$result->isSuccess()) {
				$arErrors = array_merge($arErrors, $result->getErrors());
			}
        }

		if (count($arErrors) == 0)
		{
			$arXMLData = array(
				'SITEMAP_ID' => $SITEMAP_ID,
				'IBLOCK_ID' => $intIBlockID,
				'DETAIL' => !empty($SETTINGS['DETAIL'])?serialize($SETTINGS['DETAIL']):'',
				'EXCLUDE' => !empty($SETTINGS['EXCLUDE'])?serialize($SETTINGS['EXCLUDE']):'',
				'MIN_COUNT_ELEMENT' => $SETTINGS['MIN_COUNT_ELEMENT'],
			);
			?>
			<script type="text/javascript">
	          top.BX.closeWait();
	          top.BX.WindowManager.Get().Close();
	          top.setDetailData("<?=addslashes(json_encode($arXMLData))?>");
			</script>
			<?
			die();
		}
		else
		{
			$e = new CAdminException(array(array('text' => implode("\n",$arErrors))));
			$message = new CAdminMessage(GetMessage("LUXAR_INDEXCONTROL_OSIBKA_SOHRANENIA"), $e);
			echo $message->Show();
		}
	}
	else
	{
		$aTabs = array(
			array("DIV" => "all", "TAB" => GetMessage("LUXAR_INDEXCONTROL_OBSIE"), "TITLE" => GetMessage("LUXAR_INDEXCONTROL_OBSIE_NASTROYKI_INFO")),
		);

		$hasCatalog = \Bitrix\Main\Loader::includeModule('catalog');
		$hasExclude = false;
		if ($hasCatalog) {
			$arCatalog = CCatalog::GetByID($arIBlock['ID']);

			if ($arCatalog) {
				$hasExclude = true;
			}
		}

		if ($hasExclude) {
			$aTabs[] = array("DIV" => "exclude", "TAB" => GetMessage("LUXAR_INDEXCONTROL_ISKLUCENIA"), "TITLE" => GetMessage("LUXAR_INDEXCONTROL_NASTROYKA_ISKLUCENIY"));
		}


		$tabControl = new CAdminTabControl("tabControl", $aTabs, true, true);

		require_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");

		function getSitemapItemSettings($name, $values = []) {
			$changefreq  = [
				'always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never'
			];
			?>
			<tr>
				<td width="40%"><label><?=GetMessage("LUXAR_INDEXCONTROL_VYBERITE")?></label></td>
				<td width="60%">
					<select name="<?=$name?>[changefreq]">
						<?foreach ($changefreq as $value):?>
							<option value="<?=$value?>"<?if($value == $values['changefreq']):?> selected<?endif?>><?=$value?></option>
						<?endforeach;?>
					</select>
				</td>
			</tr>
			<?
			$priority  = [
				'1', '0.9', '0.8', '0.7', '0.6', '0.5', '0.4', '0.3', '0.2', '0.1'
			];
			?>
			<tr>
				<td width="40%"><label><?=GetMessage("LUXAR_INDEXCONTROL_VYBERITE1")?></label></td>
				<td width="60%">
					<select name="<?=$name?>[priority]">
						<?foreach($priority as $value):?>
							<option value="<?=$value?>"<?if($value == $values['priority']):?> selected<?endif?>><?=$value?></option>
						<?endforeach;?>
					</select>
				</td>
			</tr>
			<?
		}

        echo CLuxarSitemap::GetDemoMessage();
		?>
		<form name="iblock_sitemap_form" method="POST" action="<?=$APPLICATION->GetCurPage()?>">
			<input type="hidden" name="lang" value="<?=LANGUAGE_ID?>">
			<input type="hidden" name="bxpublic" value="Y">
			<input type="hidden" name="Update" value="Y" />
			<input type="hidden" name="IBLOCK_ID" value="<?=$intIBlockID?>" />
			<input type="hidden" name="SITEMAP_ID" value="<?=$SITEMAP_ID?>" />
			<?=bitrix_sessid_post()?>
			<?
			$tabControl->Begin();
			$tabControl->BeginNextTab();
			?>
			<tr class="heading">
				<td colspan="2"><?=GetMessage("LUXAR_INDEXCONTROL_NASTROYKI_INFOBLOKA")?></td>
			</tr>
			<? getSitemapItemSettings('IBLOCK[DETAIL][iblock]', $iblockSettings['SETTINGS']['DETAIL']['iblock']); ?>

			<tr class="heading">
				<td colspan="2"><?=GetMessage("LUXAR_INDEXCONTROL_NASTROYKI_RAZDELOV")?></td>
			</tr>
			<tr>
				<td width="40%"><label><?=GetMessage("LUXAR_INDEXCONTROL_MINIMALQNOE_KOLICEST")?></label></td>
				<td width="60%"><input type="text" name="IBLOCK[MIN_COUNT_ELEMENT]" value="<?=$iblockSettings['SETTINGS']['MIN_COUNT_ELEMENT']?>"></td>
			</tr>
			<? getSitemapItemSettings('IBLOCK[DETAIL][sections]', $iblockSettings['SETTINGS']['DETAIL']['sections']); ?>
			<tr class="heading">
				<td colspan="2"><?=GetMessage("LUXAR_INDEXCONTROL_NASTROYKI_ELEMENTOV")?></td>
			</tr>
			<? getSitemapItemSettings('IBLOCK[DETAIL][elements]', $iblockSettings['SETTINGS']['DETAIL']['elements']); ?>
		<?if($hasExclude):?>
			<?
			$tabControl->BeginNextTab();
			?>
			<tr class="heading">
				<td colspan="2"><?=GetMessage("LUXAR_INDEXCONTROL_CENY")?></td>
			</tr>
			<tr>
				<td width="40%"><?=GetMessage("LUXAR_INDEXCONTROL_VKLUCATQ_TOLQKO_TOVA")?></td>
				<td width="60%">
					<input type="hidden" name="IBLOCK[EXCLUDE][PRICE][ON]" value="N">
					<input
						type="checkbox"
						name="IBLOCK[EXCLUDE][PRICE][ON]"
						value="Y"
						<?if($iblockSettings['SETTINGS']['EXCLUDE']['PRICE']['ON'] == 'Y'):?> checked<?endif;?>
						onchange="if($(this).is(':checked')) { $('.for_price').show(); } else { $('.for_price').hide(); }"
					>
				</td>
			</tr>
			<tr class="for_price"<?if($iblockSettings['SETTINGS']['EXCLUDE']['PRICE']['ON'] != 'Y'):?> style="display: none;"<?endif?>>
				<td width="40%"><?=GetMessage("LUXAR_INDEXCONTROL_TIP_CENY")?></td>
				<td width="60%">
					<select name="IBLOCK[EXCLUDE][PRICE][TYPE]">
						<?
						$rsGroup = \Bitrix\Catalog\GroupTable::getList([
							'order' => ['SORT' => 'ASC'],
						]);
						while($row = $rsGroup->fetch()) {
							$name = '['.$row['ID'].'] '.$row['NAME'];
							if($row['BASE'] == 'Y') {
								$name.= ' ('.GetMessage("LUXAR_INDEXCONTROL_BAZOVAA");
							}
							?>
							<option value="<?=$row['ID']?>"<?if($iblockSettings['SETTINGS']['EXCLUDE']['PRICE']['TYPE'] == $row['ID']):?> selected<?endif;?>><?=$name?></option>
							<?
						}
						?>
					</select>
				</td>
			</tr>
			<tr class="for_price"<?if($iblockSettings['SETTINGS']['EXCLUDE']['PRICE']['ON'] != 'Y'):?> style="display: none;"<?endif?>>
				<td width="40%"><?=GetMessage("LUXAR_INDEXCONTROL_MINIMALQNAA_CENA_TOV")?></td>
				<td width="60%">
					<input type="text" name="IBLOCK[EXCLUDE][PRICE][MIN]" value="<?=$iblockSettings['SETTINGS']['EXCLUDE']['PRICE']['MIN']?>">
				</td>
			</tr>
			<?/*(<tr>
				<td width="40%">Исключить адреса по маске:</td>
				<td width="60%">
					<input type="text" name="EXCLUDE[MASK]" value="<?=$iblockSettings['SETTINGS']['EXCLUDE']['MASK']?>">
				</td>
			</tr>*/?>
		<?endif?>
		<?
		$tabControl->EndTab();
		$tabControl->Buttons(array());
		$tabControl->End();

		require_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
	}
}