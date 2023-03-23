<?php
namespace Mcart\Xls\Ajax;

use Bitrix\Iblock\PropertyTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Localization\Loc;
use Exception;
use Mcart\Xls\Handler\Handlers;
use Mcart\Xls\McartXls;
use Mcart\Xls\ORM\Profile\Column\CustomFieldsTable;
use Mcart\Xls\ORM\Profile\ColumnTable;
use Mcart\Xls\Spreadsheet\Import;
use Bitrix\Main\Entity\Field;
use Mcart\Xls\Helpers\Html;

Loc::loadMessages(__FILE__);

abstract class Actions {

    protected function execActionGetPropertiesAndSections() {
        $IBLOCK_ID = intval($this->obRequest->getPost($this->requestPref.'IBLOCK_ID'));
        $this->arResult[$this->requestPref.'IBLOCK_ID'] = $IBLOCK_ID;
        if($IBLOCK_ID <= 0){
            return false;
        }
        $this->arResult['RESULT'] = 1;
        $dbProps = PropertyTable::getList([
            'order'  => ['NAME' => 'ASC'],
            'select' => ['ID', 'NAME', 'PROPERTY_TYPE'],
            'filter' => [
                '=IBLOCK_ID' => $IBLOCK_ID,
                '@PROPERTY_TYPE' => [PropertyTable::TYPE_STRING, PropertyTable::TYPE_NUMBER]
            ]
        ]);
        while ($arProp = $dbProps->fetch()){
            $this->arResult['PROPERTIES'][] = ['ID' => $arProp['ID'], 'NAME' => '['.$arProp['ID'].'] '.$arProp['NAME']];
        }
        $dbSections = SectionTable::getList([
            'order'  => ['LEFT_MARGIN' => 'ASC'],
            'select' => ['ID', 'NAME', 'DEPTH_LEVEL'],
            'filter' => ['=IBLOCK_ID' => $IBLOCK_ID]
        ]);
        while ($arSection = $dbSections->fetch()){
            $NAME_PREF = '';
            if($arSection['DEPTH_LEVEL'] > 1){
                $NAME_PREF .= str_repeat("&nbsp;.", ($arSection['DEPTH_LEVEL']-1)).'&nbsp;';
            }
            $this->arResult['SECTIONS'][] = [
                'ID' => $arSection['ID'],
                'NAME' => $NAME_PREF.'['.$arSection['ID'].'] '.$arSection['NAME']
            ];
        }
        return true;
    }

    protected function execActionImport() {
        /* @var $obMcartXls McartXls */
        $profileId = intval($this->obRequest->getPost($this->requestPref.'PROFILE_ID'));
        $file = intval($this->obRequest->getPost($this->requestPref.'FILE_ID'));
        $startRow = intval($this->obRequest->getPost($this->requestPref.'START_ROW'));
        $this->arResult['RESULT'] = 0;
        $this->arResult['ERRORS'] = '';
        $this->arResult['isComplete'] = null;
        $this->arResult['nextStartRow'] = false;
        $this->arResult['log'] = '';
        $this->arResult['processedRows'] = 0;
        $this->arResult['addedElements'] = 0;
        $this->arResult['updatedElements'] = 0;
        if($profileId <= 0 || $file <= 0){
            $this->arResult['RESULT'] = 0;
            $this->arResult['ERRORS'] = 'Error params';
            $this->arResult['params'] = [$profileId, $file, $startRow];
            return false;
        }
        try {
            $obMcartXls = McartXls::getInstance();
        } catch(\Throwable $e) {
            $this->arResult['ERRORS'] .= 'Error McartXls instance';
            return;
        } catch(Exception $e) {
            $this->arResult['ERRORS'] .= 'Error McartXls instance';
            return;
        }
        try{
            $obImport = new Import($profileId, $file);
            $obImport->exec($startRow);
            $this->arResult['isComplete'] = $obImport->isComplete();
            $this->arResult['nextStartRow'] = $obImport->getNextStartRow();
            $this->arResult['arLogDebug'] = $obImport->getLogDebugArray();
            $this->arResult['log'] = $obImport->getLogString();
            $this->arResult['processedRows'] = $obImport->getProcessedRows();
            $this->arResult['addedElements'] = $obImport->getAddedElements();
            $this->arResult['updatedElements'] = $obImport->getUpdatedElements();
            if(!$obMcartXls->hasErrors()){
                $this->arResult['RESULT'] = 1;
            }else{
                foreach ($obMcartXls->getErrors() as $obError) {
                    $this->arResult['ERRORS'] .= '['.$obError->getCode().'] '.$obError->getMessage();
                }
            }
        } catch(\Throwable $e) {
            $this->arResult['ERRORS'] .= $obMcartXls->getErrorMessage($e, 'Error import');
        } catch(Exception $e) {
            $this->arResult['ERRORS'] .= $obMcartXls->getErrorMessage($e, 'Error import');
        }
    }

    protected function execActionGetCustomFields() {
        $profileColumnId = intval($this->obRequest->getPost($this->requestPref.'PROFILE_COLUMN_ID'));
        $handlerCode = (string)filter_input(INPUT_POST, $this->requestPref.'HANDLER');
        $this->arResult['items'] = [];
        $this->arResult['html'] = '';
        $this->arResult['RESULT'] = 0;
        if($profileColumnId > 0){
            $arProfileColumn = ColumnTable::getById($profileColumnId)->fetch();
            if (empty($arProfileColumn)) {
                $profileColumnId = 0;
            }
        }else{
            $profileColumnId = 0;
        }
        $this->arResult['RESULT'] = 1;

        $arFieldCodes = [];
        $i = 0;
        $obHandler = Handlers::getHandlerInstance($handlerCode);
        if($obHandler){
            $arCustomFields = $obHandler->getCustomFields();
            if (is_array($arCustomFields)) {
                foreach ($arCustomFields as $field) {
                    /** @var $field Field */
                    $arItem = [
                        'IS_REQUIRED' => (int)$field->isRequired(),
                        'TITLE' => $field->getTitle(),
                        'NAME' => $field->getName(),
                        'VALUE' => '',
                        'CLASS' => array_pop(explode('\\', (string)get_class($field))),
                        'VALUES' => [],
                        'HANDLER' => $handlerCode,
                    ];
                    if($arItem['CLASS']=='EnumField'){
                        $arItem['VALUES'] = $field->getValues();
                    }
                    $arFieldCodes[$i] = $arItem['NAME'];
                    $this->arResult['items'][$i] = $arItem;
                    $i++;
                }
            }
        }

        if($profileColumnId){
            $dbItems = CustomFieldsTable::getList(
                [
                    'order' => ['NAME' => 'ASC'],
                    'filter' => ['=COLUMN_ID' => $profileColumnId]
                ]
            );
            while ($arItem = $dbItems->fetch()) {
                if (empty($arItem['HANDLER'])) {
                    $arItem['IS_REQUIRED'] = false;
                    $arItem['CLASS'] = 'Bitrix\Main\Entity\TextField';
                    $this->arResult['items'][] = $arItem;
                    continue;
                }
                if($arItem['HANDLER'] !== $handlerCode){
                    continue;
                }
                $k = array_search($arItem['NAME'], $arFieldCodes);
                if($k !== false){
                    $this->arResult['items'][$k] = array_merge($this->arResult['items'][$k], $arItem);
                }
            }
        }

        $obHtml = new Html();
        foreach ($this->arResult['items'] as $k => $arItem) {
            $inputOptions = [];
            $html = '<tr class="field_row" data-key="'.$k.'">';
            $b = '';
            if($arItem['IS_REQUIRED']){
                $b = ' class="adm-table-content-text-bold"';
            }
            if (empty($arItem['TITLE'])) {
                $html .= '<td'.$b.' data-is_required="1">'
                    . '<input name="'.$this->requestPref.'[CUSTOM_FIELDS]['.$k.'][NAME]" value="'.$arItem['NAME'].'"'
                    . ' type="text" /></td>';
            }else{
                $html .= '<td'.$b.' data-is_required="1">'
                    . '<input name="'.$this->requestPref.'[CUSTOM_FIELDS]['.$k.'][NAME]" value="'.$arItem['NAME'].'"'
                    . ' type="hidden" />'.$arItem['TITLE'].'</td>';
            }

            $inputOptions['name'] = $this->requestPref.'[CUSTOM_FIELDS]['.$k.'][VALUE]';
            if (!empty($arItem['VALUES'])) {
                $inputOptions['selected'] = $arItem['VALUE'];
                $inputOptions['as_checkbox_or_radio'] = true;
                $inputOptions['options_as_key_value'] = true;
                $inputOptions['options'] = array_flip($arItem['VALUES']);
                $field = $obHtml->getInputSelect($inputOptions);
            }else{
                $field = '<textarea name="'.$inputOptions['name'].'" rows="1" maxlength="255">'
                    .$arItem['VALUE'].'</textarea>';
            }

            $html .= '<td data-is_required="'.$arItem['IS_REQUIRED'].'">'.$field.'</td>'
                . '<td>';
            if (empty($arItem['HANDLER'])) {
                $html .= '<button class="field_del" type="button">x</button>';
            }
            $html .= '<input name="'.$this->requestPref.'[CUSTOM_FIELDS]['.$k.'][HANDLER]" '
                . 'value="'.$arItem['HANDLER'].'" type="hidden" /></td>';
            $this->arResult['html'] .= $html;
        }

        return true;
    }

}
