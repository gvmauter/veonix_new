<?
CWDI_Handler::IncludeLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex];
?>
<tr class="wdi_sections_mode">
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_EXCEL_SECTIONS_MODE');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<select name="PARAMS[S][<?=$SheetIndex;?>][SECTIONS_MODE]" id="wdi_select_sections_mode_<?=$SheetIndex;?>">
			<option value="format"<?if($arSheetParams['SECTIONS_MODE']=='format'):?> selected="selected"<?endif?>><?=GetMessage('WDI_EXCEL_SECTIONS_MODE_FORMAT');?></option>
			<option value="columns"<?if($arSheetParams['SECTIONS_MODE']=='columns'):?> selected="selected"<?endif?>><?=GetMessage('WDI_EXCEL_SECTIONS_MODE_COLUMNS');?></option>
			<?/*<option value="depth"<?if($arSheetParams['SECTIONS_MODE']=='depth'):?> selected="selected"<?endif?>><?=GetMessage('WDI_EXCEL_SECTIONS_MODE_DEPTH');?></option>*/?>
			<option value="no"<?if($arSheetParams['SECTIONS_MODE']=='no'):?> selected="selected"<?endif?>><?=GetMessage('WDI_EXCEL_SECTIONS_MODE_NO');?></option>
		</select>
		<script>
		$('#wdi_select_sections_mode_<?=$SheetIndex;?>').change(function(){
			BX.onCustomEvent('wdiSectionsModeChange', [<?=$SheetIndex;?>,$(this).val()]);
		});
		</script>
	</td>
</tr>