<?
CWDI_Handler::IncludeLangFile(__FILE__);

$arFile = $arData['OBJ_EXCEL']->GetFile();
$arFormats = array();
for($i=1; $i<=$arSheetParams['SECTIONS_DEPTH']; $i++){
	$arFormats['SECTION_'.$i] = array(
		'NAME' => GetMessage('WDI_EXCEL_FORMAT_TYPE_SECTION').($arSheetParams['SECTIONS_DEPTH']=='1' ? '' : sprintf(GetMessage('WDI_EXCEL_FORMAT_TYPE_SECTION_LEVEL'),$i)),
	);
}
$arFormats['ELEMENT'] = array(
	'NAME' => GetMessage('WDI_EXCEL_FORMAT_TYPE_ELEMENT'),
);
#if(isset($_GET['load_offers']) && $_GET['load_offers']=='Y' || !isset($_GET['load_offers']) && $arParams['LOAD_OFFERS']=='Y'){
	$arFormats['OFFER'] = array(
		'NAME' => GetMessage('WDI_EXCEL_FORMAT_TYPE_OFFER'),
	);
#}
if($_GET['subaction']=='show_format_table' && $_GET['sheet']==$SheetIndex){CWDI::StopOutputBuffering();}
?>

<div class="excel_format_notice" style="color:#666; margin-bottom:20px;"><?=GetMessage('WDI_EXCEL_FORMAT_NOTICE');?></div>
<table class="adm-list-table wdi_format_general wdi_format_format" style="text-align:center">
	<thead>
		<tr class="adm-list-table-header">
			<th class="adm-list-table-cell"></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_COL_BACKGROUND_TITLE');?>"><?=GetMessage('WDI_EXCEL_FORMAT_COL_BACKGROUND');?></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_COL_FONT_TITLE');?>"><?=GetMessage('WDI_EXCEL_FORMAT_COL_FONT');?></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_COL_COLOR_TITLE');?>"><?=GetMessage('WDI_EXCEL_FORMAT_COL_COLOR');?></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_COL_SIZE_TITLE');?>"><?=GetMessage('WDI_EXCEL_FORMAT_COL_SIZE');?></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_COL_ITALIC');?>"><span class="col_icon bold">B</span></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_COL_BOLD');?>"><span class="col_icon italic">I</span></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_COL_UNDERLINE');?>"><span class="col_icon underline">U</span></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_COL_STRIKE');?>"><span class="col_icon strike">S</span></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_COL_INDEX_TITLE');?>" style="min-width:200px;"><?=GetMessage('WDI_EXCEL_FORMAT_COL_INDEX');?></th>
		</tr>
	</thead>
	<tbody>
		<?foreach($arFormats as $FormatType => $arFormat):?>
			<?$FormatTypeShort = in_array($FormatType,array('ELEMENT','OFFER')) ? $FormatType : (preg_match('#^SECTION_(\d+)$#i',$FormatType)?'SECTION':'');?>
			<tr class="adm-list-table-row" data-type="<?=$FormatType;?>" data-type-short="<?=$FormatTypeShort;?>">
				<td class="adm-list-table-cell">
					<span class="name"><?=$arFormat['NAME'];?></span>
				</td>
				<td class="adm-list-table-cell" style="white-space:nowrap;">
					<?$ID = 'wdi_format_'.$SheetIndex.'_'.$FormatType.'_BG_COLOR';?>
					<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][BG_COLOR]" maxlength="7" size="7" value="<?=$arSheetParams['FORMAT'][$FormatType]['BG_COLOR'];?>" class="wdi_color" placeholder="#FFFFFF" id="<?=$ID;?>" />
					<input type="button" value="..." onclick="WdiPickFormat_OpenPopup('<?=$ID;?>','BG_COLOR','<?=$arFile['FILE_ABS'];?>','<?=$SheetIndex;?>');" class="wdi_excel_format_button_pick" />
				</td>
				<td class="adm-list-table-cell">
					<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][FONT_FAMILY]" maxlength="7" size="20" value="<?=$arSheetParams['FORMAT'][$FormatType]['FONT_FAMILY'];?>" placeholder="Tahoma" />
				</td>
				<td class="adm-list-table-cell">
					<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][FONT_COLOR]" maxlength="7" size="7" value="<?=$arSheetParams['FORMAT'][$FormatType]['FONT_COLOR'];?>" class="wdi_color" placeholder="#000000" />
				</td>
				<td class="adm-list-table-cell">
					<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][FONT_SIZE]" maxlength="2" size="3" value="<?=$arSheetParams['FORMAT'][$FormatType]['FONT_SIZE'];?>" style="width:30px" placeholder="10" />
				</td>
				<td class="adm-list-table-cell">
					<input type="hidden" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][BOLD]" value="N" />
					<input type="checkbox" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][BOLD]" value="Y"<?if($arSheetParams['FORMAT'][$FormatType]['BOLD']=='Y'):?> checked="checked"<?endif?> />
				</td>
				<td class="adm-list-table-cell">
					<input type="hidden" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][ITALIC]" value="N" />
					<input type="checkbox" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][ITALIC]" value="Y"<?if($arSheetParams['FORMAT'][$FormatType]['ITALIC']=='Y'):?> checked="checked"<?endif?> />
				</td>
				<td class="adm-list-table-cell">
					<input type="hidden" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][UNDERLINE]" value="N" />
					<input type="checkbox" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][UNDERLINE]" value="Y"<?if($arSheetParams['FORMAT'][$FormatType]['UNDERLINE']=='Y'):?> checked="checked"<?endif?> />
				</td>
				<td class="adm-list-table-cell">
					<input type="hidden" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][STRIKE]" value="N" />
					<input type="checkbox" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][STRIKE]" value="Y"<?if($arSheetParams['FORMAT'][$FormatType]['STRIKE']=='Y'):?> checked="checked"<?endif?> />
				</td>
				<td class="adm-list-table-cell">
					<select class="wdi_matches_source" name="PARAMS[S][<?=$SheetIndex;?>][FORMAT][<?=$FormatType;?>][COLUMN]" style="width:100%">
						<?foreach($arData['MATCHES'][$FormatTypeShort] as $MatchCode => $arMatch):?>
							<option value="<?=$MatchCode;?>"<?if($arSheetParams['FORMAT'][$FormatType]['COLUMN']==$MatchCode):?> selected="selected"<?endif?>><?=$arMatch['NAME'];?></option>
						<?endforeach?>
					</select>
				</td>
			</tr>
		<?endforeach?>
	</tbody>
</table>
<?if($_GET['subaction']=='show_format_table' && $_GET['sheet']==$SheetIndex){die();}?>

<script>
/**
 *	Dialog: Pick Format
 */
var WdiPickFormatPopup = new BX.CDialog({
	title: '<?=GetMessage('WDI_EXCEL_PICKFORMAT_POPUP_TITLE');?>',
	content: '',
	icon: 'head-block',
	resizable: true,
	draggable: true,
	height: '450',
	width: '980'
});
$(WdiPickFormatPopup.DIV).css({
	'-moz-user-select': 'none',
	'-webkit-user-select': 'none',
	'-ms-user-select': 'none',
	'user-select': 'none'
});
WdiPickFormatPopup.SetButtons(
	[{
		'title': '<?=GetMessage('WDI_EXCEL_PICKFORMAT_POPUP_SAVE');?>',
		'id': 'action_send',
		'name': 'action_send',
		'className': 'adm-btn-green',
		'action': function(){
			if($('#wdi_pickformat_value').is('.picked')) {
				this.parentWindow.Close();
				$('#'+$('#wdi_pickformat_sender_id').val()).val($('#wdi_pickformat_value').text());
			} else {
				alert('<?=GetMessage('WDI_EXCEL_PICKFORMAT_POPUP_NOT_PICKED');?>');
			}
		}
	}, {
		'title': '<?=GetMessage('WDI_EXCEL_PICKFORMAT_POPUP_CANCEL');?>',
		'id': 'cancel',
		'name': 'cancel',
		'action': function(){
			this.parentWindow.Close();
		}
	}]
);
function WdiPickFormat_LoadContent(Page) {
	BX.showWait();
	Page = parseInt(Page);
	if(isNaN(Page)) {
		Page = 1;
	}
	if(Page>=1) {
		WdiPickFormatPopup.SetContent('<?=GetMessage("WDI_LOADING");?>');
		var	Handler = '<?=$arData['OBJ_EXCEL']->arFields['HANDLER'];?>';
		if(Handler.length==0) {
			Handler = $('#wdi_handler_select').val();
		}
		var ProfileID = '<?=$arFields['ID'];?>';
		if(ProfileID.length==0) {
			ProfileID = '0';
		}
		$.ajax({
			url: location.pathname+'?lang=<?=LANGUAGE_ID?>&action=show_handler_settings&subaction=show_pickformat_popup&handler='+Handler+'&ID='+ProfileID+'&sender_id='+window.WdiPickFormat_SenderID+'&type='+window.WdiPickFormat_Type+'&file='+window.WdiPickFormat_File+'&sheet_index='+window.WdiPickFormat_SheetIndex+'&page='+Page+'&r='+Math.random(),
			type: 'POST',
			data: $('#WDI_Tabs_form').serialize(),
			success: function(HTML) {
				$(WdiPickFormatPopup.PARTS.CONTENT_DATA).children('.bx-core-adm-dialog-content-wrap-inner').children('div').first().html(HTML);
				BX.closeWait();
			},
			error: function(){
				WdiPickFormatPopup.SetContent('');
				BX.closeWait();
			}
		});
	}
}
function WdiPickFormat_OpenPopup(SenderID, Type, File, SheetIndex) {
	WdiPickFormatPopup.Show();
	window.WdiPickFormat_SenderID = SenderID;
	window.WdiPickFormat_Type = Type;
	window.WdiPickFormat_File = File;
	window.WdiPickFormat_SheetIndex = SheetIndex;
	WdiPickFormat_LoadContent(1);
}
</script>
