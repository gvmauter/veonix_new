<?
IncludeModuleLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex];
?>
<tr id="wdi_sheet_active_<?=$SheetIndex;?>">
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_EXCEL_ACTIVE');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div>
			<input type="hidden" name="PARAMS[S][<?=$SheetIndex;?>][ACTIVE]" value="N" />
			<input type="checkbox" name="PARAMS[S][<?=$SheetIndex;?>][ACTIVE]" value="Y" id="wdi_sheet_active_checkbox_<?=$SheetIndex;?>"<?if($arSheetParams['ACTIVE']=='Y'):?> checked="checked"<?endif?> data-id="<?=$SheetIndex;?>" />
			<script>
			$(document).ready(function(){
				$('#wdi_sheet_active_checkbox_<?=$SheetIndex;?> input[type=checkbox]').change(function(){
					var SheetButton = $('#wdi_handler_matches .wdi_excel_tabs a[href=#sheet_<?=$SheetIndex;?>]');
					if($(this).is(':checked')) {
						SheetButton.removeClass('wdi_excel_sheet_inactive');
					} else {
						SheetButton.addClass('wdi_excel_sheet_inactive');
					}
				});
			});
			BX.adminFormTools.modifyCheckbox(BX('wdi_sheet_active_checkbox_<?=$SheetIndex;?>'));
			</script>
		</div>
	</td>
</tr>
