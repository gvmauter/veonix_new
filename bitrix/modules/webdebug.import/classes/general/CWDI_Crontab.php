<?
class CWDI_Crontab {
	
	/**
	 *	Check if crontab can be managed by this script (only if Linux OS)
	 */
	public static function CanAutoSet(){
		$bResult = true;
		if (stripos(PHP_OS,'linux')===false) {
			$bResult = false;
		} else {
			exec('which crontab',$arExec);
			if(!is_array($arExec) || empty($arExec[0])) {
				$bResult = false;
			}
		}
		return $bResult;
	}
	
	/**
	 *	Check if hosting is timeweb
	 */
	public static function IsTimeweb(){
		exec('uname -a',$arExec);
		if(stripos($arExec[0],'timeweb.ru')!==false) {
			return true;
		}
		return false;
	}
	
	/**
	 *	Get path to php binary
	 */
	public static function GetPhpPath(){
		$strPhpPath = false;
		if (stripos(PHP_OS,'linux')!==false) {
			exec('which php',$strResult);
			if(is_array($strResult) && !empty($strResult[0])){
				$strPhpPath = $strResult[0];
			}
			if(empty($strPhpPath)) {
				$strPhpPath = 'php';
			}
		}
		return $strPhpPath;
	}
	
	public static function GetCommand($ProfileID, $strPhpPath='', $bClear=false){
		$strCommandScript = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.WDI_MODULE.'/cron.php profile='.$ProfileID.' start=Y';
		$strCommandConfig = $strCommandScript;
		$strPhpIni = '';
		if(!$bClear) {
			$strPhpConfig = '';
			$strPhpConfig .= ' -d short_open_tag=On';
			$strPhpConfig .= ' -d memory_limit=1G';
			$strPhpConfig .= ' -d default_charset='.(CWDI::IsUtf() ? 'UTF-8' : 'CP1251');
			if(!CWDI::isNewMbstring() || COption::GetOptionString(WDI_MODULE, 'cli_add_mbstring') == 'Y'){
				$strPhpConfig .= ' -d mbstring.func_overload='.(CWDI::IsUtf() ? '2' : '0');
				$strPhpConfig .= ' -d mbstring.internal_encoding='.(CWDI::IsUtf() ? 'UTF-8' : 'CP1251');
			}
			$strCommandConfig = $strPhpConfig.' -f '.$strCommandConfig;
			$strPhpPath = !empty($strPhpPath) ? $strPhpPath : self::GetPhpPath();
		} else {
			$strPhpPath = '';
		}
		$strCommandFull = $strPhpPath.$strCommandConfig;
		return $strCommandFull;
	}
	
	/**
	 *	Get cron jobs
	 */
	public static function GetList(){
		$Command = 'crontab -l;';
		exec($Command, $Result);
		return $Result;
	}
	
	/**
	 *	Add cron job
	 */
	public static function Add($Command, $Schedule=''){
		$Schedule = !empty($Schedule) ? trim($Schedule).' ' : '* * * * * ';
		if(!self::IsExists($Command, $Schedule)) {
			exec('(crontab -l 2>/dev/null; echo "'.$Schedule.$Command.'") | crontab -', $Result);
		}
		return self::IsExists($Command, $Schedule);
	}

	/**
	 *	Delete cron job
	 */
	public static function Delete($Command, $Schedule=''){
		$Schedule = !empty($Schedule) ? trim($Schedule).' ' : '';
		exec('crontab -l | grep -v -F "'.$Schedule.$Command.'" | crontab -', $Result);
		return !self::IsExists($Command, $Schedule);
	}

	/**
	 *	Check cron job exists
	 */
	public static function IsExists($Command, $Schedule=''){
		$Schedule = !empty($Schedule) ? trim($Schedule).' ' : '';
		exec('crontab -l | grep -q -F "'.$Schedule.$Command.'" && echo "Y" || echo "N"', $Result);
		return $Result === array('Y');
	}

	/**
	 *	Check cron schedule
	 */
	public static function GetSchedule($Command){
		if(self::IsExists($Command)) {
			$arJobs = self::GetList();
			foreach($arJobs as $strJob){
				if(stripos($strJob,$Command)!==false) {
					$arJob = explode(' ',$strJob);
					$arSchedule = array_slice($arJob,0,5);
					return implode(' ',$arSchedule);
				}
			}
		}
		return false;
	}

}
?>