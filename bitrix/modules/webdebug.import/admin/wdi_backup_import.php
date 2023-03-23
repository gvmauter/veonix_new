<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
CModule::IncludeModule('webdebug.import');
IncludeModuleLangFile(__FILE__);
?>

<br/>
<form action="/bitrix/admin/wdi_profiles.php?lang=<?=LANGUAGE_ID?>" id="WdiBackupForm" method="post" enctype="multipart/form-data">
	<div>
		<div class="webdebug-label"><?=GetMessage("WEBDEBUG_EXCEL_IMPORT_FILE")?></div><br/>
		<div class="webdebug-field">
			<input type="file" name="wdi_import_file" id="WdiBackupImportFile" />
			<input type="hidden" name="wdi_backup_import" value="Y" />
		</div>
	</div>
	<br/>
	<div>
		<div class="webdebug-label"><input type="checkbox" name="wdi_truncate" id="wdi_truncate" value="Y" /> <label for="wdi_truncate"><?=GetMessage("WDI_POPUP_BACKUP_TRUNCATE")?></label></div>
	</div>
</form>
