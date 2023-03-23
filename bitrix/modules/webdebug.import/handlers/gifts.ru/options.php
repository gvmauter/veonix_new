<?CWDI_Handler::IncludeLangFile(__FILE__);
$arData['SHEET_INDEX'] = 0;
$arParams = $arFields['PARAMS'];
if($_GET['action']=='show_handler_settings' && $_GET['subaction']=='check_login_password'){
	CWDI::StopOutputBuffering();
	print CWDI_Gifts::CheckLoginPassword($_GET['PARAMS']['LOGIN'],$_GET['PARAMS']['PASSWORD']) ? 'Y' : 'N';
	die();
}
if($_GET['action']=='show_handler_settings' && $_GET['subaction']=='check_link_ip'){
	CWDI::StopOutputBuffering();
	CWDI_Handler::IncludeHandlerFileOnce('/class.php',$arHandler,$arFields);
	$objGifts = new CWDI_Gifts($arFields,$arHandler);
	print ($objGifts->CheckIpLinked()===false ? 'N' : 'Y');
	die();
}
?>

<?if($arData['MATCHES_ONLY']!='Y'):?>
	<table class="adm-detail-content-table">
		<tbody>
			<tr>
				<td class="adm-detail-content-cell-l" width="40%" valign="middle"><?=WdiHint(GetMessage('WDI_GIFTS_LOGIN_PASSWORD_HINT'));?> <?=GetMessage('WDI_GIFTS_LOGIN_PASSWORD');?></td>
				<td class="adm-detail-content-cell-r" width="60%">
					<div id="handler_auth">
						<input type="text" name="PARAMS[LOGIN]" id="wdi_login" value="<?=$arParams['LOGIN']?>" size="12" />
						<input type="password" name="PARAMS[PASSWORD]" id="wdi_password" value="<?=$arParams['PASSWORD']?>" size="12" />
						<input type="button" value="<?=GetMessage('WDI_GIFTS_CHECK_LOGIN_PASSWORD');?>" id="wdi_gifts_check_login_password" />
						<span id="wdi_gifts_login_password_status"></span>
						<span id="wdi_gifts_login_password_loader" style="display:none;"><?=WDI_LOADER;?></span>
						<script>
						$('#wdi_gifts_check_login_password').click(function(E){
							E.preventDefault();
							$('#wdi_gifts_login_password_loader').show();
							$.ajax({
								url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($arFields['ID']);?>&lang=<?=LANGUAGE_ID;?>&action=show_handler_settings&subaction=check_login_password&handler=<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>',
								type: 'GET',
								data: $('#handler_auth :input').serialize(),
								success: function(HTML) {
									if(HTML=='Y') {
										$('#wdi_gifts_login_password_status').addClass('success').removeClass('error').attr('title','<?=GetMessage('WDI_GIFTS_CHECK_LOGIN_PASSWORD_SUCCESS');?>');
									} else {
										$('#wdi_gifts_login_password_status').addClass('error').removeClass('success').attr('title','<?=GetMessage('WDI_GIFTS_CHECK_LOGIN_PASSWORD_ERROR');?>');
									}
									$('#wdi_gifts_login_password_loader').hide();
								},
								error: function(){
									$('#wdi_gifts_login_password_status').addClass('error').removeClass('success');
									$('#wdi_gifts_login_password_loader').hide();
								}
							});
						});
						</script>
					</div>
				</td>
			</tr>
			<tr>
				<td class="adm-detail-content-cell-l" width="40%" valign="middle"><?=WdiHint(GetMessage('WDI_GIFTS_LINK_IP_HINT'));?> <?=GetMessage('WDI_GIFTS_LINK_IP');?></td>
				<td class="adm-detail-content-cell-r" width="60%">
					<div id="handler_link_ip">
						<?
						$URL = 'http://api2.gifts.ru/export/v2/manageip';
						$IP = false;
						$IpPattern = '#(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})#';
						$strResponse = trim(CWDI::Request(array('URL'=>'http://ipecho.net/plain','TIMEOUT'=>'5')));
						if(false && preg_match($IpPattern,$strResponse,$M)) {
							$IP = $M[0];
						} else {
							$strResponse = trim(CWDI::Request(array('URL'=>'http://checkip.dyndns.com/','TIMEOUT'=>'5')));
							if (preg_match($IpPattern,$strResponse,$M)) {
								$IP = $M[0];
							}
						}
						?>
						<a href="<?=$URL;?>" target="_blank"><?=$URL;?></a>
						<?if(preg_match($IpPattern,$IP)):?>
							<span><?=GetMessage('WDI_GIFTS_CHECK_LINK_IP_CURRENT',array('#IP#'=>$IP));?></span>
						<?endif?>
						&nbsp;&nbsp;&nbsp;
						<input type="button" value="<?=GetMessage('WDI_GIFTS_CHECK_LINK_IP');?>" id="wdi_gifts_check_link_ip" />
						<span id="wdi_gifts_link_ip_status"></span>
						<span id="wdi_gifts_link_ip_loader" style="display:none;"><?=WDI_LOADER;?></span>
						<script>
						$('#wdi_gifts_check_link_ip').click(function(E){
							E.preventDefault();
							$('#wdi_gifts_link_ip_loader').show();
							$.ajax({
								url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($arFields['ID']);?>&lang=<?=LANGUAGE_ID;?>&action=show_handler_settings&subaction=check_link_ip&handler=<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>',
								type: 'GET',
								data: '',
								success: function(HTML) {
									if(HTML=='Y') {
										$('#wdi_gifts_link_ip_status').addClass('success').removeClass('error').attr('title','<?=GetMessage('WDI_GIFTS_CHECK_LINK_IP_SUCCESS');?>');
									} else {
										$('#wdi_gifts_link_ip_status').addClass('error').removeClass('success').attr('title','<?=GetMessage('WDI_GIFTS_CHECK_LINK_IP_ERROR');?>');
									}
									$('#wdi_gifts_link_ip_loader').hide();
								},
								error: function(){
									$('#wdi_gifts_link_ip_status').addClass('error').removeClass('success');
									$('#wdi_gifts_link_ip_loader').hide();
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
if(!CWDI_Gifts_Callback::Xml()) {
	CAdminMessage::ShowMessage(array(
		'MESSAGE' => GetMessage('WDI_PARAM_ERROR_NO_XML_NAME'),
		'DETAILS' => GetMessage('WDI_PARAM_ERROR_NO_XML_DESC'),
		'HTML' => true,
	));
	return false;
}
CWDI_Handler::IncludeHandlerFileOnce('/class.php',$arHandler,$arFields);
$objGifts = new CWDI_Gifts($arFields,$arHandler);
$arData['MATCHES'] = $objGifts->MakeMatches($arData['SHEET_INDEX']);
?>

<input type="hidden" id="wdi_active_sheet" name="active_sheet" value="0" />
<div id="wdi_handler_matches">
	<input type="hidden" name="wdi_save_params" value="Y" />
	<table class="adm-detail-content-table">
		<tbody>
			<tr class="heading"><td colspan="2"><?=GetMessage('WDI_GIFTS_PARAMETERS_MAIN');?></td></tr>
			<?CWDI_Handler::IncludeHandlerFile('/include/mode.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/import_target.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/link_sections.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/link_elements.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/link_offers.php',$arHandler,$arFields,$arData);?>
			<?CWDI_Handler::IncludeCommonFile('/profile/skip_single_offer.php',$arHandler,$arFields,$arData);?>
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
