<?
IncludeModuleLangFile(__FILE__);

# ToDo: short_open_tag, realpath_cache_size, max_execution_time, date.timezone, memory_limit, mysqli

class CWDI_CheckConfig {
	
	protected $arConfig = array();
	
	/**
	 *	Создание объекта и сразу проверка конфигурации
	 */
	function __construct($arProfile, $arHandler){
		$this->arConfig = array(
			'site_encoding' => array(
				'NAME' => GetMessage('WDI_CHECK_CONFIG_SITE_ENCODING_NAME'),
				'HELP' => GetMessage('WDI_CHECK_CONFIG_SITE_ENCODING_HELP'),
				'SORT' => 110,
				'HANDLER' => array(__CLASS__,'check_site_encoding'),
			),
			'iblock' => array(
				'NAME' => GetMessage('WDI_CHECK_CONFIG_IBLOCK_NAME'),
				'HELP' => GetMessage('WDI_CHECK_CONFIG_IBLOCK_HELP'),
				'SORT' => 120,
				'HANDLER' => array(__CLASS__,'check_iblock'),
			),
			'date_timezone' => array(
				'NAME' => GetMessage('WDI_CHECK_CONFIG_DATE_TIMEZONE_NAME'),
				'HELP' => GetMessage('WDI_CHECK_CONFIG_DATE_TIMEZONE_HELP'),
				'SORT' => 130,
				'HANDLER' => array(__CLASS__,'check_date_timezone'),
			),
			'gd' => array(
				'NAME' => GetMessage('WDI_CHECK_CONFIG_GD_NAME'),
				'HELP' => GetMessage('WDI_CHECK_CONFIG_GD_HELP'),
				'SORT' => 140,
				'HANDLER' => array(__CLASS__,'Gd'),
			),
			/*
			'max_input_vars' => array(
				'NAME' => GetMessage('WDI_CHECK_CONFIG_MAX_INPUT_VARS_NAME'),
				'HELP' => GetMessage('WDI_CHECK_CONFIG_MAX_INPUT_VARS_HELP'),
				'SORT' => 150,
				'HANDLER' => array(__CLASS__,'check_max_input_vars'),
			),
			*/
			'cli' => array(
				'NAME' => GetMessage('WDI_CHECK_CONFIG_CLI_NAME'),
				'HELP' => GetMessage('WDI_CHECK_CONFIG_CLI_HELP'),
				'SORT' => 160,
				'HANDLER' => array(__CLASS__,'check_cli'),
				'SKIP_IN_COMMAND_LINE' => true,
			),
		);
		if(is_array($arHandler['CHECK_CONFIG'])) {
			foreach($arHandler['CHECK_CONFIG'] as $arConfig){
				if(!is_numeric($arConfig['SORT'])) {
					$arConfig['SORT'] = 1000;
				}
			}
			$this->arConfig = array_merge($this->arConfig, $arHandler['CHECK_CONFIG']);
		}
		uasort($this->arConfig, function ($a, $b) {
			return strnatcmp($a['SORT'],$b['SORT']);
		});
		foreach($this->arConfig as $Key => $arConfig){
			if(!empty($arConfig['HANDLER']) && is_callable($arConfig['HANDLER'])) {
				$this->arConfig[$Key]['RESULT'] = call_user_func_array($arConfig['HANDLER'],array($arProfile,$arHandler));
			}
		}
	}
	
	/**
	 *	Получение массива с результатами проверки конфигурации
	 */
	public function GetConfigArray(){
		return $this->arConfig;
	}
	
	/**
	 *	Флажок о том, что есть ошибки в конфигурации
	 */
	public function HasErrors(){
		foreach($this->arConfig as $arConfig){
			if($arConfig['SKIP_IN_COMMAND_LINE'] && defined('WDI_CRON') && WDI_CRON===true) {
				continue;
			}
			if(!$arConfig['RESULT']) {
				return true;
			}
		}
		return false;
	}
	
	/**
	 *	Проверка кодировки сайта
	 */
	public static function check_site_encoding($arProfile,$arHandler){
		$IsUtf = CWDI::IsUtf();
		$MbEnabled = extension_loaded('mbstring');
		$MbFuncOverload = IntVal(ini_get('mbstring.func_overload'));
		$MbInternalEncoding = ToUpper(ini_get('mbstring.internal_encoding'));
		if(CWDI::isNewMbstring()){
			$strDefaultCharset = ToUpper(ini_get('default_charset'));
			return $IsUtf && $strDefaultCharset == 'UTF-8' || !$IsUtf && $strDefaultCharset != 'UTF-8';
		}
		else{
			return ($IsUtf && $MbEnabled && $MbFuncOverload>=2 && ($MbInternalEncoding=='UTF-8' || $MbInternalEncoding=='')) || (!$IsUtf && $MbFuncOverload==0 && ($MbInternalEncoding=='CP1251' || $MbInternalEncoding=='LATIN' || empty($MbInternalEncoding)));
		}
	}
	
	/**
	 *	Проверка модуля инфоблоков
	 */
	public static function check_iblock($arProfile,$arHandler){
		return CheckVersion(CWDI::GetModuleVersion('iblock'),'14.0.0');
	}
	
	/**
	 *	Проверка параметра date.timezone
	 */
	public static function check_date_timezone($arProfile,$arHandler){
		if(\Bitrix\Main\Config\Option::get(WDI_MODULE, 'skip_check_date_timezone') == 'Y'){
			return true;
		}
		$TimeZone = ini_get('date.timezone');
		$arTimeZones = timezone_identifiers_list();
		$arTimeZones = array_merge($arTimeZones,array(
			'Africa/Asmera','Africa/Timbuktu','America/Argentina/ComodRivadavia','America/Atka','America/Buenos_Aires',
			'America/Catamarca','America/Coral_Harbour','America/Cordoba','America/Ensenada','America/Fort_Wayne',
			'America/Indianapolis','America/Jujuy','America/Knox_IN','America/Louisville','America/Mendoza',
			'America/Montreal','America/Porto_Acre','America/Rosario','America/Santa_Isabel','America/Shiprock',
			'America/Virgin','Antarctica/South_Pole','Asia/Ashkhabad','Asia/Calcutta','Asia/Chongqing','Asia/Chungking',
			'Asia/Dacca','Asia/Harbin','Asia/Istanbul','Asia/Kashgar','Asia/Katmandu','Asia/Macao','Asia/Rangoon',
			'Asia/Saigon','Asia/Tel_Aviv','Asia/Thimbu','Asia/Ujung_Pandang','Asia/Ulan_Bator','Atlantic/Faeroe',
			'Atlantic/Jan_Mayen','Australia/ACT','Australia/Canberra','Australia/LHI','Australia/North','Australia/NSW',
			'Australia/Queensland','Australia/South','Australia/Tasmania','Australia/Victoria','Australia/West',
			'Australia/Yancowinna','Brazil/Acre','Brazil/DeNoronha','Brazil/East','Brazil/West','Canada/Atlantic',
			'Canada/Central','Canada/East-Saskatchewan','Canada/Eastern','Canada/Mountain','Canada/Newfoundland',
			'Canada/Pacific','Canada/Saskatchewan','Canada/Yukon','CET','Chile/Continental','Chile/EasterIsland',
			'CST6CDT','Cuba','EET','Egypt','Eire','EST','EST5EDT','Etc/GMT','Etc/GMT+0','Etc/GMT+1','Etc/GMT+10',
			'Etc/GMT+11','Etc/GMT+12','Etc/GMT+2','Etc/GMT+3','Etc/GMT+4','Etc/GMT+5','Etc/GMT+6','Etc/GMT+7',
			'Etc/GMT+8','Etc/GMT+9','Etc/GMT-0','Etc/GMT-1','Etc/GMT-10','Etc/GMT-11','Etc/GMT-12','Etc/GMT-13',
			'Etc/GMT-14','Etc/GMT-2','Etc/GMT-3','Etc/GMT-4','Etc/GMT-5','Etc/GMT-6','Etc/GMT-7','Etc/GMT-8',
			'Etc/GMT-9','Etc/GMT0','Etc/Greenwich','Etc/UCT','Etc/Universal','Etc/UTC','Etc/Zulu','Europe/Belfast',
			'Europe/Nicosia','Europe/Tiraspol','Factory','GB','GB-Eire','GMT','GMT+0','GMT-0','GMT0','Greenwich',
			'Hongkong','HST','Iceland','Iran','Israel','Jamaica','Japan','Kwajalein','Libya','MET','Mexico/BajaNorte',
			'Mexico/BajaSur','Mexico/General','MST','MST7MDT','Navajo','NZ','NZ-CHAT','Pacific/Ponape','Pacific/Samoa',
			'Pacific/Truk','Pacific/Yap','Poland','Portugal','PRC','PST8PDT','ROC','ROK','Singapore','Turkey','UCT',
			'Universal','US/Alaska','US/Aleutian','US/Arizona','US/Central','US/East-Indiana','US/Eastern','US/Hawaii',
			'US/Indiana-Starke','US/Michigan','US/Mountain','US/Pacific','US/Pacific-New','US/Samoa','UTC','W-SU',
			'WET','Zulu',
		));
		return !empty($TimeZone) && in_array($TimeZone,$arTimeZones);
	}
	
	/**
	 *	Проверка подключения xml-библиотеки
	 */
	public static function Gd($arProfile,$arHandler){
		return extension_loaded('gd') && IntVal(self::GetGdVersion())>=2;
	}
	private static function GetGdVersion() {
		$GDVer = gd_info();
		$GDVer = $GDVer['GD Version'];
		if (preg_match('#([0-9.]+)#', $GDVer, $GDVer)) {
			$GDVer = explode('.', $GDVer[0]);
			return $GDVer[0];
		}
		return false;
	}
	
	/**
	 *	Проверка параметра max_input_vars
	 */
	/*
	public static function check_max_input_vars($arProfile,$arHandler){
		return IntVal(ini_get('max_input_vars'))>=10000;
	}
	*/
	
	/**
	 *	Проверка работы из командной строки
	 */
	public static function check_cli($arProfile,$arHandler){
		$bSuccess = false;
		// Get php path
		$PhpPath = $arProfile['PARAMS']['PHP_PATH'];
		if(empty($PhpPath)) {
			$PhpPath = CWDI_Crontab::GetPhpPath();
		}
		$PhpPath = CWDI::ReplaceDirectorySeparators($PhpPath);
		// Get php.ini
		$PhpIni = false;
		$ModulePath = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.WDI_MODULE;
		if(is_file($ModulePath.'/php.ini')) {
			$PhpIni = $ModulePath.'/php.ini';
		}
		$PhpIni = CWDI::ReplaceDirectorySeparators($PhpIni);
		// Get check file
		$CheckFile = false;
		if(is_file($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.WDI_MODULE.'/include/cli_check.php')) {
			$CheckFile = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.WDI_MODULE.'/include/cli_check.php';
		}
		$CheckFile = CWDI::ReplaceDirectorySeparators($CheckFile);
		//
		if(is_file($CheckFile)) {
			if(strpos($PhpPath,' ')!==false) {
				$PhpPath = '"'.$PhpPath.'"';
			}
			$Command = $PhpPath;
			if(is_file($PhpIni) && filesize($PhpIni)>0) {
				if(strpos($PhpIni,' ')!==false) {
					$PhpIni = '"'.$PhpIni.'"';
				}
				$Command .= ' -c '.$PhpIni;
			}
			$Command .= ' -d short_open_tag=On';
			if(!CWDI::isNewMbstring()){
				if(CWDI::IsUtf()) {
					$Command .= ' -d default_charset="UTF-8" -d "mbstring.func_overload"=2 -d "mbstring.internal_encoding"=UTF-8';
				} else {
					$Command .= ' -d default_charset="CP1251" -d "mbstring.func_overload"=0 -d "mbstring.internal_encoding"=CP1251';
				}
			}
			if(strpos($CheckFile,' ')!==false) {
				$PhpIni = '"'.$CheckFile.'"';
			}
			$Command .= ' -f '.$CheckFile;
			exec($Command,$Result);
			if(is_array($Result)) {
				$Result = array_filter($Result);
			}
			if(is_array($Result)){
				if(count($Result)==1 && $Result[0]==GetMessage('WDI_CLI_CHECK_ENG')) {
					$bSuccess = true;
				} else {
					$bSuccess = false;
					CWDI::L($Command,true,false);
					CWDI::L($Result,true,false);
				}
			}
		}
		return $bSuccess;
	}
	
}
?>