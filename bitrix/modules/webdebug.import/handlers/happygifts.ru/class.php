<?self::IncludeLangFile(__FILE__);

class CWDI_HappyGifts extends CWDI_Handler {
	
	const TIMEOUT = 60;
	
	const FTP_HOST = 'ftp://clients:cLiENts2010@ftp.ipg.su';
	const FTP_FILE_PRODUCTION = '/clients/Nomenklatura/production.zip';
	const FTP_FILE_STOCK = '/clients/Ostatki/store#.xml';
	const FTP_FILE_PICTURE = '/clients/Pictures/300x300/#.jpg';
	
	private $SkipLoadingFiles = true;
	
	public $IBlockID = false;
	public $OffersIBlockID = false;
	public $arFields = array();
	public $arHandler = array();
	public $arFiles = array();
	
	private $arXMLCategories = false;
	private $arXMLBrands = false;
	private $arXMLStock = false;
	private $strLastGroupArticle = null;
	private $intLastElementObjectId = null;
	private $bAdditionalPhotosInMatches = false;

	/**
	 *	Создание объекта
	 */
	public function __construct(array $arFields, array $arHandler){
		$this->arFields = $arFields;
		$this->arHandler = $arHandler;
		$this->IBlockID = IntVal($arFields['PARAMS']['S'][0]['IBLOCK_ID']);
		$this->bAdditionalPhotosInMatches = $this->isAdditionalPhotosInMatches($arFields);
		$arCatalog = CWDI::GetCatalogArray($this->IBlockID);
		if($arCatalog['OFFERS_IBLOCK_ID']>0) {
			$this->OffersIBlockID = $arCatalog['OFFERS_IBLOCK_ID'];
		}
		$this->arHandler['TMP_DIR'] = self::GetTmpRealDir($this->arHandler,$this->arFields);
		if(defined('WDI_CRON') && WDI_CRON===true) {
			$this->SkipLoadingFiles = false;
		}
	}

	private static function ftpConnect(){
		static $FTP = null;
		if(is_null($FTP)){
			if(static::isFtpAvailable() && preg_match('#^ftp://(.*?):(.*?)@(.*?)$#', static::FTP_HOST, $arMatch)){
				$login = $arMatch[1];
				$password = $arMatch[2];
				$host = $arMatch[3];
				$FTP = ftp_connect($host, 21);
				if($FTP){
					if(ftp_login($FTP, $login, $password)){
						ftp_pasv($FTP, true);
					}
				}
			}
		}
		return $FTP;
	}

	private static function isFtpAvailable(){
		return extension_loaded('ftp');
	}
	
	/**
	 *	Проверка API-ключа
	 */
	public static function CheckConnection(){
		$bResult = false;
		$arRequestParams = array(
			'URL' => self::FTP_HOST.self::FTP_FILE_PRODUCTION,
			'METHOD' => 'GET',
			'TIMEOUT' => self::TIMEOUT,
			'SKIP_HTTPS_CHECK' => true,
			'HEADER' => "Accept: */*\r\n".
									"Accept-language: en\r\n".
									"Accept-Encoding: gzip,deflate,sdch\r\n".
									"Connection: Close\r\n",
		);
		$strRequest = CWDI_Handler::Request($arRequestParams);
		return !empty($strRequest) && strlen($strRequest)>0 && substr($strRequest,0,2)=='PK';
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
		$arFiles = array(
			'production' => false,
		);
		$bResult = false;
		$ArcFileName = dirname(__FILE__).'/data/files.tar.gz';
		if($this->SkipLoadingFiles && is_file($ArcFileName) && filesize($ArcFileName)>0) {
			require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/classes/general/tar_gz.php');
			$Arc = CBXArchive::GetArchive($ArcFileName, 'TAR.GZ');
			if ($Arc instanceof CArchiver) {
				$Arc->SetOptions(array(
					'REMOVE_PATH' => $_SERVER['DOCUMENT_ROOT'].$this->arHandler['TMP_DIR'],
					'UNPACK_REPLACE' => false,
					'CHECK_PERMISSIONS' => false,
					'UNPACK_REPLACE' => false,
				));
				if ($Arc->ExtractFiles($_SERVER['DOCUMENT_ROOT'].$this->arHandler['TMP_DIR'])) {
					for($StoreIndex=0; $StoreIndex<=8; $StoreIndex++){
						$Name = str_replace('#',$StoreIndex,pathinfo(self::FTP_HOST.self::FTP_FILE_STOCK,PATHINFO_BASENAME));
						$FileItem = pathinfo($Name,PATHINFO_FILENAME);
						$arFiles[$FileItem] = $this->arHandler['TMP_DIR'].$Name;
					}
					foreach($arFiles as $FileItem => $strFile){
						$BaseFileNameZip = self::GetFileBaseName($FileItem.'.xml', $this->arFields['ID']);
						$FileNameFull = $_SERVER['DOCUMENT_ROOT'].$this->arHandler['TMP_DIR'].$BaseFileNameZip;
						if(is_file($FileNameFull) && filesize($FileNameFull)>0){
							$arFiles[$FileItem] = $this->arHandler['TMP_DIR'].$BaseFileNameZip;
						}
					}
				}
			}
		} else {
			$arRequestParams = array(
				'URL' => self::FTP_HOST.self::FTP_FILE_PRODUCTION,
				'METHOD' => 'GET',
				'TIMEOUT' => self::TIMEOUT,
				'HEADER' => "Accept: */*\r\n".
										"Accept-language: en\r\n".
										"Accept-Encoding: gzip,deflate,sdch\r\n".
										"Connection: Close\r\n",
			);
			$Dir = $this->arHandler['TMP_DIR'];
			// Download production
			$BaseFileNameZip = self::GetFileBaseName('production.zip', $this->arFields['ID']);
			$BaseFileNameXml = self::GetFileBaseName('production.xml', $this->arFields['ID']);
			$strData = self::Request($arRequestParams);
			@unlink($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileNameXml);
			$FileNameFull = $_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileNameZip;
			if(!empty($strData) && file_put_contents($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileNameZip,$strData)) {
				unset($strData);
				if(is_file($FileNameFull) && filesize($FileNameFull)>0){
					$Zip = new ZipArchive;
					if($Zip->Open($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileNameZip)===true) {
						if($strData = $Zip->GetFromName('production.xml')) {
							if(strlen($strData)>0) {
								if (file_put_contents($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileNameXml,$strData)) {
									$arFiles['production'] = $Dir.$BaseFileNameXml;
								}
							}
							unset($strData);
						}
					}
					$Zip->Close();
				}
			}
			@unlink($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileNameZip);
			// Download stock
			$Index=0;
			while(true){
				$arRequestParams['URL'] = str_replace('#',$Index,self::FTP_HOST.self::FTP_FILE_STOCK);
				$strData = self::Request($arRequestParams);
				if($strData!==false && strlen($strData)>0 && ++$Index<100) {
					$BaseFileNameXml = self::GetFileBaseName(pathinfo($arRequestParams['URL'],PATHINFO_BASENAME), $this->arFields['ID']);
					@unlink($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileNameXml);
					if(file_put_contents($_SERVER['DOCUMENT_ROOT'].$Dir.$BaseFileNameXml,$strData)) {
						$FileItem = pathinfo($arRequestParams['URL'],PATHINFO_FILENAME);
						$arFiles[$FileItem] = $Dir.$BaseFileNameXml;
						continue;
					}
				}
				break;
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
		// GROUPS
		$this->arXMLCategories = array();
		$obXML = simplexml_load_file($this->arFiles['production']['FILE_ABS']);
		$this->ProcessGroups($obXML->{'Группы'},$arData,false,false);
		// BRANDS
		$this->arXMLBrands = array();
		foreach($obXML->{'Бренды'}->{'Бренд'} as $obBrand) {
			$arBrand = (array)$obBrand;
			$this->arXMLBrands[$arBrand['ИД']] = array(
				'CODE' => $arBrand['Код'],
				'NAME' => $arBrand['Наименование'],
			);
		}
		// STOCK
		$strPattern = '#^global_(.*?)$#i';
		$this->arXMLStock = array();
		foreach($this->arFiles as $Key => $arFile){
			if(preg_match('#^store(\d)$#i',$Key)) {
				$obStockXML = simplexml_load_file($arFile['FILE_ABS']);
				foreach($obStockXML->{'Остатки'}->{'Остаток'} as $obStockItem){
					$ID_ = (string)$obStockItem->{'ИД'};
					$bGlobal = false;
					if(preg_match($strPattern,$ID_,$M)){
						$ID_ = $M[1];
						$bGlobal = true;
					}
					if(!is_array($this->arXMLStock[$ID_])){
						$this->arXMLStock[$ID_] = array();
					}
					$StockType = $bGlobal?'GLOBAL':'GENERAL';
					$this->arXMLStock[$ID_][$StockType] += (int)$obStockItem->{'Свободный'};
					$this->arXMLStock[$ID_]['ALL'] = $this->arXMLStock[$ID_]['GLOBAL'] + $this->arXMLStock[$ID_]['GENERAL'];
				}
				unset($obStockXML,$StockType,$bGlobal,$ID_);
			}
		}
		// PRODUCTS (count)
		$Count = count($obXML->{'Номенклатура'}->{'Элемент'});
		// PRODUCTS
		#####################################################################################################################
		$arProducts = [];
		foreach($obXML->{'Номенклатура'}->{'Элемент'} as $obXmlProduct) {
			$arProducts[] = [
				'GROUP_ARTICLE' => strVal($obXmlProduct->{'ОбщийАртикулГруппы'}),
				'XML' => $obXmlProduct,
			];
		}
		unset($obXML, $obXmlProduct);
		usort($arProducts, function($a, $b){
			if($a['GROUP_ARTICLE'] == $b['GROUP_ARTICLE']) {
				return 0;
			}
			return ($a['GROUP_ARTICLE'] < $b['GROUP_ARTICLE']) ? -1 : 1;
		});
		#####################################################################################################################
		$Index = 0;
		foreach($arProducts as $arXmlProduct) {
			$Index++;
			$this->readProduct($arXmlProduct['XML'], $Index, $Count, $arData);
		}
		unset($arProductRaw, $arProduct, $arPrint);
		//
		return true;
	}

	/**
	 * Load single product
	 */
	private function readProduct($obXmlProduct, $Index, $Count, &$arData){
		$arProductRaw = (array)$obXmlProduct;
		$arPrint = (array)$arProductRaw['ТипыНанесения'];
		$arPrint = is_array($arPrint['ТипНанесения']) ? $arPrint['ТипНанесения'] : array();
		$arProduct = array(
			'ID' => $arProductRaw['ИД'],
			'SECTION_ID' => $arProductRaw['ИДРодителя'], #[ИДРодителя] => 85aaa2cc-2fcb-11e1-bebd-001871eb2973
			'ARTICLE' => $arProductRaw['ОбщийАртикулГруппы'], #[ОбщийАртикулГруппы] => 711386
			'ARTICLE_FULL' => $arProductRaw['Артикул'], #[Артикул] => 711386.301/L
			'NAME' => $arProductRaw['Наименование'], #[Наименование] => Украшение на елку "Снежинка"; 9х9х0,3см; фетр; шелкография
			'NAME_FULL' => $arProductRaw['НаименованиеПолное'], #[НаименованиеПолное] => Украшение на елку "Снежинка"; 9х9х0,3см; фетр; 
			'BRAND_NAME' => $this->arXMLBrands[$arProductRaw['Бренд']]['NAME'], #[Бренд] => fee2cddc-de88-11e6-9422-00155d640301
			'BRAND_CODE' => $this->arXMLBrands[$arProductRaw['Бренд']]['CODE'], #[Бренд] => 000000013
			'SIZE' => $arProductRaw['Размер'], #[Размер] => L
			'CLOTHES_SIZE' => $arProductRaw['РазмерОдежды'], #[РазмерОдежды] => L
			'F_DIARY' => $arProductRaw['РВ_Ежедневник'], #[РВ_Ежедневник] => false
			'F_CHARGER' => $arProductRaw['РВ_ЗарядноеУстройство'], #[РВ_ЗарядноеУстройство] => false
			'F_PEN' => $arProductRaw['РВ_Ручка'], #[РВ_Ручка] => false
			'F_BOX' => $arProductRaw['РВ_Коробка'], #[РВ_Коробка] => false
			'MATERIAL' => $arProductRaw['Материал'], #[Материал] => хлопок 100%, плотноть 150 г/м2
			'COLOR' => $arProductRaw['Цвет'], #[Цвет] => желтый
			'DESCRIPTION' => $arProductRaw['Описание'], #[Описание] => Футболка женская "Miss"
			'COMMENT' => $arProductRaw['КомментарийНаСайт'], #[КомментарийНаСайт] => Цвет, близкий к  Pantone White стержень  Plastic Cross синий, толщина пишущего узла 0,7 мм
			'BOX_COUNT' => $arProductRaw['ШтукВКоробке'], #[ШтукВКоробке] => 50
			'BOX_VOLUME' => $arProductRaw['ОбъемКоробки'], #[ОбъемКоробки] => 0.028
			'BOX_WEIGHT' => $arProductRaw['ВесКоробки'], #[ВесКоробки] => 5.8
			'WEIGHT' => $arProductRaw['ВесЕдиницы'], #[ВесЕдиницы] => 0.116
			'VOLUME' => $arProductRaw['ОбъемЕдиницы'], #[ОбъемЕдиницы] => 0.00056
			'PRICE' => $arProductRaw['РозничнаяЦена'], #[РозничнаяЦена] => 320
			'BRAND_MAIN' => $arProductRaw['БрендОсн'], #[БрендОсн] => Sols
			'CURRENCY' => $arProductRaw['ВалютаРозничнойЦены'], #[ВалютаРозничнойЦены] => руб.
			'F_ON_ORDER' => $arProductRaw['ТолькоПодЗаказ'], #[ТолькоПодЗаказ] => 1
			'F_EXHAUST' => $arProductRaw['ДоИсчерпания'], #[ДоИсчерпания] => 1
			'F_BONUS' => $arProductRaw['Бонус'], #[Бонус] => 0
			'F_BEST_PRICE' => $arProductRaw['ЛучшаяЦена'], #[ЛучшаяЦена] => 1
			'F_GREEN' => $arProductRaw['Green'], #[Green] => 1
			'F_NEW_YEAR' => $arProductRaw['НовыйГод'], #[НовыйГод] => 1
			'F_POSTCARDS' => $arProductRaw['Открытки'], #[Открытки] => 1
			'F_WINTER' => $arProductRaw['ЗимнееПредложение'], #[ЗимнееПредложение] => 1
			'F_SUMMER' => $arProductRaw['ЛетнееПредложение'], #[ЛетнееПредложение] => 1
			'F_NEW' => $arProductRaw['New'], #[New] => 1
			'F_NEW_2016' => $arProductRaw['New2016'], #[New2016] => 1
			'F_NEW_2017' => $arProductRaw['New2017'], #[New2017] => 1
			'F_23_FEB' => $arProductRaw['_23февраля'], #[_23февраля] => 1
			'F_8_MAR' => $arProductRaw['_8марта'], #[_8марта] => 1
			'F_SALE' => $arProductRaw['Sale'], #[Sale] => 1
			'F_PRINT' => $arPrint, #[ТипыНанесения] => Array ([ТипНанесения] => Array([0] => Вышивка [1] => Термотрансфер  [2] => Сигнальный образец шелкографии [3] => Шелкография по текстилю [4] => Сигнальный образец вышивки [5] => Вышивка шеврона))
			'F_PRINT_IMPLODE' => implode(', ',$arPrint),
			'STOCK_GENERAL' => IntVal($this->arXMLStock[$arProductRaw['ИД']]['GENERAL']),
			'STOCK_GLOBAL' => IntVal($this->arXMLStock[$arProductRaw['ИД']]['GLOBAL']),
			'STOCK_ALL' => IntVal($this->arXMLStock[$arProductRaw['ИД']]['ALL']),
			#'PICTURE' => self::DelayDownload(str_replace('#',$arProductRaw['ИД'],self::FTP_HOST.self::FTP_FILE_PICTURE), $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('ELEMENT_ID'=>$arProductRaw['ИД'])),
		);
		if(static::isFtpAvailable()){
			$arProduct['PICTURE'] = self::DelayDownload(str_replace('#',$arProductRaw['ИД'],self::FTP_FILE_PICTURE), $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('ELEMENT_ID'=>$arProductRaw['ИД'], 'FTP' => true));
		}
		else{
			$arProduct['PICTURE'] = self::DelayDownload(str_replace('#',$arProductRaw['ИД'],self::FTP_HOST.self::FTP_FILE_PICTURE), $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('ELEMENT_ID'=>$arProductRaw['ИД']));
		}
		foreach($arProduct as $Key => $Value){
			if(is_object($Value) && get_class($Value)=='SimpleXMLElement') {
				$arProduct[$Key] = (string)$Value;
			}
		}
		if(static::isFtpAvailable() && $this->bAdditionalPhotosInMatches){
			$arAdditionalImages = $this->getProductAdditionalImagesList($arProduct['ID']);
			if(!empty($arAdditionalImages)){
				foreach($arAdditionalImages as $strImage){
					$arProduct['ADDITIONAL_PICTURES'][] = self::DelayDownload($strImage, $arData['PROFILE']['ID'], __CLASS__.'::OnDelayImageDownload', array('ELEMENT_ID'=>$arProductRaw['ИД'], 'FTP' => true));
				}
			}
		}
		if(!CWDI::IsUtf()){
			$arProduct = CWDI::ConvertCharset($arProduct,'UTF-8','CP1251');
		}
		$strY = '1';
		$strN = '0';
		foreach(array('F_DIARY','F_CHARGER','F_PEN','F_BOX') as $strProp){
			$arProduct[$strProp] = $arProduct[$strProp]==='true' ? $strY : $strN;
		}
		foreach(array('F_ON_ORDER','F_EXHAUST','F_BONUS','F_BEST_PRICE','F_GREEN','F_NEW_YEAR','F_POSTCARDS','F_WINTER','F_SUMMER','F_NEW','F_NEW_2016','F_NEW_2017','F_23_FEB','F_8_MAR','F_SALE') as $strProp){
			$arProduct[$strProp] = $arProduct[$strProp]==='1' ? $strY : $strN;
		}
		#$this->ProcessElement($arProduct,$arData);
		$arParams = $this->arFields['PARAMS'];
		if($arParams['LOAD_OFFERS'] == 'Y') {
			if(is_null($this->strLastGroupArticle) || $this->strLastGroupArticle != $arProduct['ARTICLE']){
				$this->strLastGroupArticle = $arProduct['ARTICLE'];
				$this->ProcessElement($arProduct, $arData);
			}
			$this->ProcessOffer($arProduct, $arData);
		}
		else{
			$this->ProcessElement($arProduct, $arData);
		}
		self::ProfileSetStatus($this->arFields['ID'], 'READ', $Index, $Count);
	}

	private function isAdditionalPhotosInMatches($arProfile){
		$arSourceElement = array_column($arProfile['MATCHES']['S'][0]['ELEMENT'], 'SOURCE');
		$arSourceOffer = array_column($arProfile['MATCHES']['S'][0]['OFFER'], 'SOURCE');
		$arSourceOffer = is_array($arSourceOffer) ? $arSourceOffer : [];
		return in_array('ADDITIONAL_PICTURES', array_merge($arSourceElement, $arSourceOffer));
	}
	
	public function ProcessGroups($obGroup, $arData, $ParentID=false, $DepthLevel=0){
		foreach($obGroup->{'Группа'} as $obSubGroup) {
			$arSubGroup = (array)$obSubGroup;
			$strSectionName = $arSubGroup['Наименование'];
			if(!CWDI::IsUtf()){
				$strSectionName = CWDI::ConvertCharset($strSectionName,'UTF-8','CP1251');
			}
			//
			$arSection = array(
				'ID' => $arSubGroup['Ид'],
				'NAME' => $strSectionName,
				'PARENT_ID' => $arSubGroup['ИдРодителя'],
			);
			//
			$ParentObjectID = !empty($ParentID) ? $this->arXMLCategories[$ParentID] : '';
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
			//
			if($arSubGroup['Группы']!=null) {
				$this->ProcessGroups($arSubGroup['Группы'],$arData,$arSection['ID'],$DepthLevel+1);
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
		#$arParentID = isset($this->arXMLCategories[$arItem['SECTION_ID']]) ? array($this->arXMLCategories[$arItem['SECTION_ID']]) : array();
		$arParentID = IntVal($this->arXMLCategories[$arItem['SECTION_ID']]);
		//
		$arAdditionalParams = array(
			'OBJECT_TYPE' => $ObjectType,
			'OBJECT' => $arItem,
		);
		//
		$arObject = self::ProcessMatches($arMatches, $arItem, array($this,'ProcessMatchSingle'), $this->arFields, $arAdditionalParams, $arItem['ID']);
		$arFilter = $this->BuildFilter($arObject, 'ELEMENT');
		$ObjectID = self::ReadObject($arObject, $ObjectType, $arParentID, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $arItem['ID'], $arDebugData = array());
		$this->intLastElementObjectId = $ObjectID;
		return $ObjectID;
	}
	
	/**
	 *	Обработка одного торгового предложения
	 */
	private function ProcessOffer($arItem, $arData){
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
		$ObjectID = self::ReadObject($arObject, $ObjectType, $this->intLastElementObjectId, $this->IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $arItem['PRODUCT_ID'], $arDebugData = array());
	}
	
	public function OnDelayImageDownload($Image, $Args=array()){
		if($Args['FTP']){
			if($FTP = static::ftpConnect()){
				$strTmpDir = '/'.COption::GetOptionString('main', 'upload_dir', 'upload').'/'.WDI_MODULE.'/happygifts/tmp/';
				if(!is_dir($_SERVER['DOCUMENT_ROOT'].$strTmpDir)) {
					mkdir($_SERVER['DOCUMENT_ROOT'].$strTmpDir, BX_DIR_PERMISSIONS, true);
				}
				$strBaseName = basename($Image);
				$strLocalFile = $strTmpDir.'/'.$strBaseName;
				$strLocalFileAbs = $_SERVER['DOCUMENT_ROOT'].$strLocalFile;
				$intTryIndex = 1;
				$intTryCount = 3;
				while($intTryIndex <= $intTryCount){
					if(is_file($strLocalFileAbs)){
						@unlink($strLocalFileAbs);
					}
					if(ftp_get($FTP, $strLocalFileAbs, $Image)){
						return CWDI::MakeFileArray($strLocalFileAbs, false, false, $strBaseName);
					}
					$intTryIndex++;
				}
			}
			return false;
		}
		else{
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
			if(strlen($strData)>0) {
				$Dir = '/'.COption::GetOptionString('main', 'upload_dir', 'upload').'/'.WDI_MODULE.'/happygifts/tmp/';
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
		}
		return false;
	}
	
	public function OnObjectProcessed($ObjectID, $arObject, $arData, $arFields, $intResult){
		if(in_array($arObject['TYPE'],array('E','O'))) {
			$strTmpDir = '/upload/webdebug.import/happygifts/tmp/';
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
		$arSection = array(
			'ID' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_SECTION_ID')),
			'NAME' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_SECTION_NAME')),
			'PARENT_ID' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_SECTION_PARENT_ID')),
		);
		$arElement = array(
			'ID' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_ID'),'GROUP'=>'GENERAL'), #[ИД] => df605766-5fbc-11e2-8214-18a9053c0de9
			'SECTION_ID' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_SECTION_ID'),'GROUP'=>'GENERAL'), #[ИДРодителя] => 85aaa2cc-2fcb-11e1-bebd-001871eb2973
			'ARTICLE' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_ARTICLE'),'GROUP'=>'PROPS'), #[ОбщийАртикулГруппы] => 711386
			'ARTICLE_FULL' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_ARTICLE_FULL'),'GROUP'=>'PROPS'), #[Артикул] => 711386.301/L
			'NAME' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_NAME'),'GROUP'=>'GENERAL'), #[Наименование] => Украшение на елку "Снежинка"; 9х9х0,3см; фетр; шелкография
			'NAME_FULL' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_NAME_FULL'),'GROUP'=>'GENERAL'), #[НаименованиеПолное] => Украшение на елку "Снежинка"; 9х9х0,3см; фетр; 
			'BRAND_NAME' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_BRAND_NAME'),'GROUP'=>'PROPS'), #[Бренд] => fee2cddc-de88-11e6-9422-00155d640301
			'BRAND_CODE' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_BRAND_CODE'),'GROUP'=>'PROPS'), #[Бренд] => 000000013
			'SIZE' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_SIZE'),'GROUP'=>'PROPS'), #[Размер] => L
			'CLOTHES_SIZE' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_CLOTHES_SIZE'),'GROUP'=>'PROPS'), #[РазмерОдежды] => L
			'F_DIARY' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_DIARY'),'GROUP'=>'FLAGS'), #[РВ_Ежедневник] => false
			'F_CHARGER' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_CHARGER'),'GROUP'=>'FLAGS'), #[РВ_ЗарядноеУстройство] => false
			'F_PEN' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_PEN'),'GROUP'=>'FLAGS'), #[РВ_Ручка] => false
			'F_BOX' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_BOX'),'GROUP'=>'FLAGS'), #[РВ_Коробка] => false
			'MATERIAL' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_MATERIAL'),'GROUP'=>'PROPS'), #[Материал] => хлопок 100%, плотноть 150 г/м2
			'COLOR' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_COLOR'),'GROUP'=>'PROPS'), #[Цвет] => желтый
			'DESCRIPTION' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_DESCRIPTION'),'GROUP'=>'GENERAL'), #[Описание] => Футболка женская "Miss"
			'COMMENT' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_COMMENT'),'GROUP'=>'GENERAL'), #[КомментарийНаСайт] => Цвет, близкий к  Pantone White стержень  Plastic Cross синий, толщина пишущего узла 0,7 мм
			'BOX_COUNT' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_BOX_COUNT'),'GROUP'=>'PROPS'), #[ШтукВКоробке] => 50
			'BOX_VOLUME' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_BOX_VOLUME'),'GROUP'=>'PROPS'), #[ОбъемКоробки] => 0.028
			'BOX_WEIGHT' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_BOX_WEIGHT'),'GROUP'=>'PROPS'), #[ВесКоробки] => 5.8
			'WEIGHT' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_WEIGHT'),'GROUP'=>'PROPS'), #[ВесЕдиницы] => 0.116
			'VOLUME' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_VOLUME'),'GROUP'=>'PROPS'), #[ОбъемЕдиницы] => 0.00056
			'PRICE' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_PRICE'),'GROUP'=>'STOCK'), #[РозничнаяЦена] => 320
			'BRAND_MAIN' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_BRAND_MAIN'),'GROUP'=>'PROPS'), #[БрендОсн] => Sols
			'CURRENCY' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_CURRENCY'),'GROUP'=>'PROPS'), #[ВалютаРозничнойЦены] => руб.
			'F_ON_ORDER' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_ON_ORDER'),'GROUP'=>'FLAGS'), #[ТолькоПодЗаказ] => 1
			'F_EXHAUST' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_EXHAUST'),'GROUP'=>'FLAGS'), #[ДоИсчерпания] => 1
			'F_BONUS' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_BONUS'),'GROUP'=>'FLAGS'), #[Бонус] => 0
			'F_BEST_PRICE' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_BEST_PRICE'),'GROUP'=>'FLAGS'), #[ЛучшаяЦена] => 1
			'F_GREEN' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_GREEN'),'GROUP'=>'FLAGS'), #[Green] => 1
			'F_NEW_YEAR' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_NEW_YEAR'),'GROUP'=>'FLAGS'), #[НовыйГод] => 1
			'F_POSTCARDS' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_POSTCARDS'),'GROUP'=>'FLAGS'), #[Открытки] => 1
			'F_WINTER' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_WINTER'),'GROUP'=>'FLAGS'), #[ЗимнееПредложение] => 1
			'F_SUMMER' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_SUMMER'),'GROUP'=>'FLAGS'), #[ЛетнееПредложение] => 1
			'F_NEW' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_NEW'),'GROUP'=>'FLAGS'), #[New] => 1
			'F_NEW_2016' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_NEW_2016'),'GROUP'=>'FLAGS'), #[New2016] => 1
			'F_NEW_2017' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_NEW_2017'),'GROUP'=>'FLAGS'), #[New2017] => 1
			'F_23_FEB' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_23_FEB'),'GROUP'=>'FLAGS'), #[_23февраля] => 1
			'F_8_MAR' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_8_MAR'),'GROUP'=>'FLAGS'), #[_8марта] => 1
			'F_SALE' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_F_SALE'),'GROUP'=>'FLAGS'), #[Sale] => 1
			'F_PRINT' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_PRINT'),'GROUP'=>'PROPS'), #[ТипыНанесения] => Array ([ТипНанесения] => Array([0] => Вышивка [1] => Термотрансфер  [2] => Сигнальный образец шелкографии [3] => Шелкография по текстилю [4] => Сигнальный образец вышивки [5] => Вышивка шеврона))
			'F_PRINT_IMPLODE' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_PRINT_IMPLODE'),'GROUP'=>'PROPS'), #[ТипыНанесения] => Array ([ТипНанесения] => Array([0] => Вышивка [1] => Термотрансфер  [2] => Сигнальный образец шелкографии [3] => Шелкография по текстилю [4] => Сигнальный образец вышивки [5] => Вышивка шеврона))
			'STOCK_ALL' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_STOCK_ALL'),'GROUP'=>'STOCK'),
			'STOCK_GLOBAL' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_STOCK_GLOBAL'),'GROUP'=>'STOCK'),
			'STOCK_GENERAL' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_STOCK_GENERAL'),'GROUP'=>'STOCK'),
			'PICTURE' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_PICTURE'),'GROUP'=>'GENERAL'),
			'ADDITIONAL_PICTURES' => array('NAME'=>GetMessage('WDI_HAPPYGIFTS_ELEMENT_ADDITIONAL_PICTURES'),'GROUP'=>'GENERAL'),
		);
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
		$arResult = array(
			'ELEMENT' => array(
				'GENERAL' => GetMessage('WDI_HAPPYGIFTS_GROUP_ELEMENT_GENERAL'),
				'PROPS' => GetMessage('WDI_HAPPYGIFTS_GROUP_ELEMENT_PROPS'),
				'FLAGS' => GetMessage('WDI_HAPPYGIFTS_GROUP_ELEMENT_FLAGS'),
				'STOCK' => GetMessage('WDI_HAPPYGIFTS_GROUP_ELEMENT_STOCK'),
			),
		);
		$arResult['OFFER'] = $arResult['ELEMENT'];
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

	/**
	 * Получаем список дополнительных изображений
	 */
	private function getProductAdditionalImagesList($strProductCode){
		$arResult = [];
		if($FTP = static::ftpConnect()){
			$strPath = sprintf('/catalog-images/%s/photo/', $strProductCode);
			$arResult = ftp_nlist($FTP, $strPath);
			if(!is_array($arResult)){
				$arResult = [];
			}
		}
		return $arResult;
	}

}
?>