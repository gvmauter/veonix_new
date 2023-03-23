<?
IncludeModuleLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex];
$arSheetParams['SECTIONS_DEPTH'] = IntVal($arSheetParams['SECTIONS_DEPTH']);
if($arSheetParams['SECTIONS_DEPTH']<1) {
	$arSheetParams['SECTIONS_DEPTH'] = 1;
}
?>
<tr id="wdi_param_sections_depth_<?=$SheetIndex;?>">
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_PARAM_SECTIONS_DEPTH');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<input type="hidden" name="PARAMS[S][<?=$SheetIndex;?>][SECTIONS_DEPTH]" value="0" />
		<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][SECTIONS_DEPTH]" size="10" value="<?=$arSheetParams['SECTIONS_DEPTH'];?>" maxlength="1" autocomplete="off" />
		<script>
		$(document).ready(function(){
			$('#wdi_param_sections_depth_<?=$SheetIndex;?> input[type=text]').bind('textchange',function(){
				if($(this).val().length==0) {
					return false;
				}
				var Depth = parseInt($(this).val());
				if(isNaN(Depth) || Depth<=0 || Depth>9) {
					Depth = 0;
				}
				var FormData = $('#WDI_Tabs_form').serialize();
				$('#wdi_format_<?=$SheetIndex;?>').html('<?=WDI_LOADER;?>');
				setTimeout(function(){
					$.ajax({
						url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($arFields['ID']);?>&lang=<?=LANGUAGE_ID;?>&action=show_handler_matches&subaction=show_format_table&handler=<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>&sheet=<?=$SheetIndex;?>&load_offers='+($('#wdi_LOAD_OFFERS input[type=checkbox]').is(':checked')?'Y':'N'),
						type: 'POST',
						data: FormData+'&depth='+Depth,
						success: function(HTML) {
							$('#wdi_format_<?=$SheetIndex;?>').html(HTML).find('input[type=checkbox]').each(function(){
								BX.adminFormTools.modifyCheckbox($(this)[0]);
							});
							if (!$('#wdi_LOAD_OFFERS input[type=checkbox]').is(':checked')) {
								$('#wdi_format_<?=$SheetIndex;?>').find('tr[data-type=OFFER]').hide();
							}
						}
					});
				},1000);
			});
		});
		</script>
	</td>
</tr>
