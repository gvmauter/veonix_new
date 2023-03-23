<?CWDI_Handler::IncludeLangFile(__FILE__);
#define('WDI_HIDE_SUBTAB_OFFERS',true);
$arData['SHEET_INDEX'] = 0;
$arParams = $arFields['PARAMS'];
if($_GET['action']=='show_handler_settings' && $_GET['subaction']=='check_connection'){
	CWDI::StopOutputBuffering();
	print CWDI_HappyGifts::CheckConnection() ? 'Y' : 'N';
	die();
}
?>

<?if($arData['MATCHES_ONLY']!='Y'):?>
	<table class="adm-detail-content-table">
		<tbody>
			<tr>
				<td class="adm-detail-content-cell-l" width="40%" valign="middle"><?=WdiHint(GetMessage('WDI_HAPPYGIFTS_CONNECTION_HINT'));?> <?=GetMessage('WDI_HAPPYGIFTS_CONNECTION');?></td>
				<td class="adm-detail-content-cell-r" width="60%">
					<div id="handler_file_type">
						<input type="button" value="<?=GetMessage('WDI_HAPPYGIFTS_CHECK_CONNECTION');?>" id="wdi_happygifts_check_connection" />
						<span id="wdi_happygifts_connection_status"></span>
						<span id="wdi_happygifts_connection_loader" style="display:none;"><?=WDI_LOADER;?></span>
						<script>
						$('#wdi_happygifts_check_connection').click(function(E){
							E.preventDefault();
							$('#wdi_happygifts_connection_loader').show();
							$.ajax({
								url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($arFields['ID']);?>&lang=<?=LANGUAGE_ID;?>&action=show_handler_settings&subaction=check_connection&handler=<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>',
								type: 'GET',
								data: $('#handler_file_type :input').serialize(),
								success: function(HTML) {
									if(HTML=='Y') {
										$('#wdi_happygifts_connection_status').addClass('success').removeClass('error').attr('title','<?=GetMessage('WDI_HAPPYGIFTS_CONNECTION_SUCCESS');?>');
									} else {
										$('#wdi_happygifts_connection_status').addClass('error').removeClass('success').attr('title','<?=GetMessage('WDI_HAPPYGIFTS_CONNECTION_ERROR');?>');
									}
									$('#wdi_happygifts_connection_loader').hide();
								},
								error: function(){
									$('#wdi_happygifts_connection_status').addClass('error').removeClass('success');
									$('#wdi_happygifts_connection_loader').hide();
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
$objHappyGifts = new CWDI_HappyGifts($arFields,$arHandler);
$arData['MATCHES'] = $objHappyGifts->MakeMatches($arData['SHEET_INDEX']);
?>

<input type="hidden" id="wdi_active_sheet" name="active_sheet" value="0" />
<div id="wdi_handler_matches">
	<input type="hidden" name="wdi_save_params" value="Y" />
	<table class="adm-detail-content-table">
		<tbody>
			<tr class="heading"><td colspan="2"><?=GetMessage('WDI_HAPPYGIFTS_PARAMETERS_MAIN');?></td></tr>
			<?CWDI_Handler::IncludeCommonFile('/profile/import_target.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/link_sections.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/link_elements.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/link_offers.php',$arHandler,$arFields,$arData);?>
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
	</script>
</div>
