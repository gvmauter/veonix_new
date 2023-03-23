<?php

namespace Mcart\Xls\Admin;

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use CAdminTabControl;
use CFile;
use Exception;
use Mcart\Xls\McartXls;
use Mcart\Xls\ORM\ProfileTable;
use function check_bitrix_sessid;

Loc::loadMessages(__FILE__);

final class ProfileImport extends ProfileBase {

    public function prolog() {
        global $APPLICATION, $adminChain;
        $APPLICATION->SetTitle(Loc::getMessage('MCART_XLS_TITLE_PREF').' - '.Loc::getMessage('MCART_XLS_TITLE'));
        $this->profileId = intval($this->obRequest->getQuery('PROFILE_ID'));
        if($this->profileId <= 0){
            throw new Exception('Error');
        }
        $this->arProfile = ProfileTable::getById($this->profileId)->fetch();
        if (empty($this->arProfile)) {
            throw new Exception('Error');
        }
        $adminChain->AddItem(array(
            "TEXT" => Loc::getMessage('MCART_XLS_PROFILE'),
            "LINK" => $this->getUrlProfile(),
        ));
        $adminChain->AddItem(array(
            "TEXT" => Loc::getMessage('MCART_XLS_PROFILE_COLUMNS'),
            "LINK" => $this->getUrlProfileColumns(),
        ));
        $this->entityProfile = ProfileTable::getEntity();
        $_REQUEST[$this->tabName.'_active_tab'] = 'profile_import';
        $this->tabControl = new CAdminTabControl(
            $this->tabName,
            [
                [
                    "DIV" => "profile_edit",
                    "TAB" => Loc::getMessage('MCART_XLS_PROFILE'),
                    "ONSELECT" => 'javascript:window.location.href="'.$this->getUrlProfile().'"',
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
        $APPLICATION->SetTitle(
            Loc::getMessage('MCART_XLS_TITLE_PREF').' "'.$this->arProfile['NAME'].'" - '
            .Loc::getMessage("MCART_XLS_TITLE")
        );
    }

    public function getFieldName($field) {
        return McartXls::getRequestPref().filter_var($field);
    }

    public function getFieldTitle($field) {
        return $this->entityProfile->getField($field)->getTitle();
    }

    public function getFile() {
        $this->loadFile();
        return $this->arFile;
    }

    private function loadFile() {
        if(!$this->obRequest->isPost() || !check_bitrix_sessid() || $this->arFile['ID'] > 0){
            return;
        }
        /* @var $obMcartXls McartXls */
        $obMcartXls = McartXls::getInstance();
        $defError = 'Error save file';
        $conn = Application::getConnection();
        $conn->startTransaction();
        try {
            $fieldFile = McartXls::getRequestPref().'FILE';
            $arFile = $this->obRequest->getFile($fieldFile);
            $post = $this->obRequest->getPost($fieldFile);
            if((!$arFile || $arFile['error']>0) && !empty($post)){
                $arFile = CFile::MakeFileArray($post);
            }
            if (empty($arFile)) {
                throw new Exception ($defError);
            }
            $arFile['MODULE_ID'] = McartXls::getModuleID();
            $arFile['ID'] = intval(CFile::SaveFile($arFile, $arFile['MODULE_ID']));
            if($arFile['ID'] > 0){
                $this->arFile = $arFile;
                $this->arFile['PATH'] = CFile::GetPath($this->arFile['ID']);
            }else{
                throw new Exception ($defError);
            }
            $conn->commitTransaction();
        } catch(\Throwable $e) {
            $obMcartXls->addError($obMcartXls->getErrorMessage($e, $defError));
            $conn->rollbackTransaction();
        } catch(\Exception $e) {
            $obMcartXls->addError($obMcartXls->getErrorMessage($e, $defError));
            $conn->rollbackTransaction();
        }
    }

}
