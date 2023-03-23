<?CWDI_Handler::IncludeLangFile(__FILE__);?>

<?
// Всплывающее окно (содержимое) для выбора цвета заливки из Excel
if($_GET['subaction']=='show_pickformat_popup') {
	define('WDI_HTML_ELEMENTS_IMPORTANT',true);
	$arFields = array_merge($arFields,$_POST);
	CWDI_Handler::IncludeHandlerFileOnce('/class.php',$arHandler,$arFields);
	$Page = IntVal($_GET['page']);
	if($Page<1) {
		$Page = 1;
	}
	$Chunk = 10;
	$StartRow = ($Page-1) * $Chunk + 1;
	$EndRow = $StartRow + $Chunk - 1;
	$arExcelParams = array(
		'SHEET_INDEX' => IntVal($_GET['sheet_index']),
		'START_ROW' => $StartRow,
		'CHUNK_SIZE' => $Chunk,
	);
	$objExcel = new CWDI_Excel($arFields,$arHandler);
	$arFile = $objExcel->GetFile();
	$bFileOpened = $objExcel->OpenFile($arExcelParams);
	if($bFileOpened) {
		$objExcel->SetActiveSheet($arExcelParams['SHEET_INDEX']);
		CWDI::StopOutputBuffering();
		require(dirname(__FILE__).'/include/format_popup.php');
	} else {
		print 'Error!';
	}
	die();
}
// Проверка инфоблока на обязательность привязки к разделам
if($_GET['subaction']=='check_iblock_section_required'){
	$IBlockID = IntVal($_GET['iblock_id']);
	CWDI::StopOutputBuffering();
	print (CWDI::CheckIBlockIsSectionRequired($IBlockID)===true?'Y':'N');
	die();
}
?>

<?if($arData['MATCHES_ONLY']!='Y'):?>
	<?$FileFormats = 'xls,xlsx';?>
	<?CWDI_Handler::IncludeCommonFile('/profile/handler_file_uploader.php',$arHandler,$arFields);?>
	<?CWDI_Handler::IncludeCommonFile('/excel/rows_per_time.php',$arHandler,$arFields);?>
	<hr/>
<?endif?>

<?
CWDI_Handler::IncludeHandlerFileOnce('/class.php',$arHandler,$arFields);
$arHeaderRows = array();
if(is_array($arFields['PARAMS']['S'])) {
	foreach($arFields['PARAMS']['S'] as $SheetIndex => $arSheetParams){
		if(!empty($arFields['PARAMS']['S'][$SheetIndex]['DATA_POSITION']['HEADER_ROW'])){
			$arHeaderRows[] = $arFields['PARAMS']['S'][$SheetIndex]['DATA_POSITION']['HEADER_ROW'];
		}
	}
}
$Start = (!empty($arHeaderRows) ? IntVal(Min($arHeaderRows)) : 1);
if($Start<1) {
	$Start = 1;
}
$RowPerTime = Max(1,IntVal($arFields['PARAMS']['ROWS_PER_TIME']),IntVal($_POST['rows_per_time']));
$arHeaderRows[] = $RowPerTime;
$Chunk = (!empty($arHeaderRows) ? IntVal(Max($arHeaderRows)) : 1) - $Start + 1;
$arExcelParams = array(
	'START_ROW' => $Start,
	'CHUNK_SIZE' => $Chunk,
);
$objExcel = new CWDI_Excel($arFields,$arHandler);
$objExcel->GetFile();
$bFileOpened = $objExcel->OpenFile($arExcelParams);
if($bFileOpened) {
	$objExcel->GetSheetsList();
}
?>

<div id="wdi_handler_matches">
	<?if($bFileOpened):?>
		<input type="hidden" name="wdi_save_params" value="Y" />
		<table class="adm-detail-content-table">
			<tbody>
				<tr class="heading"><td><?=GetMessage('WDI_EXCEL_LOAD_STAT_HEADER');?></td></tr>
				<tr><td><?=GetMessage('WDI_EXCEL_LOAD_STAT_TEXT',array(
					'#FILE_SIZE#' => preg_replace('#^(\d+)\.(\d{2})(9+)#','$1.$2',CFile::FormatSize(filesize($objExcel->arFile['FILE_ABS']))),
					'#TIME#' => CWDI::RoundEx($GLOBALS['WDI_EXCEL_FILE_LOADED_TIME'],-2,true),
					'#MEMORY#' => preg_replace('#^(\d+)\.(\d{2})(9+)#','$1.$2',CFile::FormatSize($GLOBALS['WDI_EXCEL_FILE_LOADED_MEMORY'])))
				);?></td></tr>
			</tbody>
		</table>
		<br/>
		<table class="adm-detail-content-table">
			<tbody>
				<?CWDI_Handler::IncludeCommonFile('/profile/main_params.php',$arHandler,$arFields,array_merge($arData,array('TITLE_SUFFIX'=>GetMessage('WDI_EXCEL_PARAMETERS_MAIN_PARAMS_TITLE_SUFFIX'))));?>
			</tbody>
		</table>
		<table class="adm-detail-content-table"><tbody><tr class="heading"><td><?=GetMessage('WDI_EXCEL_SELECT_SHEET');?></td></tr></tbody></table>
		<div class="wdi_excel_tabs">
			<ul>
				<?foreach($objExcel->arSheets as $SheetIndex => $arSheet):?>
					<li>
						<a href="#sheet_<?=$SheetIndex;?>" class="adm-btn<?if($arFields['PARAMS']['S'][$SheetIndex]['ACTIVE']!='Y'):?> wdi_excel_sheet_inactive<?endif?>"><?=$arSheet['NAME'];?></a>
					</li>
				<?endforeach?>
			</ul>
			<input type="hidden" id="wdi_active_sheet" name="active_sheet" value="<?=$_COOKIE['WDI_ACTIVE_SHEET'];?>" />
		</div>
		<div class="wdi_excel_sheets">
			<?foreach($objExcel->arSheets as $SheetIndex => $arSheet):?>
				<div id="sheet_<?=$SheetIndex?>">
					<?$arData = array('SHEET_INDEX'=>$SheetIndex,'MATCHES'=>$objExcel->MakeMatches($SheetIndex));?>
					<table class="adm-detail-content-table">
						<tbody>
							<tr class="heading"><td colspan="2"><?=GetMessage('WDI_EXCEL_PARAMETERS_MAIN');?></td></tr>
							<?CWDI_Handler::IncludeCommonFile('/excel/sheet_active.php',$arHandler,$arFields,$arData);?>
							<?CWDI_Handler::IncludeCommonFile('/profile/import_target.php',$arHandler,$arFields,$arData);?>
							<?CWDI_Handler::IncludeCommonFile('/profile/import_images_dir.php',$arHandler,$arFields,$arData);?>
							<tr class="heading"><td colspan="2"><?=GetMessage('WDI_EXCEL_PARAMETERS_STRUCTURE');?></td></tr>
							<?CWDI_Handler::IncludeCommonFile('/profile/link_sections.php',$arHandler,$arFields,$arData);?>
							<?CWDI_Handler::IncludeCommonFile('/profile/link_elements.php',$arHandler,$arFields,$arData);?>
							<?CWDI_Handler::IncludeCommonFile('/profile/link_offers.php',$arHandler,$arFields,$arData);?>
							<?CWDI_Handler::IncludeCommonFile('/excel/data_position.php',$arHandler,$arFields,$arData);?>
							<?CWDI_Handler::IncludeHandlerFile('/include/mode.php',$arHandler,$arFields,array_merge($arData,array('OBJ_EXCEL'=>$objExcel)));?>
							<?CWDI_Handler::IncludeCommonFile('/profile/sections_depth.php',$arHandler,$arFields,$arData);?>
							<tr class="heading"><td colspan="2"><?=GetMessage('WDI_EXCEL_PARAMETERS_FORMAT');?></td></tr>
							<?CWDI_Handler::IncludeHandlerFile('/include/format.php',$arHandler,$arFields,array_merge($arData,array('OBJ_EXCEL'=>$objExcel)));?>
							<?CWDI_Handler::IncludeCommonFile('/matches/sheet_matches.php',$arHandler,$arFields,$arData);?>
						</tbody>
					</table>
				</div>
			<?endforeach?>
		</div>
		<script>
		function ExcelSubtabsActualize(SheetIndex, OffersEnabled){
			var Mode = $('#wdi_param_mode_'+SheetIndex+' select').val();
			//
			var TabSections = $('#view_tab_subtab_section_'+SheetIndex);
			var TabElements = $('#view_tab_subtab_element_'+SheetIndex);
			var TabOffers = $('#view_tab_subtab_offer_'+SheetIndex);
			//
			switch(Mode){
				case 'format':
					TabSections.css('display','inline-block');
					TabElements.css('display','inline-block');
					TabOffers.css('display',(OffersEnabled?'inline-block':'none'));
					break;
				case 'columns':
					TabSections.css('display','none');
					TabElements.css('display',(OffersEnabled?'none':'inline-block'));
					TabOffers.css('display',(OffersEnabled?'inline-block':'none'));
					break;
				case 'simple':
					TabSections.css('display','none');
					TabElements.css('display','inline-block');
					TabOffers.css('display','none');
					break;
			}
			$('#sheet_matches_'+SheetIndex+' .adm-detail-subtabs-block').first().find('.adm-detail-subtabs:visible').first().click();
		}
		function ExcelLinksActualize(SheetIndex, OffersEnabled){
			var Mode = $('#wdi_param_mode_'+SheetIndex+' select').val();
			//
			var SectionDepth = $('#wdi_param_sections_depth_'+SheetIndex);
			//
			var LinkSection = $('#wdi_param_section_link_'+SheetIndex);
			var LinkElement = $('#wdi_param_element_link_'+SheetIndex);
			var LinkOffer = $('#wdi_param_offer_link_'+SheetIndex);
			//
			switch(Mode){
				case 'format':
					LinkSection.css('display','table-row');
					LinkElement.css('display','table-row');
					LinkOffer.css('display',(OffersEnabled?'table-row':'none'));
					SectionDepth.css('display','table-row');
					break;
				case 'columns':
					LinkSection.css('display','none');
					LinkElement.css('display',(OffersEnabled?'none':'table-row'));
					LinkOffer.css('display',(OffersEnabled?'table-row':'none'));
					SectionDepth.css('display','table-row');
					break;
				case 'simple':
					LinkSection.css('display','none');
					LinkElement.css('display','table-row');
					LinkOffer.css('display','none');
					SectionDepth.css('display','none');
					break;
			}
		}
		//
		BX.addCustomEvent('wdiOffersCheckboxChange', function(bState){
			var Sheets = <?=CUtil::PhpToJSObject($objExcel->arSheets);?>;
			for(var SheetIndex in Sheets) {
				if(!Sheets.hasOwnProperty(SheetIndex)){
					continue;
				}
				// [для mode=format] Строка в таблице с указанием торгового предложения
				$('#sheet_'+SheetIndex+' table.wdi_format_format tr[data-type=OFFER]').css('display',(bState?'table-row':'none'));
				// [для mode=columns] Строка в таблице с указанием элемента
				$('#sheet_'+SheetIndex+' table.wdi_format_columns tr[data-type=ELEMENT]').css('display',(bState?'table-row':'none'));
				// Актуализация вкладок соответствий полей
				ExcelSubtabsActualize(SheetIndex, bState);
				// Актуализация параметров привязок
				ExcelLinksActualize(SheetIndex,bState);
			}
		});
		//
		BX.addCustomEvent('wdiProfileModeChange', function(SheetIndex,Mode){
			ExcelLinksActualize(SheetIndex,$('#wdi_LOAD_OFFERS input[type=checkbox]').is(':checked'));
			ExcelSubtabsActualize(SheetIndex,$('#wdi_LOAD_OFFERS input[type=checkbox]').is(':checked'));
		});
		//
		BX.addCustomEvent('wdiProfileIBlockChange', function(SheetIndex,IBlockID){
			if(IBlockID>0) {
				$('#sheet_matches_'+SheetIndex).html('<?=WDI_LOADER;?>');
				setTimeout(function(){
					$.ajax({
						url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($ProfileID);?>&IBLOCK_ID='+IBlockID+'&lang=<?=LANGUAGE_ID;?>&action=show_handler_matches&subaction=show_sheet_matches&handler=<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>&sheet='+SheetIndex,
						type: 'POST',
						data: $('#WDI_Tabs_form').serialize(),
						success: function(HTML) {
							$('#sheet_matches_'+SheetIndex).html(HTML);
							BX.onCustomEvent('wdiOffersCheckboxChange', [$('#wdi_LOAD_OFFERS input[type=checkbox]').is(':checked')]);
						}
					});
				},100);
			} else {
				$('#sheet_matches_'+SheetIndex).html('');
			}
		});
		//
		var SheetIndex = parseInt($.cookie('WDI_ACTIVE_SHEET'));
		if(isNaN(SheetIndex) || (SheetIndex+1)>$('.wdi_excel_tabs ul li').size()){
			SheetIndex = 0;
		}
		$('.wdi_excel_tabs ul').WebdebugTabs({
			show:'fadeIn',
			use_hash:false,
			duration:50,
			selected: ++SheetIndex,
			selectedClass:'adm-btn-green',
			after:function(Link, Hash){
				$('#wdi_active_sheet').val(Hash.substr(7));
				$.cookie('WDI_ACTIVE_SHEET',Hash.substr(7),{expires:1, path:'/',domain:'<?=$_SERVER['HTTP_HOST'];?>'});
			}
		});
		</script>
	<?else:?>
		<?=GetMessage('WDI_EXCEL_NO_FILE');?>
	<?endif?>
</div>