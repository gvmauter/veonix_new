<?
IncludeModuleLangFile(__FILE__);
$arParams = $arFields['PARAMS'];
?>
<table class="adm-list-table">
	<tbody>
		<tr class="heading"><td colspan="2"><?=GetMessage('WDI_SETTINGS_GROUP_ACTIVATE_SECTIONS');?></td></tr>
		<tr id="wdi_NEW_SECTIONS_ACTIVE">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_NEW_SECTIONS_ACTIVE_HINT'));?> <?=GetMessage('WDI_SETTINGS_NEW_SECTIONS_ACTIVE');?>:</td>
			<td width="60%">
				<select name="PARAMS[NEW_SECTIONS_ACTIVE]">
					<option value=""><?=GetMessage('WDI_D');?></option>
					<option value="Y"<?if($arParams['NEW_SECTIONS_ACTIVE']=='Y'):?> selected="selected"<?endif?>><?=GetMessage('WDI_Y');?></option>
					<option value="N"<?if($arParams['NEW_SECTIONS_ACTIVE']=='N'):?> selected="selected"<?endif?>><?=GetMessage('WDI_N');?></option>
				</select>
			</td>
		</tr>
		<tr id="wdi_OLD_SECTIONS_ACTIVE">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_OLD_SECTIONS_ACTIVE_HINT'));?> <?=GetMessage('WDI_SETTINGS_OLD_SECTIONS_ACTIVE');?>:</td>
			<td width="60%">
				<select name="PARAMS[OLD_SECTIONS_ACTIVE]">
					<option value=""><?=GetMessage('WDI_D');?></option>
					<option value="Y"<?if($arParams['OLD_SECTIONS_ACTIVE']=='Y'):?> selected="selected"<?endif?>><?=GetMessage('WDI_Y');?></option>
					<option value="N"<?if($arParams['OLD_SECTIONS_ACTIVE']=='N'):?> selected="selected"<?endif?>><?=GetMessage('WDI_N');?></option>
				</select>
			</td>
		</tr>
		<tr id="wdi_DEACTIVATE_MISSING_SECTIONS">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_SECTIONS_HINT'));?> <?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_SECTIONS');?>:</td>
			<td width="60%">
				<input type="hidden" name="PARAMS[DEACTIVATE_MISSING_SECTIONS]" value="N" /><input type="checkbox" name="PARAMS[DEACTIVATE_MISSING_SECTIONS]" value="Y"<?if($arParams['DEACTIVATE_MISSING_SECTIONS']=='Y'):?> checked="checked"<?endif?> />
				<script>
				$(document).ready(function(){
					$('#wdi_DEACTIVATE_MISSING_SECTIONS input[type=checkbox]').change(function(){
						$('#wdi_DEACTIVATE_MISSING_SECTIONS_hidden').css('display',$(this).is(':checked')?'':'none');
					});
				});
				</script>
			</td>
		</tr>
		<tr id="wdi_DEACTIVATE_MISSING_SECTIONS_hidden"<?if($arParams['DEACTIVATE_MISSING_SECTIONS']!='Y'):?> style="display:none"<?endif?>>
			<td width="40%"></td>
			<td width="60%">
				<select name="PARAMS[DEACTIVATE_MISSING_SECTIONS_TYPE]">
					<option value="profile"<?if($arParams['DEACTIVATE_MISSING_SECTIONS_TYPE']=='profile'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_SECTIONS_PROFILE');?></option>
					<option value="module"<?if($arParams['DEACTIVATE_MISSING_SECTIONS_TYPE']=='module'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_SECTIONS_MODULE');?></option>
					<option value="all"<?if($arParams['DEACTIVATE_MISSING_SECTIONS_TYPE']=='all'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_SECTIONS_ALL');?></option>
				</select>
			</td>
		</tr>
		<tr class="heading"><td colspan="2"><?=GetMessage('WDI_SETTINGS_GROUP_ACTIVATE_ELEMENTS');?></td></tr>
		<tr id="wdi_NEW_ELEMENTS_ACTIVE">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_NEW_ELEMENTS_ACTIVE_HINT'));?> <?=GetMessage('WDI_SETTINGS_NEW_ELEMENTS_ACTIVE');?>:</td>
			<td width="60%">
				<select name="PARAMS[NEW_ELEMENTS_ACTIVE]">
					<option value=""><?=GetMessage('WDI_D');?></option>
					<option value="Y"<?if($arParams['NEW_ELEMENTS_ACTIVE']=='Y'):?> selected="selected"<?endif?>><?=GetMessage('WDI_Y');?></option>
					<option value="N"<?if($arParams['NEW_ELEMENTS_ACTIVE']=='N'):?> selected="selected"<?endif?>><?=GetMessage('WDI_N');?></option>
				</select>
			</td>
		</tr>
		<tr id="wdi_OLD_ELEMENTS_ACTIVE">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_OLD_ELEMENTS_ACTIVE_HINT'));?> <?=GetMessage('WDI_SETTINGS_OLD_ELEMENTS_ACTIVE');?>:</td>
			<td width="60%">
				<select name="PARAMS[OLD_ELEMENTS_ACTIVE]">
					<option value=""><?=GetMessage('WDI_D');?></option>
					<option value="Y"<?if($arParams['OLD_ELEMENTS_ACTIVE']=='Y'):?> selected="selected"<?endif?>><?=GetMessage('WDI_Y');?></option>
					<option value="N"<?if($arParams['OLD_ELEMENTS_ACTIVE']=='N'):?> selected="selected"<?endif?>><?=GetMessage('WDI_N');?></option>
				</select>
			</td>
		</tr>
		<tr id="wdi_DEACTIVATE_MISSING_ELEMENTS">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_ELEMENTS_HINT'));?> <?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_ELEMENTS');?>:</td>
			<td width="60%">
				<input type="hidden" name="PARAMS[DEACTIVATE_MISSING_ELEMENTS]" value="N" /><input type="checkbox" name="PARAMS[DEACTIVATE_MISSING_ELEMENTS]" value="Y"<?if($arParams['DEACTIVATE_MISSING_ELEMENTS']=='Y'):?> checked="checked"<?endif?> />
				<script>
				$(document).ready(function(){
					$('#wdi_DEACTIVATE_MISSING_ELEMENTS input[type=checkbox]').change(function(){
						$('#wdi_DEACTIVATE_MISSING_ELEMENTS_hidden').css('display',$(this).is(':checked')?'':'none');
					});
				});
				</script>
			</td>
		</tr>
		<tr id="wdi_DEACTIVATE_MISSING_ELEMENTS_hidden"<?if($arParams['DEACTIVATE_MISSING_ELEMENTS']!='Y'):?> style="display:none"<?endif?>>
			<td width="40%"></td>
			<td width="60%">
				<select name="PARAMS[DEACTIVATE_MISSING_ELEMENTS_TYPE]">
					<option value="profile"<?if($arParams['DEACTIVATE_MISSING_ELEMENTS_TYPE']=='profile'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_ELEMENTS_PROFILE');?></option>
					<option value="module"<?if($arParams['DEACTIVATE_MISSING_ELEMENTS_TYPE']=='module'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_ELEMENTS_MODULE');?></option>
					<option value="all"<?if($arParams['DEACTIVATE_MISSING_ELEMENTS_TYPE']=='all'):?> selected="selected"<?endif?>><?=GetMessage('WDI_SETTINGS_DEACTIVATE_MISSING_ELEMENTS_ALL');?></option>
				</select>
			</td>
		</tr>
	</tbody>
</table>