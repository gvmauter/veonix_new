<script>
/**
 *	Dialog: Backup
 */
var WdiBackupPopup = new BX.CDialog({
	title: '<?=GetMessage("WDI_POPUP_BACKUP_TITLE");?>',
	content: '',
	icon: 'head-block',
	resizable: false,
	draggable: true,
	height: '230',
	width: '480'
});
WdiBackupPopup.SetButtons(
	[{
		'title': '<?=GetMessage("WDI_POPUP_BACKUP_SUBMIT");?>',
		'id': 'action_send',
		'name': 'action_send',
		'action': function(){
			var WdiBackupImportFile = BX("WdiBackupImportFile").value;
			if (WdiBackupImportFile!='') {
				var WdiBackupImportFileFormat = /(.tar.gz)$/ig;
				if (WdiBackupImportFile.match(WdiBackupImportFileFormat)) {
					BX.showWait();
					BX("WdiBackupImportFile").submit();
					this.parentWindow.Close();
				} else {
					alert('<?=GetMessage("WDI_POPUP_BACKUP_WRONG_FILE_FORMAT");?>');
				}
			} else {
				alert('<?=GetMessage("WDI_POPUP_BACKUP_NO_FILE_SELECTED");?>');
			}
		}
	}, {
		'title': '<?=GetMessage("WDI_POPUP_BACKUP_BTN_CANCEL");?>',
		'id': 'cancel',
		'name': 'cancel',
		'action': function(){
			this.parentWindow.Close();
		}
	}]
);
function WdiBackup_Callback(result) {
	WdiBackupPopup.SetContent(result);
	BX.adminFormTools.modifyFormElements(BX('WdiBackupForm'));
	BX.closeWait();
}
function WdiBackup_OpenPopup() {
	BX.showWait();
	WdiBackupPopup.SetContent('<?=GetMessage("WDI_LOADING");?>');
	jsAjaxUtil.LoadData('/bitrix/admin/wdi_backup_import.php?lang=<?=LANGUAGE_ID?>&' + Math.random(), WdiBackup_Callback);
	WdiBackupPopup.Show();
}
</script>