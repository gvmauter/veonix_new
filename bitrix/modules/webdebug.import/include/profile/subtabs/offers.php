<?
IncludeModuleLangFile(__FILE__);
if(!$GLOBALS['WDI_CATALOG_INCLUDED']){ // Если модуля торгового каталога нет, то имитируем отмену галочки загрузки торговых предложений, чтобы загрузчики знали об этом
	print '<i>'.GetMessage('WDI_ERROR_NO_CATALOG_MODULE').'</i>';
	?>
	<script>
	$(document).ready(function(){
		setTimeout(function(){
			BX.onCustomEvent('wdiOffersCheckboxChange', [false]);
		},100);
	});
	</script>
	<?
	return false;
}

$arParams = $arFields['PARAMS'];
?>
<table class="adm-list-table">
	<tbody>
		<tr id="wdi_LOAD_OFFERS">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_LOAD_OFFERS_HINT'));?> <?=GetMessage('WDI_SETTINGS_LOAD_OFFERS');?>:</td>
			<td width="60%">
				<input type="hidden" name="PARAMS[LOAD_OFFERS]" value="N" /><input type="checkbox" name="PARAMS[LOAD_OFFERS]" value="Y"<?if($arParams['LOAD_OFFERS']=='Y'):?> checked="checked"<?endif?> />
				<script>
				$(document).ready(function(){
					$('#wdi_LOAD_OFFERS input[type=checkbox]').change(function(){
						if($(this).is(':checked')) {
							$('.wdi_offers_params').css('display','');
						}
						BX.onCustomEvent('wdiOffersCheckboxChange', [$(this).is(':checked')]);
						$('.wdi_offers_params input[type=checkbox]').change();
						if(!$(this).is(':checked')) {
							$('.wdi_offers_params').css('display','none');
						}
					}).change();
				});
				</script>
			</td>
		</tr>
		<tr class="wdi_offers_params" id="wdi_SKIP_NEW_OFFERS"<?if($arParams['LOAD_OFFERS']!='Y'):?> style="display:none"<?endif?>>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_SKIP_NEW_OFFERS_HINT'));?> <?=GetMessage('WDI_SETTINGS_SKIP_NEW_OFFERS');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[SKIP_NEW_OFFERS]" value="N" /><input type="checkbox" name="PARAMS[SKIP_NEW_OFFERS]" value="Y"<?if($arParams['SKIP_NEW_OFFERS']=='Y'):?> checked="checked"<?endif?> /></td>
		</tr>
		<tr class="wdi_offers_params" id="wdi_NEW_OFFERS_ACTIVE"<?if($arParams['LOAD_OFFERS']!='Y'):?> style="display:none"<?endif?>>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_NEW_OFFERS_ACTIVE_HINT'));?> <?=GetMessage('WDI_SETTINGS_NEW_OFFERS_ACTIVE');?>:</td>
			<td width="60%">
				<select name="PARAMS[NEW_OFFERS_ACTIVE]">
					<option value=""><?=GetMessage('WDI_D');?></option>
					<option value="Y"<?if($arParams['NEW_OFFERS_ACTIVE']=='Y'):?> selected="selected"<?endif?>><?=GetMessage('WDI_Y');?></option>
					<option value="N"<?if($arParams['NEW_OFFERS_ACTIVE']=='N'):?> selected="selected"<?endif?>><?=GetMessage('WDI_N');?></option>
				</select>
			</td>
		</tr>
		<tr class="wdi_offers_params" id="wdi_OLD_OFFERS_ACTIVE"<?if($arParams['LOAD_OFFERS']!='Y'):?> style="display:none"<?endif?>>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_OLD_OFFERS_ACTIVE_HINT'));?> <?=GetMessage('WDI_SETTINGS_OLD_OFFERS_ACTIVE');?>:</td>
			<td width="60%">
				<select name="PARAMS[OLD_OFFERS_ACTIVE]">
					<option value=""><?=GetMessage('WDI_D');?></option>
					<option value="Y"<?if($arParams['OLD_OFFERS_ACTIVE']=='Y'):?> selected="selected"<?endif?>><?=GetMessage('WDI_Y');?></option>
					<option value="N"<?if($arParams['OLD_OFFERS_ACTIVE']=='N'):?> selected="selected"<?endif?>><?=GetMessage('WDI_N');?></option>
				</select>
			</td>
		</tr>
		<tr class="wdi_offers_params" id="wdi_DEACTIVATE_MISSING_OFFERS"<?if($arParams['LOAD_OFFERS']!='Y'):?> style="display:none"<?endif?>>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_OFFERS_HINT'));?> <?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_OFFERS');?>:</td>
			<td width="60%">
				<input type="hidden" name="PARAMS[DEACTIVATE_MISSING_OFFERS]" value="N" /><input type="checkbox" name="PARAMS[DEACTIVATE_MISSING_OFFERS]" value="Y"<?if($arParams['DEACTIVATE_MISSING_OFFERS']=='Y'):?> checked="checked"<?endif?> />
				<script>
				$(document).ready(function(){
					$('#wdi_DEACTIVATE_MISSING_OFFERS input[type=checkbox]').change(function(){
						$('#wdi_DEACTIVATE_MISSING_OFFERS_hidden').css('display',$(this).is(':checked')?'':'none');
					}).change();
				});
				</script>
			</td>
		</tr>
		<tr x="<?=$arParams['LOAD_OFFERS']?>,<?=$arParams['DEACTIVATE_MISSING_OFFERS']?>,<?=$arParams['DEACTIVATE_MISSING_OFFERS_TYPE']?>," class="wdi_offers_params" id="wdi_DEACTIVATE_MISSING_OFFERS_hidden"<?if($arParams['DEACTIVATE_MISSING_OFFERS']!='Y'):?> style="display:none; border:1px solid red;"<?endif?>>
			<td width="40%"></td>
			<td width="60%">
				<select name="PARAMS[DEACTIVATE_MISSING_OFFERS_TYPE]">
					<option value="profile"<?if($arParams['DEACTIVATE_MISSING_OFFERS_TYPE']=='profile'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_OFFERS_PROFILE');?></option>
					<option value="module"<?if($arParams['DEACTIVATE_MISSING_OFFERS_TYPE']=='module'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_OFFERS_MODULE');?></option>
					<option value="all"<?if($arParams['DEACTIVATE_MISSING_OFFERS_TYPE']=='all'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_OFFERS_ALL');?></option>
				</select>
			</td>
		</tr>
	</tbody>
</table>
