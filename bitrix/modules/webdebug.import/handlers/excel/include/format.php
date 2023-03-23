<?
CWDI_Handler::IncludeLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];

// AJAX-запрос для show_format_table
if($_GET['subaction']=='show_format_table' && is_array($_POST['PARAMS']) && is_array($arFields['PARAMS'])) {
	$arFields['PARAMS']['S'][$SheetIndex]['SECTIONS_DEPTH'] = $_POST['PARAMS']['S'][$SheetIndex]['SECTIONS_DEPTH'];
	$arFields['PARAMS']['S'][$SheetIndex]['FORMAT'] = $arFields['PARAMS_STORED']['S'][$SheetIndex]['FORMAT'];
	$arFields['PARAMS']['S'][$SheetIndex]['COLUMNS'] = $arFields['PARAMS_STORED']['S'][$SheetIndex]['COLUMNS'];
}

$arParams = $arFields['PARAMS'];

$arSheetParams = $arParams['S'][$SheetIndex];

$arSheetParams['SECTIONS_DEPTH'] = IntVal($arSheetParams['SECTIONS_DEPTH']);
if($arSheetParams['SECTIONS_DEPTH']<1) {
	$arSheetParams['SECTIONS_DEPTH'] = 1;
}

if(empty($arSheetParams['MODE'])){
	$arSheetParams['MODE'] = 'format';
}
?>
<tr>
	<td class="adm-detail-content-cell-r" colspan="2">
		<div id="wdi_format_<?=$SheetIndex;?>">
			<?include(dirname(__FILE__).'/_mode_'.$arSheetParams['MODE'].'.php');?>
		</div>
	</td>
</tr>