<?php
require_once __DIR__.'/../lib/autoloader.php';

use Bitrix\Main\Application;
use Bitrix\Main\Config\Configuration;
use Bitrix\Main\IO\Directory;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Text\Encoding;
use Mcart\Xls\ORM\Profile\Column\CustomFieldsTable;
use Mcart\Xls\ORM\Profile\ColumnTable;
use Mcart\Xls\ORM\Profile\ConstTable;
use Mcart\Xls\ORM\ProfileTable;
use Bitrix\Main\Context;

Loc::loadMessages(__FILE__);
Mcart\Xls\Autoloader::register();

if (class_exists("mcart_xls")) {
    return;
}

class mcart_xls extends CModule {

    public $MODULE_ID = "mcart.xls";
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $MODULE_GROUP_RIGHTS = "Y";
	public $PARTNER_NAME;
	public $PARTNER_URI;
    private $config_debug = false;
    private $connection;
    private $sqlHelper;
    private $encoding;

    public function __construct() {
        $arModuleVersion = array();

        include("version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        } else {
            $this->MODULE_VERSION = TASKFROMEMAIL_MODULE_VERSION;
            $this->MODULE_VERSION_DATE = TASKFROMEMAIL_MODULE_VERSION_DATE;
        }

        $this->MODULE_NAME = Loc::getMessage("MCART_XLS_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("MCART_XLS_MODULE_DESCRIPTION");

        $this->PARTNER_NAME = "MCArt";
        $this->PARTNER_NAME = Loc::getMessage("MCART_XLS_PARTNER_NAME");
        $this->PARTNER_URI = "http://mcart.ru/";

        $arConfig = Configuration::getValue('exception_handling');
        $this->config_debug = $arConfig['debug'];

        $this->connection = Application::getConnection();
        $this->sqlHelper = $this->connection->getSqlHelper();
        $this->encoding = Context::getCurrent()->getCulture()->getCharset();
    }

    public function DoInstall() {
        $result = true;
        if (!IsModuleInstalled($this->MODULE_ID)) {
            $result = $this->InstallDB();
            if(!$result){
                return $result;
            }
            $result = $this->InstallEvents();
            if(!$result){
                return $result;
            }
            $result = $this->InstallFiles();
        }
        return $result;
    }

    public function DoUninstall() {
        $result = $this->UnInstallDB();
        if(!$result){
            return $result;
        }
        $result = $this->UnInstallEvents();
        if(!$result){
            return $result;
        }
        $result = $this->UnInstallFiles();
        return $result;
    }

    public function InstallDB() {
        try {
            $ob = ProfileTable::getEntity();
            if(!$this->isExistsTable($ob->getDBTableName())){
                $ob->createDbTable();
            }
            $ob = ConstTable::getEntity();
            if(!$this->isExistsTable($ob->getDBTableName())){
                $ob->createDbTable();
            }
            $ob = ColumnTable::getEntity();
            if(!$this->isExistsTable($ob->getDBTableName())){
                $ob->createDbTable();
            }
            $ob = CustomFieldsTable::getEntity();
            if(!$this->isExistsTable($ob->getDBTableName())){
                $ob->createDbTable();
            }
        } catch (Exception $e) {
            $this->showException($e);
            return false;
        }
        ModuleManager::registerModule($this->MODULE_ID);
        return true;
    }

    public function UnInstallDB() {
        try {
            foreach ([
                ProfileTable::getTableName(),
                ConstTable::getTableName(),
                ColumnTable::getTableName(),
                CustomFieldsTable::getTableName()
            ] as $tbl) {
                if (empty($tbl)) {
                    CAdminMessage::ShowMessage('Error');
                    return false;
                }
                if(!$this->isExistsTable($tbl)){
                    continue;
                }
                $this->connection->queryExecute('DROP TABLE `'.$tbl.'`;');
            }
        } catch (Exception $e) {
            $this->showException($e);
            return false;
        }
        ModuleManager::unRegisterModule($this->MODULE_ID);
        return true;
    }

    public function InstallEvents() {
        return true;
    }

    public function UnInstallEvents() {
        return true;
    }

    public function InstallFiles() {
        try {
            $root = Application::getDocumentRoot();
            $installPath = $root."/bitrix/modules/".$this->MODULE_ID."/install";
            CopyDirFiles($installPath."/admin", $root."/bitrix/admin", true);
            CopyDirFiles($installPath."/panel", $root."/bitrix/panel", true, true);
            CopyDirFiles($installPath."/images", $root."/bitrix/images", true, true);
//    		CopyDirFiles($installPath."/include", $root."/bitrix/include", true, true);
            $this->copyLangFiles();
        } catch (Exception $e) {
            $this->showException($e);
            return false;
        }
        return true;
    }

    public function UnInstallFiles() {
        try {
            $root = Application::getDocumentRoot();
            $installPath = $root."/bitrix/modules/".$this->MODULE_ID."/install";
            DeleteDirFiles($installPath."/admin/", $root."/bitrix/admin");
            DeleteDirFiles($installPath."/panel/main/", $root."/bitrix/panel/main");
            DeleteDirFilesEx("/bitrix/images/".$this->MODULE_ID);
//    		DeleteDirFilesEx("/bitrix/include/".$this->MODULE_ID);
            $dbFile = CFile::GetList(array(), array('MODULE_ID' => $this->MODULE_ID));
            while($arDbFile = $dbFile->GetNext()){
                CFile::Delete($arDbFile['ID']);
            }
        } catch (Exception $e) {
            $this->showException($e);
            return false;
        }
        return true;
    }

    private function isExistsTable($dbTableName) {
        $arConfig = $this->connection->getConfiguration();
        $ob = $this->connection->query('SELECT `TABLE_NAME` FROM `INFORMATION_SCHEMA`.`TABLES`
            WHERE `TABLE_TYPE`="BASE TABLE" AND
                `TABLE_SCHEMA`="'.$this->sqlHelper->forSql($arConfig['database']).'" AND
                `TABLE_NAME`="'.$this->sqlHelper->forSql($dbTableName).'";');
        $ar = $ob->fetch();
        return (!empty($ar));
    }

    private function showException($e) {
        if(!$this->config_debug){
            CAdminMessage::ShowMessage('Error');
        }else{
            CAdminMessage::ShowMessage($e->getMessage().":\n".$e->getTraceAsString());
        }
    }

    private function getModulePath() {
        static $modulePath = null;
        if($modulePath !== null){
            return $modulePath;
}
        $modulePath = GetLocalPath('modules/'.$this->MODULE_ID);
        CheckDirPath($modulePath.'/');
        return $modulePath;
    }

    private function getModulePathAbs() {
        static $modulePathAbs = null;
        if($modulePathAbs !== null){
            return $modulePathAbs;
        }
        $modulePathAbs = Application::getDocumentRoot().$this->getModulePath();
        return $modulePathAbs;
    }

    private function copyLangFiles() {
        if(!extension_loaded('zip')){
            throw new Exception('Error copying lang-files #1');
        }
        $zipFile = $this->getModulePathAbs().'/lang_in_utf8.zip';
        if(!file_exists($zipFile) || !is_file($zipFile)){
            throw new Exception('Error copying lang-files #2');
        }
        $pathToLangInUtf8 = $this->getModulePathAbs().'/lang_in_utf8';
        $pathToLang = $this->getModulePathAbs().'/lang';
        if(!CheckDirPath($pathToLangInUtf8) || !CheckDirPath($pathToLang)){
            throw new Exception('Error copying lang-files #3');
        }
        $zip = new ZipArchive;
        $res = $zip->open($zipFile);
        if ($res === true) {
            $zip->extractTo($pathToLangInUtf8);
            $zip->close();
        }
        if($this->encoding == 'UTF-8'){
            CopyDirFiles($pathToLangInUtf8, $pathToLang, true, true);
        }else{
            $this->convertLang($pathToLangInUtf8, $pathToLang);
        }
        Directory::deleteDirectory($pathToLangInUtf8);
    }

    private function convertLang($pathToLangInUtf8, $pathToLang) {
        if(!file_exists($pathToLangInUtf8) || !is_dir($pathToLangInUtf8)){
            return;
        }
        if(!CheckDirPath($pathToLang)){
            return;
        }
        $items = scandir($pathToLangInUtf8);
        foreach ($items as $item) {
            if ($item == "." || $item == ".." ) {
                continue;
            }
            $pathToLangInUtf8File = $pathToLangInUtf8.'/'.$item;
            $pathToLangFile = $pathToLang.'/'.$item;
            if(is_dir($pathToLangInUtf8File)){
                $this->convertLang($pathToLangInUtf8File, $pathToLangFile);
                continue;
            }
            if(file_exists($pathToLangFile) && !is_writable($pathToLangFile)){
                @chmod($pathToLangFile, BX_FILE_PERMISSIONS);
            }
            if (!$handle = fopen($pathToLangFile, 'w')) {
                fwrite($handle, $this->convertContent($pathToLangInUtf8File));
                fclose($handle);
                @chmod($pathToLangFile, BX_FILE_PERMISSIONS);
            }
        }
    }

    private function convertContent($pathToLangInUtf8File) {
        $contentInUtf8 = @file_get_contents($pathToLangInUtf8File);
        return (string)Encoding::convertEncoding((string)$contentInUtf8, 'UTF-8', $this->encoding);
    }

}