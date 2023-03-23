<?
CWDI_Handler::IncludeLangFile(__FILE__);
$arHandler = array(
	'CODE' => 'GIFTS', // Символьный код текущего обработчика - обязательное поле
	'TITLE' => GetMessage('WDI_GIFTS_TITLE'), // Краткое название текущего обработчика - обязательное поле
	'NAME' => GetMessage('WDI_GIFTS_NAME'), // Название текущего обработчика - обязательное поле
	'DESCRIPTION' => GetMessage('WDI_GIFTS_DESC'), // Описание текущего обработчика
	'VENDOR' => 'Webdebug', // Разработчик текущего обработчика
	#'TMP_DIR' => '/#UPLOAD_DIR#/#MODULE_ID#/#HANDLER_CODE#/#PROFILE_ID#/', // Путь для временных файлов, параметр необязателен, по умолчанию принимает то, что здесь указано
	'ICON' => '', // Путь к картинке 16x16 относительно корня сайта, или base64 (напр., "data:image/png;base64,kJdaKDWah32=")
	'CLASS_NAME' => 'CWDI_Gifts', // Имя основного класса обработчика (класс должен находиться в class.php)
	'CHECK_CONFIG' => array( // Массив дополнительных проверок конфигурации
		'xml' => array(
			'NAME' => GetMessage('WDI_GIFTS_CHECK_CONFIG_XML_NAME'),
			'HELP' => GetMessage('WDI_GIFTS_CHECK_CONFIG_XML_HELP'),
			'SORT' => 210,
			'HANDLER' => array('CWDI_Gifts_Callback','Xml'),
		),
	),
	#'SAVE_FIELDS' => array('HANDLER_FILE_TYPE','FILE_NAME','FILE_URL','FILE_SEARCH_DIR','FILE_SEARCH_MASK','FILE_SEARCH_RECURSIVE','FILE_SEARCH_DELETE','ROWS_PER_TIME'), // Свойства, которые сохраняются всегда, независимо от того, выбран ли файл
	'EVENTS' => array(
		'OnGetMatchesFields' => array('CWDI_Gifts_Callback','OnGetMatchesFields'),
	),
);

class CWDI_Gifts_Callback {
	
	/**
	 *	Проверка подключения xml-библиотеки
	 */
	public static function Xml(){
		return extension_loaded('xml') && extension_loaded('xmlreader') && class_exists('XMLReader');
	}
	
}

?>