<?
IncludeModuleLangFile(__FILE__);
$ProfileID = $arFields['ID'];
$bCanAutoconfig = CWDI_Crontab::CanAutoSet();
$arCurrentSchedule = array();
if($bCanAutoconfig){
	$strCommandLite = CWDI_Crontab::GetCommand($ProfileID, $arFields['PARAMS']['PHP_PATH'], true);
	$strCommandFull = CWDI_Crontab::GetCommand($ProfileID, $arFields['PARAMS']['PHP_PATH']);
	$bCrontabAdded = CWDI_Crontab::IsExists($strCommandLite);
	$strCurrentSchedule = CWDI_Crontab::GetSchedule($strCommandLite);
	$arCurrentSchedule = is_string($strCurrentSchedule) && !empty($strCurrentSchedule) ? explode(' ',$strCurrentSchedule) : $arCurrentSchedule;
}
if($_GET['action']=='cron_set' && $bCanAutoconfig) {
	$bSuccess = false;
	$APPLICATION->RestartBuffer();
	CWDI::StopOutputBuffering();
	if(!empty($_POST)/* && strlen($_POST['minute']) && strlen($_POST['hour']) && strlen($_POST['day']) && strlen($_POST['month']) && strlen($_POST['weekday'])*/) {
		$arSchedule = array(
			htmlspecialcharsbx(strlen($_POST['minute'])?$_POST['minute']:'*'),
			htmlspecialcharsbx(strlen($_POST['hour'])?$_POST['hour']:'*'),
			htmlspecialcharsbx(strlen($_POST['day'])?$_POST['day']:'*'),
			htmlspecialcharsbx(strlen($_POST['month'])?$_POST['month']:'*'),
			htmlspecialcharsbx(strlen($_POST['weekday'])?$_POST['weekday']:'*'),
		);
		$strSchedule = implode(' ',$arSchedule);
		CWDI_Crontab::Delete($strCommandLite);
		if(CWDI_Crontab::Add($strCommandFull, $strSchedule)) {
			$bSuccess = true;
		}
	}
	print $bSuccess ? 'Y' : 'N';
	die();
}
if($_GET['action']=='cron_unset' && $bCanAutoconfig) {
	$bSuccess = false;
	$APPLICATION->RestartBuffer();
	CWDI::StopOutputBuffering();
	if (CWDI_Crontab::Delete($strCommandLite)) {
		$bSuccess = true;
	}
	print $bSuccess ? 'Y' : 'N';
	die();
}
?>
<div id="wdi_cron_autoconfig">
	<?if($bCanAutoconfig):?>
		<?if(CWDI_Crontab::IsTimeweb()):?>
			<div id="wdi_cron_is_timeweb"><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_IS_TIMEWEB');?></div>
		<?endif?>
		<div id="wdi_cron_autoconfig_is_set" style="<?if(!$bCrontabAdded):?>display:none;<?endif?> margin-bottom:15px;"><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_EXISTS');?></div>
		<div class="profile_cron">
			<div class="item item_minute">
				<label><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_MINUTE');?></label>
				<input type="text" name="minute" size="5" maxlength="50" value="<?=$arCurrentSchedule[0];?>" placeholder="*" />
			</div>
			<div class="item item_hour">
				<label><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_HOUR');?></label>
				<input type="text" name="hour" size="5" maxlength="50" value="<?=$arCurrentSchedule[1];?>" placeholder="*"/>
			</div>
			<div class="item item_day">
				<label><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_DAY');?></label>
				<input type="text" name="day" size="5" maxlength="50" value="<?=$arCurrentSchedule[2];?>" placeholder="*"/>
			</div>
			<div class="item item_month">
				<label><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_MONTH');?></label>
				<input type="text" name="month" size="5" maxlength="50" value="<?=$arCurrentSchedule[3];?>" placeholder="*"/>
			</div>
			<div class="item item_weekday">
				<label><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_WEEKDAY');?></label>
				<input type="text" name="weekday" size="5" maxlength="50" value="<?=$arCurrentSchedule[4];?>" placeholder="*"/>
			</div>
			<div class="item item_select">
				<label><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SELECT');?></label>
				<select>
					<option value=""></option>
					<option value="every_minute" data-minute="*" data-hour="*" data-day="*" data-month="*" data-weekday="*"><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SELECT_EVERY_MINUTE');?></option>
					<option value="every_5_minutes" data-minute="*/5" data-hour="*" data-day="*" data-month="*" data-weekday="*"><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SELECT_EVERY_5_MINUTES');?></option>
					<option value="every_10_minutes" data-minute="*/10" data-hour="*" data-day="*" data-month="*" data-weekday="*"><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SELECT_EVERY_10_MINUTES');?></option>
					<option value="every_30_minutes" data-minute="*/30" data-hour="*" data-day="*" data-month="*" data-weekday="*"><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SELECT_EVERY_30_MINUTES');?></option>
					<option value="every_hour" data-minute="00" data-hour="*" data-day="*" data-month="*" data-weekday="*"><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SELECT_EVERY_HOUR');?></option>
					<option value="every_day" data-minute="00" data-hour="00" data-day="*" data-month="*" data-weekday="*"><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SELECT_EVERY_DAY');?></option>
					<option value="every_month" data-minute="00" data-hour="00" data-day="01" data-month="*" data-weekday="*"><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SELECT_EVERY_MONTH');?></option>
				</select>
			</div>
		</div>
		<div class="profile_cron_buttons">
			<input type="button" value="<?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SET');?>" data-action="set" data-profile="<?=$ProfileID;?>" />
			<input type="button" value="<?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_UNSET');?>" data-action="unset" data-profile="<?=$ProfileID;?>" />
		</div>
		<script>
		function WdiSetCronScheduleInputs(Minute, Hour, Day, Month, WeekDay){
			$('#wdi_cron_autoconfig .profile_cron .item_minute input[type=text]').val(Minute);
			$('#wdi_cron_autoconfig .profile_cron .item_hour input[type=text]').val(Hour);
			$('#wdi_cron_autoconfig .profile_cron .item_day input[type=text]').val(Day);
			$('#wdi_cron_autoconfig .profile_cron .item_month input[type=text]').val(Month);
			$('#wdi_cron_autoconfig .profile_cron .item_weekday input[type=text]').val(WeekDay);
		}
		function WdiLeadingZeroOfTwoDigits(Value){
			ValueInt = parseInt(Value);
			Value = Value+'';
			if(!isNaN(ValueInt) && Value.length==1) {
				Value = '0'+Value;
			}
			return Value;
		}
		$('#wdi_cron_autoconfig .profile_cron .item input[type=text]').bind('textchange',function(){
			var Minute = $('#wdi_cron_autoconfig .profile_cron .item_minute input[type=text]').val();
			var Hour = $('#wdi_cron_autoconfig .profile_cron .item_hour input[type=text]').val();
			var Day = $('#wdi_cron_autoconfig .profile_cron .item_day input[type=text]').val();
			var Month = $('#wdi_cron_autoconfig .profile_cron .item_month input[type=text]').val();
			var WeekDay = $('#wdi_cron_autoconfig .profile_cron .item_weekday input[type=text]').val();
			//
			Minute = WdiLeadingZeroOfTwoDigits(Minute);
			Hour = WdiLeadingZeroOfTwoDigits(Hour);
			Day = WdiLeadingZeroOfTwoDigits(Day);
			Month = WdiLeadingZeroOfTwoDigits(Month);
			//
			var Found = false;
			$('#wdi_cron_autoconfig .item_select select option').each(function(){
				if($(this).attr('data-minute')+'|'+$(this).attr('data-hour')+'|'+$(this).attr('data-day')+'|'+$(this).attr('data-month')+'|'+$(this).attr('data-weekday') == Minute+'|'+Hour+'|'+Day+'|'+Month+'|'+WeekDay) {
					Found = true;
					$('#wdi_cron_autoconfig .item_select select').val($(this).val());
				}
			});
			if(!Found) {
				$('#wdi_cron_autoconfig .item_select select').val('');
			}
		}).trigger('textchange');
		$('#wdi_cron_autoconfig .item_select select').change(function(){
			var OptionSelected = $(this).find('option:selected');
			if(OptionSelected.length==1) {
				var Minute = OptionSelected.attr('data-minute');
				var Hour = OptionSelected.attr('data-hour');
				var Day = OptionSelected.attr('data-day');
				var Month = OptionSelected.attr('data-month');
				var Weekday = OptionSelected.attr('data-weekday');
				WdiSetCronScheduleInputs(Minute, Hour, Day, Month, Weekday);
			}
		});
		$('#wdi_cron_autoconfig .profile_cron_buttons input[data-action=set]').click(function(){
			$.ajax({
				url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=$ProfileID;?>&lang=<?=LANGUAGE_ID;?>&action=cron_set',
				type: 'POST',
				data: $('#wdi_cron_autoconfig .profile_cron input').serialize(),
				success: function(HTML) {
					if(HTML=='Y') {
						$('#wdi_cron_autoconfig_is_set').show();
						alert('<?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SET_SUCCESS');?>');
					} else {
						alert('<?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SET_ERROR');?>');
					}
				},
				error: function(){
					alert('<?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_SET_ERROR');?>');
				}
			});
		});
		$('#wdi_cron_autoconfig .profile_cron_buttons input[data-action=unset]').click(function(){
			$.ajax({
				url: '<?=$_SERVER['PHP_SELF']?>?'+'ID=<?=$ProfileID;?>&lang=<?=LANGUAGE_ID;?>&action=cron_unset',
				type: 'POST',
				data: '',
				success: function(HTML) {
					if(HTML=='Y') {
						$('#wdi_cron_autoconfig_is_set').hide();
						$('input, select','#wdi_cron_autoconfig .profile_cron').val('');
						alert('<?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_UNSET_SUCCESS');?>');
					} else {
						alert('<?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_UNSET_ERROR');?>');
					}
				},
				error: function(){
					alert('<?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_UNSET_ERROR');?>');
				}
			});
		});
		</script>
	<?else:?>
		<div><?=GetMessage('WDI_PARAM_AUTOCONFIG_CRONTAB_CANNOT_AUTOCONFIG');?></div>
	<?endif?>
</div>
<style>
#wdi_cron_autoconfig .profile_cron ::-webkit-input-placeholder {color:#bbb;}
#wdi_cron_autoconfig .profile_cron ::-moz-placeholder {color:#bbb;}
#wdi_cron_autoconfig .profile_cron :-moz-placeholder {color:#bbb;}
#wdi_cron_autoconfig .profile_cron :-ms-input-placeholder {color:#bbb;}
</style>
