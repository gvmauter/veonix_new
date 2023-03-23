<?
#################################################
#   Company: NicLab                  	 	    #
#   Site: http://www.psdtobitrix.ru             #
#   Copyright (c) 2013-2014 NicLab              #
#################################################
?>
<?
IncludeModuleLangFile(__FILE__);
if(class_exists("ptb_fillingfields")) return;

Class ptb_fillingfields extends CModule
{
	const MODULE_ID = 'ptb.fillingfields';
	var $MODULE_ID = 'ptb.fillingfields';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $strError = '';

	function __construct() {
		$arModuleVersion = array();
		include(dirname(__FILE__)."/version.php");

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = GetMessage("PTB_FIELDS_MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("PTB_FIELDS_MODULE_DESC");

		$this->PARTNER_NAME = GetMessage("PTB_FIELDS_PARTNER_NAME");
		$this->PARTNER_URI = GetMessage("PTB_FIELDS_PARTNER_URI");
	}

	function InstallFiles($arParams = array()) {
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.self::MODULE_ID.'/admin')) {
			if ($dir = opendir($p)) {
				while (false !== $item = readdir($dir)) {
					if ($item == '..' || $item == '.' || $item == 'menu.php')
						continue;
					file_put_contents($file = $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin/'.$item,
					'<'.'? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/'.self::MODULE_ID.'/admin/'.$item.'");?'.'>');
				}
				closedir($dir);
			}
		}

		return true;
	}

	function UnInstallFiles() {
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.self::MODULE_ID.'/admin')) {
			if ($dir = opendir($p)) {
				while (false !== $item = readdir($dir)) {
					if ($item == '..' || $item == '.')
						continue;
					unlink($_SERVER['DOCUMENT_ROOT'].'/bitrix/admin/'.$item);
				}
				closedir($dir);
			}
		}

		return true;
	}

	function DoInstall() {
		global $APPLICATION;
		$this->InstallFiles();
		RegisterModule(self::MODULE_ID);
		$this->InstallDB();
	}

	function DoUninstall() {
		global $APPLICATION;
		$this->UnInstallDB();
		UnRegisterModule(self::MODULE_ID);
		$this->UnInstallFiles();
	}
	
	function InstallDB($arParams = array()) {
	
	}
	
	function UnInstallDB($arParams = array()) {
	
	}
}