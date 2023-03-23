<?php
//10.1.5
namespace Mcart\Xls\Spreadsheet;

use Bitrix\Currency\CurrencyManager;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Main\Localization\Loc;
use CCatalogProduct;
use CFile;
use CIBlockElement;
use COption;
use CPrice;
use CSearch;
use Mcart\Xls\Handler\Handlers;
use Mcart\Xls\Handler\Picture\Handler as PictureHandler;
use Mcart\Xls\Helpers\Event;
use Mcart\Xls\McartXls;
use Mcart\Xls\ORM\Profile\Column\CustomFieldsTable;
use Mcart\Xls\ORM\Profile\ColumnTable;
use Mcart\Xls\ORM\Profile\ConstTable;
use Mcart\Xls\ORM\ProfileTable;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;
use PhpOffice\PhpSpreadsheet\Worksheet\CellIterator;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use function AddToTimeStamp;
use function MakeTimeStamp;

Loc::loadMessages(__FILE__);

final class Import {
    const ERROR_PREF = 'Error spreadsheet import';
    const ERROR_CODE_PREF = 'SPREADSHEET_IMPORT';
    const EVENT__BEFORE_IMPORT_ELEMENT = 'onBeforeImportElement';
    const EVENT__AFTER_IMPORT_ELEMENT = 'onAfterImportElement';
    const EVENT__AFTER_IMPORT_STEP = 'onAfterImportStep';
    const EVENT__COMPLETE_IMPORT = 'onCompleteImport';

    /**
     * @var McartXls
     */
    private $obMcartXls;

    /**
     * @var Reader
     */
    private $obReader;

    private $arProfile;
    private $arDefaultValues = [
        ColumnTable::SAVE_IN_PREF__FIELD => [],
        ColumnTable::SAVE_IN_PREF__PROPERTY => [],
        ColumnTable::SAVE_IN_PREF__PRICE => [],
        ColumnTable::SAVE_IN_PREF__PRODUCT => [],
    ];
    private $arColumnsKeys = [];
    private $arColumnsByKeys = [];
    private $arPictures = [];
    private $processedRows = 0;
    private $addedElements = 0;
    private $updatedElements = 0;
    private $addedElementIds = [];
    private $updatedElementIds = [];
    private $isComplete = false;
    private $nextStartRow = false;
    private $arLog = [];
    private $arLogDebug = [];
    private $defaultQuantityTrace = 'N';
    private $arIblockProps = [];
    private $arHandlers = [];
    private $arItem = [];

    /**
     * @param int $profileId
     * @param int|string|array $file May contain ID of the file, absolute path, relative path, url or array as in $_FILES[name]
     */
    public function __construct($profileId, $file) {
        $this->obMcartXls = McartXls::getInstance();
        $profileId = intval($profileId);
        if ($profileId <= 0) {
            $this->obMcartXls->addError(
                Loc::getMessage('MCART_XLS_IMPORT_ERROR__PROFILE_ID_0'),
                self::ERROR_CODE_PREF.'#01'
            );
            return;
        }
        $this->arProfile = ProfileTable::getById($profileId)->fetch();
        $this->arProfile["TORG_PREDL"] = false;
        $this->arProfile['IDENTIFY_ELEMENT_SAVE_IN'] = [];
        if (empty($this->arProfile) || $this->arProfile['IBLOCK_ID'] <= 0) {
            $this->obMcartXls->addError(
                Loc::getMessage('MCART_XLS_IMPORT_ERROR__PROFILE_NOT_FOUND'),
                self::ERROR_CODE_PREF.'#02'
            );
            return;
        }
        $dbProps = PropertyTable::getList([
            'select' =>['ID', 'PROPERTY_TYPE', 'USER_TYPE', 'LINK_IBLOCK_ID'],
            'filter' => [
                '=IBLOCK_ID' => $this->arProfile['IBLOCK_ID'],
                '@PROPERTY_TYPE' => [PropertyTable::TYPE_LIST, PropertyTable::TYPE_ELEMENT]
            ]
        ]);
        while ($arProp = $dbProps->fetch()){
            if($arProp['PROPERTY_TYPE'] == PropertyTable::TYPE_LIST){
                $dbPropsEnum = PropertyEnumerationTable::getList([
                    'filter' => ['=PROPERTY_ID' => $arProp['ID']]
                ]);
                while ($arPropEnum = $dbPropsEnum->fetch()){
                    $arProp['EnumIdsByValues'][$arPropEnum['VALUE']] = $arPropEnum['ID'];
                }

            }
            elseif($arProp['USER_TYPE'] == 'SKU')
            {
                $this->arProfile["TORG_PREDL"] = ["ID"=>$arProp["ID"],
                    "IBLOCK_ID"=>$arProp["LINK_IBLOCK_ID"]];
            }
            elseif
            ($arProp['PROPERTY_TYPE'] == PropertyTable::TYPE_ELEMENT){
                if ($arProp['LINK_IBLOCK_ID'] <= 0) {
                    continue;
                }
                $dbElements = ElementTable::getList([
                    'select' => ['ID', 'IBLOCK_ID', 'NAME'],
                    'filter' => [
                        '=IBLOCK_ID' => $arProp['LINK_IBLOCK_ID'],
                        'ACTIVE' => 'Y'
                    ],
                    'limit' => 50,
                ]);
                while ($arElement = $dbElements->fetch()){
                    $arProp['IdsByNames'][mb_strtoupper($arElement['NAME'])] = $arElement['ID'];
                }
            }
            $this->arIblockProps[$arProp['ID']] = $arProp;
        }

        $obItems = ConstTable::getList(['filter' => ['PROFILE_ID' => $this->arProfile['ID']]]);
        while ($arItem = $obItems->fetch()) {
            $this->arDefaultValues[$arItem['SAVE_IN_PREF']][$arItem['SAVE_IN']] = $arItem['VALUE'];
        }
        $obItems = ColumnTable::getList(['filter' => ['PROFILE_ID' => $this->arProfile['ID']]]);
        while ($arItem = $obItems->fetch()) {
            if(!empty($arItem['HANDLER'])){
                $this->arHandlers[$arItem['HANDLER']] = $arItem['HANDLER'];
            }
            if($arItem['IS_IDENTIFY_ELEMENT']==='Y'){
                $arItem['DO_NOT_IMPORT_ROW_IF_EMPTY'] = 'Y';
                if($arItem['SAVE_IN_PREF']!='FIELD'){
                    $arItem['IDENTIFY_ELEMENT_SAVE_IN'] = $arItem['SAVE_IN_PREF'].'_';
                }
                $arItem['IDENTIFY_ELEMENT_SAVE_IN'] .= $arItem['SAVE_IN'];
                $this->arProfile['IDENTIFY_ELEMENT_SAVE_IN'][$arItem['IDENTIFY_ELEMENT_SAVE_IN']] =
                    $arItem['IDENTIFY_ELEMENT_SAVE_IN'];
            }
            $dbCustomFields = CustomFieldsTable::getList(['filter' => ['COLUMN_ID' => $arItem['ID']]]);
            while ($arCustomField = $dbCustomFields->fetch()) {
                $arItem['CUSTOM_FIELDS'][$arCustomField['NAME']] = $arCustomField['VALUE'];
            }
            $this->arColumnsKeys[$arItem['COLUMN']] = $arItem['COLUMN'];
            $this->arColumnsByKeys[$arItem['COLUMN']][$arItem['SAVE_IN_PREF'].'_'.$arItem['SAVE_IN']] = $arItem;
        }
        if (empty($this->arColumnsKeys)) {
            $this->obMcartXls->addError(
                Loc::getMessage('MCART_XLS_IMPORT_ERROR__PROFILE_COLUMNS_NOT_FOUND'),
                self::ERROR_CODE_PREF.'#03'
            );
            return;
        }
        if (empty($this->arProfile['IDENTIFY_ELEMENT_SAVE_IN'])) {
            $this->obMcartXls->addError(
                Loc::getMessage('MCART_XLS_IMPORT_ERROR__PROFILE_IDENTIFY_ELEMENT_NOT_FOUND'),
                self::ERROR_CODE_PREF.'#04'
            );
            return;
        }
        if(in_array('ID', $this->arProfile['IDENTIFY_ELEMENT_SAVE_IN'])){
            $this->arProfile['ONLY_UPDATE'] = 'Y';
        }
        if($this->obMcartXls->isExtensionLoaded('bitrix_module_catalog')){
            $this->defaultQuantityTrace = COption::GetOptionString(
                'catalog',
                'default_quantity_trace',
                $this->defaultQuantityTrace
            );
        }

        $this->obReader = new Reader($file, (empty($this->arHandlers)));
    }

    /**
     * @param int $startRow
     * @return array|false
     */
    public function exec($startRow = 0) {
        /* @var $obWorksheet Worksheet */
        if ($this->obMcartXls->hasErrors()) {
            $this->deleteOldFiles();
            return;
        }
        $this->processedRows = $startRow-$this->arProfile['START_ROW'];
        $obWorksheet = $this->obReader->getWorksheet(
            $startRow,
            $this->arProfile['QUANTITY_ELEMENTS_IMPORTED_PER_STEP'],
            null,
            $this->arProfile['END_ROW']
        );
        if (!$obWorksheet || $this->obMcartXls->hasErrors()) {
            $this->deleteOldFiles();
            return;
        }
        //[
        if(in_array(PictureHandler::getCode(), $this->arHandlers)){
            foreach ($obWorksheet->getDrawingCollection() as $drawing) {
                /* @var $drawing BaseDrawing */
                $coordinate = $drawing->getCoordinates();
                $this->arPictures[$coordinate]['coordinate'] = $coordinate;
                $this->arPictures[$coordinate]['name'] = $drawing->getName();
                if ($drawing instanceof MemoryDrawing) {
                    ob_start();
                    call_user_func(
                        $drawing->getRenderingFunction(),
                        $drawing->getImageResource()
                    );
                    $this->arPictures[$coordinate]['content'] = ob_get_contents();
                    ob_end_clean();
                    $this->arPictures[$coordinate]['extension'] = self::getExtensionByMimeType($drawing->getMimeType());
                    $this->arPictures[$coordinate]['filename'] = 'image.'.$this->arPictures[$coordinate]['extension'];
                } else {
                    $zipReader = fopen($drawing->getPath(),'r');
                    $this->arPictures[$coordinate]['content'] = '';
                    while (!feof($zipReader)) {
                        $this->arPictures[$coordinate]['content'] .= fread($zipReader,1024);
                    }
                    fclose($zipReader);
                    $this->arPictures[$coordinate]['extension'] = $drawing->getExtension();
                    $this->arPictures[$coordinate]['filename'] = $drawing->getFilename();
                }
            }
        }
        //]
        foreach ($obWorksheet->getRowIterator() as $row) {
            $rowIndex = $row->getRowIndex();
            if ($this->obReader->obReadFilter->isContinue($rowIndex)) {
                continue;
            }
            $this->importRow($rowIndex, $row->getCellIterator());
        }
        (new Event(
            $this->obMcartXls->getModuleID(),
            static::EVENT__AFTER_IMPORT_STEP,
            [
                'arProfile' => $this->arProfile,
                'arDefaultValues' => $this->arDefaultValues,
                'arColumnsKeys' => $this->arColumnsKeys,
                'arColumnsByKeys' => $this->arColumnsByKeys,
                'addedElementIds' => $this->addedElementIds,
                'updatedElementIds' => $this->updatedElementIds,
                'processedRows' => $this->processedRows
            ]
        ))->send();
        if($rowIndex === null || $this->obReader->obReadFilter->isComplete()){
            $this->isComplete = true;
            $this->arLog[] = Loc::getMessage('MCART_XLS_IMPORT_COMPLETED');
            if($this->obMcartXls->isExtensionLoaded('bitrix_module_search')){
                CSearch::ReIndexModule('iblock');
            }
            (new Event(
                $this->obMcartXls->getModuleID(),
                static::EVENT__COMPLETE_IMPORT,
                [
                    'arProfile' => $this->arProfile,
                    'arDefaultValues' => $this->arDefaultValues,
                    'arColumnsKeys' => $this->arColumnsKeys,
                    'arColumnsByKeys' => $this->arColumnsByKeys,
                    'processedRows' => $this->processedRows
                ]
            ))->send();
            $this->deleteOldFiles();
        }else{
            $this->nextStartRow = $rowIndex+1;
        }
    }

    private function processCell(&$arFilter, &$arF, &$isEmptyRow) {
        $this->arItem['arCell'] = Handlers::importCell(
            $this,
            $this->arItem['obCell'],
            $this->arItem['arCell'],
            $this->arItem['arItem']
        );
        $this->setValueForProp($this->arItem['arCell']['value_format']);
        if (
            $this->arItem['arItem']['DO_NOT_IMPORT_ROW_IF_EMPTY']==='Y' &&
            empty($this->arItem['arCell']['value_format'])
        ) {
            return false;
        }
        if($this->arItem['arItem']['IS_IDENTIFY_ELEMENT']=='Y'){
            $arFilter[$this->arItem['arItem']['IDENTIFY_ELEMENT_SAVE_IN']] = $this->arItem['arCell']['value_format'];
        }
        if(
            $this->arItem['arItem']['HANDLER']!==PictureHandler::getCode() ||
            !empty($this->arItem['arCell']['value_format'])
        ){
            $arF[$this->arItem['arItem']['SAVE_IN_PREF']][$this->arItem['arItem']['SAVE_IN']] =
                $this->arItem['arCell']['value_format'];
            $isEmptyRow = false;
        }
        return true;
    }

    private function setValueForProp($v) {
       $arProp = $this->arIblockProps[$this->arItem['arItem']['SAVE_IN']];
        if ($this->arProfile["TORG_PREDL"])
        {
            if ($this->arItem['arItem']['SAVE_IN'] == $this->arProfile["TORG_PREDL"]["ID"])
            {

                /*$hd = fopen(__DIR__."/_log2.txt", "a");
                fwrite($hd,print_r($this->arProfile["SKU_CODE"],1));
                fclose($hd);
                */
                $res = \CIBlockElement::GetList(array(),
                    array("IBLOCK_ID"=>$this->arProfile["TORG_PREDL"]["IBLOCK_ID"],
                        "CHECK_PERMISSIONS"=>"N",
                        "=PROPERTY_".$this->arProfile["SKU_CODE"]=>$v), false, false, array("ID", "IBLOCK_ID"));
                if ($arElement = $res->Fetch())
                {

                    $this->arItem['arCell']['value_format'] = (is_array($arElement)?$arElement['ID']:'');
                }

                return;
            }
        }
        if(
            $this->arItem['arItem']['SAVE_IN_PREF'] !== ColumnTable::SAVE_IN_PREF__PROPERTY ||
            !$arProp['ID']
        ){
            return;
        }
        if($arProp['PROPERTY_TYPE'] === PropertyTable::TYPE_LIST){
            $this->arItem['arCell']['value_format'] = (string)$arProp['EnumIdsByValues'][$v];
            return;
        }
        if($arProp['PROPERTY_TYPE'] !== PropertyTable::TYPE_ELEMENT){
            return;
        }
        $v2 = (string)$arProp['IdsByNames'][mb_strtoupper($v)];
        if (!empty($v2)) {
            $this->arItem['arCell']['value_format'] = $v2;
            return;
        }
        $arElement = ElementTable::getRow([
            'select' => ['ID', 'IBLOCK_ID', 'NAME'],
            'filter' => [
                '=IBLOCK_ID' => $arProp['LINK_IBLOCK_ID'],
                'ACTIVE' => 'Y',
                '=%NAME' => $v,
            ],
            'order' => ['SORT' => 'ASC'],
            'limit' => 1,
            'cache' => ['ttl' => 3600]
        ]);
        $this->arItem['arCell']['value_format'] = (is_array($arElement)?$arElement['ID']:'');
    }

    /**
     * @param int $rowIndex
     * @param CellIterator $cellIterator
     * @return null
     */
    private function importRow($rowIndex, $cellIterator) {
        global $APPLICATION;

        $this->processedRows++;
        if (empty($cellIterator)) {
            return;
        }
	
        $isCatalog = $this->obMcartXls->isExtensionLoaded('bitrix_module_catalog');
        $arF = $this->arDefaultValues;
        $arFilter = ['IBLOCK_ID' => $this->arProfile['IBLOCK_ID']];
        $isEmptyRow = true;
        $arCells = [];
        foreach ($cellIterator as $obCell) {
            /* @var $obCell Cell */
            if ($obCell === null) {
                continue;
            }
            $column = $obCell->getColumn();
            $arCells[$column] = $obCell;
            if(!in_array($column, $this->arColumnsKeys)){
                continue;
            }
            $arCell = [
                'value' => $obCell->getCalculatedValue(),
                'coordinate' => $obCell->getCoordinate(),
                'column' => $column,
            ];
            $arCell['value_format'] = $arCell['value'];
            foreach ($this->arColumnsByKeys[$column] as $arItem) {
                $this->arItem = [
                    'obCell' => $obCell,
                    'arCell' => $arCell,
                    'arItem' => $arItem,
                ];
                if($this->processCell($arFilter, $arF, $isEmptyRow) === false){
                    return;
                }
            }
        }
        if($isEmptyRow){
            return;
        }
        //--
        $arSelect = ['ID', 'IBLOCK_ID'];
        if($isCatalog){
            $arSelect[] = 'CATALOG_QUANTITY';
            $arSelect[] = 'CATALOG_QUANTITY_TRACE';
        }
        $dbElement = CIBlockElement::GetList([], $arFilter, false, ['nTopCount' => 1], $arSelect);
        $arElement = $dbElement->Fetch();
        $isNew = empty($arElement);
        if ($isNew && $this->arProfile['ONLY_UPDATE'] == 'Y') {
            return;
        }
        if($isNew){
            if($this->arProfile['IBLOCK_SECTION_ID_FOR_NEW'] > 0){
                $arF[ColumnTable::SAVE_IN_PREF__FIELD]['IBLOCK_SECTION_ID'] = $this->arProfile['IBLOCK_SECTION_ID_FOR_NEW'];
            }
            $arF[ColumnTable::SAVE_IN_PREF__FIELD]['ACTIVE'] = 'Y';
            if($isCatalog && empty($arF[ColumnTable::SAVE_IN_PREF__PRODUCT]['QUANTITY'])){
                $arF[ColumnTable::SAVE_IN_PREF__PRODUCT]['QUANTITY'] = 0;
            }
        }
        if(!$isCatalog || $isNew){
            $arElement['CATALOG_QUANTITY'] = 0;
            $arElement['CATALOG_QUANTITY_TRACE'] = $this->defaultQuantityTrace;
        }

        $issetElementFields = (!empty($arF[ColumnTable::SAVE_IN_PREF__FIELD]));
        if ($issetElementFields) {
            if($isCatalog && !$isNew){
                $basePrice = CPrice::GetBasePrice($arElement['ID'])['PRICE'];
            }
            if (key_exists('BASE_PRICE', $arF[ColumnTable::SAVE_IN_PREF__PRICE])) {
                $basePrice = $arF[ColumnTable::SAVE_IN_PREF__PRICE]['BASE_PRICE'];
            }
            $arCatalogProduct = array_merge(
                ['QUANTITY' => $arElement['CATALOG_QUANTITY'], 'QUANTITY_TRACE' => $arElement['CATALOG_QUANTITY_TRACE']],
                $arF[ColumnTable::SAVE_IN_PREF__PRODUCT]
            );
            if($this->arProfile['DEACTIVATE_IF_QUANTITY_0']=='Y' && $arCatalogProduct['QUANTITY'] <= 0 && $arCatalogProduct['QUANTITY_TRACE']=='Y'){
                $arF[ColumnTable::SAVE_IN_PREF__FIELD]['ACTIVE'] = 'N';
            }
            if($this->arProfile['DEACTIVATE_IF_PRICE_0']=='Y' && $basePrice <= 0){
                $arF[ColumnTable::SAVE_IN_PREF__FIELD]['ACTIVE'] = 'N';
            }
            if(
                $this->arProfile['ACTIVATE_IF_QUANTITY_AND_PRICE_NOT_0']=='Y' &&
                $basePrice > 0 &&
                ($arCatalogProduct['QUANTITY'] > 0 || $arCatalogProduct['QUANTITY_TRACE']!='Y')
            ){
                $arF[ColumnTable::SAVE_IN_PREF__FIELD]['ACTIVE'] = 'Y';
            }
            if($isNew && $this->arProfile['DEACTIVATE_IF_NEW']=='Y'){
                $arF[ColumnTable::SAVE_IN_PREF__FIELD]['ACTIVE'] = 'N';
            }
        }

        $obEvent = (new Event(
            $this->obMcartXls->getModuleID(),
            static::EVENT__BEFORE_IMPORT_ELEMENT,
            [
                'arFields' => $arF,
                'arProfile' => $this->arProfile,
                'arDefaultValues' => $this->arDefaultValues,
                'arColumnsKeys' => $this->arColumnsKeys,
                'arColumnsByKeys' => $this->arColumnsByKeys,
                'arCells' => $arCells,
                'ELEMENT_ID' => $arElement['ID']
            ]
        ));
        $obEvent->send();
        $arF = $obEvent->mergeFields($arF);
        if($obEvent->hasErrors()){
            return;
        }

        if($issetElementFields){
            $arFields = $arF[ColumnTable::SAVE_IN_PREF__FIELD];
            unset($arFields['ID']);
            if (!empty($arFields)) {
                $el = new CIBlockElement;
                if($isNew){
                    $arFields['IBLOCK_ID'] = $this->arProfile['IBLOCK_ID'];
                    $isSuccess = $arElement['ID'] = $el->Add($arFields, false, false, true);
                }else{
                    $isSuccess = $el->Update($arElement['ID'], $arFields, false, false, true);
                }
                if(!$isSuccess){
                    $this->arLog[] = '['.$rowIndex.'] '.$el->LAST_ERROR;
                    return;
                }
            }
        }
        if($arElement['ID'] <= 0){
            $this->arLog[] = '['.$rowIndex.'] Error "Element"';
            return;
        }

        if (!empty($arF[ColumnTable::SAVE_IN_PREF__PROPERTY])) {
            $flags = [];
            if($isNew){
                $flags['NewElement'] = $isNew;
            }
            //================================копать здесь ======================

            //  $arF[ColumnTable::SAVE_IN_PREF__PROPERTY][227] = 973;
            CIBlockElement::SetPropertyValuesEx(
                $arElement['ID'],
                $this->arProfile['IBLOCK_ID'],
                $arF[ColumnTable::SAVE_IN_PREF__PROPERTY],
                $flags
            );
        }

        if($isCatalog){
            if (!empty($arF[ColumnTable::SAVE_IN_PREF__PRODUCT])) {
			  $arF[ColumnTable::SAVE_IN_PREF__PRODUCT]['ID'] = $arElement['ID'];
				if(!CCatalogProduct::Add($arF[ColumnTable::SAVE_IN_PREF__PRODUCT])){
                    /*$err = $APPLICATION->GetException();
                    $this->arLog[] = '['.$rowIndex.'] Error "CatalogProduct"'.(empty($err)?'':': '.$err);
                    return;*/
				}
            }
            if (key_exists('BASE_PRICE', $arF[ColumnTable::SAVE_IN_PREF__PRICE])) {
                if (empty($arF[ColumnTable::SAVE_IN_PREF__PRICE]['BASE_PRICE_CURRENCY'])) {
                    $arF[ColumnTable::SAVE_IN_PREF__PRICE]['BASE_PRICE_CURRENCY'] = CurrencyManager::getBaseCurrency();
                }
                if(!CPrice::SetBasePrice(
                    $arElement['ID'],
                    $arF[ColumnTable::SAVE_IN_PREF__PRICE]['BASE_PRICE'],
                    $arF[ColumnTable::SAVE_IN_PREF__PRICE]['BASE_PRICE_CURRENCY']
                )){
                    $err = $APPLICATION->GetException();
                    $this->arLog[] = '['.$rowIndex.'] Error "SetBasePrice"'.(empty($err)?'':': '.$err);
                    return;
                }
            }
        }

        if($isNew){
            $this->addedElements++;
            $this->addedElementIds[$arElement['ID']] = $arElement['ID'];
        }else{
            $this->updatedElements++;
            $this->updatedElementIds[$arElement['ID']] = $arElement['ID'];
        }

        (new Event(
            $this->obMcartXls->getModuleID(),
            static::EVENT__AFTER_IMPORT_ELEMENT,
            [
                'arFields' => $arF,
                'arProfile' => $this->arProfile,
                'arDefaultValues' => $this->arDefaultValues,
                'arColumnsKeys' => $this->arColumnsKeys,
                'arColumnsByKeys' => $this->arColumnsByKeys,
                'arCells' => $arCells,
                'ELEMENT_ID' => $arElement['ID']
            ]
        ))->send();
    }

    public function isComplete() {
        return $this->isComplete;
    }

    public function getNextStartRow() {
        return $this->nextStartRow;
    }

    public function getProcessedRows() {
        return $this->processedRows;
    }

    public function getAddedElements() {
        return $this->addedElements;
    }

    public function getUpdatedElements() {
        return $this->updatedElements;
    }

    public function getLogArray() {
        return $this->arLog;
    }

    public function getLogString() {
        return implode('<br />', $this->arLog);
    }

    public function getLogDebugArray() {
        return $this->arLogDebug;
    }

    private static function getExtensionByMimeType($mimeType){
        switch ($mimeType) {
            case MemoryDrawing::MIMETYPE_PNG :
                return 'png';
            case MemoryDrawing::MIMETYPE_GIF:
                return 'gif';
            case MemoryDrawing::MIMETYPE_JPEG :
                return 'jpg';
        }
    }

    public function getPictures() {
        return $this->arPictures;
    }

    public function pictureMakeFileArray($coordinate) {
        if (empty($this->arPictures[$coordinate]['filename']) || empty($this->arPictures[$coordinate]['content'])) {
            return false;
        }
        $this->arPictures[$coordinate]['fileHandle'] = tmpfile();
        fwrite($this->arPictures[$coordinate]['fileHandle'], $this->arPictures[$coordinate]['content']);
        $path = stream_get_meta_data($this->arPictures[$coordinate]['fileHandle'])['uri'];
        $this->arPictures[$coordinate]['arFile'] = CFile::MakeFileArray($path);
        if (empty($this->arPictures[$coordinate]['arFile'])) {
            return false;
        }
        $this->arPictures[$coordinate]['arFile']['name'] = $this->arPictures[$coordinate]['filename'];
        return true;
    }

    private function deleteOldFiles() {
		if(!is_object($this->obReader)){
			return;
		}
        $fileId = $this->obReader->getFile()['ID'];
        if($fileId <= 0){
            return;
        }
        $timestamp = AddToTimeStamp(array('DD' => -1));
        $dbFile = CFile::GetList([], ['MODULE_ID' => McartXls::getModuleID()]);
        while($arDbFile = $dbFile->GetNext()){
            if(
                $arDbFile['ID'] == $fileId ||
                empty($arDbFile['TIMESTAMP_X']) ||
                MakeTimeStamp($arDbFile['TIMESTAMP_X']) < $timestamp
            ){
                CFile::Delete($arDbFile['ID']);
            }
        }
    }

    public function __destruct() {
        foreach ($this->arPictures as $arPicture) {
            if($arPicture['fileHandle']){
                fclose($arPicture['fileHandle']);
            }
        }
    }

}