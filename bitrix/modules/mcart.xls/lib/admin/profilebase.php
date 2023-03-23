<?php

namespace Mcart\Xls\Admin;

use Bitrix\Iblock\PropertyTable;
use Bitrix\Main\Application;
use Bitrix\Main\Entity\Base;
use Bitrix\Main\HttpRequest;
use Bitrix\Main\Localization\Loc;
use CAdminTabControl;
use CAdminUiList;
use COption;
use Mcart\Xls\McartXls;
use Mcart\Xls\ModuleOptions;
use Mcart\Xls\ORM\Profile\ColumnTable;

Loc::loadMessages(__FILE__);

abstract class ProfileBase {

    protected $root;
    protected $right = null;
    protected $isSimpleInterface = false;
    protected $fileName = 'mcart_xls_index.php';
    protected $tabName = 'tabControl';

    protected $profileId = 0;
    protected $arProfile = [];
    protected $profileColumnId = 0;
    protected $arProfileColumn = [];
    protected $arFile;
    protected $arProfileForForm = [];
    protected $arIBlocksByTypes = [];
    protected $arIBlockTypesByIds = [];

    /**
     * @var Base
     */
    protected $entityProfile;
    /**
     * @var Base
     */
    protected $entityProfileConst;
    /**
     * @var Base
     */
    protected $entityProfileColumn;

    /**
     * @var CAdminTabControl
     */
    protected $tabControl;

    /**
     *
     * @var CAdminUiList
     */
    protected $obAdminUiList;

    /**
     * @var HttpRequest
     */
    protected $obRequest;


    public function __construct() {
        $obApp = Application::getInstance();
        $this->root = $obApp->getDocumentRoot();
        $this->obRequest = $obApp->getContext()->getRequest();
        $this->getRight();
        $this->checkOptionUsersGroups();
    }

    public function getRight() {
        if($this->right !== null) {
            return $this->right;
        }
        return ($this->right = McartXls::checkAccess('W'));
    }

    public function isSimpleInterface() {
        return $this->isSimpleInterface;
    }

    public function getUrlProfiles() {
        return 'mcart_xls_index.php';
    }

    public function getUrlProfile() {
        return 'mcart_xls_profile_edit.php?ID='.$this->arProfile['ID'];
    }

    public function getUrlProfileColumns() {
        return 'mcart_xls_profile_columns.php?PROFILE_ID='.$this->arProfile['ID'];
    }

    public function getUrlProfileColumn() {
        return 'mcart_xls_profile_column_edit.php?ID='.$this->arProfileColumn['ID'];
    }

    public function getUrlProfileImport() {
        return 'mcart_xls_profile_import.php?PROFILE_ID='.$this->arProfile['ID'];
    }

    public function showBackButton() {
        echo '<div><a class="adm-btn" href="'.$this->getUrlProfiles().'">'
            .Loc::getMessage('MCART_XLS_BACK').'</a></div>';
    }

    protected function checkOptionUsersGroups() {
        global $USER;
        $moduleId = McartXls::getModuleID();
        $optionUsersGroups = COption::GetOptionString($moduleId, ModuleOptions::OPTION_PREF.'USERS_GROUPS');
        if (empty($optionUsersGroups)) {
            return ($isSimpleInterface = false);
        }
        $arOptionUsersGroups = explode(',', $optionUsersGroups);
        if (empty($arOptionUsersGroups)) {
            return ($isSimpleInterface = false);
        }
        $userGroups = $USER->GetUserGroupArray();
        $intersect = array_intersect($userGroups, $arOptionUsersGroups);
        $this->isSimpleInterface = (!empty($intersect));
        return $this->isSimpleInterface;
    }

    public function getFile() {
        return $this->arFile;
    }

    public function getEntityProfile() {
        return $this->entityProfile;
    }

    public function getEntityProfileConst() {
        return $this->entityProfileConst;
    }

    public function getProfileID() {
        return $this->profileId;
    }

    public function getProfile() {
        return $this->arProfile;
    }

    public function getProfileColumn() {
        return $this->arProfileColumn;
    }

    public function getFieldTooltip($field) {
        return Loc::getMessage('MCART_XLS_'.$field.'_TOOLTIP');
    }

    public function getProfileForForm() {
        return $this->arProfileForForm;
    }

    public function getTabControl() {
        return $this->tabControl;
    }

    public function getAdminUiList() {
        return $this->obAdminUiList;
    }

    public function getIBlocksByTypes() {
        return $this->arIBlocksByTypes;
    }

    protected function getIblockColumns($forConst = false) {
        $arColumns = [];
//        $forConst = intval($forConst);

        $arFields = [
            'ID',
            'CODE',
            'XML_ID',
            'NAME',
            'SORT',
            'PREVIEW_PICTURE',
            'PREVIEW_TEXT',
            'DETAIL_PICTURE',
            'DETAIL_TEXT'
        ];
        $arColumns['FIELDS']['NAME'] = Loc::getMessage("MCART_XLS_FIELDS");
        foreach ($arFields as $key) {
            $arColumns['FIELDS']['ITEMS'][] = [
                'KEY' => ColumnTable::SAVE_IN_PREF__FIELD.'_'.$key,
                'NAME' => Loc::getMessage('MCART_XLS_FIELD_'.$key)
            ];
        }

        $arColumns['PROPERTIES']['NAME'] = Loc::getMessage("MCART_XLS_PROPERTIES");
        $arColumns['PROPERTIES']['ITEMS'] = [];
        if($this->arProfile['IBLOCK_ID'] > 0) {
            $dbProps = PropertyTable::getList([
                'order'  => ["NAME" => "ASC"],
                'select' => ['ID', 'NAME', 'PROPERTY_TYPE'],
                'filter' => [
                    '=IBLOCK_ID' => $this->arProfile['IBLOCK_ID'],
                    '@PROPERTY_TYPE' => [
                        PropertyTable::TYPE_STRING,
                        PropertyTable::TYPE_NUMBER,
                        PropertyTable::TYPE_FILE,
                        PropertyTable::TYPE_LIST,
                        PropertyTable::TYPE_ELEMENT
                    ]
                ]
            ]);
            while ($arProp = $dbProps->fetch()) {
                $arColumns['PROPERTIES']['ITEMS'][] = [
                    'KEY' => ColumnTable::SAVE_IN_PREF__PROPERTY.'_'.$arProp['ID'],
                    'NAME' => '['.$arProp['ID'].'] '.$arProp['NAME']
                ];
            }
        }

        $arColumns['CATALOG']['NAME'] = Loc::getMessage("MCART_XLS_CATALOG");
        $arFields = [
            'QUANTITY',
            'QUANTITY_TRACE',
            'VAT_RATE',
            'PURCHASING_PRICE',
            'PURCHASING_CURRENCY'
        ];
        foreach ($arFields as $key) {
            $arColumns['CATALOG']['ITEMS'][] = [
                'KEY' => ColumnTable::SAVE_IN_PREF__PRODUCT.'_'.$key,
                'NAME' => Loc::getMessage('MCART_XLS_CATALOG_'.$key)
            ];
        }
        $arFields = [
            'BASE_PRICE',
            'BASE_PRICE_CURRENCY'
        ];
        foreach ($arFields as $key) {
            $arColumns['CATALOG']['ITEMS'][] = [
                'KEY' => ColumnTable::SAVE_IN_PREF__PRICE.'_'.$key,
                'NAME' => Loc::getMessage('MCART_XLS_CATALOG_'.$key)
            ];
        }

        return $arColumns;
    }

}
