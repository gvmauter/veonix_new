<?self::IncludeLangFile(__FILE__);

class CWDI_Gifts extends CWDI_Handler {
	
	const TIMEOUT = 60;
	
	const IMAGE_URL_PREFIX = 'http://api2.gifts.ru/export/v2/catalogue/';
	const TEMP_SECTION = 'GIFTS_RU_TEMP_SECTION';
	const MODE_FULL = 'full';
	const MODE_STOCK = 'stock';
	
	private $SkipLoadingFiles = true;
	
	public $IBlockID = false;
	public $OffersIBlockID = false;
	public $arFields = array();
	public $arHandler = array();
	public $arFiles = array();
	
	private $arXMLStock = false;
	private $arXMLCategories = false;
	private $arProductSections = false;
	private $arXMLFilters = false;
	
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
		if(defined('WDI_CRON') && $this->SkipLoadingFiles!==true && !$this->CheckLoginPassword($arFields['PARAMS']['LOGIN'],$arFields['PARAMS']['PASSWORD'])){
			$strError = GetMessage('WDI_GIFTS_WRONG_LOGIN_PASSWORD');
			CWDI::L('[GIFTS_0001] '.$strError);
			CWDI::W('[GIFTS_0001] '.$strError);
			die();
		}
		if(defined('WDI_CRON') && $this->SkipLoadingFiles!==true &&!$this->CheckIpLinked()){
			$strError = GetMessage('WDI_GIFTS_IP_NOT_LINKED');
			CWDI::L('[GIFTS_0002] '.$strError);
			CWDI::W('[GIFTS_0002] '.$strError);
			die();
		}
	}
	
	/**
	 *	Проверка логина/пароля
	 */
	public static function CheckLoginPassword($Login, $Password){
		$bResult = false;
		if(!empty($Login) && !empty($Password)) {
			$arRequestParams = array(
				'URL' => 'http://api2.gifts.ru/export/v2/catalogue/filters.xml',
				'METHOD' => 'GET',
				'TIMEOUT' => self::TIMEOUT,
				'BASIC_AUTH' => base64_encode($Login.':'.$Password),
				'SKIP_HTTPS_CHECK' => true,
				'HEADER' => "Accept: */*\r\n".
										"Accept-language: en\r\n".
										"Accept-Encoding: gzip,deflate,sdch\r\n".
										"Connection: Close\r\n",
				'CALLBACK_BEFORE' => array(__CLASS__,'OnBeforeRequest'),
			);
			CWDI::Request($arRequestParams);
			if($GLOBALS['WDI_LAST_HTTP_STATUS']=='200') {
				$bResult = true;
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
				'stock' => false, // остатки и цены
				'tree' => false, // рубрикатор + привязки товаров к разделам
			);
			if($this->arFields['PARAMS']['S'][0]['MODE']!=self::MODE_STOCK) {
				$arFiles = array_merge($arFiles,array(
					'product' => false, // товары
					'filters' => false, // фильтры/свойства
				));
			}
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
				'BASIC_AUTH' => base64_encode($this->arFields['PARAMS']['LOGIN'].':'.$this->arFields['PARAMS']['PASSWORD']),
				'HEADER' => "Accept: */*\r\n".
										"Accept-language: en\r\n".
										"Accept-Encoding: gzip,deflate,sdch\r\n".
										"Connection: Close\r\n",
				'CALLBACK_BEFORE' => array(__CLASS__,'OnBeforeRequest'),
			);
			foreach($arFiles as $FileItem => $strFile){
				$arRequestParams['URL'] = "http://api2.gifts.ru/export/v2/catalogue/{$FileItem}.xml";
				$BaseFileName = self::GetFileBaseName($FileItem.'.xml', $this->arFields['ID']);
				$Dir = $this->arHandler['TMP_DIR'];
				$strData = CWDI::Request($arRequestParams);
				if(strpos($strData,'<?xml version="1.0" encoding="utf-8"?><error>')===0) {
					return false;
				}
				if($GLOBALS['WDI_LAST_HTTP_STATUS']==200) {
					$FileNameFull = $_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileName;
					@unlink($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileName);
					if (!empty($strData) && file_put_contents($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileName,$strData)) {
						if(is_file($FileNameFull) && filesize($FileNameFull)>0){
							$arFiles[$FileItem] = $Dir.$BaseFileName;
						}
					}
				} else {
					print 'Auth error!'; // ToDo: log error
					die();
				}
			}
		}
		$bSuccessCount = 0;
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
				$bSuccessCount++;
			}
		}
		if($bSuccessCount==count($arFiles)) {
			$this->arFiles = is_array($this->arFiles) ? array_merge($this->arFiles,$arFiles) : $arFiles;
			return true;
		}
		return false;
	}
	
	/**
	 *	Проверка того, что gifts.ru говорит о том, что IP не привязан
	 */
	public function CheckIpLinked(){
		$bSkipLoadingFiles = $this->SkipLoadingFiles;
		$this->SkipLoadingFiles = false;
		$this->GetFile('filters');
		$bLinked = false;
		if(is_file($this->arFiles['filters']['FILE_ABS'])) {
			$strContent = file_get_contents($this->arFiles['filters']['FILE_ABS']);
			$bLinked = !(strpos($strContent,'<error>')!==false && strpos($strContent,'</error>')!==false && strpos($strContent,'http://login:password@api2.gifts.ru/export/v2/registerip/')!==false);
			@unlink($this->arFiles['filters']['FILE_ABS']);
		}
		$this->SkipLoadingFiles = $bSkipLoadingFiles;
		return $bLinked;
	}
	
	/**
	 *	Открытие файлов, их чтение и сохранение всех данных в таблице БД
	 */
	public function ReadFileToDatabase(&$arData){
		// Prepare
		$arParams = $this->arFields['PARAMS'];
		$SectionID = $arParams['S'][0]['SECTION_ID'];
		$SessionID = $arData['SESSION_ID'];
		$ProfileID = $this->arFields['ID'];
		
		// Stock
		$this->arXMLStock = array();
		$XMLReader = new XMLReader();
    $XMLReader->Open($this->arFiles['stock']['FILE_ABS']);
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT && $XMLReader->localName=='stock') {
				$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
				$ProductID = (int)$obXML->product_id;
				$this->arXMLStock[$ProductID] = array(
					'STOCK_ID' => $ProductID,
					'STOCK_CODE' => (string)$obXML->code,
					'STOCK_AMOUNT' => (int)$obXML->amount,
					'STOCK_FREE' => (int)$obXML->free,
					'STOCK_IN_WAY_AMOUNT' => (int)$obXML->inwayamount,
					'STOCK_IN_WAY_FREE' => (int)$obXML->inwayfree,
					'STOCK_DEALER_PRICE' => (float)$obXML->dealerprice,
					'STOCK_END_USER_PRICE' => (float)$obXML->enduserprice,
				);
				unset($obXML,$ProductID);
			}
    }
		$XMLReader->Close();
		unset($XMLReader);
		
		// Links to sections [and categories (if not stock mode)]
		$this->arProductSections = array();
		$this->arXMLCategories = array();
    $XMLReader = new XMLReader();
    $XMLReader->Open($this->arFiles['tree']['FILE_ABS']);
		$bFirst = true;
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT && $XMLReader->localName=='page' && ($bFirst || $XMLReader->hasAttributes)) {
				$bFirst = false;
				$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
				$ParentID = (int)$obXML->attributes()->parent_page_id;
				$PageID = (int)$obXML->page_id;
				$arSection = array(
					'PAGE_ID' => $PageID,
					'PARENT_PAGE_ID' => $ParentID,
					'NAME' => (string)$obXML->name,
					'URI' => (string)$obXML->uri,
				);
				if(!CWDI::IsUtf()){
					$arSection['NAME'] = CWDI::ConvertCharset($arSection['NAME']);
				}
				$this->arXMLCategories[$PageID] = array(
					'DATA' => $arSection,
					'OBJECT_ID' => false,
				);
				unset($obXML,$bFirst,$ParentID,$PageID,$arSection);
			} elseif ($XMLReader->nodeType == XMLReader::ELEMENT && $XMLReader->localName=='product' && !is_numeric($XMLReader->ReadInnerXML())){
				$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
				$intProductID = (int)$obXML->product;
				$intSectionID = (int)$obXML->page;
				if($intProductID>0 && $intSectionID>0) {
					if(!isset($this->arProductSections[$intProductID])) {
						$this->arProductSections[$intProductID] = array();
					}
					$this->arProductSections[$intProductID][] = $intSectionID;
				}
				unset($obXML,$intProductID,$intSectionID);
			}
    }
		$XMLReader->Close();
		unset($XMLReader);
		
		if($this->arFields['PARAMS']['S'][0]['MODE']==self::MODE_STOCK) {
			return true;
		}
		
		// Load categories
		foreach($this->arXMLCategories as $CategoryID => $arCategory){
			$arSectionObject = self::ProcessMatches($this->arFields['MATCHES']['S'][0]['SECTION'], $arCategory['DATA'], array($this,'ProcessMatchSingle'), $this->arFields, array('OBJECT_TYPE' => 'SECTION', 'OBJECT' => $arCategory['DATA']), $arCategory['DATA']['PAGE_ID']);
			$arSectionFilter = $this->BuildFilter($arSectionObject, 'SECTION');
			$ParentRawID = $arCategory['DATA']['PARENT_PAGE_ID'];
			$ParentObjectID = false;
			if($ParentRawID>0 && is_array($this->arXMLCategories[$ParentRawID]) && $this->arXMLCategories[$ParentRawID]['OBJECT_ID']>0) {
				$ParentObjectID = $this->arXMLCategories[$ParentRawID]['OBJECT_ID'];
			}
			$ObjectID = self::ReadObject($arSectionObject, 'SECTION', $ParentObjectID, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arSectionFilter, $arCategory['DATA']['PAGE_ID'], $arDebugData = array());
			if($ObjectID>0) {
				$this->arXMLCategories[$CategoryID]['OBJECT_ID'] = $ObjectID;
			}
		}
		
		// Filters
		$this->arXMLFilters = array();
		$XMLReader = new XMLReader();
    $XMLReader->Open($this->arFiles['filters']['FILE_ABS']);
    while($XMLReader->Read()) {
			if($XMLReader->nodeType == XMLReader::ELEMENT && $XMLReader->localName=='filtertype') {
				$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
				$intFilterType = (int)$obXML->filtertypeid;
				$this->arXMLFilters[$intFilterType] = array(
					'NAME' => (string)$obXML->filtertypename,
					'ITEMS' => array(),
				);
				foreach($obXML->filters->filter as $obFilter){
					$this->arXMLFilters[$intFilterType]['ITEMS'][(int)$obFilter->filterid] = (string)$obFilter->filtername;
				}
				unset($obXML,$obFilter,$intFilterType);
			}
    }
		$XMLReader->Close();
		unset($XMLReader);
		
		// PRODUCTS (count)
		$XMLReader = new XMLReader();
		$Count = 0;
    $XMLReader->Open($this->arFiles['product']['FILE_ABS']);
		$intLevel = 0;
    while($XMLReader->Read()) {
			if($XMLReader->localName=='product') {
				if($XMLReader->nodeType==XMLReader::ELEMENT) {
					$intLevel++;
				} elseif($XMLReader->nodeType==XMLReader::END_ELEMENT) {
					$intLevel--;
				}
				if($XMLReader->nodeType == XMLReader::ELEMENT && $XMLReader->localName=='product' && $intLevel===1) {
					$Count++;
					unset($obXML);
				}
			}
		}
		$XMLReader->Close();
		unset($XMLReader);
		
		// PRODUCTS
		$XMLReader = new XMLReader();
		$Index = 0;
    $XMLReader->Open($this->arFiles['product']['FILE_ABS']);
		$intLevel = 0;
    while($XMLReader->Read()) {
			if($XMLReader->localName=='product') {
				if($XMLReader->nodeType==XMLReader::ELEMENT) {
					$intLevel++;
				} elseif($XMLReader->nodeType==XMLReader::END_ELEMENT) {
					$intLevel--;
				}
				if($XMLReader->nodeType == XMLReader::ELEMENT && $XMLReader->localName=='product' && $intLevel===1) {
					$Index++;
					$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
					$strContent = html_entity_decode ((string)$obXML->content);
					$arProduct = array(
						'PRODUCT_ID' => (string)$obXML->product_id,
						'CODE' => (string)$obXML->code,
						'CODE_MAJOR' => reset(explode('.',(string)$obXML->code)),
						'GROUP' => (string)$obXML->group,
						'NAME' => (string)$obXML->name,
						'PRODUCT_SIZE' => (string)$obXML->product_size,
						'MATHERIAL' => (string)$obXML->matherial,
						'CONTENT' => $strContent,
						'CONTENT_NO_LINKS' => preg_replace('#<a.*?>(.*?)</a>#is', '$1',$strContent),
						'BRAND' => (string)$obXML->brand,
						'WEIGHT' => (string)$obXML->weight,
						'SMALL_IMAGE' => self::DelayDownload(self::IMAGE_URL_PREFIX.(string)$obXML->small_image->attributes()->src, $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('L'=>$this->arFields['PARAMS']['LOGIN'],'P'=>$this->arFields['PARAMS']['PASSWORD'])),
						'BIG_IMAGE' => self::DelayDownload(self::IMAGE_URL_PREFIX.(string)$obXML->big_image->attributes()->src, $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('L'=>$this->arFields['PARAMS']['LOGIN'],'P'=>$this->arFields['PARAMS']['PASSWORD'])),
						'SUPER_BIG_IMAGE' => self::DelayDownload(self::IMAGE_URL_PREFIX.(string)$obXML->super_big_image->attributes()->src, $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('L'=>$this->arFields['PARAMS']['LOGIN'],'P'=>$this->arFields['PARAMS']['PASSWORD'])),
						'STATUS' => (string)$obXML->status,
						'STATUS_ID' => (string)$obXML->status->attributes()->id,
						'PACK_AMOUNT' => (string)$obXML->pack->amount,
						'PACK_WEIGHT' => (string)$obXML->pack->weight,
						'PACK_VOLUME' => (string)$obXML->pack->volume,
						'PACK_SIZEX' => (string)$obXML->pack->sizex,
						'PACK_SIZEY' => (string)$obXML->pack->sizey,
						'PACK_SIZEZ' => (string)$obXML->pack->sizez,
						'PRICE_PRICE' => (string)$obXML->price->price,
						'PRICE_CURRENCY' => (string)$obXML->price->currency,
						'PRICE_NAME' => (string)$obXML->price->name,
						'PRINT' => array(),
						'PRINT_1' => array(),
						'IMAGES' => array(),
						'FILES' => array(),
					);
					//
					foreach($obXML->print as $obPrint){
						$arProduct['PRINT'][(string)$obPrint->name] = (string)$obPrint->description;
					}
					foreach($obXML->print as $obPrint){
						$arProduct['PRINT_1'][(string)$obPrint->name] = (string)$obPrint->name.' '.(string)$obPrint->description;
					}
					//
					foreach($obXML->product_attachment as $obAttachment){
						switch((int)$obAttachment->meaning) {
							case 1:
								$arProduct['IMAGES'][] = self::DelayDownload(self::IMAGE_URL_PREFIX.(string)$obAttachment->image, $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('L'=>$this->arFields['PARAMS']['LOGIN'],'P'=>$this->arFields['PARAMS']['PASSWORD']));
								break;
							default:
								$arProduct['FILES'][] = self::DelayDownload(self::IMAGE_URL_PREFIX.(string)$obAttachment->file, $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('L'=>$this->arFields['PARAMS']['LOGIN'],'P'=>$this->arFields['PARAMS']['PASSWORD']));
								break;
						}
					}
					//
					$arFilters = array();
					foreach($obXML->filters->filter as $obFilter) {
						$intFilterType = (int)$obFilter->filtertypeid;
						if($intFilterType>0 && isset($this->arXMLFilters[$intFilterType]) && !empty($this->arXMLFilters[$intFilterType]['ITEMS'])) {
							$intFilterValue = (int)$obFilter->filterid;
							if($intFilterValue>0 && !empty($this->arXMLFilters[$intFilterType]['ITEMS'][$intFilterValue])) {
								if(!isset($arFilters[$intFilterType])){
									$arFilters[$intFilterType] = array();
								} elseif (!is_array($arFilters[$intFilterType])) {
									$arFilters[$intFilterType] = array($arFilters[$intFilterType]);
								}
								$arFilters[$intFilterType][] = $this->arXMLFilters[$intFilterType]['ITEMS'][$intFilterValue];
							}
						}
					}
					foreach($arFilters as $Key => $arFilter){
						if(is_array($arFilter) && count($arFilter)==1) {
							$arFilters[$Key] = reset($arFilter);
						}
					}
					foreach($arFilters as $Key => $arFilter){
						$arProduct['FILTER_'.$Key] = $arFilter;
					}
					//
					$arOffers = array();
					foreach($obXML->product as $obOffer){
						$arOffers[] = array(
							'OFFER_PRODUCT_ID' => (string)$obOffer->product_id,
							'OFFER_MAIN_PRODUCT' => (string)$obOffer->main_product,
							'OFFER_CODE' => (string)$obOffer->code,
							'OFFER_CODE_MAJOR' => reset(explode('.',(string)$obOffer->code)),
							'OFFER_NAME' => (string)$obOffer->name,
							'OFFER_SIZE_CODE' => (string)$obOffer->size_code,
							'OFFER_WEIGHT' => (string)$obOffer->weight,
							'OFFER_PRICE' => (string)$obOffer->price->price,
							'OFFER_PRICE_CURRENCY' => (string)$obOffer->price->currency,
							'OFFER_PRICE_NAME' => (string)$obOffer->price->name,
						);
					}
					if(empty($arOffers) && $this->arFields['PARAMS']['LOAD_OFFERS']!='Y'){
						$arOffers[] = array(
							'OFFER_PRODUCT_ID' => $arProduct['PRODUCT_ID'],
							'OFFER_MAIN_PRODUCT' => $arProduct['PRODUCT_ID'],
							'OFFER_CODE' => $arProduct['CODE'],
							'OFFER_CODE_MAJOR' => $arProduct['CODE_MAJOR'],
							'OFFER_NAME' => $arProduct['NAME'],
							'OFFER_SIZE_CODE' => $arProduct['PRODUCT_SIZE'],
							'OFFER_WEIGHT' => $arProduct['WEIGHT'],
							'OFFER_PRICE' => $arProduct['PRICE_PRICE'],
							'OFFER_PRICE_CURRENCY' => $arProduct['PRICE_CURRENCY'],
							'OFFER_PRICE_NAME' => $arProduct['PRICE_NAME'],
						);
					}
					//
					if(!CWDI::IsUtf()){
						$arProduct = CWDI::ConvertCharset($arProduct);
						$arOffers = CWDI::ConvertCharset($arOffers);
					}
					$bSkipSingleOffer = count($arOffers)===1 && $arParams['S'][0]['SKIP_SINGLE_OFFER']=='Y';
					if($this->arFields['PARAMS']['LOAD_OFFERS']=='Y' && !$bSkipSingleOffer) {
						// загрузка товара
						$arStockProduct = $this->arXMLStock[$arProduct['PRODUCT_ID']];
						if(is_array($arStockProduct)) {
							$arProduct = array_merge($arProduct,$arStockProduct);
						}
						$intProductID = $this->ProcessElement($arProduct, $arData);
						// загрузка торговым предложениям
						foreach($arOffers as $arOffer){
							$arStockOffer = $this->arXMLStock[$arOffer['OFFER_PRODUCT_ID']];
							if(is_array($arStockOffer)) {
								$arOffer = array_merge($arOffer,$arStockOffer);
							}
							$this->ProcessOffer($intProductID, array_merge($arProduct,$arOffer), $arData);
						}
					} else {
						// загрузка без торговых предложений
						foreach($arOffers as $arOffer){
							$arStockOffer = $this->arXMLStock[$arOffer['OFFER_PRODUCT_ID']];
							if(is_array($arStockOffer)) {
								$arOffer = array_merge($arOffer,$arStockOffer);
							}
							$this->ProcessElement(array_merge($arProduct,$arOffer), $arData);
						}
					}
					//
					self::ProfileSetStatus($arData['PROFILE']['ID'], 'READ', $Index, $Count);
					unset($arXML, $obXML, $obPrint, $obAttachment, $obFilter, $intFilterType, $intFilterValue, $Key, $arFilters, $strContent, $arOffers, $obOffer);
				}
			}
		}
		$XMLReader->Close();
		unset($XMLReader);
		//
		return true;
	}
	
	/**
	 *	Обработчик OnAfterPreProcess
	 */
	public function OnAfterPreProcess($arFields,$ObjectID,$arObject,$arData){
		if($arObject['TYPE']=='S') {
			if($arFields['CODE']==self::TEMP_SECTION) {
				$arFields['ACTIVE'] = 'N';
				$arFields['EXTERNAL_ID'] = self::TEMP_SECTION;
				$arFields['UF_WDI_EXTERNAL_ID'] = self::TEMP_SECTION;
				if($ObjectID>0) {
					unset($arFields['NAME']);
				}
			}
		}
		return $arFields;
	}
	
	/**
	 *	Защита от создания более 5 запросов в секунду
	 */
	public function OnBeforeRequest($arParams){
		$intMaxCount = 5;
		$fMaxTime = 1;
		$fCoefficient = 1.05;
		$fMaxTime *= $fCoefficient;
		$Key = 'WDI_REQUEST_TIME';
		$GLOBALS[$Key] = is_array($GLOBALS[$Key]) ? $GLOBALS[$Key] : array();
		array_unshift($GLOBALS[$Key],CWDI::GetMicroTime());
		$GLOBALS[$Key] = array_slice($GLOBALS[$Key],0,$intMaxCount);
		if(count($GLOBALS[$Key])>1) {
			$fFirst = reset($GLOBALS[$Key]);
			$fLast = end($GLOBALS[$Key]);
			$fDelta = $fFirst - $fLast;
			if($fDelta<$fMaxTime) {
				$fSleepTime = $fMaxTime - $fDelta;
				usleep($fSleepTime*1000000);
			}
		}
	}
	
	public function OnAfterRequest($arParams, $strResult, $arResponseHeaders, $intHttpStatus){
		
	}
	
	public function OnDelayImageDownload($Image, $Args=array()){
		$arRequestParams = array(
			'URL' => $Image,
			'METHOD' => 'GET',
			'TIMEOUT' => self::TIMEOUT,
			'BASIC_AUTH' => base64_encode($Args['L'].':'.$Args['P']),
			'SKIP_HTTPS_CHECK' => true,
			'HEADER' => "Accept: */*\r\n".
									"Accept-language: en\r\n".
									"Connection: Close\r\n",
			'CALLBACK_BEFORE' => array(__CLASS__,'OnBeforeRequest'),
		);
		$strData = CWDI::Request($arRequestParams);
		if($GLOBALS['WDI_LAST_HTTP_STATUS']=='200') {
			$Dir = '/'.COption::GetOptionString('main', 'upload_dir', 'upload').'/'.WDI_MODULE.'/gifts/tmp/';
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
			$strTmpDir = '/upload/webdebug.import/gifts/tmp/';
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
		$arAdditionalParams = array(
			'OBJECT_TYPE' => $ObjectType,
			'OBJECT' => $arItem,
		);
		// Загрузка самого товара
		$arParentID = $this->arProductSections[$arItem['PRODUCT_ID']];
		if(is_array($arParentID)) {
			foreach($arParentID as $Key => $intRawParentID){
				if(is_array($this->arXMLCategories[$intRawParentID]) && $this->arXMLCategories[$intRawParentID]['OBJECT_ID']>0) {
					$arParentID[$Key] = $this->arXMLCategories[$intRawParentID]['OBJECT_ID'];
				} else {
					unset($arParentID[$Key]);
				}
			}
		}
		// Почему-то в выгрузке от gifts.ru обязательно есть несколько товаров, для которых не указан раздел..
		// По состоянию на 2017-10-17 таких товаров 8.
		if(empty($arParentID)/* && empty($SectionID)*/) {
			if ($GLOBALS['WDI_GIFTS_SECTION_FOR_ORPHAN']>0) {
				$arParentID = array($GLOBALS['WDI_GIFTS_SECTION_FOR_ORPHAN']);
			} else {
				$arSectionObject = array(
					'NAME' => array(
						'RAW' => GetMessage('WDI_GIFTS_TEMP_SECTION'),
						'MATCH' => array(
							'TYPE' => 'S',
							'IBLOCK_ID' => $this->IBlockID,
						),
						'PARAMS' => array(
							'OBJECT_TYPE' => 'SECTION',
						),
					),
					'CODE' => array(
						'RAW' => self::TEMP_SECTION,
						'MATCH' => array(
							'TYPE' => 'S',
							'IBLOCK_ID' => $this->IBlockID,
						),
						'PARAMS' => array(
							'OBJECT_TYPE' => 'SECTION',
						),
					),
				);
				$arSectionFilter = array(
					'=CODE' => array(
						'RAW' => self::TEMP_SECTION,
						'MATCH' => array(
							'TYPE' => 'S',
							'MULTIPLE' => 'N',
							'IBLOCK_ID' => $this->IBlockID,
							'HLBLOCK_ID' => '0',
							'SOURCE' => false,
						),
						'PARAMS' => array(
							'OBJECT_TYPE' => 'SECTION',
						),
					),
				);
				$ParentObjectID = self::ReadObject($arSectionObject, 'SECTION', 0, $this->IBlockID, $arParams['S'][0]['SECTION_ID'], $arData['SESSION_ID'], $this->arFields['ID'], $arSectionFilter, self::TEMP_SECTION, $arDebugData = array());
				if($ParentObjectID>0) {
					$GLOBALS['WDI_GIFTS_SECTION_FOR_ORPHAN'] = $ParentObjectID;
					$arParentID = array($ParentObjectID);
				}
			}
		}
		// Загружаем!
		$arObject = self::ProcessMatches($arMatches, $arItem, array($this,'ProcessMatchSingle'), $this->arFields, $arAdditionalParams, $arItem['PRODUCT_ID']);
		$arFilter = $this->BuildFilter($arObject, 'ELEMENT');
		$ObjectID = self::ReadObject($arObject, $ObjectType, $arParentID, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $arItem['PRODUCT_ID'], $arDebugData = array());
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
		$arObject = self::ProcessMatches($arMatches, $arItem, array($this,'ProcessMatchSingle'), $this->arFields, $arAdditionalParams, $arItem['OFFER_PRODUCT_ID']);
		$arFilter = $this->BuildFilter($arObject, 'OFFER');
		$ObjectID = self::ReadObject($arObject, $ObjectType, $ParentProductID, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $arItem['PRODUCT_ID'], $arDebugData = array());
	}
	
	/**
	 *	Обработка одного соответствия, для сохранения на этапе чтения данных
	 */
	public function ProcessMatchSingle($Target, $arMatch, $arObject, $arParams){
		$ValueRaw = $arObject[$arMatch['SOURCE']];
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
		if($this->arFields['PARAMS']['S'][0]['MODE']!=self::MODE_STOCK) {
			$arSection = array(
				'PAGE_ID' => array('NAME'=>GetMessage('WDI_GIFTS_SECTION_PAGE_ID')),
				'PARENT_PAGE_ID' => array('NAME'=>GetMessage('WDI_GIFTS_SECTION_PARENT_PAGE_ID')),
				'NAME' => array('NAME'=>GetMessage('WDI_GIFTS_SECTION_NAME')),
				'URI' => array('NAME'=>GetMessage('WDI_GIFTS_SECTION_URI')),
			);
			$arElement = array(
				'PRODUCT_ID' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PRODUCT_ID'),'GROUP'=>'GENERAL'),
				'CODE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_CODE'),'GROUP'=>'GENERAL'),
				'CODE_MAJOR' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_CODE_MAJOR'),'GROUP'=>'GENERAL'),
				'GROUP' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_GROUP'),'GROUP'=>'GENERAL'),
				'NAME' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_NAME'),'GROUP'=>'GENERAL'),
				'PRODUCT_SIZE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PRODUCT_SIZE'),'GROUP'=>'GENERAL'),
				'MATHERIAL' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_MATHERIAL'),'GROUP'=>'GENERAL'),
				'CONTENT' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_CONTENT'),'GROUP'=>'GENERAL'),
				'CONTENT_NO_LINKS' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_CONTENT_NO_LINKS'),'GROUP'=>'GENERAL'),
				'BRAND' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_BRAND'),'GROUP'=>'GENERAL'),
				'WEIGHT' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_WEIGHT'),'GROUP'=>'GENERAL'),
				'SMALL_IMAGE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_SMALL_IMAGE'),'GROUP'=>'GENERAL'),
				'BIG_IMAGE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_BIG_IMAGE'),'GROUP'=>'GENERAL'),
				'SUPER_BIG_IMAGE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_SUPER_BIG_IMAGE'),'GROUP'=>'GENERAL'),
				'STATUS' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STATUS'),'GROUP'=>'GENERAL'),
				'STATUS_ID' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STATUS_ID'),'GROUP'=>'GENERAL'),
				'PACK_AMOUNT' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PACK_AMOUNT'),'GROUP'=>'GENERAL'),
				'PACK_WEIGHT' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PACK_WEIGHT'),'GROUP'=>'GENERAL'),
				'PACK_VOLUME' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PACK_VOLUME'),'GROUP'=>'GENERAL'),
				'PACK_SIZEX' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PACK_SIZEX'),'GROUP'=>'GENERAL'),
				'PACK_SIZEY' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PACK_SIZEY'),'GROUP'=>'GENERAL'),
				'PACK_SIZEZ' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PACK_SIZEZ'),'GROUP'=>'GENERAL'),
				'PRICE_PRICE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PRICE_PRICE'),'GROUP'=>'GENERAL'),
				'PRICE_CURRENCY' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PRICE_CURRENCY'),'GROUP'=>'GENERAL'),
				'PRICE_NAME' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PRICE_NAME'),'GROUP'=>'GENERAL'),
				'PRINT' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PRINT'),'GROUP'=>'GENERAL'),
				'PRINT_1' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_PRINT_1'),'GROUP'=>'GENERAL'),
				'IMAGES' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_IMAGES'),'GROUP'=>'GENERAL'),
				'FILES' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_FILES'),'GROUP'=>'GENERAL'),
			);
			// Filters
			$this->SetSkipLoadingFiles(true);
			if ($this->GetFile('filters')) {
				$this->arXMLFilters = array();
				$XMLReader = new XMLReader();
				$XMLReader->Open($this->arFiles['filters']['FILE_ABS']);
				while($XMLReader->Read()) {
					if($XMLReader->nodeType == XMLReader::ELEMENT && $XMLReader->localName=='filtertype') {
						$obXML = simplexml_load_string($XMLReader->ReadOuterXML());
						$intFilterType = (int)$obXML->filtertypeid;
						$strFilterName = (string)$obXML->filtertypename;
						if(!CWDI::IsUtf()){
							$strFilterName = CWDI::ConvertCharset($strFilterName);
						}
						$arElement['FILTER_'.$intFilterType] = array('NAME'=>$strFilterName.GetMessage('WDI_GIFTS_GROUP_ELEMENT_FILTER'),'GROUP'=>'FILTERS');
						unset($obXML,$obFilter,$intFilterType,$strFilterName);
					}
				}
				$XMLReader->Close();
				unset($XMLReader);
			}
		}
		$arOffer = array(
			'OFFER_PRODUCT_ID' => array('NAME'=>GetMessage('WDI_GIFTS_OFFER_PRODUCT_ID'),'GROUP'=>'OFFER'),
			'OFFER_MAIN_PRODUCT' => array('NAME'=>GetMessage('WDI_GIFTS_OFFER_MAIN_PRODUCT'),'GROUP'=>'OFFER'),
			'OFFER_CODE' => array('NAME'=>GetMessage('WDI_GIFTS_OFFER_CODE'),'GROUP'=>'OFFER'),
			'OFFER_CODE_MAJOR' => array('NAME'=>GetMessage('WDI_GIFTS_OFFER_CODE_MAJOR'),'GROUP'=>'OFFER'),
			'OFFER_NAME' => array('NAME'=>GetMessage('WDI_GIFTS_OFFER_NAME'),'GROUP'=>'OFFER'),
			'OFFER_SIZE_CODE' => array('NAME'=>GetMessage('WDI_GIFTS_OFFER_SIZE_CODE'),'GROUP'=>'OFFER'),
			'OFFER_WEIGHT' => array('NAME'=>GetMessage('WDI_GIFTS_OFFER_WEIGHT'),'GROUP'=>'OFFER'),
			'OFFER_PRICE' =>array('NAME'=>GetMessage('WDI_GIFTS_OFFER_PRICE'),'GROUP'=>'OFFER'),
			'OFFER_PRICE_CURRENCY' => array('NAME'=>GetMessage('WDI_GIFTS_OFFER_PRICE_CURRENCY'),'GROUP'=>'OFFER'),
			'OFFER_PRICE_NAME' => array('NAME'=>GetMessage('WDI_GIFTS_OFFER_PRICE_NAME'),'GROUP'=>'OFFER'),
		);
		
		$arStock = array(
			'STOCK_ID' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STOCK_ID'),'GROUP'=>'STOCK'),
			'STOCK_CODE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STOCK_CODE'),'GROUP'=>'STOCK'),
			'STOCK_AMOUNT' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STOCK_AMOUNT'),'GROUP'=>'STOCK'),
			'STOCK_FREE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STOCK_FREE'),'GROUP'=>'STOCK'),
			'STOCK_IN_WAY_AMOUNT' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STOCK_IN_WAY_AMOUNT'),'GROUP'=>'STOCK'),
			'STOCK_IN_WAY_FREE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STOCK_IN_WAY_FREE'),'GROUP'=>'STOCK'),
			'STOCK_DEALER_PRICE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STOCK_DEALER_PRICE'),'GROUP'=>'STOCK'),
			'STOCK_END_USER_PRICE' => array('NAME'=>GetMessage('WDI_GIFTS_ELEMENT_STOCK_END_USER_PRICE'),'GROUP'=>'STOCK'),
		);
		
		$arElement = array_merge($arElement,$arOffer,$arStock);
		$arOffer = array_merge($arElement,$arOffer,$arStock);
		
		$arResult = array(
			'ELEMENT' => $arElement,
			'OFFER' => $arOffer,
			'SECTION' => $arSection,
		);
		return $arResult;
	}
	
	/**
	 *
	 */
	public function GetMatchesGroups($SheetIndex, $MatchesType){
		$arResult = array(
			'ELEMENT' => array(
				'GENERAL' => GetMessage('WDI_GIFTS_GROUP_ELEMENT_GENERAL'),
				'OFFER' => GetMessage('WDI_GIFTS_GROUP_ELEMENT_OFFER'),
				'FILTERS' => GetMessage('WDI_GIFTS_GROUP_ELEMENT_FILTERS'),
				'STOCK' => GetMessage('WDI_GIFTS_GROUP_ELEMENT_STOCK'),
			),
			'OFFER' =>array(
				'GENERAL' => GetMessage('WDI_GIFTS_GROUP_ELEMENT_GENERAL'),
				'FILTERS' => GetMessage('WDI_GIFTS_GROUP_ELEMENT_FILTERS'),
				'STOCK' => GetMessage('WDI_GIFTS_GROUP_ELEMENT_STOCK'),
				'OFFER' => GetMessage('WDI_GIFTS_GROUP_ELEMENT_OFFER'),
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