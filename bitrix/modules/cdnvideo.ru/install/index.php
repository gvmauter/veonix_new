<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;

IncludeModuleLangFile(__FILE__);

if (class_exists('cdnvideo_ru')) {
    return;
}

Class cdnvideo_ru extends CModule
{
    var $MODULE_ID = "cdnvideo.ru";
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_GROUP_RIGHTS = 'N';

    function __construct()
    {
        $arModuleVersion = [];
        include(dirname(__FILE__) . "/version.php");
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("cdnvideo.ru_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("cdnvideo.ru_MODULE_DESC");

        $this->PARTNER_NAME = Loc::getMessage("cdnvideo.ru_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("cdnvideo.ru_PARTNER_URI");
    }

    function DoInstall()
    {
        $this->InstallFiles();
        RegisterModule($this->MODULE_ID);
    }

    function DoUninstall()
    {
        UnRegisterModuleDependences("main", "OnEndBufferContent", $this->MODULE_ID, $this->MODULE_CLASS, "OnEndBufferContent");
        $this->UnInstallFiles();
        UnRegisterModule($this->MODULE_ID);
    }

    function InstallEvents()
    {
        return true;
    }

    function UnInstallEvents()
    {
        return true;
    }

    function InstallFiles($arParams = [])
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/" . $this->MODULE_ID . "/lib", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/lib/" . $this->MODULE_ID, true, true);
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/" . $this->MODULE_ID . "/install/images", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/images/" . $this->MODULE_ID, true, true);
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx("/bitrix/lib/" . $this->MODULE_ID . "/");
        DeleteDirFilesEx("/bitrix/images/" . $this->MODULE_ID . "/");
        return true;
    }
}

?>