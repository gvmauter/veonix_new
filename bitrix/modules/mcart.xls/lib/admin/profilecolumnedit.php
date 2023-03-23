<?php

namespace Mcart\Xls\Admin;

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use CAdminTabControl;
use Exception;
use Mcart\Xls\Handler\Handlers;
use Mcart\Xls\McartXls;
use Mcart\Xls\ORM\Profile\ColumnTable;
use Mcart\Xls\ORM\Profile\Column\CustomFieldsTable;
use Mcart\Xls\ORM\ProfileTable;
use function LocalRedirect;

Loc::loadMessages(__FILE__);

final class ProfileColumnEdit extends ProfileBase {

    protected $fileName = 'mcart_xls_profile_column_edit.php';

    public function prolog() {
        global $APPLICATION, $adminChain;
        $APPLICATION->SetTitle(Loc::getMessage('MCART_XLS_TITLE_PREF').' - '.Loc::getMessage('MCART_XLS_TITLE'));
        if ($this->obRequest->isPost()) {
            $arPost = $this->obRequest->getPost(McartXls::getRequestPref());
            $this->profileColumnId = intval($arPost['ID']);
        } else {
            $this->profileColumnId = intval($this->obRequest->getQuery('ID'));
        }
        if ($this->profileColumnId > 0) {
            $this->arProfileColumn = ColumnTable::getById($this->profileColumnId)->fetch();
            if ($this->arProfileColumn['PROFILE_ID'] > 0) {
                $this->profileId = $this->arProfileColumn['PROFILE_ID'];
            }
        } else {
            $this->profileId = intval($this->obRequest->getQuery('PROFILE_ID'));
        }
        if ($this->profileId <= 0) {
            throw new Exception('Error');
        }
        $this->arProfile = ProfileTable::getById($this->profileId)->fetch();
        if (empty($this->arProfile)) {
            throw new Exception('Error');
        }
        $this->entityProfileColumn = ColumnTable::getEntity();
        $this->save();
        $APPLICATION->SetTitle(Loc::getMessage('MCART_XLS_TITLE_PREF').' "'.$this->arProfile['NAME'].'" - '.Loc::getMessage("MCART_XLS_TITLE"));
        $adminChain->AddItem(array(
            "TEXT" => Loc::getMessage('MCART_XLS_PROFILE_COLUMNS'),
            "LINK" => $this->getUrlProfileColumns()
        ));
        $_REQUEST[$this->tabName.'_active_tab'] = 'profile_column_edit';
        $this->tabControl = new CAdminTabControl(
            $this->tabName,
            [
                [
                    "DIV" => "profile_edit",
                    "TAB" => Loc::getMessage('MCART_XLS_PROFILE'),
                    "ONSELECT" => 'javascript:window.location.href="'.$this->getUrlProfile().'"'
                ],
                [
                    "DIV" => "profile_column_edit",
                    "TAB" => Loc::getMessage('MCART_XLS_TITLE_PREF')
                ],
                [
                    "DIV" => "profile_import",
                    "TAB" => Loc::getMessage('MCART_XLS_TO_IMPORT'),
                    "ONSELECT" => 'javascript:window.location.href="'.$this->getUrlProfileImport().'"'
                ],
            ],
            false
        );
    }

    protected function save() {
        if(!$this->obRequest->isPost()){
            return;
        }
        /* @var $obMcartXls McartXls */
        $obMcartXls = McartXls::getInstance();
        $arPost = $this->obRequest->getPost(McartXls::getRequestPref());
        $db = Application::getConnection();
        if (!$db) {
            throw new Exception('Error');
        }
        $db->startTransaction();
        try {
            if (empty($arPost['COLUMN'])) {
                $arPost['COLUMN'] = $arPost['COLUMN_BY_LIST'];
            }
            $arSaveIn = explode('_', $arPost['SAVE_IN']);
            $arFields = [
                'PROFILE_ID' => $this->profileId,
                'SAVE_IN_PREF' => array_shift($arSaveIn),
                'SAVE_IN' => implode('_', $arSaveIn),
                'COLUMN' => $arPost['COLUMN'],
                'HANDLER' => $arPost['HANDLER'],
                'DO_NOT_IMPORT_ROW_IF_EMPTY' => (trim((string)$arPost['DO_NOT_IMPORT_ROW_IF_EMPTY'])=='Y'?'Y':'N'),
                'IS_IDENTIFY_ELEMENT' => (trim((string)$arPost['IS_IDENTIFY_ELEMENT'])=='Y'?'Y':'N'),
            ];
            if ($this->profileColumnId > 0) {
                $result = ColumnTable::update($this->profileColumnId, $arFields);
            } else {
                $result = ColumnTable::add($arFields);
            }
            if (!$result->isSuccess() || !($this->profileColumnId = $result->getId())) {
                $obMcartXls->addErrors($result->getErrors());
                throw new Exception;
            }
            $this->arProfileColumn = ColumnTable::getById($this->profileColumnId)->fetch();
            if ($ob = Handlers::getHandlerInstance($arPost['HANDLER'])) {
                $ob->saveCustomFields($this->profileColumnId, $arPost['CUSTOM_FIELDS']);
            }
            CustomFieldsTable::saveCustomFieldsForHandlerNull($this->profileColumnId, $arPost['CUSTOM_FIELDS']);
            $db->commitTransaction();
            if (!empty($this->obRequest->getPost('save'))) {
                LocalRedirect($this->getUrlProfileColumns());
            }
            return true;
        } catch(\Throwable $e) {
            $obMcartXls->addError($obMcartXls->getErrorMessage($e));
        } catch(\Exception $e) {
            $obMcartXls->addError($obMcartXls->getErrorMessage($e));
        }
        $db->rollbackTransaction();
        if ($this->arProfileColumn['ID'] <= 0) {
            $this->arProfileColumn['PROFILE_ID'] = $this->arProfile['ID'];
            $this->arProfileColumn['SAVE_IN_PREF'] = $arFields['SAVE_IN_PREF'];
            $this->arProfileColumn['SAVE_IN'] = $arFields['SAVE_IN'];
            foreach (ColumnTable::getEntity()->getFields() as $field) {
                $fieldName = $field->getName();
                if (empty($fieldName) || $fieldName=='SAVE_IN' || $fieldName=='SAVE_IN_PREF') {
                    continue;
                }
                $this->arProfileColumn[$fieldName] = $arPost[$fieldName];
            }
        }
        return false;
    }

    public function getFieldName($field) {
        return McartXls::getRequestPref().'['.filter_var($field).']';
    }

    public function getFieldTitle($field) {
        return $this->entityProfileColumn->getField($field)->getTitle();
    }

    public function getFieldValues($field) {
        $ar = $this->entityProfileColumn->getField($field)->getValues();
        return (is_array($ar)? array_flip($ar) : []);
    }

    public function getColumns() {
        return $this->getIblockColumns();
    }

}
