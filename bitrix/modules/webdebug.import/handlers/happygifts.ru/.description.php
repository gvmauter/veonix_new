<?
CWDI_Handler::IncludeLangFile(__FILE__);
$arHandler = array(
	'CODE' => 'HAPPYGIFTS', // ���������� ��� �������� ����������� - ������������ ����
	'TITLE' => GetMessage('WDI_HAPPYGIFTS_TITLE'), // ������� �������� �������� ����������� - ������������ ����
	'NAME' => GetMessage('WDI_HAPPYGIFTS_NAME'), // �������� �������� ����������� - ������������ ����
	'DESCRIPTION' => GetMessage('WDI_HAPPYGIFTS_DESC'), // �������� �������� �����������
	'VENDOR' => 'Webdebug', // ����������� �������� �����������
	#'TMP_DIR' => '/#UPLOAD_DIR#/#MODULE_ID#/#HANDLER_CODE#/#PROFILE_ID#/', // ���� ��� ��������� ������, �������� ������������, �� ��������� ��������� ��, ��� ����� �������
	'ICON' => '', // ���� � �������� 16x16 ������������ ����� �����, ��� base64 (����., "data:image/png;base64,kJdaKDWah32=")
	'CLASS_NAME' => 'CWDI_HappyGifts', // ��� ��������� ������ ����������� (����� ������ ���������� � class.php)
	'CHECK_CONFIG' => array( // ������ �������������� �������� ������������
		'zip' => array(
			'NAME' => GetMessage('WDI_HAPPYGIFTS_CHECK_CONFIG_ZIP_NAME'),
			'HELP' => GetMessage('WDI_HAPPYGIFTS_CHECK_CONFIG_ZIP_HELP'),
			'SORT' => 210,
			'HANDLER' => array('CWDI_HappyGifts_CheckConfig','Zip'),
		),
		'xml' => array(
			'NAME' => GetMessage('WDI_HAPPYGIFTS_CHECK_CONFIG_XML_NAME'),
			'HELP' => GetMessage('WDI_HAPPYGIFTS_CHECK_CONFIG_XML_HELP'),
			'SORT' => 220,
			'HANDLER' => array('CWDI_HappyGifts_CheckConfig','Xml'),
		),
	),
	#'SAVE_FIELDS' => array('HANDLER_FILE_TYPE','FILE_NAME','FILE_URL','FILE_SEARCH_DIR','FILE_SEARCH_MASK','FILE_SEARCH_RECURSIVE','FILE_SEARCH_DELETE','ROWS_PER_TIME'), // ��������, ������� ����������� ������, ���������� �� ����, ������ �� ����
	#'EVENTS' => array(
	#	'OnGetMatchesFields' => array('CWDI_HappyGifts_Callback','OnGetMatchesFields'),
	#),
);

if(!extension_loaded('ftp')){
	$arHandler['DESCRIPTION'] .= GetMessage('WDI_HAPPYGIFTS_NO_FTP');
}

class CWDI_HappyGifts_CheckConfig {
	
	/**
	 *	�������� ����������� xml-����������
	 */
	public static function Xml(){
		return extension_loaded('xml') && extension_loaded('xmlreader') && class_exists('XMLReader');
	}
	
	/**
	 *	�������� ����������� zip-����������
	 */
	public static function Zip(){
		return extension_loaded('zip') && class_exists('ZipArchive');
	}
	
}

?>