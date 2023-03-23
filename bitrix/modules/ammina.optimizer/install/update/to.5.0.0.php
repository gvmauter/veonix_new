<?
if ($updater->CanUpdateDatabase()) {
	if ($updater->TableExists("am_optimizer_settings")) {
		$arFields = $DB->GetTableFields("am_optimizer_settings");

		$updater->Query(array(
			"MySQL" => "DELETE FROM `am_optimizer_settings` WHERE `TYPE`!='a';",
		));
		if (isset($arFields['TYPE'])) {
			$updater->Query(array(
				"MySQL" => "DELETE FROM `am_optimizer_settings` WHERE `TYPE`!='a';",
			));
			$updater->Query(array(
				"MySQL" => "ALTER TABLE `am_optimizer_settings` DROP `TYPE`;",
			));
		}
	}
}
