<?
CWDI_Handler::IncludeLangFile(__FILE__);
$arHandler = array(
	'CODE' => 'GIFTS', // ���������� ��� �������� ����������� - ������������ ����
	'TITLE' => GetMessage('WDI_GIFTS_TITLE'), // ������� �������� �������� ����������� - ������������ ����
	'NAME' => GetMessage('WDI_GIFTS_NAME'), // �������� �������� ����������� - ������������ ����
	'DESCRIPTION' => GetMessage('WDI_GIFTS_DESC'), // �������� �������� �����������
	'VENDOR' => 'Webdebug', // ����������� �������� �����������
	#'TMP_DIR' => '/#UPLOAD_DIR#/#MODULE_ID#/#HANDLER_CODE#/#PROFILE_ID#/', // ���� ��� ��������� ������, �������� ������������, �� ��������� ��������� ��, ��� ����� �������
	'ICON' => '', // ���� � �������� 16x16 ������������ ����� �����, ��� base64 (����., "data:image/png;base64,kJdaKDWah32=")
	'CLASS_NAME' => 'CWDI_Gifts', // ��� ��������� ������ ����������� (����� ������ ���������� � class.php)
	'CHECK_CONFIG' => array( // ������ �������������� �������� ������������
		'xml' => array(
			'NAME' => GetMessage('WDI_GIFTS_CHECK_CONFIG_XML_NAME'),
			'HELP' => GetMessage('WDI_GIFTS_CHECK_CONFIG_XML_HELP'),
			'SORT' => 210,
			'HANDLER' => array('CWDI_Gifts_Callback','Xml'),
		),
	),
	#'SAVE_FIELDS' => array('HANDLER_FILE_TYPE','FILE_NAME','FILE_URL','FILE_SEARCH_DIR','FILE_SEARCH_MASK','FILE_SEARCH_RECURSIVE','FILE_SEARCH_DELETE','ROWS_PER_TIME'), // ��������, ������� ����������� ������, ���������� �� ����, ������ �� ����
	'EVENTS' => array(
		'OnGetMatchesFields' => array('CWDI_Gifts_Callback','OnGetMatchesFields'),
	),
);

class CWDI_Gifts_Callback {
	
	/**
	 *	�������� ����������� xml-����������
	 */
	public static function Xml(){
		return extension_loaded('xml') && extension_loaded('xmlreader') && class_exists('XMLReader');
	}
	
}

?>