<?
$arPhpPath = array();
$strPhpPath = '';
$OS = '';
if (ToUpper(substr(PHP_OS,0,3))==='WIN') {
	$OS = 'WINDOWS';
} elseif (stripos(PHP_OS,'Linux')!==false) {
	$OS = 'LINUX';
	exec('which php', $arPhpPath);
	$strPhpPath = $arPhpPath[0];
} else {
	$OS = 'OTHER';
}
$DatabaseVersion = '';
switch($GLOBALS['DBType']) {
	case 'mysql':
		if(defined('BX_USE_MYSQLI') && BX_USE_MYSQLI===true && get_class($GLOBALS['DB']->db_Conn)=='mysqli') {
			$DatabaseVersion = 'mysqli-'.mysqli_get_server_info($GLOBALS['DB']->db_Conn);
		} elseif ((!defined('BX_USE_MYSQLI') || BX_USE_MYSQLI!==true) && is_resource($GLOBALS['DB']->db_Conn) && get_resource_type($GLOBALS['DB']->db_Conn)=='mysql link') {
			$DatabaseVersion = 'mysql-'.mysql_get_server_info();
		} else {
			$DatabaseVersion = 'mysql-unknown';
		}
		break;
	case 'oracle':
		$DatabaseVersion = 'oracle'; // 'oracle-'.oci_server_version($GLOBALS['DB']->db_Conn)
		break;
	case 'mssql':
		$DatabaseVersion = 'mssql';
		break;
}
$arGetParameters = array(
	'OS' => $OS,
	'PHP_VERSION' => PHP_VERSION,
	'DB_VERSION' => $DatabaseVersion,
	'PHP_PATH' => $strPhpPath,
	'DOCUMENT_ROOT' => $_SERVER['DOCUMENT_ROOT'],
	'DOMAIN' => $_SERVER['HTTP_HOST'],
	'MODULE_DEMO' => CModule::IncludeModuleEx('webdebug.import')==MODULE_DEMO?'Y':'N',
	'CORE_DEMO' => defined('DEMO') && DEMO=='Y' ? 'Y' : 'N',
	'IS_UTF' => CWDI::IsUTF()?'Y':'N',
	'LANGUAGE' => LANG,
	'MODULE_VERSION' => CWDI::GetModuleVersion('webdebug.import'),
	'CORE_VERSION' => SM_VERSION,
	'IBLOCK_VERSION' => CWDI::GetModuleVersion('iblock'),
	'CATALOG_VERSION' => CWDI::GetModuleVersion('catalog'),
	'SALE_VERSION' => CWDI::GetModuleVersion('sale'),
);
$arGetParametersTmp = array();
foreach($arGetParameters as $Key => $Value){
	$arGetParametersTmp[] = $Key.'='.$Value;
}
?><script>
$([
	'/bitrix/themes/.default/images/webdebug.import/loader_64.gif',
]).each(function(){
	$('<img/>')[0].src = this;
});
/**
 *	Dialog: Help
 */
var WdiHelpPopup = new BX.CDialog({
	title: '<?=GetMessage('WDI_POPUP_HELP_TITLE');?>',
	content: '<?=GetMessage('WDI_POPUP_HELP_CONTENT',array('#PARAMETERS#'=>implode('&',$arGetParametersTmp)));?>',
	icon: 'head-block',
	resizable: true,
	draggable: true,
	height: '450',
	width: '960'
});
$(WdiHelpPopup.DIV).addClass('wdi_popup_help');
var WdiHelpIFrame = $(WdiHelpPopup.DIV).find('iframe').load(function(){
	WdiHelpIFrameLoader.removeClass('visible');
});
var WdiHelpIFrameLoader = $(WdiHelpPopup.DIV).find('.wdi_help_loader');
function WdiHelp_OpenPopup() {
	if(WdiHelpIFrame.size()==1){
		WdiHelpIFrame.attr('src','');
		setTimeout(function(){
			WdiHelpIFrame.attr('src',WdiHelpIFrame.attr('data-src')+'&rand='+Math.random());
			WdiHelpIFrameLoader.addClass('visible');
		},10);
	}
	WdiHelpPopup.Show();
}
</script>