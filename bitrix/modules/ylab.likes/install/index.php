<?php

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

/**
 * Class ylab_likes - ћодуль реализует функционал лайков/дизлайков дл€ любых сущностей битрикс
 */
class ylab_likes extends CModule
{
    /**
     * @var string  од модул€
     */
    public $MODULE_ID = 'ylab.likes';

    /**
     * @var array
     */
    public $arExclusionAdminFiles;

    /**
     * ylab_likes constructor.
     */
    public function __construct()
    {
        $arModuleVersion = array();

        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->arExclusionAdminFiles = [
            '..',
            '.',
            'menu.php',
        ];

        $this->MODULE_ID = 'ylab.likes';
        $this->MODULE_NAME = Loc::getMessage('YLAB_LIKES_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('YLAB_LIKES_MODULE_DESCRIPTION');
        $this->MODULE_GROUP_RIGHTS = 'N';
        $this->PARTNER_NAME = Loc::getMessage('YLAB_LIKES_MODULE_PARTNER_NAME');
        $this->PARTNER_URI = 'http://ylab.io';
    }

    /**
     * ћетод возпращает путь до корневой папки модул€
     * @param bool $bNotDocumentRoot
     * @return mixed|string
     */
    public function getPath($bNotDocumentRoot = false)
    {
        if ($bNotDocumentRoot) {
            return str_ireplace(Application::getDocumentRoot(), '', str_replace('\\', '/', dirname(__DIR__)));
        } else {
            return dirname(__DIR__);
        }
    }

    /**
     * ћетод инициализирует инстал€цию модул€
     */
    public function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->installDB();
        $this->InstallFiles();
    }

    /**
     * ћетод инициализирует деинстал€цию модул€
     */
    public function DoUninstall()
    {
        $this->uninstallDB();
        $this->UnInstallFiles();
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    /**
     * ћетод инициализирует инстал€цию таблиц базы данных модул€
     */
    public function installDB()
    {
        $sPath = $this->getPath() . "/install/mysql/up/";
        $oConn = Application::getConnection();
        $arFiles = scandir($sPath);

        foreach ($arFiles as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $sQuery = file_get_contents($sPath . $file);
            $oConn->executeSqlBatch($sQuery);
        }
    }

    /**
     * ћетод инициализирует деинстал€цию таблиц базы данных модул€
     */
    public function uninstallDB()
    {
        $sPath = $this->getPath() . "/install/mysql/down/";
        $oConn = Application::getConnection();
        $arFiles = scandir($sPath);

        foreach ($arFiles as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $sQuery = file_get_contents($sPath . $file);
            $oConn->executeSqlBatch($sQuery);
        }
    }

    /**
     * ћетод инициализирует инстал€цию файлов модул€
     */
    public function InstallFiles()
    {
        if (\Bitrix\Main\IO\Directory::isDirectoryExists($path = $this->getPath() . '/admin')) {
            if ($dir = opendir($path)) {
                while (false !== $item = readdir($dir)) {
                    if (in_array($item, $this->arExclusionAdminFiles)) {
                        continue;
                    }
                    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin/' . $this->MODULE_ID . '_' . $item,
                        '<' . '? require($_SERVER["DOCUMENT_ROOT"]."' . $this->getPath(true) . '/admin/' . $item . '");?' . '>');
                }
                closedir($dir);
            }
        }

        if (\Bitrix\Main\IO\Directory::isDirectoryExists($path = $this->getPath() . '/assets')) {
            CopyDirFiles($path,
                $_SERVER["DOCUMENT_ROOT"] . "/bitrix/themes/" . $this->MODULE_ID,
                true, true);
        }

        if (\Bitrix\Main\IO\Directory::isDirectoryExists($path = $this->getPath() . '/install/components/')) {
            CopyDirFiles($path,
                $_SERVER["DOCUMENT_ROOT"] . "/bitrix/components/",
                true, true);
        }

        return true;
    }

    /**
     * ћетод инициализирует деинстал€цию файлов модул€
     */
    public function UnInstallFiles()
    {
        if (\Bitrix\Main\IO\Directory::isDirectoryExists($path = $this->getPath() . '/admin')) {
            DeleteDirFiles($_SERVER["DOCUMENT_ROOT"] . $this->getPath() . '/admin/',
                $_SERVER["DOCUMENT_ROOT"] . '/bitrix/admin');
            if ($dir = opendir($path)) {
                while (false !== $item = readdir($dir)) {
                    if (in_array($item, $this->arExclusionAdminFiles)) {
                        continue;
                    }
                    \Bitrix\Main\IO\File::deleteFile($_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin/' . $this->MODULE_ID . '_' . $item);
                }
                closedir($dir);
            }
        }

        if (\Bitrix\Main\IO\Directory::isDirectoryExists($path = $this->getPath() . '/assets')) {
            DeleteDirFiles($path,
                $_SERVER["DOCUMENT_ROOT"] . '/bitrix/themes/' . $this->MODULE_ID);
        }

        if (\Bitrix\Main\IO\Directory::isDirectoryExists($path = $this->getPath() . '/install/components/')) {
            $arComponents = scandir($path . '/ylab/');
            foreach ($arComponents as $component) {
                if ($component == '.' || $component == '..') {
                    continue;
                }
                DeleteDirFilesEx("/bitrix/components/ylab/" . $component . "/");
            }
        }

        return true;
    }
}
