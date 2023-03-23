<?
IncludeModuleLangFile(__FILE__);
$arParams = $arFields['PARAMS'];
?>
<table class="adm-list-table">
	<tbody>
		<tr>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_SKIP_NEW_ELEMENTS_HINT'));?> <?=GetMessage('WDI_SETTINGS_SKIP_NEW_ELEMENTS');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[SKIP_NEW_ELEMENTS]" value="N" /><input type="checkbox" name="PARAMS[SKIP_NEW_ELEMENTS]" value="Y"<?if($arParams['SKIP_NEW_ELEMENTS']=='Y'):?> checked="checked"<?endif?> /></td>
		</tr>
		<tr>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_SKIP_NEW_SECTIONS_HINT'));?> <?=GetMessage('WDI_SETTINGS_SKIP_NEW_SECTIONS');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[SKIP_NEW_SECTIONS]" value="N" /><input type="checkbox" name="PARAMS[SKIP_NEW_SECTIONS]"<?if($arParams['SKIP_NEW_SECTIONS']=='Y'):?> checked="checked"<?endif?> value="Y" /></td>
		</tr>
		<tr class="heading"><td colspan="2"><?=GetMessage('WDI_SETTINGS_GROUP_GENERAL_SECTIONS');?></td></tr>
		<tr>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_SKIP_MULTISECTIONS_HINT'));?> <?=GetMessage('WDI_SETTINGS_SKIP_MULTISECTIONS');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[SKIP_MULTISECTIONS]" value="N" /><input type="checkbox" name="PARAMS[SKIP_MULTISECTIONS]"<?if($arParams['SKIP_MULTISECTIONS']=='Y'):?> checked="checked"<?endif?> value="Y" /></td>
		</tr>
		<tr>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_ELEMENTS_SKIP_MOVING_HINT'));?> <?=GetMessage('WDI_SETTINGS_ELEMENTS_SKIP_MOVING');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[ELEMENTS_SKIP_MOVING]" value="N" /><input type="checkbox" name="PARAMS[ELEMENTS_SKIP_MOVING]"<?if($arParams['ELEMENTS_SKIP_MOVING']=='Y'):?> checked="checked"<?endif?> value="Y" /></td>
		</tr>
		<tr>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_SECTIONS_SKIP_MOVING_HINT'));?> <?=GetMessage('WDI_SETTINGS_SECTIONS_SKIP_MOVING');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[SECTIONS_SKIP_MOVING]" value="N" /><input type="checkbox" name="PARAMS[SECTIONS_SKIP_MOVING]"<?if($arParams['SECTIONS_SKIP_MOVING']=='Y'):?> checked="checked"<?endif?> value="Y" /></td>
		</tr>
		<tr class="heading"><?=WdiHint(GetMessage('WDI_SETTINGS_GROUP_GENERAL_OTHER_HINT'));?> <td colspan="2"><?=GetMessage('WDI_SETTINGS_GROUP_GENERAL_OTHER');?></td></tr>
		<tr>
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_SKIP_UPDATE_SEARCH_HINT'));?> <?=GetMessage('WDI_SETTINGS_SKIP_UPDATE_SEARCH');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[SKIP_UPDATE_SEARCH]" value="N" /><input type="checkbox" name="PARAMS[SKIP_UPDATE_SEARCH]"<?if($arParams['SKIP_UPDATE_SEARCH']=='Y'):?> checked="checked"<?endif?> value="Y" /></td>
		</tr>
	</tbody>
</table>