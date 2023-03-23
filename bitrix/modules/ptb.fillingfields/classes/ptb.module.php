<?
// ################################################
// Company: NicLab #
// Site: http://www.psdtobitrix.ru #
// Copyright (c) 2013-2014 NicLab #
// ################################################
?>
<?
/**
 * CPtbModuleFillingFields
 */
IncludeModuleLangFile(__FILE__);

class CPtbModuleFillingFields extends CPtbModuleTools
{

    static $instance = null;

    public static function GetInstance()
    {
        if (self::$instance == null) {
            $a = __CLASS__;
            self::$instance = new $a();
        }
        return self::$instance;
    }

    public function getFieldHtml($arCodes, $IBLOCK_ID = false, $bFilter = false)
    {
        if (empty($arCodes)) {
            return $arCodes;
        }
        
        $arFields = array();
        foreach ($arCodes as $k => $sCode) {
            if (strpos($sCode, "PTB_CATF_") !== false) {
                switch ($sCode) {
                    case "PTB_CATF_CAT_MEASURE":
                        $arFields[$k]["HTML"] = $this->getCatMeasure($sCode, false, $bFilter);
                        break;
                    default:
                        $arFields[$k]["HTML"] = $this->getString($sCode, false, false, false, true, $bFilter);
                        break;
                }
                $arFields[$k]["NAME"] = GetMessage("PTB_FILLINGFIELDS_" . $sCode);
            } elseif (strpos($sCode, "PTB_SEO_") !== false) {
                $sCode = substr($sCode, 8);
                $arFields[$k]["HTML"] = $this->getSeoField($IBLOCK_ID, $sCode);
            } elseif (! in_array($sCode, $this->arDefaultProps)) {
                $arFields[$k] = $this->getProperty($sCode, $IBLOCK_ID, $bFilter);
            } else {
                switch ($sCode) {
                    case "ACTIVE":
                        $arFields[$k]["HTML"] = $this->getCheckBox($sCode, false, false, false, $bFilter);
                        break;
                    case "DATE_ACTIVE_FROM":
                    case "DATE_ACTIVE_TO":
                    case "TIMESTAMP_X":
                    case "DATE_CREATE":
                        $arFields[$k]["HTML"] = $this->getDateString($sCode, false, false, false, $bFilter);
                        break;
                    case "PREVIEW_TEXT":
                    case "DETAIL_TEXT":
                        $arFields[$k]["HTML"] = $this->getTextArea($sCode, $IBLOCK_ID, $bFilter);
                        break;
                    case "PREVIEW_PICTURE":
                    case "DETAIL_PICTURE":
                        $arFields[$k]["HTML"] = $this->getFileInput($sCode, false, false, true, $bFilter);
                        break;
                    default:
                        $arFields[$k]["HTML"] = $this->getString($sCode, false, false, false, false, $bFilter, $IBLOCK_ID);
                        break;
                }
                
                $arFields[$k]["NAME"] = GetMessage("PTB_FILLINGFIELDS_" . $sCode);
            }
            
            $arFields[$k]["CODE"] = $sCode;
        }
        
        return $this->getHtmlTd($arFields, $bFilter);
    }
    
    protected function getSeoField($IBLOCK_ID, $CODE)
    {
        
        return IBlockInheritedPropertyInput($IBLOCK_ID, $CODE, [], 'E', '');
    }

    private function getCatMeasure($sCode, $bProperty = false, $bFilter = false)
    {
        ob_start();
        CModule::IncludeModule("catalog");
        $arAllMeasure = array();
        $dbResultList = CCatalogMeasure::getList(array(), array(), false, false, array(
            "ID",
            "CODE",
            "MEASURE_TITLE",
            "SYMBOL_INTL",
            "IS_DEFAULT"
        ));
        while ($arMeasure = $dbResultList->Fetch()) {
            $arAllMeasure[] = $arMeasure;
        }
        ?>
<select style="max-width: 220px"
	name="<?=$this->getFieldName($sCode, $bProperty, false, true, $bFilter)?>">
			<?foreach($arAllMeasure as &$arMeasure):?>
				<option value="<?=$arMeasure["ID"]?>"><?=htmlspecialcharsbx($arMeasure["MEASURE_TITLE"])?></option>
			<?
        endforeach
        ;
        if (isset($arMeasure))
            unset($arMeasure);
        ?>
		</select><?
        
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }

    protected function getFieldName($sCode, $bProperty = false, $bMulty = false, $bCat = false, $bFilter = false)
    {
        $key = $bFilter ? "FILTER_VALUE" : "FIELD_VALUE";
        // $sFiltered = $bFilter ? "=" : "";
        if ($bCat) {
            $sName = $key . "[CATALOG][" . $sCode . "]";
        } elseif (! $bProperty)
            $sName = $key . "[" . $sFiltered . $sCode . "]";
        else {
            $sName = $key . "[PROPERTY][" . $sFiltered . $sCode . "]";
            
            if ($bMulty)
                $sName .= "[n0]";
        }
        return $sName;
    }

    protected function getTempateHtml($IBLOCK_ID = false, $customId = '', $bFilter = false)
    {
        $result = '';
        if ($IBLOCK_ID == false || $bFilter) {
            return $result;
        }
        
        $result = '<div style="clear:both;"></div><br>
            <b>' . GetMessage('PTB_FILLINGFIELDS_TEMPLATE_TITLE') . ':</b><br>
            <a href="javascript:void(0)" onclick="AddTemplateString(\'#NAME#\', \'' . $customId . '\')">#NAME#</a> - ' . GetMessage('PTB_FILLINGFIELDS_NAME') . '<br>
            <a href="javascript:void(0)" onclick="AddTemplateString(\'#CODE#\', \'' . $customId . '\')">#CODE#</a> - ' . GetMessage('PTB_FILLINGFIELDS_CODE') . '<br>
        ';
        
        
        $props = $this->getIblockProperty($IBLOCK_ID, false, false, true);
        
        foreach ($props as $code => $name) {
            $result .= '<a href="javascript:void(0)" onclick="AddTemplateString(\'#PROPERTY_' . $code . '#\', \'' . $customId . '\')">#PROPERTY_' . $code . '#</a> - ' . $name . '<br>';
        }
        
        
        return $result;
    }

    private function getString($sCode, $bProperty = false, $bMulty = false, $bWithDesc = false, $bCat = false, $bFilter = false, $IBLOCK_ID = false)
    {
        return '
			<input type="text" id="'.($bFilter ? 'FIELD_FILTER' : 'FIELD_VALUE').'" size="30" name="' . $this->getFieldName($sCode, $bProperty, $bMulty, $bCat, $bFilter) . ($bWithDesc ? '[VALUE]' : '') . '" value="" />
		' . ($bWithDesc ? '<br/><input type="text" placeholder="' . GetMessage("PTB_FILLINGFIELDS_FIELD_DESCRIPTION") . '" name="' . $this->getFieldName($sCode, $bProperty, $bMulty) . '[DESCRIPTION]" value="" />' : '') . $this->getTempateHtml($IBLOCK_ID, 'tbf'.md5($sCode), $bFilter);
    }

    private function getTextArea($sCode, $IBLOCK_ID = false, $bFilter = false)
    {
        ob_start();
        $sName = $this->getFieldName($sCode, false, false, false, $bFilter);
        $sNameType = $this->getFieldName($sCode . "_TYPE", false, false, false, $bFilter);
        if (COption::GetOptionString("iblock", "use_htmledit", "Y") == "Y") {
            CFileMan::AddHTMLEditorFrame($sName, "", $sNameType, "text", array(
                'height' => 450,
                'width' => '100%'
            ), "N", 0, "", "", false, true, false, array(
                'toolbarConfig' => CFileman::GetEditorToolbarConfig("iblock_" . (defined('BX_PUBLIC_MODE') && BX_PUBLIC_MODE == 1 ? 'public' : 'admin')),
                'saveEditorKey' => $IBLOCK_ID
            ));
        } else {
            ?><table border="0" cellspacing="0" cellpadding="0">
	<tr id="tr_<?=$sName?>_TYPE">
		<td><?echo GetMessage("IBLOCK_DESC_TYPE")?></td>
		<td><input type="radio" name="<?=$sName?>_TYPE"
			id="<?=$sName?>_TYPE_text" value="text"> <label
			for="<?=$sName?>_TYPE_text"><?echo GetMessage("IBLOCK_DESC_TYPE_TEXT")?></label>
			/ <input type="radio" name="PREVIEW_TEXT_TYPE"
			id="PREVIEW_TEXT_TYPE_html" value="html"> <label
			for="<?=$sName?>_TYPE_html"><?echo GetMessage("IBLOCK_DESC_TYPE_HTML")?></label>
		</td>
	</tr>
	<tr id="tr_<?=$sName?>">
		<td colspan="2" align="center"><textarea cols="60" rows="10"
				name="<?=$sName?>" style="width: 100%"></textarea></td>
	</tr>
</table><?
        }
        $content = ob_get_contents();
        ob_end_clean();
        
        $content = str_replace('name="' . preg_replace("/[^a-zA-Z0-9_:\.]/is", "", $sName) . '"', 'name="' . $sName . '"', $content);
        $content = str_replace('name="' . preg_replace("/[^a-zA-Z0-9_:\.]/is", "", $sNameType) . '"', 'name="' . $sNameType . '"', $content);
        
        return $content;
    }

    private function getDateString($sCode, $bProperty = false, $bMulty = false, $bWithDesc = false, $bFilter = false)
    {
        return '<div class="adm-input-wrap adm-input-wrap-calendar">
				<input class="adm-input adm-input-calendar" type="text" name="' . $this->getFieldName($sCode, $bProperty, false, false, $bFilter) . '" size="22" value="">
				<span class="adm-calendar-icon" title="Нажмите для выбора даты" onclick="BX.calendar({node:this, field:\'' . $this->getFieldName($sCode, $bProperty, false, false, $bFilter) . '\', form: \'\', bTime: true, bHideTime: false});"></span>
			</div>' . ($bWithDesc ? '<br/><input type="text" placeholder="' . GetMessage("PTB_FILLINGFIELDS_FIELD_DESCRIPTION") . '" name="' . $this->getFieldName($sCode, $bProperty, $bMulty, false, $bFilter) . '[DESCRIPTION]" value="" />' : '');
    }

    private function getCheckBox($sCode, $bProperty = false, $bMulty = false, $bWithDesc = false, $bFilter = false)
    {
        $md5 = md5($this->getFieldName($sCode, $bProperty));
        return '<input type="hidden" id="' . $md5 . '" name="' . $this->getFieldName($sCode, $bProperty, false, false, $bFilter) . '" value="Y" />
		<input type="checkbox" value="Y" checked onChange="this.checked ? BX(\'' . $md5 . '\').value=\'Y\' : BX(\'' . $md5 . '\').value=\'N\'" />';
    }

    private function getTextType($sCode, $bProperty = false, $bMulty = false, $bWithDesc = false, $bFilter = false)
    {
        return '<span class="bx-ed-type-selector-item"><input checked="checked" type="radio" name="' . $this->getFieldName($sCode, $bProperty, false, false, $bFilter) . '" id="bxed_DETAIL_TEXT_text" value="text"><label for="bxed_DETAIL_TEXT_text">Текст</label></span>
				<span class="bx-ed-type-selector-item"><input type="radio" name="' . $this->getFieldName($sCode, $bProperty, false, false, $bFilter) . '" id="bxed_DETAIL_TEXT_html" value="html"><label for="bxed_DETAIL_TEXT_html">HTML</label></span>
				';
    }

    private function getFileInput($sCode, $bProperty = false, $bMulty = false, $bWithDesc = false, $bFilter = false)
    {
        return ! $bMulty ? CFileInput::Show($this->getFieldName($sCode, $bProperty, false, false, $bFilter), 0, array(
            "IMAGE" => "Y",
            "PATH" => "Y",
            "FILE_SIZE" => "Y",
            "DIMENSIONS" => "Y",
            "IMAGE_POPUP" => "Y",
            "MAX_SIZE" => array(
                "W" => COption::GetOptionString("iblock", "detail_image_size"),
                "H" => COption::GetOptionString("iblock", "detail_image_size")
            )
        ), array(
            'upload' => false,
            'medialib' => true,
            'file_dialog' => true,
            'cloud' => true,
            'del' => true,
            'description' => $bWithDesc
        )) : CFileInput::ShowMultiple($this->getFieldName($sCode, $bProperty), 0, array(
            "IMAGE" => "Y",
            "PATH" => "Y",
            "FILE_SIZE" => "Y",
            "DIMENSIONS" => "Y",
            "IMAGE_POPUP" => "Y",
            "MAX_SIZE" => array(
                "W" => COption::GetOptionString("iblock", "detail_image_size"),
                "H" => COption::GetOptionString("iblock", "detail_image_size")
            )
        ), false, array(
            'upload' => false,
            'medialib' => true,
            'file_dialog' => true,
            'cloud' => true,
            'del' => true,
            'description' => $bWithDesc
        ));
    }

    private function ShowFilePropertyField($name, $property_fields, $values, $max_file_size_show = 50000, $bVarsFromForm = false)
    {
        global $bCopy, $historyId;
        
        CModule::IncludeModule('fileman');
        $bVarsFromForm = false;
        
        if (! is_array($values) || $bCopy || empty($values))
            $values = array(
                "n0" => 0
            );
        
        if ($property_fields["MULTIPLE"] == "N") {
            foreach ($values as $key => $val) {
                if (is_array($val))
                    $file_id = $val["VALUE"];
                else
                    $file_id = $val;
                
                if ($historyId > 0)
                    echo CFileInput::Show($name . "[" . $key . "]", $file_id, array(
                        "IMAGE" => "Y",
                        "PATH" => "Y",
                        "FILE_SIZE" => "Y",
                        "DIMENSIONS" => "Y",
                        "IMAGE_POPUP" => "Y",
                        "MAX_SIZE" => array(
                            "W" => COption::GetOptionString("iblock", "detail_image_size"),
                            "H" => COption::GetOptionString("iblock", "detail_image_size")
                        )
                    ));
                else
                    echo CFileInput::Show($name . "[" . $key . "]", $file_id, array(
                        "IMAGE" => "Y",
                        "PATH" => "Y",
                        "FILE_SIZE" => "Y",
                        "DIMENSIONS" => "Y",
                        "IMAGE_POPUP" => "Y",
                        "MAX_SIZE" => array(
                            "W" => COption::GetOptionString("iblock", "detail_image_size"),
                            "H" => COption::GetOptionString("iblock", "detail_image_size")
                        )
                    ), array(
                        'upload' => false,
                        'medialib' => true,
                        'file_dialog' => true,
                        'cloud' => true,
                        'del' => true,
                        'description' => $property_fields["WITH_DESCRIPTION"] == "Y"
                    ));
                break;
            }
        } else {
            $inputName = array();
            foreach ($values as $key => $val) {
                if (is_array($val))
                    $inputName[$name . "[" . $key . "]"] = $val["VALUE"];
                else
                    $inputName[$name . "[" . $key . "]"] = $val;
            }
            
            if ($historyId > 0)
                echo CFileInput::ShowMultiple($inputName, $name . "[n#IND#]", array(
                    "IMAGE" => "Y",
                    "PATH" => "Y",
                    "FILE_SIZE" => "Y",
                    "DIMENSIONS" => "Y",
                    "IMAGE_POPUP" => "Y",
                    "MAX_SIZE" => array(
                        "W" => COption::GetOptionString("iblock", "detail_image_size"),
                        "H" => COption::GetOptionString("iblock", "detail_image_size")
                    )
                ), false);
            else
                echo CFileInput::ShowMultiple($inputName, $name . "[n#IND#]", array(
                    "IMAGE" => "Y",
                    "PATH" => "Y",
                    "FILE_SIZE" => "Y",
                    "DIMENSIONS" => "Y",
                    "IMAGE_POPUP" => "Y",
                    "MAX_SIZE" => array(
                        "W" => COption::GetOptionString("iblock", "detail_image_size"),
                        "H" => COption::GetOptionString("iblock", "detail_image_size")
                    )
                ), false, array(
                    'upload' => false,
                    'medialib' => true,
                    'file_dialog' => true,
                    'cloud' => true,
                    'del' => true,
                    'description' => $property_fields["WITH_DESCRIPTION"] == "Y"
                ));
        }
    }

    private function getPropertyField($arProperty, $bFilter = false)
    {
        ob_start();
        $fieldName = '';
        if ($arProperty["PROPERTY_TYPE"] == "F") {
            $fieldName = $this->getFieldName($arProperty["CODE"], true, false, false, $bFilter);
            $this->ShowFilePropertyField($fieldName, $arProperty, array(), false, false, 50000, "ptb_fillingfields");
        } else {
            $fieldName = $this->getFieldName($arProperty["CODE"], true, false, false, $bFilter);
            _ShowPropertyField($fieldName, $arProperty, array(), false, false, 50000, "ptb_fillingfields");
        }
        
        $content = ob_get_contents();
        ob_end_clean();
        
        if (!$bFilter && in_array($arProperty["PROPERTY_TYPE"], [
            'S',
            'N'
        ]) && empty($arProperty["USER_TYPE"])) {
            $content .= $this->getTempateHtml($arProperty['IBLOCK_ID'], 'tb' . md5(htmlspecialcharsbx($fieldName)), $bFilter);
        }
        
        return $content;
    }

    private function getProperty($sCode, $IBLOCK_ID, $bFilter = false)
    {
        if (intval($IBLOCK_ID) <= 0)
            return array();
        
        $rsProperty = CIBlockProperty::GetByID($sCode, $IBLOCK_ID);
        
        if ($arProperty = $rsProperty->GetNext()) {
            $arField = array(
                "HTML" => $this->getPropertyField($arProperty, $bFilter),
                "NAME" => $arProperty["NAME"]
            );
        }
        
        return $arField;
    }

    private function getFilterRulesSelect($sCode)
    {
        ob_start();
        
        ?><select name="FILTER_RULES[<?=$sCode?>]"
	class="filter-rules-select">
	       <?for ($i = 1; $i < 8; $i++) {?>
	       <option value="<?=$i?>"><?=GetMessage("PTB_FILLINGFIELDS_FILTER_SELECTED_".$i)?></option>
	       <?}?>
	    </select><?
        
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }

    private function getHtmlTd($arFields, $bFilter = false)
    {
        ob_start();
        
        ?><table width="100%" border="0"><?
        foreach ($arFields as $arField) {
            ?><tr>
		<td class="adm-detail-content-cell-l" width="50%"><label><?=$arField["NAME"]?></label></td>
		<td class="adm-detail-content-cell-r adm-detail-sub"><?=$bFilter?$this->getFilterRulesSelect($arField["CODE"]):''?><?=$arField["HTML"]?><div
				class="clear"></div></td>
	</tr><?
        }
        ?><tr><?if ($bFilter) {?>
	    <td colspan="2" align="center"><?=GetMessage("PTB_FILLINGFIELDS_FILTER_SELECTED_DESC")?></td>
	</tr>
	    <?}?>
	    </table><?
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }

    public static function isFileField($code, $IBLOCK_ID)
    {
        $bFile = false;
        
        $rsProperty = CIBlockProperty::GetByID($code, $IBLOCK_ID);
        if ($arProperty = $rsProperty->GetNext()) {
            if ($arProperty["PROPERTY_TYPE"] == "F")
                $bFile = true;
        }
        
        if (! $bFile && in_array($code, array(
            "PREVIEW_PICTURE",
            "DETAIL_PICTURE"
        )))
            $bFile = true;
        
        return $bFile;
    }

    public static function prepareUpdateValue($arValue, $arItem)
    {
        foreach ($arValue as $key => $val) {
            if (in_array($key, array(
                "PREVIEW_PICTURE",
                "DETAIL_PICTURE"
            ))) {
                continue;
            }
            
            if (is_array($val)) {
                foreach ($val as $k => $v) {
                    if (array_key_exists('VALUE', $v)) {
                        $v['VALUE'] = CComponentEngine::makePathFromTemplate($v['VALUE'], $arItem);
                        
                        if ($v['DESCRIPTION']) {
                            $v['DESCRIPTION'] = CComponentEngine::makePathFromTemplate($v['DESCRIPTION'], $arItem);
                        }
                    } else {
                        $v = CComponentEngine::makePathFromTemplate($v, $arItem);
                    }
                    $arValue[$key][$k] = $v;
                }
            } else {
                if (array_key_exists('VALUE', $val)) {
                    $val['VALUE'] = CComponentEngine::makePathFromTemplate($val['VALUE'], $arItem);
                    
                    if ($val['DESCRIPTION']) {
                        $val['DESCRIPTION'] = CComponentEngine::makePathFromTemplate($val['DESCRIPTION'], $arItem);
                    }
                } else {
                    $val = CComponentEngine::makePathFromTemplate($val, $arItem);
                }
                
                $arValue[$key] = $val;
            }
        }
        
        return $arValue;
    }
}