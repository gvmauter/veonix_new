<?
IncludeModuleLangFile(__FILE__);
if(!$GLOBALS['WDI_CATALOG_INCLUDED']){
	print '<i>'.GetMessage('WDI_ERROR_NO_CATALOG_MODULE').'</i>';
	return false;
}
$ProfileID = IntVal($_GET['ID']);
$arVatList = CWDI::GetVatList();
$arCurrencyList = CWDI::GetCurrencyList();
$arMeasureList = CWDI::GetMeasureList();
$arParams = $arFields['PARAMS'];
$arPrices = CWDI::GetPriceTypeList();
$arStores = CWDI::GetStoresList();
if($ProfileID==0){
	if(isset($arCurrencyList['USD']) && empty($arParams['CURRENCY_DESIGNATIONS']['USD'])){
		$arParams['CURRENCY_DESIGNATIONS']['USD'] = '$';
	}
	if(isset($arCurrencyList['EUR']) && empty($arParams['CURRENCY_DESIGNATIONS']['EUR'])){
		$arParams['CURRENCY_DESIGNATIONS']['EUR'] = '&euro;';
	}
}
?>
<table class="adm-list-table">
	<tbody>
		<tr class="heading"><td colspan="2"><?=GetMessage('WDI_SETTINGS_GROUP_CATALOG_DEFAULTS');?></td></tr>
		<tr id="wdi_ELEMENTS_QUANTITY_TRACE">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_ELEMENTS_QUANTITY_TRACE_HINT'));?> <?=GetMessage('WDI_SETTINGS_ELEMENTS_QUANTITY_TRACE');?>:</td>
			<td width="60%">
				<select name="PARAMS[ELEMENTS_QUANTITY_TRACE]">
					<option value="D"<?if(!in_array($arParams['ELEMENTS_QUANTITY_TRACE'],array('Y','N'))):?> selected="selected"<?endif?>><?=GetMessage('WDI_D');?></option>
					<option value="Y"<?if($arParams['ELEMENTS_QUANTITY_TRACE']=='Y'):?> selected="selected"<?endif?>><?=GetMessage('WDI_Y');?></option>
					<option value="N"<?if($arParams['ELEMENTS_QUANTITY_TRACE']=='N'):?> selected="selected"<?endif?>><?=GetMessage('WDI_N');?></option>
				</select>
			</td>
		</tr>
		<tr id="wdi_ELEMENTS_CAN_BUY_ZERO">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_ELEMENTS_CAN_BUY_ZERO_HINT'));?> <?=GetMessage('WDI_SETTINGS_ELEMENTS_CAN_BUY_ZERO');?>:</td>
			<td width="60%">
				<select name="PARAMS[ELEMENTS_CAN_BUY_ZERO]">
					<option value="D"<?if(!in_array($arParams['ELEMENTS_CAN_BUY_ZERO'],array('Y','N'))):?> selected="selected"<?endif?>><?=GetMessage('WDI_D');?></option>
					<option value="Y"<?if($arParams['ELEMENTS_CAN_BUY_ZERO']=='Y'):?> selected="selected"<?endif?>><?=GetMessage('WDI_Y');?></option>
					<option value="N"<?if($arParams['ELEMENTS_CAN_BUY_ZERO']=='N'):?> selected="selected"<?endif?>><?=GetMessage('WDI_N');?></option>
				</select>
			</td>
		</tr>
		<tr id="wdi_ELEMENTS_SUBSCRIBE">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_ELEMENTS_SUBSCRIBE_HINT'));?> <?=GetMessage('WDI_SETTINGS_ELEMENTS_SUBSCRIBE');?>:</td>
			<td width="60%">
				<select name="PARAMS[ELEMENTS_SUBSCRIBE]">
					<option value="D"<?if(!in_array($arParams['ELEMENTS_SUBSCRIBE'],array('Y','N'))):?> selected="selected"<?endif?>><?=GetMessage('WDI_D');?></option>
					<option value="Y"<?if($arParams['ELEMENTS_SUBSCRIBE']=='Y'):?> selected="selected"<?endif?>><?=GetMessage('WDI_Y');?></option>
					<option value="N"<?if($arParams['ELEMENTS_SUBSCRIBE']=='N'):?> selected="selected"<?endif?>><?=GetMessage('WDI_N');?></option>
				</select>
			</td>
		</tr>
		<tr id="wdi_DEFAULT_VAT_INCLUDED">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_DEFAULT_VAT_INCLUDED_HINT'));?> <?=GetMessage('WDI_SETTINGS_DEFAULT_VAT_INCLUDED');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[VAT_INCLUDED]" value="N" /><input type="checkbox" name="PARAMS[VAT_INCLUDED]" value="Y"<?if($arParams['VAT_INCLUDED']=='Y'):?> checked="checked"<?endif?> /></td>
		</tr>
		<tr id="wdi_DEFAULT_VAT">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_DEFAULT_VAT_HINT'));?> <?=GetMessage('WDI_SETTINGS_DEFAULT_VAT');?>:</td>
			<td width="60%">
				<select name="PARAMS[DEFAULT_VAT]">
					<option value=""><?=GetMessage('WDI_SETTINGS_CATALOG_VAT_EMPTY');?></option>
					<?foreach($arVatList as $Value => $arVat):?>
						<option value="<?=$arVat['ID']?>"<?if($arParams['DEFAULT_VAT']==$arVat['ID']):?> selected="selected"<?endif?>><?=$arVat['NAME'];?> [<?=FloatVal($arVat['RATE'])?>%]</option>
					<?endforeach?>
				</select>
			</td>
		</tr>
		<tr class="heading"><td colspan="2"><?=GetMessage('WDI_SETTINGS_GROUP_CATALOG_CURRENCY');?></td></tr>
		<tr id="wdi_DEFAULT_CURRENCY">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_DEFAULT_CURRENCY_HINT'));?> <?=GetMessage('WDI_SETTINGS_DEFAULT_CURRENCY');?>:</td>
			<td width="60%">
				<select name="PARAMS[DEFAULT_CURRENCY]">
					<?foreach($arCurrencyList as $strCurrencyCode => $arCurrency):?>
						<?$Selected = (is_array($arCurrencyList[$arParams['DEFAULT_CURRENCY']]) && $arParams['DEFAULT_CURRENCY']==$strCurrencyCode) || (!is_array($arCurrencies[$arParams['DEFAULT_CURRENCY']]) && $arCurrency['IS_BASE']);?>
						<option value="<?=$arCurrency['CURRENCY']?>"<?if($Selected):?>selected="selected"<?endif?>><?if($arCurrency['CURRENCY']!=''):?>[<?=$arCurrency['CURRENCY']?>] <?endif?><?=$arCurrency['FULL_NAME']?><?if($arCurrency['IS_BASE']):?> <?=GetMessage('WDI_SETTINGS_CURRENCY_BASE');?><?endif?></option>
					<?endforeach?>
				</select>
			</td>
		</tr>
		<tr id="wdi_CURRENCY_DESIGNATIONS">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_CURRENCY_DESIGNATIONS_HINT'));?> <?=GetMessage('WDI_SETTINGS_CURRENCY_DESIGNATIONS');?>:</td>
			<td width="60%">
				<a href="#" class="expand wdi_inline_link"><?=GetMessage('WDI_BLOCK_TOGGLE');?></a>
				<script>
				$(document).ready(function(){
					$('#wdi_CURRENCY_DESIGNATIONS .expand').click(function(E){
						E.preventDefault();
						$('#wdi_CURRENCY_DESIGNATIONS_hidden').toggle();
					});
				});
				</script>
			</td>
		</tr>
		<tr id="wdi_CURRENCY_DESIGNATIONS_hidden" style="display:none">
			<td width="40%"></td>
			<td width="60%">
				<table>
					<tbody>
						<?foreach($arCurrencyList as $strCurrencyCode => $arCurrency):?>
							<tr>
								<td class="adm-detail-content-cell-l"><?=$strCurrencyCode;?>: </td>
								<td class="adm-detail-content-cell-r">
									<input type="text" name="PARAMS[CURRENCY_DESIGNATIONS][<?=$strCurrencyCode;?>]" size="20" value="<?=(isset($arParams['CURRENCY_DESIGNATIONS'][$strCurrencyCode])?$arParams['CURRENCY_DESIGNATIONS'][$strCurrencyCode]:'')?>" />
								</td>
								<td>&nbsp;<?=$arCurrency['FULL_NAME'];?></td>
							</tr>
						<?endforeach?>
					</tbody>
				</table>
			</td>
		</tr>
		<tr class="heading"><td colspan="2"><?=GetMessage('WDI_SETTINGS_GROUP_CATALOG_UNITS');?></td></tr>
		<tr id="wdi_DEFAULT_UNIT">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_DEFAULT_UNIT_HINT'));?> <?=GetMessage('WDI_SETTINGS_DEFAULT_UNIT');?>:</td>
			<td width="60%">
				<select name="PARAMS[DEFAULT_UNIT]">
					<?foreach($arMeasureList as $arMeasure):?>
						<option value="<?=$arMeasure['ID'];?>"<?if($arParams['DEFAULT_UNIT']==$arMeasure['ID'] || empty($arParams['DEFAULT_UNIT']) && $arMeasure['IS_DEFAULT']=='Y'):?> selected="selected"<?endif?>><?=$arMeasure['MEASURE_TITLE'];?></option>
					<?endforeach?>
				</select>
			</td>
		</tr>
		<tr id="wdi_UNITS_DESIGNATIONS">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_UNITS_DESIGNATIONS_HINT'));?> <?=GetMessage('WDI_SETTINGS_UNITS_DESIGNATIONS');?>:</td>
			<td width="60%">
				<a href="#" class="expand wdi_inline_link"><?=GetMessage('WDI_BLOCK_TOGGLE');?></a>
				<script>
				$(document).ready(function(){
					$('#wdi_UNITS_DESIGNATIONS .expand').click(function(E){
						E.preventDefault();
						$('#wdi_UNITS_DESIGNATIONS_hidden').toggle();
					});
				});
				</script>
			</td>
		</tr>
		<tr id="wdi_UNITS_DESIGNATIONS_hidden" style="display:none">
			<td width="40%"></td>
			<td width="60%">
				<table>
					<tbody>
						<?foreach($arMeasureList as $arMeasure):?>
							<tr>
								<td class="adm-detail-content-cell-l"><?=$arMeasure['MEASURE_TITLE'];?>: </td>
								<td class="adm-detail-content-cell-r">
									<?if(empty($arParams['MEASURE_DESIGNATIONS'][$arMeasure['ID']])){$arParams['MEASURE_DESIGNATIONS'][$arMeasure['ID']]=$arMeasure['SYMBOL_RUS'];}?>
									<input type="text" name="PARAMS[MEASURE_DESIGNATIONS][<?=$arMeasure['ID'];?>]" size="20" value="<?=(isset($arParams['MEASURE_DESIGNATIONS'][$arMeasure['ID']])?$arParams['MEASURE_DESIGNATIONS'][$arMeasure['ID']]:'')?>" />
								</td>
							</tr>
						<?endforeach?>
					</tbody>
				</table>
			</td>
		</tr>
		<tr class="heading"><td colspan="2"><?=GetMessage('WDI_SETTINGS_GROUP_ACTIVATE_CATALOG');?></td></tr>
		<tr id="wdi_ACTIVATE_BY_QUANTITY_GENERAL">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_ACTIVATE_BY_QUANTITY_GENERAL_HINT'));?> <?=GetMessage('WDI_SETTINGS_ACTIVATE_BY_QUANTITY_GENERAL');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[ACTIVATE_BY_QUANTITY_GENERAL]" value="N" /><input type="checkbox" name="PARAMS[ACTIVATE_BY_QUANTITY_GENERAL]" value="Y"<?if($arParams['ACTIVATE_BY_QUANTITY_GENERAL']=='Y'):?> checked="checked"<?endif?> /></td>
		</tr>
		<?if(!empty($arStores)):?>
			<tr id="wdi_ACTIVATE_BY_QUANTITY_STORE">
				<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_ACTIVATE_BY_QUANTITY_STORE_HINT'));?> <?=GetMessage('WDI_SETTINGS_ACTIVATE_BY_QUANTITY_STORE');?>:</td>
				<td width="60%">
					<input type="hidden" name="PARAMS[ACTIVATE_BY_QUANTITY_STORE]" value="N" /><input type="checkbox" name="PARAMS[ACTIVATE_BY_QUANTITY_STORE]" value="Y"<?if($arParams['ACTIVATE_BY_QUANTITY_STORE']=='Y'):?> checked="checked"<?endif?> />
					<script>
					$(document).ready(function(){
						$('#wdi_ACTIVATE_BY_QUANTITY_STORE input[type=checkbox]').change(function(){
							$('#wdi_ACTIVATE_BY_QUANTITY_STORE_hidden').css('display',$(this).is(':checked')?'':'none');
						});
					});
					</script>
				</td>
			</tr>
			<tr id="wdi_ACTIVATE_BY_QUANTITY_STORE_hidden"<?if($arParams['ACTIVATE_BY_QUANTITY_STORE']!='Y'):?> style="display:none"<?endif?>>
				<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_ACTIVATE_BY_QUANTITY_STORE_SELECT_HINT'));?> <?=GetMessage('WDI_SETTINGS_ACTIVATE_BY_QUANTITY_STORE_SELECT');?>:</td>
				<td width="60%">
					<select name="PARAMS[ACTIVATE_BY_QUANTITY_STORE_LIST][]" multiple="multiple" size="<?=max(count($arPrices),4);?>" style="min-width:200px">
						<?foreach($arStores as $arStore):?>
							<option value="<?=$arStore['ID'];?>"<?if(is_array($arParams['ACTIVATE_BY_QUANTITY_STORE_LIST']) && in_array($arStore['ID'],$arParams['ACTIVATE_BY_QUANTITY_STORE_LIST'])):?> selected="selected"<?endif?>>[<?=$arStore['ID'];?>] <?=$arStore['TITLE'];?></option>
						<?endforeach?>
					</select>
				</td>
			</tr>
		<?endif?>
		<?if(!empty($arPrices)):?>
			<tr id="wdi_ACTIVATE_BY_PRICE">
				<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_ACTIVATE_BY_PRICE_HINT'));?> <?=GetMessage('WDI_SETTINGS_ACTIVATE_BY_PRICE');?>:</td>
				<td width="60%">
					<input type="hidden" name="PARAMS[ACTIVATE_BY_PRICE]" value="N" /><input type="checkbox" name="PARAMS[ACTIVATE_BY_PRICE]" value="Y"<?if($arParams['ACTIVATE_BY_PRICE']=='Y'):?> checked="checked"<?endif?> />
					<script>
					$(document).ready(function(){
						$('#wdi_ACTIVATE_BY_PRICE input[type=checkbox]').click(function(E){
							$('#wdi_ACTIVATE_BY_PRICE_LIST').toggle();
						});
					});
					</script>
				</td>
			</tr>
			<tr id="wdi_ACTIVATE_BY_PRICE_LIST"<?if($arParams['ACTIVATE_BY_PRICE']!='Y'):?> style="display:none"<?endif?>>
				<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_ACTIVATE_BY_PRICE_SELECT_HINT'));?> <?=GetMessage('WDI_SETTINGS_ACTIVATE_BY_PRICE_SELECT');?>:</td>
				<td width="60%">
					<select name="PARAMS[ACTIVATE_BY_PRICE_LIST][]" multiple="multiple" size="<?=max(count($arPrices),4);?>" style="min-width:200px">
						<?foreach($arPrices as $arPrice):?>
							<option value="<?=$arPrice['ID'];?>"<?if(is_array($arParams['ACTIVATE_BY_PRICE_LIST']) && in_array($arPrice['ID'],$arParams['ACTIVATE_BY_PRICE_LIST'])):?> selected="selected"<?endif?>><?=$arPrice['NAME_LANG'];?> [<?=$arPrice['NAME'];?>]</option>
						<?endforeach?>
					</select>
				</td>
			</tr>
		<?endif?>
		<tr class="heading"><td colspan="2"><?=GetMessage('WDI_SETTINGS_GROUP_CATALOG_OTHER');?></td></tr>
		<tr id="wdi_CLEAR_QUANTITY_MISSING_ELEMENTS">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS_HINT'));?> <?=GetMessage('WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS');?>:</td>
			<td width="60%">
				<input type="hidden" name="PARAMS[CLEAR_QUANTITY_MISSING_ELEMENTS]" value="N" /><input type="checkbox" name="PARAMS[CLEAR_QUANTITY_MISSING_ELEMENTS]" value="Y"<?if($arParams['CLEAR_QUANTITY_MISSING_ELEMENTS']=='Y'):?> checked="checked"<?endif?> />
				<script>
				$(document).ready(function(){
					$('#wdi_CLEAR_QUANTITY_MISSING_ELEMENTS input[type=checkbox]').change(function(){
						$('#wdi_CLEAR_QUANTITY_MISSING_ELEMENTS_hidden').css('display',$(this).is(':checked')?'':'none');
					});
				});
				</script>
			</td>
		</tr>
		<tr id="wdi_CLEAR_QUANTITY_MISSING_ELEMENTS_hidden"<?if($arParams['CLEAR_QUANTITY_MISSING_ELEMENTS']!='Y'):?> style="display:none"<?endif?>>
			<td width="40%"></td>
			<td width="60%">
				<select name="PARAMS[CLEAR_QUANTITY_MISSING_ELEMENTS_TYPE]">
					<option value="profile"<?if($arParams['CLEAR_QUANTITY_MISSING_ELEMENTS_TYPE']=='profile'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS_PROFILE');?></option>
					<option value="module"<?if($arParams['CLEAR_QUANTITY_MISSING_ELEMENTS_TYPE']=='module'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS_MODULE');?></option>
					<option value="all"<?if($arParams['CLEAR_QUANTITY_MISSING_ELEMENTS_TYPE']=='all'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS_ALL');?></option>
				</select>
			</td>
		</tr>
	</tbody>
</table>
