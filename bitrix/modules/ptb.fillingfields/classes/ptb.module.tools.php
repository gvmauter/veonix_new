<?
// ################################################
// Company: NicLab #
// Site: http://www.psdtobitrix.ru #
// Copyright (c) 2013-2014 NicLab #
// ################################################
?>
<?

/**
 * CPtbModuleTools
 */
abstract class CPtbModuleTools
{

    static $instance = null;

    private $arIblocks = array();

    private $arTypeIblocks = array();

    protected $arDefaultProps = array(
        "NAME",
        "ACTIVE",
        "DATE_CREATE",
        "TIMESTAMP_X",
        "DATE_ACTIVE_FROM",
        "DATE_ACTIVE_TO",
        "PREVIEW_TEXT",
        "DETAIL_TEXT",
        "SORT",
        "CODE",
        "PREVIEW_PICTURE",
        "DETAIL_PICTURE",
        "TAGS"
    );

    protected $arExcludeInFilter = array(
        "ACTIVE",
        "PREVIEW_TEXT",
        "DETAIL_TEXT",
        "PREVIEW_PICTURE",
        "DETAIL_PICTURE",
        "PTB_CATF_MEASURE_RATIO",
        "PTB_CATF_CAT_MEASURE"
    );
    
    protected $arSeodFields = array(
        'PTB_SEO_ELEMENT_META_TITLE',
        'PTB_SEO_ELEMENT_META_KEYWORDS',
        'PTB_SEO_ELEMENT_META_DESCRIPTION',
        'PTB_SEO_ELEMENT_PAGE_TITLE',
        'PTB_SEO_ELEMENT_PREVIEW_PICTURE_FILE_ALT',
        'PTB_SEO_ELEMENT_PREVIEW_PICTURE_FILE_TITLE',
//         'PTB_SEO_ELEMENT_PREVIEW_PICTURE_FILE_NAME',
        'PTB_SEO_ELEMENT_DETAIL_PICTURE_FILE_ALT',
        'PTB_SEO_ELEMENT_DETAIL_PICTURE_FILE_TITLE',
//         'PTB_SEO_ELEMENT_DETAIL_PICTURE_FILE_NAME'
    );

    protected $arExcludeInValue = array(
        "TIMESTAMP_X",
        "DATE_CREATE"
    );

    abstract public static function GetInstance();

    protected function __construct($bGetData = true)
    {
        CModule::IncludeModule("iblock");
        CModule::IncludeModule("fileman");
        
        require_once ($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/iblock/admin_tools.php");
        
        $this->arExcludeInFilter = array_merge($this->arExcludeInFilter, $this->arSeodFields);
        
        if ($bGetData) {
            $this->setTypeIblock();
            $this->setIblock();
        }
    }

    public function InitJs()
    {
        global $APPLICATION;
        $APPLICATION->AddHeadScript('/bitrix/js/fileman/comp_params_manager/component_params_manager.js');
        $APPLICATION->AddHeadScript('/bitrix/js/iblock/iblock_edit.js');
        $APPLICATION->AddHeadScript('/bitrix/components/bitrix/main.lookup.input/script.js');
        $APPLICATION->AddHeadScript('/bitrix/components/bitrix/main.lookup.input/templates/iblockedit/script2.js');
        
        $APPLICATION->SetAdditionalCSS('/bitrix/components/bitrix/main.lookup.input/templates/iblockedit/style.css');
        $APPLICATION->SetAdditionalCSS('/bitrix/js/fileman/comp_params_manager/component_params_manager.css');
        
        $basePath = '/bitrix/js/fileman/html_editor/';
        
        $APPLICATION->SetAdditionalCSS($basePath . 'html-editor.css');
        
        $arJSPath = array(
            $basePath . 'range.js',
            $basePath . 'html-actions.js',
            $basePath . 'html-views.js',
            $basePath . 'html-parser.js',
            $basePath . 'html-controls.js',
            $basePath . 'html-components.js',
            $basePath . 'html-snippets.js',
            $basePath . 'html-editor.js',
            '/bitrix/js/main/dd.js'
        );
        
        foreach ($arJSPath as $path) {
            $APPLICATION->AddHeadScript($path);
        }
    }

    protected function setTypeIblock()
    {
        $dbIBlockType = CIBlockType::GetList();
        while ($arIBType = $dbIBlockType->Fetch()) {
            if ($arIBTypeData = CIBlockType::GetByIDLang($arIBType["ID"], LANG)) {
                $this->arIblocks[$arIBType['ID']] = array();
                $this->arTypeIblocks[$arIBType['ID']] = '[' . $arIBType['ID'] . '] ' . $arIBTypeData['NAME'];
            }
        }
    }

    protected function setIblock()
    {
        $dbIBlock = CIBlock::GetList(array(
            'SORT' => 'ASC'
        ), array(
            'ACTIVE' => 'Y'
        ));
        while ($arIBlock = $dbIBlock->Fetch()) {
            $this->arIblocks[$arIBlock['IBLOCK_TYPE_ID']][$arIBlock['ID']] = ($arIBlock['CODE'] ? '[' . $arIBlock['CODE'] . '] ' : '') . $arIBlock['NAME'];
        }
    }

    protected function getFieldName($sCode, $bProperty = false, $bMulty = false)
    {
        if (! $bProperty)
            $sName = $sCode;
        else {
            $sName = "PROPERTY[" . $sCode . "]";
            
            if ($bMulty)
                $sName .= "[n0]";
        }
        return $sName;
    }

    public function getIblocks()
    {
        return $this->arIblocks;
    }

    public function getIblocksType()
    {
        return $this->arTypeIblocks;
    }

    public function getSections($IBLOCK_ID)
    {
        $IBLOCK_ID = (int) $IBLOCK_ID;
        if ($IBLOCK_ID <= 0)
            return false;
        
        $arResult = array();
        $rsSection = CIBlockSection::GetTreeList(array(
            "IBLOCK_ID" => $IBLOCK_ID
        ), array(
            "ID",
            "NAME",
            "IBLOCK_SECTION_ID",
            "DEPTH_LEVEL"
        ));
        while ($arSection = $rsSection->Fetch())
            $arResult[$arSection["ID"]] = str_repeat(".", $arSection["DEPTH_LEVEL"] - 1) . $arSection["NAME"];
        
        return $arResult;
    }

    public function getFields($IBLOCK_ID, $bId = false, $bFilter = false)
    {
        $IBLOCK_ID = (int) $IBLOCK_ID;
        if ($IBLOCK_ID <= 0)
            return false;
        
        $arResult = array();
        foreach ($this->arDefaultProps as $field) {
            // p(GetMessage("PTB_FILLINGFIELDS_".$field));
            if ((! $bFilter && ! in_array($field, $this->arExcludeInValue)) || ($bFilter && ! in_array($field, $this->arExcludeInFilter)))
                $arResult[$field] = GetMessage("PTB_FILLINGFIELDS_" . $field);
        }
        
        $arResult = array_merge($arResult, $this->getIblockProperty($IBLOCK_ID, $bId, $bFilter));
        
        if (CModule::IncludeModule("catalog") && ! $bFilter) {
            $arResult = array_merge($arResult, $this->getCatalogProps($IBLOCK_ID));
        }
        
        if (! $bFilter) {
            $arResult = array_merge($arResult, $this->getSeoProps());
        }
        
        return $arResult;
    }

    public function getCatalogProps($IBLOCK_ID)
    {
        $arMainCatalog = CCatalogSKU::GetInfoByIBlock($IBLOCK_ID);
        return ! empty($arMainCatalog) ? array(
            "PTB_CATF_MEASURE_RATIO" => GetMessage("PTB_FILLINGFIELDS_CAT_MEASURE_RATIO"),
            "PTB_CATF_CAT_MEASURE" => GetMessage("PTB_FILLINGFIELDS_CAT_MEASURE"),
            "PTB_CATF_CAT_WEIGHT" => GetMessage("PTB_FILLINGFIELDS_CAT_WEIGHT"),
            "PTB_CATF_CAT_WIDTH" => GetMessage("PTB_FILLINGFIELDS_CAT_WIDTH"),
            "PTB_CATF_CAT_LENGTH" => GetMessage("PTB_FILLINGFIELDS_CAT_LENGTH"),
            "PTB_CATF_CAT_HEIGHT" => GetMessage("PTB_FILLINGFIELDS_CAT_HEIGHT")
        ) : array();
    }
    
    public function getSeoProps()
    {
        $fields = array();
        
        if (class_exists('\Bitrix\Iblock\InheritedProperty\ElementTemplates')) {
            foreach ($this->arSeodFields as $key) {
                $fields[$key] = GetMessage('PTB_FILLINGFIELDS_FIELD_' . $key);
            }
        }
        
        return $fields ;
    }

    public function getIblockProperty($IBLOCK_ID, $bId = false, $bFilter = false, $bTemplate = false)
    {
        $arResult = array();
        
        $rsProperties = CIBlockProperty::GetList(array(
            "sort" => "asc",
            "id" => "asc"
        ), array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => $IBLOCK_ID
        ));
        while ($arProperty = $rsProperties->GetNext()) {
            if ($bFilter && ($arProperty["PROPERTY_TYPE"] == "F" || ($arProperty["PROPERTY_TYPE"] == "S" && $arProperty["USER_TYPE"] == "HTML"))) {
                continue;
            }
            
            if ($bTemplate && (! in_array($arProperty["PROPERTY_TYPE"], [
                'S',
                'N',
                'L'
            ]) || ! empty($arProperty["USER_TYPE"]))) {
                continue;
            }
            
            $key = $bId ? $arProperty["ID"] : $arProperty["CODE"];
            $arResult[$key] = $arProperty["NAME"];
        }
        
        return $arResult;
    }

    public function getDataByIblock($IBLOCK_ID, $bId = false)
    {
        $IBLOCK_ID = (int) $IBLOCK_ID;
        if ($IBLOCK_ID <= 0)
            return false;
        
        $arResult = array(
            "SECTIONS" => $this->getSections($IBLOCK_ID),
            "FIELDS" => $this->getFields($IBLOCK_ID, $bId),
            "FILTER" => $this->getFields($IBLOCK_ID, $bId, true)
        );
        
        return $arResult;
    }

    public static function getElementList($arFilter, $nTopCount = false)
    {
        $arResult = array();
        
        if ($nTopCount !== false)
            $arNav = array(
                "nTopCount" => $nTopCount
            );
        
        if (is_set($arFilter, "NAME")) {
            $arFilter["%NAME"] = $arFilter["NAME"];
            unset($arFilter["NAME"]);
        }
        
        $res = CIBlockElement::GetList(Array(
            "ID" => "ASC"
        ), $arFilter, false, $arNav, Array(
            "ID",
            "NAME",
            "ACTIVE",
            "CODE",
            "IBLOCK_ID",
            "PROPERTY_*"
        ));
        
        while ($ob = $res->GetNextElement()) {
            $fields = $ob->GetFields();
            $arResult[$fields["ID"]] = $fields;
            $props = $ob->GetProperties();
            foreach ($props as $prop) {
                $value = $prop['VALUE'];
                
                if (! in_array($prop["PROPERTY_TYPE"], [
                    'S',
                    'N',
                    'L'
                ]) || ! empty($prop["USER_TYPE"])) {
                    continue;
                }
                
                if ($prop['MULTIPLE'] == 'Y' || is_array($value)) {
                    $value = implode(', ', $value);
                }
                
                $arResult[$fields["ID"]]['PROPERTY_' . $prop['CODE']] = $value;
            }
        }
        
        return $arResult;
    }

    public static function getAllCount($arFilter)
    {
        if (is_set($arFilter, "NAME")) {
            $arFilter["%NAME"] = $arFilter["NAME"];
            unset($arFilter["NAME"]);
        }
        
        $all_count = CIBlockElement::GetList(array(
            "ID" => "ASC"
        ), $arFilter);
        return $all_count->SelectedRowsCount();
    }
}
