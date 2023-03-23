<?php

namespace Bxmaker\AutoSitemap;

use Bitrix\Main\Application;
use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\Loader;
\Bitrix\Main\Localization\Loc::loadMessages(__FILE__);
// include_once(dirname(__FILE__).'/../include.php');
class ManagerTable extends \Bitrix\Main\Entity\DataManager
{
    public static function getFilePath()
    {
        return __FILE__;
    }
    public static function getTableName()
    {
        return 'bxmaker_autositemap_list';
    }
    public static function getMap()
    {
        return array(new \Bitrix\Main\Entity\IntegerField('ID', array('primary' => true)), new \Bitrix\Main\Entity\TextField('PARAMS', array('required' => false, 'save_data_modification' => function () {
            return array(function ($value) {
                return serialize($value);
            });
        }, 'fetch_data_modification' => function () {
            return array(function ($value) {
                return unserialize($value);
            });
        })), new \Bitrix\Main\Entity\ExpressionField('CNT', 'COUNT(ID)'));
    }
}
class Manager extends \Bxmaker_AutoSitemap_Manager_Demo
{
    public static $moduleId = 'bxmaker.autositemap';
    private static $instance = null;
    protected $oManagerTable = null;
    protected $oOption = null;
    protected $bEnable = false;
    protected $siteId = false;
    private function __construct()
    {
        $this->oManagerTable = new \Bxmaker\AutoSitemap\ManagerTable();
        $this->oOption = new \Bitrix\Main\Config\Option();
        $this->bEnable = $this->getParam('ENABLE', 'N') == 'Y';
    }
    private function __clone()
    {
    }
    /**
 * @return Manager
 */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c();
        }
        return self::$instance;
    }
    public function getTable()
    {
        return $this->oManagerTable;
    }
    public function addAdminPageCssJs()
    {
        $path = getLocalPath('modules/' . self::$moduleId);
        if (file_exists($_SERVER["DOCUMENT_ROOT"] . $path . '/admin/css/style.css')) {
            echo '<style type="text/css" >' . file_get_contents($_SERVER["DOCUMENT_ROOT"] . $path . '/admin/css/style.css') . '</style>';
        }
        if (file_exists($_SERVER["DOCUMENT_ROOT"] . $path . '/admin/js/script.js')) {
            echo '<script type="text/javascript" >' . file_get_contents($_SERVER["DOCUMENT_ROOT"] . $path . '/admin/js/script.js') . '</script>';
        }
    }
    public function isEnable()
    {
        return $this->bEnable;
    }
    public function getParam($name, $default_value = '', $siteId = null)
    {
        return $this->oOption->get(self::$moduleId, $name, $default_value, !is_null($siteId) ? $siteId : $this->getCurrentSiteId());
    }
    /**
 * Сохранение данных во временный файл
 * @param $key
 * @param $arData
 */
    public static function setTmpData($key, $arData)
    {
        \Bitrix\Main\IO\Directory::createDirectory(self::root() . '/upload/bxmaker.autositemap/');
        file_put_contents(self::root() . '/upload/bxmaker.autositemap/' . $key . '.tmp', '<' . '? $arDataTmp = ' . var_export($arData, true) . '; ?>');
    }
    /**
 * Восстановление данных из временного файла
 * @param $key
 * @return array
 */
    public static function getTmpData($key)
    {
        $arData = array();
        try {
            if (file_exists(self::root() . '/upload/bxmaker.autositemap/' . $key . '.tmp')) {
                include self::root() . '/upload/bxmaker.autositemap/' . $key . '.tmp';
                if (isset($arDataTmp) && is_array($arDataTmp)) {
                    $arData = $arDataTmp;
                }
            }
        } catch (\ParseError $e) {
            @unlink(self::root() . '/upload/bxmaker.autositemap/' . $key . '.tmp');
        }
        return $arData;
    }
    public static function root()
    {
        return \Bitrix\Main\Application::getDocumentRoot();
    }
}
?>