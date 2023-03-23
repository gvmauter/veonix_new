<?
IncludeModuleLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex];
$arIBlockList = CWDI::GetIBlockList(true,true);
$arSectionList = array();
if($_GET['action']=='show_sections_for_iblock' && isset($_GET['IBLOCK_ID'])) {
	$arSectionList = CWDI::GetSections(IntVal($_GET['IBLOCK_ID']),false);
} elseif($arSheetParams['IBLOCK_ID']>0){
	$arSectionList = CWDI::GetSections($arSheetParams['IBLOCK_ID'],false);
}
?>
<tr>
	<td class="adm-detail-content-cell-l" width="40%" valign="middle"><div style="padding:8px 0;"><?=WdiHint(GetMessage('WDI_PARAM_TARGET_IBLOCK_HINT'));?> <?=GetMessage('WDI_PARAM_TARGET_IBLOCK');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div id="excel_target_iblock_<?=$SheetIndex;?>">
			<select class="select_iblock" name="PARAMS[S][<?=$SheetIndex;?>][IBLOCK_ID]">
				<option value=""><?=GetMessage('WDI_PARAM_TARGET_IBLOCK_EMPTY')?></option>
				<?foreach($arIBlockList as $IBlockTypeID => $arIBlockType):?>
					<?if(!empty($arIBlockType['ITEMS'])):?>
						<optgroup label="<?=$arIBlockType['NAME']?> [<?=$IBlockTypeID;?>]">
							<?foreach($arIBlockType['ITEMS'] as $arIBlock):?>
								<option value="<?=$arIBlock['ID']?>" data-iblock-type="<?=$IBlockTypeID;?>" data-no-permissions="<?=($arIBlock['NO_PERMISSIONS']?'Y':'N')?>"<?if($arSheetParams['IBLOCK_ID']==$arIBlock['ID']):?> selected="selected"<?endif?>><?=$arIBlock['NAME']?> [<?=$arIBlock['ID']?>]</option>
							<?endforeach?>
						</optgroup>
					<?endif?>
				<?endforeach?>
			</select>
		</div>
	</td>
</tr>
<tr id="wdi_import_target_iblock_notice_<?=$SheetIndex;?>" style="display:none">
	<td class="adm-detail-content-cell-l"></td>
	<td class="adm-detail-content-cell-r">
		<span id="wdi_import_target_iblock_notice_source_<?=$SheetIndex;?>" style="display:none"><?=GetMessage('WDI_PARAM_TARGET_IBLOCK_NOTICE');?></span>
		<span id="wdi_import_target_iblock_notice_target_<?=$SheetIndex;?>"></span>
	</td>
</tr>
<tr>
	<td class="adm-detail-content-cell-l" width="40%" valign="middle"><div style="padding:8px 0;"><?=WdiHint(GetMessage('WDI_PARAM_TARGET_SECTION_HINT'));?> <?=GetMessage('WDI_PARAM_TARGET_SECTION');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div id="excel_target_section_<?=$SheetIndex;?>" style="display:inline-block; padding-bottom:2px;">
			<?if($_GET['action']=='show_sections_for_iblock'){$APPLICATION->RestartBuffer();}?>
			<select class="select_section" name="PARAMS[S][<?=$SheetIndex;?>][SECTION_ID]">
				<option value=""><?=GetMessage('WDI_PARAM_TARGET_SECTION_EMPTY')?></option>
				<?foreach($arSectionList as $arSection):?>
					<option value="<?=$arSection['ID']?>"<?if($arSheetParams['SECTION_ID']==$arSection['ID']):?> selected="selected"<?endif?><?if($arSection['ACTIVE']=='N'):?> style="color:silver;"<?endif?>><?for($i=1; $i<=($arSection['DEPTH_LEVEL']-1); $i++):?>&nbsp;&nbsp; <?endfor?><?=$arSection['NAME']?> [<?=$arSection['ID']?>]</option>
				<?endforeach?>
			</select>
			<?if($_GET['action']=='show_sections_for_iblock'){die();}?>
		</div>
		<div id="excel_target_section_search_<?=$SheetIndex;?>" style="display:inline-block; padding-bottom:2px; white-space:nowrap;">
			<input type="hidden" name="PARAMS[S][<?=$SheetIndex;?>][SEARCH_ONLY_IN_THIS_SECTION]" value="N" />
			<input type="checkbox" name="PARAMS[S][<?=$SheetIndex;?>][SEARCH_ONLY_IN_THIS_SECTION]" id="wdi_search_only_in_this_section" value="Y" <?if($arSheetParams['SEARCH_ONLY_IN_THIS_SECTION']!='N'):?> checked="checked"<?endif?> />
			<label for="wdi_search_only_in_this_section"><?=GetMessage('WDI_PARAM_SEARCH_ONLY_IN_THIS_SECTION');?></label>
			<script>BX.adminFormTools.modifyCheckbox(BX('wdi_search_only_in_this_section'));</script>
			<?=WdiHint(GetMessage('WDI_PARAM_SEARCH_ONLY_IN_THIS_SECTION_HINT'));?>
		</div>
	</td>
</tr>
<script>
function WdiImportTargetToggleNotice(SheetIndex){
	var Select = $('#excel_target_iblock_'+SheetIndex+' select'),
			IBlockID = Select.val(),
			OptionSelected = Select.find('option:selected');
	if(OptionSelected.attr('data-no-permissions')=='Y') {
		var IBlockTypeID = OptionSelected.attr('data-iblock-type');
		var LanguageID = '<?=LANGUAGE_ID;?>';
		$('#wdi_import_target_iblock_notice_target_'+SheetIndex).html($('#wdi_import_target_iblock_notice_source_'+SheetIndex).html().replace(/#IBLOCK_ID#/g, IBlockID).replace(/#IBLOCK_TYPE_ID#/g, IBlockTypeID).replace(/#LANGUAGE_ID#/g, LanguageID));
		$('#wdi_import_target_iblock_notice_'+SheetIndex).show();
	} else {
		$('#wdi_import_target_iblock_notice_target_'+SheetIndex).html('');
		$('#wdi_import_target_iblock_notice_'+SheetIndex).hide();
	}
}
$('#excel_target_iblock_<?=$SheetIndex;?> select').change(function(){
	$('#excel_target_section_<?=$SheetIndex;?> select option').not('[value=""]').remove();
	$.ajax({
		url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($arFields['ID']);?>&IBLOCK_ID='+$(this).val()+'&lang=<?=LANGUAGE_ID;?>&action=show_sections_for_iblock&handler=<?=htmlspecialcharsbx($arHandler['CODE']);?>&sheet_index='+$('#wdi_active_sheet').val(),
		type: 'GET',
		data: '',
		success: function(HTML) {
			$('#excel_target_section_<?=$SheetIndex;?>').html(HTML);
		}
	});
	WdiImportTargetToggleNotice(<?=$SheetIndex;?>);
	BX.onCustomEvent('wdiProfileIBlockChange', [<?=$SheetIndex;?>,$(this).val()]);
});
WdiImportTargetToggleNotice(<?=$SheetIndex;?>);
</script>
