<?IncludeModuleLangFile(__FILE__);?>
<script>
/**
 *	Dialog: settings
 */
var WdiFieldSettingsTitleDef = '<?=GetMessage('WDI_FIELD_SETTINGS_POPUP_TITLE');?>';
var WdiFieldSettingsPopup = new BX.CDialog({
	title: '',
	content: '',
	resizable: true,
	draggable: true,
	height: '400',
	width: '800'
});
function WdiSettings_OpenPopup(Sender) {
	var Button = $(Sender);
	var Row = Button.parents('tr').first();
	var PopupTitle = WdiFieldSettingsTitleDef + ' "' + Row.find('span.name').text() + '" ' + Row.find('span.meta').text();
	WdiFieldSettingsPopup.SetContent('<div class="wdi_loader_16"><?=GetMessage('WDI_MATCHES_SETTINGS_POPUP_LOADING');?></div>');
	WdiFieldSettingsPopup.SetTitle(PopupTitle);
	WdiFieldSettingsPopup.Show();
	WdiFieldSettingsPopup.ParamsInput = Row.find('input[type=hidden].params');
	var Type = Row.find('input[type=hidden].type').val();
	var IBlockID = Row.find('input[type=hidden].iblock_id').val();
	var HlBlockID = Row.find('input[type=hidden].hlblock_id').val();
	var Multiple = Row.find('input[type=hidden].multiple').val();
	var SourceSelect = Row.find('.wdi_matches_source');
	var Params = Row.parents('table').first().attr('data-params');
	var Handler = '<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>';
	var UrlParams = 'ID=<?=IntVal($arFields['ID']);?>&';
			UrlParams += 'lang=<?=LANGUAGE_ID;?>&';
			UrlParams += 'action=show_matches_field_settings&';
			UrlParams += 'handler='+(Handler.length>0 ? Handler : $('#wdi_handler_select').val())+'&';
			UrlParams += 'group='+Button.attr('data-group')+'&';
			UrlParams += 'multiple='+Multiple+'&';
			UrlParams += 'code='+Button.attr('data-code')+'&';
			UrlParams += 'type='+Type+'&';
			UrlParams += 'source='+SourceSelect.val()+'&';
			UrlParams += 'iblock_id='+IBlockID+'&';
			UrlParams += 'hlblock_id='+HlBlockID+'&';
			UrlParams += 'params='+Params+'&';
			UrlParams += WdiFieldSettingsPopup.ParamsInput.val();
	$.ajax({
		url: '<?=$_SERVER['PHP_SELF']?>',
		type: 'GET',
		data: UrlParams,
		success: function(HTML) {
			var PopupWindow = $(WdiFieldSettingsPopup.DIV).find('.bx-core-adm-dialog-content-wrap-inner').children('div').first();
			PopupWindow.html(HTML).find('form input[type=checkbox]').each(function(){
				BX.adminFormTools.modifyCheckbox(this);
			});
			PopupWindow.find('form').children('table').addClass('adm-list-table').children('tbody').children('tr').addClass('adm-list-table-row').children('td').addClass('adm-list-table-cell');
		}
	});
}
WdiFieldSettingsPopup.SetButtons(
	[{
		'title': '<?=GetMessage('WDI_FIELD_SETTINGS_SAVE');?>',
		'id': 'action_save',
		'className': 'adm-btn-green',
		'name': '<?=GetMessage('WDI_FIELD_SETTINGS_SAVE')?>',
		'action': function(){
			WdiFieldSettingsPopup.ParamsInput.val($(WdiFieldSettingsPopup.GetContent()).find('form').serialize());
			this.parentWindow.Close();
		}
	}, {
		'title': '<?=GetMessage('WDI_FIELD_SETTINGS_CANCEL');?>',
		'id': 'cancel',
		'name': '<?=GetMessage('WDI_FIELD_SETTINGS_CANCEL')?>',
		'action': function(){
			this.parentWindow.Close();
		}
	}]
);
/**
 *	Dialog: custom value
 */
var WdiFieldCustomValuePopup = new BX.CDialog({
	title: '<?=GetMessage('WDI_CUSTOM_VALUE_POPUP_TITLE');?>',
	content: '',
	resizable: false,
	draggable: true,
	height: '400',
	width: '800'
});
function WdiCustomValue_OpenPopup(Sender) {
	WdiFieldCustomValuePopup.SetContent('<div class="wdi_loader_16"><?=GetMessage('WDI_LOADING');?></div>');
	WdiFieldCustomValuePopup.Show();
	var Button = $(Sender);
	var Row = Button.parents('tr').first();
	WdiFieldCustomValuePopup.ParamsInput = Row.find('input[type=hidden].params');
	var Type = Row.find('input[type=hidden].type').val();
	var IBlockID = Row.find('input[type=hidden].iblock_id').val();
	var Multiple = Row.find('input[type=hidden].multiple').val();
	var SourceSelect = Row.find('.wdi_matches_source');
	var Handler = '<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>';
	var UrlParams = 'ID=<?=IntVal($arFields['ID']);?>&';
			UrlParams += 'lang=<?=LANGUAGE_ID;?>&';
			UrlParams += 'action=show_matches_field_custom_value&';
			UrlParams += 'handler='+(Handler.length>0 ? Handler : $('#wdi_handler_select').val())+'&';
			UrlParams += 'group='+Button.attr('data-group')+'&';
			UrlParams += 'multiple='+Multiple+'&';
			UrlParams += 'code='+Button.attr('data-code')+'&';
			UrlParams += 'type='+Type+'&';
			UrlParams += 'source='+SourceSelect.val()+'&';
			UrlParams += 'iblock_id='+IBlockID+'&';
			UrlParams += WdiFieldCustomValuePopup.ParamsInput.val();
	$.ajax({
		url: '<?=$_SERVER['PHP_SELF']?>',
		type: 'GET',
		data: UrlParams,
		success: function(HTML) {
			var PopupWindow = $(WdiFieldCustomValuePopup.DIV).find('.bx-core-adm-dialog-content-wrap-inner').children('div').first();
			PopupWindow.html(HTML).find('form input[type=checkbox]').each(function(){
				BX.adminFormTools.modifyCheckbox(this);
			});
			PopupWindow.find('form').children('table').addClass('adm-list-table').children('tbody').children('tr').addClass('adm-list-table-row').children('td').addClass('adm-list-table-cell');
		}
	});
}
WdiFieldCustomValuePopup.SetButtons(
	[{
		'title': '<?=GetMessage('WDI_MATCHES_POPUP_BUTTON_SAVE');?>',
		'id': 'action_save',
		'className': 'adm-btn-green',
		'name': 'action_save',
		'action': function(){
			WdiFieldCustomValuePopup.ParamsInput.val($(WdiFieldCustomValuePopup.GetContent()).find('form').serialize());
			this.parentWindow.Close();
		}
	}, {
		'title': '<?=GetMessage('WDI_MATCHES_POPUP_BUTTON_CANCEL');?>',
		'id': 'cancel',
		'name': 'cancel',
		'action': function(){
			this.parentWindow.Close();
		}
	}]
);
</script>