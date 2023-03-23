<?
IncludeModuleLangFile(__FILE__);
$arParams = $arFields['PARAMS']['S'][0];
?>
<tr id="wdi_SKIP_SINGLE_OFFER"<?if($arParams['LOAD_OFFERS']!='Y'):?> style="display:none"<?endif?>>
	<td class="adm-detail-content-cell-l" width="40%" valign="top">
		<label for="wdi_skip_single_offer_checkbox"><?=WdiHint(GetMessage('WDI_PARAM_SKIP_SINGLE_OFFER_HINT'));?> <?=GetMessage('WDI_PARAM_SKIP_SINGLE_OFFER');?></label>
	</td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div>
			<input type="hidden" name="PARAMS[S][0][SKIP_SINGLE_OFFER]" value="N" />
			<input type="checkbox" name="PARAMS[S][0][SKIP_SINGLE_OFFER]" id="wdi_skip_single_offer_checkbox" value="Y" <?if($arParams['SKIP_SINGLE_OFFER']=='Y'):?> checked="checked"<?endif?> />
			<script>
			BX.adminFormTools.modifyCheckbox(BX('wdi_skip_single_offer_checkbox'));
			</script>
		</div>
	</td>
</tr>
