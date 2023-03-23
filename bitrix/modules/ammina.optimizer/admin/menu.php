<?
IncludeModuleLangFile(__FILE__);
global $APPLICATION;
if (CMain::GetGroupRight("ammina.optimizer") >= "R") {
	$arAllExistsSetting = array();
	if (class_exists("\\Ammina\\Optimizer\\SettingsTable")) {
		$rSettings = \Ammina\Optimizer\SettingsTable::getList(array(
			"select" => array(
				"ID", "SITE_ID"
			),
		));
		while ($arSetting = $rSettings->fetch()) {
			if ($arSetting['SITE_ID'] === "all") {
				$arAllExistsSetting[] = '.adm-submenu-item-name-link[href*="ammina.optimizer.settings.php?lang=' . LANGUAGE_ID . '&site=all"]';
			} else {
				$arAllExistsSetting[] = '.adm-submenu-item-name-link[href*="ammina.optimizer.settings.php?lang=' . LANGUAGE_ID . '&site=' . $arSetting['SITE_ID'] . '"]';
				//$arAllExistsSetting[] = '.adm-submenu-item-name-link[onclick*="menu_ammina_site_' . $arSetting['SITE_ID'] . '_settings_page"]';
			}
		}
	}
	if (!empty($arAllExistsSetting)) {
		$strStyle = '<style>' . implode(",", $arAllExistsSetting) . '{color:#006212;} ';
		foreach ($arAllExistsSetting as $k => $v) {
			$arAllExistsSetting[$k] = ".adm-submenu-item-active " . $v;
		}
		$strStyle .= implode(",", $arAllExistsSetting) . '{font-weight:bold;}';
		$strStyle .= '</style>';
		$APPLICATION->AddHeadString($strStyle);
	}
	$arSitesMenu = array();
	$rSites = CSite::GetList($b, $o);
	$arSettingsMenu = array(
		array(
			"text" => GetMessage("AMMINA_OPTIMIZER_MENU_DEFAULT_SETTINGS_TEXT"),
			"title" => GetMessage("AMMINA_OPTIMIZER_MENU_DEFAULT_SETTINGS_TITLE"),
			"items_id" => "menu_ammina_def_settings_page",
			"url" => "ammina.optimizer.settings.php?lang=" . LANGUAGE_ID . "&site=all",
		),
	);

	while ($arSite = $rSites->Fetch()) {
		$arSettingsMenu[] = array(
			"text" => "[" . $arSite['LID'] . "] " . $arSite['NAME'],
			"title" => "[" . $arSite['LID'] . "] " . $arSite['NAME'],
			"items_id" => "menu_ammina_site_" . $arSite['LID'] . "_settings_page",
			"url" => "ammina.optimizer.settings.php?lang=" . LANGUAGE_ID . "&site=" . $arSite['LID'],
		);
	}

	$arSettingsMenu[] = array(
		"text" => GetMessage("AMMINA_OPTIMIZER_MENU_SETTINGS_HISTORY_TEXT"),
		"title" => GetMessage("AMMINA_OPTIMIZER_MENU_SETTINGS_HISTORY_TITLE"),
		"items_id" => "menu_ammina_optimizer_settings_history_page",
		"url" => "ammina.optimizer.settings.history.php?lang=" . LANGUAGE_ID,
	);

	$arSettingsMenu[] = array(
		"text" => GetMessage("AMMINA_OPTIMIZER_MENU_SETTINGS_IMPORT_TEXT"),
		"title" => GetMessage("AMMINA_OPTIMIZER_MENU_SETTINGS_IMPORT_TITLE"),
		"items_id" => "menu_ammina_optimizer_settings_import_page",
		"url" => "ammina.optimizer.settings.import.php?lang=" . LANGUAGE_ID,
	);


	$aMenu = array(
		"parent_menu" => "global_menu_services",
		"section" => "ammina.optimizer",
		"sort" => 10000,
		"text" => GetMessage("AMMINA_OPTIMIZER_MENU_TEXT"),
		"title" => GetMessage("AMMINA_OPTIMIZER_MENU_TITLE"),
		"icon" => "AMMINA_OPTIMIZER_menu_icon",
		"page_icon" => "AMMINA_OPTIMIZER_page_icon",
		"items_id" => "menu_ammina_optimizer",
		"items" => array(
			array(
				"text" => GetMessage("AMMINA_OPTIMIZER_MENU_QUICK_SETTING_TEXT"),
				"title" => GetMessage("AMMINA_OPTIMIZER_MENU_QUICK_SETTING_TITLE"),
				"items_id" => "menu_ammina_quick_setting_page",
				"url" => "ammina.optimizer.quick.setting.php?lang=" . LANGUAGE_ID,
			),
			array(
				"text" => GetMessage("AMMINA_OPTIMIZER_MENU_SETTINGS_TEXT"),
				"title" => GetMessage("AMMINA_OPTIMIZER_MENU_SETTINGS_TITLE"),
				"items_id" => "menu_ammina_settings_page",
				"items" => $arSettingsMenu
			),

			array(
				"text" => GetMessage("AMMINA_OPTIMIZER_MENU_AUDIT_TEXT"),
				"title" => GetMessage("AMMINA_OPTIMIZER_MENU_AUDIT_TITLE"),
				"items_id" => "menu_ammina_audit_page",
				"items" => array(
					array(
						"text" => GetMessage("AMMINA_OPTIMIZER_MENU_PAGE_TEXT"),
						"title" => GetMessage("AMMINA_OPTIMIZER_MENU_PAGE_TITLE"),
						"items_id" => "menu_ammina_optimizer_page",
						"url" => "ammina.optimizer.page.php?lang=" . LANGUAGE_ID,
						"more_url" => array(
							"ammina.optimizer.page.edit.php",
						),
					),
					array(
						"text" => GetMessage("AMMINA_OPTIMIZER_MENU_HISTORY_TEXT"),
						"title" => GetMessage("AMMINA_OPTIMIZER_MENU_HISTORY_TITLE"),
						"items_id" => "menu_ammina_optimizer_history",
						"url" => "ammina.optimizer.history.php?lang=" . LANGUAGE_ID,
						"more_url" => array(
							"ammina.optimizer.history.edit.php",
						),
					),
				),
			),

			array(
				"text" => GetMessage("AMMINA_OPTIMIZER_MENU_STAT_TEXT"),
				"title" => GetMessage("AMMINA_OPTIMIZER_MENU_STAT_TITLE"),
				"items_id" => "menu_ammina_stat_page",
				"items" => array(
					array(
						"text" => GetMessage("AMMINA_OPTIMIZER_MENU_STAT_CACHE_TEXT"),
						"title" => GetMessage("AMMINA_OPTIMIZER_MENU_STAT_CACHE_TITLE"),
						"items_id" => "menu_ammina_optimizer_stat_cache",
						"url" => "ammina.optimizer.stat.cache.php?lang=" . LANGUAGE_ID,
						"more_url" => array(),
					),
					array(
						"text" => GetMessage("AMMINA_OPTIMIZER_MENU_STAT_FILES_TEXT"),
						"title" => GetMessage("AMMINA_OPTIMIZER_MENU_STAT_FILES_TITLE"),
						"items_id" => "menu_ammina_optimizer_stat_cache",
						"url" => "ammina.optimizer.stat.files.php?lang=" . LANGUAGE_ID,
						"more_url" => array(
							"ammina.optimizer.stat.files.view.php",
						),
					),
				),
			),
			array(
				"text" => GetMessage("AMMINA_OPTIMIZER_MENU_HELP_TEXT"),
				"title" => GetMessage("AMMINA_OPTIMIZER_MENU_HELP_TITLE"),
				"items_id" => "menu_ammina_optimizer_help",
				"url" => "ammina.optimizer.help.php?lang=" . LANGUAGE_ID,
				"more_url" => array(),
			),
			array(
				"text" => GetMessage("AMMINA_OPTIMIZER_MENU_GETKEY_TEXT"),
				"title" => GetMessage("AMMINA_OPTIMIZER_MENU_GETKEY_TITLE"),
				"items_id" => "menu_ammina_optimizer_getkey",
				"url" => "ammina.optimizer.get.key.php?lang=" . LANGUAGE_ID,
				"more_url" => array(),
			),
		),
	);

	return $aMenu;
}

return false;
