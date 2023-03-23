<?
use
\Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
$strLang = 'WDI_AUTOCREATE_POPUP_';
$arGet = \Bitrix\Main\Context::getCurrent()->getRequest()->getQueryList()->toArray();
$arPost = \Bitrix\Main\Context::getCurrent()->getRequest()->getPostList()->toArray();
# Get data: handlers
$arACHandlers = $arHandlers;
unset($arACHandlers['EXCEL']);
# Get data: iblocks
$arACIBlocks = CWDI::getIBlockList();

if($arGet['auto_create'] == 'show'){
	# Display popup initial content
	$APPLICATION->restartBuffer();
	# Prepare data
	?>
	<style>
		.auto_create {padding:10px 20px;}
		.auto_create > table {width:100%;}
		.auto_create > table > tbody > tr > td {padding-bottom:5px; vertical-align:top;}
		.auto_create > table > tbody > tr > td:first-child {padding-right:10px; text-align:right; width:40%;}
		.auto_create > table > tbody > tr > td:last-child {width:60%;}
		.auto_create > table > tbody > tr:last-child td {padding-bottom:0;}
		.auto_create .auto_create-handler {margin-bottom:2px;}
		.auto_create label > span.auto_create-handler_image {vertical-align:middle;}
		.auto_create label > span.auto_create-handler_title {vertical-align:middle;}
	</style>
	<div class="auto_create">
		<table class="auto_create-table">
			<tbody>
				<?/* HANDLERS */?>
				<tr>
					<td><?=Loc::getMessage($strLang.'HANDLERS');?>:</td>
					<td>
						<?foreach($arACHandlers as $strACHandler => $arACHandler):?>
							<div class="auto_create-handler">
								<label>
									<input type="checkbox" name="handlers[]" value="<?=$strACHandler;?>" checked="checked" />
									<span class="auto_create-handler_image" style="background-image:url(<?=$arACHandler['ICON'];?>); display:inline-block; height:16px; width:16px;"></span>
									<span class="auto_create-handler_title"><?=htmlspecialchars($arACHandler['NAME']);?></span>
								</label>
							</div>
						<?endforeach?>
					</td>
				</tr>
				<tr>
					<td><?=Loc::getMessage($strLang.'AUTH_GIFTS');?>:</td>
					<td>
						<input type="text" name="gifts_username" value="" placeholder="<?=Loc::getMessage($strLang.'AUTH_GIFTS_USERNAME');?>" size="15" />
						<input type="text" name="gifts_password" value="" placeholder="<?=Loc::getMessage($strLang.'AUTH_GIFTS_PASSWORD');?>" size="15" />
					</td>
				</tr>
				<tr>
					<td><?=Loc::getMessage($strLang.'AUTH_OASIS');?>:</td>
					<td>
						<input type="text" name="oasis_apikey" value="" placeholder="<?=Loc::getMessage($strLang.'AUTH_OASIS_API');?>" size="36" />
					</td>
				</tr>
				<tr>
					<td><?=Loc::getMessage($strLang.'PHP_PATH');?>:</td>
					<td>
						<input type="text" name="php_path" value="/usr/bin/php" placeholder="<?=Loc::getMessage($strLang.'PHP_PATH_DEFAULT');?>" size="36" />
					</td>
				</tr>
				<?/* IBLOCK */?>
				<tr>
					<td><?=Loc::getMessage($strLang.'IBLOCK_ID');?>:</td>
					<td>
						<select name="iblock_id">
							<?foreach($arACIBlocks as $strAcIBlockType => $arACIBlockType):?>
								<optgroup label="<?=htmlspecialcharsbx($arACIBlockType['NAME']);?> [<?=$strAcIBlockType;?>]">
									<?foreach($arACIBlockType['ITEMS'] as $arACIBlock):?>
										<option value="<?=$arACIBlock['ID'];?>"><?=htmlspecialcharsbx($arACIBlock['NAME']);?> [<?=$arACIBlock['ID'];?>]</option>
									<?endforeach?>
								</optgroup>
							<?endforeach?>
						</select>
					</td>
				</tr>
				<?/* SEPARATED_SECTIONS */?>
				<tr>
					<td></td>
					<td>
						<label>
							<input type="checkbox" name="separated_sections" value="Y" checked="checked" />
							<?=Loc::getMessage($strLang.'SEPARATED_SECTIONS');?>
						</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<label>
							<input type="checkbox" name="create_props" value="Y" checked="checked" />
							<?=Loc::getMessage($strLang.'CREATE_PROPS');?>
						</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<label>
							<input type="checkbox" name="remove_all" value="Y" data-confirm="<?=Loc::getMessage($strLang.'REMOVE_ALL_CONFIRM');?>" />
							<span style="color:red;"><?=Loc::getMessage($strLang.'REMOVE_ALL');?></span>
						</label>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<script>
		$('.auto_create input[type="checkbox"]').each(function(){
			BX.adminFormTools.modifyCheckbox(this);
		});
		$('.auto_create input[name="handlers[]"]').bind('change', function(e){
			e.preventDefault();
			if($(this).val() == 'GIFTS'){
				$('.auto_create input[name="gifts_username"]').closest('tr').toggle($(this).prop('checked'));
			}
			else if($(this).val() == 'OASISCATALOG'){
				$('.auto_create input[name="oasis_apikey"]').closest('tr').toggle($(this).prop('checked'));
			}
		});
		$('.auto_create input[name="remove_all"]').bind('click', function(e){
			if($(this).prop('checked')){
				if(!confirm($(this).attr('data-confirm'))){
					$(this).prop('checked', false);
				}
			}
		});
	</script>
	<?
	die();
}
elseif($arGet['auto_create'] == 'save'){
	# Prepare
	ini_set('display_errors', 0);
	error_reporting(0);
	$APPLICATION->restartBuffer();
	# Delete exist data
	if($arPost['remove_all'] == 'Y'){
		# Remove profiles
		$resProfiles = CWDI_Profile::getList();
		while($arProfile = $resProfiles->fetch()){
			CWDI_Profile::delete($arProfile['ID']);
		}
		\Bitrix\Main\Application::getConnection()->query("TRUNCATE b_wdi_profiles;");
		# Remove props
		if($arPost['iblock_id'] > 0){
			\Bitrix\Main\Loader::includeModule('iblock');
			$arIBlockId = [$arPost['iblock_id']];
			if($intOffersIBlockId = CWDI::getOffersIBlockID($arPost['iblock_id'])){
				$arIBlockId[] = $intOffersIBlockId;
			}
			foreach($arIBlockId as $intIBlockId){
				$resProps = \CIBlockProperty::getList([], ['IBLOCK_ID' => $intIBlockId]);
				while($arProp = $resProps->fetch()){
					if(strpos($arProp['XML_ID'], 'WDI_') === 0) {
						\CIBlockProperty::delete($arProp['ID']);
					}
				}
			}
		}
	}
	# Handle ajax-request to create profiles
	$APPLICATION->restartBuffer();
	header('Content-Type: application/json');
	$arJson = [
		'Success' => false,
	];
	#
	$arParamsIgnoredPost = ['handlers', 'iblock_id'];
	$arParams = array_diff_key($arPost, array_flip($arParamsIgnoredPost));
	foreach($arPost['handlers'] as $strHandler){
		$obAutoCreator = new CWDI_AutoCreator($strHandler, $arPost['iblock_id'], $arParams);
		$bCreated = $obAutoCreator->process();
		$arJson['Success'] = $arJson['Success'] || $bCreated;
		if($bCreated){
			$arJson['Count']++;
			$arJson['Success'] = true;
		}
		unset($obAutoCreator);
	}
	#
	print \Bitrix\Main\Web\Json::encode($arJson);
	die();
}
else{
	# Base JS (include in wdi_profiles.php)
	?>
	<script>
	/**
	 *	Dialog: Auto create profiles
	 */
	var WdiAutoCreatePopup = new BX.CDialog({
		title: '<?=Loc::getMessage($strLang.'TITLE');?>',
		content: '<?=Loc::getMessage($strLang.'CONTENT');?>',
		resizable: true,
		draggable: true,
		height: 400,
		width: 800
	});
	WdiAutoCreatePopup.LoadContent = function(){
		WdiAutoCreatePopup.ToggleControls(false);
		$.ajax({
			url: '<?=$APPLICATION->getCurPageParam('auto_create=show', ['auto_create']);?>',
			type: 'GET',
			success: function(html) {
				WdiAutoCreatePopup.SetContent(html);
				WdiAutoCreatePopup.ToggleControls(true);
			}
		});
	}
	WdiAutoCreatePopup.SetContent = function(html){
		$(this.PARTS.CONTENT_DATA).html(html);
	}
	WdiAutoCreatePopup.ToggleControls = function(flag){
		let controls = $('.auto_create :input, #wdi_autocreate_save, #wdi_autocreate_close');
		if(flag){
			controls.removeClass('disabled').removeAttr('disabled');
		}
		else{
			controls.addClass('disabled').attr('disabled', 'disabled');
		}
	}
	WdiAutoCreatePopup.SetButtons([{
		'name': BX.message('JS_CORE_WINDOW_SAVE'),
		'id': 'wdi_autocreate_save',
		'className': 'adm-btn-green',
		'action': function(){
			let data = $('.auto_create :input').serialize();
			WdiAutoCreatePopup.ToggleControls(false);
			$.ajax({
				url: '<?=$APPLICATION->getCurPageParam('auto_create=save', ['auto_create']);?>',
				type: 'POST',
				data: data,
				datatype: 'json',
				success: function(json) {
					if(json.Success){
						alert("<?=Loc::getMessage($strLang.'SUCCESS');?>".replace(/#COUNT#/g, json.Count));
						WdiAutoCreatePopup.Close();
						WdiProfiles.GetAdminList('');
					}
					else{
						alert("<?=Loc::getMessage($strLang.'ERROR');?>");
					}
					WdiAutoCreatePopup.ToggleControls(true);
				},
				error: function(){
					WdiAutoCreatePopup.ToggleControls(true);
				}
			});
		}
	}, {
		'name': BX.message('JS_CORE_WINDOW_CLOSE'),
		'id': 'wdi_autocreate_close',
		'className': 'wda-button-right',
		'action': function(){
			this.parentWindow.Close();
		}
	}]);
	function WdiAutoCreate_OpenPopup() {
		WdiAutoCreatePopup.Show();
		WdiAutoCreatePopup.LoadContent();
	}
	<?if(isset($arGet['auto_create'])):?>
		$(document).ready(function(){
			WdiAutoCreate_OpenPopup();
		});
	<?endif?>
	</script>
	<?
}