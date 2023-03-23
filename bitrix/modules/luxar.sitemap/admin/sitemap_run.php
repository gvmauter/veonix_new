<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_admin_before.php");

$MODULE_ID = $module_id = 'luxar.sitemap';

define('ADMIN_MODULE_NAME', $module_id);

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(dirname(__FILE__).'/sitemap.php');

$modulePermissions = $APPLICATION->GetGroupRight($MODULE_ID);
if ($modulePermissions < 'W')
    $APPLICATION->AuthForm('');

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

$ID = intval($_REQUEST['ID']);
$NS = isset($_REQUEST['NS']) && is_array($_REQUEST['NS']) ? $_REQUEST['NS'] : array();


if(
    $_REQUEST['action'] == 'sitemap_run'
    && check_bitrix_sessid()
) {
	$result = \Luxar\Sitemap\Sitemap::generate($ID, $NS);

    echo CLuxarSitemap::GetDemoMessage();

	if ($result === false) {
	    $errors = \Luxar\Sitemap\Sitemap::getErrors();
	    ?>
        <div class="ui-alert ui-alert-danger ui-alert-icon-danger">
            <span class="ui-alert-message">
                <strong><?=GetMessage("LUXAR_INDEXCONTROL_OSIBKA")?></strong> <?=GetMessage("LUXAR_INDEXCONTROL_FAYL_NE_SFORMIROVAN")?><br>
                <?=implode('<br>', $errors)?>
            </span>
        </div>
        <?
	} elseif ($result['done'] != 'Y') {
	    $stepNum = 1;

	    foreach (\Luxar\Sitemap\Sitemap::$generateSteps as $k => $v) {
	        if ($v == $result['step']) {
		        $stepNum = $k + 1;
		        break;
            }
        }
		?>
        <div class="ui-progressbar ui-progressbar-bg ui-progressbar-success ui-progressbar-lg">
            <div class="ui-progressbar-text-before"><?= Loc::getMessage("SITEMAP_GENERATE_PROGRESSBAR_TITLE") ?></div>
            <div class="ui-progressbar-track">
                <div class="ui-progressbar-bar" style="width:<?=$result['percent']?>%;"></div>
            </div>
            <div class="ui-progressbar-text-after"><?= Loc::getMessage("SITEMAP_GENERATE_STEPS_PROGRESS", ['#STEP#' => $stepNum, '#TOTAL#' => count(\Luxar\Sitemap\Sitemap::$generateSteps)]) ?></div>
        </div>

        <script>
          top.BX.runSitemap(<?=$ID?>, <?=CUtil::PhpToJsObject($result)?>);
        </script>
		<?
	} else {
		?>
        <div class="ui-alert ui-alert-success ui-alert-icon-info">
            <span class="ui-alert-message">
                <strong><?=GetMessage("LUXAR_INDEXCONTROL_GENERACIA_VYPOLNENA")?></strong> <?=GetMessage("LUXAR_INDEXCONTROL_BYLI_SFORMIROVANY_SL")?><br><br>
                <a href="/<?=$result['rootSitemap']?>" target="_blank"><?=$result['rootSitemap']?></a><br>
                <?foreach ($result['indexSitemapFiles'] as $file):?>
                <a href="/<?=$file?>" target="_blank"><?=$file?></a><br>
                <?endforeach;?>
            </span>
        </div>

        <script>
          top.BX.finishSitemap();
        </script>
		<?
	}

}