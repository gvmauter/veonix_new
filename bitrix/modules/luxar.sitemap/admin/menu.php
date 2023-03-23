<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
IncludeModuleLangFile(__FILE__);

$MODULE_ID = 'luxar.sitemap';

use Bitrix\Main\Localization\Loc;

if($APPLICATION->GetGroupRight($MODULE_ID) > "D") {
	if(
	    \Bitrix\Main\ModuleManager::isModuleInstalled($MODULE_ID)
        && \Bitrix\Main\Loader::includeSharewareModule($MODULE_ID) != MODULE_DEMO_EXPIRED
	) {

		IncludeModuleLangFile(__FILE__);

 		$aMenu = array(
			"parent_menu" => 'global_menu_luxar',
			"module_id" => $MODULE_ID,
			"sort" => 60,
			"text" => Loc::getMessage("LICM_SITEMAP"),
			"title" => Loc::getMessage("LICM_SITEMAP"),
			"icon" => "luxar_sitemap_menu_icon",
			"page_icon" => "luxar_sitemap_page_icon",
			"items_id" => $MODULE_ID."_items",
            "url" => $MODULE_ID."_sitemap.php",
			"more_url" => array(
                $MODULE_ID."_sitemap_edit.php",
                $MODULE_ID."_sitemap_run.php",
            ),
		);

		return $aMenu;
	}
}
return false;