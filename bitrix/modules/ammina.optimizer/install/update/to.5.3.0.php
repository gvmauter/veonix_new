<?
if (IsModuleInstalled('ammina.optimizer')) {
	$updater->CopyFiles("install/admin", "admin/");
}

if ($updater->CanUpdateDatabase()) {
	if (!$updater->TableExists("am_optimizer_settings_history")) {
		$updater->Query(array(
			"MySQL" => "CREATE TABLE IF NOT EXISTS `am_optimizer_settings_history` (`ID` int(11) NOT NULL AUTO_INCREMENT, `SITE_ID` char(3) DEFAULT NULL, `SETTINGS` longtext DEFAULT NULL, `DATE_CHANGE` datetime DEFAULT NULL, `DESCRIPTION` text DEFAULT NULL, PRIMARY KEY (`ID`), KEY `IX_SITE_ID` (`SITE_ID`,`DATE_CHANGE`) USING BTREE);",
		));
	}
}
