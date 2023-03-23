<?self::IncludeLangFile(__FILE__);

class CWDI_OasisCatalog extends CWDI_Handler {
	
	const TIMEOUT = 600;
	
	const ATTR_WEIGHT = 'ves';
	const ATTR_SIZE = 'razmer_tovara';
	const ATTR_SIZE_DELIMITER = ' x ';
	
	private $SkipLoadingFiles = true;
	
	public $IBlockID = false;
	public $OffersIBlockID = false;
	public $arFields = array();
	public $arHandler = array();
	public $arFiles = array();
	
	private $arXMLStock = false;
	private $arXMLCategories = false;
	private $arXMLBrands = false;
	private $arXMLWarehouses = false;
	private $arXMLDiscountGroups = false;
	
	/**
	 *	Создание объекта
	 */
	public function __construct(array $arFields, array $arHandler){
		$this->arFields = $arFields;
		$this->arHandler = $arHandler;
		$this->IBlockID = IntVal($arFields['PARAMS']['S'][0]['IBLOCK_ID']);
		$arCatalog = CWDI::GetCatalogArray($this->IBlockID);
		if($arCatalog['OFFERS_IBLOCK_ID']>0) {
			$this->OffersIBlockID = $arCatalog['OFFERS_IBLOCK_ID'];
		}
		$this->arHandler['TMP_DIR'] = self::GetTmpRealDir($this->arHandler,$this->arFields);
		if(defined('WDI_CRON') && WDI_CRON===true) {
			$this->SkipLoadingFiles = false;
		}
		if(defined('WDI_CRON') && !self::CheckApiKey($arFields['PARAMS']['APIKEY'])){
			$strError = GetMessage('WDI_OASISCATALOG_WRONG_API_KEY');
			CWDI::L('[OASISCATALOG_0001] '.$strError);
			CWDI::W('[OASISCATALOG_0001] '.$strError);
			CWDI::E();
		}
	}
	
	/**
	 *	Проверка API-ключа
	 */
	public static function CheckApiKey($Key){
		$bResult = false;
		if(!empty($Key)) {
			$arRequestParams = array(
				'URL' => 'https://api.oasiscatalog.com/v3/warehouses/download?format=xml',
				'METHOD' => 'GET',
				'TIMEOUT' => self::TIMEOUT,
				'BASIC_AUTH' => base64_encode($Key.':'),
				'SKIP_HTTPS_CHECK' => true,
				'HEADER' => "Accept: */*\r\n".
										"Accept-language: en\r\n".
										"Accept-Encoding: gzip,deflate,sdch\r\n".
										"Connection: Close\r\n",
			);
			CWDI_Handler::Request($arRequestParams);
			if(is_array($GLOBALS['WDI_RESPONSE_HEADERS'])){
				foreach($GLOBALS['WDI_RESPONSE_HEADERS'] as $strHeader){
					if(preg_match('#^HTTP/1\.(1|0) 200 OK$#i',$strHeader)) {
						$bResult = true;
					}
				}
			}
		}
		return $bResult;
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
	public function GetFile($File=false){
		if(!$File) {
			$arFiles = array(
				'discount-groups' => false, // группы скидок
				'warehouses' => false, // склады
				'brands' => false, // бренды
				'categories' => false, // рубрикатор
				'stock' => false, // остатки
				'products' => false, // товары
			);
		} else {
			$arFiles = array(
				$File => false,
			);
		}
		$ArcFileName = dirname(__FILE__).'/data/files.tar.gz';
		if($this->SkipLoadingFiles && is_file($ArcFileName) && filesize($ArcFileName)>0) {
			require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/classes/general/tar_gz.php');
			$Arc = CBXArchive::GetArchive($ArcFileName, 'TAR.GZ');
			if ($Arc instanceof IBXArchive) {
				$Arc->SetOptions(array(
					'REMOVE_PATH' => $_SERVER['DOCUMENT_ROOT'].$this->arHandler['TMP_DIR'],
					'UNPACK_REPLACE' => false,
					'CHECK_PERMISSIONS' => false,
					'UNPACK_REPLACE' => false,
				));
				foreach($arFiles as $FileItem => $strFile){
					$BaseFileName = self::GetFileBaseName($FileItem.'.xml', $this->arFields['ID']);
					if ($Arc->ExtractFiles($_SERVER['DOCUMENT_ROOT'].$this->arHandler['TMP_DIR'],array('/'.$BaseFileName))) {
						$FileNameFull = $_SERVER['DOCUMENT_ROOT'].$this->arHandler['TMP_DIR'].$BaseFileName;
						if(is_file($FileNameFull) && filesize($FileNameFull)>0){
							$arFiles[$FileItem] = $this->arHandler['TMP_DIR'].$BaseFileName;
						}
					}
				}
			}
		} else {
			$arRequestParams = array(
				'URL' => '',
				'METHOD' => 'GET',
				'TIMEOUT' => self::TIMEOUT,
				'BASIC_AUTH' => base64_encode($this->arFields['PARAMS']['APIKEY'].':'),
				'SKIP_HTTPS_CHECK' => true,
				'HEADER' => "Accept: */*\r\n".
										"Accept-language: en\r\n".
										"Accept-Encoding: gzip,deflate,sdch\r\n".
										"Connection: Close\r\n",
			);
			foreach($arFiles as $FileItem => $strFile){
				$arRequestParams['URL'] = "https://api.oasiscatalog.com/v3/{$FileItem}/download?format=xml";
				$BaseFileName = self::GetFileBaseName($FileItem.'.xml', $this->arFields['ID']);
				$Dir = $this->arHandler['TMP_DIR'];
				$strData = self::Request($arRequestParams);
				$FileNameFull = $_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileName;
				if (!empty($strData) && file_put_contents($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileName,$strData)) {
					if(is_file($FileNameFull) && filesize($FileNameFull)>0){
						$arFiles[$FileItem] = $Dir.$BaseFileName;
					}
				}
				sleep(3);
			}
		}
		$intSuccessCount = 0;
		foreach($arFiles as $FileItem => $strFile){
			if(is_file($_SERVER['DOCUMENT_ROOT'].$strFile) && filesize($_SERVER['DOCUMENT_ROOT'].$strFile)>0){
				$arFiles[$FileItem] = array(
					'FILE_BASENAME' => basename($strFile),
					'FILE_REL' => $strFile,
					'FILE_ABS' => $_SERVER['DOCUMENT_ROOT'].$strFile,
					'FILE_SIZE' => filesize($_SERVER['DOCUMENT_ROOT'].$strFile),
					'FILE_MTIME' => filemtime($_SERVER['DOCUMENT_ROOT'].$strFile),
					'FILE_CTIME' => filectime($_SERVER['DOCUMENT_ROOT'].$strFile),
				);
				$intSuccessCount++;
			}
		}
		if($intSuccessCount==count($arFiles)) {
			$this->arFiles = is_array($this->arFiles) ? array_merge($this->arFiles,$arFiles) : $arFiles;
			return true;
		}
		return false;
	}
	
	/**
	 *	Открытие файлов, их чтение и сохранение всех данных в таблице БД
	 */
	public function ReadFileToDatabase(&$arData){
		// DISCOUNT_GROUPS
    $XMLReader = new XMLReader();
		$this->arXMLDiscountGroups = array();
    $XMLReader->Open($this->arFiles['discount-groups']['FILE_ABS']);
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT) {
				if($XMLReader->localName=='item') {
					$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
					$ID = (string)$obXML->id;
					$Name = (string)$obXML->name;
					if(!CWDI::IsUtf()){
						$Name = CWDI::ConvertCharset($Name);
					}
					$this->arXMLDiscountGroups[$ID] = $Name;
					unset($obXML);
				}
			}
    }
		$XMLReader->Close();
		unset($XMLReader);
		// WAREHOUSES
		$XMLReader = new XMLReader();
		$this->arXMLWarehouses = array();
    $XMLReader->Open($this->arFiles['warehouses']['FILE_ABS']);
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT) {
				if($XMLReader->localName=='item') {
					$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
					$ID = (string)$obXML->id;
					$Name = (string)$obXML->name;
					if(!CWDI::IsUtf()){
						$Name = CWDI::ConvertCharset($Name);
					}
					$this->arXMLWarehouses[] = array(
						'ID' => $ID,
						'NAME' => $Name,
					);
					unset($obXML);
				}
			}
    }
		$XMLReader->Close();
		unset($XMLReader);
		// BRANDS
		$XMLReader = new XMLReader();
		$this->arXMLBrands = array();
    $XMLReader->Open($this->arFiles['brands']['FILE_ABS']);
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT) {
				if($XMLReader->localName=='item') {
					$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
					$ID = (string)$obXML->id;
					$Name = (string)$obXML->name;
					if(!CWDI::IsUtf()){
						$Name = CWDI::ConvertCharset($Name);
					}
					$this->arXMLBrands[$ID] = array(
						'NAME' => $Name,
					);
					unset($obXML);
				}
			}
    }
		$XMLReader->Close();
		unset($XMLReader);
		// CATEGORIES
		$XMLReader = new XMLReader();
		$this->arXMLCategories = array();
    $XMLReader->Open($this->arFiles['categories']['FILE_ABS']);
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT) {
				if($XMLReader->localName=='item') {
					$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
					$ID = (int)$obXML->id;
					$Name = (string)$obXML->name;
					$Slug = (string)$obXML->slug;
					if(!CWDI::IsUtf()){
						$Name = CWDI::ConvertCharset($Name);
						$Slug = CWDI::ConvertCharset($Slug);
					}
					$this->arXMLCategories[$ID] = array(
						'ID' => $ID,
						'ID_FULL' => (string)$obXML->id,
						'PARENT_ID' => (int)$obXML->parent_id,
						'NAME' => $Name,
						'SLUG' => $Slug,
						'PATH' => (string)$obXML->path,
					);
					unset($obXML);
				}
			}
    }
		$XMLReader->Close();
		unset($XMLReader);
		// STOCK
		$XMLReader = new XMLReader();
		$this->arXMLStock = array();
    $XMLReader->Open($this->arFiles['stock']['FILE_ABS']);
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT) {
				if($XMLReader->localName=='item') {
					$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
					$ProductID = (string)$obXML->product_id;
					$Quantity = (int)$obXML->stock;
					if($Quantity<0) {
						$Quantity = 0;
					}
					$WarehouseKey = $this->GetWarehouseKey((string)$obXML->warehouse_id);
					if(is_numeric($WarehouseKey) && $WarehouseKey>=0) {
						if(!is_array($this->arXMLStock[$ProductID])){
							$this->arXMLStock[$ProductID] = array();
						}
						$this->arXMLStock[$ProductID][$WarehouseKey] = $Quantity;
					}
					unset($obXML);
				}
			}
    }
		$XMLReader->Close();
		unset($XMLReader);
		// PRODUCTS
		$XMLReader = new XMLReader();
		$Count = 0;
    $XMLReader->Open($this->arFiles['products']['FILE_ABS']);
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT && $XMLReader->localName=='group') {
				$Count++;
			}
		}
		$XMLReader->Close();
		unset($XMLReader);
		//
		$XMLReader = new XMLReader();
		$Index = 0;
    $XMLReader->Open($this->arFiles['products']['FILE_ABS']);
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT && $XMLReader->localName=='group') {
				CWDI::CheckManualStop();
				$Index++;
				$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
				$arGroupItems = array();
				foreach($obXML->item as $obXMLItem){
					$arImages = array();
					foreach($obXMLItem->images->item as $obImage){
						$arImages[] = self::DelayDownload((string)$obImage->superbig, $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('APIKEY'=>$this->arFields['PARAMS']['APIKEY'],'UPDATED_AT'=>(string)$obImage->updated_at));
					}
					$arColors = array();
					foreach($obXMLItem->colors->item as $obColor){
						$arColors[] = (string)$obColor->name;
					}
					$arCategories = array();
					foreach($obXMLItem->categories->item as $obCategory){
						$arCategories[] = (int)$obCategory;
					}
					$arAttributes = array();
					foreach($obXMLItem->attributes->item as $obAttribute){
						$Attribute = (string)$obAttribute->name;
						if(!CWDI::IsUtf()){
							$Attribute = CWDI::ConvertCharset($Attribute);
						}
						$Attribute = CWDI::Translit($Attribute,array('max_len'=>'256','change_case'=>'L','replace_space'=>'_','replace_other'=>'_','delete_repeat_replace'=>'true'));
						$arAttributes[$Attribute] = (string)$obAttribute->value;
					}
					$arMaterials = array();
					foreach($obXMLItem->materials->item as $obMaterial){
						$arMaterials[] = (string)$obMaterial;
					}
					$ProductID = (string)$obXMLItem->id;
					$arSizes = explode(self::ATTR_SIZE_DELIMITER,$arAttributes[self::ATTR_SIZE]);
					$arItem = array(
						'GROUP_ID' => (string)$obXML->attributes()->id,
						'PRODUCT_ID' => $ProductID,
						'ACTICLE' => (string)$obXMLItem->article,
						'PARENT_COLOR_ID' => (string)$obXMLItem->parent_color_id,
						'PARENT_SIZE_ID' => (string)$obXMLItem->parent_size_id,
						'NAME' => (string)$obXMLItem->name,
						'FULL_NAME' => (string)$obXMLItem->full_name,
						'SIZE' => (string)$obXMLItem->size,
						'PRICE' => (float)$obXMLItem->price,
						'DISCOUNT_PRICE' => (int)$obXMLItem->discount_price,
						'DISCOUNT_GROUP_ID' => (int)$obXMLItem->discount_group_id,
						'IMAGES' => $arImages,
						'COLORS' => $arColors,
						'CATEGORIES' => $arCategories,
						'BRAND_ID' => (int)$obXMLItem->brand_id,
						'IS_VIRTUAL' => (int)$obXMLItem->is_virtual,
						'RATING' => (int)$obXMLItem->rating,
						'DESCRIPTION' => (string)$obXMLItem->description,
						'ATTRIBUTES' => $arAttributes,
						'MATERIALS' => $arMaterials,
						'BRAND' => (string)$obXMLItem->brand,
						'BRANDING' => explode(', ',(string)$obXMLItem->branding),
						'ATTR_WEIGHT' => $arAttributes[self::ATTR_WEIGHT],
						'ATTR_LENGTH' => $arSizes[0],
						'ATTR_WIDTH' => $arSizes[1],
						'ATTR_HEIGHT' => $arSizes[2],
						'DEFECT' => (string)$obXMLItem->defect,
					);
					$strCurrency = $arData['PROFILE']['PARAMS']['DEFAULT_CURRENCY'];
					if(!in_array($strCurrency, array('RUB')) && CModule::includeModule('currency')){
						$arItem['PRICE'] = CCurrencyRates::ConvertCurrency($arItem['PRICE'], 'RUB', $strCurrency);
						$arItem['DISCOUNT_PRICE'] = CCurrencyRates::ConvertCurrency($arItem['DISCOUNT_PRICE'], 'RUB', $strCurrency);
					}
					$arItem['PRICE'];
					if(empty($arItem['NAME'])) {
						$arItem['NAME'] = $arItem['FULL_NAME'];
					} elseif(empty($arItem['FULL_NAME'])) {
						$arItem['FULL_NAME'] = $arItem['NAME'];
					}
					$arStockItems = $this->arXMLStock[$ProductID];
					$StockSumm = 0;
					$arWarehouseToQuantity = $this->arFields['PARAMS']['S'][0]['WAREHOUSES_TO_QUANTITY'];
					foreach($this->arXMLWarehouses as $Key => $arWarehouse){
						$StockCount = IntVal($arStockItems[$Key]);
						$arItem['WAREHOUSE_'.$arWarehouse['ID']] = $StockCount;
						if(!is_array($arWarehouseToQuantity) || empty($arWarehouseToQuantity) || is_array($arWarehouseToQuantity) && $arWarehouseToQuantity[$arWarehouse['ID']]=='Y') {
							$StockSumm += $StockCount;
						}
					}
					$arItem['QUANTITY'] = $StockSumm;
					if(!CWDI::IsUtf()){
						$arItem = CWDI::ConvertCharset($arItem);
					}
					$arGroupItems[] = $arItem;
				}
				$this->ProcessGroup($arGroupItems,$arData);
				self::ProfileSetStatus($arData['PROFILE']['ID'], 'READ', $Index, $Count);
			}
    }
		$XMLReader->Close();
		unset($XMLReader);
		//
		return true;
	}
	
	public function OnDelayImageDownload($Image, $Args=array()){
		$arRequestParams = array(
			'URL' => $Image,
			'METHOD' => 'GET',
			'TIMEOUT' => self::TIMEOUT,
			'BASIC_AUTH' => base64_encode($Args['APIKEY'].':'),
			'SKIP_HTTPS_CHECK' => true,
			'HEADER' => "Accept: */*\r\n".
									"Accept-language: en\r\n".
									"Accept-Encoding: gzip,deflate,sdch\r\n".
									"Connection: Close\r\n",
		);
		$strData = CWDI::Request($arRequestParams);
		if(is_array($GLOBALS['WDI_RESPONSE_HEADERS'])) {
			foreach($GLOBALS['WDI_RESPONSE_HEADERS'] as $strHeader){
				if(preg_match('#^HTTP/1\.(1|0) 200 OK$#i',$strHeader)) {
					$Dir = '/'.COption::GetOptionString('main', 'upload_dir', 'upload').'/'.WDI_MODULE.'/oasiscatalog/tmp/';
					if(!is_dir($_SERVER['DOCUMENT_ROOT'].$Dir)) {
						mkdir($_SERVER['DOCUMENT_ROOT'].$Dir,BX_DIR_PERMISSIONS,true);
					}
					if(is_dir($_SERVER['DOCUMENT_ROOT'].$Dir)) {
						$strBasename = pathinfo($Image,PATHINFO_BASENAME);
						$strFileName = $Dir.$strBasename;
						if (file_put_contents($_SERVER['DOCUMENT_ROOT'].$strFileName, $strData)) {
							$arFile = CWDI::MakeFileArray($strFileName, false, false, $strBasename);
							if($arFile['type'] == 'application/octet-stream'){
								switch(ToUpper(pathinfo($arFile['name'], PATHINFO_EXTENSION))){
									case 'JPG':
									case 'JPEG':
										$arFile['type'] = 'image/jpeg';
									case 'PNG':
										$arFile['type'] = 'image/png';
									case 'GIF':
										$arFile['type'] = 'image/gif';
								}
							}
							return $arFile;
						}
					}
				}
			}
		}
		return false;
	}
	
	public function OnObjectProcessed($ObjectID, $arObject, $arData, $arFields, $intResult){
		if(in_array($arObject['TYPE'],array('E','O'))) {
			$strTmpDir = '/upload/webdebug.import/oasiscatalog/tmp/';
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
	 *	Получение порядкового номера склада по его ID
	 */
	private function GetWarehouseKey($ID) {
		if($GLOBALS['WDI_OASISCATALOG_WAREHOUSES'][$ID]>0) {
			return $GLOBALS['WDI_OASISCATALOG_WAREHOUSES'][$ID];
		} else {
			foreach($this->arXMLWarehouses as $Key => $arWarehouse){
				if($arWarehouse['ID']==$ID){
					$GLOBALS['WDI_OASISCATALOG_WAREHOUSES'][$ID] = $Key;
					return $Key;
				}
			}
		}
		return false;
	}
	
	/**
	 *	Обработка одной группы
	 */
	private function ProcessGroup($arGroupItems, $arData){
		$arParams = $this->arFields['PARAMS'];
		if($arParams['LOAD_OFFERS']=='Y') {
			$intParentProductID = false;
			$SkipSingleOffer = count($arGroupItems)===1 && $arParams['S'][0]['SKIP_SINGLE_OFFER']=='Y';
			foreach($arGroupItems as $arItem){
				$intParentProductID = $this->ProcessElement($arItem, $arItem['GROUP_ID'], $arData);
				break;
			}
			if(!$SkipSingleOffer && $intParentProductID>0){
				foreach($arGroupItems as $arItem){
					$this->ProcessOffer($intParentProductID, $arItem, $arData);
				}
			}
		} else {
			foreach($arGroupItems as $arItem){
				$this->ProcessElement($arItem, $arItem['PRODUCT_ID'], $arData);
			}
		}
	}
	
	/**
	 *	Обработка одного товара
	 */
	private function ProcessElement($arItem, $ElementExternalID, $arData){
		$arParams = $this->arFields['PARAMS'];
		$ObjectType = 'ELEMENT';
		$arMatches = $this->arFields['MATCHES']['S'][0][$ObjectType];
		$SectionID = $arParams['S'][0]['SECTION_ID'];
		$SessionID = $arData['SESSION_ID'];
		$ProfileID = $this->arFields['ID'];
		//
		$arAdditionalParams = array(
			'OBJECT_TYPE' => $ObjectType,
			'OBJECT' => $arItem,
		);
		// Загрузка разделов товара
		$arParentID = array();
		$arCategoriesTrees = $this->GetCategories($arItem['CATEGORIES'], $arData);
		foreach($arCategoriesTrees as $Key => $arTree){
			if(empty($arTree)) {
				unset($arCategoriesTrees[$Key]);
			}
		}
		foreach($arCategoriesTrees as $Key1 => $arTree){
			$ParentObjectID = false;
			foreach($arTree as $Key2 => $arCategory){
				if($this->arXMLCategories[$arCategory['ID']]['OBJECT_ID']>0) {
					$ParentObjectID = $this->arXMLCategories[$arCategory['ID']]['OBJECT_ID'];
				} else {
					$arSection = $arCategory;
					$arSectionAdditionalParams = array(
						'OBJECT_TYPE' => 'SECTION',
						'OBJECT' => $arSection,
					);
					$arSectionMatches = $this->arFields['MATCHES']['S'][0]['SECTION'];
					$arSectionObject = self::ProcessMatches($arSectionMatches, $arSection, array($this,'ProcessMatchSingle'), $this->arFields, $arSectionAdditionalParams, $arSection['ID_FULL']);
					$arSectionFilter = $this->BuildFilter($arSectionObject, 'SECTION');
					$ExternalID = '';
					$ParentObjectID = self::ReadObject($arSectionObject, 'SECTION', $ParentObjectID, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arSectionFilter, $arSection['ID_FULL'], $arDebugData = array());
					if($ParentObjectID>0) {
						$this->arXMLCategories[$arCategory['ID']]['OBJECT_ID'] = $ParentObjectID;
					}
				}
			}
			$arParentID[] = $ParentObjectID;
		}
		// т.к. в группе товары с одним названием, то нужно добавлять к ним уточнение в скобках в конце названия
		$strRawName = $arItem['NAME'];
		$arNameID = array();
		$strSize = trim($arItem['SIZE']);
		$strColors = is_array($arItem['COLORS']) ? implode(', ',$arItem['COLORS']) : trim($arItem['COLORS']);
		if(!empty($strColors)) {
			$arNameID[] = $strColors;
		}
		if(!empty($strSize) && empty($arNameID)) {
			$arNameID[] = $strSize;
		}
		if($arItem['NAME']==$arItem['FULL_NAME']) {
			$arItem['FULL_NAME'] = $arItem['NAME'].' ('.implode(', ',$arNameID).')';
		}
		if($arParams['S'][0]['LINK']['ELEMENT']['FIELD']=='name' && !empty($arNameID)){
			$arItem['NAME'] = $arItem['NAME'].' ('.implode(', ',$arNameID).')';
		}
		// Загрузка самого товара
		$arObject = self::ProcessMatches($arMatches, $arItem, array($this,'ProcessMatchSingle'), $this->arFields, $arAdditionalParams, $ElementExternalID);
		$arFilter = $this->BuildFilter($arObject, 'ELEMENT');
		$ObjectID = self::ReadObject($arObject, $ObjectType, $arParentID, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $ElementExternalID, $arDebugData = array());
		return $ObjectID;
	}
	
	/**
	 *	Обработка одного торгового предложения
	 */
	private function ProcessOffer($ParentProductID, $arItem, $arData){
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
		$arObject = self::ProcessMatches($arMatches, $arItem, array($this,'ProcessMatchSingle'), $this->arFields, $arAdditionalParams, $arItem['PRODUCT_ID']);
		$arFilter = $this->BuildFilter($arObject, 'OFFER');
		$ObjectID = self::ReadObject($arObject, $ObjectType, $ParentProductID, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, '', $arDebugData = array());
	}
	
	/**
	 *	Определение категорий-родителя
	 */
	private function GetCategories($arCategories, $arData){
		$arResult = array();
		if(is_array($arCategories)) {
			foreach($arCategories as $CategoryID){
				//
				$arTree = array();
				while (true) {
					$arCategory = $this->arXMLCategories[$CategoryID];
					if(!is_array($arCategory)) {
						break;
					}
					$arTree[] = $arCategory;
					$CategoryID = $arCategory['PARENT_ID'];
					if($arCategory['PARENT_ID']=='0'){
						break;
					}
				}
				$arTree = array_reverse($arTree);
				$arResult[] = $arTree;
				//
			}
		}
		return $arResult;
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
		$arSection = array(
			'ID' => array('NAME'=>GetMessage('WDI_OASISCATALOG_SECTION_ID')),
			'NAME' => array('NAME'=>GetMessage('WDI_OASISCATALOG_SECTION_NAME')),
			'SLUG' => array('NAME'=>GetMessage('WDI_OASISCATALOG_SECTION_SLUG')),
			'PATH' => array('NAME'=>GetMessage('WDI_OASISCATALOG_SECTION_PATH')),
		);
		$arElement = array(
			'PRODUCT_ID' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_PRODUCT_ID')),
			'GROUP_ID' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_GROUP_ID')),
			'NAME' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_NAME')),
			'FULL_NAME' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_FULL_NAME')),
			'DESCRIPTION' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_DESCRIPTION')),
			'ACTICLE' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_ACTICLE')),
			'SIZE' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_SIZE')),
			'PRICE' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_PRICE')),
			'DISCOUNT_PRICE' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_DISCOUNT_PRICE')),
			'DISCOUNT_GROUP_ID' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_DISCOUNT_GROUP_ID')),
			'IMAGES' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_IMAGES')),
			'COLORS' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_COLORS')),
			'CATEGORIES' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_CATEGORIES')),
			'BRAND_ID' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_BRAND_ID')),
			'IS_VIRTUAL' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_IS_VIRTUAL')),
			'RATING' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_RATING')),
			'MATERIALS' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_MATERIALS')),
			'BRAND' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_BRAND')),
			'BRANDING' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_BRANDING')),
			'ATTR_WEIGHT' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_ATTRIBUTE_EX_WEIGHT')),
			'ATTR_LENGTH' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_ATTRIBUTE_EX_LENGTH')),
			'ATTR_WIDTH' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_ATTRIBUTE_EX_WIDTH')),
			'ATTR_HEIGHT' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_ATTRIBUTE_EX_HEIGHT')),
			'WAREHOUSE_000000027' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_WAREHOUSE_000000027')),
			'WAREHOUSE_000000029' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_WAREHOUSE_000000029')),
			'WAREHOUSE_000000034' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_WAREHOUSE_000000034')),
			'WAREHOUSE_000000039' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_WAREHOUSE_000000039')),
			'WAREHOUSE_1-0000034' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_WAREHOUSE_1-0000034')),
			'WAREHOUSE_1-0000052' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_WAREHOUSE_1-0000052')),
			'QUANTITY' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_QUANTITY')),
			'DEFECT' => array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_DEFECT')),
		);
		$arAttributes = array('nfc', 'besprovodnaya_peredacha', 'versiya_bluetooth', 'ves', 'vid_zastezhki', 
			'vid_mekhanizma', 'vmestimost', 'vodozashchita', 'vodostoykost', 'vozmozhnost_zameny_sterzhnya_kartridzha', 
			'vozmozhnost_naneseniya', 'vremya_vosproizvedeniya', 'vkhodnye_parametry', 'vysota_vorotnika', 
			'vykhodnye_parametry', 'garantiya', 'germetichnost', 'dalnost_osveshcheniya', 'data', 'derzhatel_dlya_ruchki',
			'diagonal_ekrana', 'diametr_vkhodnogo_zrachka', 'diametr_dinamika', 'diametr_kupola', 'diametr_ruchki_zonta', 
			'dlina_izdeliya_po_tsentru_spinki', 'dlina_kabelya', 'dlina_pereda_ot_verkhney_plechevoy_tochki', 
			'dlina_po_tsentru_pereda_ot_shva_vtachivaniya_vorotnika', 'dlina_proymy', 'dlina_rukava',
			'dlina_rukava_ot_tsentra_spiny', 'dlina_ruchek', 'dlina_spinki_ot_verkhney_plechevoy_tochki', 
			'dlina_spinki_ot_vysshey_tochki_plechevogo_shva', 'dlina_shkaly', 'dopusk', 'emkost_elementa', 'iznanka', 
			'indikatsiya', 'instruktsiya', 'interfeys', 'istochnik_pitaniya', 'karman_dlya_bumag', 'kol_vo_vizitok_kart', 
			'kol_vo_lampochek', 'kol_vo_listov', 'kol_vo_paneley', 'kol_vo_person', 'kol_vo_slozheniy', 'kol_vo_spits', 
			'kol_vo_fotografiy', 'kol_vo_tsiklov', 'komplektnost', 'kontrol_gromkosti', 'koeffitsient_peredachi', 
			'kratnost_uvelichenie', 'kreplenie_bloka', 'lichnye_dannye', 'lyasse', 'maksimalnaya_moshchnost', 
			'maksimalnaya_nagruzka', 'marka_stali', 'massa_netto', 'material_platka_sharfa', 'material_ruchki', 
			'material_sterzhnya', 'material_tovara', 'mesto_sbora', 'metod_naneseniya', 'mikrofon', 'moshchnost', 
			'nalichie_chekhla_futlyara', 'nominalnaya_moshchnost', 'oblozhka', 'obkhvat_golovy', 'obkhvat_shei', 'obem', 
			'obem_pamyati', 'plotnost', 'radius_besprovodnoy_zaryadki', 'radius_deystviya', 'razlinovka', 'razmer', 
			'razmer_tovara_sm', 'razmer_fotografii', 'rezinka', 'rossiyskiy_razmer', 'rost', 'svetovoy_potok', 
			'sertifikaty_standarty', 'sistema_zashchity_o_vetra', 'skorost_vosstanovleniya_formy', 'skorost_zapisi', 
			'skorost_chteniya', 'sovmestimost', 'soedinitelnyy_razem', 'soprotivlenie', 'sostav', 
			'spravochnaya_informatsiya', 'srok_godnosti', 'steklo', 'tverdost', 'telefonnaya_kniga',
			'temperaturnyy_rezhim', 'tip_zaryadki', 'tip_konstruktsii', 'tip_krepleniya', 'tip_soedineniya', 
			'tip_sterzhnya', 'tip_ustanovki', 'tolshchina_uzla', 'format', 'tsvet_bumagi', 'tsvet_gravirovki', 
			'tsvet_sreza', 'tsvet_tovara', 'tsvet_chernil', 'chastotnyy_diapazon', 'chuvstvitelnost', 'shirina_vorotnika', 
			'shirina_gorloviny', 'shirina_grudi_izdeliya_po_grudi', 'shirina_izdeliya_pod_proymoy', 
			'shirina_niza_izdeliya_pered', 'shirina_plecha', 'shirina_po_talii_po_talii', 'shirina_rukava_bitseps', 
			'shirina_rukava_po_nizu', 'shirina_rukava_pod_proymoy',
		);
		foreach($arAttributes as $strAttribute){
			$arElement['ATTRIBUTE_'.$strAttribute] = array('NAME'=>GetMessage('WDI_OASISCATALOG_ELEMENT_ATTRIBUTE_'.$strAttribute));
		}
		$arResult = array(
			'ELEMENT' => $arElement,
			'OFFER' => $arElement,
			'SECTION' => $arSection,
		);
		return $arResult;
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