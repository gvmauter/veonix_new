<?
IncludeModuleLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex]['DATA_POSITION'];
$arSheetParams['FIRST_COLUMN'] = IntVal($arSheetParams['FIRST_COLUMN']);
if($arSheetParams['FIRST_COLUMN']<1) {
	$arSheetParams['FIRST_COLUMN'] = 1;
}
$arSheetParams['HEADER_ROW'] = IntVal($arSheetParams['HEADER_ROW']);
if($arSheetParams['HEADER_ROW']<1) {
	$arSheetParams['HEADER_ROW'] = 1;
}
$arSheetParams['DATA_ROW'] = IntVal($arSheetParams['DATA_ROW']);
if($arSheetParams['DATA_ROW']<2) {
	$arSheetParams['DATA_ROW'] = 2;
}
?>
<tr>
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_EXCEL_DATA_POSITION_FIRST_COLUMN');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div id="excel_elements_link_<?=$SheetIndex;?>">
			<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][DATA_POSITION][FIRST_COLUMN]" size="5" maxlength="5" value="<?=$arSheetParams['FIRST_COLUMN'];?>" />
		</div>
	</td>
</tr>
<tr>
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_EXCEL_DATA_POSITION_HEADER_ROW');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div id="excel_elements_link_<?=$SheetIndex;?>">
			<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][DATA_POSITION][HEADER_ROW]" size="5" maxlength="5" value="<?=$arSheetParams['HEADER_ROW'];?>" />
		</div>
	</td>
</tr>
<tr>
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_EXCEL_DATA_POSITION_DATA_ROW');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div id="excel_elements_link_<?=$SheetIndex;?>">
			<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][DATA_POSITION][DATA_ROW]" size="5" maxlength="5" value="<?=$arSheetParams['DATA_ROW'];?>" />
		</div>
	</td>
</tr>
