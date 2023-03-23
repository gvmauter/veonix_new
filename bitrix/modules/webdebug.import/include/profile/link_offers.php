<?
IncludeModuleLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex]['LINK']['OFFER'];
?>
<tr class="sheet_offers_link" id="wdi_param_offer_link_<?=$SheetIndex;?>"<?if($arParams['LOAD_OFFERS']!='Y'):?> style="display:none"<?endif?>>
	<td class="adm-detail-content-cell-l" width="40%" valign="middle"><?=WdiHint(GetMessage('WDI_PARAM_OFFERS_LINK_HINT'));?> <?=GetMessage('WDI_PARAM_OFFERS_LINK');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div id="excel_offers_link_<?=$SheetIndex;?>">
			<select name="PARAMS[S][<?=$SheetIndex;?>][LINK][OFFER][FIELD]">
				<option value="name"<?if($arSheetParams['FIELD']=='name'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_OFFERS_LINK_NAME');?></option>
				<option value="code"<?if($arSheetParams['FIELD']=='code'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_OFFERS_LINK_CODE');?></option>
				<option value="external_id"<?if($arSheetParams['FIELD']=='external_id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_OFFERS_LINK_EXTERNAL_ID');?></option>
				<option value="handler"<?if($arSheetParams['FIELD']=='handler'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_OFFERS_LINK_HANDLER');?></option>
				<option value="other"<?if($arSheetParams['FIELD']=='other'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_OFFERS_LINK_OTHER');?></option>
			</select>
		</div>
		<script>
		$('#excel_offers_link_<?=$SheetIndex;?> select').change(function(){
			$('#excel_offers_link_other_<?=$SheetIndex;?>').parents('tr').first().css('display',($(this).val()=='other'?'':'none'));
			$('#excel_offers_link_handler_<?=$SheetIndex;?>').parents('tr').first().css('display',($(this).val()=='handler'?'':'none'));
		});
		</script>
	</td>
</tr>
<tr class="sheet_offers_link"<?if($arParams['LOAD_OFFERS']!='Y' || $arSheetParams['FIELD']!='other'):?> style="display:none"<?endif?>>
	<td class="adm-detail-content-cell-l" width="40%" valign="middle"></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div id="excel_offers_link_other_<?=$SheetIndex;?>"><?=WdiHint(GetMessage('WDI_PARAM_OFFERS_LINK_OTHER_2_HINT'));?>&nbsp;<?=GetMessage('WDI_PARAM_OFFERS_LINK_OTHER_2');?>&nbsp;<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][LINK][OFFER][OTHER]" size="40" value="<?=$arSheetParams['OTHER'];?>" /></div>
	</td>
</tr>
<tr class="sheet_offers_link"<?if($arParams['LOAD_OFFERS']!='Y' || $arSheetParams['FIELD']!='handler'):?> style="display:none"<?endif?>>
	<td class="adm-detail-content-cell-l" width="40%" valign="middle"></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div id="excel_offers_link_handler_<?=$SheetIndex;?>"><?=WdiHint(GetMessage('WDI_PARAM_OFFERS_LINK_HANDLER_2_HINT',array('#FUNCTION#'=>GetMessage('WDI_PARAM_LINK_FUNCTION'))));?>&nbsp;<?=GetMessage('WDI_PARAM_OFFERS_LINK_HANDLER_2');?>&nbsp;<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][LINK][OFFER][HANDLER]" size="40" value="<?=$arSheetParams['HANDLER'];?>" /></div>
	</td>
</tr>