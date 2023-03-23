<?
IncludeModuleLangFile(__FILE__);
$Code = htmlspecialcharsbx($_GET['code']);
$Type = htmlspecialcharsbx($_GET['type']);
$TypeMain = reset(array_slice(explode(':',$Type),0,1));
$Group = htmlspecialcharsbx($_GET['group']);
$Multiple = htmlspecialcharsbx($_GET['multiple'])=='Y'?'Y':'N';
$Source = htmlspecialcharsbx($_GET['source']);
$IBlockID = IntVal($_GET['iblock_id']);
$HlBlockID = IntVal($_GET['hlblock_id']);
$Params = htmlspecialcharsbx($_GET['params']);
parse_str($Params,$arAdditionalParams);
$arWeightUnits = CWDI::GetWeightUnitList();
$arSizeUnits = CWDI::GetSizeUnitList();
#$Found = false;
?>

<form action="<?=$_SERVER['PHP_SELF'];?>" method="get" id="wdi_form_field_settings">
	<table>
		<tbody>
			<?/*
			<tr>
				<td width="40%"><?=GetMessage('WDI_FIELD_SETTINGS_FIELD_TYPE');?>:</td>
				<td width="60%"><?=$Type;?><?=($Multiple=='Y'?'+++':'');?></td>
			</tr>
			*/?>
			<tr id="wdi_donotoverwrite">
				<td width="40%">
					<?=GetMessage('WDI_FIELD_DONOTOVERWRITE');?>
				</td>
				<td width="60%">
					<div>
						<input type="hidden" name="donotoverwrite" value="N"  />
						<input type="checkbox" name="donotoverwrite" id="wdi_donotoverwrite_checkbox" value="Y"<?if($_GET['donotoverwrite']=='Y'):?> checked="checked"<?endif?> />
					</div>
				</td>
			</tr>			
			<?if($Type=='S:HTML'):?>
				<tr id="wdi_html_type">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_HTML_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="html_type">
								<option value="skip"<?if($_GET['html_type']=='skip'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_HTML_TYPE_SKIP');?></option>
								<option value="text"<?if($_GET['html_type']=='text'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_HTML_TYPE_TEXT');?></option>
								<option value="html"<?if($_GET['html_type']=='html'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_HTML_TYPE_HTML');?></option>
							</select>
						</div>
					</td>
				</tr>
				<tr id="wdi_load_format"<?if($_GET['html_type']=='text'):?> style="display:none"<?endif?>>
					<td width="40%">
						<label for="wdi_load_format_checkbox"><?=GetMessage('WDI_FIELD_SETTINGS_LOAD_FORMAT');?></label>
					</td>
					<td width="60%">
						<div>
							<input type="hidden" name="load_format" value="N"  />
							<input type="checkbox" name="load_format" id="wdi_load_format_checkbox" value="Y"<?if($_GET['load_format']=='Y'):?> checked="checked"<?endif?> />
						</div>
					</td>
				</tr>
				<tr id="wdi_load_format_elements"<?if($_GET['load_format']!='Y' || $_GET['html_type']=='text'):?> style="display:none"<?endif?>>
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_ELEMENTS');?>
					</td>
					<td width="60%">
						<div>
							<div style="margin-bottom:4px"><label><input type="checkbox" name="format[]" value="family"<?if(is_array($_GET['format']) && in_array('family',$_GET['format'])):?> checked="checked"<?endif?>> <?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_FONT_FAMILY');?></label></div>
							<div style="margin-bottom:4px"><label><input type="checkbox" name="format[]" value="size"<?if(is_array($_GET['format']) && in_array('size',$_GET['format'])):?> checked="checked"<?endif?>> <?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_FONT_SIZE');?></label></div>
							<div style="margin-bottom:4px"><label><input type="checkbox" name="format[]" value="color"<?if(is_array($_GET['format']) && in_array('color',$_GET['format'])):?> checked="checked"<?endif?>> <?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_FONT_COLOR');?></label></div>
							<div style="margin-bottom:4px"><label><input type="checkbox" name="format[]" value="b"<?if(is_array($_GET['format']) && in_array('b',$_GET['format'])):?> checked="checked"<?endif?>> <?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_BOLD');?></label></div>
							<div style="margin-bottom:4px"><label><input type="checkbox" name="format[]" value="i"<?if(is_array($_GET['format']) && in_array('i',$_GET['format'])):?> checked="checked"<?endif?>> <?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_ITALIC');?></label></div>
							<div style="margin-bottom:4px"><label><input type="checkbox" name="format[]" value="u"<?if(is_array($_GET['format']) && in_array('u',$_GET['format'])):?> checked="checked"<?endif?>> <?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_UNDERLINE');?></label></div>
							<div style="margin-bottom:4px"><label><input type="checkbox" name="format[]" value="s"<?if(is_array($_GET['format']) && in_array('s',$_GET['format'])):?> checked="checked"<?endif?>> <?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_STRIKE');?></label></div>
							<div style="margin-bottom:4px"><label><input type="checkbox" name="format[]" value="sup"<?if(is_array($_GET['format']) && in_array('sup',$_GET['format'])):?> checked="checked"<?endif?>> <?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_SUP');?></label></div>
							<div style="margin-bottom:4px"><label><input type="checkbox" name="format[]" value="sub"<?if(is_array($_GET['format']) && in_array('sub',$_GET['format'])):?> checked="checked"<?endif?>> <?=GetMessage('WDI_FIELD_SETTINGS_FORMAT_SUB');?></label></div>
						</div>
					</td>
				</tr>
			<?elseif(in_array($Type,array('S:Date','S:DateTime'))):?>
				<tr id="wdi_date_format">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_DATE'.($Type=='S:DateTime'?'TIME':'').'_FORMAT');?>
					</td>
					<td width="60%">
						<div>
							<input type="text" name="date_format" value="<?=htmlspecialcharsbx($_GET['date_format']);?>" size="40" placeholder="<?=GetMessage('WDI_FIELD_SETTINGS_DATETIME_FORMAT_PLACEHOLDER');?>" />
						</div>
					</td>
				</tr>
			<?elseif(in_array($Type,array('S:map_yandex','S:map_google'))):?>
				<tr id="wdi_coordinates_swap">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_COORDINATES_SWAP');?>
					</td>
					<td width="60%">
						<div>
							<input type="hidden" name="coordinates_swap" value="N"  />
							<input type="checkbox" name="coordinates_swap" id="wdi_coordinates_swap_checkbox" value="Y"<?if($_GET['coordinates_swap']=='Y'):?> checked="checked"<?endif?> />
						</div>
					</td>
				</tr>
			<?elseif($Type=='S:UserID'):?>
				<tr id="wdi_user_value_type">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_USER_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="user_value_type">
								<option value="id"<?if($_GET['user_value_type']=='id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_USER_VALUE_TYPE_ID');?></option>
								<option value="login"<?if($_GET['user_value_type']=='login'/* || empty($_GET['user_value_type'])*/):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_USER_VALUE_TYPE_LOGIN');?></option>
								<option value="email"<?if($_GET['user_value_type']=='email'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_USER_VALUE_TYPE_EMAIL');?></option>
								<option value="external_id"<?if($_GET['user_value_type']=='external_id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_USER_VALUE_TYPE_EXTERNAL_ID');?></option>
								<?//ToDo: UF_* fields support here ?>
							</select>
						</div>
					</td>
				</tr>
			<?elseif(in_array($Type,array('C','C:THREE'))):?>
				<tr id="wdi_checkbox_values_y">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_CHECKBOX_VALUES_Y');?>
					</td>
					<td width="60%">
						<div>
							<input type="text" name="checkbox_values_y" value="<?=htmlspecialcharsbx($_GET['checkbox_values_y']);?>" size="40" placeholder="<?=GetMessage('WDI_FIELD_SETTINGS_CHECKBOX_VALUES_PLACEHOLDER');?>" />
						</div>
					</td>
				</tr>
				<tr id="wdi_checkbox_values_n">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_CHECKBOX_VALUES_N');?>
					</td>
					<td width="60%">
						<div>
							<input type="text" name="checkbox_values_n" value="<?=htmlspecialcharsbx($_GET['checkbox_values_n'])?>" size="40" placeholder="<?=GetMessage('WDI_FIELD_SETTINGS_CHECKBOX_VALUES_PLACEHOLDER');?>" />
						</div>
					</td>
				</tr>
				<?if($Type=='C:THREE'):?>
					<tr id="wdi_checkbox_values_d">
						<td width="40%">
							<?=GetMessage('WDI_FIELD_SETTINGS_CHECKBOX_VALUES_D');?>
						</td>
						<td width="60%">
							<div>
								<input type="text" name="checkbox_values_d" value="<?=htmlspecialcharsbx($_GET['checkbox_values_d'])?>" size="40" placeholder="<?=GetMessage('WDI_FIELD_SETTINGS_CHECKBOX_VALUES_PLACEHOLDER');?>" />
							</div>
						</td>
					</tr>
				<?endif?>
				<tr id="wdi_checkbox_values_info">
					<td colspan="2">
						<?=GetMessage('WDI_FIELD_SETTINGS_CHECKBOX_VALUES_INFO');?>
					</td>
				</tr>
			<?elseif($Type=='N:ENUM'): // SECTION property type 'enumeration' ?>
				<tr id="wdi_enum_type">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_ENUMERATION_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="enum_value_type">
								<option value="id"<?if($_GET['enum_value_type']=='id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_ENUMERATION_VALUE_TYPE_ID');?></option>
								<option value="value"<?if($_GET['enum_value_type']=='value'/* || empty($_GET['enum_value_type'])*/):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_ENUMERATION_VALUE_TYPE_VALUE');?></option>
								<option value="external_id"<?if($_GET['enum_value_type']=='external_id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_ENUMERATION_VALUE_TYPE_EXTERNAL_ID');?></option>
								<option value="sort"<?if($_GET['enum_value_type']=='sort'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_ENUMERATION_VALUE_TYPE_SORT');?></option>
							</select>
						</div>
					</td>
				</tr>
			<?elseif(in_array($Type,array('E','E:EList'))):?>
				<tr id="wdi_element_value_type">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_ELEMENT_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="element_value_type">
								<option value="id"<?if($_GET['element_value_type']=='id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_ELEMENT_VALUE_TYPE_ID');?></option>
								<option value="name"<?if($_GET['element_value_type']=='name'/* || empty($_GET['element_value_type'])*/):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_ELEMENT_VALUE_TYPE_NAME');?></option>
								<option value="code"<?if($_GET['element_value_type']=='code'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_ELEMENT_VALUE_TYPE_CODE');?></option>
								<option value="external_id"<?if($_GET['element_value_type']=='external_id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_ELEMENT_VALUE_TYPE_EXTERNAL_ID');?></option>
								<option value="sort"<?if($_GET['element_value_type']=='sort'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_ELEMENT_VALUE_TYPE_SORT');?></option>
							</select>
						</div>
					</td>
				</tr>
			<?elseif($Type=='S' && !in_array($Code,array('NAME','TAGS'))):?>
				<?if(!in_array($Group,array('CATALOG','SEO'))):?>
					<tr id="wdi_convert_to_number">
						<td width="40%">
							<label for="wdi_convert_to_number_checkbox"><?=GetMessage('WDI_FIELD_SETTINGS_CONVERT_TO_NUMBER');?></label>
						</td>
						<td width="60%">
							<div>
								<input type="hidden" name="convert_to_number" value="N"  />
								<input type="checkbox" name="convert_to_number" id="wdi_convert_to_number_checkbox" value="Y"<?if($_GET['convert_to_number']=='Y'):?> checked="checked"<?endif?> />
							</div>
						</td>
					</tr>
					<tr id="wdi_convert_to_number_type"<?if($_GET['convert_to_number']!='Y'):?> style="display:none"<?endif?>>
						<td width="40%">
							<?=GetMessage('WDI_FIELD_SETTINGS_CONVERT_TO_NUMBER_TYPE');?>
						</td>
						<td width="60%">
							<div>
								<select name="convert_to_number_type">
									<option value="int"<?if($_GET['convert_to_number_type']=='int'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_CONVERT_TO_NUMBER_INT');?></option>
									<option value="float"<?if($_GET['convert_to_number_type']=='float'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_CONVERT_TO_NUMBER_FLOAT');?></option>
								</select>
							</div>
						</td>
					</tr>
					<?$Found=true;?>
				<?endif?>
			<?elseif($Type=='S:directory'):?>
				<tr id="wdi_element_value_type">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_HLBLOCK_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<?$arHlFields = CWDI::GetHighloadBlockFields($HlBlockID);?>
							<?if(!empty($arHlFields)):?>
								<select name="hlblock_value_type">
									<option value="id"<?if($_GET['hlblock_value_type']=='id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_HLBLOCK_VALUE_TYPE_ID');?></option>
									<?foreach($arHlFields as $arHlField):?>
										<option value="<?=$arHlField['FIELD_NAME'];?>"<?if($_GET['hlblock_value_type']==$arHlField['FIELD_NAME']):?> selected="selected"<?endif?>><?=(!empty($arHlField['EDIT_FORM_LABEL'][LANGUAGE_ID])?$arHlField['EDIT_FORM_LABEL'][LANGUAGE_ID].' ['.$arHlField['FIELD_NAME'].']':$arHlField['FIELD_NAME']);?></option>
									<?endforeach?>
								</select>
							<?else:?>
								<?=GetMessage('WDI_FIELD_SETTINGS_HLBLOCK_EMPTY');?>
							<?endif?>
						</div>
					</td>
				</tr>
			<?elseif($Type=='G'):?>
				<tr id="wdi_section_value_type">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_SECTION_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="section_value_type">
								<option value="id"<?if($_GET['section_value_type']=='id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_SECTION_VALUE_TYPE_ID');?></option>
								<option value="name"<?if($_GET['section_value_type']=='name'/* || empty($_GET['section_value_type'])*/):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_SECTION_VALUE_TYPE_NAME');?></option>
								<option value="code"<?if($_GET['section_value_type']=='code'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_SECTION_VALUE_TYPE_CODE');?></option>
								<option value="external_id"<?if($_GET['section_value_type']=='external_id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_SECTION_VALUE_TYPE_EXTERNAL_ID');?></option>
								<option value="sort"<?if($_GET['section_value_type']=='sort'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_SECTION_VALUE_TYPE_SORT');?></option>
							</select>
						</div>
					</td>
				</tr>
			<?elseif($TypeMain=='L'):?>
				<tr id="wdi_list_value_type">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_LIST_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="list_value_type">
								<option value="id"<?if($_GET['list_value_type']=='id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_LIST_VALUE_TYPE_ID');?></option>
								<option value="value"<?if($_GET['list_value_type']=='value'/* || empty($_GET['list_value_type'])*/):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_LIST_VALUE_TYPE_VALUE');?></option>
								<option value="external_id"<?if($_GET['list_value_type']=='external_id'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_LIST_VALUE_TYPE_EXTERNAL_ID');?></option>
								<option value="sort"<?if($_GET['list_value_type']=='sort'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_LIST_VALUE_TYPE_SORT');?></option>
							</select>
						</div>
					</td>
				</tr>
			<?elseif($Code=='CATALOG_WEIGHT'):?>
				<tr id="wdi_catalog_weight">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_CATALOG_WEIGHT_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="weight_unit">
								<?foreach($arWeightUnits as $Value => $strUnit):?>
									<option value="<?=$Value;?>"<?if($_GET['weight_unit']==$Value):?> selected="selected"<?endif?>><?=$strUnit;?></option>
								<?endforeach?>
							</select>
						</div>
					</td>
				</tr>
			<?elseif($Code=='CATALOG_LENGTH'):?>
				<tr id="wdi_catalog_length">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_CATALOG_LENGTH_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="length_unit">
								<?foreach($arSizeUnits as $Value => $strUnit):?>
									<option value="<?=$Value;?>"<?if($_GET['length_unit']==$Value):?> selected="selected"<?endif?>><?=$strUnit;?></option>
								<?endforeach?>
							</select>
						</div>
					</td>
				</tr>
			<?elseif($Code=='CATALOG_WIDTH'):?>
				<tr id="wdi_catalog_width">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_CATALOG_WIDTH_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="width_unit">
								<?foreach($arSizeUnits as $Value => $strUnit):?>
									<option value="<?=$Value;?>"<?if($_GET['width_unit']==$Value):?> selected="selected"<?endif?>><?=$strUnit;?></option>
								<?endforeach?>
							</select>
						</div>
					</td>
				</tr>
			<?elseif($Code=='CATALOG_HEIGHT'):?>
				<tr id="wdi_catalog_height">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_CATALOG_HEIGHT_VALUE_TYPE');?>
					</td>
					<td width="60%">
						<div>
							<select name="height_unit">
								<?foreach($arSizeUnits as $Value => $strUnit):?>
									<option value="<?=$Value;?>"<?if($_GET['height_unit']==$Value):?> selected="selected"<?endif?>><?=$strUnit;?></option>
								<?endforeach?>
							</select>
						</div>
					</td>
				</tr>
			<?endif?>
			<?if($TypeMain=='N' && !in_array($Code,array('CATALOG_VAT_ID'))):?>
				<tr id="wdi_catalog_surcharge">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_SURCHARGE');?>
					</td>
					<td width="60%">
						<style>
						#wdi_field_settings_surcharge .rows {padding-bottom:8px;}
							#wdi_field_settings_surcharge .rows:empty:before {content:'<?=GetMessage('WDI_FIELD_SETTINGS_SURCHARGE_EMPTY');?>'; color:gray; display:block; margin-left:3px;}
							#wdi_field_settings_surcharge .rows td {border:0!important; padding:0!important; white-space:nowrap!important;}
							#wdi_field_settings_surcharge .rows td + td {padding-right:0!important;}
							#wdi_field_settings_surcharge .rows td.delete {padding-right:8px;}
								#wdi_field_settings_surcharge .rows td.delete input {font-size:20px;}
						#wdi_field_settings_surcharge_add {margin-left:3px;}
						</style>
						<div id="wdi_field_settings_surcharge">
							<div class="rows"></div>
							<input type="hidden" name="surcharge" size="20" id="wdi_field_settings_surcharge_value" value="<?=htmlspecialcharsbx($_GET['surcharge']);?>" />
							<input type="button" value="<?=GetMessage('WDI_FIELD_SETTINGS_SURCHARGE_ADD');?>" id="wdi_field_settings_surcharge_add" />
						</div>
						<script>
						var WdiFieldSettingsSurcharge = $('#wdi_field_settings_surcharge .rows');
						if(window.WdiFieldSettingsSurchargeDelegated==undefined) {
							function WdiFieldSettingsSurchargeAddRow(Value, From, To){
								var Table = $('<table class="row"></table>');
								var Row = $('<tr class="row"></tr>');
								Row.append('<td class="value"><input type="text" size="8" maxlength="10" value="'+Value+'" placeholder="<?=GetMessage('WDI_FIELD_SETTINGS_SURCHARGE_PLACEHOLDER_VALUE');?>" /></td>');
								Row.append('<td class="from_text"><?=GetMessage('WDI_FIELD_SETTINGS_SURCHARGE_TEXT_FROM');?></td>');
								Row.append('<td class="from"><input type="text" size="5" maxlength="10" value="'+From+'" placeholder="<?=GetMessage('WDI_FIELD_SETTINGS_SURCHARGE_PLACEHOLDER_FROM');?>" /></td>');
								Row.append('<td class="from_text"><?=GetMessage('WDI_FIELD_SETTINGS_SURCHARGE_TEXT_TO');?></td>');
								Row.append('<td class="to"><input type="text" size="5" maxlength="10" value="'+To+'" placeholder="<?=GetMessage('WDI_FIELD_SETTINGS_SURCHARGE_PLACEHOLDER_TO');?>" /></td>');
								Row.append('<td class="delete">&nbsp;<input type="button" value="&times;" title="<?=GetMessage('WDI_FIELD_SETTINGS_SURCHARGE_DELETE_TITLE');?>" /></td>');
								Row.appendTo(Table.appendTo(WdiFieldSettingsSurcharge));
							}
							function WdiFieldSettingsSurchargeFill(){
								var FullValue = [];
								$('#wdi_field_settings_surcharge .rows table').each(function(){
									var Value = $(this).find('td.value input[type=text]').val();
									var From = parseFloat($(this).find('td.from input[type=text]').val());
									if(isNaN(From)) {From='';}
									var To = parseFloat($(this).find('td.to input[type=text]').val());
									if(isNaN(To)) {To='';}
									if(Value.length>0) {
										FullValue.push(Value+','+From+','+To);
									}
								});
								$('#wdi_field_settings_surcharge_value').val(FullValue.join('|'));
							}
							window.WdiFieldSettingsSurchargeTimeout = false;
							$(document).delegate('#wdi_field_settings_surcharge_add','click',function(E){
								WdiFieldSettingsSurchargeAddRow('','','');
							});
							$(document).delegate('#wdi_field_settings_surcharge td.delete','click',function(E){
								$(this).parents('table.row').first().remove();
								WdiFieldSettingsSurchargeFill();
							});
							$(document).delegate('#wdi_field_settings_surcharge input[type=text]','change',function(E){
								WdiFieldSettingsSurchargeFill();
							});
							window.WdiFieldSettingsSurchargeDelegated = true;
						}
						$.each('<?=htmlspecialcharsbx($_GET['surcharge']);?>'.split('|'), function(Index,Value){
							if(Value.length>0){
								Value = Value.split(',');
								WdiFieldSettingsSurchargeAddRow(Value[0],Value[1],Value[2]);
							}
						});
						</script>
					</td>
				</tr>
			<?endif?>
			<?if($Multiple=='Y' || $Code=='TAGS'):?>
				<tr id="wdi_multiple">
					<td width="40%">
						<?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE');?>
					</td>
					<td width="60%">
						<div>
							<div class="adm-filter-box-sizing">
								<select name="multiple_separator">
									<option value=""><?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE_EMPTY');?></option>
									<option value="comma"<?if($_GET['multiple_separator']=='comma'/* || empty($_GET['multiple_separator'])*/):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE_COMMA');?></option>
									<option value="new_line"<?if($_GET['multiple_separator']=='new_line'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE_NEW_LINE');?></option>
									<option value="tab"<?if($_GET['multiple_separator']=='tab'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE_TAB');?></option>
									<option value="semicolon"<?if($_GET['multiple_separator']=='semicolon'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE_SEMICOLON');?></option>
									<option value="dash"<?if($_GET['multiple_separator']=='dash'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE_DASH');?></option>
									<option value="dot"<?if($_GET['multiple_separator']=='dot'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE_DOT');?></option>
									<option value="space"<?if($_GET['multiple_separator']=='space'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE_SPACE');?></option>
									<option value="other"<?if($_GET['multiple_separator']=='other'):?> selected="selected"<?endif?>><?=GetMessage('WDI_FIELD_SETTINGS_MULTIPLE_OTHER');?></option>
								</select>
								<input type="text" name="multiple_separator_other" value="<?=htmlspecialcharsbx($_GET['multiple_separator_other'])?>" size="20" id="wdi_multiple_other" style="margin-left:12px;<?if($_GET['multiple_separator']!='other'):?> display:none;<?endif?>" />
							</div>
						</div>
					</td>
				</tr>
				<?if($Type=='F'):?>
					<tr id="wdi_skip_first_multiple_image">
						<td width="40%">
							<?=GetMessage('WDI_FIELD_SETTINGS_SKIP_FIRST_MULTIPLE_IMAGE');?>
						</td>
						<td width="60%">
							<div>
								<input type="hidden" name="skip_first_multiple_image" value="N"  />
								<input type="checkbox" name="skip_first_multiple_image" id="wdi_skip_first_multiple_image_checkbox" value="Y"<?if($_GET['skip_first_multiple_image']=='Y'):?> checked="checked"<?endif?> />
							</div>
						</td>
					</tr>
				<?endif?>
			<?endif?>
		</tbody>
	</table>
</form>
<script>
$('#wdi_form_field_settings').submit(function(E){
	E.preventDefault();
});
$('#wdi_load_format_checkbox, #wdi_html_type select').change(function(){
	$('#wdi_load_format').css('display',$('#wdi_html_type select').val()!='text'?'':'none');
	$('#wdi_load_format_elements').css('display',$('#wdi_load_format_checkbox').is(':checked')&&$('#wdi_html_type select').val()!='text'?'':'none');
});
$('#wdi_convert_to_number_checkbox').change(function(){
	$('#wdi_convert_to_number_type').css('display',$(this).is(':checked')?'':'none');
});
$('#wdi_multiple select').change(function(){
	$('#wdi_multiple_other').css('display',$(this).val()=='other'?'':'none');
});
</script>