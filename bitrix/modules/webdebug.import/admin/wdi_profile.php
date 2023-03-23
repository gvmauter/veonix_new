<?
$ModuleID = 'webdebug.import';
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$ModuleID.'/prolog.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$ModuleID.'/install/demo.php');
$GLOBALS['WDI_CATALOG_INCLUDED'] = CModule::IncludeModule('catalog');
CJSCore::Init('jquery');
$APPLICATION->AddHeadScript('/bitrix/js/'.$ModuleID.'/jquery-ui.min.1.12.1.js');
$APPLICATION->AddHeadScript('/bitrix/js/'.$ModuleID.'/jquery.webdebug.tabs.js');
$APPLICATION->AddHeadScript('/bitrix/js/'.$ModuleID.'/jquery.textchange.min.js');
$APPLICATION->AddHeadScript('/bitrix/js/'.$ModuleID.'/jquery.cookie.min.js');
$APPLICATION->AddHeadScript('/bitrix/js/'.$ModuleID.'/script.js');


define('ROWS_PER_TIME_DEFAULT',1000);

// Demo
if (wdi_demo_expired()) {
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
	wdi_show_demo();
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
	die();
}

CModule::IncludeModule($ModuleID);
IncludeModuleLangFile(__FILE__);

$ModuleRights = $APPLICATION->GetGroupRight($ModuleID);
if($ModuleRights=='D') {
	$APPLICATION->AuthForm(GetMessage('ACCESS_DENIED'));
}
$bCanWrite = $ModuleRights>='W';

$ID = IntVal($_GET['ID']);
$CopyID = IntVal($_GET['CopyID']);

if ($ID>0) {
	$Mode = 'edit';
	$APPLICATION->SetTitle(GetMessage('WDI_PAGE_TITLE_EDIT',array('#ID#'=>$ID)));
	$resProfile = CWDI_Profile::GetByID($ID);
	if ($arFields = $resProfile->GetNext()) {
		$arFields['PARAMS'] = trim($arFields['~PARAMS'])!='' ? unserialize($arFields['~PARAMS']) : array();
		$arFields['MATCHES'] = trim($arFields['~MATCHES'])!='' ? unserialize($arFields['~MATCHES']) : array();
	} else {
		LocalRedirect('/bitrix/admin/wdi_profiles.php?lang='.LANGUAGE_ID);
	}
} else {
	$Mode = 'add';
	if($CopyID>0) {
		$resProfile = CWDI_Profile::GetByID($CopyID);
		if ($arFields = $resProfile->GetNext()) {
			$arFields['PARAMS'] = trim($arFields['~PARAMS'])!='' ? unserialize($arFields['~PARAMS']) : array();
			$arFields['MATCHES'] = trim($arFields['~MATCHES'])!='' ? unserialize($arFields['~MATCHES']) : array();
		}
	} else {
		$APPLICATION->SetTitle(GetMessage('WDI_PAGE_TITLE_ADD'));
		$arFields = array(
			'ACTIVE' => '',
			'NAME' => GetMessage('WDI_DEFAULT_NAME'),
			'SORT' => '100',
		);
	}
}
if(!is_array($arFields['PARAMS'])) {
	$arFields['PARAMS'] = array();
}
if(!is_array($arFields['MATCHES'])) {
	$arFields['MATCHES'] = array();
}

if($Mode=='add'){
	$arFields['PARAMS']['PHP_PATH'] = CWDI_Crontab::GetPhpPath();
}

$arHandlers = CWDI_Handler::GetList();
$Handler = $ID>0 ? $arFields['HANDLER'] : (isset($_GET['handler'])?$_GET['handler']:'');
$arHandler = is_array($arHandlers[$Handler]) ? $arHandlers[$Handler] : array();

$StyleCss = $arHandler['DIR'].'/style.css';
if(!empty($arHandler['DIR']) && is_file($_SERVER['DOCUMENT_ROOT'].$StyleCss) && filesize($_SERVER['DOCUMENT_ROOT'].$StyleCss)>0) {
	$StyleCss = file_get_contents($_SERVER['DOCUMENT_ROOT'].$StyleCss);
	if(!empty($StyleCss)) {
		$APPLICATION->AddHeadString('<style>'.$StyleCss.'</style>');
	}
}

# Include PHPExcel before acrit.(export|exportpro|exportproplus)
CWDI_Excel_All::IncludePhpExcel();

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');

// Demo
if (!wdi_demo_expired()) {
	wdi_show_demo();
}

// Saving
if (isset($_POST['save']) && trim($_POST['save'])!='' || isset($_POST['apply']) && trim($_POST['apply'])!='') {
	$arErrors = array();
	$WdiProfile = new CWDI_Profile;
	$arFields = array(
		'ACTIVE' => $_POST['ACTIVE']=='Y'?'Y':'N',
		'NAME' => $_POST['NAME'],
		'SORT' => $_POST['SORT'],
		'DESCRIPTION' => $_POST['DESCRIPTION'],
		'IGNORE_ERRORS' => $_POST['IGNORE_ERRORS']=='Y'?'Y':'N',
		'HANDLER' => $_POST['HANDLER'],
	);
	$arSavedParams = false;
	if(is_array($arHandlers[$_POST['HANDLER']])) {
		if(!is_array($arHandlers[$_POST['HANDLER']]['SAVE_FIELDS'])) {
			$arHandlers[$_POST['HANDLER']]['SAVE_FIELDS'] = array();
		}
		$arHandlers[$_POST['HANDLER']]['SAVE_FIELDS'] = array_merge($arHandlers[$_POST['HANDLER']]['SAVE_FIELDS'],array(
			'HANDLER_FILE_TYPE',
			'FILE_NAME',
			'FILE_URL',
			'FILE_SEARCH_DIR',
			'FILE_SEARCH_MASK',
			'FILE_SEARCH_RECURSIVE',
			'FILE_SEARCH_DELETE',
			'ROWS_PER_TIME',
			'FTP_LINK',
			'FTP_HOST',
			'FTP_PORT',
			'FTP_SECURE',
			'FTP_LOGIN',
			'FTP_PASSWORD',
			'FTP_PASSIVE',
			'FTP_FILENAME',
		));
	}
	if($ID>0 && !empty($_POST['HANDLER']) && is_array($arHandlers[$_POST['HANDLER']]) && is_array($arHandlers[$_POST['HANDLER']]['SAVE_FIELDS'])) { // Т.к. параметры сохраняются только при корректном выборе файла, а файл, в свою очередь, является параметром, то параметры, влияющие на выбор файла нужно сохранять всегда. Эти параметры хранятся в массиве $arHandler['SAVE_FIELDS']
		$resProfile = CWDI_Profile::GetByID($ID);
		if ($arSavedParams = $resProfile->GetNext()) {
			$arSavedParams = trim($arSavedParams['~PARAMS'])!='' ? unserialize($arSavedParams['~PARAMS']) : array();
		}
		foreach($arSavedParams as $Key => $Value){
			if(in_array($Key,$arHandlers[$_POST['HANDLER']]['SAVE_FIELDS'])) {
				unset($arSavedParams[$Key]);
			}
		}
	}
	$arFields['PARAMS'] = $_POST['PARAMS'];
	if ($_POST['wdi_save_params']!='Y' && is_array($arSavedParams) && !empty($arSavedParams)) {
		$arFields['PARAMS'] = array_merge($arFields['PARAMS'],$arSavedParams);
	}
	$arFields['PARAMS'] = serialize($arFields['PARAMS']);
	if ($_POST['wdi_save_matches']=='Y') {
		$arFields['MATCHES'] = serialize($_POST['MATCHES']);
	}
	$arAvailableFields = $WdiProfile->GetAvailableFields();
	foreach($arFields as $Key => $Value) {
		if (!in_array($Key, $arAvailableFields)) {
			unset($arFields[$Key]);
		}
	}
	if (empty($arErrors)) {
		if ($Mode=='edit') {
			$arFields['DATE_MODIFIED'] = date(CDatabase::DateFormatToPHP(FORMAT_DATETIME));
			$ProfileID = $WdiProfile->Update($ID, $arFields);
		} else {
			$arFields['DATE_CREATED'] = date(CDatabase::DateFormatToPHP(FORMAT_DATETIME));
			$ProfileID = $WdiProfile->Add($arFields);
			if (is_numeric($ProfileID)) {
				$ID = $ProfileID;
			}
		}
		if (is_numeric($ProfileID)) {
			if (isset($_POST['save']) && trim($_POST['save'])!='') {
				LocalRedirect('/bitrix/admin/wdi_profiles.php?lang='.LANGUAGE_ID);
			} else {
				LocalRedirect('/bitrix/admin/wdi_profile.php?ID='.$ID.'&lang='.LANGUAGE_ID);/*.'&sheet='.IntVal($_POST['active_sheet']))*/
			}
		} else {
			$arErrors[] = 'Error saving profile';
		}
	}
	if (!empty($arErrors)) {
		foreach($arErrors as $Error) {
			$Message = new CAdminMessage(array(
				'MESSAGE' => $Error,
				'TYPE' => 'ERROR',
			));
			print $Message->Show();
		}
	}
}

// Deleting
if ($_GET['action']=='delete' && IntVal($_GET['ID'])>0 && check_bitrix_sessid()) {
	$_GET['ID'] = IntVal($_GET["ID"]);
	$WdiProfile = new CWDI_Profile;
	if ($WdiProfile->Delete($_GET['ID'])) {
		LocalRedirect('/bitrix/admin/wdi_profiles.php?lang='.LANGUAGE_ID);
	}
}

/* Context menu [top] */
$aMenu = array();
// MenuItem: Profiles
$aMenu[] = array(
	'TEXT'	=> GetMessage('WDI_TOOLBAR_RETURN'),
	'LINK'	=> '/bitrix/admin/wdi_profiles.php?lang='.LANGUAGE_ID,
	'ICON'	=> 'btn_list',
);
$aMenu[] = array(
	"TEXT" => GetMessage("WDI_TOOLBAR_HELP"),
	"ONCLICK" => "WdiHelp_OpenPopup();",
);
if ($Mode == 'edit') {
	global $APPLICATION;
	$aMenu[] = array(
		'TEXT'	=> GetMessage('WDI_TOOLBAR_ACTIONS'),
		'LINK'	=> '',
		'MENU' => array(
			array(
				'TEXT'	=> GetMessage('WDI_TOOLBAR_ACTION_NEW'),
				'LINK'	=> '/bitrix/admin/wdi_profile.php?lang='.LANGUAGE_ID,
				'ICON'	=> 'btn_new',
			),
			array(
				'TEXT'	=> GetMessage('WDI_TOOLBAR_ACTION_COPY'),
				'LINK'	=> '/bitrix/admin/wdi_profile.php?CopyID='.$ID.'&lang='.LANGUAGE_ID,
				'ICON'	=> 'btn_new',
			),
			array(
				'TEXT'	=> GetMessage('WDI_TOOLBAR_ACTION_DELETE'),
				'LINK'	=> 'javascript:if (confirm("'.sprintf(GetMessage('WDI_TOOLBAR_ACTION_DELETE_CONFIRM'),$arFields['NAME']).'")) window.location=\'/bitrix/admin/wdi_profile.php?action=delete&ID='.$ID.'&lang='.LANGUAGE_ID.'&'.bitrix_sessid_get().'\';',
				'ICON'	=> 'btn_delete',
			),
		),
	);
}
$context = new CAdminContextMenu($aMenu);
$context->Show();
include($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$ModuleID.'/include/popup/help.php');
?>

<?
$arData = array();
switch($_GET['action']) {
	case 'show_handler_settings':  // Handler main settings
		$APPLICATION->RestartBuffer();
		$Handler = htmlspecialcharsbx($_GET['handler']);
		if(!empty($Handler) && is_array($arHandlers[$Handler])) {
			$arHandler = $arHandlers[$Handler];
			$arData = array('HANDLERS'=>$arHandlers);
			if($ID==0) {
				$arFields['HANDLER'] = $Handler;
			}
			if(!isset($_GET['subaction'])) {
				$StyleCss = $arHandler['DIR'].'/style.css';
				if(!empty($arHandler['DIR']) && is_file($_SERVER['DOCUMENT_ROOT'].$StyleCss) && filesize($_SERVER['DOCUMENT_ROOT'].$StyleCss)>0) {
					$StyleCss = file_get_contents($_SERVER['DOCUMENT_ROOT'].$StyleCss);
					if(!empty($StyleCss)) {
						print '<style>'.$StyleCss.'</style>';
					}
				}
				CWDI_Handler::IncludeCommonFile('/profile/handler_description.php',$arHandler,$arFields,$arData);
				CWDI_Handler::IncludeCommonFile('/profile/check_config.php',$arHandler,$arFields,$arData);
			}
			CWDI_Handler::IncludeHandlerFile('/class.php',$arHandler,$arFields,$arData);
			CWDI_Handler::IncludeHandlerFile('/options.php',$arHandler,$arFields,$arData);
		}
		die();
		break;
	case 'show_handler_matches': // Load file and show matches
		$APPLICATION->RestartBuffer();
		$Handler = htmlspecialcharsbx($_GET['handler']);
		if(!empty($Handler) && is_array($arHandlers[$Handler])) {
			$arHandler = $arHandlers[$Handler];
			CWDI_Handler::IncludeHandlerFileOnce('/class.php',$arHandler,$arFields);
			if(is_array($_POST['PARAMS']) && is_array($arFields['PARAMS'])) {
				$arPostParams = $_POST['PARAMS'];
				if(!CWDI::IsUtf()) {
					$arPostParams = CWDI::ConvertCharset($arPostParams);
				}
				$arFields['PARAMS_STORED'] = $arFields['PARAMS'];
				$arFields['PARAMS'] = array_merge($arFields['PARAMS'],$arPostParams);
			}
			CWDI_Handler::IncludeHandlerFile('/options.php',$arHandler,$arFields,array('MATCHES_ONLY'=>'Y'));
		}
		die();
		break;
	case 'show_sections_for_iblock':
		$APPLICATION->RestartBuffer();
		$arData = array('SHEET_INDEX'=>IntVal($_GET['sheet_index']));
		CWDI_Handler::IncludeCommonFile('/profile/import_target.php',$arHandler,$arFields,$arData);
		die();
		break;
	case 'show_matches_field_settings':
		$APPLICATION->RestartBuffer();
		$arData = array('SHEET_INDEX'=>IntVal($_GET['sheet_index']));
		$Handler = htmlspecialcharsbx($_GET['handler']);
		if(!empty($Handler) && is_array($arHandlers[$Handler])) {
			$arHandler = $arHandlers[$Handler];
			CWDI_Handler::IncludeCommonFile('/matches/field_settings.php',$arHandler,$arFields,$arData);
		}
		die();
		break;
	case 'show_matches_field_custom_value':
		$APPLICATION->RestartBuffer();
		$arData = array('SHEET_INDEX'=>IntVal($_GET['sheet_index']));
		$Handler = htmlspecialcharsbx($_GET['handler']);
		if(!empty($Handler) && is_array($arHandlers[$Handler])) {
			$arHandler = $arHandlers[$Handler];
			CWDI_Handler::IncludeCommonFile('/matches/field_custom_value.php',$arHandler,$arFields,$arData);
		}
		die();
		break;
	case 'execute':
		$APPLICATION->RestartBuffer();
		$success = false;
		if(function_exists('proc_open')){
			$strCommand = CWDI_Crontab::GetCommand($ID, $arFields['PARAMS']['PHP_PATH'], false);
			$resProcess = proc_open($strCommand, [['pipe', 'r'], ['pipe', 'w'], ['pipe', 'w']], $arPipes);
			$arProcess = proc_get_status($resProcess);
			if($arProcess['pid']){
				$success = true;
			}
		}
		print $success ? 'Y' : 'N';
		die();
		break;
}
?>

<?
/**
 *	Create tab control with form
 */
$arTabs = array(array('DIV'=>'wdi_tab_general', 'TAB'=>GetMessage('WDI_TAB_GENERAL_NAME'), 'TITLE'=>GetMessage('WDI_TAB_GENERAL_DESC'), 'ICON'=>''));
$TabControl = new CAdminForm('WDI_Tabs', $arTabs);
$TabControl->BeginPrologContent();
CWDI_Handler::IncludeCommonFile('/profile/form_prolog.php',$arHandler,$arFields,$arData);
$TabControl->EndPrologContent();
$TabControl->BeginEpilogContent();
// ...
$TabControl->EndEpilogContent();
$TabControl->Begin(array(
	'FORM_ACTION' => $APPLICATION->GetCurPage().'?ID='.IntVal($ID).'&lang='.LANG,
));
$TabControl->BeginNextFormTab();

/**
 *	Start tab content
 */

// ACTIVE
$TabControl->AddCheckBoxField('ACTIVE', GetMessage('WDI_PARAM_ACTIVE'), false, 'Y', $arFields['ACTIVE']!='N');

// NAME
$TabControl->AddEditField('NAME', GetMessage('WDI_PARAM_NAME'), true, array('size'=>50, 'maxlength'=>50), $arFields['NAME']);

// SORT
$TabControl->AddEditField('SORT', GetMessage('WDI_PARAM_SORT'), false, array('size'=>50, 'maxlength'=>50), $arFields['SORT']);

// DESCRIPTION
$TabControl->BeginCustomField('DESCRIPTION', GetMessage('WDI_PARAM_DESCRIPTION'));?>
	<tr>
		<td><?=$TabControl->GetCustomLabelHTML()?></td>
		<td><textarea name="DESCRIPTION" rows="2" cols="51"><?=$arFields['DESCRIPTION']?></textarea></td>
	</tr><?
$TabControl->EndCustomField('DESCRIPTION');

// IGNORE_ERRORS
$TabControl->BeginCustomField('IGNORE_ERRORS', GetMessage('WDI_PARAM_IGNORE_ERRORS'));?>
	<tr>
		<td width="40%" valign="top">
			<label for="wdi_ignore_errors"><?=WdiHint(GetMessage('WDI_PARAM_IGNORE_ERRORS_HINT'));?> <?=GetMessage('WDI_PARAM_IGNORE_ERRORS');?></label>
		</td>
		<td width="60%">
			<label><input type="hidden" name="PARAMS[IGNORE_ERRORS]" value="N" /><input type="checkbox" name="PARAMS[IGNORE_ERRORS]" id="wdi_ignore_errors" value="Y"<?if($arFields['PARAMS']['IGNORE_ERRORS']=='Y'):?> checked="checked"<?endif?> /></label>
		</td>
	</tr><?
$TabControl->EndCustomField('IGNORE_ERRORS');

// Schedule
$TabControl->BeginCustomField('SCHEDULE', GetMessage('WDI_PARAM_SCHEDULE'));?>
	<tr class="heading"><td colspan="2"><?=$TabControl->GetCustomLabelHTML();?></td></tr>
	<tr>
		<td width="40%" valign="top"><?=WdiHint(GetMessage('WDI_PARAM_SCHEDULE_MODE_HINT'));?> <?=GetMessage('WDI_PARAM_SCHEDULE_MODE');?></td>
		<td width="60%">
			<div id="handler_schedule_mode">
				<div class="radiobutton"><label><input type="radio" name="PARAMS[HANDLER_SCHEDULE_MODE]" value="cron"<?if(empty($arFields['PARAMS']['HANDLER_SCHEDULE_MODE'])||$arFields['PARAMS']['HANDLER_SCHEDULE_MODE']=='cron'):?> checked="checked"<?endif?> /> <?=GetMessage('WDI_PARAM_SCHEDULE_MODE_CRON');?></label></div>
				<div class="radiobutton"><label><input type="radio" name="PARAMS[HANDLER_SCHEDULE_MODE]" value="interval_start"<?if($arFields['PARAMS']['HANDLER_SCHEDULE_MODE']=='interval_start'):?> checked="checked"<?endif?> /> <?=GetMessage('WDI_PARAM_SCHEDULE_MODE_INTERVAL_START');?></label></div>
				<div class="subsettings handler_subsettings"<?if(!($arFields['PARAMS']['HANDLER_SCHEDULE_MODE']=='interval_start')):?> style="display:none"<?endif?>>
					<table>
						<tbody>
							<tr>
								<td>
									<input type="text" name="PARAMS[SCHEDULE_INTERVAL_START_VALUE]" id="wdi_schedule_interval_start_value" value="<?=$arFields['PARAMS']['SCHEDULE_INTERVAL_START_VALUE']?>" size="10" />
								</td>
								<td>
									<select name="PARAMS[SCHEDULE_INTERVAL_START_TYPE]">
										<option value="minute"<?if($arFields['PARAMS']['SCHEDULE_INTERVAL_START_TYPE']=='minute'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_SCHEDULE_MODE_INTERVAL_MINUTE');?></option>
										<option value="hour"<?if($arFields['PARAMS']['SCHEDULE_INTERVAL_START_TYPE']=='hour'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_SCHEDULE_MODE_INTERVAL_HOUR');?></option>
										<option value="day"<?if($arFields['PARAMS']['SCHEDULE_INTERVAL_START_TYPE']=='day'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_SCHEDULE_MODE_INTERVAL_DAY');?></option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="radiobutton"><label><input type="radio" name="PARAMS[HANDLER_SCHEDULE_MODE]" value="interval_end"<?if($arFields['PARAMS']['HANDLER_SCHEDULE_MODE']=='interval_end'):?> checked="checked"<?endif?> /> <?=GetMessage('WDI_PARAM_SCHEDULE_MODE_INTERVAL_END');?></label></div>
				<div class="subsettings handler_subsettings"<?if(!($arFields['PARAMS']['HANDLER_SCHEDULE_MODE']=='interval_end')):?> style="display:none"<?endif?>>
					<table>
						<tbody>
							<tr>
								<td>
									<input type="text" name="PARAMS[SCHEDULE_INTERVAL_END_VALUE]" id="wdi_schedule_interval_end_value" value="<?=$arFields['PARAMS']['SCHEDULE_INTERVAL_END_VALUE']?>" size="10" />
								</td>
								<td>
									<select name="PARAMS[SCHEDULE_INTERVAL_END_TYPE]">
										<option value="minute"<?if($arFields['PARAMS']['SCHEDULE_INTERVAL_END_TYPE']=='minute'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_SCHEDULE_MODE_INTERVAL_MINUTE');?></option>
										<option value="hour"<?if($arFields['PARAMS']['SCHEDULE_INTERVAL_END_TYPE']=='hour'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_SCHEDULE_MODE_INTERVAL_HOUR');?></option>
										<option value="day"<?if($arFields['PARAMS']['SCHEDULE_INTERVAL_END_TYPE']=='day'):?> selected="selected"<?endif?>><?=GetMessage('WDI_PARAM_SCHEDULE_MODE_INTERVAL_DAY');?></option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<script>
			$('#handler_schedule_mode .radiobutton input[type=radio]').change(function(){
				$('#handler_schedule_mode .subsettings').hide();
				$(this).parents('.radiobutton').first().next('.subsettings').show();
			});
			</script>
		</td>
	</tr>
	<tr>
		<td width="40%" valign="top">
			<label for="wdi_individual_run_only"><?=WdiHint(GetMessage('WDI_PARAM_SCHEDULE_INDIVIDUAL_RUN_ONLY_HINT'));?> <?=GetMessage('WDI_PARAM_SCHEDULE_INDIVIDUAL_RUN_ONLY');?></label>
		</td>
		<td width="60%">
			<label><input type="hidden" name="PARAMS[INDIVIDUAL_RUN_ONLY]" value="N" /><input type="checkbox" name="PARAMS[INDIVIDUAL_RUN_ONLY]" id="wdi_individual_run_only" value="Y"<?if($arFields['PARAMS']['INDIVIDUAL_RUN_ONLY']=='Y'):?> checked="checked"<?endif?> /></label>
		</td>
	</tr>
	<tr>
		<td width="40%" valign="top">
			<label for="wdi_php_path"><?=WdiHint(GetMessage('WDI_PARAM_SCHEDULE_PHP_PATH_HINT'));?> <?=GetMessage('WDI_PARAM_SCHEDULE_PHP_PATH');?></label>
		</td>
		<td width="60%">
			<label><input type="text" name="PARAMS[PHP_PATH]" id="wdi_php_path" value="<?=$arFields['PARAMS']['PHP_PATH'];?>" size="30" /></label> <?=GetMessage('WDI_PARAM_SCHEDULE_PHP_PATH_NOT_REQUIRED');?>
		</td>
	</tr>
	<?if($Mode=='edit'):?>
		<tr>
			<td width="40%" valign="top">
				<label><?=WdiHint(GetMessage('WDI_PARAM_MANUAL_CRONTAB_HINT'));?> <?=GetMessage('WDI_PARAM_MANUAL_CRONTAB');?></label>
			</td>
			<td width="60%">
				<div>
					<input type="button" value="<?=GetMessage('WDI_PARAM_MANUAL_CRONTAB_BUTTON_SHOW');?>" id="wdi_cron_command_show" />
				</div>
				<div id="wdi_cron_command" style="display:none;">
					<?
					$Command = CWDI_Crontab::GetCommand($ID, $arFields['PARAMS']['PHP_PATH'], false);
					?>
					<code style="background:#EEE; border:1px solid #ccc; display:block; margin-top:8px; padding:4px 8px;"><?=$Command;?> </code>
				</div>
				<script>
				$('#wdi_cron_command_show').click(function(){
					$('#wdi_cron_command').not(':animated').slideToggle();
				});
				</script>
			</td>
		</tr>
		<tr>
			<td width="40%">
				<label><?=WdiHint(GetMessage('WDI_PARAM_EXECUTE_HINT'));?> <?=GetMessage('WDI_PARAM_EXECUTE');?></label>
			</td>
			<td width="60%">
				<?if(function_exists('proc_open')):?>
					<div>
						<input type="button" value="<?=GetMessage('WDI_PARAM_EXECUTE_BUTTON');?>" id="wdi_execute" />
					</div>
					<script>
					$('#wdi_execute').click(function(){
						$(this).attr('disabled', 'disabled');
						$.ajax({
							url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=$ID;?>&lang=<?=LANGUAGE_ID;?>&action=execute',
							type: 'POST',
							success: function(HTML) {
								if(HTML == 'Y'){
									alert('<?=GetMessage('WDI_PARAM_EXECUTE_SUCCESS');?>');
								}
								else{
									alert('<?=GetMessage('WDI_PARAM_EXECUTE_ERROR');?>');
								}
								$('#wdi_execute').removeAttr('disabled');
							},
							error: function(){
								$('#wdi_execute').removeAttr('disabled');
							}
						});
					});
					</script>
				<?else:?>
					<p style="color:red;"><?=GetMessage('WDI_PARAM_EXECUTE_NOT_AVAILABLE');?></p>
				<?endif?>
			</td>
		</tr>
		<tr>
			<td width="40%" valign="top">
				<label for="wdi_php_path"><?=WdiHint(GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_HINT'));?> <?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB');?></label>
			</td>
			<td width="60%">
				<?
					$Handler = $arFields['HANDLER'];
					if(!empty($Handler) && is_array($arHandlers[$Handler])) {
						$arHandler = $arHandlers[$Handler];
						$arData = array('HANDLERS'=>$arHandlers);
						CWDI_Handler::IncludeCommonFile('/profile/cron_autoconfig.php',$arHandler,$arFields,$arData);
					}
				?>
			</td>
		</tr>
	<?endif?><?
$TabControl->EndCustomField('SCHEDULE');

// HANDLER PARAMS
$TabControl->BeginCustomField('HANDLER_PARAMS', GetMessage('WDI_PARAM_HANDLER_PARAMS'));?>
	<tr class="heading"><td colspan="2"><?=$TabControl->GetCustomLabelHTML();?></td></tr>
	<tr>
		<td><?=WdiHint(GetMessage('WDI_PARAM_HANDLER_PARAMS_HANDLER_HINT'));?> <?=GetMessage('WDI_PARAM_HANDLER_PARAMS_HANDLER');?></td>
		<td>
			<select name="HANDLER" id="wdi_handler_select">
				<option value=""><?=GetMessage('WDI_PARAM_HANDLER_PARAMS_HANDLER_EMPTY');?></option>
				<?foreach($arHandlers as $arHandler):?>
					<option value="<?=$arHandler['CODE'];?>" data-icon="<?=$arHandler['ICON'];?>"<?if($arFields['HANDLER']==$arHandler['CODE']):?> selected="selected"<?endif?>><?=$arHandler['NAME'];?></option>
				<?endforeach?>
			</select>
			<?/*
			<input type="button" value="Refresh" id="wdi_reload_handler_settings" />
			*/?>
			<script>
			$.widget("custom.iconselectmenu", $.ui.selectmenu, {
				_drawButton: function () {
					this._super();
					var options = this.element.find("option");
					if (!options.length) {
						return;
					}
					if (!this.items) this._parseOptions(options);
					this._setIcon(this.items[this.element[0].selectedIndex]);
					this.button.addClass('ui-iconselectmenu-button');
				},
				_renderItem: function( ul, item ) {
					var li = $( "<li>" ),
							wrapper = $( "<div>", { text: item.label } );
					if ( item.disabled ) {
						li.addClass( "ui-state-disabled" );
					}
					$( "<span>", {"class": "ui-icon","style": "background:url('"+item.element.attr( "data-icon" )+"') left top no-repeat;"}).appendTo( wrapper );
					return li.append( wrapper ).appendTo( ul );
				},
				_setIcon: function (item) {
					this.button.find('.ui-item-icon').remove();
					var $icon = this._renderItem('<ul/>', item).find('.ui-icon').addClass('ui-item-icon');
					if ($icon.length > 0) this.button.prepend($icon);
				},
				_select: function (item, event) {
					this._setIcon(item);
					this._super(item, event);
				},
			});
			var WdiHandlers = <?=CUtil::PhpToJSObject($arHandlers);?>;
			var changeSelectMenu = function(event, ui) {
				var Option = $(ui.item.element[0]),
						Handler = Option.val();
				if(typeof WdiHandlers[Handler] == 'object') {
					$('#wdi_handler_settings').html('<?=WDI_LOADER_TABLE;?>');
					$.ajax({
						url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=$ID;?>&lang=<?=LANGUAGE_ID;?>&action=show_handler_settings&handler='+Handler,
						type: 'POST',
						data: $('#WDI_Tabs_form').serialize(),
						success: function(HTML) {
							$('#wdi_handler_settings').html(HTML);
						}
					});
				} else {
					$('#wdi_handler_settings').html('');
				}
				$(this).trigger('change', ui.item);
			};
			$('#wdi_handler_select').iconselectmenu({change:changeSelectMenu}).addClass("ui-menu-icons customicons");
			<?/*
			$('#wdi_reload_handler_settings').click(function(){
				changeSelectMenu(window.event, {item:{element:$('#wdi_handler_select option:selected')}});
			});
			$(document).ready(function(){
				changeSelectMenu(window.event, {item:{element:$('#wdi_handler_select option:selected')}});
			});
			*/?>
			</script>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<hr/>
			<div id="wdi_handler_settings">
				<?
					$Handler = $arFields['HANDLER'];
					if(!empty($Handler) && is_array($arHandlers[$Handler])) {
						$arHandler = $arHandlers[$Handler];
						$arData = array('HANDLERS'=>$arHandlers);
						CWDI_Handler::IncludeCommonFile('/profile/handler_description.php',$arHandler,$arFields,$arData);
						CWDI_Handler::IncludeCommonFile('/profile/check_config.php',$arHandler,$arFields,$arData);
						CWDI_Handler::IncludeHandlerFile('/class.php',$arHandler,$arFields,$arData);
						CWDI_Handler::IncludeHandlerFile('/options.php',$arHandler,$arFields,$arData);
					}
				?>
			</div>
		</td>
	</tr><?
$TabControl->EndCustomField('HANDLER_PARAMS');

/**
 *	End form
 */
$TabControl->Buttons(array(
	'disabled' => false,
	'back_url' => 'wdi_profiles.php?lang='.LANGUAGE_ID,
));
$TabControl->Show();
$TabControl->ShowWarnings($TabControl->GetName(), $message);
?>

<script>
$(window).load(function(){
	window.WdiLoaded = true; // Индикатор готовности JS модуля
	$([
		'/bitrix/themes/.default/images/webdebug.import/success_16.png',
		'/bitrix/themes/.default/images/webdebug.import/error_16.png'
	]).each(function(){
		$('<img/>')[0].src = this;
	});
});
</script>

<?require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_admin.php');?>