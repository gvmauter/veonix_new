<?php

namespace Mcart\Xls\Admin;

use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\TypeLanguageTable as IblockTypeLanguageTable;
use Bitrix\Main\Application;
use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use CAdminTabControl;
use CFile;
use COption;
use Exception;
use Mcart\Xls\McartXls;
use Mcart\Xls\ModuleOptions;
use Mcart\Xls\ORM\Profile\ConstTable;
use Mcart\Xls\ORM\ProfileTable;
use Mcart\Xls\Spreadsheet\Reader as Spreadsheet_Reader;
use const LANGUAGE_ID;
use function LocalRedirect;

Loc::loadMessages(__FILE__);

final class ProfileEdit extends ProfileBase {

    protected $fileName = 'mcart_xls_profile_edit.php';

    private function checkOptions() {
        if(!$this->isSimpleInterface){
            return;
        }
        $moduleId = McartXls::getModuleID();
        foreach (ModuleOptions::getOptions() as $arOption) {
            $this->arProfileForForm[$arOption['FIELD']] = COption::GetOptionString(
                $moduleId, ModuleOptions::OPTION_PREF.$arOption['FIELD']
            );
        }
        if($this->arProfileForForm['IBLOCK_ID']>0){
            $this->arProfileForForm['IBLOCK_TYPE_ID'] = $this->arIBlockTypesByIds[$this->arProfileForForm['IBLOCK_ID']];
        }
    }

    public function prolog() {
        global $APPLICATION;
        $pref = (string)McartXls::getRequestPref();
        $this->entityProfile = ProfileTable::getEntity();
        $this->entityProfileConst = ConstTable::getEntity();
        $isPost = $this->obRequest->isPost();
        if($isPost){
            $this->profileId = (int)$this->obRequest->getPost($this->getFieldName('ID'));
        }else{
            $this->profileId = (int)$this->obRequest->getQuery('ID');
        }
        if($this->profileId <= 0){
            $this->profileId = 0;
        }
        if($this->profileId){
            $this->arProfile = ProfileTable::getById($this->profileId)->fetch();
            $this->arProfile['FILE'] = (string)$this->arProfile['FILE'];
        }
        if (empty($this->arProfile)){
            $this->profileId = 0;
        }else{
            $this->arProfileForForm = $this->arProfile;
            if(!$isPost){
                $dbItems = ConstTable::getList(['filter' => ['PROFILE_ID' => $this->profileId]]);
                $i = -1;
                while ($ar = $dbItems->fetch()) {
                    $i++;
                    $this->arProfileForForm['CONST_ID'][$i] = $ar['ID'];
                    $this->arProfileForForm['CONST_CODE'][$i] = $ar['SAVE_IN_PREF'].'_'.$ar['SAVE_IN'];
                    $this->arProfileForForm['CONST_VALUE'][$i] = $ar['VALUE'];
                }
            }
        }
        //--
        $this->tabControl = new CAdminTabControl(
            $this->tabName,
            [
                [
                    "DIV" => "profile_edit",
                    "TAB" => Loc::getMessage("MCART_XLS_PROFILE")
                ],
                [
                    "DIV" => "profile_columns",
                    "TAB" => Loc::getMessage('MCART_XLS_PROFILE_COLUMNS'),
                    "ONSELECT" => 'javascript:window.location.href="'.$this->getUrlProfileColumns().'"',
                ],
                [
                    "DIV" => "profile_import",
                    "TAB" => Loc::getMessage('MCART_XLS_TO_IMPORT'),
                    "ONSELECT" => 'javascript:window.location.href="'.$this->getUrlProfileImport().'"',
                ],
            ],
            false
        );
        if($this->profileId){
            $title = Loc::getMessage("MCART_XLS_PROFILE_EDIT_TITLE").' "'.$this->arProfile['NAME'].'"';
        }else{
            $title = Loc::getMessage("MCART_XLS_PROFILE_NEW_TITLE");
        }
        $title .= ' - '.Loc::getMessage("MCART_XLS_TITLE");
        $APPLICATION->SetTitle($title);
        //--
        $dbResult = IblockTypeLanguageTable::getList([
            'select' => ['IBLOCK_TYPE_ID', 'NAME'],
            'filter' => ['LANGUAGE_ID' => LANGUAGE_ID],
            'order' => ['NAME' => 'ASC']
        ]);
        while ($arItem = $dbResult->fetch()) {
            $this->arIBlocksByTypes[$arItem['IBLOCK_TYPE_ID']]['IBLOCK_TYPE_ID'] = $arItem['IBLOCK_TYPE_ID'];
            $this->arIBlocksByTypes[$arItem['IBLOCK_TYPE_ID']]['IBLOCK_TYPE_NAME'] = $arItem['NAME'];
            if(!$isPost && !$this->profileId){
                $this->arProfileForForm['IBLOCK_TYPE_ID'] = $arItem['IBLOCK_TYPE_ID'];
            }
        }
        $dbResult = IblockTable::getList([
            'select' => ['ID', 'IBLOCK_TYPE_ID', 'NAME'],
            'filter' => ['ACTIVE' => 'Y'],
            'order' => ['NAME' => 'ASC']
        ]);
        while ($arItem = $dbResult->fetch()) {
            $this->arIBlocksByTypes[$arItem['IBLOCK_TYPE_ID']]['IBlocks'][] = $arItem;
            $this->arIBlockTypesByIds[$arItem['ID']] = $arItem['IBLOCK_TYPE_ID'];
        }
        if($this->arProfileForForm['IBLOCK_ID']>0){
            $this->arProfileForForm['IBLOCK_TYPE_ID'] = $this->arIBlockTypesByIds[$this->arProfileForForm['IBLOCK_ID']];
        }elseif(!empty($this->arIBlocksByTypes)){
            $arIBlockType = reset($this->arIBlocksByTypes);
            $this->arProfileForForm['IBLOCK_TYPE_ID'] = $arIBlockType['IBLOCK_TYPE_ID'];
            $this->arProfileForForm['IBLOCK_ID'] = reset($arIBlockType['IBlocks']['ID']);
        }

        $FIELD = 'QUANTITY_ELEMENTS_IMPORTED_PER_STEP';
        if (empty($this->arProfileForForm[$FIELD])) {
            $this->arProfileForForm[$FIELD] = $this->getProfileFieldDefaultValue($FIELD);
        }
        $FIELD = 'START_ROW';
        if ($this->arProfileForForm[$FIELD]<=0) {
            $this->arProfileForForm[$FIELD] = $this->getProfileFieldDefaultValue($FIELD);
        }
        $FIELD = 'HEADER_ROW';
        if ($this->arProfileForForm[$FIELD]<=0) {
            $this->arProfileForForm[$FIELD] = $this->getProfileFieldDefaultValue($FIELD);
        }

        if(!$isPost){
            $this->checkOptions();
            return;
        }
        $prefLen = strlen($pref);
        foreach ($this->obRequest->getPostList() as $k => $v) {
            $part1 = substr($k, 0, $prefLen);
            if($part1 !== $pref){
                continue;
            }
            $part2 = substr($k, $prefLen);
            $this->arProfileForForm[$part2] = $v;
        }
        $FIELD = 'START_ROW';
        $this->arProfileForForm[$FIELD] = intval($this->arProfileForForm[$FIELD]);
        if ($this->arProfileForForm[$FIELD]<=0) {
            $this->arProfileForForm[$FIELD] = $this->getProfileFieldDefaultValue($FIELD);
        }
        $FIELD = 'HEADER_ROW';
        $this->arProfileForForm[$FIELD] = intval($this->arProfileForForm[$FIELD]);
        if ($this->arProfileForForm[$FIELD]<=0) {
            $this->arProfileForForm[$FIELD] = $this->arProfileForForm['START_ROW'];
        }
        $this->loadFile();
        $this->checkOptions();
        $this->saveProfile();
    }

    private function loadFile() {
        $FIELD_FILE = 'FILE';
        $this->arFile = $this->obRequest->getFile(McartXls::getRequestPref().$FIELD_FILE);
        $post = $this->arProfileForForm[$FIELD_FILE];
        if((!$arFile || $arFile['error']>0) && !empty($post)){
            $this->arFile = CFile::MakeFileArray($post);
        }
        if (empty($this->arFile)) {
            return;
        }
    }

    private function getFileHeaders() {
        $arHeaders = [];
        if (empty($this->arFile)) {
            return $arHeaders;
        }
        $obSpreadsheetReader = new Spreadsheet_Reader($this->arFile);
        $arSheet = $obSpreadsheetReader->read($this->arProfileForForm['HEADER_ROW'], 1, $this->arProfileForForm['HEADER_ROW']);
        if(!is_array($arSheet)){
            McartXls::getInstance()->showErrors();
            return $arHeaders;
        }
        if (!is_array($arSheet[$this->arProfileForForm['HEADER_ROW']])) {
            return $arHeaders;
        }
        foreach ($arSheet[$this->arProfileForForm['HEADER_ROW']] as $arCell) {
            $arHeaders[$arCell['column']] = $arCell['value_format'];
        }
        return $arHeaders;
    }

    public function saveProfile() {
        if(!$this->obRequest->isPost()){
            return;
        }
        /* @var $obMcartXls McartXls */
        $obMcartXls = McartXls::getInstance();
        $arFields = [];
        foreach ($this->entityProfile->getFields() as $obField) {
            $fieldName = $obField->getName();

            if($fieldName == 'ID' || ($obField instanceof Entity\ReferenceField)){
                continue;
            }
            if($fieldName == 'FILE_HEADERS'){
                $arFields[$fieldName] = $this->getFileHeaders();
                continue;
            }
            $arFields[$fieldName] = (string)$this->arProfileForForm[$fieldName];
            if($arFields[$fieldName] == '' && ($obField instanceof Entity\BooleanField)){
                $arFields[$fieldName] = 'N';
            }
        }

        $conn = Application::getConnection();
        $conn->startTransaction();
        try {
            if($this->profileId){
                //========================= for save SKU_CODE to profile
                $result = ProfileTable::update($this->profileId, $arFields);
            }else{
                $result = ProfileTable::add($arFields);
            }
            if (!$result->isSuccess()) {
                $obMcartXls->addErrors($result->getErrors());
                throw new Exception;
            }
            $this->profileId = $result->getId();
            $this->arProfile['ID'] = $this->profileId;
            $this->arProfileForForm['ID'] = $this->profileId;
            if(!$this->saveConsts()){
                throw new Exception;
            }
            $conn->commitTransaction();
            if(!empty($this->obRequest->getPost('save'))){
                LocalRedirect('mcart_xls_index.php');
            }
            return true;
        } catch(\Throwable $e) {
            $obMcartXls->addError($obMcartXls->getErrorMessage($e));
        } catch(\Exception $e) {
            $obMcartXls->addError($obMcartXls->getErrorMessage($e));
        }
        $conn->rollbackTransaction();
        return false;
    }

    private function saveConsts() {
        if(!is_array($this->arProfileForForm['CONST_CODE']) || empty($this->arProfileForForm['CONST_CODE'])){
            $dbItems = ConstTable::getList(['select' => ['ID'], 'filter' => ['PROFILE_ID' => $this->profileId]]);
            while ($ar = $dbItems->fetch()) {
                ConstTable::delete($ar['ID']);
            }
            return true;
        }
        $oldIds = [];
        $newIds = [];
        $dbItems = ConstTable::getList(['select' => ['ID'], 'filter' => ['PROFILE_ID' => $this->profileId]]);
        while ($ar = $dbItems->fetch()) {
            $oldIds[$ar['ID']] = $ar['ID'];
        }
        foreach ($this->arProfileForForm['CONST_CODE'] as $k => $v) {
            $v = trim((string)$v);
            if (empty($v)) {
                continue;
            }
            $arSaveIn = explode('_', $v);
            $ID = intval($this->arProfileForForm['CONST_ID'][$k]);
            $arFields = [
                'PROFILE_ID' => $this->profileId,
                'SAVE_IN_PREF' => array_shift($arSaveIn),
                'SAVE_IN' => implode('_', $arSaveIn),
                'VALUE' => (string)$this->arProfileForForm['CONST_VALUE'][$k],
            ];
            if($ID && in_array($ID, $oldIds)){
                $result = ConstTable::update($ID, $arFields);
            }else{
                $result = ConstTable::add($arFields);
            }
            if (!$result->isSuccess()) {
                McartXls::getInstance()->addErrors($result->getErrors());
                return false;
            }
            $ID = $result->getId();
            $newIds[$ID] = $ID;
        }
        if (empty($newIds)) {
            $dbItems = ConstTable::getList(['select' => ['ID'], 'filter' => ['PROFILE_ID' => $this->profileId]]);
        }else{
            $dbItems = ConstTable::getList(['select' => ['ID'], 'filter' => ['PROFILE_ID' => $this->profileId, '!@ID' => $newIds]]);
        }
        while ($ar = $dbItems->fetch()) {
            ConstTable::delete($ar['ID']);
        }
        return true;
    }

    public function getFormAction(){
        $s = $this->fileName;
        if($this->profileId){
            $s .= '?ID='.$this->profileId;
        }
		return $s;
	}

    public function getFieldName($field) {
        return McartXls::getRequestPref().filter_var($field);
    }

    public function getProfileFieldTitle($FIELD) {
        return $this->entityProfile->getField($FIELD)->getTitle();
    }
    public function getProfileFieldDefaultValue($FIELD) {
        return $this->entityProfile->getField($FIELD)->getDefaultValue();
    }

    public function getProfileFieldValues($FIELD) {
        $ar = $this->entityProfile->getField($FIELD)->getValues();
        return (is_array($ar)? array_flip($ar) : []);
    }

    public function getColumnsForConst() {
        return $this->getIblockColumns(true);
    }

}
