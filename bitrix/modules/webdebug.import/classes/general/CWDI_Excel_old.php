<?
IncludeModuleLangFile(__FILE__);

abstract class CWDI_Excel extends CWDI_Handler {
	
	public $arFields = array();
	public $arHandler = array();
	
	public $objExcelReader = false;
	public $objPHPExcel = false;
	
	public $objSheet = false;
	public $intSheetIndex = 0;
	
	public $arFile = array();
	public $arSheets = array();
	
	/**
	 *	Получение даты файла (дата файла используется только как справочная информация)
	 */
	abstract public function GetFileDate();
	
	/**
	 *	Создание объекта
	 */
	public function __construct(array $arFields, array $arHandler){
		$this->arFields = $arFields;
		$this->arHandler = $arHandler;
	}
	
	/**
	 *	Получение файла
	 */
	public function GetFile(){
		$this->arFile = self::GettingFile($this->arFields,$this->arHandler,array($this,'DownloadFileCallback')); // ??????
		return $this->arFile;
	}
	
	/**
	 *	Колбэк для скачивания файла (для проверки корректности файла и при необходимости - добавление необходимого расширения)
	 */
	public function DownloadFileCallback($FileUrl, $arFields, $arHandler, &$Dir, &$BaseName, &$strData){
		if(!in_array(ToUpper(end(explode('.',$BaseName))),array('XLS','XLSX'))) {
			$BaseName .= '.xls';
		}
	}
	
	/**
	 *	Подключение библиотеки PHPExcel
	 */
	public function IncludePhpExcel(){
		require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.WDI_MODULE.'/include/excel/php_excel/PHPExcel.php');
		require_once(dirname(__FILE__).'/CWDI_ChunkReadFilter.php');
		PHPExcel_Settings::SetCacheStorageMethod(PHPExcel_CachedObjectStorageFactory::cache_to_sqlite3, array('memoryCacheSize'=>'32MB'));
	}
	
	/**
	 *	Создание рендерера
	 */
	public function CreateRender(){
		if(is_file($this->arFile['FILE_ABS']) && !is_object($this->objExcelReader)) {
			$this->objExcelReader = PHPExcel_IOFactory::CreateReaderForFile($this->arFile['FILE_ABS']);
		}
	}
	
	/**
	 *	Получение пути к файлу для обработки (в случае необходимости - скачивание)
	 */
	public static function GettingFile($arFields, $arHandler, $DownloadCallback=false){
		$arHandler['TMP_DIR'] = CWDI_Handler::GetTmpRealDir($arHandler,$arFields);
		$arParams = $arFields['PARAMS'];
		if(!is_array($arParams)) {
			$arParams = array();
		}
		$FileName = false;
		switch($arParams['HANDLER_FILE_TYPE']){
			case 'manual':
				if(!empty($arParams['FILE_NAME']) && is_file($_SERVER['DOCUMENT_ROOT'].$arParams['FILE_NAME'])) {
					$FileName = $arParams['FILE_NAME'];
				}
				break;
			case 'download':
				if(!empty($arParams['FILE_URL'])) {
					$FileName = self::DownloadFile($arParams['FILE_URL'],$arFields,$arHandler,false,$DownloadCallback);
				}
				break;
			case 'search':
				if(!empty($arParams['FILE_SEARCH_DIR'])) {
					if(empty($arParams['FILE_SEARCH_MASK'])) {
						$arParams['FILE_SEARCH_MASK'] = '*';
					}
					$FileName = CWDI::SearchFile($arParams['FILE_SEARCH_DIR'], $arParams['FILE_SEARCH_MASK'], $arParams['FILE_SEARCH_RECURSIVE']=='Y');
				}
				break;
		}
		$FileOriginal = false;
		if(!empty($FileName) && !empty($arHandler['TMP_DIR']) && stripos($FileName,$arHandler['TMP_DIR'])!==0) {
			$FileOriginal = $FileName;
			$arFile = pathinfo($FileName);
			$BaseName = self::GetFileBaseName($arFile['basename'],$arFields['ID']);
			$FileSource = $_SERVER['DOCUMENT_ROOT'].$FileName;
			$FileTarget = $_SERVER['DOCUMENT_ROOT'].$arHandler['TMP_DIR'].$BaseName;
			if(copy($FileSource,$FileTarget) && filesize($FileSource)==filesize($FileTarget)) {
				$FileName = $arHandler['TMP_DIR'].$BaseName;
			} else {
				return false;
			}
		}
		if(!empty($FileName) && is_file($_SERVER['DOCUMENT_ROOT'].$FileName)) {
			return array(
				'FILE_BASENAME' => basename($FileName),
				'FILE_REL' => $FileName,
				'FILE_ABS' => $_SERVER['DOCUMENT_ROOT'].$FileName,
				'FILE_SIZE' => filesize($_SERVER['DOCUMENT_ROOT'].$FileName),
				'FILE_MTIME' => filemtime($_SERVER['DOCUMENT_ROOT'].$FileName),
				'FILE_CTIME' => filectime($_SERVER['DOCUMENT_ROOT'].$FileName),
				'FILE_ORIGINAL' => $FileOriginal,
			);
		}
		return false;
	}
	
	/**
	 *	Скачивание файла
	 */
	public static function DownloadFile($FileUrl, $arFields, $arHandler, $DownloadCallback=false){
		if(is_dir($_SERVER['DOCUMENT_ROOT'].$arHandler['TMP_DIR'])) {
			$arRequestParams = array(
				'METHOD' => 'GET',
				'TIMEOUT' => '5',
				'BASIC_AUTH' => '',
				'IGNORE_ERRORS' => false,
				'URL' => $FileUrl,
				'HEADER' => '',
				'CONTENT' => '',
				'SKIP_HTTPS_CHECK' => true,
			);
			$BaseName = basename($FileUrl);
			if(!empty($BaseName)) {
				$BaseName = CWDI_Handler::GetFileBaseName($BaseName, $arFields['ID']);
				$Dir = $arHandler['TMP_DIR'];
				$strData = CWDI_Handler::Request($arRequestParams);
				if(!empty($DownloadCallback) && is_callable($DownloadCallback)) {
					call_user_func_array($DownloadCallback,array($FileUrl, $arFields, $arHandler, &$Dir, &$BaseName, &$strData));
				}
				$FileName = $Dir.$BaseName;
				if (!empty($strData) && file_put_contents($_SERVER['DOCUMENT_ROOT'].$FileName,$strData)) {
					return $FileName;
				}
			}
		}
		return false;
	}
	
	/**
	 *	Открытие файла
	 */
	public function OpenFile(array $arParams){
		if(is_file($this->arFile['FILE_ABS'])) {
			$this->IncludePhpExcel();
			$this->CreateRender();
			$intStartRow = IntVal($arParams['START_ROW']);
			$intChunkSize = IntVal($arParams['CHUNK_SIZE']);
			if($intStartRow<1) {
				$intStartRow = 1;
			}
			if($intChunkSize<1) {
				$intChunkSize = 1;
			}
			$intSheetIndex = false;
			if(is_numeric($arParams['SHEET_INDEX']) && $arParams['SHEET_INDEX']>=0){
				$intSheetIndex = IntVal($arParams['SHEET_INDEX']);
			}
			$objFilter = new CWDI_ChunkReadFilter();
			$objFilter->SetRows($intStartRow,$intChunkSize,$intSheetIndex);
			$this->objExcelReader->SetReadFilter($objFilter);
			if($arParams['READ_ONLY']=='Y') { // Это делает загрузку форматирования невозможным
				$this->objExcelReader->SetReadDataOnly(true);
			}
			try {
				$this->objPHPExcel = $this->objExcelReader->Load($this->arFile['FILE_ABS']);
			} catch (Exception $Exception) {
				return trim($Exception->GetMessage());
			}
			if (is_object($this->objPHPExcel)) {
				return true;
			}
			return false;
		}
		return false;
	}
	
	/**
	 *	Чтение файла и сохранение всех данных в таблице БД
	 */
	public function ReadFileToDatabase(&$arData){
		if(is_array($this->arFile)){
			$arParams = $this->arFields['PARAMS'];
			$RowPerTime = IntVal($arParams['ROWS_PER_TIME']);
			if($RowPerTime<10) {
				$RowPerTime = 10;
			}
			$arFileSheets = $this->GetSheetsList();
			foreach($arFileSheets as $SheetIndex => $arSheet){
				$arSheetParams = $arParams['S'][$SheetIndex];
				if(is_array($arSheetParams) && $arSheetParams['ACTIVE']=='Y') { // загружаем только активные
					$StartRow = Max(IntVal($arSheetParams['DATA_POSITION']['DATA_ROW']),1);
					$StartCol = Max(IntVal($arSheetParams['DATA_POSITION']['FIRST_COLUMN'])-1,0);
					$ChunkSize = Max(IntVal($arParams['ROWS_PER_TIME']),1);
					for($RowIndex = $StartRow; $RowIndex<=$arSheet['ROWS']; $RowIndex++){
						if(($RowIndex-$StartRow)%$ChunkSize==0) {
							$arExcelParams = array(
								'START_ROW' => $RowIndex,
								'CHUNK_SIZE' => $ChunkSize,
							);
							$this->OpenFile($arExcelParams);
							$this->SetActiveSheet($SheetIndex);
						}
						if($this->IsRowEmpty($RowIndex)) {
							continue;
						}
						$bSuccess = $this->ReadRow($RowIndex, $arData['ERROR'], $arData['SESSION_ID']);
						if (!$bSuccess) {
							return false;
						}
					}
				}
			}
		}
		return true;
	}
	
	/**
	 *	Проверка, что строка является пустой
	 */
	public function IsRowEmpty($RowIndex) {
		if($RowIndex>0) {
			foreach ($this->objSheet->GetRowIterator($RowIndex)->current()->GetCellIterator() as $Cell) {
				if ($Cell->GetValue()) {
					return false;
				}
			}
		}
		return true;
	}
	
	/**
	 *	Получение списка листов из файла Excel
	 */
	public function GetSheetsList(){
		$this->arSheets = array();
		if(is_file($this->arFile['FILE_ABS']) && class_exists('XMLReader')) {
			$this->IncludePhpExcel();
			$this->CreateRender();
			if(method_exists($this->objExcelReader,'ListWorksheetInfo')) {
				$arSheetsRaw = $this->objExcelReader->ListWorksheetInfo($this->arFile['FILE_ABS']); // ToDo - если файл не является корректным файлом Excel, то ошибка => необходима обработка ошибок
				if(is_array($arSheetsRaw)) {
					foreach($arSheetsRaw as $SheetIndex => $arSheet){
						$this->arSheets[$SheetIndex] = array(
							'NAME' => !CWDI::IsUtf() ? CWDI::ConvertCharset($arSheet['worksheetName']) : $arSheet['worksheetName'],
							'COLS' => $arSheet['totalColumns'],
							'ROWS' => $arSheet['totalRows'],
						);
					}
				}
			}
		}
		return $this->arSheets;
	}
	
	/**
	 *	Получение объекта листа по его индексу
	 */
	public function SetActiveSheet($SheetIndex) {
		$this->objSheet = $this->objPHPExcel->GetSheet($SheetIndex);
		$this->intSheetIndex = $SheetIndex;
	}
	
	/**
	 *	Получение количества столбцов
	 */
	public function GetColumnsCount($SheetIndex=0) {
		return IntVal(PHPExcel_Cell::ColumnIndexFromString($this->objPHPExcel->GetSheet($SheetIndex)->GetHighestColumn()));
	}
	
	/**
	 *	Чтение ячейки (по номеру колонки и строки)
	 */
	public function ReadCell($Row, $Col, $Type='TEXT'){
		$Value = false;
		$Cell = $this->objSheet->GetCellByColumnAndRow($Col, $Row);
		if($Type=='TEXT'){
			$Value = $Cell->GetValue();
			if(is_object($Value) && $Value instanceof PHPExcel_RichText) {
				$Value = $Value->GetPlainText();
			}
			if(!CWDI::IsUtf()) {
				$Value = CWDI::ConvertCharset($Value);
			}
		} elseif($Type=='RICH_TEXT'){
			$Value = $this->GetRichTextValue($Row, $Col);
		} elseif($Type=='HTML'){
			$Value = $this->GetRichTextValue($Row, $Col);
			if(is_array($Value)) {
				$Value = $this->GetHtmlFromElements($Value);
			}
		}
		return $Value;
	}
	
	/**
	 *	Получение содержимого ячейки в формате RichText
	 */
	function GetRichTextValue($Row, $Col) {
		$Value = $this->objSheet->GetCellByColumnAndRow($Col,$Row)->GetValue();
		$arResult = array();
		if(is_object($Value) && $Value instanceof PHPExcel_RichText) {
			$arValueElemens = $Value->GetRichTextElements();
			foreach ($arValueElemens as $objItem) {
				$Class = get_class($objItem);
				if($Class=='PHPExcel_RichText_TextElement' || $Class=='PHPExcel_RichText_Run') {
					$arItem['TEXT'] = $objItem->GetText();
					$arItem['U'] = 'none';
					if(empty($arItem['TEXT'])) {
						continue;
					}
					if (!CWDI::IsUtf()) {
						$arItem['TEXT'] = CWDI::ConvertCharset($arItem['TEXT']);
					}
					if($Class=='PHPExcel_RichText_Run') {
						$objFont = $objItem->GetFont();
						if(get_class($objFont)=='PHPExcel_Style_Font') {
							$arItem['FONT'] = $objFont->getName();
							$arItem['SIZE'] = $objFont->getSize();
							$arItem['COLOR'] = '#'.$objFont->getColor()->getRGB();
							$arItem['B'] = $objFont->getBold();
							$arItem['I'] = $objFont->getItalic();
							$arItem['U'] = $objFont->getUnderline();
							$arItem['S'] = $objFont->getStrikethrough();
							$arItem['SUP'] = $objFont->getSuperScript();
							$arItem['SUB'] = $objFont->getSubScript();
						}
					}
					$arResult[] = $arItem;
				}
			}
		}
		return $arResult;
	}
	
	/**
	 *	Построение HTML из кусков форматированого кода
	 */
	function GetHtmlFromElements($arElements, $arHtmlFormatting=false) {
		$strResult = '';
		if(!is_array($arHtmlFormatting) || empty($arHtmlFormatting)) {
			$arHtmlFormatting = array('color','family','size','b','u','i','s','sup','sub');
		}
		foreach($arElements as $arHTMLElement) {
			$arStyles = array();
			$arTags = array();
			if (defined('WDI_HTML_ELEMENTS_IMPORTANT') && WDI_HTML_ELEMENTS_IMPORTANT===true) {
				if (in_array('color',$arHtmlFormatting) && $arHTMLElement['COLOR']!='') {
					$arStyles[] = 'color:#'.trim($arHTMLElement['COLOR']).'!important;';
				}
				if (in_array('family',$arHtmlFormatting) && $arHTMLElement['FONT']) {
					$arStyles[] = 'font-family:'.trim($arHTMLElement['FONT']).'!important;';
				}
				if (in_array('size',$arHtmlFormatting) && $arHTMLElement['SIZE']!='') {
					$arStyles[] = 'font-size:'.trim($arHTMLElement['SIZE']).'pt!important;';
				}
				if (in_array('b',$arHtmlFormatting) && $arHTMLElement['B']) {
					$arStyles[] = 'font-weight:bold!important;';
				}
				if (in_array('i',$arHtmlFormatting) && $arHTMLElement['I']) {
					$arStyles[] = 'font-style:italic!important;';
				}
				if (in_array('u',$arHtmlFormatting) && $arHTMLElement['U']!='none') {
					$arStyles[] = 'text-decoration:underline!important;';
				}
				if (in_array('s',$arHtmlFormatting) && $arHTMLElement['S']) {
					$arTags[] = 's';
				}
				if (in_array('sup',$arHtmlFormatting) && $arHTMLElement['SUP']) {
					$arTags[] = 'sup';
				}
				if (in_array('sub',$arHtmlFormatting) && $arHTMLElement['SUB']) {
					$arTags[] = 'sub';
				}
			} else {
				if (in_array('color',$arHtmlFormatting) && $arHTMLElement['COLOR']!='') {
					$arStyles[] = 'color:#'.trim($arHTMLElement['COLOR']).';';
				}
				if (in_array('family',$arHtmlFormatting) && $arHTMLElement['FONT']) {
					$arStyles[] = 'font-family:'.trim($arHTMLElement['FONT']).';';
				}
				if (in_array('size',$arHtmlFormatting) && $arHTMLElement['SIZE']!='') {
					$arStyles[] = 'font-size:'.trim($arHTMLElement['SIZE']).'pt;';
				}
				if (in_array('b',$arHtmlFormatting) && $arHTMLElement['B']) {
					$arTags[] = 'b';
				}
				if (in_array('i',$arHtmlFormatting) && $arHTMLElement['I']) {
					$arTags[] = 'i';
				}
				if (in_array('u',$arHtmlFormatting) && $arHTMLElement['U']!='none') {
					$arTags[] = 'u';
				}
				if (in_array('s',$arHtmlFormatting) && $arHTMLElement['S']) {
					$arTags[] = 's';
				}
				if (in_array('sup',$arHtmlFormatting) && $arHTMLElement['SUP']) {
					$arTags[] = 'sup';
				}
				if (in_array('sub',$arHtmlFormatting) && $arHTMLElement['SUB']) {
					$arTags[] = 'sub';
				}
			}
			$strHTMLElement = '';
			foreach($arTags as $Tag){
				$strHTMLElement .= '<'.$Tag.'>';
				}
			if (!empty($arStyles)) {
				$strHTMLElement .= '<span style="'.implode(' ', $arStyles).'">';
			}
			$strHTMLElement .= $arHTMLElement['TEXT'];
			if (!empty($arStyles)) {
				$strHTMLElement .= '</span>';
			}
			foreach($arTags as $Tag){
				$strHTMLElement .= '</'.$Tag.'>';
			}
			$strResult .= $strHTMLElement;
		}
		return $strResult;
	}
	
	/**
	 *	Получение цвета заливки ячейки
	 */
	public function GetCellBackgroundColor($RowIndex,$ColIndex){
		$BgColor = $this->objSheet->GetStyle(PHPExcel_Cell::StringFromColumnIndex($ColIndex).$RowIndex)->GetFill()->GetStartColor()->GetRGB();
		return strlen($BgColor)==6 ? '#'.$BgColor : false;
	}
	
	/**
	 *	Создание массива соответствий
	 *	Функция получает данные о настройках и возвращает поля, которые можно загружать
	 *	Нужно сделать отдельно для разделов, товаров и торговых предложений
	 */
	public function MakeMatches($SheetIndex){
		// обработка параметров
		$HeaderRow = IntVal($this->arFields['PARAMS']['S'][$SheetIndex]['DATA_POSITION']['HEADER_ROW']);
		if($HeaderRow<1) {
			$HeaderRow = 1;
		}
		$FirstCol = Max(IntVal($this->arFields['PARAMS']['S'][$SheetIndex]['DATA_POSITION']['FIRST_COLUMN'])-1,0);
		if($FirstCol<0) {
			$FirstCol = 0;
		}
		$ColCount = $this->GetColumnsCount($SheetIndex);
		// получение заголовков
		$arHeaders = array();
		$this->SetActiveSheet($SheetIndex);
		for($ColIndex=$FirstCol; $ColIndex<$ColCount; $ColIndex++) {
			$arHeaders[$ColIndex] = $this->ReadCell($HeaderRow, $ColIndex);
		}
		// составление массива соответствий
		$arMatches = array();
		foreach($arHeaders as $HeaderColIndex => $HeaderName){
			$arMatches['COLUMN_'.$HeaderColIndex] = array(
				'NAME' => $HeaderName,
			);
		}
		//
		$arMatches = array(
			'ELEMENT' => $arMatches,
			'OFFER' => $arMatches,
			'SECTION' => $arMatches,
		);
		//
		return $arMatches;
	}

	/**
	 *	Получение значения соответствия
	 */
	public function GetRawValue($Target, $arMatch, $arParams){
		$Value = false;
		if(preg_match('#^COLUMN_(\d+)$#i',$arMatch['SOURCE'],$M)){
			$ColIndex = $M[1];
			if($arMatch['TYPE']=='S:HTML' && $arMatch['PARAMS']['html_type']!='text' && $arMatch['PARAMS']['load_format']=='Y' && is_array($arMatch['PARAMS']['format'])) {
				$arCellValueHtml = $this->ReadCell($arParams['ROW_INDEX'],$arParams['COL_INDEX'],'RICH_TEXT');
				if(is_array($arCellValueHtml)) {
					$Value = $this->GetHtmlFromElements($arCellValueHtml, $arMatch['PARAMS']['format']);
				}
			}
			if(empty($Value)) {
				$Value = $this->ReadCell($arParams['ROW_INDEX'],$arParams['COL_INDEX'],'TEXT');
			}
		}
		return $Value;
	}

	/**
	 *	Обработка одного соответствия (загрузка значения из ячейки и преобразование в нужный вид в соответствии с параметрами соответствия и с типом поля)
	 */
	public function ProcessMatchSingle($Target, $arMatch, $arObject, $arParams){ // ToDo: abstract
		$Value = false;
		if(preg_match('#^COLUMN_(\d+)$#i',$arMatch['SOURCE'],$M)){
			$arParams['COL_INDEX'] = $M[1];
			$Value = $this->GetRawValue($Target, $arMatch, $arParams); // Получение "чистого" значения ячейки
			$arParams['IMAGES_PATH'] = $this->arFields['PARAMS']['S'][$this->intSheetIndex]['IMAGES_PATH'];
			$Value = array(
				'RAW' => $Value,
				'MATCH' => $arMatch,
				'PARAMS' => $arParams,
			);
		}
		return $Value;
	}
	
	/**
	 *	Получение списка инфоблоков, задействованных в профиле (метод обязательно должен существовать!)
	 */
	public function GetProfileIBlocks($arProfile){
		$arResult = array();
		foreach($arProfile['PARAMS']['S'] as $SheetIndex => $arSheet){
			$arResult[] = $arSheet['IBLOCK_ID'];
		}
		$arResult = array_unique($arResult);
		return $arResult;
	}
	
}

?>