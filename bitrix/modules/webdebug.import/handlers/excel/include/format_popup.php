<?
CWDI_Handler::IncludeLangFile(__FILE__);
$arValues = array();
$ColumnsCount = $objExcel->GetColumnsCount();
for($RowIndex = $StartRow; $RowIndex<=$EndRow; $RowIndex++){
	for ($ColIndex = 0; $ColIndex<=$ColumnsCount; $ColIndex++) {
		$Value = $objExcel->ReadCell($RowIndex,$ColIndex,'HTML');
		$BG = $objExcel->GetCellBackgroundColor($RowIndex,$ColIndex);
		if($BG=='#000000') {
			$BG = '#FFFFFF';
		}
		if(empty($Value)) {
			$Value = $objExcel->ReadCell($RowIndex,$ColIndex,'TEXT');
		}
		$Value = '<div style="background:'.$BG.'; height:100%; padding:2px 4px; width:100%; box-sizing:border-box;">'.$Value.'</div>';
		$arValues[$RowIndex][$ColIndex] = $Value;
	}
}
?>
<input type="button" value="<?=GetMessage('WDI_EXCEL_PICKFORMAT_PREV');?>"<?if($Page>1):?> onclick="WdiPickFormat_LoadContent(<?=($Page-1);?>)"<?else:?> disabled="disabled"<?endif?> />
<input type="button" value="<?=GetMessage('WDI_EXCEL_PICKFORMAT_NEXT');?>" onclick="WdiPickFormat_LoadContent(<?=($Page+1);?>)" />
&nbsp;&nbsp;&nbsp;&nbsp;<span><?=GetMessage('WDI_EXCEL_PICKFORMAT_SELECTED_COLOR');?> </span><span id="wdi_pickformat_value" style="font-weight:bold; -moz-user-select:text; -webkit-user-select:text; -ms-user-select:text; user-select:text;"><?=GetMessage('WDI_EXCEL_PICKFORMAT_SELECTED_COLOR_NONE');?></span>
<br/>
<input type="hidden" id="wdi_pickformat_sender_id" value="<?=htmlspecialcharsbx($_GET['sender_id']);?>" />
<style>
table.wdi_pickformat_table th,
table.wdi_pickformat_table td {cursor:pointer;}
table.wdi_pickformat_table thead th.hover,
table.wdi_pickformat_table tbody tr.hover th {background:#9FD5B7!important}
</style>
<script>
function WdiRgbToHex(rgb) {
	if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;
	rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	function hex(x) {
		return ("0" + parseInt(x).toString(16)).slice(-2);
	}
	return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}
$('table.wdi_pickformat_table th div,table.wdi_pickformat_table td div').click(function(E){
	E.preventDefault();
	var Color = WdiRgbToHex($(this).css('backgroundColor')).toUpperCase();
	if(Color=='#FFFFFF') {
		$('#wdi_pickformat_value').text('<?=GetMessage('WDI_EXCEL_PICKFORMAT_SELECTED_COLOR_NONE');?>').removeClass('picked');
	} else {
		$('#wdi_pickformat_value').text(Color).addClass('picked');
	}
});
$('table.wdi_pickformat_table td').mouseenter(function(){
	var ColIndex = $(this).index();
	var RowIndex = $(this).parent().index();
	$('table.wdi_pickformat_table thead th').removeClass('hover').eq(ColIndex).addClass('hover');
	$('table.wdi_pickformat_table tbody tr').removeClass('hover').eq(RowIndex).addClass('hover');
});
</script>
<div style="overflow-x:auto; width:100%;">
	<table class="wdi_pickformat_table" style="border:1px solid #bbb; border-collapse:collapse; border-spacing:0; margin:5px 0; width:100%;">
		<thead>
			<tr>
				<th style="background:#DEDEDE; padding:2px 4px; text-align:center; width:1px;"></th>
				<?for($ColIndex=0; $ColIndex<=$ColumnsCount; $ColIndex++):?>
					<th style="background:#DEDEDE; border-bottom:1px solid #bbb; border-left:1px solid #bbb; font-weight:normal; padding:2px 4px; text-align:center;">
						<?=PHPExcel_Cell::stringFromColumnIndex($ColIndex);?>
					</th>
				<?endfor?>
			</tr>
		</thead>
		<tbody>
			<?foreach($arValues as $RowIndex => $arCells):?>
				<tr>
					<th style="background:#DEDEDE; border-right:1px solid #bbb; border-top:1px solid #bbb; font-weight:normal; padding:2px 4px 2px 6px; text-align:right;"><?=$RowIndex;?></th>
					<?for($ColIndex=0; $ColIndex<=$ColumnsCount; $ColIndex++):?>
						<td style="border:1px solid #D4D4D4; height:1px; padding:0!important;"><?=$arCells[$ColIndex];?></td>
					<?endfor?>
				</tr>
			<?endforeach?>
		</tbody>
	</table>
</div>

