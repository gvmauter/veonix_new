<?php

namespace Mcart\Xls\Admin;

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use CAdminListRow;
use CAdminSorting;
use CAdminUiList;
use CAdminUiResult;
use Exception;
use Mcart\Xls\McartXls;
use Mcart\Xls\ORM\Profile\ColumnTable;
use Mcart\Xls\ORM\ProfileTable;
use const LANGUAGE_ID;
use function bitrix_sessid_get;
use function check_bitrix_sessid;
use function GetMessageJS;
use function LocalRedirect;

Loc::loadMessages(__FILE__);

final class ProfileColumns extends ProfileBase {

    protected $fileName = 'mcart_xls_profile_columns.php';

    public function __construct() {
        global $APPLICATION, $adminChain;
        $obApp = Application::getInstance();
        $this->root = $obApp->getDocumentRoot();
        $this->obRequest = $obApp->getContext()->getRequest();
        $this->right = McartXls::checkAccess('R');
        $this->checkOptionUsersGroups();
        $this->profileId = intval($this->obRequest->getQuery('PROFILE_ID'));
        $this->entityProfileColumn = ColumnTable::getEntity();
        if($this->profileId <= 0){
            LocalRedirect($this->getUrlProfiles());
        }
        $this->arProfile = ProfileTable::getById($this->profileId)->fetch();
        if (empty($this->arProfile)) {
            throw new Exception('Error');
        }
        $APPLICATION->SetTitle(
            Loc::getMessage('MCART_XLS_TITLE_PREF').' "'.$this->arProfile['NAME'].'" - '
            .Loc::getMessage('MCART_XLS_TITLE')
        );
        $adminChain->AddItem(array(
            "TEXT" => Loc::getMessage('MCART_XLS_PROFILE'),
            "LINK" => $this->getUrlProfile(),
        ));
    }

    public function prolog() {
        if(!$this->getRight()){
            return;
        }
        $this->execActions();
        $oSort = new CAdminSorting(ColumnTable::getTableName(), 'COLUMN', 'asc');
        $this->obAdminUiList = new CAdminUiList(ColumnTable::getTableName(), $oSort);
        if ($this->getRight() >= 'W'){
            $this->obAdminUiList->AddAdminContextMenu([
                [
                    'TEXT'=>Loc::getMessage('MCART_XLS_ADD'),
                    'LINK'=>'mcart_xls_profile_column_edit.php?PROFILE_ID='.$this->profileId.'&lang='.LANGUAGE_ID,
                    'TITLE'=>Loc::getMessage('MCART_XLS_ADD'),
                    'ICON'=>'btn_new',
                ],
                [
                    'TEXT'=>Loc::getMessage('MCART_XLS_TO_IMPORT'),
                    'LINK'=>'mcart_xls_profile_import.php?PROFILE_ID='.$this->profileId.'&lang='.LANGUAGE_ID,
                    'TITLE'=>Loc::getMessage('MCART_XLS_TO_IMPORT'),
                    'ICON'=>'btn_edit',
                ],
            ]);
        }
        $this->obAdminUiList->AddHeaders([
            [
                'id' => 'ID',
                'content' => 'ID',
                'sort' => 'id',
                'align' => 'right',
                'default' => true,
            ],
            [
                'id' => 'COLUMN',
                'content' => $this->entityProfileColumn->getField('COLUMN')->getTitle(),
                'sort' => 'column',
                'default' => true,
            ],
            [
                'id' => 'SAVE_IN',
                'content' => $this->entityProfileColumn->getField('SAVE_IN')->getTitle(),
                'sort' => 'save_in',
                'default' => true,
            ],
            [
                'id' => 'IS_IDENTIFY_ELEMENT',
                'content' => $this->entityProfileColumn->getField('IS_IDENTIFY_ELEMENT')->getTitle(),
                'sort' => 'is_identify',
                'default' => true,
            ],
        ]);
        $this->setData();
    }

    private function execActions() {
        if ($this->getRight() < 'W'){
            return;
        }
        if ($this->obRequest->getQuery('action') === 'delete' && check_bitrix_sessid()){
            $profileColumnId = (int)$this->obRequest->getQuery('PROFILE_COLUMN_ID');
            if($profileColumnId > 0){
                $result = ColumnTable::delete($profileColumnId);
                if (!$result->isSuccess()) {
                    throw new Exception (implode('<br />', $result->getErrorMessages()));
                }
            }
            LocalRedirect($this->getUrlProfileColumns());
        }
    }

    private function setData() {
        global $by, $order;

        $rsData1 = ColumnTable::getList([
            'filter' => ['=PROFILE_ID' => $this->profileId],
            'order'  => [strtoupper(strip_tags($by)) => strip_tags($order)]
        ]);
        $rsData = new CAdminUiResult($rsData1, ColumnTable::getTableName());
        $rsData->NavStart();
        $this->obAdminUiList->SetNavigationParams($rsData);

        while ($arRes = $rsData->fetch()){
            /** @var CAdminListRow $row */

            $urlEdit = 'mcart_xls_profile_column_edit.php?ID='.$arRes['ID'].'&lang='.LANGUAGE_ID;

            $row =& $this->obAdminUiList->AddRow($arRes['ID'], $arRes, $urlEdit);
            if ($this->getRight() < 'W'){
                $row->AddViewField("ID", $arRes['ID']);
                $row->AddViewField('COLUMN', $arRes['COLUMN']);
                continue;
            }
            $row->AddViewField("ID", '<a href="'.$urlEdit.'">'.$arRes['ID'].'</a>');
            $row->AddViewField('COLUMN', '<a href="'.$urlEdit.'">['.$arRes['COLUMN'].'] '.$this->arProfile['FILE_HEADERS'][$arRes['COLUMN']].'</a>');

            if (!empty($arRes['SAVE_IN_PREF']) && !empty($arRes['SAVE_IN'])) {
                if($arRes['SAVE_IN_PREF'] === ColumnTable::SAVE_IN_PREF__FIELD){
                    $value = '['.Loc::getMessage('MCART_XLS_FIELDS_SHORT').'] '
                        .Loc::getMessage('MCART_XLS_FIELD_'.$arRes['SAVE_IN']);
                }elseif($arRes['SAVE_IN_PREF'] === ColumnTable::SAVE_IN_PREF__PROPERTY){
                    $value = '['.Loc::getMessage('MCART_XLS_PROPERTIES_SHORT').'] '.$arRes['SAVE_IN'];
                }else{
                    $value = '['.Loc::getMessage('MCART_XLS_CATALOG_SHORT').'] '
                        .Loc::getMessage('MCART_XLS_CATALOG_'.$arRes['SAVE_IN']);
                }
                $row->AddViewField('SAVE_IN', $value);
            }

            $row->AddViewField('IS_IDENTIFY_ELEMENT', ($arRes['IS_IDENTIFY_ELEMENT']!=='Y'?'&nbsp;':'&#10004;'));

            $arActions = [];
            $arActions[] = [
                'ICON' => 'edit',
                'TEXT' => Loc::getMessage('MCART_XLS_EDIT'),
                'ACTION' => $this->obAdminUiList->ActionRedirect($urlEdit),
            ];
            $arActions[] = [
                'ICON'=>'delete',
                'TEXT' => Loc::getMessage('MCART_XLS_DELETE'),
                'ACTION' => 'if(confirm("'.GetMessageJS('MCART_XLS_DELETE').'?")) '.
                    $this->obAdminUiList->ActionRedirect(
                        $this->fileName.'?action=delete&PROFILE_COLUMN_ID='.$arRes['ID'].'&PROFILE_ID='.$this->profileId
                        .'&lang='.LANGUAGE_ID.'&'.bitrix_sessid_get()
                    )
            ];
            $row->AddActions($arActions);
        }

        $this->obAdminUiList->CheckListMode();
    }


}
