<?
CWDI_Handler::IncludeLangFile(__FILE__);
$arParams = $arFields['PARAMS']['S'][0];

if(empty($arFields['HANDLER']) || !is_array($arData['HANDLERS'][$arFields['HANDLER']]) || empty($arData['HANDLERS'][$arFields['HANDLER']])) {
	return;
}

?>
<tr id="wdi_MODE">
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=WdiHint(GetMessage('WDI_PARAM_MODE_HINT'));?> <?=GetMessage('WDI_PARAM_MODE');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div>
			<select class="mode_change" name="PARAMS[S][0][MODE]">
				<option value="<?=CWDI_Gifts::MODE_FULL;?>"<?if($arParams['MODE']==CWDI_Gifts::MODE_FULL):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_MODE_FULL');?></option>
				<option disabled value="<?=CWDI_Gifts::MODE_STOCK;?>"<?if($arParams['MODE']==CWDI_Gifts::MODE_STOCK):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_MODE_STOCK');?></option>
			</select>
		</div>
	</td>
</tr>
