<?php

namespace Acrit\Import;

use Bitrix\Main\Loader,
    Bitrix\Main\Localization\Loc,
	Bitrix\Catalog\ProductTable;

class Import
{
	const KEY_DELIMITER = '_';
    const STEP_NO = 0;
    const STEP_BY_COUNT = 1;
    const STEP_BY_TYME = 2;
    const SOURCE_FILE = 'file';
    const SOURCE_URL = 'url';
    const SOURCE_FTP = 'ftp';
    const SOURCE_OAUTH = 'oauth';

    protected $arProfile;
    protected $arFieldsMap;
    protected $arFieldsParams;
    protected $arFieldsNameRepl;
    protected $arIBlockData;
    protected $arIBlockSections;
    protected $obLog;
    protected $arTypeParams;
    protected $row_i;

    function __construct($ID=0) {
        if ($ID) {
            $this->fillProfile($ID);
        }
        else {
            throw new \Exception(GetMessage("ACRIT_IMPORT_NE_ZADAN_PROFILQ_IMP"));
        }
    }

    public function fields() {
        return array();
    }

    public function fieldsPreParams() {
        return array();
    }

    public function fieldsPreParamsValues($arFieldsParams) {
        if (!empty($arFieldsParams['fields'])) {
            foreach ($arFieldsParams['fields'] as $k => $arParam) {
                if (isset($this->arProfile['SOURCE_'.$arParam['DB_FIELD']])) {
                    if ($arParam['TYPE'] == 'list_multiple') {
                        $arFieldsParams['fields'][$k]['VALUE'] = explode(',', $this->arProfile['SOURCE_' . $arParam['DB_FIELD']]);
                    }
                    else {
                        $arFieldsParams['fields'][$k]['VALUE'] = $this->arProfile['SOURCE_' . $arParam['DB_FIELD']];
                    }
                }
                else {
                    $arFieldsParams['fields'][$k]['VALUE'] = $arParam['DEFAULT'];
                }
            }
        }
        return $arFieldsParams;
    }

	public static function getProfileParams() {
		return [
			'SOURCE' => [
				'name' => GetMessage("ACRIT_IMPORT_FIELDS_SOURCE_NAME"),
				'default' => '',
				'display' => true,
			],
			'SOURCE_TYPE' => [
				'name' => GetMessage("ACRIT_IMPORT_FIELDS_SOURCE_TYPE_NAME"),
				'default' => '',
				'display' => true,
			],
			'SOURCE_LOGIN' => [
				'name' => GetMessage("ACRIT_IMPORT_FIELDS_SOURCE_LOGIN_NAME"),
				'default' => '',
				'display' => true,
			],
			'SOURCE_KEY' => [
				'name' => GetMessage("ACRIT_IMPORT_FIELDS_SOURCE_KEY_NAME"),
				'default' => '',
				'display' => true,
			],
			'ENCODING' => [
				'name' => GetMessage("ACRIT_IMPORT_FIELDS_ENCODING_NAME"),
				'hint' => GetMessage("ACRIT_IMPORT_FIELDS_ENCODING_HINT"),
				'default' => '',
				'display' => true,
			],
		];
	}

    public function getProfileAddSettings() {
        $arProfileAddSettings = $this->fieldsPreParams();
        $arProfileAddSettings = $this->fieldsPreParamsValues($arProfileAddSettings);
        return $arProfileAddSettings;
    }

    protected function initLog()
    {
        if (!$this->obLog) {
            $this->obLog = new \Acrit\Import\Log();
            $this->obLog->setProfileId($this->arProfile['ID']);
        }
    }

    public function getLog() {
        $this->initLog();
        return $this->obLog;
    }

    public function getTmpDir() {
        $dir_path = $_SERVER['DOCUMENT_ROOT'] . '/upload/acrit.import/' . $this->arProfile['ID'];
        if (!file_exists($dir_path)) {
            mkdir($dir_path, 0777, true);
        }
        return $dir_path;
    }

    public function getTmpDirImg() {
        $dir_path = $this->getTmpDir() . '/img';
        if (!file_exists($dir_path)) {
            mkdir($dir_path, 0777, true);
        }
        return $dir_path;
    }

    protected function fillProfile($profile_id=0) {
        if (!$this->arProfile) {
            $this->arProfile = ProfileTable::getById($profile_id)->fetch();
            // Additional data of profile type
            $arImportTypes = AcritImportGetImportTypes();
            $this->arTypeParams = $arImportTypes[$this->arProfile['TYPE']];
            // Default source
            if (!$this->arProfile['SOURCE_TYPE']) {
                if (is_array($this->arTypeParams['source_types'])) {
                    $this->arProfile['SOURCE_TYPE'] = $this->arTypeParams['source_types'][0];
                }
                else {
                    $this->arProfile['SOURCE_TYPE'] = $this->arTypeParams['source_types'];
                }
            }
            // Fill source
            $this->setSource();
        }
    }

    // Prepare main types of sources
    public function prepareSource() {
        // Load data from other server
        if ($this->arProfile['SOURCE_TYPE'] == $this::SOURCE_URL) {
            $file_dest = $this->getTmpDir() . '/' . $this->arProfile['ID'];
            $file_dest .= $this->arTypeParams['file_ext'] ? '.' . $this->arTypeParams['file_ext'] : '';
            if ((time() - filemtime($file_dest)) > 3600) {
                file_put_contents($file_dest, file_get_contents($this->arProfile['SOURCE']));
            }
        }
    }

    // Prepare main types of sources
    protected function setSource() {
        if ($this->arProfile['SOURCE_TYPE'] == $this::SOURCE_FILE) {
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $this->arProfile['SOURCE'])) {
                $this->arProfile['SOURCE'] = $_SERVER['DOCUMENT_ROOT'] . $this->arProfile['SOURCE'];
            }
            else {
                throw new \Exception(GetMessage("ACRIT_IMPORT_ERROR_FNF"));
            }
        }
        elseif ($this->arProfile['SOURCE_TYPE'] == $this::SOURCE_URL) {
            $file_dest = $this->getTmpDir() . '/' . $this->arProfile['ID'];
            $file_dest .= $this->arTypeParams['file_ext'] ? '.' . $this->arTypeParams['file_ext'] : '';
            if (file_exists($file_dest)) {
                $this->arProfile['SOURCE'] = $file_dest;
            }
//            else {
//                throw new \Exception(GetMessage("ACRIT_IMPORT_ERROR_SOURCE_DENY"));
//            }
        }
        elseif ($this->arProfile['SOURCE_TYPE'] == $this::SOURCE_FTP) {
            //TODO: Fill
        }
        elseif ($this->arProfile['SOURCE_TYPE'] == $this::SOURCE_OAUTH) {
            //TODO: Fill
        }
    }

    // Fill the fields map
    protected function fillFieldsMap()
    {
        if (!$this->arFieldsMap) {
            $this->arFieldsMap = array();
            $obProfileFields = new ProfileFieldsTable();
            $res = $obProfileFields->getList(array(
                'order' => array('ID' => 'asc'),
                'filter' => array('PARENT_ID' => $this->arProfile['ID']),
            ));
            while ($arField = $res->fetch()) {
                $this->arFieldsMap[$arField['F_FIELD']] = $arField['IB_FIELD'];
            }
        }
    }

    // Fill the fields params
    protected function fillFieldsParams()
    {
        if (!$this->arFieldsParams) {
            $this->arFieldsParams = array();
            $obProfileFields = new ProfileFieldsTable();
            $res = $obProfileFields->getList(array(
                'order' => array('ID' => 'asc'),
                'filter' => array('PARENT_ID' => $this->arProfile['ID']),
            ));
            while ($arField = $res->fetch()) {
                $this->arFieldsParams[$arField['F_FIELD']] = $arField['PARAMS'];
            }
        }
    }

    // Fill the iblock info
    protected function fillIBlockData($iblock_id)
    {
        if (!\CModule::IncludeModule("iblock")) {
            return;
        }
        if (!$this->arIBlockData) {
            $this->arIBlockData = array();
        }
        if (!$this->arIBlockData['PROPS']) {
            $this->arIBlockData['PROPS'] = array();
            $obProps = \CIBlockProperty::GetList(array("sort"=>"asc", "name"=>"asc"), array("IBLOCK_ID"=>$iblock_id));
            while ($arProp = $obProps->GetNext()) {
                // Get enum values
                if ($arProp['PROPERTY_TYPE'] == 'L') {
                    $arProp['VALUES'] = array();
                    $arProp['VALUES_BY_ID'] = array();
                    $obValues = \CIBlockPropertyEnum::GetList(array("DEF" => "DESC", "SORT" => "ASC"), array("IBLOCK_ID" => $iblock_id, "PROPERTY_ID" => $arProp['ID']));
                    while ($arValue = $obValues->GetNext()) {
                        $arProp['VALUES'][$arValue['ID']] = $arValue;
                        $arProp['VALUES_BY_ID'][$arValue['ID']] = trim($arValue['VALUE']);
                    }
                }
                elseif ($arProp['PROPERTY_TYPE'] == 'S') {
                    // Get reference values
                    if ($arProp['USER_TYPE'] == 'directory' && $arProp['USER_TYPE_SETTINGS']['TABLE_NAME'] != '') {
                        $arProp['VALUES_BY_ID'] = $this->getPropertyItems_S_directory($arProp);
                    }
                }
                $this->arIBlockData['PROPS'][$arProp['ID']] = $arProp;
            }
        }
        if (\CModule::IncludeModule("catalog") && !$this->arIBlockData['PRICES']) {
            $this->arIBlockData['PRICES'] = array();
            // For default fields of prices
            $arIBPrices = array();
            $res = \Bitrix\Catalog\GroupTable::getList(array(
                'filter' => array(),
                'order' => array('ID' => 'asc'),
            ));
            while ($arItem = $res->fetch()) {
                $this->arIBlockData['PRICES'][$arItem['ID']] = $arItem;
            }
        }
        if (\CModule::IncludeModule("catalog") && !$this->arIBlockData['STORES']) {
            $this->arIBlockData['STORES'] = array();
            // For default fields of prices
            $arIBPrices = array();
            $res = \Bitrix\Catalog\StoreTable::getList(array(
                'filter' => array(),
                'order' => array('ID' => 'asc'),
            ));
            while ($arItem = $res->fetch()) {
                $this->arIBlockData['STORES'][$arItem['ID']] = $arItem;
            }
        }
        if (\CModule::IncludeModule("catalog") && !$this->arIBlockData['OFFERS']) {
            $arOffers = \CCatalogSKU::GetInfoByOfferIBlock($iblock_id);
            $this->arIBlockData['OFFERS']['PRODUCT_IBLOCK_ID'] = $arOffers ? $arOffers["PRODUCT_IBLOCK_ID"]: false;
            $this->arIBlockData['OFFERS']['SKU_IBLOCK_ID'] = $arOffers ? $arOffers["IBLOCK_ID"]: false;
        }
    }

    public function getPropertyItems_S_directory($arProp) {
        $arResult = array();
        $strHlTableName = $arProp['USER_TYPE_SETTINGS']['TABLE_NAME'];
        if (\Bitrix\Main\Loader::includeModule('highloadblock')) {
            if (strlen($strHlTableName)) {
                $arHLBlock = \Bitrix\Highloadblock\HighloadBlockTable::getList(array('filter' => array('TABLE_NAME'=>$strHlTableName)))->fetch();
                if ($arHLBlock) {
                    $obEntity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
                    $strEntityDataClass = $obEntity->getDataClass();
                    $resData = $strEntityDataClass::GetList(array(
                        'filter' => array(),
                        'select' => array('ID', 'UF_NAME', 'UF_XML_ID'),
                        'order' => array('ID' => 'ASC'),
                    ));
                    while ($arItem = $resData->Fetch()) {
                        $arResult[$arItem['UF_XML_ID']] = $arItem['UF_NAME'];
                    }
                }
            }
        }
        unset($strHlTableName, $arHLBlock, $obEntity, $strEntityDataClass, $resData, $arItem);
        return $arResult;
    }

    // Fill the codes confirmity
    protected function fillFieldsNameRepl()
    {
        if (!$this->arFieldsNameRepl) {
            $this->arFieldsNameRepl = array(
                "SEO_H1"                       =>  "ELEMENT_PAGE_TITLE",
                "SEO_TITLE"                    =>  "ELEMENT_META_TITLE",
                "SEO_KEYWORDS"                 =>  "ELEMENT_META_KEYWORDS",
                "SEO_DESCRIPTION"              =>  "ELEMENT_META_DESCRIPTION",
                "SEO_PREVIEW_PICTURE_ALT"      =>  "ELEMENT_PREVIEW_PICTURE_FILE_ALT",
                "SEO_PREVIEW_PICTURE_TITLE"    =>  "ELEMENT_PREVIEW_PICTURE_FILE_TITLE",
                "SEO_PREVIEW_PICTURE_FILENAME" =>  "ELEMENT_PREVIEW_PICTURE_FILE_NAME",
                "SEO_DETAIL_PICTURE_ALT"       =>  "ELEMENT_DETAIL_PICTURE_FILE_ALT",
                "SEO_DETAIL_PICTURE_TITLE"     =>  "ELEMENT_DETAIL_PICTURE_FILE_TITLE",
                "SEO_DETAIL_PICTURE_FILENAME"  =>  "ELEMENT_DETAIL_PICTURE_FILE_NAME",
                "CATEG_PARAMS_NAME" => "NAME",
                "CATEG_PARAMS_CODE" => "CODE",
                "CATEG_PARAMS_EXTERNAL_ID" => "EXTERNAL_ID",
                "CATEG_PARAMS_PARENT_ID" => "IBLOCK_SECTION_ID",
                "CATEG_PARAMS_ACTIVE" => "ACTIVE",
                "CATEG_PARAMS_SORT" => "SORT",
                "CATEG_PARAMS_IMAGE" => "PICTURE",
                "CATEG_PARAMS_PICTURE" => "DETAIL_PICTURE",
                "CATEG_PARAMS_DESCRIPTION" => "SECTION_META_DESCRIPTION",
                "CATEG_PARAMS_SEO_H1" => "SECTION_PAGE_TITLE",
                "CATEG_PARAMS_SEO_TITLE" => "SECTION_META_TITLE",
                "CATEG_PARAMS_SEO_KEYWORDS" => "SECTION_META_KEYWORDS",
                "CATEG_PARAMS_SEO_DESCRIPTION" => "SECTION_META_DESCRIPTION",
            );
        }
    }

    protected function convStrEncoding($value, $encoding=false)
    {
        $enc_to = 'UTF-8';
        if (LANG_CHARSET == 'windows-1251') {
            $enc_to = 'CP1251';
        }
        if ($encoding) {
            $enc_from = $encoding;
        }
        elseif ($this->arProfile['ENCODING']) {
            $enc_from = $this->arProfile['ENCODING'];
        }
        else {
	        $enc_from = 'CP1251';
        }
        if ($enc_from != $enc_to) {
	        $value = mb_convert_encoding($value, $enc_to, $enc_from);
        }
        return $value;
    }

    private function getIBSectionId($field, $value, $parent_id=0)
    {
        $section_id = false;
        if ($value) {
            // Get sections
            if (!$this->arIBlockSections) {
                $arSelect = array('ID', 'XML_ID', 'CODE', 'NAME', 'IBLOCK_SECTION_ID');
                $arFilter = array('IBLOCK_ID' => $this->arProfile['IBLOCK_ID']);
                if ($parent_id) {
                    $arFilter['IBLOCK_SECTION_ID'] = $parent_id;
                }
                $arOrder = array('ID' => 'asc');
                $res = \Bitrix\Iblock\SectionTable::getList(array(
                    'select' => $arSelect,
                    'filter' => $arFilter,
                    'order' => $arOrder,
                ));
                while ($arItem = $res->fetch()) {
                    $this->arIBlockSections[$arItem['ID']] = $arItem;
                }
            }
            // Find ID
            foreach ($this->arIBlockSections as $arItem) {
                if ($arItem[$field] == $value && (!$parent_id || ($parent_id && $arItem['IBLOCK_SECTION_ID'] == $parent_id))) {
                    $section_id = $arItem['ID'];
                    break;
                }
            }
        }
        return $section_id;
    }

	private function addIBSectionsCache($section_id)
    {
    	$result = false;
    	if ($section_id) {
		    $res = \Bitrix\Iblock\SectionTable::getList(array(
			    'select' => array('ID', 'XML_ID', 'CODE', 'NAME', 'IBLOCK_SECTION_ID'),
			    'filter' => array('ID' => $section_id),
			    'order'  => array('ID' => 'asc'),
		    ));
		    if ($arItem = $res->fetch()) {
			    $this->arIBlockSections[$arItem['ID']] = $arItem;
			    $result = true;
		    }
	    }
        return $result;
    }

    protected function modifValueByParams($value, $field_k)
    {
        if (!empty($this->arFieldsParams[$field_k])) {
            if ($this->arFieldsParams[$field_k]['url_decode'] == 'Y') {
                $value = urldecode($value);
            }
            if ($this->arFieldsParams[$field_k]['register_change']) {
                switch ($this->arFieldsParams[$field_k]['register_change']) {
                    case 'low': $value = strtolower($value);
                        break;
                    case 'up': $value = strtoupper($value);
                        break;
                    case 'first': $value = ucfirst($value);
                        break;
                    case 'each': $value = ucwords($value);
                        break;
                }
            }
            if ($this->arFieldsParams[$field_k]['str_limit'])
            {
                $value = substr($value, 0, (int)$this->arFieldsParams[$field_k]['str_limit']);
            }
            if ($this->arFieldsParams[$field_k]['str_dateformat']) {
                $DB = $GLOBALS["DB"];
                $value = $DB->FormatDate($value, $this->arFieldsParams[$field_k]['str_dateformat'], \CSite::GetDateFormat("FULL"));
            }
            if ($this->arFieldsParams[$field_k]['cut_htmltags'] == 'Y') {
                $value = strip_tags($value);
            }
            if ($this->arFieldsParams[$field_k]['cut_special'] == 'Y') {
                $value = $this->clearStr($value);
            }
            if ($this->arFieldsParams[$field_k]['html_to_special'] == 'Y') {
                $value = htmlspecialchars_decode($value);
            }
            if ($this->arFieldsParams[$field_k]['num_round']['checked'] == 'Y') {
                switch($this->arFieldsParams[$field_k]['num_round']['ADD_PARAMS']) {
                    case 'GENERAL':
                        $method = "none";
                        break;
                    case 'TOHIGHEST':
                        $method = PHP_ROUND_HALF_UP;
                        break;
                    case 'TOLOWEST':
                        $method = PHP_ROUND_HALF_DOWN;
                        break;
                    case 'TOEVEN':
                        $method = PHP_ROUND_HALF_EVEN;
                        break;
                    case 'TOODD':
                        $method = PHP_ROUND_HALF_ODD;
                        break;
                    case 'TONINE':
                        $method = 'TONINE';
                        break;
                    default:
                        $method = PHP_ROUND_HALF_UP;
                }
                switch($this->arFieldsParams[$field_k]['num_round']['ADD_PRECISION']) {
                    case 'TOSOTOIA':
                        $presicion = 2;
                        $multiplicator = 0.01;
                        break;
                    case 'TODESYATAYA':
                        $presicion = 1;
                        $multiplicator = 0.1;
                        break;
                    case 'TOONE':
                        $presicion = 0;
                        $multiplicator = 1;
                        break;
                    case 'TODOZEN':
                        $presicion = -1;
                        $multiplicator = 10;
                        break;
                    case 'TOHUNDREDS':
                        $presicion = -2;
                        $multiplicator = 100;
                        break;
                    case 'THOUSENDS':
                        $presicion = -3;
                        $multiplicator = 1000;
                        break;
                    default:
                        $presicion = 0;
                        $multiplicator = 1;
                }
                if ($method == 'none') {
                    $value = round($value,$presicion);
                }
                elseif ($method == 'TONINE') {
                    $value = (intval($value/$multiplicator) + (9-intval($value/$multiplicator)%10))*$multiplicator;
                }
                else {
                    $value = round($value,$presicion,$method);
                }
            }
            if (trim($this->arFieldsParams[$field_k]['formula'])) {
                $formula = trim($this->arFieldsParams[$field_k]['formula']);
                $formula = str_replace("X1", $value, $formula);
                $value = eval("return $formula;");
            }
        }
        return $value;
    }

    protected function modifPictureByParams($value, $field_k)
    {
        if ($this->arFieldsParams[$field_k]['work_picture']['checked'] == 'Y') {
            $iwidth = $this->arFieldsParams[$field_k]['work_picture']['width'];
            $iheight = $this->arFieldsParams[$field_k]['work_picture']['height'];
            if ($iwidth != '' && $iheight != '' && $arTempFile = \CFile::MakeFileArray($value)) {
                $resize_type = $this->arFieldsParams[$field_k]['work_picture']['process_type'] == 'cut' ? BX_RESIZE_IMAGE_EXACT : BX_RESIZE_IMAGE_PROPORTIONAL;
                $quality = $this->arFieldsParams[$field_k]['work_picture']['quality'] != '' ? $this->arFieldsParams[$field_k]['work_picture']['quality'] : false;
                if (\CFile::ResizeImageFile(
                    $sourceFile = $arTempFile['tmp_name'],
                    $destinationFile = $_SERVER['DOCUMENT_ROOT']."/upload/tmp/".date("dmY")."/"."resized".date("dmY").rand(1,1000).".jpg",
                    $arSize = array('width' => $iwidth,'height' => $iheight),
                    $resizeType = $resize_type,
                    $arWaterMark = array(),
                    $jpgQuality = $quality,
                    $arFilters =false
                )) {
                    $value = $destinationFile;
                }
                // If image wasn't created
                else {
                    $value = false;
                }
            }
        }
        return $value;
    }

    protected function clearStr($str){
        return preg_replace ("/[^\p{L},\s]/u","",$str);
    }

    protected function checkRequiredByParams($value, $field_k)
    {
        $res = true;
        // Check value
        if (isset($this->arFieldsParams[$field_k]['required']) && $this->arFieldsParams[$field_k]['required'] == 'Y'
        && !$value) {
            $res = false;
        }
        // Check required values
        if (!empty(array_filter($this->arFieldsParams[$field_k]['cond_values_req']))) {
            $check = false;
            foreach ($this->arFieldsParams[$field_k]['cond_values_req'] as $check_value) {
                if ($check_value && $value == $check_value) {
                    $check = true;
                }
            }
            if (!$check) {
                $res = false;
            }
        }
        // Check excluded values
        if (!empty(array_filter($this->arFieldsParams[$field_k]['cond_values_excl']))) {
            foreach ($this->arFieldsParams[$field_k]['cond_values_excl'] as $check_value) {
                if ($check_value && $value == $check_value) {
                    $res = false;
                }
            }
        }
        return $res;
    }

    protected function getElementCode($name) {
        $arParams = array("replace_space" => "-", "replace_other" => "-");
        $code = \CUtil::translit($name, "ru", $arParams);
        return $code;
    }

    protected function getSectionCode($name) {
        $arParams = array("replace_space" => "-", "replace_other" => "-");
        $code = \CUtil::translit($name, "ru", $arParams);
        return $code;
    }

        // Create sections list from miltiple field and add to the iblock element
    protected function createSectionsList($arSectsName, $iblock_id, &$arElSList) {
	    $bUpdateSearch = $this->searchModuleIndexingEnabled();

    	$bs = new \CIBlockSection;
        foreach ($arSectsName as $name) {
            $arSFields['NAME'] = $name;
            $arSFields['CODE'] = $this->getSectionCode($name);
            $arSFields["IBLOCK_ID"] = $iblock_id;
            $section_id = $bs->Add($arSFields, true, $bUpdateSearch);
            if ($section_id) {
                $arElSList[] = $section_id;
                $this->addIBSectionsCache($section_id);
            }
            else {
                $this->obLog->add(GetMessage("ACRIT_IMPORT_STROKA") . ' ' . $this->row_i . ': [section] ' . $bs->LAST_ERROR, \Acrit\Import\Log::TYPE_ERROR);
            }
        }
    }

    // Create sections hierarchy from miltiple field and add lower section to the iblock element
    protected function createSectionsHierarchy($arSectsName, $iblock_id, $parent_section, &$arElSList) {
	    $bUpdateSearch = $this->searchModuleIndexingEnabled();

        $last_section_id = false;
        $bs = new \CIBlockSection;
        $section_id = $parent_section;
        $i = 0;
        foreach ($arSectsName as $name) {
            $arSFields['NAME'] = $name;
            $arSFields['CODE'] = $this->getSectionCode($name);
            $arSFields["IBLOCK_ID"] = $iblock_id;
            $arSFields["IBLOCK_SECTION_ID"] = $section_id;
            $section_id = $bs->Add($arSFields, true, $bUpdateSearch);
            if ($section_id) {
                $this->addIBSectionsCache($section_id);
            }
            else {
                $this->obLog->add(GetMessage("ACRIT_IMPORT_STROKA") . ' ' . $this->row_i . ': [section] ' . $bs->LAST_ERROR, \Acrit\Import\Log::TYPE_ERROR);
                break;
            }
            $i++;
        }
        if ($i >= count($arSectsName)) {
            $last_section_id = $section_id;
        }
        if ($last_section_id) {
            $arElSList[] = $last_section_id;
        }
    }

    // Get files from other server
    protected function getServerFile($url, $alt_extension=false) {
        $file_name = false;
        $arUrl = parse_url($url);
        if ($arUrl['scheme']) {
            $arPath = pathinfo($arUrl['path']);
            $dir_img_name = $this->getTmpDirImg();
            $dir_profile = $this->getTmpDir();
	        $extension = $alt_extension ? $alt_extension : $arPath['extension'];
            $file_name = $dir_img_name . '/' . date('YmdHis') . rand(10000, 99000) . '.' . $extension;
            $hasCurl = function_exists('curl_version');
            if ($hasCurl) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_COOKIEJAR, $dir_profile . '/cookie.txt');
                curl_setopt($ch, CURLOPT_COOKIEFILE, $dir_profile . '/cookie.txt');
                curl_exec($ch);
                curl_close($ch);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_COOKIEJAR, $dir_profile . '/cookie.txt');
                curl_setopt($ch, CURLOPT_COOKIEFILE, $dir_profile . '/cookie.txt');
                $f_data = curl_exec($ch);
                if ($f_data) {
                    file_put_contents($file_name, $f_data);
                }
                curl_close($ch);
            }
            else {
                $strAgent = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.99 YaBrowser/19.1.2.258 Yowser/2.5 Safari/537.36';
                $arStream = array(
                    'http' => array(
                        'method' => "GET",
                        'header' => "Accept-language: en\r\n" .
                            "User-Agent: {$strAgent}\r\n",
                        'follow_location' => false,
                    )
                );
                file_get_contents($url, false, stream_context_create($arStream));
                $arCookies = array();
                foreach ($http_response_header as $strHeader) {
                    if (preg_match('#^Set-Cookie: (.*?=.*?);#i', $strHeader, $arMatch)) {
                        $arCookies[] = $arMatch[1];
                    }
                }
                $strCookie = implode(';', $arCookies);
                $arStream['http']['header'] .= 'Cookie: ' . $strCookie . "\r\n";
                $arStream['http']['follow_location'] = true;
                $f_data = file_get_contents($url, false, stream_context_create($arStream));
                file_put_contents($file_name, $f_data);
            }
        }
        return $file_name;
    }

    // Import item
    protected function saveIBData($arInputRow, $row_i=0)
    {
        $arImpRes = false;
        $this->initLog();
        $this->row_i = $row_i;
        \CAcritImport::Log('(saveIBData) arInputRow ' . print_r($arInputRow, true));
        if (empty(array_filter($arInputRow))) {
	        \CAcritImport::Log('(saveIBData) Error: ' . GetMessage("ACRIT_IMPORT_SAVEIBDATA_ERROR_EMPTY"));
	        $arImpRes['errors'][] = array(
		        GetMessage("ACRIT_IMPORT_SAVEIBDATA_ERROR_EMPTY"),
	        );
            return $arImpRes;
        }
        if (!$this->arProfile['ID'] || !$this->arProfile['IBLOCK_ID']) {
	        \CAcritImport::Log('(saveIBData) Error: ' . GetMessage("ACRIT_IMPORT_NE_ZADANY_BAZOVYE_DA"));
            $arImpRes['errors'][] = array(
                GetMessage("ACRIT_IMPORT_NE_ZADANY_BAZOVYE_DA"),
            );
            return $arImpRes;
        }
        $this->fillFieldsMap();
        if (!$this->arFieldsMap || !is_array($this->arFieldsMap) || empty($this->arFieldsMap)) {
	        \CAcritImport::Log('(saveIBData) Error: ' . GetMessage("ACRIT_IMPORT_NE_ZADANY_BAZOVYE_DA"));
            $arImpRes['errors'][] = array(
                GetMessage("ACRIT_IMPORT_NE_ZADANY_BAZOVYE_DA"),
            );
            return $arImpRes;
        }
        $this->fillFieldsParams($this->arProfile['ID']);
        $this->fillIBlockData($this->arProfile['IBLOCK_ID']);
        $this->fillFieldsNameRepl();
        $arIBFields = [
	        'IBLOCK_ID' => $this->arProfile['IBLOCK_ID'],
	        'ACTIVE' => 'Y',
        ];
        $arIBPropValues = [];
        $arIdentifier = false;
        $arFilter = array(
            'IBLOCK_ID' => $this->arProfile['IBLOCK_ID'],
        );

        $arItemProduct = [];
        $arItemStores = [];
        $arItemPrices = [];
        $arAUCategory = [];
        $arSectFields = [];
	    $arTmpFiles = [];

	    // Create new infoblock properties
	    $arFieldsNames = $this->fields();
	    foreach ($arInputRow as $k => $value) {
		    if (isset($this->arFieldsMap[$k]) && strpos($this->arFieldsMap[$k], 'CREATE_PROP__') === 0) {
				$params_codes = explode('__', $this->arFieldsMap[$k]);
			    $name = $arFieldsNames[$k]['NAME'];
				$iblock_id = $this->arProfile['IBLOCK_ID'];
				$profile_id = $this->arProfile['ID'];
				$arParams = [];
				if ($params_codes[1] == 'STRING') {
					$arParams['type'] = IblockProp::TYPE_STRING;
				}
				if ($params_codes[2] == 'MULT') {
					$arParams['multiple'] = true;
				}
				$props = new IblockProp($iblock_id, $profile_id, $name, $arParams);
				$new_prop_id = $props->create();
			    // Set new prop in the fields map
				if ($new_prop_id) {
					$new_prop_code = 'PROP_' . $new_prop_id;
					$this->arFieldsMap[$k] = $new_prop_code;
					// Save in DB
					$res = ProfileFieldsTable::getList([
						'filter' => [
							'PARENT_ID' => $this->arProfile['ID'],
							'F_FIELD' => $k,
						],
					]);
					if ($p_field = $res->fetch()) {
						$pf_id = $p_field['ID'];
						$obProfileFields = new ProfileFieldsTable();
						$obProfileFields->update($pf_id, [
							'IB_FIELD' => $new_prop_code,
						]);
					}
				}
		    }
	    }

	    // Find item in database
        $ib_item_id = false;
        foreach ($arInputRow as $k => $value) {
            if (isset($this->arFieldsMap[$k])) {
                if (strpos($this->arFieldsMap[$k], 'PROP_') === 0) {
                    $prop_k = str_replace('PROP_', '', $this->arFieldsMap[$k]);
                    // Element identifier
                    if ($k == $this->arProfile['ELEMENT_IDENTIFIER'] && !is_array($value)) {
	                    $value = trim($value);
	                    $value = $this->modifValueByParams($value, $k);
                        $arIdentifier = array(
                            'key' => 'PROPERTY_' . $prop_k,
                            'value' => $value
                        );
                    }
                }
                else {
                    // Element identifier
                    if ($k == $this->arProfile['ELEMENT_IDENTIFIER']) {
	                    $value = $this->modifValueByParams($value, $k);
                        $arIdentifier = array(
                            'key' => $this->arFieldsMap[$k],
                            'value' => $value
                        );
                    }
                }
            }
        }
        if ($arIdentifier['key'] && $arIdentifier['value']) {
            $arFilter[$arIdentifier['key']] = $arIdentifier['value'];
        }
        else {
	        \CAcritImport::Log('(saveIBData) Error: ' . GetMessage("ACRIT_IMPORT_SAVEIBDATA_ERROR_NOTFINDID"));
	        $arImpRes['errors'][] = array(
		        GetMessage("ACRIT_IMPORT_SAVEIBDATA_ERROR_NOTFINDID"),
	        );
            return $arImpRes;
        }
        // Try to find item
        $res = \CIBlockElement::GetList(['ID' => 'asc'], $arFilter, false, false, ['ID']);
        if ($obItem = $res->GetNextElement()) {
            $arIBItem = $obItem->GetFields();
            $ib_item_id = $arIBItem['ID'];
        }

        // Ignore new or exist elements if option set
        if ((!$ib_item_id && $this->arProfile['ACTIONS_NEW_ELEMENTS'] == 'not_create')
            || ($ib_item_id && $this->arProfile['ACTIONS_EXIST_ELEMENTS'] == 'ignore')) {
            $this->obLog->incImportStatParam('imported_items');
            return $arImpRes;
        }

        // Load properties
        if ($ib_item_id) {
            $res = \CIBlockElement::GetList(['ID' => 'asc'], ['IBLOCK_ID' => $this->arProfile['IBLOCK_ID'], 'ID' => $ib_item_id]);
            if ($obItem = $res->GetNextElement()) {
                $arIBItem = $obItem->GetFields();
                $arIBItem["PROPERTIES"] = $obItem->GetProperties();
            }
        }

        // Fill data
        foreach ($arInputRow as $k => $value) {
            if (isset($this->arFieldsMap[$k])) {
                // If has multiple delimiter
                if (!is_array($value) && $this->arFieldsParams[$k]['milt_delimiter'] && strpos($value, $this->arFieldsParams[$k]['milt_delimiter']) !== false) {
                    $value = explode($this->arFieldsParams[$k]['milt_delimiter'], $value);
                }
                // Prepare value
                if (is_array($value)) {
                    foreach ($value as $i => $val) {
                        if (!is_array($val)) {
                            $value[$i] = trim($val);
                        }
                    }
                }
                else {
                    $value = trim($value);
                }
                // Check required param
                if (!$this->checkRequiredByParams($value, $k)) {
                    $this->obLog->add(GetMessage("ACRIT_IMPORT_STROKA") . ' ' . $this->row_i . ' ('.$arIdentifier['key'].' = "'.$arIdentifier['value'].'"): ' . GetMessage("ACRIT_IMPORT_PROPUSK"), \Acrit\Import\Log::TYPE_SKIP);
                    return false;
                }
                // Properties
                if (strpos($this->arFieldsMap[$k], 'PROP_') === 0) {
                    $prop_k = str_replace('PROP_', '', $this->arFieldsMap[$k]);
                    if ($ib_item_id && $this->arFieldsParams[$k]['not_empty'] == 'Y' && $arIBItem['PROPERTIES'][$prop_k]['VALUE']) {
                        continue;
                    }
                    if (isset($this->arIBlockData['PROPS'][$prop_k])) {
                        $arPropData = $this->arIBlockData['PROPS'][$prop_k];
                        // Get IDs of list values
                        if ($arPropData['PROPERTY_TYPE'] == 'L' || $arPropData['PROPERTY_TYPE'] == 'S') {
                            if (!empty($arPropData['VALUES_BY_ID'])) {
                                $arIDs = array_flip($arPropData['VALUES_BY_ID']);
                                if (is_array($value)) {
                                    foreach ($value as $i => $value_val) {
                                        if ($arIDs[$value_val]) {
                                            $value[$i] = $arIDs[$value_val];
                                        }
                                    }
                                }
                                else {
                                    $value = $arIDs[$value];
                                }
                            }
                        }
                        // Get files data
                        elseif ($arPropData["PROPERTY_TYPE"] == 'F') {
                            if (is_array($value)) {
                                foreach ($value as $i => $value_val) {
	                                // Prepare modifications of path
	                                $value_val = $this->modifValueByParams($value_val, $k);
	                                // If there is enabled to process the image and do not use the information block settings
                                    if ($this->arFieldsParams[$k]["work_picture"]["checked"] == "Y" && $this->arProfile['ACTIONS_IB_IMG_MODIF'] != 'Y') {
                                        // If can't create a new picture and can't return image path
                                        if (!$path = $this->modifPictureByParams($this->arProfile["IMGS_SOURCE_PATH"] . $value_val, $k)) {
                                            // Get old picture
                                            $path = $this->arProfile["IMGS_SOURCE_PATH"] . $value_val;
                                        }
                                    }
                                    else {
                                        $path = $this->arProfile["IMGS_SOURCE_PATH"] . $value_val;
                                    }
                                    if ($path) {
                                        if ($url_path = $this->getServerFile($path)) {
                                            $path = $url_path;
                                            $arTmpFiles[] = $url_path;
                                        }
                                        $arTmpFile = \CFile::MakeFileArray($path);
                                        $value[$i] = array('VALUE' => $arTmpFile, 'DESCRIPTION' => $arTmpFile['name']);
                                    }
                                }
                            }
                            else {
	                            // Prepare modifications of path
	                            $value = $this->modifValueByParams($value, $k);
	                            // If there is enabled to process the image and do not use the information block settings
                                if ($this->arFieldsParams[$k]["work_picture"]["checked"] == "Y" && $this->arProfile['ACTIONS_IB_IMG_MODIF'] != 'Y') {
                                    // If can't create a new picture and can't return image path
                                    if (!$path = $this->modifPictureByParams($this->arProfile["IMGS_SOURCE_PATH"] . $value, $k)) {
                                        // Get old picture
                                        $path = $this->arProfile["IMGS_SOURCE_PATH"] . $value;
                                    }
                                }
                                else {
                                    $path = $this->arProfile["IMGS_SOURCE_PATH"] . $value;
                                }
                                if ($path) {
                                    if ($url_path = $this->getServerFile($path)) {
                                        $path = $url_path;
                                        $arTmpFiles[] = $url_path;
                                    }
                                    $arTmpFile = \CFile::MakeFileArray($path);
                                    $value = ['VALUE' => $arTmpFile, 'DESCRIPTION' => $arTmpFile['name']];
                                }
                            }
                        }
                        // Multiple value must be array
                        if ($arPropData["MULTIPLE"] == "Y" && !is_array($value)) {
                            $value = [$value];
                        }
                        // Value modifications
                        if ($arPropData["PROPERTY_TYPE"] != 'F') {
                            if (is_array($value)) {
                                foreach ($value as $i => $value_val) {
                                    $value[$i] = $this->modifValueByParams($value_val, $k);
                                }
                            }
                            else {
                                $value = $this->modifValueByParams($value, $k);
                            }
                        }
                        // Save value
//	                    $arIBPropValues[$prop_k] = $value;
	                    if (isset($arIBPropValues[$prop_k])) {
		                    if (is_array($arIBPropValues[$prop_k]) && isset($arIBPropValues[$prop_k][0])) {
								if (isset($value[0])) {
									$arIBPropValues[$prop_k] = array_merge($arIBPropValues[$prop_k], $value);
								}
								else {
									$arIBPropValues[$prop_k][] = $value;
								}
		                    }
		                    else {
			                    $arIBPropValues[$prop_k] = [$arIBPropValues[$prop_k], $value];
		                    }
	                    }
	                    else {
		                    $arIBPropValues[$prop_k] = $value;
	                    }
                    }
                }
                // Sections
                elseif (strpos($this->arFieldsMap[$k], 'CATEGORY_') === 0) {
                    $section_field = false;
                    if (strpos($this->arFieldsMap[$k], 'CATEGORY_XML_ID') === 0) {
                        $section_field = 'XML_ID';
                    }
                    elseif (strpos($this->arFieldsMap[$k], 'CATEGORY_CODE') === 0) {
                        $section_field = 'CODE';
                    }
                    elseif (strpos($this->arFieldsMap[$k], 'CATEGORY_NAME') === 0) {
                        $section_field = 'NAME';
                    }
                    elseif (strpos($this->arFieldsMap[$k], 'CATEGORY_ID') === 0) {
                        $section_field = 'ID';
                    }
                    if ($section_field) {
                        // For multiple fields
                        if (is_array($value)) {
                            $arClear = array();
                            foreach ($value as $i => $item_val) {
                                if (trim($item_val)) {
                                    $arClear[] = trim($item_val);
                                }
                            }
                            $value = $arClear;
                            unset($arClear);
                            $arSectsForAdd = array();
                            // Sections list
                            if ($this->arFieldsParams[$k]['sect_hierarchy'] != 'Y') {
                                foreach ($value as $i => $item_val) {
                                    if ($section_id = $this->getIBSectionId($section_field, $item_val)) {
                                        $arIBFields['IBLOCK_SECTION'][] = $section_id;
                                    }
                                    elseif ($section_field == 'NAME') {
                                        $arSectsForAdd[] = $item_val;
                                    }
                                }
                                // Create news sections
                                if (!empty($arSectsForAdd) && $this->arProfile['ACTIONS_SECTIONS_CREATE'] == 'Y') {
                                    $this->createSectionsList($arSectsForAdd, $arIBFields["IBLOCK_ID"], $arIBFields['IBLOCK_SECTION']);
                                }
                            }
                            // Sections hierarchy
                            else {
                                $section_id = 0;
                                $last_finded = 0;
                                foreach ($value as $i => $item_val) {
                                    if ($section_id !== false && $section_id = $this->getIBSectionId($section_field, $item_val, $section_id)) {
                                        $last_finded = $section_id;
                                    }
                                    else if ($section_field == 'NAME') {
                                        $arSectsForAdd[] = $item_val;
                                    }
                                }
                                // Create news sections hierarchy
                                if (!empty($arSectsForAdd)) {
                                    if ($this->arProfile['ACTIONS_SECTIONS_CREATE'] == 'Y') {
                                        $this->createSectionsHierarchy($arSectsForAdd, $arIBFields["IBLOCK_ID"], $last_finded, $arIBFields['IBLOCK_SECTION']);
                                    }
                                }
                                else {
                                    $arIBFields['IBLOCK_SECTION'][] = $last_finded;
                                }
                            }
                        }
                        else {
                            if ($section_id = $this->getIBSectionId($section_field, $value)) {
                                $arIBFields['IBLOCK_SECTION'][] = $section_id;
                            }
                            else {
                                // Only for single value field
                                $arSectFields[$section_field] = $value;
                            }
                        }
                    }
                }
                // Section params
                elseif (strpos($this->arFieldsMap[$k], 'CATEG_PARAMS_') === 0) {
                    $arAUCategory[] = $this->modifValueByParams($this->arFieldsMap[$k], $k);
                }
                // SEO
                elseif (strpos($this->arFieldsMap[$k], 'SEO_') === 0) {
                    if (isset($this->arFieldsNameRepl[$this->arFieldsMap[$k]])) {
                        $arIBFields['IPROPERTY_TEMPLATES'][$this->arFieldsNameRepl[$this->arFieldsMap[$k]]] = $this->modifValueByParams($value, $k);
                    }
                }
                // Price
                elseif (strpos($this->arFieldsMap[$k], 'PRICE_') === 0) {
                    $arPrice = array(
                        "CATALOG_GROUP_ID" => explode(self::KEY_DELIMITER, $this->arFieldsMap[$k])[1],
                        "PRICE" => $this->modifValueByParams($value, $k)
                    );
                    if ($this->arFieldsParams[$k]['price_vatincl']) {
                        $arItemProduct['VAT_INCLUDED'] = $this->arFieldsParams[$k]['price_vatincl'];
                    }
                    $arItemPrices[] = $arPrice;
                }
                // Store
                elseif (strpos($this->arFieldsMap[$k], 'STORE_') === 0) {
                    $arItemStores[] = array(
                        "STORE_ID" => explode(self::KEY_DELIMITER, $this->arFieldsMap[$k])[1],
                        "AMOUNT" => $value,
                    );
                }
                // Offers
                elseif (strpos($this->arFieldsMap[$k], 'OFFER_') === 0) {
                    $find_field = false;
                    if (strpos($this->arFieldsMap[$k], 'OFFER_PARENT_XML_ID') === 0) {
                        $find_field = 'XML_ID';
                    }
                    elseif (strpos($this->arFieldsMap[$k], 'OFFER_PARENT_CODE') === 0) {
                        $find_field = 'CODE';
                    }
                    elseif (strpos($this->arFieldsMap[$k], 'OFFER_PARENT_NAME') === 0) {
                        $find_field = 'NAME';
                    }
                    elseif (strpos($this->arFieldsMap[$k], 'OFFER_PARENT_ID') === 0) {
                        $find_field = 'ID';
                    }
                    if ($find_field && $this->arIBlockData['OFFERS']['PRODUCT_IBLOCK_ID']) {
                        $arFilter = [
                            'IBLOCK_ID' => $this->arIBlockData['OFFERS']['PRODUCT_IBLOCK_ID'],
                            $find_field => $value,
                        ];
                        $res = \CIBlockElement::GetList(array('ID' => 'asc'), $arFilter, false, false, ['ID']);
                        if ($obItem = $res->GetNextElement()) {
                            $arIBItem = $obItem->GetFields();
                            $offer_item_id = $arIBItem['ID'];
                        }
                    }
                    if ($offer_item_id) {
                        // Find prop with sku link
                        $sku_prop_id = false;
                        foreach ($this->arIBlockData['PROPS'] as $prop_id => $arProp) {
                            if ($arProp['USER_TYPE'] == 'SKU') {
                                $sku_prop_id = $prop_id;
                            }
                        }
                        if ($sku_prop_id) {
                            $arIBPropValues[$sku_prop_id] = $offer_item_id;
                        }
                    }
                }
                // Product quantity
                elseif ($this->arFieldsMap[$k] == 'QUANTITY') {
                    $arItemProduct['QUANTITY'] = intval($this->modifValueByParams($value, $k));
                }
                // Main fields
                else {
//                    // Fields
//                    switch ($this->arFieldsMap[$k]) {
//                        case 'DATE_ACTIVE_FROM':
//                        case 'DATE_ACTIVE_TO':
//                            $value = $value;
//                            break;
//                    }
                    if ($ib_item_id && $this->arFieldsParams[$k]['not_empty'] == 'Y' && $arIBItem[$this->arFieldsMap[$k]]) {
                        continue;
                    }
                    if ($this->arFieldsMap[$k] == "PREVIEW_PICTURE" || $this->arFieldsMap[$k] == "DETAIL_PICTURE") {
                    	// Prepare modifications of path
	                    $value = $this->modifValueByParams($value, $k);
                        // If there is enabled to process the image and do not use the information block settings
                        if ($this->arFieldsParams[$k]["work_picture"]["checked"] == "Y" && $this->arProfile['ACTIONS_IB_IMG_MODIF'] != 'Y') {
                            // If can't create a new picture and can't return image path
                            if (!$path = $this->modifPictureByParams($this->arProfile["IMGS_SOURCE_PATH"] . $value, $k)) {
                                // Get old picture
                                $path = $this->arProfile["IMGS_SOURCE_PATH"] . $value;
                            }
                        }
                        else {
                            $path = $this->arProfile["IMGS_SOURCE_PATH"] . $value;
                        }
                        if ($path) {
	                        $extension = $this->arFieldsParams[$k]["work_picture"]["file_extension"] ? $this->arFieldsParams[$k]["work_picture"]["file_extension"] : false;
                            if ($url_path = $this->getServerFile($path, $extension)) {
                                $path = $url_path;
                                $arTmpFiles[] = $url_path;
                            }
                            $arIBFields[$this->arFieldsMap[$k]] = \CFile::MakeFileArray($path);
                        }
                    }
                    elseif ($this->arFieldsMap[$k] == "PREVIEW_TEXT" || $this->arFieldsMap[$k] == "DETAIL_TEXT") {
                        $arIBFields[$this->arFieldsMap[$k]] = $this->modifValueByParams($value, $k);
                        // TODO: Add option
                        $arIBFields[$this->arFieldsMap[$k] . '_TYPE'] = 'html';
                    }
                    else {
	                    $arIBFields[$this->arFieldsMap[$k]] = $this->modifValueByParams($value, $k);
                    }
                }
            }
        }
        // Modifications
        if (!$arIBFields['CODE'] && !$ib_item_id && $arIBFields['NAME']) {
            $arIBFields['CODE'] = $this->getElementCode($arIBFields['NAME']);
        }
        // Fill data of modified section
        if (count($arAUCategory) > 0) {
            // Fill the fields
            foreach ($arAUCategory as $fld_name) {
                if (isset($this->arFieldsNameRepl[$fld_name]) && $this->arFieldsNameRepl[$fld_name]) {
                    $value = $arInputRow[array_search($fld_name, $this->arFieldsMap)];
                    if ($value) {
                        if ($fld_name == "CATEG_PARAMS_IMAGE" || $fld_name == "CATEG_PARAMS_PICTURE") {
                            if ($this->arFieldsParams[$k]["work_picture"]["checked"] == "Y" && $this->arProfile['ACTIONS_IB_IMG_MODIF'] != "Y") {
                                if (!$path = $this->modifPictureByParams($value, $k)) {
                                    $path = $this->arProfile["IMGS_SOURCE_PATH"] . $value;
                                }
                            }
                            else {
                                $path = $this->arProfile["IMGS_SOURCE_PATH"] . $value;
                            }
                            $arSectFields[$this->arFieldsNameRepl[$fld_name]] = \CFile::MakeFileArray($path);
                        }
                        else {
                            $arSectFields[$this->arFieldsNameRepl[$fld_name]] = $value;
                        }
                    }
                }
            }
        }

	    $bUpdateSearch = $this->searchModuleIndexingEnabled();

        // Add or update modified section
        if (!empty($arSectFields)) {
            // Find section by info for section create|update
            if ($arSectFields['ID']) {
                $section_id = $this->getIBSectionId('ID', $arSectFields['ID']);
            }
            elseif ($arSectFields['CODE']) {
                $section_id = $this->getIBSectionId('CODE', $arSectFields['CODE']);
            }
            elseif ($arSectFields['NAME']) {
                $section_id = $this->getIBSectionId('NAME', $arSectFields['NAME']);
            }
            elseif ($arSectFields['XML_ID']) {
                $section_id = $this->getIBSectionId('XML_ID', $arSectFields['XML_ID']);
            }
            $bs = new \CIBlockSection;
            if ($section_id) {
                $res = $bs->Update($section_id, $arSectFields);
            }
            elseif ($this->arProfile['ACTIONS_SECTIONS_CREATE'] == 'Y' && $arSectFields['NAME']) {
                if (!$arSectFields['CODE'] && $arSectFields['NAME']) {
                    $arSectFields['CODE'] = $this->getSectionCode($arSectFields['NAME']);
                }
                $arSectFields["IBLOCK_ID"] = $arIBFields["IBLOCK_ID"];
                $section_id = $bs->Add($arSectFields, true, $bUpdateSearch);
                if ($section_id) {
                    $this->addIBSectionsCache($section_id);
                }
                else {
                    $this->obLog->add(GetMessage("ACRIT_IMPORT_STROKA") . ' ' . $this->row_i . ' ('.$arIdentifier['key'].' = "'.$arIdentifier['value'].'"): [section] ' . $bs->LAST_ERROR, \Acrit\Import\Log::TYPE_ERROR);
                }
            }
            if ($section_id) {
                $arIBFields["IBLOCK_SECTION"][] = $section_id;
            }
        }

        // Adding to the IBlock
        $obIBItem = new \CIBlockElement();
        if ($arIBFields['IBLOCK_ID']) {
            // Option Iblock image modifications
            $ib_img_modif = $this->arProfile['ACTIONS_IB_IMG_MODIF'] == 'Y' ? true : false;
            // Update item
            if ($ib_item_id) {
                // Option of link by section
                if ($this->arProfile['ACTIONS_SECTIONS_LINK'] != 'all') {
                    unset($arIBFields["IBLOCK_SECTION"]);
                }
                // Update
                unset($arIBFields["CODE"]);
                $obIBItem->Update($ib_item_id, $arIBFields, false, $bUpdateSearch, $ib_img_modif);
            }
            // Add item
            else {
                if ($this->arProfile['ACTIONS_NEW_ELEMENTS'] == 'activate') {
                    $arIBFields['ACTIVE'] = 'Y';
                }
                else {
                    $arIBFields['ACTIVE'] = 'N';
                }
                // Option "Default section"
                if ((!$arIBFields["IBLOCK_SECTION"] || empty($arIBFields["IBLOCK_SECTION"])) && $this->arProfile['DEFAULT_SECTION_ID']) {
                    $arIBFields["IBLOCK_SECTION"][] = $this->arProfile['DEFAULT_SECTION_ID'];
                }
                // Option of link by section
                if ($this->arProfile['ACTIONS_SECTIONS_LINK'] == 'no') {
                    unset($arIBFields["IBLOCK_SECTION"]);
                }
                // Add
                $ib_item_id = $obIBItem->Add($arIBFields, false, $bUpdateSearch, $ib_img_modif);
            }

            if ($ib_item_id) {
                // Update properties
                if (!empty($arIBPropValues)) {
                    \CIBlockElement::SetPropertyValuesEx($ib_item_id, $arIBFields['IBLOCK_ID'], $arIBPropValues);
                }

	            static $catalogCheck;
	            if (Loader::includeModule('catalog')) {
		            if (! isset($catalogCheck[ $arIBFields['IBLOCK_ID'] ])) {
			            $catalogCheck[ $arIBFields['IBLOCK_ID'] ] = \Bitrix\Catalog\CatalogIblockTable::getById($arIBFields['IBLOCK_ID'])->fetch();
		            }
	            }
                if ($catalogCheck[ $arIBFields['IBLOCK_ID'] ]) {
                    // Create the product
                    $res = ProductTable::getList(array(
                        'filter' => array(
                            "ID" => $ib_item_id,
                        ),
                    ));
                    if (!$arProduct = $res->fetch()) {
                        $useStoreControl = (string)\Bitrix\Main\Config\Option::get('catalog', 'default_use_store_control') === 'Y';
                        $arFields = array(
                            'ID' => $ib_item_id,
                            'QUANTITY_TRACE' => ProductTable::STATUS_DEFAULT,
                            'CAN_BUY_ZERO' => ProductTable::STATUS_DEFAULT,
                            'WEIGHT' => 0,
                        );
                        if ($arItemProduct['VAT_INCLUDED'] == 'Y') {
                            $arFields['VAT_INCLUDED'] = 'Y';
                        }
                        if ($arItemProduct['QUANTITY']) {
                            $arFields['QUANTITY'] = $arItemProduct['QUANTITY'];
                        }
                        else {
	                        $arFields['QUANTITY'] = 0;
                        }
	                    $arFields['AVAILABLE'] = ProductTable::calculateAvailable($arFields);
                        ProductTable::add($arFields);
                    }
                    else {
                        $arFields = array(
	                        'QUANTITY_TRACE' => $arProduct['QUANTITY_TRACE'],
	                        'CAN_BUY_ZERO' => $arProduct['CAN_BUY_ZERO'],
                        );
	                    if ($arItemProduct['VAT_INCLUDED'] == 'Y') {
		                    $arFields['VAT_INCLUDED'] = 'Y';
	                    }
                        if (isset($arItemProduct['QUANTITY'])) {
                            $arFields['QUANTITY'] = $arItemProduct['QUANTITY'];
                        }
                        else {
	                        $arFields['QUANTITY'] = 0;
                        }
	                    $arFields['AVAILABLE'] = ProductTable::calculateAvailable($arFields);
                        if (!empty($arFields)) {
                            ProductTable::update($arProduct['ID'], $arFields);
                        }
                    }
                    // Updating the prices
                    if (is_array($arItemPrices)) {
                        foreach ($arItemPrices as $arPrice) {
                            $arFields = array(
                                "PRODUCT_ID" => $ib_item_id,
                                "CATALOG_GROUP_ID" => $arPrice["CATALOG_GROUP_ID"],
                                "PRICE" => $arPrice["PRICE"],
                                "PRICE_SCALE" => $arPrice["PRICE"],
                                "CURRENCY" => "RUB",
                            );
                            $res = \Bitrix\Catalog\PriceTable::getList(array(
                                'filter' => array(
                                    "PRODUCT_ID" => $ib_item_id,
                                    "CATALOG_GROUP_ID" => $arPrice["CATALOG_GROUP_ID"],
                                ),
                            ));
                            if ($arItem = $res->fetch()) {
                                $price_id = $arItem['ID'];
                                \Bitrix\Catalog\PriceTable::update($price_id, $arFields);
                            }
                            else {
                                \Bitrix\Catalog\PriceTable::add($arFields);
                            }
                        }
                        // Option deactivate if null
                        if ($this->arProfile['ACTIONS_PRICE_NULL'] == 'Y' && $arPrice["PRICE"] <= 0) {
                            $price = false;
                            $res = \Bitrix\Catalog\PriceTable::getList(array('filter' => array("PRODUCT_ID" => $ib_item_id)));
                            while ($arItem = $res->fetch()) {
                                if ($arItem['PRICE']) {
                                    $price = true;
                                }
                            }
                            if (!$price) {
                                $arIBFields = [
	                                'ACTIVE' => 'N',
                                ];
                                $obIBItem->Update($ib_item_id, $arIBFields, false, false);
                            }
                        }
                    }
                    // Updating the stores
                    if (is_array($arItemStores)) {
                        foreach ($arItemStores as $arIStore) {
                            $arFields = array(
                                "PRODUCT_ID" => $ib_item_id,
                                "STORE_ID" => $arIStore["STORE_ID"],
                            );
                            $rsStore = \CCatalogStoreProduct::GetList(array(), $arFields);
                            $arFields["AMOUNT"] = $arIStore["AMOUNT"];
                            if ($arStore = $rsStore->Fetch()) {
                                \CCatalogStoreProduct::Update($arStore["ID"], $arFields);
                            }
                            else {
                                \CCatalogStoreProduct::Add($arFields);
                            }
                        }
                        // Option deactivate if null
                        if ($this->arProfile['ACTIONS_AMOUNT_NULL'] == 'Y') {
                            $amount = 0;
                            $rsStore = \CCatalogStoreProduct::GetList(array(), array("PRODUCT_ID" => $ib_item_id));
                            while ($arStore = $rsStore->Fetch()) {
                                $amount += $arStore['AMOUNT'];
                            }
                            if ($amount == 0) {
                                $arIBFields = [
	                                'ACTIVE' => 'N',
                                ];
                                $obIBItem->Update($ib_item_id, $arIBFields, false, false);
                            }
                        }
                    }
                }
            }

            //TODO: What should it do, if has errors?
            if ($obIBItem->LAST_ERROR) {
                $arImpRes['errors'][] = $obIBItem->LAST_ERROR;
                $this->obLog->add(GetMessage("ACRIT_IMPORT_STROKA") . ' ' . $this->row_i . ' ('.$arIdentifier['key'].' = "'.$arIdentifier['value'].'"): ' . $obIBItem->LAST_ERROR, \Acrit\Import\Log::TYPE_ERROR);
            }
            else {
                $arImpRes['message'][] = $ib_item_id;
                $this->obLog->add('ID: ' . $ib_item_id, \Acrit\Import\Log::TYPE_SUCCESS);
            }
            $this->obLog->incImportStatParam('imported_items');
        }

        // Clear tmp files
        if (!empty($arTmpFiles)) {
            foreach ($arTmpFiles as $file_name) {
                unlink($file_name);
            }
        }

        return $arImpRes;
    }

	protected function searchModuleIndexingEnabled()
	{
		return \Bitrix\Main\Config\Option::get("acrit.import", "search_indexing") == 'Y';
	}

    protected function checkOtherItems() {
    }

    public function getProfile() {
        return $this->arProfile;
    }

	function mb_ucfirst($str, $encoding='UTF-8')
	{
		$str = mb_ereg_replace('^[\ ]+', '', $str);
		$str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
			mb_substr($str, 1, mb_strlen($str), $encoding);
		return $str;
	}
}
