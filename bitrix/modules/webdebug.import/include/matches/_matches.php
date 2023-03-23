<?
IncludeModuleLangFile(__FILE__);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arMatches = $arFields['MATCHES'];
$arSheetParams = $arParams['S'][$SheetIndex];
$MatchesType = $arData['MATCHES_TYPE'];
$IBlockID = $arFields['PARAMS']['S'][$SheetIndex]['IBLOCK_ID'];
$arMatchesTarget = CWDI_Handler::GetMatchesFields($IBlockID, $arHandler); // All possible matches (fields, seo, props, ...)
$arMatchesSource = $arData['MATCHES'];
?>

<input type="hidden" name="wdi_save_matches" value="Y" />

<div class="wdi_matches_page">

	<div style="display:none">
		<?
		$arGroups = array();
		if(!empty($arHandler['CLASS_NAME']) && method_exists($arHandler['CLASS_NAME'],'GetMatchesGroups')) {
			$arMatchesGroups = call_user_func_array(array($arHandler['CLASS_NAME'],GetMatchesGroups),array($SheetIndex, $MatchesType));
			if(is_array($arMatchesGroups) && !empty($arMatchesGroups)) {
				foreach($arMatchesSource[$MatchesType] as $MatchCode => $arMatch) {
					$arGroups[] = $arMatch['GROUP'];
				}
				$arGroups = array_unique($arGroups);
			}
		}
		?>
		<select class="wdi_matches_source" id="wdi_matches_source_<?=$MatchesType;?>_<?=$SheetIndex;?>">
			<option value=""><?=GetMessage('WDI_MATCHES_SOURCE_EMPTY');?></option>
			<?if(count($arGroups)>1):?>
				<?foreach($arMatchesGroups as $GroupCode => $GroupName):?>
					<optgroup label="<?=$GroupName;?>">
						<?foreach($arMatchesSource[$MatchesType] as $MatchCode => $arMatch):?>
							<?if($arMatch['GROUP']==$GroupCode):?>
								<option value="<?=$MatchCode;?>"><?=$arMatch['NAME'];?></option>
							<?endif?>
						<?endforeach?>
					</optgroup>
				<?endforeach?>
			<?else:?>
				<?foreach($arMatchesSource[$MatchesType] as $MatchCode => $arMatch):?>
					<option value="<?=$MatchCode;?>"><?=$arMatch['NAME'];?></option>
				<?endforeach?>
			<?endif?>
			<?/*<option value="other"><?=GetMessage('WDI_MATCHES_SOURCE_OTHER');?></option>*/?>
		</select>
	</div>

	<table class="adm-list-table wdi_matches_table" id="wdi_matches_<?=$MatchesType;?>_<?=$SheetIndex;?>" style="table-layout:fixed;" data-params="matches_type=<?=$MatchesType;?>">
		<thead>
			<tr class="adm-list-table-header">
				<td class="adm-list-table-cell">
					<div class="adm-list-table-cell-inner" style="white-space:nowrap;"><?=GetMessage('WDI_MATCH_FIELD');?>&nbsp;<?=WdiHint(GetMessage('WDI_MATCH_FIELD_HINT'));?></div>
				</td>
				<td class="adm-list-table-cell">
					<div class="adm-list-table-cell-inner" style="white-space:nowrap;"><?=GetMessage('WDI_MATCH_SOURCE');?>&nbsp;<?=WdiHint(GetMessage('WDI_MATCH_SOURCE_HINT'));?></div>
				</td>
				<td class="adm-list-table-cell" style="width:160px">
					<div class="adm-list-table-cell-inner" style="white-space:nowrap;"><?=GetMessage('WDI_MATCH_MORE');?>&nbsp;<?=WdiHint(GetMessage('WDI_MATCH_MORE_HINT'));?></div>
				</td>
				<td class="adm-list-table-cell" style="width:50px">
					<div class="adm-list-table-cell-inner" style="white-space:nowrap;"><?=GetMessage('WDI_MATCH_DELETE');?>&nbsp;<?=WdiHint(GetMessage('WDI_MATCH_DELETE_HINT'));?></div>
				</td>
			</tr>
		</thead>
		<?foreach($arMatchesTarget[$MatchesType] as $GroupType => $arGroup):?>
			<?
			// Сортировка свойств в порядке их реальной сортировки, а не по сохраненному порядку
			if(is_array($arMatches['S'][$SheetIndex][$MatchesType])) {
				foreach($arMatches['S'][$SheetIndex][$MatchesType] as $TargetID => $arMatch){
					$arMatches['S'][$SheetIndex][$MatchesType][$TargetID]['SORT'] = $arGroup[$TargetID]['SORT'];
				}
				uasort($arMatches['S'][$SheetIndex][$MatchesType],'CWDI::UaSortCallback');
			}
			?>
			<tbody data-group="<?=$GroupType;?>" style="display:none">
				<tr class="heading" data-group="<?=$GroupType;?>"><td colspan="4"><?=GetMessage('WDI_MATCHES_GROUP_'.$MatchesType.'_'.$GroupType);?></td></tr>
				<?if(is_array($arMatches['S'][$SheetIndex][$MatchesType])):?>
					<?foreach($arMatches['S'][$SheetIndex][$MatchesType] as $TargetID => $arMatch):?>
						<?$ItemGroupType = CWDI_Handler::GetMatchGroup($TargetID, $arMatchesTarget[$MatchesType]);?>
						<?if($ItemGroupType==$GroupType):?>
							<?
								$arTarget = $arMatchesTarget[$MatchesType][$ItemGroupType][$TargetID];
								$Meta = CWDI_Handler::GetMatchMetaData($MatchesType, $ItemGroupType, $arTarget['DATA']);
								$MatchType = $arTarget['TYPE'];
								$Multiple = ($arTarget['MULTIPLE']=='Y' || $arTarget['DATA']['MULTIPLE']=='Y') ? 'Y' : 'N';
								$HLBlockID = IntVal($arTarget['DATA']['_HLBLOCK_ID']);
							?>
							<tr data-code="<?=$TargetID;?>" data-sort="<?=$arGroup[$TargetID]['SORT'];?>" class="adm-list-table-row">
								<td class="adm-list-table-cell">
									<span class="name" style="display:block;"><?=$arMatchesTarget[$MatchesType][$GroupType][$TargetID]['NAME'];?></span>
									<?if(!empty($Meta)):?><span class="meta" style="color:#aaa; display:block; font-size:11px;">[<?=$Meta;?>]</span><?endif?>
									<input type="hidden" class="type" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>][<?=$TargetID;?>][TYPE]" value="<?=$MatchType;?>" />
									<input type="hidden" class="multiple" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>][<?=$TargetID;?>][MULTIPLE]" value="<?=$Multiple;?>" />
									<input type="hidden" class="iblock_id" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>][<?=$TargetID;?>][IBLOCK_ID]" value="<?=$IBlockID;?>" />
									<input type="hidden" class="hlblock_id" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>][<?=$TargetID;?>][HLBLOCK_ID]" value="<?=$HLBlockID;?>" />
								</td>
								<td class="adm-list-table-cell">
									<div class="adm-filter-box-sizing">
										<select class="wdi_matches_source" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>][<?=$TargetID;?>][SOURCE]" id="wdi_matches_source_<?=$MatchesType;?>_<?=$SheetIndex;?>_<?=$TargetID;?>"></select>
										<input class="wdi_matches_value_custom_button" type="button" value="..." onclick="WdiCustomValue_OpenPopup(this);" data-group="<?=$ItemGroupType;?>" data-code="<?=$TargetID;?>"<?if($arMatches['S'][$SheetIndex][$MatchesType][$TargetID]['SOURCE']!='other'):?> style="display:none"<?endif?> />
										<input type="hidden" class="custom" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>][<?=$TargetID;?>][CUSTOM]" value="" />
									</div>
									<script>$('#wdi_matches_source_<?=$MatchesType;?>_<?=$SheetIndex;?>_<?=$TargetID;?>').html($('#wdi_matches_source_<?=$MatchesType;?>_<?=$SheetIndex;?>').html()).val('<?=$arMatch['SOURCE'];?>');</script>
								</td>
								<td class="adm-list-table-cell">
									<input type="button" value="<?=GetMessage('WDI_MATCHES_SETTINGS_BUTTON_NAME');?>" title="<?=GetMessage('WDI_MATCHES_SETTINGS_BUTTON_DESC');?>" onclick="WdiSettings_OpenPopup(this);" data-group="<?=$ItemGroupType;?>" data-code="<?=$TargetID;?>" />
									<input type="hidden" class="params" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>][<?=$TargetID;?>][PARAMS]" value="<?=$arMatch['PARAMS'];?>">
								</td>
								<td class="adm-list-table-cell">
									<input type="button" value="&times;" class="delete" title="<?=GetMessage('WDI_MATCHES_DELETE_BUTTON');?>">
								</td>
							</tr>
						<?endif?>
					<?endforeach?>
				<?endif?>
			</tbody>
		<?endforeach?>
		<tbody data-group="EMPTY">
			<tr class="wdi_group_empty" data-group="EMPTY"><td colspan="4" style="text-align:center!important;"><?=GetMessage('WDI_MATCHES_GROUP_EMPTY');?></td></tr>
		</tbody>
	</table>

	<br/>
	<div class="wdi_matches_target_wrapper">
		<div style="margin-bottom:6px"><?=GetMessage('WDI_MATCHES_ADD_TITLE');?></div>
		<select class="wdi_matches_target" id="wdi_matches_target_<?=$MatchesType;?>_<?=$SheetIndex;?>">
			<?if(empty($IBlockID)):?>
				<option value=""><?=GetMessage('WDI_MATCHES_NO_IBLOCK');?></option>
			<?else:?>
				<option value=""><?=GetMessage('WDI_MATCHES_ADD_EMPTY');?></option>
				<?foreach($arMatchesTarget[$MatchesType] as $GroupType => $arGroup):?>
					<?if(is_array($arGroup) && !empty($arGroup)):?>
						<optgroup label="<?=GetMessage('WDI_MATCHES_GROUP_'.$MatchesType.'_'.$GroupType);?>">
							<?foreach($arGroup as $ItemCode => $arItem):?>
								<?$Meta = CWDI_Handler::GetMatchMetaData($MatchesType, $GroupType, $arItem['DATA']);?>
								<option value="<?=$ItemCode;?>" data-name="<?=$arItem['NAME'];?>" data-meta="<?=$Meta;?>" data-group="<?=$GroupType;?>" data-multiple="<?=(($arItem['MULTIPLE']=='Y'||$arItem['DATA']['MULTIPLE']=='Y')?'Y':'N');?>" data-type="<?=$arItem['TYPE'];?>" data-sort="<?=$arItem['SORT'];?>" data-iblock="<?=$IBlockID;?>" data-hlblock="<?=IntVal($arItem['DATA']['_HLBLOCK_ID']);?>">
									<?=$arItem['NAME'];?><?if(!empty($Meta)):?> [<?=$Meta;?>]<?endif?>
								</option>
							<?endforeach?>
						</optgroup>
					<?endif?>
				<?endforeach?>
			<?endif?>
		</select>
	</div>
	
</div>


<script>
// Insert function
function wdi_matches_insert_<?=$MatchesType;?>_<?=$SheetIndex;?>(Code, Name, Meta, Type, Select, Group, Multiple, Sort, IBlock, HlBlock){
	if(Code.length==0 || Name.length==0) {
		return false;
	}
	var Table = Select.parents('.wdi_matches_page').first().find('.wdi_matches_table').first();
	var Body = Table.children('tbody[data-group='+Group+']');
	if(Body.find('tr[data-code='+Code+']').size()==0) {
		var NewItem = $('<tr data-code="'+Code+'" data-sort="'+Sort+'"></tr>');
		NewItem.append(	'<td>'+
											'<span class="name" style="display:block;">'+Name+'</span>'+
											'<span class="type" style="color:#aaa; display:block; font-size:11px;">'+Meta+'</span>'+
											'<input type="hidden" class="type" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>]['+Code+'][TYPE]" value="'+Type+'" />'+
											'<input type="hidden" class="multiple" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>]['+Code+'][MULTIPLE]" value="'+Multiple+'" />'+
											'<input type="hidden" class="iblock_id" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>]['+Code+'][IBLOCK_ID]" value="'+IBlock+'" />'+
											'<input type="hidden" class="hlblock_id" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>]['+Code+'][HLBLOCK_ID]" value="'+HlBlock+'" />'+
										'</td>');
		NewItem.append(	'<td>'+
											'<div class="adm-filter-box-sizing">'+
												'<select class="wdi_matches_source" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>]['+Code+'][SOURCE]"></select>'+
												'<input class="wdi_matches_value_custom_button" type="button" value="..." onclick="WdiCustomValue_OpenPopup(this);" data-group="'+Group+'" data-code="'+Code+'" style="display:none" />'+
												'<input type="hidden" class="custom" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>]['+Code+'][CUSTOM]" value="" />'+
											'</div>'+
										'</td>').find('select').html($('#wdi_matches_source_<?=$MatchesType;?>_<?=$SheetIndex;?>').html());
		NewItem.append(	'<td>'+
											'<input type="button" value="<?=GetMessage('WDI_MATCHES_SETTINGS_BUTTON_NAME');?>" title="<?=GetMessage('WDI_MATCHES_SETTINGS_BUTTON_DESC');?>" onclick="WdiSettings_OpenPopup(this);" data-group="'+Group+'" data-code="'+Code+'" />'+
											'<input type="hidden" class="params" name="MATCHES[S][<?=$SheetIndex;?>][<?=$MatchesType;?>]['+Code+'][PARAMS]" value="" />'+
										'</td>');
		NewItem.append(	'<td>'+
											'<input type="button" value="&times;" class="delete" title="<?=GetMessage('WDI_MATCHES_DELETE_BUTTON');?>" />'+
										'</td>');
		NewItem.addClass('adm-list-table-row').children('td').addClass('adm-list-table-cell');
		var TR = false;
		Body.find('tr[data-sort]').each(function(){
			var SortIndex = parseInt($(this).attr('data-sort'));
			if(SortIndex>Sort && TR==false) {
				TR = $(this);
			}
		});
		if(TR!==false) {
			TR.before(NewItem);
		} else {
			Body.append(NewItem);
		}
		//
		wdi_matches_refresh_visibility_<?=$MatchesType;?>_<?=$SheetIndex;?>(Select);
	} else {
		alert('<?=GetMessage('WDI_MATCHES_INSERT_EXISTS');?>');
	}
}

// Show/hide groups
function wdi_matches_refresh_visibility_<?=$MatchesType;?>_<?=$SheetIndex;?>(Sender){
	var Table = Sender.parents('.wdi_matches_page').first().find('.wdi_matches_table').first();
	var Visible = false;
	var Body = Table.children('tbody').not('[data-group=EMPTY]').each(function(){
		if($(this).children('tr').not('.heading').size()==0) {
			$(this).hide();
		} else{
			$(this).show();
			Visible = true;
		}
	});
	Body = Table.children('tbody[data-group=EMPTY]');
	if(Visible) {
		Body.hide();
	} else {
		Body.show();
	}
}

// Insert row
$('#wdi_matches_<?=$MatchesType;?>_<?=$SheetIndex;?>').parent().find('.wdi_matches_target_wrapper').first().find('.wdi_matches_target').change(function(){
	var Select = $(this);
	var OptionSelected = Select.find('option:selected');
	var Code = OptionSelected.attr('value');
	var Name = OptionSelected.attr('data-name');
	var Meta = OptionSelected.attr('data-meta');
	var Type = OptionSelected.attr('data-type');
	var Group = OptionSelected.attr('data-group');
	var Multiple = OptionSelected.attr('data-multiple');
	var Sort = parseInt(OptionSelected.attr('data-sort'));
	var IBlock = parseInt(OptionSelected.attr('data-iblock'));
	var HlBlock = parseInt(OptionSelected.attr('data-hlblock'));
	wdi_matches_insert_<?=$MatchesType;?>_<?=$SheetIndex;?>(Code, Name, Meta, Type, Select, Group, Multiple, Sort, IBlock, HlBlock);
	Select.val('');
});

// Delete row
$('#wdi_matches_<?=$MatchesType;?>_<?=$SheetIndex;?>').delegate('input.delete','click',function(E){
	E.preventDefault();
	if(true || confirm('<?=GetMessage('WDI_MATCHES_DELETE_CONFIRM');?>')) {
		$(this).parents('tr').first().animate({opacity:0},250,function(){
			var RowParent = $(this).parent();
			$(this).remove();
			wdi_matches_refresh_visibility_<?=$MatchesType;?>_<?=$SheetIndex;?>(RowParent);
		});
	};
});

// Do refresh rows
wdi_matches_refresh_visibility_<?=$MatchesType;?>_<?=$SheetIndex;?>($('table#wdi_matches_<?=$MatchesType;?>_<?=$SheetIndex;?>'));

<?/*
// Do refresh custom value button visibility
$('#wdi_matches_<?=$MatchesType;?>_<?=$SheetIndex;?>').delegate('select.wdi_matches_source','change',function(E){
	var Button = $(this).parent().find('input.wdi_matches_value_custom_button').css('display',$(this).val()=='other'?'':'none');
}).change();
*/?>
</script>
