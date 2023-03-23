<?
CWDI_Handler::IncludeLangFile(__FILE__);

$arColumns = array();
for($i=1; $i<=$arSheetParams['SECTIONS_DEPTH']; $i++){
	$arColumns['SECTION_'.$i] = array(
		'NAME' => GetMessage('WDI_EXCEL_FORMAT_TYPE_SECTION').($arSheetParams['SECTIONS_DEPTH']=='1' ? '' : GetMessage('WDI_EXCEL_FORMAT_TYPE_SECTION_LEVEL',array('#I#'=>$i))),
	);
}
$arColumns['ELEMENT'] = array(
	'NAME' => GetMessage('WDI_EXCEL_FORMAT_TYPE_ELEMENT'),
);

if($_GET['subaction']=='show_format_table' && $_GET['sheet']==$SheetIndex){CWDI::StopOutputBuffering();}
?>

<table class="adm-list-table wdi_format_general wdi_format_columns" style="text-align:center">
	<thead>
		<tr class="adm-list-table-header">
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_LEVEL');?>"><?=GetMessage('WDI_EXCEL_FORMAT_LEVEL');?></th>
			<th class="adm-list-table-cell" title="<?=GetMessage('WDI_EXCEL_FORMAT_SOURCE');?>"><?=GetMessage('WDI_EXCEL_FORMAT_SOURCE');?></th>
		</tr>
	</thead>
	<tbody>
		<?foreach($arColumns as $ColumnType => $arColumn):?>
			<?$ColumnTypeShort = in_array($ColumnType,array('ELEMENT','OFFER')) ? $ColumnType : (preg_match('#^SECTION_(\d+)$#i',$ColumnType)?'SECTION':'');?>
			<tr class="adm-list-table-row" data-type="<?=$ColumnType;?>" data-type-short="<?=$ColumnTypeShort;?>">
				<td class="adm-list-table-cell">
					<span class="name"><?=$arColumn['NAME'];?></span>
				</td>
				<td class="adm-list-table-cell">
					<select class="wdi_matches_source" name="PARAMS[S][<?=$SheetIndex;?>][COLUMNS][<?=$ColumnType;?>][COLUMN]" style="width:100%">
						<option value=""></option>
						<?foreach($arData['MATCHES'][$ColumnTypeShort] as $MatchCode => $arMatch):?>
							<option value="<?=$MatchCode;?>"<?if($arSheetParams['COLUMNS'][$ColumnType]['COLUMN']==$MatchCode):?> selected="selected"<?endif?>><?=$arMatch['NAME'];?></option>
						<?endforeach?>
					</select>
				</td>
			</tr>
		<?endforeach?>
	</tbody>
</table>

<?if($_GET['subaction']=='show_format_table' && $_GET['sheet']==$SheetIndex){die();}?>