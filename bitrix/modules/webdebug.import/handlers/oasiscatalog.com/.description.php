<?
CWDI_Handler::IncludeLangFile(__FILE__);
$arHandler = array(
	'CODE' => 'OASISCATALOG', // ���������� ��� �������� ����������� - ������������ ����
	'TITLE' => GetMessage('WDI_OASISCATALOG_TITLE'), // ������� �������� �������� ����������� - ������������ ����
	'NAME' => GetMessage('WDI_OASISCATALOG_NAME'), // �������� �������� ����������� - ������������ ����
	'DESCRIPTION' => GetMessage('WDI_OASISCATALOG_DESC'), // �������� �������� �����������
	'VENDOR' => 'Webdebug', // ����������� �������� �����������
	#'TMP_DIR' => '/#UPLOAD_DIR#/#MODULE_ID#/#HANDLER_CODE#/#PROFILE_ID#/', // ���� ��� ��������� ������, �������� ������������, �� ��������� ��������� ��, ��� ����� �������
	'ICON' => '', // ���� � �������� 16x16 ������������ ����� �����, ��� base64 (����., "data:image/png;base64,kJdaKDWah32=")
	'CLASS_NAME' => 'CWDI_OasisCatalog', // ��� ��������� ������ ����������� (����� ������ ���������� � class.php)
	'CHECK_CONFIG' => array( // ������ �������������� �������� ������������
		'xml' => array(
			'NAME' => GetMessage('WDI_OASISCATALOG_CHECK_CONFIG_XML_NAME'),
			'HELP' => GetMessage('WDI_OASISCATALOG_CHECK_CONFIG_XML_HELP'),
			'SORT' => 210,
			'HANDLER' => array('CWDI_OasisCatalog_CheckConfig','Xml'),
		),
	),
	#'SAVE_FIELDS' => array('HANDLER_FILE_TYPE','FILE_NAME','FILE_URL','FILE_SEARCH_DIR','FILE_SEARCH_MASK','FILE_SEARCH_RECURSIVE','FILE_SEARCH_DELETE','ROWS_PER_TIME'), // ��������, ������� ����������� ������, ���������� �� ����, ������ �� ����
	'EVENTS' => array(
		'OnGetMatchesFields' => array('CWDI_OasisCatalog_Callback','OnGetMatchesFields'),
	),
);

class CWDI_OasisCatalog_CheckConfig {
	
	/**
	 *	�������� ����������� xml-����������
	 */
	public static function Xml(){
		return extension_loaded('xml') && extension_loaded('xmlreader') && class_exists('XMLReader');
	}
	
}

?>