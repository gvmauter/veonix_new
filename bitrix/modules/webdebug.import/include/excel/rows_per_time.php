<?
IncludeModuleLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex]['LINK']['SECTIONS'];
$arParams['ROWS_PER_TIME'] = IntVal($arParams['ROWS_PER_TIME']);
if($_GET['action']=='show_handler_settings' && isset($_GET['ID']) && $_GET['ID']=='0') {
	$arParams['ROWS_PER_TIME'] = ROWS_PER_TIME_DEFAULT;
}
if($arParams['ROWS_PER_TIME']<1) {
	$arParams['ROWS_PER_TIME'] = ROWS_PER_TIME_DEFAULT;
}
?>
<table class="adm-detail-content-table">
	<tbody>
		<tr id="wdi_parap_rows_per_time">
			<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_EXCEL_ROWS_PER_TIME');?></td>
			<td class="adm-detail-content-cell-r" width="60%">
				<input type="text" name="PARAMS[ROWS_PER_TIME]" size="10" value="<?=$arParams['ROWS_PER_TIME'];?>" maxlength="5" />
			</td>
		</tr>
	</tbody>
</table>

