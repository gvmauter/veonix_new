<?self::IncludeLangFile(__FILE__);

class CWDI_XindaoRussia extends CWDI_Handler {
	
	const TIMEOUT = 60;
	
	const FTP_HOST = 'ftp://userxd:s7ep14ad@xdgifts.ru';
	const FTP_FILE_PICTURE = '/image/#.jpg';

	const ALL_PRODUCTS = '000006100';
	
	private $SkipLoadingFiles = false;
	
	public $IBlockID = false;
	public $OffersIBlockID = false;
	public $arFields = array();
	public $arHandler = array();
	public $arFiles = array(
		'export' => false,
		'catalogue' => false,
	);
	
	private $arXMLCategories = false;
	//private $arXMLCategoriesFull = full;
	private $arXMLStock = false;
	private $strLastGroupArticle = null;
	private $intLastElementObjectId = null;
	
	/**
	 *	Создание объекта
	 */
	public function __construct(array $arFields, array $arHandler){
		$this->arFields = $arFields;
		$this->arHandler = $arHandler;
		$this->IBlockID = IntVal($arFields['PARAMS']['S'][0]['IBLOCK_ID']);
		$arCatalog = CWDI::GetCatalogArray($this->IBlockID);
		if($arCatalog['OFFERS_IBLOCK_ID']>0) {
			$this->OffersIBlockID = intVal($arCatalog['OFFERS_IBLOCK_ID']);
		}
		$this->arHandler['TMP_DIR'] = self::GetTmpRealDir($this->arHandler,$this->arFields);
		if(defined('WDI_CRON') && WDI_CRON===true) {
			$this->SkipLoadingFiles = false;
		}
	}
	
	/**
	 *	Проверка API-ключа
	 */
	public static function CheckConnection(){
		$bResult = false;
		$arRequestParams = array(
			'URL' => self::FTP_HOST.'/catalogue.xml',
			'METHOD' => 'GET',
			'TIMEOUT' => self::TIMEOUT,
			'SKIP_HTTPS_CHECK' => true,
			'HEADER' => "Accept: */*\r\n".
									"Accept-language: en\r\n".
									"Accept-Encoding: gzip,deflate,sdch\r\n".
									"Connection: Close\r\n",
		);
		$strRequest = CWDI_Handler::Request($arRequestParams);
		$strTest = GetMessage('WDI_XINDAORUSSIA_CONNECTION_CHECK_TEST');
		if(!CWDI::IsUtf()){
			$strTest = CWDI::ConvertCharset($strTest, 'CP1251', 'UTF-8');
		}
		$intPos = mb_strpos($strRequest, $strTest);
		return is_numeric($intPos) && $intPos <= 3;
	}
	
	/**
	 *	
	 */
	public function SetSkipLoadingFiles($Flag=true){
		$this->SkipLoadingFiles = $Flag;
	}
	
	/**
	 *	Скачивание XML-файлов
	 */
	public function GetFile(){
		foreach($this->arFiles as $strFileItem => $bResult){
			if($this->SkipLoadingFiles){
				$strFileSource = sprintf('/bitrix/modules/webdebug.import/handlers/xindaorussia.ru/data/%s.xml', $strFileItem);
				$strData = file_get_contents($_SERVER['DOCUMENT_ROOT'].$strFileSource);
			}
			else{
				$arRequestParams = array(
					'URL' => self::FTP_HOST.'/'.$strFileItem.'.xml',
					'METHOD' => 'GET',
					'TIMEOUT' => self::TIMEOUT,
					'SKIP_HTTPS_CHECK' => true,
					'HEADER' => "Accept: */*\r\n".
											"Accept-language: en\r\n".
											"Accept-Encoding: gzip,deflate,sdch\r\n".
											"Connection: Close\r\n",
				);
				$strData = self::Request($arRequestParams);
			}
			$strFile = $this->arHandler['TMP_DIR'].$strFileItem.'.xml';
			if(file_put_contents($_SERVER['DOCUMENT_ROOT'].$strFile, $strData)) {
				$this->arFiles[$strFileItem] = array(
					'FILE_BASENAME' => basename($strFile),
					'FILE_REL' => $strFile,
					'FILE_ABS' => $_SERVER['DOCUMENT_ROOT'].$strFile,
					'FILE_SIZE' => filesize($_SERVER['DOCUMENT_ROOT'].$strFile),
					'FILE_MTIME' => filemtime($_SERVER['DOCUMENT_ROOT'].$strFile),
					'FILE_CTIME' => filectime($_SERVER['DOCUMENT_ROOT'].$strFile),
					'SUCCESS' => true,
				);
			}
		}
		$arSuccess = array_column($this->arFiles, 'SUCCESS');
		return count($arSuccess) == count($this->arFiles) && array_unique($arSuccess) === array(true);
	}
	
	/**
	 *	Открытие файлов, их чтение и сохранение всех данных в таблице БД
	 */
	public function ReadFileToDatabase(&$arData){
		$this->arXMLCategories = array();
		//$this->arXMLCategoriesFull = array();
		//
		$obXmlProducts = simplexml_load_file($this->arFiles['export']['FILE_ABS']);
		// PRODUCTS (count)
		$Count = count($obXmlProducts->{'Товары'}->{'Товар'});
		// GROUPS
		foreach($obXmlProducts->{'Разделы'}->{'Раздел'} as $obGroup) {
			$strSectionName = (string)$obGroup->{'Наименование'};
			if(!CWDI::IsUtf()){
				$strSectionName = CWDI::ConvertCharset($strSectionName,'UTF-8','CP1251');
			}
			//
			$arSection = array(
				'ID' => (string)$obGroup->{'Ид'},
				'NAME' => $strSectionName,
				'PARENT_ID' => (string)$obGroup->{'ИдРодителя'},
			);
			if($arSection['ID'] == static::ALL_PRODUCTS){ // Раздел "Все товары"
				continue;
			}
			//$this->arXMLCategoriesFull[$arSection['ID']] = $arSection;
			//
			$ParentObjectID = $this->arXMLCategories[$arSection['PARENT_ID']];
			$arSectionMatches = $this->arFields['MATCHES']['S'][0]['SECTION'];
			$arSectionAdditionalParams = array(
				'OBJECT_TYPE' => 'SECTION',
				'OBJECT' => $arSection,
			);
			$SectionID = $this->arFields['PARAMS']['S'][0]['SECTION_ID'];
			$SessionID = $arData['SESSION_ID'];
			$ProfileID = $this->arFields['ID'];
			$arSectionObject = self::ProcessMatches($arSectionMatches, $arSection, array($this,'ProcessMatchSingle'), $this->arFields, $arSectionAdditionalParams, $arSection['ID']);
			$arSectionFilter = $this->BuildFilter($arSectionObject, 'SECTION');
			$ObjectID = self::ReadObject($arSectionObject, 'SECTION', $ParentObjectID, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arSectionFilter, $arSection['ID'], $arDebugData = array());
			if($ObjectID>0) {
				$this->arXMLCategories[$arSection['ID']] = $ObjectID;
			}
		}
		// STOCK
		$this->arXMLStock = array();
		$obXmlStock = simplexml_load_file($this->arFiles['catalogue']['FILE_ABS']);
		foreach($obXmlStock->{'Товары'}->{'Товар'} as $obStockItem){
			$this->arXMLStock[(string)$obStockItem->{'Артикул'}] = array(
				'UNIT' => (string)$obStockItem->{'ЕдиницаИзмерения'},
				'PRICE' => (string)$obStockItem->{'ЦенаРуб'},
				'AMOUNT_EUROPE' => (string)$obStockItem->{'ОстатокСкладЕвропа'},
				'AMOUNT_MOSCOW_FREE' => (string)$obStockItem->{'СкладМоскваСвободный'},
				'AMOUNT_MOSCOW_ALL' => (string)$obStockItem->{'СкладМоскваВсего'},
			);
		}
		unset($obXmlStock, $obStockItem);
		// PRODUCTS
		$Index = 0;
		foreach($obXmlProducts->{'Товары'}->{'Товар'} as $obProduct){
			$Index++;
			$arStock = array();
			$strArticle = (string)$obProduct->{'Артикул'};
			if(strlen($strArticle)){
				$arStock = $this->arXMLStock[$strArticle];
				$this->readProduct($obProduct, $Index, $Count, $arStock, $arData);
			}
		}
		return true;
	}

	/**
	 * Load single product
	 */
	private function readProduct($obXmlProduct, $Index, $Count, $arStock, &$arData){
		$strArticle = (string)$obXmlProduct->{'Артикул'};
		$arProduct = array(
			'NAME' => (string)$obXmlProduct->{'Наименование'},
			'ARTICLE' => (string)$obXmlProduct->{'Артикул'},
			'ARTICLE_GROUP' => (string)$obXmlProduct->{'ГруповойАртикул'},
			'DESCRIPTION' => (string)$obXmlProduct->{'ОписаниеРус'},
			'PRICE' => (string)$obXmlProduct->{'Цена'},
			'CURRENCY' => (string)$obXmlProduct->{'ВалютаЦены'},
			#
			'PROP_COLOR' => (string)$obXmlProduct->{'Характеристики'}->{'Цвет'},
			'PROP_BRAND' => (string)$obXmlProduct->{'Характеристики'}->{'Бренд'},
			'PROP_MATERIAL' => (string)$obXmlProduct->{'Характеристики'}->{'Материал'},
			'PROP_WEIGHT' => (string)$obXmlProduct->{'Характеристики'}->{'ВесНетто'},
			'PROP_SIZE' => (string)$obXmlProduct->{'Характеристики'}->{'Размер'},
			#
			'IMAGE' => static::DelayDownload((string)$obXmlProduct->{'Характеристики'}->{'Фотография'}, 
				$arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('ELEMENT_ARTICLE' => $strArticle)),
			'IMAGES' => [],
			#
			'PACK_SIZE' => (string)$obXmlProduct->{'Упаковка'}->{'РазмерКоробки'},
			'PACK_COUNT' => (string)$obXmlProduct->{'Упаковка'}->{'ШтукВКоробке'},
			'PACK_WEIGHT' => (string)$obXmlProduct->{'Упаковка'}->{'ВесКоробки'},
			#
			'PRINT' => [],
			#
			'ATTR_NEW' => (string)$obXmlProduct->{'Атрибуты'}->{'Новинка'},
			'ATTR_ECO' => (string)$obXmlProduct->{'Атрибуты'}->{'Эко'},
			#
			'SECTIONS' => (array)$obXmlProduct->{'Разделы'}->{'Ид'},
			#
			'STOCK_UNIT' => $arStock['UNIT'],
			'STOCK_PRICE' => $arStock['PRICE'],
			'STOCK_AMOUNT_EUROPE' => $arStock['AMOUNT_EUROPE'],
			'AMOUNT_MOSCOW_FREE' => $arStock['AMOUNT_MOSCOW_FREE'],
			'AMOUNT_MOSCOW_ALL' => $arStock['AMOUNT_MOSCOW_ALL'],
		);
		foreach(['PROP_WEIGHT', 'PACK_WEIGHT'] as $key){
			$arProduct[$key] = str_replace(' ', '', $arProduct[$key]);
		}
		foreach($obXmlProduct->{'Фотографии'}->{'Фотография'} as $obImage){
			$arProduct['IMAGES'][] = self::DelayDownload((string)$obImage, $arData['PROFILE']['ID'], 
				__CLASS__.'::OnDelayImageDownload', array('ELEMENT_ARTICLE' => $strArticle));
		}
		unset($obImage);
		foreach($obXmlProduct->{'ТипыНанесения'}->{'ТипНанесения'} as $obType){
			$arProduct['PRINT'][] = (string)$obType->{'Тип'};
		}
		unset($obType);
		$arProduct['PACK_SIZE'] = ltrim($arProduct['PACK_SIZE'], ', ');
		$arProduct['PACK_WEIGHT'] = str_replace(',', '.', $arProduct['PACK_WEIGHT']);
		$arProduct['ATTR_NEW'] = $arProduct['ATTR_NEW'] == 'Да' ? 'Да' : 'Нет';
		$arProduct['ATTR_ECO'] = $arProduct['ATTR_ECO'] == 'Да' ? 'Да' : 'Нет';
		if(is_array($arProduct['SECTIONS'])){
			$arProduct['SECTIONS'] = array_unique($arProduct['SECTIONS']);
			$key = array_search(static::ALL_PRODUCTS, $arProduct['SECTIONS']);
			if($key !== false){
				unset($arProduct['SECTIONS'][$key]);
			}
		}
		if(!CWDI::IsUtf()){
			$arProduct = CWDI::ConvertCharset($arProduct, 'UTF-8', 'CP1251');
		}
		$arParams = $this->arFields['PARAMS'];
		if($arParams['LOAD_OFFERS'] == 'Y') {
			if(is_null($this->strLastGroupArticle) || $this->strLastGroupArticle != $arProduct['ARTICLE_GROUP']){
				$this->strLastGroupArticle = $arProduct['ARTICLE_GROUP'];
				$this->ProcessElement($arProduct, $arData);
			}
			$this->ProcessOffer($arProduct, $arData);
		}
		else{
			$this->ProcessElement($arProduct, $arData);
		}
		self::ProfileSetStatus($this->arFields['ID'], 'READ', $Index, $Count);
	}
	
	/**
	 *	Обработка одного товара
	 */
	private function ProcessElement($arItem, $arData){
		$arParams = $this->arFields['PARAMS'];
		$ObjectType = 'ELEMENT';
		$arMatches = $this->arFields['MATCHES']['S'][0][$ObjectType];
		$SectionID = $arParams['S'][0]['SECTION_ID'];
		$SessionID = $arData['SESSION_ID'];
		$ProfileID = $this->arFields['ID'];
		//
		$arParentID = [];
		if(is_array($arItem['SECTIONS'])){
			foreach($arItem['SECTIONS'] as $intSectionExternalId){
				if($intSectionObjectId = $this->arXMLCategories[$intSectionExternalId]){
					$arParentID[] = $intSectionObjectId;
				}
			}
		}
		//
		$arAdditionalParams = array(
			'OBJECT_TYPE' => $ObjectType,
			'OBJECT' => $arItem,
		);
		//
		$arObject = self::ProcessMatches($arMatches, $arItem, array($this,'ProcessMatchSingle'), $this->arFields, $arAdditionalParams, $arItem['ARTICLE']);
		$arFilter = $this->BuildFilter($arObject, 'ELEMENT');
		$ObjectID = self::ReadObject($arObject, $ObjectType, $arParentID, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $arItem['ARTICLE'], $arDebugData = array());
		$this->intLastElementObjectId = $ObjectID;
		return $ObjectID;
	}
	
	/**
	 *	Обработка одного предложения
	 */
	private function ProcessOffer($arItem, $arData){
		unset($arItem['SECTIONS']);
		$arParams = $this->arFields['PARAMS'];
		$ObjectType = 'OFFER';
		$arMatches = $this->arFields['MATCHES']['S'][0][$ObjectType];
		$SectionID = $arParams['S'][0]['SECTION_ID'];
		$SessionID = $arData['SESSION_ID'];
		$ProfileID = $this->arFields['ID'];
		//
		$arAdditionalParams = array(
			'OBJECT_TYPE' => $ObjectType,
			'OBJECT' => $arItem,
		);
		//
		$arObject = self::ProcessMatches($arMatches, $arItem, array($this,'ProcessMatchSingle'), $this->arFields, $arAdditionalParams, $arItem['ARTICLE']);
		$arFilter = $this->BuildFilter($arObject, 'OFFER');
		$ObjectID = self::ReadObject($arObject, $ObjectType, $this->intLastElementObjectId, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $arItem['ARTICLE'], $arDebugData = array());
		return $ObjectID;
	}
	
	public function OnDelayImageDownload($Image, $Args=array()){
		$arRequestParams = array(
			'URL' => $Image,
			'METHOD' => 'GET',
			'TIMEOUT' => self::TIMEOUT,
			'SKIP_HTTPS_CHECK' => true,
			'HEADER' => "Accept: */*\r\n".
									"Accept-language: en\r\n".
									"Accept-Encoding: gzip,deflate,sdch\r\n".
									"Connection: Close\r\n",
		);
		$strData = CWDI::Request($arRequestParams);
		if(strlen($strData)>0 && in_array($GLOBALS['WDI_LAST_HTTP_STATUS'], [200])) {
			$Dir = '/'.COption::GetOptionString('main', 'upload_dir', 'upload').'/'.WDI_MODULE.'/xindaorussia/tmp/';
			if(!is_dir($_SERVER['DOCUMENT_ROOT'].$Dir)) {
				mkdir($_SERVER['DOCUMENT_ROOT'].$Dir,BX_DIR_PERMISSIONS,true);
			}
			if(is_dir($_SERVER['DOCUMENT_ROOT'].$Dir)) {
				$strBasename = pathinfo($Image,PATHINFO_BASENAME);
				$strFileName = $Dir.$strBasename;
				if (file_put_contents($_SERVER['DOCUMENT_ROOT'].$strFileName, $strData)) {
					return CWDI::MakeFileArray($strFileName, false, false, $strBasename);
				}
			}
		}
		return false;
	}
	
	public function OnObjectProcessed($ObjectID, $arObject, $arData, $arFields, $intResult){
		if(in_array($arObject['TYPE'],array('E','O'))) {
			$strTmpDir = '/upload/'.WDI_MODULE.'/xindaorussia/tmp/';
			if(is_dir($_SERVER['DOCUMENT_ROOT'].$strTmpDir)) {
				$Handle = opendir($_SERVER['DOCUMENT_ROOT'].$strTmpDir);
				while (($File = readdir($Handle))!==false) {
					if ($File != '.' && $File != '..') {
						if (is_file($_SERVER['DOCUMENT_ROOT'].$strTmpDir.$File)) {
							@unlink($_SERVER['DOCUMENT_ROOT'].$strTmpDir.$File);
						} elseif (is_dir($_SERVER['DOCUMENT_ROOT'].$strTmpDir.$File)){
							DeleteDirFilesEx($strTmpDir.$File);
						}
					}
				}
				closedir($Handle);
			}
		}
	}
	
	/**
	 *	Обработка одного соответствия, для сохранения на этапе чтения данных
	 */
	public function ProcessMatchSingle($Target, $arMatch, $arObject, $arParams){
		$ValueRaw = $arObject[$arMatch['SOURCE']];
		if(preg_match('#^ATTRIBUTE_([A-z0-9-_]+)$#i',$arMatch['SOURCE'],$M)) {
			$ValueRaw = $arObject['ATTRIBUTES'][$M[1]];
		}
		if(is_array($ValueRaw) && in_array($Target,array('NAME','CODE','EXTERNAL_ID','SORT','ACTIVE','PREVIEW_TEXT','DETAIL_TEXT','DESCRIPTION'))) {
			$ValueRaw = reset($ValueRaw);
		}
		if(is_array($ValueRaw) && !in_array($Target,array('PREVIEW_PICTURE','DETAIL_PICTURE','PICTURE'))) {
			foreach($ValueRaw as $Key => $Value){
				$ValueRaw[$Key] = !is_array($Value) ? trim($Value) : $Value;
			}
		}
		if(is_array($ValueRaw) && in_array($Target,array('PREVIEW_PICTURE','DETAIL_PICTURE','PICTURE'))) {
			reset($ValueRaw);
			$Key = key($ValueRaw);
			if(is_numeric($Key)) {
				$ValueRaw = $ValueRaw[$Key];
			}
		}
		if(!is_array($ValueRaw)) {
			$ValueRaw = trim($ValueRaw);
		}
		$Value = array(
			'RAW' => $ValueRaw,
			'MATCH' => $arMatch,
			'PARAMS' => $arParams,
		);
		unset($Value['PARAMS']['OBJECT']);
		return $Value;
	}
	
	/**
	 *	Создание массива соответствий
	 *	Функция получает данные о настройках и возвращает поля, которые можно загружать
	 */
	public function MakeMatches($SheetIndex){
		$strSection = 'WDI_XINDAORUSSIA_SECTION_';
		$arSection = array(
			'ID' => array('NAME'=>GetMessage($strSection.'_ID')),
			'NAME' => array('NAME'=>GetMessage($strSection.'_NAME')),
			'PARENT_ID' => array('NAME'=>GetMessage($strSection.'_PARENT_ID')),
		);
		$strElement = 'WDI_XINDAORUSSIA_ELEMENT_';
		$arElement = array(
			'NAME' => array('NAME' => null,'GROUP' => 'GENERAL'),
			'DESCRIPTION' => array('NAME' => null,'GROUP' => 'GENERAL'),
			'ARTICLE' => array('NAME' => null,'GROUP' => 'GENERAL'),
			'IMAGE' => array('NAME' => null,'GROUP' => 'GENERAL'),
			'IMAGES' => array('NAME' => null,'GROUP' => 'GENERAL'),
			'PRINT' => array('NAME' => null,'GROUP' => 'GENERAL'),
			'PROP_COLOR' => array('NAME' => null,'GROUP' => 'PROPS'),
			'PROP_BRAND' => array('NAME' => null,'GROUP' => 'PROPS'),
			'PROP_MATERIAL' => array('NAME' => null,'GROUP' => 'PROPS'),
			'PROP_WEIGHT' => array('NAME' => null,'GROUP' => 'PROPS'),
			'PROP_SIZE' => array('NAME' => null,'GROUP' => 'PROPS'),
			'PACK_SIZE' => array('NAME' => null,'GROUP' => 'PACK'),
			'PACK_COUNT' => array('NAME' => null,'GROUP' => 'PACK'),
			'PACK_WEIGHT' => array('NAME' => null,'GROUP' => 'PACK'),
			'ATTR_NEW' => array('NAME' => null,'GROUP' => 'ATTR'),
			'ATTR_ECO' => array('NAME' => null,'GROUP' => 'ATTR'),
			'PRICE' => array('NAME' => null,'GROUP' => 'STOCK'),
			'STOCK_PRICE' => array('NAME' => null,'GROUP' => 'STOCK'),
			'STOCK_AMOUNT_EUROPE' => array('NAME' => null,'GROUP' => 'STOCK'),
			'AMOUNT_MOSCOW_FREE' => array('NAME' => null,'GROUP' => 'STOCK'),
			'AMOUNT_MOSCOW_ALL' => array('NAME' => null,'GROUP' => 'STOCK'),
			'STOCK_UNIT' => array('NAME' => null,'GROUP' => 'STOCK'),
		);
		foreach($arElement as $key => $arItem){
			$arElement[$key]['NAME'] = GetMessage($strElement.$key);
		}
		$arResult = array(
			'ELEMENT' => $arElement,
			'OFFER' => $arElement,
			'SECTION' => $arSection,
		);
		return $arResult;
	}
	
	/**
	 *	Группы для соответствий
	 */
	public function GetMatchesGroups($SheetIndex, $MatchesType){
		$strGroup = 'WDI_XINDAORUSSIA_GROUP_ELEMENT_';
		$arResult = array(
			'ELEMENT' => array(
				'GENERAL' => GetMessage($strGroup.'GENERAL'),
				'PROPS' => GetMessage($strGroup.'PROPS'),
				'PACK' => GetMessage($strGroup.'PROPS'),
				'ATTR' => GetMessage($strGroup.'ATTR'),
				'STOCK' => GetMessage($strGroup.'STOCK'),
			),
		);
		return isset($arResult[$MatchesType]) ? $arResult[$MatchesType] : false;
	}
	
	/**
	 *	Получение списка инфоблоков, задействованных в профиле (метод обязательно должен существовать!)
	 */
	public function GetProfileIBlocks($arProfile){
		$arResult = array(
			$this->IBlockID
		);
		return $arResult;
	}
	
	/**
	 *	Получение даты файла (дата файла используется только как справочная информация)
	 */
	public function GetFileDate(){
		return false;
	}
	
	/**
	 *	Получение типа для сохранения
	 */
	private function GetObjectKey($RowType, $SectionDepth){
		/*
		return $RowType=='SECTION' ? $RowType.'_'.$SectionDepth : $RowType;
		*/
	}
	
	/**
	 *	Получение массива для фильтрации разделов, товаров и торговых предложений (массив сохраняется в поле FILTER базы данных)
	 */
	private function BuildFilter($arObject, $ObjectType){
		$arFilter = array();
		$arParams = $this->arFields['PARAMS']['S'][0];
		$arParams['LINK'][$ObjectType]['FIELD'] = ToUpper($arParams['LINK'][$ObjectType]['FIELD']);
		switch($arParams['LINK'][$ObjectType]['FIELD']){
			case 'OTHER':
				$Value = $this->GetLinkFilterValue($arObject,$ObjectType,ToUpper($arParams['LINK'][$ObjectType]['OTHER']));
				if($Value!==false) {
					$arFilter[$arParams['LINK'][$ObjectType]['OTHER']] = $Value;
				}
				break;
			case 'HANDLER':
				$arFilterEvent = call_user_func_array($arParams['LINK'][$ObjectType]['HANDLER'],array($this, $arObject, $ObjectType, $arParams, $this->IBlockID, $this->OffersIBlockID));
				if(is_array($arFilterEvent) && !empty($arFilterEvent)) {
					$arFilter = $arFilterEvent;
				}
				break;
			default:
				$Value = $this->GetLinkFilterValue($arObject,$ObjectType,ToUpper($arParams['LINK'][$ObjectType]['FIELD']));
				if($Value!==false) {
					$arFilter[$arParams['LINK'][$ObjectType]['FIELD']] = $Value;
				}
				break;
		}
		$arFilterTmp = array();
		foreach($arFilter as $Key => $Value){
			$arFilterTmp['='.$Key] = $Value;
		}
		$arFilter = $arFilterTmp;
		return $arFilter;
	}
	
	/**
	 *	Для привязок разделов, товаров и предложений определяем значение привязки (напр., если привязка по свойству ARTICUL, то определяем сам артикул)
	 */
	private function GetLinkFilterValue($arObject, $ObjectType, $Field){
		$IBlockID = $ObjectType=='OFFER' ? $this->OffersIBlockID : $this->IBlockID;
		if(empty($Field)) {
			return false;
		}
		if(!empty($arObject[$Field]['RAW'])) {
			return $arObject[$Field];
		}
		if(in_array($ObjectType,array('ELEMENT','OFFER')) && preg_match('#^PROPERTY_([A-z0-9\-_]+)$#i',$Field,$M)){
			$PropertyCode = $M[1];
			if(is_numeric($PropertyCode) && !empty($arObject['PROPERTY_'.$PropertyCode]['RAW'])) {
				return $arObject['PROPERTY_'.$PropertyCode];
			} else {
				$resProp = CIBlockProperty::GetList(array(),array('IBLOCK_ID'=>$IBlockID,'CODE'=>$PropertyCode));
				if($arProp = $resProp->GetNext(false,false)) {
					if(!empty($arObject['PROPERTY_'.$arProp['ID']]['RAW'])) {
						return $arObject['PROPERTY_'.$arProp['ID']];
					}
				}
			}
		}
		return false;
	}

}
?>