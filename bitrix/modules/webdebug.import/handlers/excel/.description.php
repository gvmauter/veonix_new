<?
CWDI_Handler::IncludeLangFile(__FILE__);
$arHandler = array(
	'CODE' => 'EXCEL', // ���������� ��� �������� ����������� - ������������ ����
	'TITLE' => GetMessage('WDI_EXCEL_MODE_TITLE'), // ������� �������� �������� ����������� - ������������ ����
	'NAME' => GetMessage('WDI_EXCEL_MODE_NAME'), // �������� �������� ����������� - ������������ ����
	'DESCRIPTION' => GetMessage('WDI_EXCEL_MODE_DESC'), // �������� �������� �����������
	'VENDOR' => 'Webdebug', // ����������� �������� �����������
	'INCLUDE' => array( // �����, ������������� ������������ ��� ���������� �������� �����������
		'PHPExcel.php',
	),
	#'TMP_DIR' => '/#UPLOAD_DIR#/#MODULE_ID#/#HANDLER_CODE#/#PROFILE_ID#/', // ���� ��� ��������� ������, �������� ������������, �� ��������� ��������� ��, ��� ����� �������
	'ICON' => '', // ���� � �������� 16x16 ������������ ����� �����, ��� base64 (����., "data:image/png;base64,kJdaKDWah32="), ���� ����� - ����������� icon.png � ����� ����������
	'CLASS_NAME' => 'CWDI_Excel', // ��� ��������� ������ ����������� (����� ������ ���������� � class.php)
	'CHECK_CONFIG' => array( // ������ �������������� �������� ������������
		'zip' => array(
			'NAME' => GetMessage('WDI_EXCEL_MODE_CHECK_CONFIG_ZIP_NAME'),
			'HELP' => GetMessage('WDI_EXCEL_MODE_CHECK_CONFIG_ZIP_HELP'),
			'SORT' => 200,
			'HANDLER' => array('CWDI_Excel_CheckConfig','Zip'),
		),
		'xml' => array(
			'NAME' => GetMessage('WDI_EXCEL_MODE_CHECK_CONFIG_XML_NAME'),
			'HELP' => GetMessage('WDI_EXCEL_MODE_CHECK_CONFIG_XML_HELP'),
			'SORT' => 210,
			'HANDLER' => array('CWDI_Excel_CheckConfig','Xml'),
		),
	),
	'SAVE_FIELDS' => array('HANDLER_FILE_TYPE','FILE_NAME','FILE_URL','FILE_SEARCH_DIR','FILE_SEARCH_MASK','FILE_SEARCH_RECURSIVE','FILE_SEARCH_DELETE','ROWS_PER_TIME'), // ��������, ������� ����������� ������, ���������� �� ����, ������ �� ����
	'EVENTS' => array(
		#'OnGetMatchesFields' => array('CWDI_Excel_Callback','OnGetMatchesFields'),
	),
);

class CWDI_Excel_CheckConfig {
	
	/**
	 *	�������� ����������� zip-����������
	 */
	public static function Zip(){
		return extension_loaded('zip');
	}
	
	/**
	 *	�������� ����������� xml-����������
	 */
	public static function Xml(){
		return extension_loaded('xml');
	}
	
}

#class CWDI_Excel_Callback {
#	
#	/**
#	 *	OnGetMatchesFields
#	 */
#	public static function OnGetMatchesFields(&$arMatches, $IBlockID, $arHandler){
#		$arMatches['ELEMENT']['CUSTOM']['SECTION_1'] = array(
#			'NAME' => 'Section level #1',
#			'TYPE' => 'INT',
#		);
#	}
#	
#}

?>