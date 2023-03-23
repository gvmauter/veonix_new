<?
CWDI_Handler::IncludeLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex];
?>
<tr id="wdi_param_mode_<?=$SheetIndex;?>">
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_PARAM_MODE');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<select name="PARAMS[S][<?=$SheetIndex;?>][MODE]">
			<option value="format"<?if($arSheetParams['MODE']=='format'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_MODE_FORMAT');?></option>
			<option value="columns"<?if($arSheetParams['MODE']=='columns'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_MODE_COLUMNS');?></option>
			<option value="simple"<?if($arSheetParams['MODE']=='simple'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_MODE_SIMPLE');?></option>
		</select>
		<div class="wdi_section_notice"<?if(CWDI::CheckIBlockIsSectionRequired($arSheetParams['IBLOCK_ID'])===false):?> style="display:none"<?endif?>><?=GetMessage('WDI_PARAM_MODE_SECTION_IS_REQUIRED');?></div>
		<script>
		$(document).ready(function(){
			$('#wdi_param_mode_<?=$SheetIndex;?> select').bind('change',function(){
				BX.onCustomEvent('wdiProfileModeChange',[<?=$SheetIndex;?>,$(this).val()]);
				if(window.WdiLoaded) {
					$('#wdi_param_sections_depth_<?=$SheetIndex;?> input').trigger('textchange');
				}
			}).trigger('change');
		});
		BX.addCustomEvent('wdiProfileIBlockChange', function(SheetIndex,IBlockID){
			if(SheetIndex=='<?=$SheetIndex;?>') {
				$.ajax({
					url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($arFields['ID']);?>&lang=<?=LANGUAGE_ID;?>&action=show_handler_matches&subaction=check_iblock_section_required&handler=<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>&sheet=<?=$SheetIndex;?>&iblock_id='+IBlockID,
					type: 'POST',
					success: function(HTML) {
						$('#wdi_param_mode_<?=$SheetIndex;?> .wdi_section_notice').css('display',HTML=='Y'?'block':'none');
					}
				});
			}
		});
		</script>
	</td>
</tr>