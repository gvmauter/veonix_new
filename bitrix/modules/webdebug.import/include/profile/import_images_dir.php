<?
IncludeModuleLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex];
?>
<tr>
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_PARAM_IMAGES_PATH');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div>
			<?
				CAdminFileDialog::ShowScript(Array(
					'event' => 'SelectImagesPath_'.$SheetIndex,
					'arResultDest' => Array('FUNCTION_NAME'=>'wdi_images_path_selected_'.$SheetIndex),
					'arPath' => Array('PATH'=>'/'),
					'select' => 'D',
					'operation' => 'O',
					'showUploadTab' => true,
					'showAddToMenuTab' => false,
					'fileFilter' => '',
					'allowAllFiles' => true,
					'saveConfig' => true
				));
			?>
			<script>
			function wdi_images_path_selected_<?=$SheetIndex;?>(File,Path,Site){
				var FilePath = Path+'/'+File;
				$('#image_path_<?=$SheetIndex;?>').val(FilePath);
			}
			</script>
			<input type="text" name="PARAMS[S][<?=$SheetIndex;?>][IMAGES_PATH]" id="image_path_<?=$SheetIndex;?>" value="<?=$arSheetParams['IMAGES_PATH'];?>" size="60" />
			<input type="button" value="..." id="select_image_path_button_<?=$SheetIndex;?>" onclick="SelectImagesPath_<?=$SheetIndex;?>()" />
		</div>
	</td>
</tr>
<tr>
	<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_PARAM_SEARCH_IMAGES_RECURSIVE');?></td>
	<td class="adm-detail-content-cell-r" width="60%">
		<div>
			<input type="hidden" name="PARAMS[S][<?=$SheetIndex;?>][SEARCH_IMAGES_RECURSIVE]" value="N" />
			<input type="checkbox" name="PARAMS[S][<?=$SheetIndex;?>][SEARCH_IMAGES_RECURSIVE]" value="Y" id="wdi_sheet_search_images_recursive_<?=$SheetIndex;?>"<?if($arSheetParams['SEARCH_IMAGES_RECURSIVE']=='Y'):?> checked="checked"<?endif?> />
			<script>
			BX.adminFormTools.modifyCheckbox(BX('wdi_sheet_search_images_recursive_<?=$SheetIndex;?>'));
			</script>
		</div>
	</td>
</tr>
