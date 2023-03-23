<?php
$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__.'/../../..');
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$ModuleID = 'webdebug.import';
define('WDI_CRON', true);
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS',true);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
set_time_limit(0);
ignore_user_abort(true);
ini_set('memory_limit', '1G');
if (CModule::IncludeModule($ModuleID)) {
	define('WDI_START_TIME',CWDI::GetMicroTime());
	// Lock
	$strLockFile = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$ModuleID.'/cron.lock';
	if(!is_file($strLockFile)){
		touch($strLockFile);
	}
	$resLockFile = fopen($strLockFile, 'w');
	$bLocked = flock($resLockFile, LOCK_EX|LOCK_NB);
	if($bLocked) {
		// Do import
		CWDI_Handler::CronExec($argv);
	} else {
		// Show error
		CWDI::W(GetMessage('WDI_ERROR_ANOTHER_PROCESS'));
		CWDI::E();
	}
	// Unlock
	flock($resLockFile, LOCK_UN);
	fclose($resLockFile);
	unlink($strLockFile);
}


?>