<?IncludeModuleLangFile(__FILE__);
if($_GET['action']=='ftp_test_connection') {
	$arRequest = array(
		'FTP' => true,
		'GET_SIZE' => true,
		'HOST' => $_POST['PARAMS']['FTP_HOST'],
		'PORT' => $_POST['PARAMS']['FTP_PORT'],
		'LOGIN' => $_POST['PARAMS']['FTP_LOGIN'],
		'PASSWORD' => $_POST['PARAMS']['FTP_PASSWORD'],
		'SECURE' => $_POST['PARAMS']['FTP_SECURE'],
		'PASSIVE' => $_POST['PARAMS']['FTP_PASSIVE'],
		'FILENAME' => $_POST['PARAMS']['FTP_FILENAME'],
	);
	$intFileSize = CWDI::Request($arRequest);
	//
	$APPLICATION->RestartBuffer();
	CWDI::StopOutputBuffering();
	print is_numeric($intFileSize) && $intFileSize>-1 ? 'Y' : $GLOBALS['WDI_FTP_ERROR_NAME'];
	die();
}
// ToDo: загрузка файлов из email по imap: http://marketplace.1c-bitrix.ru/solutions/falsecode.pricelists/?sphrase_id=36381847#tab-comments-link (screenshot #3)
?>
<table class="adm-detail-content-table handler_file_uploader">
	<tbody>
		<tr>
			<td class="adm-detail-content-cell-l" width="40%" valign="top"><?=GetMessage('WDI_HANDLER_FILE_TYPE');?></td>
			<td class="adm-detail-content-cell-r" width="60%">
				<div id="handler_file_type">
					<div class="radiobutton"><label><input type="radio" name="PARAMS[HANDLER_FILE_TYPE]" value="manual"<?if(empty($arFields['PARAMS']['HANDLER_FILE_TYPE'])||$arFields['PARAMS']['HANDLER_FILE_TYPE']=='manual'):?> checked="checked"<?endif?> /> <?=GetMessage('WDI_HANDLER_FILE_TYPE_MANUAL');?></label></div>
					<div class="subsettings handler_subsettings"<?if(!(empty($arFields['PARAMS']['HANDLER_FILE_TYPE'])||$arFields['PARAMS']['HANDLER_FILE_TYPE']=='manual')):?> style="display:none"<?endif?>>
						<?CAdminFileDialog::ShowScript(Array(
							'event' => 'WdiSelectFileName',
							'arResultDest' => array('FUNCTION_NAME' => 'wdi_file_name_selected'),
							'arPath' => array(),
							'select' => 'F',
							'operation' => 'O',
							'showUploadTab' => true,
							'showAddToMenuTab' => false,
							'fileFilter' => $FileFormats,
							'allowAllFiles' => true,
							'saveConfig' => true,
						));?>
						<script>
						function wdi_file_name_selected(File,Path,Site){
							var FilePath = Path+'/'+File;
							FilePath = FilePath.replace(/\/\//g,'/');
							$('#wdi_file_name').val(FilePath);
						}
						</script>
						<div class="handler_subtitle"><?=GetMessage('WDI_HANDLER_FILE_TYPE_MANUAL_TITLE');?></div>
						<table>
							<tbody>
								<tr>
									<td><input type="text" name="PARAMS[FILE_NAME]" id="wdi_file_name" value="<?=$arFields['PARAMS']['FILE_NAME']?>" size="40" /></td>
									<td><input type="button" value="<?=GetMessage('WDI_HANDLER_FILE_TYPE_MANUAL_BUTTON');?>" onclick="WdiSelectFileName()" /></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="radiobutton"><label><input type="radio" name="PARAMS[HANDLER_FILE_TYPE]" value="download"<?if($arFields['PARAMS']['HANDLER_FILE_TYPE']=='download'):?> checked="checked"<?endif?> /> <?=GetMessage('WDI_HANDLER_FILE_TYPE_DOWNLOAD');?></label></div>
					<div class="subsettings handler_subsettings"<?if(!($arFields['PARAMS']['HANDLER_FILE_TYPE']=='download')):?> style="display:none"<?endif?>>
						<div class="handler_subtitle"><?=GetMessage('WDI_HANDLER_FILE_TYPE_DOWNLOAD_TITLE');?></div>
						<table>
							<tbody>
								<tr>
									<td>
										<input type="text" name="PARAMS[FILE_URL]" id="wdi_file" value="<?=$arFields['PARAMS']['FILE_URL']?>" size="80" style="width:99%" placeholder="<?=GetMessage('WDI_HANDLER_FILE_TYPE_DOWNLOAD_PLACEHOLDER');?>" />
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="radiobutton"><label><input type="radio" name="PARAMS[HANDLER_FILE_TYPE]" value="ftp"<?if($arFields['PARAMS']['HANDLER_FILE_TYPE']=='ftp'):?> checked="checked"<?endif?> /> <?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP');?></label></div>
					<div class="subsettings handler_subsettings"<?if(!($arFields['PARAMS']['HANDLER_FILE_TYPE']=='ftp')):?> style="display:none"<?endif?>>
						<table class="ftp_settings">
							<col style="width:33%" />
							<col style="width:33%" />
							<col style="width:33%" />
							<tbody>
								<tr>
									<td colspan="3">
										<input type="text" name="PARAMS[FTP_LINK]" id="wdi_ftp_link" value="<?=$arFields['PARAMS']['FTP_LINK']?>" size="80" placeholder="<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_LINK_PLACEHOLDER');?>" />
									</td>
								</tr>
								<tr>
									<td colspan="3" style="text-align:center">
										<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_TITLE1');?>
										<script>
										$('#wdi_ftp_link').bind('textchange',function(){
											var URL = $(this).val();
											if(URL.length>0) {
												URL = parse_url(URL);
												if(typeof URL == 'object' && URL.host!=undefined && URL.scheme!=undefined && URL.path!=undefined) {
													$('#wdi_ftp_host').val(URL.host);
													if($('#wdi_ftp_port').val()=='') {
														$('#wdi_ftp_port').val('21');
													}
													$('#wdi_ftp_login').val(URL.user);
													$('#wdi_ftp_password').val(URL.pass);
													if(URL.scheme.toLowerCase()=='ftps') {
														$('#wdi_ftp_secure').attr('checked','checked');
													} else {
														$('#wdi_ftp_secure').removeAttr('checked');
													}
													$('#wdi_ftp_filename').val(URL.path);
												}
											}
										});
										</script>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_TITLE2');?>
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" name="PARAMS[FTP_HOST]" id="wdi_ftp_host" value="<?=$arFields['PARAMS']['FTP_HOST']?>" size="40" placeholder="<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_HOST_PLACEHOLDER');?>" />
									</td>
									<td>
										<input type="text" name="PARAMS[FTP_PORT]" id="wdi_ftp_port" value="<?=$arFields['PARAMS']['FTP_PORT']?>" size="10" placeholder="<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_PORT_PLACEHOLDER');?>" />
									</td>
									<td>
										<input type="hidden" name="PARAMS[FTP_SECURE]" value="N" />
										<input type="checkbox" name="PARAMS[FTP_SECURE]" id="wdi_ftp_secure" value="Y" size="10"<?if($arFields['PARAMS']['FTP_SECURE']=='Y'):?> checked="checked"<?endif?> />
										<label for="wdi_ftp_secure"><?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_SECURE_TITLE');?></label>
									</td>
								</tr>
								<tr>
									<td>
										<input type="text" name="PARAMS[FTP_LOGIN]" id="wdi_ftp_login" value="<?=$arFields['PARAMS']['FTP_LOGIN']?>" size="20" placeholder="<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_LOGIN_PLACEHOLDER');?>" />
									</td>
									<td>
										<input type="text" name="PARAMS[FTP_PASSWORD]" id="wdi_ftp_password" value="<?=$arFields['PARAMS']['FTP_PASSWORD']?>" size="20" placeholder="<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_PASSWORD_PLACEHOLDER');?>" />
									</td>
									<td>
										<input type="hidden" name="PARAMS[FTP_PASSIVE]" value="N" />
										<input type="checkbox" name="PARAMS[FTP_PASSIVE]" id="wdi_ftp_passive" value="Y" size="10"<?if($arFields['PARAMS']['FTP_PASSIVE']!='N'):?> checked="checked"<?endif?> />
										<label for="wdi_ftp_passive"><?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_PASSIVE_TITLE');?></label>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<input type="text" name="PARAMS[FTP_FILENAME]" id="wdi_ftp_filename" value="<?=$arFields['PARAMS']['FTP_FILENAME']?>" size="20" placeholder="<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_FILENAME_PLACEHOLDER');?>" />
									</td>
								</tr>
								<tr>
									<td colspan="3" style="text-align:center">
										<input type="button" class="small" value="<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_TEST');?>" id="wdi_handler_ftp_test" />
										<script>
										$('#wdi_handler_ftp_test').click(function(){
											$('#wdi_handler_ftp_test').attr('disabled','disabled');
											$.ajax({
												url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($arFields['ID']);?>&lang=<?=LANGUAGE_ID;?>&action=ftp_test_connection',
												type: 'POST',
												data: $('.ftp_settings input').serialize(),
												success: function(HTML) {
													if(HTML=='Y') {
														alert('<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_TEST_SUCCESS');?>');
													} else {
														alert(HTML);
													}
													$('#wdi_handler_ftp_test').removeAttr('disabled');
												},
												error: function(){
													alert('<?=GetMessage('WDI_HANDLER_FILE_TYPE_FTP_ERROR_CONNECT');?>');
													$('#wdi_handler_ftp_test').removeAttr('disabled');
												}
											});
										});
										</script>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="radiobutton"><label><input type="radio" name="PARAMS[HANDLER_FILE_TYPE]" value="search"<?if($arFields['PARAMS']['HANDLER_FILE_TYPE']=='search'):?> checked="checked"<?endif?> /> <?=GetMessage('WDI_HANDLER_FILE_TYPE_SEARCH');?></label></div>
					<div class="subsettings handler_subsettings"<?if(!($arFields['PARAMS']['HANDLER_FILE_TYPE']=='search')):?> style="display:none"<?endif?>>
						<div class="handler_subtitle"><?=GetMessage('WDI_HANDLER_FILE_TYPE_SEARCH_DIR_TITLE');?></div>
						<table>
							<tbody>
								<tr>
									<td>
										<?
											CAdminFileDialog::ShowScript(Array(
												"event" => "WdiSelectFileSearchDir",
												"arResultDest" => array('FUNCTION_NAME' => 'wdi_file_search_dir_selected'),
												"arPath" => Array('PATH'=>"/"),
												"select" => 'D',
												"operation" => 'O',
												"showUploadTab" => true,
												"showAddToMenuTab" => false,
												"fileFilter" => '',
												"allowAllFiles" => true,
												"saveConfig" => true
											));
										?>
										<script>
										function wdi_file_search_dir_selected(File,Path,Site){
											var FilePath = Path+'/'+File;
											$('#wdi_file_search_dir').val(FilePath);
										}
										</script>
										<input type="text" name="PARAMS[FILE_SEARCH_DIR]" id="wdi_file_search_dir" value="<?=$arFields['PARAMS']['FILE_SEARCH_DIR']?>" size="60" />
									</td>
									<td><input type="button" value="<?=GetMessage('WDI_HANDLER_FILE_TYPE_SEARCH_BUTTON');?>" onclick="WdiSelectFileSearchDir()" /></td>
								</tr>
							</tbody>
						</table>
						<div class="handler_subtitle"><?=GetMessage('WDI_HANDLER_FILE_TYPE_SEARCH_MASK_TITLE');?></div>
						<table>
							<tbody>
								<tr>
									<td>
										<input type="text" name="PARAMS[FILE_SEARCH_MASK]" id="wdi_file_search_mask" value="<?=$arFields['PARAMS']['FILE_SEARCH_MASK']?>" size="30" />
									</td>
								</tr>
								<tr>
									<td>
										<input type="hidden" name="PARAMS[FILE_SEARCH_RECURSIVE]" value="N" />
										<label><input type="checkbox" name="PARAMS[FILE_SEARCH_RECURSIVE]" id="wdi_file_search_recursive" value="Y"<?if($arFields['PARAMS']['FILE_SEARCH_RECURSIVE']=='Y'):?> checked="checked"<?endif?> /> <?=GetMessage('WDI_HANDLER_FILE_TYPE_SEARCH_RECURSIVE');?></label>
										<script>BX.adminFormTools.modifyCheckbox(document.getElementById('wdi_file_search_recursive'));</script>
									</td>
								</tr>
								<?/*
								<tr>
									<td>
										<input type="hidden" name="PARAMS[FILE_SEARCH_DELETE]" value="N" />
										<label><input type="checkbox" name="PARAMS[FILE_SEARCH_DELETE]" id="wdi_file_search_delete" value="Y"<?if($arFields['PARAMS']['FILE_SEARCH_DELETE']=='Y'):?> checked="checked"<?endif?> /> <?=GetMessage('WDI_HANDLER_FILE_TYPE_SEARCH_DELETE');?></label>
										<script>BX.adminFormTools.modifyCheckbox(document.getElementById('wdi_file_search_delete'));</script>
									</td>
								</tr>
								*/?>
							</tbody>
						</table>
					</div>
				</div>
				<script>
				$('#handler_file_type .radiobutton input[type=radio]').change(function(){
					$('#handler_file_type .subsettings').hide();
					$(this).parents('.radiobutton').first().next('.subsettings').show();
				});
				</script>
			</td>
		</tr>
		<tr>
			<td class="adm-detail-content-cell-l" width="40%"></td>
			<td class="adm-detail-content-cell-r" width="60%">
				<input type="button" class="adm-btn-green" value="<?=GetMessage('WDI_HANDLER_FILE_DO_READ');?>" id="wdi_file_do_read" />
				<script>
				$('#wdi_file_do_read').click(function(E){
					E.preventDefault();
					$('#wdi_handler_matches').html('<?=WDI_LOADER_TABLE;?>');
					$.ajax({
						url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=IntVal($arFields['ID']);?>&lang=<?=LANGUAGE_ID;?>&action=show_handler_matches&handler=<?=(isset($_GET['handler'])?htmlspecialcharsbx($_GET['handler']):$arFields['HANDLER']);?>',
						type: 'POST',
						data: $('#handler_file_type :input').serialize()+'&rows_per_time='+$('#wdi_parap_rows_per_time input').val(),
						success: function(HTML) {
							$('#wdi_handler_matches').html(HTML);
						}
					});
				});
				</script>
			</td>
		</tr>
	</tbody>
</table>
<hr/>