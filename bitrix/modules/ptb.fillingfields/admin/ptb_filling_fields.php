<?
#################################################
#   Company: NicLab                  	 	    #
#   Site: http://www.psdtobitrix.ru             #
#   Copyright (c) 2013-2014 NicLab              #
#################################################
?>
<?

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
IncludeModuleLangFile(__FILE__);
CModule::IncludeModule("ptb.fillingfields");
CModule::IncludeModule("iblock");
CModule::IncludeModule("fileman");

CJSCore::Init(array('file_input', 'ajax'));

$RIGHT = $APPLICATION->GetGroupRight("main");
if ($RIGHT == "D")
	$APPLICATION->AuthForm(GetMessage("PTB_NOT_ACCESS"));

if (
	$_SERVER["REQUEST_METHOD"] == "GET"
	&& check_bitrix_sessid()
	&& $_REQUEST["ACTION"] == "GET_DATA"
	&& !empty($_REQUEST["TYPE"])
) {
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_js.php");

	$APPLICATION->RestartBuffer();

	$obPtbModuleTools = CPtbModuleFillingFields::GetInstance(false);

	switch ($_REQUEST["TYPE"]) {
		case "IBLOCK":
			$arResult = $obPtbModuleTools->getDataByIblock($_REQUEST["IBLOCK_ID"], false);
// 			$sResult = CUtil::PhpToJsObject($arResult);
			$sResult = \Bitrix\Main\Web\Json::encode($arResult);
			break;
		case "FIELD":
			$sResult = $obPtbModuleTools->getFieldHtml($_REQUEST["CODE"], $_REQUEST["IBLOCK_ID"], $_REQUEST["FILTER"] == 'Y');
			break;
	}

	die($sResult);
	require($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/include/epilog_admin_js.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["ptb_gener_start"] == "Y") {

	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_js.php");

	if(array_key_exists("params", $_REQUEST) && is_array($_REQUEST["params"])){

		foreach ($_REQUEST["params"] as $key=>$value) {
			if(!is_array($value))
				$params[$key] = htmlspecialchars($value);

		}
	} else {
	   
		// check html field 
		// TODO: rewrite
	    foreach ($_REQUEST as $key => $rval) {
	        if (preg_match_all("/PROP_([0-9]+)__n([0-9]+)__VALUE__TEXT_/is", $key, $arr)) {
	           foreach ($arr[2] as $k => $num) {
	               $_REQUEST["PROP"][$arr[1][$k]]["n".$num]["VALUE"] = $rval;
	           }
	        }
	    }
		
	    $value = isset($_REQUEST["PROP"]) ? $_REQUEST["PROP"] : (isset($_REQUEST["IPROPERTY_TEMPLATES"]) ? $_REQUEST["IPROPERTY_TEMPLATES"] : $_REQUEST["FIELD_VALUE"]);
		$value = is_array($value) ? $APPLICATION->ConvertCharsetArray($value, SITE_CHARSET, "UTF-8") : $APPLICATION->ConvertCharset($value, SITE_CHARSET, "UTF-8");

		$filter_value = $_REQUEST["FILTER_VALUE"];
		if (!empty($filter_value))
			$filter_value = is_array($filter_value) ? $APPLICATION->ConvertCharsetArray($filter_value, SITE_CHARSET, "UTF-8") : $APPLICATION->ConvertCharset($filter_value, SITE_CHARSET, "UTF-8");

		if ($_REQUEST["ptb_sel_iblock_update_sku_name"] == "Y" && (int)$_REQUEST["ptb_element_shag"] > 3)
			$_REQUEST["ptb_element_shag"] = 3;
			
		$params = Array(
			"ptb_sel_iblock" => $_REQUEST["ptb_sel_iblock"],
			"ptb_lid" => $_REQUEST["ptb_lid"],
			"ptb_sel_iblock_field" => $_REQUEST["ptb_sel_iblock_field"],
		    "ptb_filter_iblock_field" => $_REQUEST["ptb_filter_iblock_field"],
			"ptb_sel_iblock_section" => $_REQUEST["ptb_sel_iblock_section"],
			"ptb_sel_active" => $_REQUEST["ptb_sel_active"],
			"ptb_sel_include" => $_REQUEST["ptb_sel_include"],
			"ptb_sel_iblock_update_sku_name" => $_REQUEST["ptb_sel_iblock_update_sku_name"],
			"FIELD_VALUE" => $value,
		    "FILTER_VALUE" => $filter_value,
		    "FIELD_DESCRIPTION" => $_REQUEST["FIELD_VALUE_descr"],
		    "FILTER_RULES" => $_REQUEST["FILTER_RULES"],
			"ptb_element_shag" => $_REQUEST["ptb_element_shag"],
		    'IS_SEO' => isset($_REQUEST["IPROPERTY_TEMPLATES"]) ? 'Y' : 'N',
			"DONE" => array(
				"ERR" => 0,
				"OK" => 0,
				"ALL" => 0,
				"OFFERS_OK"	=> 0,
				"OFFERS_ERR" => 0
			),
			"step" => 1
		);
		
	}
	
	$arFilterRules = array(
	    1 => "=",
	    2 => "!=",
	    3 => ">",
	    4 => "=>",
	    5 => "<",
	    6 => "<=",
	    7 => "%",
	);
	
	$arFilter = array(
		"IBLOCK_ID" => $params["ptb_sel_iblock"],
	);

	if (!empty($params["ptb_sel_iblock_section"])) {
		$arFilter["SECTION_ID"] = $params["ptb_sel_iblock_section"];

		if ($params["ptb_sel_include"] == "Y") {
			$arFilter["INCLUDE_SUBSECTIONS"] = $params["ptb_sel_include"];
		}
	}

	if ($params["ptb_sel_active"] == "Y") {
		$arFilter["ACTIVE"] = $params["ptb_sel_active"];
	}

	if (!empty($params["ptb_filter_iblock_field"]) && !empty($params["FILTER_VALUE"])) {
	    $arFilterValue = array();
	    if (empty($params["FILTER_VALUE"]))
	        $params["FILTER_VALUE"] = array();
	    
	    if (empty($params["FILTER_RULES"]))
            $arFilterValue = $params["FILTER_VALUE"];
	    else {
            foreach ($params["FILTER_VALUE"] as $key => $value) {
                switch ($key) {
                    case "PROPERTY":
                        foreach ($value as $k => $val) {
                            $arFilterValue["PROPERTY"][$arFilterRules[$params["FILTER_RULES"][$k]].$k] = $val;
                        }
                        break;
                    default:
                        $arFilterValue[$arFilterRules[$params["FILTER_RULES"][$key]].$key] = $value;
                        break;
                }
            }
	    }
	    
		$arFilter = array_merge($arFilter, $arFilterValue);
	}
	

	switch ($params["step"]) {
		case 1:
			$params["DONE"]["ALL"] = CPtbModuleFillingFields::getAllCount($arFilter);
			$params["step"]++;

			echo json_encode(array("params"=>$params), JSON_HEX_TAG);
			break;
		case 2:
			$arFilter[">ID"] = $params["ptb_lid"];

			$arValue = $params["FIELD_VALUE"];
			$arDesc = $params["FIELD_DESCRIPTION"];
			$bProperty = $bCatalog = $bSeo = false;
			
			$bSeo = $params['IS_SEO'] == 'Y';
			
			if (isset($arValue["CATALOG"])) {
			    $bCatalog = true;
			    $arValue = $arValue["CATALOG"];
			    CModule::IncludeModule('catalog');
			} elseif (isset($arValue["PROPERTY"])) {
			    $bProperty = true;
			    $arValue = $arValue["PROPERTY"];
			    $arDesc = $arDesc["PROPERTY"];
			} else {
			    foreach ($arValue as $key => $arr) {
			        if (intval($key) > 0)
			            $bProperty = true;
			            continue;
			    }
			}
			
			$arItems = CPtbModuleFillingFields::getElementList($arFilter, $params["ptb_element_shag"]);
			
			if (empty($arItems))
				$params["step"]++;
			else {
				$el = new CIBlockElement();
				
				foreach ($arValue as $key => $val) {
					if (CPtbModuleFillingFields::isFileField($key, $arFilter["IBLOCK_ID"])) {
					    if (in_array($key, array("PREVIEW_PICTURE", "DETAIL_PICTURE"))) {
					        $arValue[$key] = CIBlock::makeFileArray($val, false, $arDesc[$key]);
					    } else {
    						if (is_array($val)) {
    							foreach ($val as $k=>$v) {
    								if (is_file($_SERVER["DOCUMENT_ROOT"].$v)) {
    									$arValue[$key][$k] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$v);
    								}
    							}
    						} elseif (is_file($_SERVER["DOCUMENT_ROOT"].$val)) {
    							$arValue[$key] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$val);
    						}
					    }
					}
				}
				
				if (! empty($arDesc)) {
				    foreach ($arValue as $key => $val) {
				        if (in_array($key, array("PREVIEW_PICTURE", "DETAIL_PICTURE"))) {
				            continue;
				        }
				        
				        if (is_array($val)) {
				            foreach ($val as $k => $v) {
				                $arValue[$key][$k] = array("VALUE" => $v, "DESCRIPTION" => $arDesc[$key][$k]);
				            }
				        } else {
				            $arValue[$key] = array("VALUE" => $val, "DESCRIPTION" => $arDesc[$key]);
				        }
				    }
				}

				$arIds = array();
				CUtil::decodeURIComponent($arValue);

				foreach ($arItems as $arItem) {
				    
				    $newValue = CPtbModuleFillingFields::prepareUpdateValue($arValue, $arItem);
				    
				    if ($bCatalog || $bSeo) {
						$arIds[$arItem["ID"]] = $arItem["ID"];
					} elseif ($bProperty) {
						CIBlockElement::SetPropertyValuesEx($arItem["ID"], $arFilter["IBLOCK_ID"], $newValue);
						$el->Update($arItem["ID"], array("ACTIVE" => $arItem["ACTIVE"])) ? $params["DONE"]["OK"]++ : $params["DONE"]["ERR"]++;
					} else {
						$el->Update($arItem["ID"], $newValue) ? $params["DONE"]["OK"]++ : $params["DONE"]["ERR"]++;

						if (isset($newValue["NAME"]) && $params["ptb_sel_iblock_update_sku_name"] === "Y") {
							$arOffers = CIBlockPriceTools::GetOffersArray(
								array("IBLOCK_ID" => $params["ptb_sel_iblock"]),
								array($arItem["ID"]),
								array(
									"ID" => "ASC",
								),
								array("ID", "IBLOCK_ID"),
								array(),
								0
							);

							foreach ($arOffers as $arOffer)
								$el->Update($arOffer["ID"], array("NAME" => $newValue["NAME"])) ? $params["DONE"]["OFFERS_OK"]++ : $params["DONE"]["OFFERS_ERR"]++;
						}
					}

					$params["ptb_lid"] = $arItem["ID"];
				}
				
				if ($bSeo && !empty($arIds)) {
				    foreach ($arIds as $id) {
				        $ipropTemplates = new \Bitrix\Iblock\InheritedProperty\ElementTemplates($params["ptb_sel_iblock"], $id);
				        $seoValues = array();
				        foreach ($arValue as $key => $seoVal) {
				            $seoValues[$key] = $seoVal['TEMPLATE'] ? : $seoVal;
				        }
				        unset($seoVal);
				        $ipropTemplates->set($seoValues);
				    }
				}

				if ($bCatalog && !empty($arIds)) {
					foreach ($arValue as $code => $value) {
						switch ($code) {
							case "PTB_CATF_MEASURE_RATIO":
								$rsCatalog = CCatalogMeasureRatio::getList(
									array(),
									array("PRODUCT_ID" => $arIds),
									false,
									false,
									array("ID", "PRODUCT_ID", "RATIO")
								);

								while ($arRatio = $rsCatalog->Fetch()) {
									CCatalogMeasureRatio::update(
										$arRatio["ID"],
										array(
											"PRODUCT_ID" => $arRatio["PRODUCT_ID"],
											"RATIO" => $value
										)
									) ? $params["DONE"]["OK"]++ : $params["DONE"]["ERR"]++;

									unset($arIds[$arRatio["PRODUCT_ID"]]);
								}


								if (!empty($arIds)) {
									foreach ($arIds as $eid) {
										intval(CCatalogMeasureRatio::add(
											array(
												"PRODUCT_ID" => $eid,
												"RATIO" => $value
											)
										)) > 0 ? $params["DONE"]["OK"]++ : $params["DONE"]["ERR"]++;
									}
								}

								break;
// 							case "PTB_CATF_CAT_MEASURE":
							default:
								$field = str_replace("PTB_CATF_CAT_", "", $code);
								foreach ($arIds as $eid) {
									CCatalogProduct::Update(
										$eid,
										array(
											$field => $value
										)
									) ? $params["DONE"]["OK"]++ : $params["DONE"]["ERR"]++;
								}
								break;
						}
					}
				}
			}

			$sMessage = GetMessage("PTB_FF_PROGRESS_ALL", array("#COUNT#" => $params["DONE"]["ALL"])).
				"<br/>".GetMessage("PTB_FF_PROGRESS_UPD", array("#COUNT1#" => $params["DONE"]["OK"], "#COUNT2#" => $params["DONE"]["ALL"])).
				"<br/>".GetMessage("PTB_FF_PROGRESS_ERR", array("#COUNT#" => $params["DONE"]["ERR"]));

			if ($params["ptb_sel_iblock_update_sku_name"] == "Y")
				$sMessage .= "<br/>".GetMessage("PTB_FF_PROGRESS_OK_OFFERS", array("#COUNT#" => $params["DONE"]["OFFERS_OK"]))
					."<br/>".GetMessage("PTB_FF_PROGRESS_ERR_OFFERS", array("#COUNT#" => $params["DONE"]["OFFERS_ERR"]));

			CAdminMessage::ShowMessage(array(
				"MESSAGE" => GetMessage("PTB_FF_PROGRESS_STATUS_ON"),
				"DETAILS" =>$sMessage,
				"HTML" => true,
				"TYPE" => "OK",
			));
			echo '<script>
				generation('.CUtil::PhpToJSObject(array("params"=>$params)).');
			</script>';
			break;
		case 3:
			$sMessage = GetMessage("PTB_FF_PROGRESS_ALL", array("#COUNT#" => $params["DONE"]["ALL"])).
					"<br/>".GetMessage("PTB_FF_PROGRESS_OK", array("#COUNT#" => $params["DONE"]["OK"])).
					"<br/>".GetMessage("PTB_FF_PROGRESS_ERR", array("#COUNT#" => $params["DONE"]["ERR"]));

			if ($params["ptb_sel_iblock_update_sku_name"] == "Y")
				$sMessage .= "<br/>".GetMessage("PTB_FF_PROGRESS_OK_OFFERS", array("#COUNT#" => $params["DONE"]["OFFERS_OK"]))
					."<br/>".GetMessage("PTB_FF_PROGRESS_ERR_OFFERS", array("#COUNT#" => $params["DONE"]["OFFERS_ERR"]));

			CAdminMessage::ShowMessage(array(
				"MESSAGE" => GetMessage("PTB_FF_PROGRESS_STATUS_OK"),
				"DETAILS" => $sMessage,
				"HTML" => true,
				"TYPE" => "OK",
			));
			echo '<script>
				generation_finish();
			</script>';
			break;
	}

	die();
}

$APPLICATION->SetTitle(GetMessage("PTB_FILLING_FIELDS_TITLE"));
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
$aTabs = array(
	array(
		"DIV" => "ptb_gen",
		"TAB" => GetMessage("PTB_FILLING_FIELDS_TAB"),
		"ICON" => "main_user_edit",
		"TITLE" => GetMessage("PTB_FILLING_FIELDS_TAB")
	)
);
$obPtbModuleTools = CPtbModuleFillingFields::GetInstance();
$obPtbModuleTools->InitJs();
$arIBTypes = $obPtbModuleTools->getIblocksType();
?>
<div id="ptb_window"></div>
<?
$tabControl = new CAdminTabControl("tabControl", $aTabs);

?>
<?echo BeginNote();?>
<?echo GetMessage("PTB_FILLING_FIELDS_DUMP")?>
<?echo EndNote(); ?>
<form id="ptb_fillingfields" method="POST" action="<?=$APPLICATION->GetCurPage()?>?lang=<?=LANG?>" name="ptb_fillingfields" enctype="multipart/form-data">
<?
echo bitrix_sessid_post();
$tabControl->Begin();
$tabControl->BeginNextTab();
?>
<input type="hidden" name="MAX_FILE_SIZE" value="3000000000" />
<input type="hidden" name="ptb_lid" id="ptb_lid" value="0" />
<input type="hidden" name="ptb_gener_start" id="ptb_gener_start" value="Y" />
<tr class="heading">
    <td colspan="2"><?=GetMessage("PTB_FILLING_FIELDS_GROUP_IBLOCK")?></td>
</tr>
<tr>
	<td width="50%"><label for="ptb_sel_tiblock"><?=GetMessage("PTB_FILLING_FIELDS_TIBLOCK");?></label></td>
	<td>
		<select name="ptb_sel_tiblock" id="ptb_sel_tiblock" onchange="changeIblockList(this.value)">
			<option value="0"><?=GetMessage('PTB_NOT_SET')?></option>
			<?foreach ($arIBTypes as $ibtype_id => $ibtype_name) {?>
				<option value="<?=$ibtype_id?>"><?=$ibtype_name?></option>
			<?};?>
		</select>
	</td>
</tr>
<tr>
	<td><label for="ptb_sel_iblock"><?=GetMessage("PTB_FILLING_FIELDS_IBLOCK");?></label></td>
	<td>
		<select id="ptb_sel_iblock" name="ptb_sel_iblock" onchange="changeSectionsList(this.value)">
			<option value="0"><?=GetMessage('PTB_NOT_SET')?></option>
		</select>
	</td>
</tr>
<tr class="heading">
    <td colspan="2"><?=GetMessage("PTB_FILLING_FIELDS_GROUP_FILTER")?></td>
</tr>
<tr>
	<td><label for="ptb_sel_iblock_section"><?=GetMessage("PTB_FILLING_FIELDS_SECTIONS");?></label></td>
	<td>
		<select id="ptb_sel_iblock_section" name="ptb_sel_iblock_section[]" size="10" multiple>
			<option value=""><?=GetMessage("PTB_SELECT_IBLOCK")?></option>
		</select>
	</td>
</tr>
<tr>
	<td><label for="ptb_sel_include"><?=GetMessage("PTB_FILLING_FIELDS_INCLUDE_SUBSECTIONS");?></label></td>
	<td>
		<input type="hidden" id="ptb_sel_include_val" name="ptb_sel_include" value="Y" />
		<input type="checkbox" value="Y" id="ptb_sel_include" checked onChange="this.checked ? BX('ptb_sel_include_val').value='Y' : BX('ptb_sel_include_val').value='N'" />
	</td>
</tr>
<tr>
	<td><label for="ptb_sel_active"><?=GetMessage("PTB_FILLING_FIELDS_ACTIVE");?></label></td>
	<td>
		<input type="checkbox" value="Y" id="ptb_sel_active" name="ptb_sel_active" />
	</td>
</tr>
<tr>
	<td><label for="ptb_filter_iblock_field"><?=GetMessage("PTB_FILLING_FIELDS_FILTER");?></label></td>
	<td>
		<select id="ptb_filter_iblock_field" name="ptb_filter_iblock_field" multiple size="5" onchange="getFieldHtml(this, 'ptb_filter_iblock_input_tr')">
			<option value=""><?=GetMessage("PTB_SELECT_IBLOCK")?></option>
		</select>
	</td>
</tr>
<tr>
    <td colspan="2" align="center" id="ptb_filter_iblock_input_tr"></td>
</tr>
<tr class="heading">
    <td colspan="2"><?=GetMessage("PTB_FILLING_FIELDS_GROUP_ADD_FIELD")?></td>
</tr>
<tr>
	<td><label for="ptb_sel_iblock_field"><?=GetMessage("PTB_FILLING_FIELDS_FIELDS");?></label></td>
	<td>
		<select id="ptb_sel_iblock_field" name="ptb_sel_iblock_field" onchange="getFieldHtml(this, 'ptb_sel_iblock_input_tr')">
			<option value=""><?=GetMessage("PTB_SELECT_IBLOCK")?></option>
		</select>
	</td>
</tr>
<tr id="ptb_sel_iblock_input_tr"></tr>
<tr id="ptb_sel_iblock_update_name">
	<td class="adm-detail-content-cell-l"><label for="ptb_sel_iblock_update_sku_name"><?=GetMessage("PTB_FILLING_FIELDS_FIELDS_NAME_SKU");?></label></td>
	<td class="adm-detail-content-cell-r">
		<input type="checkbox" value="Y" id="ptb_sel_iblock_update_sku_name" name="ptb_sel_iblock_update_sku_name" />
	</td>
</tr>
<tr class="heading">
    <td colspan="2"><?=GetMessage("PTB_FILLING_FIELDS_GROUP_MORE")?></td>
</tr>
<tr>
	<td><label for="ptb_element_shag"><?=GetMessage("PTB_FILLING_FIELDS_SHAG");?></label></td>
	<td><input type="text" name="ptb_element_shag" id="ptb_element_shag" value="100"  /></td>
</tr>
<?
$tabControl->Buttons();
?>
<input type="button" id="start_generation" value="<?echo GetMessage("PTB_FILLING_FIELDS_START")?>" disabled class="adm-btn-save" />
<input type="button" id="stop_generation" value="<?=GetMessage("PTB_FILLING_FIELDS_STOP")?>" disabled />
<?
$tabControl->End();
?>
</form>
<?echo BeginNote();?>
<?echo GetMessage("PTB_FILLING_FIELDS_DUMP")?>
<?echo EndNote(); ?>
<style>
#ptb_sel_iblock_input_tr,
#ptb_sel_iblock_update_name {
	display: none;
}
#ptb_sel_iblock_input_tr input[type='text'] {
	width: 300px;
}
#ptb_sel_iblock_input_tr textarea {
	width:100%;
}
#ptb_fillingfields td {
	vertical-align: top;
}
#ptb_fillingfields td > span {
	display:block;
}
.filter-rules-select {
	float: left;
	margin: 0 10px 0 0 !important;
}
.adm-detail-sub table {
	float: left;
	width: 50%;
}
.clear {
	clear: both;
}
</style>
<script type="text/javascript">
	var InheritedPropertiesTemplates = new JCInheritedPropertiesTemplates(
		'ptb_fillingfields',
		''
	);
	BX.ready(function(){
		setTimeout(function(){
			InheritedPropertiesTemplates.updateInheritedPropertiesTemplates(true);
		}, 1000);
	});
</script>
<script>
var finish_get = 0;
var arIblocks = <?=CUtil::PhpToJsObject($obPtbModuleTools->getIblocks())?>;
function changeIblockList(value) {
	var j, i = 0,
	   arControls = BX('ptb_sel_iblock'),
	   obFields = BX("ptb_sel_iblock_field"),
	   obFilterFields = BX("ptb_filter_iblock_field"),
	   obSections = BX("ptb_sel_iblock_section");

	BX.hide(BX("ptb_sel_iblock_input_tr"));
	BX('start_generation').disabled = "disabled";

	obFields.options.length = 0;
	obFields.options[0] = new Option('<?=GetMessage('PTB_NOT_FIELDS')?>', '');
	obSections.options.length = 0;
	obSections.options[0] = new Option('<?=GetMessage('PTB_NOT_FIELDS')?>', '');

	obFilterFields.options.length = 0;
	obFilterFields.options[0] = new Option('<?=GetMessage('PTB_NOT_FIELDS')?>', '');

	if (arControls)
		arControls.options.length = 0;

	if (value == 0) {
		arControls.options[0] = new Option('<?=GetMessage('PTB_NOT_SET')?>', '0');
	}

	for (j in arIblocks[value]) {
		if (i == 0 && BX.type.isNotEmptyString(arIblocks[value][j]))
			changeSectionsList(j);

		arControls.options[arControls.options.length] = new Option(arIblocks[value][j], j);
		i++;
	}
}
function changeSectionsList(iblock_id) {
	ShowWaitWindow();
	var j, i = 0,
		obSections = BX("ptb_sel_iblock_section"),
		obFields = BX("ptb_sel_iblock_field"),
		obFilterFields = BX("ptb_filter_iblock_field");
// 		arExclude = ["ACTIVE", "PREVIEW_TEXT", "DETAIL_TEXT", "PREVIEW_PICTURE", "DETAIL_PICTURE", "PTB_CATF_MEASURE_RATIO", "PTB_CATF_CAT_MEASURE"];
	iblock_id = parseInt(iblock_id);



	BX.ajax.loadJSON(
		'<?=$APPLICATION->GetCurPage()?>',
		{AJAX_CALL: "Y", sessid: "<?=bitrix_sessid();?>", ACTION: "GET_DATA", TYPE: "IBLOCK", IBLOCK_ID: iblock_id},
		function(result) {
			if (obSections)
				obSections.options.length = 0;

			if (obFields)
				obFields.options.length = 0;

			if (obFilterFields)
				obFilterFields.options.length = 0;

			var arSections = result.SECTIONS,
				arFields = result.FIELDS,
				arFilterFields = result.FILTER;

			for (j in arSections) {
				obSections.options[obSections.options.length] = new Option(arSections[j], j);
			}

			for (j in arFields) {
				if (i == 0) {
					obFields.options[0] = new Option('<?=GetMessage('PTB_FILLING_SELECT_FIELD')?>', '');
				}
				obFields.options[obFields.options.length] = new Option(arFields[j], j);

				i++;
			}

			i = 0;
			for (j in arFilterFields) {
				if (i == 0) {
					obFilterFields.options[0] = new Option('<?=GetMessage('PTB_FILLING_SELECT_FIELD')?>', '');
				}
				
// 				if (!BX.util.in_array(j, arExclude))
			    obFilterFields.options[obFilterFields.options.length] = new Option(arFilterFields[j], j);

				i++;
			}

			if (obSections.options.length == 0)
				obSections.options[0] = new Option('<?=GetMessage('PTB_NOT_SECTION')?>', '');

			if (obFields.options.length == 0)
				obFields.options[0] = new Option('<?=GetMessage('PTB_NOT_FIELDS')?>', '');

			if (obFilterFields.options.length == 0)
				obFilterFields.options[0] = new Option('<?=GetMessage('PTB_NOT_FIELDS')?>', '');

			CloseWaitWindow();
		}
	);
}
function getFieldHtml(obj, tr_id, bMulty) {
	ShowWaitWindow();

	var codes = [],
	    options = obj && obj.options,
	    opt;

	for (var i=0, iLen=options.length; i<iLen; i++) {
	    opt = options[i];

	    if (opt.selected && BX.type.isNotEmptyString(opt.value)) {
	    	codes.push(opt.value);
	    }
	}
	 
	var obInputTd = BX(tr_id),
	   bNotFilter = tr_id == "ptb_sel_iblock_input_tr";
	   
	BX.hide(obInputTd);

	if (bNotFilter) {
    	BX.hide(BX("ptb_sel_iblock_update_name"));
    	BX("ptb_sel_iblock_update_sku_name").checked = false;
	}
	
// 	if (!BX.type.isNotEmptyString(code)) {
	if (codes.length <= 0) {
		CloseWaitWindow();
		BX('start_generation').disabled = "disabled";
		return;
	}
	
	BX.ajax.get(
		'<?=$APPLICATION->GetCurPage()?>',
		{AJAX_CALL: "Y", sessid: "<?=bitrix_sessid();?>", ACTION: "GET_DATA", TYPE: "FIELD", FILTER: bNotFilter ? "N" : "Y", CODE: codes, IBLOCK_ID: BX('ptb_sel_iblock').value},
		function(result) {
			BX.adjust(obInputTd, {style:{display: bNotFilter ? "table-row" : "table-cell"}, html: result});
			
			if (BX.util.in_array("NAME", codes) && bNotFilter) {
				BX("ptb_sel_iblock_update_name").style.display = 'table-row';
			}
			
			if (bNotFilter)
			    BX('start_generation').disabled = "";
			CloseWaitWindow();
		}
	);
}

function generation(params) {
	var query = "?ptb_gener_start=Y&lang=<?echo LANG;?>";
	if (finish_get != 1) {
		BX.ajax.post(
			'<?=$APPLICATION->GetCurPage()?>'+query,
			params,
			function(res){
				BX('ptb_window').innerHTML = res;
			}
		);
	} else {
		BX('ptb_window').innerHTML = '';
	};
}

function generation_finish() {
	BX('start_generation').disabled = "";
	BX('stop_generation').disabled = "disabled";
	CloseWaitWindow();
}

function GenerStart() {
	finish_get = 0;

	if (!BX.type.isNotEmptyString(BX("ptb_sel_tiblock").value) || !BX.type.isNotEmptyString(BX("ptb_sel_iblock").value)) {
		alert("<?=GetMessage("PTB_FILLING_ERROR_IBLOCK_EMPTY");?>");
		return false
	}

	if (!BX.type.isNotEmptyString(BX("ptb_sel_iblock_field").value)) {
		alert("<?=GetMessage("PTB_FILLING_ERROR_FIELD_EMPTY");?>");
		return false
	}

	ShowWaitWindow();

	BX('start_generation').disabled = "disabled";
	BX('stop_generation').disabled = "";

	BX.ajax.submit(BX("ptb_fillingfields"), function (res) {
		generation(BX.parseJSON(res));
	});

}
function GenerStop() {
	finish_get = 1;
	generation_finish();
	BX('ptb_window').innerHTML = '';
}

function AddTemplateString(value, id)
{
	id = id || null;
	var field = BX('FIELD_VALUE');

	if (!field && id != null) {
		field = BX.findChild(BX(id), {"tag" : "input"}, true);
	}

	if (!field && id != null) {
		field = BX.findChild(BX(id), {"tag" : "textarea"}, true);
	}
	
	if (field) {
		field.value = field.value + value;
	}
}

BX.ready(function () {
	BX.bind(BX("start_generation"), "click", GenerStart);
	BX.bind(BX("stop_generation"), "click", GenerStop);
});
</script>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>