<?CWDI_Handler::IncludeLangFile(__FILE__);
$arData['SHEET_INDEX'] = 0;
$arParams = $arFields['PARAMS'];
if($_GET['action']=='show_handler_settings' && $_GET['subaction']=='check_api_key'){
	CWDI::StopOutputBuffering();
	print CWDI_OasisCatalog::CheckApiKey(htmlspecialcharsbx($_GET['PARAMS']['APIKEY'])) ? 'Y' : 'N';
	die();
}
?>

<?if($arData['MATCHES_ONLY']!='Y'):?>
	<table class="adm-detail-content-table">
		<tbody>
			<tr>
				<td class="adm-detail-content-cell-l" width="40%" valign="middle"><?=WdiHint(GetMessage('WDI_OASISCATALOG_APIKEY_HINT'));?> <?=GetMessage('WDI_OASISCATALOG_APIKEY');?></td>
				<td class="adm-detail-content-cell-r" width="60%">
					<div id="handler_file_type">
						<input type="text" name="PARAMS[APIKEY]" id="wdi_apikey" value="<?=$arParams['APIKEY']?>" size="35" />
						<input type="button" value="<?=GetMessage('WDI_OASISCATALOG_CHECK_API_KEY');?>" id="wdi_oasiscatalog_check_api_key" />
						<span id="wdi_oasiscatalog_api_key_status"></span>
						<span id="wdi_oasiscatalog_api_key_loader" style="display:none;"><?=WDI_LOADER;?></span>
						<script>
						$('#wdi_oasiscatalog_check_api_key').click(function(E){
							E.preventDefault();
							$('#wdi_oasiscatalog_api_key_loader').show();
							$.ajax({
								url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($arFields['ID']);?>&lang=<?=LANGUAGE_ID;?>&action=show_handler_settings&subaction=check_api_key&handler=<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>',
								type: 'GET',
								data: $('#handler_file_type :input').serialize(),
								success: function(HTML) {
									if(HTML=='Y') {
										$('#wdi_oasiscatalog_api_key_status').addClass('success').removeClass('error').attr('title','<?=GetMessage('WDI_OASISCATALOG_CHECK_API_KEY_SUCCESS');?>');
									} else {
										$('#wdi_oasiscatalog_api_key_status').addClass('error').removeClass('success').attr('title','<?=GetMessage('WDI_OASISCATALOG_CHECK_API_KEY_ERROR');?>');
									}
									$('#wdi_oasiscatalog_api_key_loader').hide();
								},
								error: function(){
									$('#wdi_oasiscatalog_api_key_status').addClass('error').removeClass('success');
									$('#wdi_oasiscatalog_api_key_loader').hide();
								}
							});
						});
						</script>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<hr/>
<?endif?>

<?
CWDI_Handler::IncludeHandlerFileOnce('/class.php',$arHandler,$arFields);
$objOasisCatalog = new CWDI_OasisCatalog($arFields,$arHandler);
$arData['MATCHES'] = $objOasisCatalog->MakeMatches($arData['SHEET_INDEX']);
?>

<input type="hidden" id="wdi_active_sheet" name="active_sheet" value="0" />
<div id="wdi_handler_matches">
	<input type="hidden" name="wdi_save_params" value="Y" />
	<table class="adm-detail-content-table">
		<tbody>
			<tr class="heading"><td colspan="2"><?=GetMessage('WDI_OASISCATALOG_PARAMETERS_MAIN');?></td></tr>
			<?CWDI_Handler::IncludeCommonFile('/profile/import_target.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/link_sections.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/link_elements.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/link_offers.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/skip_single_offer.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeHandlerFile('/include/warehouses_to_quantity.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/main_params.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/matches/sheet_matches.php',$arHandler,$arFields,$arData);?>
		</tbody>
	</table>
	<script>
	BX.addCustomEvent('wdiProfileIBlockChange', function(SheetIndex,IBlockID){
		console.log(SheetIndex);
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
	BX.addCustomEvent('wdiOffersCheckboxChange', function(bState){
		// Параметры привязки торговых предложений
		$('#wdi_handler_matches tr.sheet_offers_link').css('display',(bState?'table-row':'none'));
		if(bState) {
			$('#wdi_handler_matches tr.sheet_offers_link select').change();
		}
		// Опция "Если одно ТП, то загружать его как обычный товар"
		$('#wdi_SKIP_SINGLE_OFFER').css('display',(bState?'table-row':'none'));
		// Вкладки по типам соответствий
		var TabButton = $('#view_tab_subtab_offer_0');
		var TabContent = $('#subtab_offer_0');
		if(TabButton.hasClass('adm-detail-subtab-active')) {
			WdiTabControl_Sheet_0.SelectTab('subtab_element_0');
			TabButton.removeClass('adm-detail-subtab-active');
		}
		TabButton.css('display',(bState?'inline-block':'none'));
		TabContent.css('display','none');
	});
	//
	</script>
</div>
