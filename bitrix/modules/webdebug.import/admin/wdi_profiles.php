<?
$ModuleID = 'webdebug.import';
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$ModuleID.'/prolog.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$ModuleID.'/install/demo.php');
$GLOBALS['WDI_CATALOG_INCLUDED'] = CModule::IncludeModule('catalog');
CJSCore::Init('jquery');
CAjax::Init();

// Demo
if (wdi_demo_expired()) {
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
	wdi_show_demo();
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_admin.php');
	die();
}

CModule::IncludeModule($ModuleID);
IncludeModuleLangFile(__FILE__);

$ModuleRights = $APPLICATION->GetGroupRight($ModuleID);
if($ModuleRights=='D') {
	$APPLICATION->AuthForm(GetMessage('ACCESS_DENIED'));
}
$bCanWrite = $ModuleRights>='W';

if($bCanWrite && $_GET['stop_all_processes']=='Y') {
	$APPLICATION->RestartBuffer();
	CWDI::SetManualStop(true);
	print 'Y';
	die();
}

$arHandlers = CWDI_Handler::GetList();

$sTableID = 'WdiProfiles';
$oSort = new CAdminSorting($sTableID, 'SORT', 'ASC');
$lAdmin = new CAdminList($sTableID, $oSort);

// Filter
function CheckFilter() {
	global $FilterArr, $lAdmin;
	foreach ($FilterArr as $f) global $f;
	return count($lAdmin->arFilterErrors)==0;
}
$FilterArr = Array(
	'find_ID',
	'find_NAME',
	'find_ACTIVE',
	'find_SORT',
	'find_DESCRIPTION',
	'find_HANDLER',
	'find_SESSION_ID',
	#'find_LAST_ERROR',
	'find_DATE_CREATED_from',
	'find_DATE_CREATED_to',
	'find_DATE_MODIFIED_from',
	'find_DATE_MODIFIED_to',
	'find_DATE_LAST_START_from',
	'find_DATE_LAST_START_to',
	'find_DATE_LAST_SUCCESS_from',
	'find_DATE_LAST_SUCCESS_to',
	'find_DATE_LAST_ACTION_from',
	'find_DATE_LAST_ACTION_to',
	'find_DATE_FILE_from',
	'find_DATE_FILE_to',
);
$lAdmin->InitFilter($FilterArr);
if (CheckFilter()) {
	$arFilter = array();
	if(!empty($find_ID))
		$arFilter['ID'] = $find_ID;
	if(!empty($find_NAME))
		$arFilter['%NAME'] = $find_NAME;
	if(is_numeric($find_SORT) && $find_SORT>=0)
		$arFilter['SORT'] = $find_SORT;
	if($find_ACTIVE=='Y')
		$arFilter['ACTIVE'] = 'Y';
	elseif($find_ACTIVE=='N')
		$arFilter['ACTIVE'] = 'N';
	if(!empty($find_DESCRIPTION))
		$arFilter['%DESCRIPTION'] = $find_DESCRIPTION;
	if(!empty($find_HANDLER))
		$arFilter['HANDLER'] = $find_HANDLER;
	if(!empty($find_SESSION_ID))
		$arFilter['%SESSION_ID'] = $find_SESSION_ID;
	#if(!empty($find_LAST_ERROR))
	#	$arFilter['%LAST_ERROR'] = $find_LAST_ERROR;
	//
	if(!empty($find_DATE_CREATED_from))
		$arFilter['>=DATE_CREATED'] = $find_DATE_CREATED_from;
	if(!empty($find_DATE_CREATED_to))
		$arFilter['<=DATE_CREATED'] = $find_DATE_CREATED_to;
	//
	if(!empty($find_DATE_MODIFIED_from))
		$arFilter['>=DATE_MODIFIED'] = $find_DATE_MODIFIED_from;
	if(!empty($find_DATE_MODIFIED_to))
		$arFilter['<=DATE_MODIFIED'] = $find_DATE_MODIFIED_to;
	//
	if(!empty($find_DATE_LAST_START_from))
		$arFilter['>=DATE_LAST_START'] = $find_DATE_LAST_START_from;
	if(!empty($find_DATE_LAST_START_to))
		$arFilter['<=DATE_LAST_START'] = $find_DATE_LAST_START_to;
	//
	if(!empty($find_DATE_LAST_SUCCESS_from))
		$arFilter['>=DATE_LAST_SUCCESS'] = $find_DATE_LAST_SUCCESS_from;
	if(!empty($find_DATE_LAST_SUCCESS_to))
		$arFilter['<=DATE_LAST_SUCCESS'] = $find_DATE_LAST_SUCCESS_to;
	//
	if(!empty($find_DATE_LAST_ACTION_from))
		$arFilter['>=DATE_LAST_ACTION'] = $find_DATE_LAST_ACTION_from;
	if(!empty($find_DATE_LAST_ACTION_to))
		$arFilter['<=DATE_LAST_ACTION'] = $find_DATE_LAST_ACTION_to;
	//
	if(!empty($find_DATE_FILE_from))
		$arFilter['>=DATE_FILE'] = $find_DATE_FILE_from;
	if(!empty($find_DATE_FILE_to))
		$arFilter['<=DATE_FILE'] = $find_DATE_FILE_to;
}

// Processing with actions
if($lAdmin->EditAction()) {
	foreach($FIELDS as $ID=>$arFields) {
		if(!$lAdmin->IsUpdated($ID)) continue;
		$DB->StartTransaction();
		$ID = IntVal($ID);
		if(($rsData = CWDI_Profile::GetByID($ID)) && ($arData = $rsData->Fetch())) {
			foreach($arFields as $key=>$value) $arData[$key]=$value;
			unset($arData["PHRASES_COUNT"]);
			if(!CWDI_Profile::Update($ID, $arData)) {
				$lAdmin->AddGroupError(GetMessage("rub_save_error"), $ID);
				$DB->Rollback();
			}
		} else {
			$lAdmin->AddGroupError(GetMessage("rub_save_error")." ".GetMessage("rub_no_rubric"), $ID);
			$DB->Rollback();
		}
		$DB->Commit();
	}
}
if(($arID = $lAdmin->GroupAction())) {
  if($_REQUEST['action_target']=='selected') {
    $rsData = CWDI_Profile::GetList(array($by=>$order), $arFilter);
    while($arRes = $rsData->Fetch()) $arID[] = $arRes['ID'];
  }
  foreach($arID as $ID) {
    if(strlen($ID)<=0) continue;
    $ID = IntVal($ID);
    switch($_REQUEST['action']) {
			case "delete":
				@set_time_limit(0);
				$DB->StartTransaction();
				if(!CWDI_Profile::Delete($ID)) {
					$DB->Rollback();
					$lAdmin->AddGroupError(GetMessage("rub_del_err"), $ID);
				}
				$DB->Commit();
				break;
			case "activate":
			case "deactivate":
				if(($rsData = CWDI_Profile::GetByID($ID)) && ($arFields = $rsData->Fetch())) {
					$arFields["ACTIVE"]=($_REQUEST['action']=="activate"?"Y":"N");
					if(!CWDI_Profile::Update($ID, $arFields)) {
						$lAdmin->AddGroupError(GetMessage("rub_save_error"), $ID);
					}
				} else {
					$lAdmin->AddGroupError(GetMessage("rub_save_error")." ".GetMessage("rub_no_rubric"), $ID);
				}
				break;
    }
  }
}

// Get items list
$rsData = CWDI_Profile::GetList(array($by => $order), $arFilter);
$rsData = new CAdminResult($rsData, $sTableID);
$rsData->NavStart();
$lAdmin->NavText($rsData->GetNavPrint(GetMessage("rub_nav")));
$intProfilesCount = IntVal($rsData->NavRecordCount);

// Add headers
$lAdmin->AddHeaders(array(
  array(
	  "id" => "ID",
    "content" => GetMessage("WDI_TABLE_HEADER_ID"),
    "sort" => "ID",
    "align" => "right",
    "default" => true,
  ),
  array(
	  "id" =>"HANDLER",
    "content" => GetMessage("WDI_TABLE_HEADER_HANDLER"),
    "sort" => "HANDLER",
		"align" => "left",
    "default" => true,
  ),
  array(
	  "id" =>"NAME",
    "content" => GetMessage("WDI_TABLE_HEADER_NAME"),
    "sort" => "NAME",
		"align" => "left",
    "default" => true,
  ),
  array(
	  "id" =>"DESCRIPTION",
    "content" => GetMessage("WDI_TABLE_HEADER_DESCRIPTION"),
    "sort" => "DESCRIPTION",
		"align" => "left",
    "default" => false,
  ),
  array(
	  "id" =>"ACTIVE",
    "content" => GetMessage("WDI_TABLE_HEADER_ACTIVE"),
    "sort" => "ACTIVE",
		"align" => "center",
    "default" => true,
  ),
  array(
	  "id" =>"SORT",
    "content" => GetMessage("WDI_TABLE_HEADER_SORT"),
    "sort" => "SORT",
    "align" => "right",
    "default" => true,
  ),
  array(
	  "id" =>"DATE_CREATED",
    "content" => GetMessage("WDI_TABLE_HEADER_DATE_CREATED"),
    "sort" => "DATE_CREATED",
		"align" => "right",
    "default" => false,
  ),
  array(
	  "id" =>"DATE_MODIFIED",
    "content" => GetMessage("WDI_TABLE_HEADER_DATE_MODIFIED"),
    "sort" => "DATE_MODIFIED",
		"align" => "right",
    "default" => false,
  ),
  array(
	  "id" =>"DATE_LAST_START",
    "content" => GetMessage("WDI_TABLE_HEADER_DATE_LAST_START"),
    "sort" => "DATE_LAST_START",
		"align" => "right",
    "default" => true,
  ),
  array(
	  "id" =>"DATE_LAST_SUCCESS",
    "content" => GetMessage("WDI_TABLE_HEADER_DATE_LAST_SUCCESS"),
    "sort" => "DATE_LAST_SUCCESS",
		"align" => "right",
    "default" => true,
  ),
  array(
	  "id" =>"DATE_LAST_ACTION",
    "content" => GetMessage("WDI_TABLE_HEADER_DATE_LAST_ACTION"),
    "sort" => "DATE_LAST_ACTION",
		"align" => "right",
    "default" => false,
  ),
  array(
	  "id" =>"DATE_FILE",
    "content" => GetMessage("WDI_TABLE_HEADER_DATE_FILE"),
    "sort" => "DATE_FILE",
		"align" => "right",
    "default" => false,
  ),
  array(
	  "id" =>"SESSION_ID",
    "content" => GetMessage("WDI_TABLE_HEADER_SESSION_ID"),
    "sort" => "SESSION_ID",
		"align" => "left",
    "default" => false,
  ),
	/*
  array(
	  "id" =>"LAST_ERROR",
    "content" => GetMessage("WDI_TABLE_HEADER_LAST_ERROR"),
    "sort" => "LAST_ERROR",
		"align" => "left",
    "default" => false,
  ),
	*/
  array(
	  "id" => "STATUS",
    "content" => GetMessage("WDI_TABLE_HEADER_STATUS"),
    "sort" => "STATUS",
    "align" => "right",
    "default" => true,
  ),
));

// Build items list
$ZeroDate = preg_replace('#[A-z]#i','0',FORMAT_DATETIME);
$arStatuses = array();
while ($arRes = $rsData->NavNext(true, "f_")) {
  $row = &$lAdmin->AddRow($f_ID, $arRes); 
	// ID
	$row->AddViewField("ID", "<a href='wdi_profile.php?ID={$f_ID}&lang=".LANGUAGE_ID."'>{$f_ID}</a>");
	// HANDLER
	$strHandler = $f_HANDLER;
	if(!empty($f_HANDLER) && is_array($arHandlers[$f_HANDLER])) {
		$strHandler = '<span class="wdi_profiles_handler_text">'.(!empty($arHandlers[$f_HANDLER]['TITLE']) ? $arHandlers[$f_HANDLER]['TITLE'] : $arHandlers[$f_HANDLER]['NAME']).'</span>';
		if(!empty($arHandlers[$f_HANDLER]['ICON'])) {
			$strHandler = '<img src="'.$arHandlers[$f_HANDLER]['ICON'].'" alt="" class="wdi_profiles_handler_icon" />'.$strHandler;
		}
	}
	$row->AddViewField("HANDLER", '<span class="wdi_profiles_handler_wrapper">'.$strHandler.'</span>');
  // NAME
  $row->AddInputField("NAME",array("SIZE" => "40"));
  $row->AddViewField("NAME", "<a href='wdi_profile.php?ID={$f_ID}&lang=".LANGUAGE_ID."'>{$f_NAME}</a>");
  // ACTIVE
  $row->AddCheckField("ACTIVE"); 
  // SORT
  $row->AddInputField("SORT", array("SIZE"=>5)); 
	// DESCRIPTION
	$sHTML = '<textarea rows="4" cols="40" name="FIELDS['.$f_ID.'][DESCRIPTION]">'.htmlspecialchars($row->arRes["DESCRIPTION"]).'</textarea>';
	$row->AddEditField("DESCRIPTION", $sHTML);
	$row->AddViewField("DESCRIPTION", $f_DESCRIPTION);
	// DATES
	if ($f_DATE_CREATED==$ZeroDate) {
		$f_DATE_CREATED = '';
	}
	$row->AddViewField("DATE_CREATED", $f_DATE_CREATED);
	if ($f_DATE_MODIFIED==$ZeroDate) {
		$f_DATE_MODIFIED = '';
	}
	$row->AddViewField("DATE_MODIFIED", $f_DATE_MODIFIED);
	// DATE_LAST_START
	if ($f_DATE_LAST_START==$ZeroDate) {
		$f_DATE_LAST_START = '';
	}
	$row->AddViewField("DATE_LAST_START", '<div id="wdi_profile_date_start_'.$f_ID.'">'.$f_DATE_LAST_START.'</div>');
	// DATE_LAST_SUCCESS
	if ($f_DATE_LAST_SUCCESS==$ZeroDate) {
		$f_DATE_LAST_SUCCESS = '';
	}
	$row->AddViewField("DATE_LAST_SUCCESS", '<div id="wdi_profile_date_success_'.$f_ID.'">'.$f_DATE_LAST_SUCCESS.'</div>');
	// DATE_LAST_ACTION
	if ($f_DATE_LAST_ACTION==$ZeroDate) {
		$f_DATE_LAST_ACTION = '';
	}
	$row->AddViewField("DATE_LAST_ACTION", '<div id="wdi_profile_date_action_'.$f_ID.'">'.$f_DATE_LAST_ACTION.'</div>');
	// SESSION_ID
	$row->AddViewField("SESSION_ID", '<div id="wdi_profile_session_'.$f_ID.'">'.$f_SESSION_ID.'</div>');
	// STATUS
	$arStatus = @explode('|',$f_STATUS);
	$StatusHTML = '';
	$StatusHTML .= '<div class="wdi_profile_status" id="wdi_profile_status_'.$f_ID.'" style="min-height:35px">';
	if(!empty($arStatus[0])) {
		$StatusHTML .= '<div class="status">'.$arStatus[0].'</div>';
	}
	if($arStatus[1]>=0 && $arStatus[2]>0) {
		$Width = round($arStatus[1]*100/$arStatus[2],1);
		$StatusHTML .= '<div class="progress">';
		$StatusHTML .= '<div class="text">'.$arStatus[1].'/'.$arStatus[2].'</div>';
		$StatusHTML .= '<div class="bar" style="width:'.$Width.'%;"></div>';
		$StatusHTML .= '</div>';
	}
	$StatusHTML .= '</div>';
	$row->AddViewField("STATUS", "<div>".$StatusHTML."</div>");
	$arStatuses[$arRes['ID']] = array(
		'CODE' => $f_STATUS_CODE,
		'HTML' => $StatusHTML,
		'DATE_START' => $f_DATE_LAST_START,
		'DATE_SUCCESS' => $f_DATE_LAST_SUCCESS,
		'DATE_ACTION' => $f_DATE_LAST_ACTION,
		'SESSION_ID' => $f_SESSION_ID,
	);
	// Build context menu
  $arActions = Array();
  $arActions[] = array(
    "ICON" => "edit",
    "DEFAULT"=>true,
    "TEXT" => GetMessage("WDI_CONTEXT_PROFILE_EDIT"),
    "ACTION"=>$lAdmin->ActionRedirect("wdi_profile.php?ID=".$f_ID."&lang=".LANGUAGE_ID)
  );
  $arActions[] = array(
    "ICON" => "copy",
    "DEFAULT"=>true,
    "TEXT" => GetMessage("WDI_CONTEXT_PROFILE_COPY"),
    "ACTION"=>$lAdmin->ActionRedirect("wdi_profile.php?CopyID=".$f_ID."&lang=".LANGUAGE_ID)
  );
	$arActions[] = array(
		"ICON" => "delete",
		"DEFAULT"=>false,
		"TEXT" => GetMessage("WDI_CONTEXT_PROFILE_DELETE"),
		"ACTION" => "if(confirm('".sprintf(GetMessage('WDI_CONTEXT_PROFILE_DELETE_CONFIRM'), $f_NAME)."')&&'u254'=='u254') ".$lAdmin->ActionDoGroup($f_ID, "delete")
	);
  $arActions[] = array("SEPARATOR"=>true);
  if(is_set($arActions[count($arActions)-1], "SEPARATOR")) {
    unset($arActions[count($arActions)-1]);
	}
  $row->AddActions($arActions);
}

$bProcessActive = false;
foreach($arStatuses as $arStatus){
	if(!in_array(trim($arStatus['CODE']),array('','FINISHED','BREAKED','ERROR'))) {
		$bProcessActive = true;
	}
}
if($bProcessActive) {
	$strStopFile = CWDI::GetStopFile();
	if(is_file($_SERVER['DOCUMENT_ROOT'].$strStopFile)) {
		$bProcessActive = false;
	}
}

if($_GET['get_status']=='Y') {
	header('Content-Type: application/json');
	$APPLICATION->RestartBuffer();
	if(!CWDI::IsUtf()){
		$arStatuses = CWDI::ConvertCharset($arStatuses,'CP1251','UTF-8');
	}
	$arJsonResult = array(
		'STATUSES' => $arStatuses,
		'ACTIVE' => $bProcessActive,
	);
	print json_encode($arJsonResult);
	die();
}

// List Footer
$lAdmin->AddFooter(
  array(
    array("title" => GetMessage("MAIN_ADMIN_LIST_SELECTED"), "value"=>$rsData->SelectedRowsCount()),
    array("counter"=>true, "title" => GetMessage("MAIN_ADMIN_LIST_CHECKED"), "value" => "0"),
  )
);
$lAdmin->AddGroupActionTable(Array(
  "delete" => GetMessage("MAIN_ADMIN_LIST_DELETE"),
  "activate" => GetMessage("MAIN_ADMIN_LIST_ACTIVATE"),
  "deactivate" => GetMessage("MAIN_ADMIN_LIST_DEACTIVATE"),
));

// Context menu
global $APPLICATION;
$aContext = array(
  array(
    "TEXT" => GetMessage("WDI_TOOLBAR_ADD"),
    "LINK" => "wdi_profile.php?lang=".LANGUAGE_ID,
    "ICON" => "btn_new",
  ),
  array(
    "TEXT" => GetMessage("WDI_TOOLBAR_STOP"),
    "ICON" => "btn_wdi_stop",
  ),
  array(
    "TEXT" => GetMessage("WDI_TOOLBAR_HELP"),
    "ONCLICK" => "WdiHelp_OpenPopup();",
  ),
  array(
    "TEXT" => GetMessage("WDI_TOOLBAR_AUTOCREATE"),
    "ONCLICK" => "WdiAutoCreate_OpenPopup();",
  ),
);
$lAdmin->AddAdminContextMenu($aContext);

// Start output
$lAdmin->CheckListMode();
$APPLICATION->SetTitle(GetMessage('WDI_PAGE_TITLE'));
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");

// Demo
if (!wdi_demo_expired()) {
	wdi_show_demo();
}

// Output filter
$oFilter = new CAdminFilter(
  $sTableID."_filter",
  array(
		GetMessage('WDI_TABLE_FILTER_NAME'),
		GetMessage('WDI_TABLE_FILTER_ACTIVE'),
		GetMessage('WDI_TABLE_FILTER_SORT'),
		GetMessage('WDI_TABLE_FILTER_DESCRIPTION'),
		GetMessage('WDI_TABLE_FILTER_HANDLER'),
		GetMessage('WDI_TABLE_FILTER_SESSION_ID'),
		#GetMessage('WDI_TABLE_FILTER_LAST_ERROR'),
		GetMessage('WDI_TABLE_FILTER_DATE_CREATED'),
		GetMessage('WDI_TABLE_FILTER_DATE_MODIFIED'),
		GetMessage('WDI_TABLE_FILTER_DATE_LAST_START'),
		GetMessage('WDI_TABLE_FILTER_DATE_LAST_SUCCESS'),
		GetMessage('WDI_TABLE_FILTER_DATE_LAST_ACTION'),
		GetMessage('WDI_TABLE_FILTER_DATE_FILE'),
  )
);
?>

<?include($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$ModuleID.'/include/popup/backup.php');?>
<?include($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$ModuleID.'/include/popup/help.php');?>
<?include($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$ModuleID.'/include/popup/autocreate.php');?>

<form name="find_form" method="get" action="<?=$APPLICATION->GetCurPage();?>">
	<?$oFilter->Begin();?>
	<tr>
		<td><b><?=GetMessage('WDI_TABLE_FILTER_ID')?>:</b></td>
		<td>
			<input type="text" size="25" name="find_ID" value="<?=htmlspecialcharsbx($find_ID);?>" />
		</td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_NAME')?>:</td>
		<td><input type="text" size="50" maxlength="255" name="find_NAME" value="<?=htmlspecialcharsbx($find_NAME);?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_ACTIVE')?>:</td>
		<td>
			<?$arActiveValues = array(
				'reference' => array(
					GetMessage('WDI_Y'),
					GetMessage('WDI_N'),
				),
				'reference_id' => array('Y','N')
			);?>
			<?=SelectBoxFromArray('find_ACTIVE', $arActiveValues, $find_ACTIVE, GetMessage('MAIN_ALL'), '');?>
		</td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_SORT')?>:</td>
		<td><input type="text" size="10" maxlength="10" name="find_SORT" value="<?=htmlspecialcharsbx($find_SORT);?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_DESCRIPTION')?>:</td>
		<td><input type="text" size="50" maxlength="255" name="find_DESCRIPTION" value="<?=htmlspecialcharsbx($find_DESCRIPTION);?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_HANDLER')?>:</td>
		<td>
			<select name="find_HANDLER">
				<option value=""><?=GetMessage('MAIN_ALL');?></option>
				<?foreach ($arHandlers as $arHandler):?>
					<option value="<?=$arHandler['CODE']?>"<?if($find_HANDLER==$arHandler['CODE']):?> selected="selected"<?endif?>><?=$arHandler['TITLE']?></option>
				<?endforeach?>
			</select>
		</td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_SESSION_ID')?>:</td>
		<td><input type="text" size="50" maxlength="255" name="find_SESSION_ID" value="<?=htmlspecialcharsbx($find_SESSION_ID);?>" /></td>
	</tr>
	<?/*
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_LAST_ERROR')?>:</td>
		<td><input type="text" size="50" maxlength="255" name="find_LAST_ERROR" value="<?=htmlspecialcharsbx($find_LAST_ERROR);?>" /></td>
	</tr>
	*/?>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_DATE_CREATED')?>:</td>
		<td><?=CalendarPeriod('find_DATE_CREATED_from', htmlspecialcharsbx($find_DATE_CREATED_from), 'find_DATE_CREATED_to', htmlspecialcharsbx($find_DATE_CREATED_to), 'find_form', 'Y')?></td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_DATE_MODIFIED')?>:</td>
		<td><?=CalendarPeriod('find_DATE_MODIFIED_from', htmlspecialcharsbx($find_DATE_MODIFIED_from), 'find_DATE_MODIFIED_to', htmlspecialcharsbx($find_DATE_MODIFIED_to), 'find_form', 'Y')?></td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_DATE_LAST_START')?>:</td>
		<td><?=CalendarPeriod('find_DATE_LAST_START_from', htmlspecialcharsbx($find_DATE_LAST_START_from), 'find_DATE_LAST_START_to', htmlspecialcharsbx($find_DATE_LAST_START_to), 'find_form', 'Y')?></td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_DATE_LAST_SUCCESS')?>:</td>
		<td><?=CalendarPeriod('find_DATE_LAST_SUCCESS_from', htmlspecialcharsbx($find_DATE_LAST_SUCCESS_from), 'find_DATE_LAST_SUCCESS_to', htmlspecialcharsbx($find_DATE_LAST_SUCCESS_to), 'find_form', 'Y')?></td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_DATE_LAST_ACTION')?>:</td>
		<td><?=CalendarPeriod('find_DATE_LAST_ACTION_from', htmlspecialcharsbx($find_DATE_LAST_ACTION_from), 'find_DATE_LAST_ACTION_to', htmlspecialcharsbx($find_DATE_LAST_ACTION_to), 'find_form', 'Y')?></td>
	</tr>
	<tr>
		<td><?=GetMessage('WDI_TABLE_FILTER_DATE_FILE')?>:</td>
		<td><?=CalendarPeriod('find_DATE_FILE_from', htmlspecialcharsbx($find_DATE_FILE_from), 'find_DATE_FILE_to', htmlspecialcharsbx($find_DATE_FILE_to), 'find_form', 'Y')?></td>
	</tr>
	<?$oFilter->Buttons(array('table_id'=>$sTableID,'url'=>$APPLICATION->GetCurPage(),'form'=>'find_form'));?>
	<?$oFilter->End();?>
</form>

<?// Output ?>
<?$lAdmin->DisplayList();?>

<script>
WdiToggleStopButton(<?=($bProcessActive?'true':'false');?>);
function WdiToggleStopButton(Enabled){
	if (Enabled) {
		$('#btn_wdi_stop').removeAttr('disabled').removeClass('adm-btn-disabled').removeAttr('style');
	} else {
		$('#btn_wdi_stop').attr('disabled','disabled').addClass('adm-btn-disabled').css({'pointer-events':'none','cursor':'default'});
	}
}
var WdiAjaxRequest = false;
IntervalFunction = setInterval(function(){
	if(WdiAjaxRequest && WdiAjaxRequest.readyState != 4){
		WdiAjaxRequest.abort();
	}
	WdiAjaxRequest = $.ajax({
		url: '<?=$_SERVER['PHP_SELF'];?>?lang=<?=LANGUAGE_ID;?>',
		type: 'GET',
		data: 'get_status=Y',
		datatype: 'json',
		success: function(JSON) {
			for(var ID in JSON.STATUSES) {
				if (!JSON.STATUSES.hasOwnProperty(ID)) continue;
				$('#wdi_profile_status_'+ID).replaceWith(JSON.STATUSES[ID].HTML);
				$('#wdi_profile_date_start_'+ID).html(JSON.STATUSES[ID].DATE_START);
				$('#wdi_profile_date_success_'+ID).html(JSON.STATUSES[ID].DATE_SUCCESS);
				$('#wdi_profile_date_action_'+ID).html(JSON.STATUSES[ID].DATE_ACTION);
				$('#wdi_profile_session_'+ID).html(JSON.STATUSES[ID].SESSION_ID);
			}
			WdiToggleStopButton(JSON.ACTIVE);
		}
	});
},<?=(CWDI::STATUS_INTERVAL)*1000?>);
$(document).delegate('#btn_wdi_stop','click',function(E){
	E.preventDefault();
	if($(this).attr('disabled')==undefined) {
		$.ajax({
			url: location.href,
			type: 'GET',
			data: 'stop_all_processes=Y',
			success: function(HTML) {
				WdiToggleStopButton(false);
			}
		});
	}
});
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");?>