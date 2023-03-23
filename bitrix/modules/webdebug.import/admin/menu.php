<?
$ModuleID = 'webdebug.import';
IncludeModuleLangFile(__FILE__);

if($APPLICATION->GetGroupRight($ModuleID)>='R') {
	$aMenu = array(
		'parent_menu' => 'global_menu_content',
		'section' => 'webdebug_import',
		'sort' => 990,
		'text' => GetMessage('WDI_MENUITEM'),
		'url' => '/bitrix/admin/wdi_profiles.php?lang='.LANGUAGE_ID,
		'icon' => 'wdi_icon_main',
		'more_url' => array('/bitrix/admin/wdi_profile.php'),
	);
	return $aMenu;
}

?>
