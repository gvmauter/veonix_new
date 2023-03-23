<?
IncludeModuleLangFile(__FILE__);
if(!$GLOBALS['WDI_CATALOG_INCLUDED']){
	print '<i>'.GetMessage('WDI_ERROR_NO_CATALOG_MODULE').'</i>';
	return false;
}

$arParams = $arFields['PARAMS'];
$arStores = CWDI::GetStoresList();
?>
<table class="adm-list-table">
	<tbody>
		<tr id="wdi_RECALCULATE_QUANTITY">
			<td width="40%"><?=WdiHint(GetMessage('WDI_SETTINGS_RECALCULATE_QUANTITY_HINT'));?> <?=GetMessage('WDI_SETTINGS_RECALCULATE_QUANTITY');?>:</td>
			<td width="60%"><input type="hidden" name="PARAMS[RECALCULATE_QUANTITY]" value="N" /><input type="checkbox" name="PARAMS[RECALCULATE_QUANTITY]" value="Y"<?if($arParams['RECALCULATE_QUANTITY']=='Y'):?> checked="checked"<?endif?> /></td>
		</tr>
	</tbody>
</table>
