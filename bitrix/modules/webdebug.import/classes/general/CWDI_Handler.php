<?
Use \Bitrix\Iblock\PropertyIndex;
IncludeModuleLangFile(__FILE__);

abstract class CWDI_Handler {
	const PROP_SESSION_ID = 	'WDI_SESSION_ID'; # идентификатор сессии загрузки
	const PROP_PROFILE_ID = 	'WDI_PROFILE_ID'; # идентификатор профиля
	const PROP_EXTERNAL_ID = 	'WDI_EXTERNAL_ID'; # идентификатор элемента/раздела из файла
	const PROP_DATETIME = 		'WDI_DATETIME'; # дата и время загрузки
	const EXEC_MIN_INTERVAL = 1; # минимальное время (в секундах) между датой последнего успешного действия и началом нового процесса загрузки
	
	/**
	 *	Обработка запроса из Cron
	 */
	public static function CronExec($Arguments) {
		$GLOBALS['DB']->Query('SET SESSION `wait_timeout` = 86400;');
		if(is_array($Arguments) && !empty($Arguments)) {
			CWDI::StopOutputBuffering();
			$GLOBALS['WDI_HANDLERS'] = self::GetList(); // Получение списка всех загрузчиков
			unset($Arguments[0]);
			$arParams = array(); // array like a $_GET
			foreach($Arguments as $Argument){
				$arArgument = array();
				parse_str($Argument, $arArgument);
				if(is_array($arArgument)) {
					$arParams = array_merge($arParams,$arArgument);
				}
			}
			if($arParams['start']!='Y' && !empty($arParams['profile'])) {
				$Message = GetMessage('WDI_ERROR_NO_START_PARAM');
				CWDI::L('[0025] '.$Message,true);
				CWDI::W('[0025] '.$Message);
				CWDI::E();
			}
			CWDI::SetManualStop(false);
			$arParams['profile'] = empty($arParams['profile'])?array():explode(',',$arParams['profile']);
			$GLOBALS['WDI_CURRENT_PROFILES'] = $arParams['profile']; // Массив ID профилей, указанных в аргументе
			$arProfilesResults = array();
			$resProfiles = CWDI_Profile::GetList(array('SORT'=>'ASC'),array('ACTIVE'=>'Y'));
			while($arProfile = $resProfiles->GetNext()){
				if(!empty($arParams['profile']) && !in_array($arProfile['ID'],$arParams['profile'])) {
					continue;
				}
				$arProfile['PARAMS'] = unserialize($arProfile['~PARAMS']);
				if(!empty($arProfile['HANDLER']) && is_array($GLOBALS['WDI_HANDLERS'][$arProfile['HANDLER']]) && self::IsProfileCanStart($arProfile, $arParams)) {
					// Check errors
					$arHandler = $GLOBALS['WDI_HANDLERS'][$arProfile['HANDLER']];
					$objConfig = new CWDI_CheckConfig($arProfile,$arHandler);
					$bHasConfigErrors = $objConfig->HasErrors();
					if($bHasConfigErrors) {
						$arErrors = array();
						$arConfigResults = $objConfig->GetConfigArray();
						foreach($arConfigResults as $Code => $arConfigResult){
							if(!$arConfigResult['RESULT']) {
								$arErrors[] = $Code;
							}
						}
						$Message = sprintf(GetMessage('WDI_ERROR_HAS_CONFIG_ERRORS'),implode('; ', $arErrors),$arProfile['ID']);
						CWDI::L('[0001] '.$Message,true);
						CWDI::W('[0001] '.$Message);
					} else {
						$arProfile['MATCHES'] = unserialize($arProfile['~MATCHES']);
						$bProfileResult = self::ProfileExec($arProfile, $arParams);
						$arProfilesResults[$arProfile['ID']] = $bProfileResult;
					}
					unset($objConfig);
				}
			}
			if(count($arParams['profile'])==1 && count($arProfilesResults)==1) {
				$Message = sprintf(GetMessage('WDI_PROFILE_DONE'),$arParams['profile'][0]);
				CWDI::L($Message,true,false);
				CWDI::W($Message);
			} elseif (count($arProfilesResults)>=1){
				$arResultsY = array();
				$arResultsN = array();
				foreach($arProfilesResults as $ProfileID => $ProfileResult){
					if($ProfileResult){
						$arResultsY[] = $ProfileID;
					} else {
						$arResultsN[] = $ProfileID;
					}
				}
				$Message = GetMessage('WDI_PROCESS_DONE');
				if(!empty($arResultsY)){
					$Message .= GetMessage('WDI_PROCESS_DONE__SUCCESS',array('#ITEMS#'=>implode(', ',$arResultsY)));
				}
				if(!empty($arResultsN)){
					if(!empty($arResultsY)) {
						$Message .= ' ';
					}
					$Message .= GetMessage('WDI_PROCESS_DONE__ERROR',array('#ITEMS#'=>implode(', ',$arResultsN)));
				}
				$Message .= '.';
				CWDI::L($Message,true,false);
				CWDI::W($Message);
			} else {
				$Message = GetMessage('WDI_NOTHING_LOADED');
				CWDI::L($Message,true,false);
				CWDI::W($Message);
			}
			// Clear old data
			CWDI_Data::Truncate();
		}
	}
	
	/**
	 *	Функция проверки необходимости запуска профиля
	 */
	public static function IsProfileCanStart($arProfile, $arParams){
		$bResult = true;
		// Временные отметки
		$TimeNow = time();
		$DateLastStart = MakeTimeStamp($arProfile['DATE_LAST_START'], FORMAT_DATETIME);
		$DateLastSuccess = MakeTimeStamp($arProfile['DATE_LAST_SUCCESS'], FORMAT_DATETIME);
		$DateLastAction = MakeTimeStamp($arProfile['DATE_LAST_ACTION'], FORMAT_DATETIME);
		$intReason = false;
		// Если только индивидуальный запуск - то иное запрещаем
		if($arProfile['PARAMS']['INDIVIDUAL_RUN_ONLY']=='Y' && !(is_array($arParams['profile']) && count($arParams['profile'])==1 && $arParams['profile'][0]==$arProfile['ID'])){
			$bResult = false;
			$intReason = 1;
		}
		// Ограничиваем время между последним успешным действием и новой загрузкой
		if($DateLastAction>0 && self::EXEC_MIN_INTERVAL>0 && $TimeNow-$DateLastAction<=self::EXEC_MIN_INTERVAL) {
			$bResult = false;
			$intReason = 2;
		}
		// Ограничиваем время между началами запусков
		if($arProfile['PARAMS']['HANDLER_SCHEDULE_MODE']=='interval_start' && is_numeric($arProfile['PARAMS']['SCHEDULE_INTERVAL_START_VALUE']) && $arProfile['PARAMS']['SCHEDULE_INTERVAL_START_VALUE']>0 && !empty($arProfile['PARAMS']['SCHEDULE_INTERVAL_START_TYPE'])) {
			$IntervalSeconds = self::GetIntervalTime($arProfile['PARAMS']['SCHEDULE_INTERVAL_START_TYPE']);
			$AllSeconds = $IntervalSeconds * $arProfile['PARAMS']['SCHEDULE_INTERVAL_START_VALUE'];
			if($TimeNow-$DateLastStart<=$AllSeconds) {
				$bResult = false;
				$intReason = 3;
			}
		}
		// Ограничиваем время со времени последнего запуска
		if($arProfile['PARAMS']['HANDLER_SCHEDULE_MODE']=='interval_end' && is_numeric($arProfile['PARAMS']['SCHEDULE_INTERVAL_END_VALUE']) && $arProfile['PARAMS']['SCHEDULE_INTERVAL_END_VALUE']>0 && !empty($arProfile['PARAMS']['SCHEDULE_INTERVAL_END_TYPE'])) {
			$IntervalSeconds = self::GetIntervalTime($arProfile['PARAMS']['SCHEDULE_INTERVAL_END_TYPE']);
			$AllSeconds = $IntervalSeconds * $arProfile['PARAMS']['SCHEDULE_INTERVAL_END_VALUE'];
			if($TimeNow-$DateLastSuccess<=$AllSeconds) {
				$bResult = false;
				$intReason = 4;
			}
		}
		if(!$bResult) {
			$Message = GetMessage('WDI_ERROR_CANNOT_START',array('#PROFILE_ID#'=>$arProfile['ID'],'#REASON#'=>GetMessage('WDI_ERROR_CANNOT_START_'.$intReason)));
			CWDI::L('[0002] '.$Message);
			CWDI::W('[0002] '.$Message);
		}
		// Возвращаем результат
		return $bResult;
	}
	
	/**
	 *	Определение кол-ва секунд в минутах, часах, днях
	 */
	private static function GetIntervalTime($Interval){
		$arIntervals = array(
			'minute' => 60,
			'hour' => 60*60,
			'day' => 26*60*60,
		);
		return isset($arIntervals[$Interval]) ? $arIntervals[$Interval] : 1;
	}
	
	/**
	 *	Функция получения шагов для загрузки данных
	 */
	public static function GetSteps($arProfile, $arParams){
		$arResult = array(
			'START' => array(
				'NAME' => GetMessage('WDI_STEP_START'),
				'SORT' => 100,
				'FUNC' => array(__CLASS__,'Step_Start'),
			),
			'GET_FILE' => array(
				'NAME' => GetMessage('WDI_STEP_GET_FILE'),
				'SORT' => 200,
				'FUNC' => array(__CLASS__,'Step_GetFile'),
			),
			'CLEAR_OLD_DATA_BEFORE' => array(
				'NAME' => GetMessage('WDI_CLEAR_OLD_DATA'),
				'SORT' => 250,
				'FUNC' => array(__CLASS__,'Step_ClearOldData'),
			),
			'READ' => array(
				'NAME' => GetMessage('WDI_STEP_READ'),
				'SORT' => 300,
				'FUNC' => array(__CLASS__,'Step_Read'),
			),
			'WRITE' => array(
				'NAME' => GetMessage('WDI_STEP_WRITE'),
				'SORT' => 400,
				'FUNC' => array(__CLASS__,'Step_Write'),
			),
			'SET_MORE_PARENTS' => array(
				'NAME' => GetMessage('WDI_STEP_SET_MORE_PARENTS'),
				'SORT' => 500,
				'FUNC' => array(__CLASS__,'Step_SetMoreParents'),
			),
			'DEACTIVATE' => array(
				'NAME' => GetMessage('WDI_STEP_DEACTIVATE'),
				'SORT' => 600,
				'FUNC' => array(__CLASS__,'Step_Deactivate'),
			),
			'STORES' => array(
				'NAME' => GetMessage('WDI_STEP_STORES'),
				'SORT' => 700,
				'FUNC' => array(__CLASS__,'Step_Stores'),
			),
			'QUANTITY' => array(
				'NAME' => GetMessage('WDI_STEP_QUANTITY'),
				'SORT' => 800,
				'FUNC' => array(__CLASS__,'Step_Quantity'),
			),
			/*
			'CLEAR_OLD_DATA_AFTER' => array(
				'NAME' => GetMessage('WDI_CLEAR_OLD_DATA'),
				'SORT' => 850,
				'FUNC' => array(__CLASS__,'Step_ClearOldData'),
			),
			*/
			'FINISH' => array(
				'NAME' => GetMessage('WDI_STEP_FINISH'),
				'SORT' => 900,
				'FUNC' => array(__CLASS__,'Step_Finish'),
			),
		);
		foreach(GetModuleEvents(WDI_MODULE, 'OnGetSteps', true) as $arEvent) {
			ExecuteModuleEventEx($arEvent, array(&$arResult, $arProfile, $arParams));
		}
		uasort($arResult, function ($a, $b) {
			return strnatcmp($a['SORT'],$b['SORT']);
		});
		return $arResult;
	}
	
	/**
	 *	Функция старта загрузки профиля
	 */
	public static function ProfileExec($arProfile, $arParams){
		$bResult = false;
		if(is_array($arProfile)) {
			$GLOBALS['WDI_IBLOCK_ELEMENT'] = new CIBlockElement();
			$GLOBALS['WDI_IBLOCK_SECTION'] = new CIBlockSection();
			$GLOBALS['WDI_IBLOCK_PROPERTY_ENUM'] = new CIBlockPropertyEnum();
			$GLOBALS['WDI_USER_FIELD_ENUM'] = new CUserFieldEnum();
			$arSteps = self::GetSteps($arProfile, $arParams);
			if(is_array($arSteps)) {
				$arHandlers = &$GLOBALS['WDI_HANDLERS'];
				$Handler = $arProfile['HANDLER'];
				$arHandler = $arHandlers[$Handler];
				if(is_array($arHandler) && !empty($arHandler)) {
					$Message = sprintf(GetMessage('WDI_PROFILE_START'),$arProfile['ID']);
					CWDI::L($Message,true,false);
					self::ClearTmpDir($arHandler['TMP_DIR']);
					CWDI_Profile::SetFieldValue($arProfile['ID'],array(
						'LAST_ERROR' => empty($strError) ? false : $strError,
						'DATE_LAST_START' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
						'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
					));
					$obHandler = null;
					if(!empty($arHandler['CLASS_NAME']) && !empty($arHandler['DIR']) && is_file($_SERVER['DOCUMENT_ROOT'].$arHandler['DIR'].'/class.php')) {
						require_once($_SERVER['DOCUMENT_ROOT'].$arHandler['DIR'].'/class.php');
						$obHandler = new $arHandler['CLASS_NAME']($arProfile,$arHandler);
					}
					$arIBlocks = array();
					if(is_object($obHandler)){
						$arIBlocks = $obHandler->GetProfileIBlocks($arProfile);
					}
					$arData = array(
						'PROFILE' => $arProfile,
						'PARAMS' => $arParams,
						'STEPS' => $arSteps,
						'HANDLERS' => $arHandlers,
						'HANDLER' => $arHandler,
						'ERROR' => $arError,
						'IBLOCKS' => $arIBlocks,
						'FILE_PROPS' => self::GetIBlocksFileProps($arIBlocks),
						'HANDLER_CLASS' => $arHandler['CLASS_NAME'], // для обращения к реальному классу загрузчика. не очень красиво, но пока так.
					);
					foreach($arSteps as $StepCode => $arStep){
						CWDI::CheckManualStop();
						if(!empty($arStep['FUNC']) && is_callable($arStep['FUNC'])) {
							$arError = array();
							$arData['STEP'] = $StepCode;
							$arData['STEP_ARRAY'] = $arStep;
							$bResult = call_user_func_array($arStep['FUNC'],array(&$arData,$obHandler));
							if($bResult===false) {
								$strError = $arData['ERROR']['TEXT'];
								if(empty($strError)){
									$strError = GetMessage('WDI_ERROR_ON_STEP',array('#STEP_CODE#'=>$StepCode,'#STEP_NAME#'=>$arStep['NAME']));
								}
								CWDI_Profile::SetFieldValue($arProfile['ID'],array(
									'LAST_ERROR' => empty($strError) ? false : $strError,
									'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
								));
								CWDI::L('[0003] '.$strError);
								CWDI::W('[0003] '.$strError);
								CWDI::E();
								#break;
							}
						}
					}
				}
			}
		}
		return $bResult;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 *	Шаг: запуск процесса
	 */
	public static function Step_Start(&$arData,$obHandler){
		// Проверка заполненности профиля
		$arProfile = $arData['PROFILE'];
		if(empty($arProfile['HANDLER']) && !is_array($arData['HANDLERS'][$arProfile['HANDLER']])) {
			$arData['ERROR']['TEXT'] = 'Wrong handler for profile!';
			return false;
		}
		self::ProfileSetStatus($arData['PROFILE']['ID'], 'START', false, false, true);
		// Создаем сессию загрузки
		$arData['SESSION_ID'] = ToUpper(MD5(ToUpper(RandString(32).uniqid().time())));
		CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
			'SESSION_ID' => $arData['SESSION_ID'],
			'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
		));
		// Возвращаем результат
		return true;
	}
	
	/**
	 *	Шаг: Получение файла
	 */
	public static function Step_GetFile(&$arData,$obHandler){
		// Получение/скачивание файла
		/*
		if(!empty($arFile['FILE_ORIGINAL']) && is_file($_SERVER['DOCUMENT_ROOT'].$arFile['FILE_ORIGINAL'])){
			$arData['FILE_ORIGINAL'] = $arFile['FILE_ORIGINAL'];
		}
		// ToDo: опция удаления файла после завершения импорта (только для варианта поиска файла в папке, поэтому нужно использовать обратную связь на класс загрузчика)
		*/
		self::ProfileSetStatus($arData['PROFILE']['ID'], 'GETTING_FILE', false, false, true);
		if($obHandler->GetFile()) {
			// Получение даты файла
			CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
				'DATE_FILE' => $obHandler->GetFileDate(),
				'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
			));
			// Возвращаем результат
			return true;
		}
		return false;
	}
	
	/**
	 *	Шаг: Очистка предыдущих данных
	 */
	public static function Step_ClearOldData(&$arData,$obHandler){
		CWDI_Data::DeleteProfileData($arData['PROFILE']['ID']);
		return true;
	}
	
	/**
	 *	Шаг: Чтение файла в БД
	 */
	public static function Step_Read(&$arData,$obHandler){
		self::ProfileSetStatus($arData['PROFILE']['ID'], 'READ', false, false, true);
		// Чтение файла и сохранение всех данных в БД
		$bRead = $obHandler->ReadFileToDatabase($arData);
		// Возвращаем результат
		if($bRead) {
			return true;
		}
		return false;
	}
	
	/**
	 *	Шаг: Загрузка элементов и разделов из БД в инфоблоки [Наиболее ответственный шаг!!!]
	 */
	public static function Step_Write(&$arData,$obHandler){
		self::ProfileSetStatus($arData['PROFILE']['ID'], 'WRITE', false, false, true);
		$bResult = false;
		// Подсчет кол-ва объектов для обработки
		$Count = 0;
		$resItems = CWDI_Data::GetList(array('ID'=>'ASC'),array('PROFILE_ID'=>$arData['PROFILE']['ID'],'SESSION_ID'=>$arData['SESSION_ID']),array('ID'));
		while($arItem = $resItems->GetNext()){
			$Count++;
		}
		$GLOBALS['WDI_STEP_WRITE_COUNT'] = $Count;
		$GLOBALS['WDI_STEP_WRITE_INDEX'] = 0;
		// Создание свойств
		$arIBlocks = $arData['IBLOCKS'];
		foreach($arIBlocks as $intIBlockID){
			self::CreateProperties($intIBlockID);
		}
		// Загрузка данных
		$resItems = CWDI_Data::GetList(array('ID'=>'ASC'),array('PROFILE_ID'=>$arData['PROFILE']['ID'],'SESSION_ID'=>$arData['SESSION_ID'],'PARENT_ID'=>'0'));
		while($arItem = $resItems->GetNext()){
			self::WriteObject($arItem, false, $arData, $obHandler);
		}
		// Устанавливаем успешный результат
		$bResult = true;
		// Возвращаем результат
		return $bResult;
	}
	
	/**
	 *	[for self::Step_Write()]
	 *	Функция загрузки объекта (и [рекурсивно] его подэлементов) из `b_wdi_data`
	 */
	private static function WriteObject($arObject, $arParentItem, &$arData, $obHandler){
		CWDI::CheckManualStop();
		//
		$GLOBALS['WDI_STEP_WRITE_INDEX']++;
		self::ProfileSetStatus($arData['PROFILE']['ID'], 'WRITE', $GLOBALS['WDI_STEP_WRITE_INDEX'], $GLOBALS['WDI_STEP_WRITE_COUNT']);
		// 1.0 если это торговое предложение и их загрузка запрещена, то добавлять ТП не нужно (на самом деле обработка этого случая идет выше по коду)
		if($arObject['TYPE']=='O' && $arData['PROFILE']['PARAMS']['LOAD_OFFERS']!='Y') {
			return false;
		}
		// 1.1 проверяем корректность полей, создаем недостающее
		$arObject['FIELDS'] = unserialize($arObject['~FIELDS']);
		if(!is_array($arObject['FIELDS'])) {
			$arObject['FIELDS'] = array();
		}
		$arObject['FILTER'] = unserialize($arObject['~FILTER']);
		if(!is_array($arObject['FILTER'])) {
			$arObject['FILTER'] = array();
		}
		// 1.2 преобразуем массивы данных (поля, свойства, поля каталога)
		$arObject['DATA_FIELDS'] = array();
		$arObject['DATA_PROPERTIES'] = array();
		$arObject['DATA_CATALOG'] = array();
		$arObject['DATA_SEO'] = array();
		// 1.3 Преобразуем фильтр
		foreach($arObject['FILTER'] as $Target => $arValue){
			$arObject['FILTER'][$Target] = self::ProcessValue($arValue['RAW'],$Target,$arObject['IBLOCK_ID'],$arValue['MATCH'],$arData['PROFILE']['FIELDS'],$arValue['PARAMS'],$arData,false);
		}
		// 1.3 предварительная обработка
		if($arObject['TYPE']=='O') { // если это торговое предложение, то определяем инфоблок с предложениями, добавляем в фильтр родительский элемент и добавляем его же к загружаемым данным
			if($GLOBALS['WDI_CATALOG_INCLUDED']) {
				$arCatalog = CWDI::GetCatalogArray($arObject['IBLOCK_ID']);
				if(!is_array($arCatalog)) {
					return false;
				}
				$arObject['OFFERS_IBLOCK_ID'] = $arCatalog['OFFERS_IBLOCK_ID'];
				$arObject['OFFERS_PROPERTY_ID'] = $arCatalog['OFFERS_PROPERTY_ID'];
				$resOffersParentItem = CWDI_Data::GetList(array('ID'=>'ASC'),array('ID'=>$arObject['PARENT_ID']),array('OBJECT_ID'));
				if($arOffersParentItem = $resOffersParentItem->GetNext()){
					$arObject['OFFERS_PARENT_ELEMENT'] = $arOffersParentItem['OBJECT_ID'];
				}
			}
		}
		unset($arCatalog, $resOffersParentItem, $arOffersParentItem);
		// 1.4 проверка существования загружаемого объекта
		$ObjectFoundID = self::SearchObject($arObject, $arData);
		// Преобразуем свойства (из массива со значением и параметрами получаем свойства для сохранения)
		foreach($arObject['FIELDS'] as $Target => $arValue){
			// 1.4.1 если элемент найден, то удаляем все поля, у которых отмечено "Не перезаписывать"
			if($ObjectFoundID>0 && $arValue['MATCH']['PARAMS']['donotoverwrite']=='Y'){
				unset($arObject['FIELDS'][$Target]);
				continue;
			}
			$arObject['FIELDS'][$Target] = self::ProcessValue($arValue['RAW'],$Target,$arObject['IBLOCK_ID'],$arValue['MATCH'],$arData['PROFILE']['FIELDS'],$arValue['PARAMS'],$arData,true);
		}
		// 1.4 Группируем в более удобном порядке
		foreach($arObject['FIELDS'] as $Target => $arValue){
			if(in_array($arObject['TYPE'],array('E','O'))) { // элементы и торговые предложений - один набор данных
				if(preg_match('#^PROPERTY_(\d+)$#',$Target,$M)) {
					$arObject['DATA_PROPERTIES'][$M[1]] = $arValue;
				} elseif(preg_match('#^CATALOG_([A-z0-9-_]+)$#',$Target,$M)) {
					$arObject['DATA_CATALOG'][$M[1]] = $arValue;
				} elseif(preg_match('#^ELEMENT_([A-z0-9-_]+)$#',$Target,$M)) {
					$arObject['DATA_SEO'][$Target] = $arValue;
				} else {
					$arObject['DATA_FIELDS'][$Target] = $arValue;
				}
			} elseif($arObject['TYPE']=='S') { // разделы - другой набор данных
				if(preg_match('#^(ELEMENT|SECTION)_([A-z0-9-_]+)$#',$Target,$M)) {
					$arObject['DATA_SEO'][$Target] = $arValue;
				} else {
					$arObject['DATA_FIELDS'][$Target] = $arValue;
				}
			}
		}
		// 1.5 выполнение загрузки
		$ObjectID = self::LoadObject($ObjectFoundID, $arObject, $arData, $obHandler);
		// 1.6 сохранение промежуточного итога (текущему элементу из b_wdi_data прописать ID загруженного объекта)
		CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
			'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
		));
		//
		$bUpdate = CWDI_Data::Update($arObject['ID'], array(
			'OBJECT_ID' => $ObjectID, // Записываем ID целевого объекта (раздела, товара или торгового предложения)
			'OPERATION' => $ObjectFoundID>0 ? 'U' : 'A', // Записываем тип проведенной операции - создание товара ('A' [ADD]) или обновление ('U' [UPDATE])
		));
		if($ObjectID && $bUpdate){
			// загрузка дочерних элементов
			$resSubItems = CWDI_Data::GetList(array('ID'=>'ASC'),array('PROFILE_ID'=>$arData['PROFILE']['ID'],'SESSION_ID'=>$arData['SESSION_ID'],'PARENT_ID'=>$arObject['ID']));
			while($arSubItem = $resSubItems->GetNext()){
				self::WriteObject($arSubItem, $arObject, $arData, $obHandler);
			}
			unset($resSubItems, $arSubItem, $M);
		}
		unset($arObject, $ObjectFoundID, $ObjectID, $bUpdate, $M);
	}
	
	/**
	 *	[for self::Step_Write()]
	 *	Проверка существования объекта (по фильтру, с возможностью поиска обработчиком)
	 */
	private static function SearchObject($arObject, $arData){
		$intResult = false;
		$bSearchOnlyInThisSection = $arData['PROFILE']['PARAMS']['S'][0]['SEARCH_ONLY_IN_THIS_SECTION']=='Y';
		if(empty($arObject['FILTER'])) {
			$Message = GetMessage('WDI_ERROR_EMPTY_FILTER_'.$arObject['TYPE']);
			CWDI::L('[0024] '.$Message);
			CWDI::L($arObject,false,false);
			CWDI::W('[0024] '.$Message);
			CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
		}
		$RootSectionID = IntVal($arObject['SECTION_ID']);
		if($RootSectionID>0){
			$resRootSection = CIBlockSection::GetList(array('ID'=>'ASC'),array('IBLOCK_ID'=>$arObject['IBLOCK_ID'],'ID'=>$RootSectionID),false,array('ID','LEFT_MARGIN','RIGHT_MARGIN','DEPTH_LEVEL'));
			$arRootSection = $resRootSection->GetNext(false,false);
		}
		if(!is_array($arRootSection)) {
			$arRootSection = array();
		}
		switch($arObject['TYPE']){
			case 'E': // ELEMENT
				$arFilter = $arObject['FILTER'];
				$arFilter['IBLOCK_ID'] = $arObject['IBLOCK_ID'];
				// Учет целевого раздела
				if(!empty($arRootSection) && $bSearchOnlyInThisSection) {
					$arFilter['SECTION_ID'] = $arRootSection['ID'];
					$arFilter['INCLUDE_SUBSECTIONS'] = 'Y';
				}
				$arFilter['CHECK_PERMISSIONS'] = 'N';
				// Получаем
				$resItem = CIBlockElement::GetList(array('ID'=>'ASC'),$arFilter,false,array('nTopCount'=>'1'),array('ID'));
				if($arItem = $resItem->GetNext(false,false)) {
					$intResult = $arItem['ID'];
				}
				unset($resItem, $arItem);
				break;
			case 'O': // OFFER
				$arFilter = $arObject['FILTER'];
				$arFilter['IBLOCK_ID'] = $arObject['OFFERS_IBLOCK_ID'];
				$arFilter['PROPERTY_'.$arObject['OFFERS_PROPERTY_ID']] = $arObject['OFFERS_PARENT_ELEMENT'];
				$arFilter['CHECK_PERMISSIONS'] = 'N';
				// Получаем
				$resItem = CIBlockElement::GetList(array('ID'=>'ASC'),$arFilter,false,array('nTopCount'=>'1'),array('ID'));
				if($arItem = $resItem->GetNext(false,false)) {
					$intResult = $arItem['ID'];
				}
				unset($resItem, $arItem);
				break;
			case 'S': // SECTION
				$arFilter = $arObject['FILTER'];
				$arFilter['IBLOCK_ID'] = $arObject['IBLOCK_ID'];
				// Учет целевого раздела
				if(!empty($arRootSection) && $bSearchOnlyInThisSection) {
					$arFilter['LEFT_MARGIN'] = $arRootSection['LEFT_MARGIN'];
					$arFilter['RIGHT_MARGIN'] = $arRootSection['RIGHT_MARGIN'];
				}
				$arFilter['CHECK_PERMISSIONS'] = 'N';
				// Получаем
				$resSection = CIBlockSection::GetList(array('ID'=>'ASC'),$arFilter,false,array('ID'),array('nTopCount'=>'1'));
				if($arSection = $resSection->GetNext(false,false)) {
					$intResult = $arSection['ID'];
				}
				unset($resSection, $arSection);
				break;
		}
		unset($arRootSection, $resRootSection, $arFilter, $RootSectionID);
		return $intResult;
	}
	
	/**
	 *	Загрузка объекта (раздел, элемент, торговое предложение) в инфоблок
	 */
	private static function LoadObject($ObjectID, $arObject, $arData, $obHandler){
		$intResult = 0;
		foreach(GetModuleEvents(WDI_MODULE, 'OnBeforeLoadObject', true) as $arEvent) {
			if (ExecuteModuleEventEx($arEvent, array(&$ObjectID, &$arObject, &$arData))===false) {
				return false;
			}
		}
		self::PreProcessObject($ObjectID, $arObject, $arData, $obHandler);
		$arFields = &$arObject['DATA_FIELDS'];
		if(is_array($arObject['DATA_SEO']) && !empty($arObject['DATA_SEO'])) {
			$arFields['IPROPERTY_TEMPLATES'] = $arObject['DATA_SEO'];
		}
		$ExternalID = &$arObject['_EXTERNAL_ID'];
		$bUpdateSearch = $arData['PROFILE']['PARAMS']['SKIP_UPDATE_SEARCH']=='Y'?false:true;
		switch($arObject['TYPE']){
			case 'E':
				// Загрузка элементов
				if(empty($ObjectID)) {
					if($arData['PROFILE']['PARAMS']['SKIP_NEW_ELEMENTS']!='Y') {
						$ObjectID = $GLOBALS['WDI_IBLOCK_ELEMENT']->Add($arFields,false,$bUpdateSearch,true);
						if(is_numeric($ObjectID)) {
							$intResult = $ObjectID;
						} else {
							$Message = $GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR;
							$Message = preg_replace('#<br/*?>#i','; ',$Message);
							CWDI::L('[0005] '.$Message);
							CWDI::L($arFields,false,false);
							CWDI::W('[0005] '.$Message);
							CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
						}
					}
				} else {
					$bUpdated = $GLOBALS['WDI_IBLOCK_ELEMENT']->Update($ObjectID,$arFields,false,$bUpdateSearch,true);
					if($bUpdated) {
						$intResult = $ObjectID;
					} else {
						$Message = $GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR.' [ID: '.$ObjectID.'] [EXTERNAL ID: '.$arObject['EXTERNAL_ID'].']';
						$Message = preg_replace('#<br/*?>#i','; ',$Message);
						CWDI::L('[0006] '.$Message);
						CWDI::L($arFields,false,false);
						CWDI::W('[0006] '.$Message);
						CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
					}
				}
				if($intResult>0) {
					self::LoadObjectProperties($ObjectID, $arObject, $arData);
					if($GLOBALS['WDI_CATALOG_INCLUDED']) {
						self::LoadObjectCatalogData($ObjectID, $arObject, $arData);
					}
				}
				break;
			case 'O':
				// Загрузка торговых предложений
				if(empty($ObjectID)) {
					if($arData['PROFILE']['PARAMS']['SKIP_NEW_OFFERS']!='Y') {
						if($arData['PROFILE']['PARAMS']['SKIP_NEW_ELEMENTS']!='Y') {
							$ObjectID = $GLOBALS['WDI_IBLOCK_ELEMENT']->Add($arFields,false,$bUpdateSearch,true);
							if(is_numeric($ObjectID)) {
								$intResult = $ObjectID;
							} else {
								$Message = $GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR;
								$Message = preg_replace('#<br/*?>#i','; ',$Message);
								CWDI::L('[0007] '.$Message);
								CWDI::L($arFields,false,false);
								CWDI::W('[0007] '.$Message);
								CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
							}
						}
					}
				} else {
					$bUpdated = $GLOBALS['WDI_IBLOCK_ELEMENT']->Update($ObjectID,$arFields,false,$bUpdateSearch,true);
					if($bUpdated) {
						$intResult = $ObjectID;
					} else {
						$Message = $GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR.' [ID: '.$ObjectID.']';
						$Message = preg_replace('#<br/*?>#i','; ',$Message);
						CWDI::L('[0008] '.$Message);
						CWDI::L($arFields,false,false);
						CWDI::W('[0008] '.$Message);
						CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
					}
				}
				if($intResult>0) {
					self::LoadObjectProperties($ObjectID, $arObject, $arData);
					if($GLOBALS['WDI_CATALOG_INCLUDED']) {
						self::LoadObjectCatalogData($ObjectID, $arObject, $arData);
					}
				}
				break;
			case 'S':
				// Загрузка разделов
				if(empty($ObjectID)) {
					if($arData['PROFILE']['PARAMS']['SKIP_NEW_SECTIONS']!='Y') {
						$ObjectID = $GLOBALS['WDI_IBLOCK_SECTION']->Add($arFields,true,$bUpdateSearch,false);
						if(is_numeric($ObjectID)) {
							$intResult = $ObjectID;
						} else {
							$Message = $GLOBALS['WDI_IBLOCK_SECTION']->LAST_ERROR;
							$Message = preg_replace('#<br/*?>#i','; ',$Message).' [EXTERNAL ID: '.$arObject['EXTERNAL_ID'].']';
							CWDI::L('[0009] '.$Message);
							CWDI::L($arFields,false,true);
							CWDI::W('[0009] '.$Message);
							CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
						}
					}
				} else {
					self::SectionDeleteOldFiles($arFields['IBLOCK_ID'], $ObjectID, $arFields); // Удаляем старые файлы из UF_* (т.к. они сами не удаляются)
					if($arFields['IBLOCK_SECTION_ID']==$ObjectID) { // Чтобы избежать ошибки перемещения раздела внутрь себя
						unset($arFields['IBLOCK_SECTION_ID']);
					}
					$bUpdated = $GLOBALS['WDI_IBLOCK_SECTION']->Update($ObjectID,$arFields,true,$bUpdateSearch,false);
					if($bUpdated) {
						$intResult = $ObjectID;
					} else {
						$Message = $GLOBALS['WDI_IBLOCK_SECTION']->LAST_ERROR.' [ID: '.$ObjectID.']';
						$Message = preg_replace('#<br/*?>#i','; ',$Message);
						CWDI::L('[0010] '.$Message);
						CWDI::L($arFields,false,false);
						CWDI::W('[0010] '.$Message);
						CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
					}
				}
				break;
		}
		if(!empty($arData['HANDLER_CLASS']) && method_exists($arData['HANDLER_CLASS'],'OnObjectProcessed')) {
			call_user_func_array(array($arData['HANDLER_CLASS'],'OnObjectProcessed'), array($ObjectID, $arObject, $arData, $arFields, $intResult));
		}
		foreach(GetModuleEvents(WDI_MODULE, 'OnAfterLoadObject', true) as $arEvent) {
			if (ExecuteModuleEventEx($arEvent, array($ObjectID, $arObject, $arData, $arFields, $intResult))===false) {
				return false;
			}
		}
		return $intResult;
	}
	
	/**
	 *	Удаление старых файлов из свойства раздела
	 */
	private static function SectionDeleteOldFiles($IBlockID, $SectionID, $arFields){
		$arUfCodesToBeDeleted = array();
		$arFilesToBeDeleted = array();
		$arUfFilesAll = self::GetSectionUfFileProperties($IBlockID);
		foreach($arUfFilesAll as $strField => $arField){
			if(is_array($arFields[$strField]) && !empty($arFields[$strField])){
				$arUfCodesToBeDeleted[] = $strField;
			}
		}
		if(!empty($arUfCodesToBeDeleted)) {
			$resSection = CIBlockSection::GetList(array(),array('IBLOCK_ID'=>$IBlockID,'ID'=>$SectionID),false,array_merge(array('ID'),$arUfCodesToBeDeleted));
			if($arSection = $resSection->GetNext(false,false)){
				foreach($arUfCodesToBeDeleted as $strField){
					if(is_numeric($arSection[$strField]) && $arSection[$strField]>0) {
						$arFilesToBeDeleted[] = $arSection[$strField];
					} elseif (is_array($arSection[$strField])){
						foreach($arSection[$strField] as $Value){
							if(is_numeric($Value) && $Value>0) {
								$arFilesToBeDeleted[] = $Value;
							}
						}
					}
				}
			}
		}
		if(!empty($arFilesToBeDeleted)){
			foreach($arFilesToBeDeleted as $FileID){
				CFile::Delete($FileID);
			}
		}
	}
	
	/**
	 *	Получение свойств (раздела) типа Файл (для того, чтобы в дальнейшем при обновлении раздела удалить имеющиеся файлы)
	 */
	private static function GetSectionUfFileProperties($IBlockID){
		$arResult = array();
		$PHPCache = new CPHPCache();
		$CacheLifeTime = 60*60;
		$CacheID = 'GetSectionUfFileProperties_'.$IBlockID;
		if($PHPCache->InitCache($CacheLifeTime, $CacheID, '/')) {
			$arResult = $PHPCache->GetVars();
		} else {
			$resProps = CUserTypeEntity::GetList(array('ID'=>'ASC'), array('ENTITY_ID'=>'IBLOCK_'.$IBlockID.'_SECTION','USER_TYPE_ID'=>'file'));
			while($arProp = $resProps->GetNext(false,false)) {
				$arResult[$arProp['FIELD_NAME']] = $arProp;
			}
			if($PHPCache->StartDataCache()) {
				$PHPCache->EndDataCache($arResult); 
			}
		}
		unset($PHPCache);
		return $arResult;
	}
	
	/**
	 *	Проверка, что товар привязан к нескольким разделам
	 */
	function ElementHasSomeParents($ElementID) {
		$resSections = CIBlockElement::GetElementGroups($ElementID,true,array('ID'));
		$intSectionsCount = 0;
		while ($arSectionToItem = $resSections->GetNext(false,false)) {
			$intSectionsCount++;
		}
		if ($intSectionsCount>1) {
			return true;
		}
		return false;
	}
	
	/**
	 *	Проверка, что у имеющегося раздела есть символьный код
	 */
	private static function DoesSectionHasCode($SectionID,$IBlockID=false){
		$arFilter = array('ID'=>$SectionID);
		if(is_numeric($IBlockID) && $IBlockID>0) {
			$arFilter['IBLOCK_ID'] = $IBlockID;
		}
		$resSection = CIBlockSection::GetList(array(),$arFilter,false,array('ID','CODE'));
		if ($arSection = $resSection->GetNext(false,false)) {
			return strlen(trim($arSection['CODE']))>0;
		}
		return false;
	}
	
	/**
	 *	Проверка, что у имеющегося элемента есть символьный код
	 */
	private static function DoesElementHasCode($ElementID,$IBlockID=false){
		$arFilter = array('ID'=>$ElementID);
		if(is_numeric($IBlockID) && $IBlockID>0) {
			$arFilter['IBLOCK_ID'] = $IBlockID;
		}
		$resElement = CIBlockElement::GetList(array(),$arFilter,false,false,array('ID','CODE'));
		if ($arElement = $resElement->GetNext(false,false)) {
			return strlen(trim($arElement['CODE']))>0;
		}
		return false;
	}
	
	/**
	 *	Получение имени раздела
	 */
	function GetSectionName($SectionID,$IBlockID=false){
		$arFilter = array('ID'=>$SectionID);
		if(is_numeric($IBlockID) && $IBlockID>0) {
			$arFilter['IBLOCK_ID'] = $IBlockID;
		}
		$resSection = CIBlockSection::GetList(array(),$arFilter,false,false,array('ID','NAME'));
		if ($arSection = $resSection->GetNext(false,false)) {
			return $arSection['NAME'];
		}
		return false;
	}
	
	/**
	 *	Получение имени товара
	 */
	function GetElementName($ElementID,$IBlockID=false){
		$arFilter = array('ID'=>$ElementID);
		if(is_numeric($IBlockID) && $IBlockID>0) {
			$arFilter['IBLOCK_ID'] = $IBlockID;
		}
		$resElement = CIBlockElement::GetList(array(),$arFilter,false,false,array('ID','NAME'));
		if ($arElement = $resElement->GetNext(false,false)) {
			return $arElement['NAME'];
		}
		return false;
	}
	
	/**
	 *	Предварительная обработка объектов перед сохранением
	 */
	private static function PreProcessObject($ObjectID, &$arObject, $arData, $obHandler){
		//
		$Type = $arObject['TYPE'];
		$arFields = &$arObject['DATA_FIELDS'];
		$arFields['IBLOCK_ID'] = $arObject['IBLOCK_ID'];
		// Для торговых предложений - изменение ID инфоблока и дополнение CML2_LINK
		if($Type=='O') {
			$arFields['IBLOCK_ID'] = $arObject['OFFERS_IBLOCK_ID'];
			$arFields['PROPERTY_'.$arObject['OFFERS_PROPERTY_ID']] = $arObject['OFFERS_PARENT_ELEMENT'];
			$arObject['DATA_PROPERTIES'][$arObject['OFFERS_PROPERTY_ID']] = $arObject['OFFERS_PARENT_ELEMENT'];
		}
		// Описание для анонса, подробное описание, описание раздела
		if(in_array($Type,array('E','O'))) {
			if(is_array($arFields['PREVIEW_TEXT'])) {
				$arFields['PREVIEW_TEXT_TYPE'] = $arFields['PREVIEW_TEXT']['TYPE'];
				$arFields['PREVIEW_TEXT'] = $arFields['PREVIEW_TEXT']['TEXT'];
			}
			if(is_array($arFields['DETAIL_TEXT'])) {
				$arFields['DETAIL_TEXT_TYPE'] = $arFields['DETAIL_TEXT']['TYPE'];
				$arFields['DETAIL_TEXT'] = $arFields['DETAIL_TEXT']['TEXT'];
			}
		}
		if($Type=='S' && is_array($arFields['DESCRIPTION'])) {
			$arFields['DESCRIPTION_TYPE'] = $arFields['DESCRIPTION']['TYPE'];
			$arFields['DESCRIPTION'] = $arFields['DESCRIPTION']['TEXT'];
		}
		// Определяем родителя
		if($arObject['PARENT_ID']>0) { // Для некорневых разделов/элементов: их родительский раздел, указанный в PARENT_ID
			$resParentItem = CWDI_Data::GetList(array('ID'=>'ASC'),array('ID'=>$arObject['PARENT_ID']),array('OBJECT_ID'));
			if($arParentItem = $resParentItem->GetNext()){
				switch($Type){
					case 'E':
						$arFields['IBLOCK_SECTION_ID'] = $arParentItem['OBJECT_ID'];
						break;
					case 'O':
						// Нет необходимости, т.к. смотри код выше - OFFERS_PARENT_ELEMENT
						break;
					case 'S':
						$arFields['IBLOCK_SECTION_ID'] = $arParentItem['OBJECT_ID'];
						break;
				}
			}
			unset($resParentItem, $arParentItem);
		} elseif($arObject['SECTION_ID']>0) { // Для корневых разделов/элементов: целевой раздел
			$resSection = $GLOBALS['WDI_IBLOCK_SECTION']::GetList(array(),array('IBLOCK_ID'=>$arFields['IBLOCK_ID'],'ID'=>$arObject['SECTION_ID'],'CHECK_PERMISSIONS'=>'N'),false,array('ID'));
			if(!$resSection->GetNext(false,false)) {
				$Message = GetMessage('WDI_ERROR_EMPTY_ROOT_SECTION',array('#SECTION_ID#'=>'[ID='.$arObject['SECTION_ID'].']'));
				CWDI::L('[0011] '.$Message);
				CWDI::W('[0011] '.$Message);
				CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
			}
			unset($resSection);
			switch($Type){
				case 'E':
					$arFields['IBLOCK_SECTION_ID'] = $arObject['SECTION_ID'];
					break;
				case 'O':
					// Нет необходимости, т.к. смотри код выше - OFFERS_PARENT_ELEMENT
					break;
				case 'S':
					$arFields['IBLOCK_SECTION_ID'] = $arObject['SECTION_ID'];
					break;
			}
		}
		if(in_array($Type,array('E','O')) && $ObjectID>0 && $arData['PROFILE']['PARAMS']['ELEMENTS_SKIP_MOVING']=='Y'){
			unset($arFields['IBLOCK_SECTION_ID']);
		}
		if(in_array($Type,array('E','O')) && isset($arFields['IBLOCK_SECTION_ID']) && $ObjectID>0 && $arData['PROFILE']['PARAMS']['SKIP_MULTISECTIONS']=='Y' && self::ElementHasSomeParents($ObjectID)){ // Не привязываем к разделам элементы, уже привязанные к нескольким разделам
			unset($arFields['IBLOCK_SECTION_ID']);
		}
		if($Type=='S' && isset($arFields['IBLOCK_SECTION_ID']) && $ObjectID>0 && $arData['PROFILE']['PARAMS']['SECTIONS_SKIP_MOVING']=='Y') { // Не перемещать имеющиеся разделы
			unset($arFields['IBLOCK_SECTION_ID']);
		}
		switch($Type){
			case 'E':
				// Флаг активности
				if(empty($ObjectID) && in_array($arData['PROFILE']['PARAMS']['NEW_ELEMENTS_ACTIVE'],array('Y','N'))) { // Add
					$arFields['ACTIVE'] = $arData['PROFILE']['PARAMS']['NEW_ELEMENTS_ACTIVE'];
				} elseif(!empty($ObjectID) && in_array($arData['PROFILE']['PARAMS']['OLD_ELEMENTS_ACTIVE'],array('Y','N'))) { // Upd
					$arFields['ACTIVE'] = $arData['PROFILE']['PARAMS']['OLD_ELEMENTS_ACTIVE'];
				}
				// Определяем символьный код
				$arIBlockParameters = CWDI::GetIBlockParameters($arObject['IBLOCK_ID']);
				if($arIBlockParameters['CODE']['IS_REQUIRED']=='Y' || $arIBlockParameters['CODE']['TRANSLITERATION']=='Y'){
					if(isset($arFields['CODE']) && !strlen($arFields['CODE']) || !self::DoesElementHasCode($ObjectID,$arObject['IBLOCK_ID'])) {
						$strName = $arFields['NAME'];
						if(empty($strName) && $ObjectID>0) {
							$strName = self::GetElementName($ObjectID,$arObject['IBLOCK_ID']);
						}
						$arFields['CODE'] = strlen($arFields['CODE'])>0 ? $arFields['CODE'] : self::GenerateProductCode($strName,$arObject['IBLOCK_ID']);
					}
				}
				unset($arIBlockParameters);
				break;
			case 'O':
				// Флаг активности
				if($arData['PROFILE']['PARAMS']['LOAD_OFFERS']=='Y' && $arData['PROFILE']['PARAMS']['SKIP_NEW_OFFERS']!='Y') {
					if(empty($ObjectID) && in_array($arData['PROFILE']['PARAMS']['NEW_OFFERS_ACTIVE'],array('Y','N'))) { // Add
						$arFields['ACTIVE'] = $arData['PROFILE']['PARAMS']['NEW_OFFERS_ACTIVE'];
					} elseif(!empty($ObjectID) && in_array($arData['PROFILE']['PARAMS']['OLD_OFFERS_ACTIVE'],array('Y','N'))) { // Upd
						$arFields['ACTIVE'] = $arData['PROFILE']['PARAMS']['OLD_OFFERS_ACTIVE'];
					}
					// Определяем символьный код
					$arIBlockParameters = CWDI::GetIBlockParameters($arObject['OFFERS_IBLOCK_ID']);
					if($arIBlockParameters['CODE']['IS_REQUIRED']=='Y' || $arIBlockParameters['CODE']['TRANSLITERATION']=='Y'){
						if(strlen($arFields['CODE']) && !strlen($arFields['CODE']) || !self::DoesElementHasCode($ObjectID,$arObject['OFFERS_IBLOCK_ID'])) {
							$strName = $arFields['NAME'];
							if(empty($strName) && $ObjectID>0) {
								$strName = self::GetElementName($ObjectID,$arObject['OFFERS_IBLOCK_ID']);
							}
							$arFields['CODE'] = strlen($arFields['CODE'])>0 ? $arFields['CODE'] : self::GenerateProductCode($strName,$arObject['OFFERS_IBLOCK_ID']);
						}
					}
					unset($arIBlockParameters);
				}
				break;
			case 'S':
				// Флаг активности
				if(empty($ObjectID) && in_array($arData['PROFILE']['PARAMS']['NEW_SECTIONS_ACTIVE'],array('Y','N'))) { // Add
					$arFields['ACTIVE'] = $arData['PROFILE']['PARAMS']['NEW_SECTIONS_ACTIVE'];
				} elseif(!empty($ObjectID) && in_array($arData['PROFILE']['PARAMS']['OLD_SECTIONS_ACTIVE'],array('Y','N'))) { // Upd
					$arFields['ACTIVE'] = $arData['PROFILE']['PARAMS']['OLD_SECTIONS_ACTIVE'];
				}
				// Определяем символьный код
				$arIBlockParameters = CWDI::GetIBlockParameters($arObject['IBLOCK_ID']);
				if($arIBlockParameters['SECTION_CODE']['IS_REQUIRED']=='Y' || $arIBlockParameters['SECTION_CODE']['TRANSLITERATION']=='Y'){
					if(isset($arFields['CODE']) && !strlen($arFields['CODE']) || !self::DoesSectionHasCode($ObjectID,$arObject['IBLOCK_ID'])) {
						$strName = $arFields['NAME'];
						if(empty($strName) && $ObjectID>0) {
							$strName = self::GetSectionName($ObjectID,$arObject['IBLOCK_ID']);
						}
						$arFields['CODE'] = strlen($arFields['CODE'])>0 ? $arFields['CODE'] : self::GenerateSectionCode($strName,$arObject['IBLOCK_ID']);
					}
				}
				unset($arIBlockParameters);
				break;
		}
		// Для разделов все свойства загружаем одновременно с основными данными
		if($Type=='S') {
			$arFields['UF_'.self::PROP_SESSION_ID] = $arData['SESSION_ID'];
			$arFields['UF_'.self::PROP_PROFILE_ID] = $arData['PROFILE']['ID'];
			$arFields['UF_'.self::PROP_EXTERNAL_ID] = $arObject['EXTERNAL_ID'];
			$arFields['UF_'.self::PROP_DATETIME] = date(CDatabase::DateFormatToPHP(FORMAT_DATETIME));
		}
		// Отложенная загрузка изображений (загружаем только изображения, имена которых отличаются от имеющихся)
		switch($Type){
			case 'E':
			case 'O':
				$intElementIBlockID = ($Type == 'O' && $arObject['OFFERS_IBLOCK_ID'] > 0 ? $arObject['OFFERS_IBLOCK_ID'] : $arObject['IBLOCK_ID']);
				foreach($arFields as $Key => $Value){
					if(in_array($Key,array('PREVIEW_PICTURE','DETAIL_PICTURE')) && is_array($Value)) {
						if($Value['DELAY']=='Y'){
							$arFileCurrent = self::GetCurrentFileValueElement($intElementIBlockID, $ObjectID, $Key);
							if(empty($arFileCurrent) || count($arFileCurrent)===1 && reset($arFileCurrent)!=pathinfo($Value['SRC'],PATHINFO_BASENAME)) {
								$arFields[$Key] = call_user_func_array($Value['CALLBACK'],array($Value['SRC'],$Value['CALLBACK_ARGS']));
							} else {
								unset($arFields[$Key]);
							}
						}
						else{
							$arFileCurrent = self::GetCurrentFileValueElement($intElementIBlockID, $ObjectID, $Key, true);
							$intExistsFileID = array_search($Value['name'].'|'.$Value['size'],$arFileCurrent);
							if(!$intExistsFileID) {
								$arFields[$Key] = $Value;
							} else {
								unset($arFields[$Key]);
							}
						}
					}
				}
				if(is_array($arData['FILE_PROPS'][$intElementIBlockID]['ELEMENT'])) {
					foreach($arObject['DATA_PROPERTIES'] as $PropID => $PropValue){
						if(in_array($PropID,$arData['FILE_PROPS'][$intElementIBlockID]['ELEMENT'])) {
							$arFileNew = array();
							$bMultiple = self::IsIBlockPropertyMultiple($PropID);
							if($bMultiple) {
								if(is_array($PropValue) && is_array($PropValue[0])){
									$PropValueTmp = array();
									$intNewIndex = 0;
									foreach($PropValue as $Key => $arPropValueItem){
										if(is_array($arPropValueItem)){
											if($arPropValueItem['DELAY']=='Y'){
												$arFileCurrent = self::GetCurrentFileValueElement($intElementIBlockID, $ObjectID, $PropID);
												$intExistsFileID = array_search(pathinfo($arPropValueItem['SRC'],PATHINFO_BASENAME),$arFileCurrent);
												if($intExistsFileID===false){
													$PropValueTmp['n'.($intNewIndex++)] = array('VALUE'=>call_user_func_array($arPropValueItem['CALLBACK'],array($arPropValueItem['SRC'],$arPropValueItem['CALLBACK_ARGS'])),'DESCRIPTION'=>'');
												} else {
													$arExistsFileID = explode('|',$intExistsFileID);
													$PropValueTmp[$arExistsFileID[0]] = array('VALUE' => array('name'=>'','type'=>'','tmp_name'=>'','error'=>4,'size'=>0,'description'=>''),'DESCRIPTION'=>'');
												}
											}
											else{
												$arFileCurrent = self::GetCurrentFileValueElement($intElementIBlockID, $ObjectID, $PropID, true);
												$intExistsFileID = array_search($arPropValueItem['name'].'|'.$arPropValueItem['size'],$arFileCurrent);
												if($intExistsFileID===false){
													$PropValueTmp['n'.($intNewIndex++)] = $arPropValueItem;
												} else {
													$arExistsFileID = explode('|',$intExistsFileID);
													$PropValueTmp[$arExistsFileID[0]] = array('VALUE' => array('name'=>'','type'=>'','tmp_name'=>'','error'=>4,'size'=>0,'description'=>''),'DESCRIPTION'=>'');
												}
											}
										}
									}
									$PropValue = $PropValueTmp;
								}
							} else {
								if(is_array($PropValue)){
									if($PropValue['DELAY']=='Y'){
										$arFileCurrent = self::GetCurrentFileValueElement($intElementIBlockID, $ObjectID, $PropID);
										$intExistsFileID = array_search(pathinfo($PropValue['SRC'],PATHINFO_BASENAME),$arFileCurrent);
										if($intExistsFileID===false){
											$PropValue = array('VALUE'=>call_user_func_array($PropValue['CALLBACK'],array($PropValue['SRC'],$PropValue['CALLBACK_ARGS'])),'DESCRIPTION'=>'');
										} else {
											$PropValue = array('VALUE'=>'','DESCRIPTION'=>'','ID'=>$intExistsFileID);
										}
									}
									else{
										$arFileCurrent = self::GetCurrentFileValueElement($intElementIBlockID, $ObjectID, $PropID, true);
										$intExistsFileID = array_search($PropValue['name'].'|'.$PropValue['size'],$arFileCurrent);
										if($intExistsFileID===false){
											$PropValue = $PropValue;
										} else {
											$PropValue = array('VALUE'=>'','DESCRIPTION'=>'','ID'=>$intExistsFileID);
										}
									}
								}
							}
							if(!empty($PropValue)) {
								$arObject['DATA_PROPERTIES'][$PropID] = $PropValue;
							} else {
								unset($arObject['DATA_PROPERTIES'][$PropID]);
							}
						}
					}
				}
				break;
		}
		//
		if(!empty($arData['HANDLER']['CLASS_NAME']) && method_exists($arData['HANDLER']['CLASS_NAME'],'OnAfterPreProcess')) {
			$arFieldsTmp = call_user_func(array($obHandler,'OnAfterPreProcess'),$arFields,$ObjectID,$arObject,$arData);
			if(is_array($arFieldsTmp) && !empty($arFieldsTmp)) {
				$arFields = $arFieldsTmp;
			}
		}
		//
		foreach(GetModuleEvents(WDI_MODULE, 'OnAfterPreProcessObject', true) as $arEvent) {
			ExecuteModuleEventEx($arEvent, array($ObjectID, &$arObject, $arData, $obHandler));
		}
		// Возвращаем результат
		return $arFields;
	}
	
	/**
	 *	Получение массива внешних кодов (т.е. фактически внешний код файла это его basename - так нужно указывать при загрузке данным модулем!) имеющихся файлов
	 *	$Field = (PREVIEW_PICTURE || DETAIL_PICTURE) || PROPERTY_MORE_PHOTO || 123 [id of property]
	 */
	public static function GetCurrentFileValueElement($IBlockID, $ElementID, $Field, $bByNameAndSize=false){
		$arResult = array();
		if($ElementID>0) {
			if(in_array($Field,array('PREVIEW_PICTURE','DETAIL_PICTURE'))) {
				$resItem = CIBlockElement::GetList(array(),array('IBLOCK_ID'=>$IBlockID,'ID'=>$ElementID),false,false,array($Field));
				if($arItem = $resItem->GetNext(false,false)) {
					if(is_numeric($arItem[$Field]) && $arItem[$Field]>0) {
						$SQL = "SELECT ID, EXTERNAL_ID, ORIGINAL_NAME, FILE_SIZE FROM b_file WHERE ID={$arItem[$Field]} LIMIT 1;";
						$resFile = $GLOBALS['DB']->Query($SQL);
						$arFile = $resFile->GetNext(false,false);
						if(is_array($arFile)) {
							if($bByNameAndSize) {
								$arResult[$arFile['ID']] = $arFile['ORIGINAL_NAME'].'|'.$arFile['FILE_SIZE'];
							}
							else{
								$arResult[$arFile['ID']] = $arFile['EXTERNAL_ID'];
							}
						}
					}
				}
			} elseif (is_numeric($Field) && $Field>0 || preg_match('#^PROPERTY_(.*?)$#',$Field,$M)){
				$arFilter = array('EMPTY'=>'N');
				if(is_numeric($Field) && $Field>0) {
					$arFilter['ID'] = $Field;
				} elseif(is_numeric($Field) && $Field>0) {
					$arFilter['CODE'] = $M[1];
				}
				$resProps = CIBlockElement::GetProperty($IBlockID, $ElementID, array(), $arFilter);
				while($arProp = $resProps->GetNext(false,false)){
					if(is_numeric($arProp['VALUE']) && $arProp['VALUE']>0) {
						$SQL = "SELECT ID, EXTERNAL_ID, ORIGINAL_NAME, FILE_SIZE FROM b_file WHERE ID={$arProp['VALUE']} LIMIT 1;";
						$resFile = $GLOBALS['DB']->Query($SQL);
						$arFile = $resFile->GetNext(false,false);
						if(is_array($arFile)) {
							if($bByNameAndSize) {
								$arResult[$arProp['PROPERTY_VALUE_ID'].'|'.$arFile['ID']] = $arFile['ORIGINAL_NAME'].'|'.$arFile['FILE_SIZE'];
							}
							else{
								$arResult[$arProp['PROPERTY_VALUE_ID'].'|'.$arFile['ID']] = $arFile['EXTERNAL_ID'];
							}
						}
					}
				}
			}
		}
		return $arResult;
	}
	
	public static function IsIBlockPropertyMultiple($PropertyID){
		$resProp = CIBlockProperty::GetByID($PropertyID);
		if($arProp = $resProp->GetNext(false,false)) {
			if($arProp['MULTIPLE']=='Y') {
				return true;
			}
		}
		return false;
	}
	
	/**
	 *	Загрузка свойств элемента
	 */
	private static function LoadObjectProperties($ObjectID, $arObject, $arData){
		if($ObjectID) {
			$IBlockID = $arObject['TYPE']=='O' ? $arObject['OFFERS_IBLOCK_ID'] : $arObject['IBLOCK_ID'];
			if(!is_array($arObject['DATA_PROPERTIES'])){
				$arObject['DATA_PROPERTIES'] = array();
			}
			$arObject['DATA_PROPERTIES'][self::PROP_SESSION_ID] = $arData['SESSION_ID'];
			$arObject['DATA_PROPERTIES'][self::PROP_PROFILE_ID] = $arData['PROFILE']['ID'];
			$arObject['DATA_PROPERTIES'][self::PROP_EXTERNAL_ID] = $arObject['EXTERNAL_ID'];
			$arObject['DATA_PROPERTIES'][self::PROP_DATETIME] = date(CDatabase::DateFormatToPHP(FORMAT_DATETIME));
			CIBlockElement::SetPropertyValuesEx($ObjectID, $IBlockID, $arObject['DATA_PROPERTIES']);
		}
	}
	
	/**
	 *	Загрузка параметров торгового каталога для элемента (в т.ч. цены и остатки на складах)
	 */
	private static function LoadObjectCatalogData($ObjectID, $arObject, $arData){
		if($ObjectID && !empty($arObject['DATA_CATALOG'])) {
			$arPrices = array();
			$arStores = array();
			$arCatalog = array();
			foreach($arObject['DATA_CATALOG'] as $Key => $Value){
				if(preg_match('#^PRICE_(\d+)$#i',$Key,$M)) {
					$arPrices[$M[1]] = $Value;
				} elseif(preg_match('#^STORE_(\d+)$#i',$Key,$M)) {
					$arStores[$M[1]] = $Value;
				} else {
					$arCatalog[$Key] = $Value;
				}
			}
			// Prepare fields
			foreach(array('QUANTITY_TRACE','CAN_BUY_ZERO','SUBSCRIBE') as $Field){ // Подставляем дефолтные значения для QUANTITY_TRACE, CAN_BUY_ZERO, SUBSCRIBE
				if(!isset($arCatalog[$Field])) {
					$arCatalog[$Field] = $arData['PROFILE']['PARAMS']['ELEMENTS_'.$Field];
				}
			}
			if(!is_numeric($arCatalog['MEASURE']) || $arCatalog['MEASURE']<=0) {
				$arCatalog['MEASURE'] = $arData['PROFILE']['PARAMS']['DEFAULT_UNIT']>0 ? $arData['PROFILE']['PARAMS']['DEFAULT_UNIT'] : false;
			}
			if(!is_numeric($arCatalog['VAT_ID']) || $arCatalog['VAT_ID']<=0) {
				$arCatalog['VAT_ID'] = $arData['PROFILE']['PARAMS']['DEFAULT_VAT']>0 ? $arData['PROFILE']['PARAMS']['DEFAULT_VAT'] : 0;
			}
			if(!in_array($arCatalog['VAT_INCLUDED'],array('Y','N'))) {
				$arCatalog['VAT_INCLUDED'] = $arData['PROFILE']['PARAMS']['VAT_INCLUDED']=='Y' ? 'Y' : 'N';
			}
			if(isset($arCatalog['PURCHASING_PRICE'])) {
				$arCatalog['PURCHASING_CURRENCY'] = self::DetermineCurrency($arCatalog['PURCHASING_PRICE'], $arCatalog['PURCHASING_CURRENCY'], $arObject, $arData);
				$arCatalog['PURCHASING_PRICE'] = CWDI::RemoveNonNumbers($arCatalog['PURCHASING_PRICE'],true);
			}
			//
			if(!empty($arCatalog)) {
				$Barcode = $arCatalog['BARCODE'];
				// Unset superfluous elements
				unset($arCatalog['BARCODE']);
				foreach($arCatalog as $Key => $Value){
					if(preg_match('#^CURRENCY_(\d+)$#i',$Key)) {
						unset($arCatalog[$Key]);
					}
					if(trim($Value)=='') {
						unset($arCatalog[$Key]);
					}
				}
				// Save catalog product
				$arCatalog = array_merge(array('ID'=>$ObjectID),$arCatalog);
				if (CCatalogProduct::Add($arCatalog)) {
					// Measure ratio
					$resRatio = CCatalogMeasureRatio::GetList(array(),array('PRODUCT_ID'=>$ObjectID));
					if ($arRatio = $resRatio->GetNext(false,false)) {
						CCatalogMeasureRatio::Update($arRatio['ID'],array('RATIO'=>$arCatalog['MEASURE_RATIO']));
					} else {
						CCatalogMeasureRatio::Add(array('PRODUCT_ID'=>$ObjectID,'RATIO'=>$arCatalog['MEASURE_RATIO']));
					}
					// Prices
					if(!empty($arPrices)) {
						foreach($arPrices as $PriceID => $PriceValue){
							$Currency = self::DetermineCurrency($PriceValue, $arCatalog['CURRENCY_'.$PriceID], $arObject, $arData);
							$PriceValue = CWDI::RemoveNonNumbers($PriceValue,true);
							CWDI::SetProductPrice($ObjectID, $PriceID, $PriceValue, $Currency);
							unset($arCatalog['CURRENCY_'.$PriceID]);
						}
					}
					// Stores
					if(!empty($arStores)) {
						foreach($arStores as $StoreID => $Quantity){
							CWDI::SetProductStoreQuantity($ObjectID, $StoreID, $Quantity);
						}
					}
					// Barcodes
					if(!empty($Barcode)) {
						$arProduct = CCatalogProduct::GetByID($ObjectID);
						if($arProduct['BARCODE_MULTI']=='N') {
							$resBarCodes = CCatalogStoreBarCode::GetList(array(),array('PRODUCT_ID'=>$ObjectID));
							while($arBarCode = $resBarCodes->GetNext(false,false)) {
								$Key = array_search($arBarCode['BARCODE'],$Barcode);
								if($Key===false) {
									CCatalogStoreBarCode::Delete($arBarCode['ID']);
								}
							}
							foreach($Barcode as $strBarCode){
								CCatalogStoreBarCode::Add(array('PRODUCT_ID'=>$ObjectID,'BARCODE'=>$strBarCode));
							}
						}
					}
					// Пересчет общего остатка по складам
					if($arData['PROFILE']['PARAMS']['RECALCULATE_QUANTITY']=='Y' && $GLOBALS['WDI_CATALOG_EXT_INCLUDED']) {
						$arActiveStoresID = array();
						$resStores = CCatalogStore::GetList(array(),array('ACTIVE'=>'Y'),false,false,array('ID'));
						while ($arStore = $resStores->GetNext(false,false)){
							$arActiveStoresID[] = $arStore['ID'];
						}
						if (!empty($arActiveStoresID)) {
							$intQuantity = 0;
							$resCount = CCatalogStoreProduct::GetList(array(), array('PRODUCT_ID'=>$ObjectID,'STORE_ID'=>$arActiveStoresID)); 
							while ($arCount = $resCount->GetNext(false,false)){
								$intQuantity += $arCount['AMOUNT'];
							}
							$arProduct = array(
								'ID' => $ObjectID,
								'QUANTITY' => $intQuantity,
							);
							$resProduct = CCatalogProduct::Add($arProduct);
						}
					}
					//
				} else {
					$Message = GetMessage('WDI_ERROR_CATALOG_PRODUCT_ADD');
					CWDI::L('[0012] '.$Message);
					CWDI::W('[0012] '.$Message);
					CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
				}
			}
		}
	}
	
	/**
	 *	Определение валют
	 */
	private static function DetermineCurrency($Price, $CurrencyValue, $arObject, $arData){
		$strResult = 'RUB';
		$arCurrencies = CWDI::GetCurrencyList();
		$bSuccess = false;
		// подготавливаем обозначения
		$arDesignations = $arData['PROFILE']['PARAMS']['CURRENCY_DESIGNATIONS'];
		if(!is_array($arDesignations)) {
			$arDesignations = array();
		}
		foreach($arCurrencies as $arCurrency){
			$arDesignations[$arCurrency['CURRENCY']] .= (!empty($arDesignations[$arCurrency['CURRENCY']])?',':'').$arCurrency['CURRENCY'];
		}
		foreach($arDesignations as $Key => $Value){
			$Value = ToUpper(trim($Value));
			if(empty($Value)) {
				unset($arDesignations[$Key]);
			} else {
				$Value = explode(',',$Value);
				foreach($Value as $SubKey => $SubValue){
					$SubValue = trim($SubValue);
					if(empty($SubValue)) {
						unset($Value[$SubValue]);
					} else {
						$Value[$SubKey] = $SubValue;
					}
				}
				$arDesignations[$Key] = $Value;
			}
		}
		// сначала определяем в валюте, указанной отдельным значением (напр., в Excel - отдельной колонкой)
		if(!empty($CurrencyValue)) {
			foreach($arDesignations as $Currency => $arCurrencyDesignations) {
				foreach($arCurrencyDesignations as $strCurrencyDesignation){
					if (strpos($CurrencyValue,$strCurrencyDesignation)!==false) {
						$strResult = $Currency;
						$bSuccess = true;
						break 2;
					}
				}
			}
		}
		// если не успешно, то определяем валюту из самой цены
		if(!$bSuccess) {
			foreach($arDesignations as $Currency => $arCurrencyDesignations) {
				foreach($arCurrencyDesignations as $strCurrencyDesignation){
					if (stripos($Price,$strCurrencyDesignation)!==false) {
						$strResult = $Currency;
						$bSuccess = true;
						break 2;
					}
				}
			}
		}
		// если и из цены не определили, то используем валюту по умолчанию
		if(!$bSuccess) {
			$strResult = $arData['PROFILE']['PARAMS']['DEFAULT_CURRENCY'];
		}
		return $strResult;
	}
	
	/**
	 *	Шаг: Привязка к доп. разделам
	 */
	public static function Step_SetMoreParents(&$arData,$obHandler){
		self::ProfileSetStatus($arData['PROFILE']['ID'], 'MORE_PARENTS', false, false, true);
		include($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/iblock/install/version.php');
		$bNeedUpdateFaset = CheckVersion($arModuleVersion['VERSION'], '15.0.1');
		$arFilter = array(
			'PROFILE_ID' => $arData['PROFILE']['ID'],
			'SESSION_ID' => $arData['SESSION_ID'],
			'!MORE_PARENT_ID' => false
		);
		if($arData['PROFILE']['PARAMS']['ELEMENTS_SKIP_MOVING']=='Y') {
			$arFilter['OPERATION'] = 'A'; // Не привязываем к разделам, если отмечена опция "Не перемещать имеющиеся элементы"
		}
		$resObjectWithMoreParents = CWDI_Data::GetList(array('ID'=>'ASS'),$arFilter,array('ID','OBJECT_ID','IBLOCK_ID','PARENT_ID','MORE_PARENT_ID'));
		while($arObjectWithMoreParents = $resObjectWithMoreParents->GetNext(false,false)){
			self::PreventWaitTimeout();
			if ($arData['PROFILE']['PARAMS']['SKIP_MULTISECTIONS']=='Y' && self::ElementHasSomeParents($arObjectWithMoreParents['OBJECT_ID'])) {
				continue;
			}
			$arMoreParents = array_merge(array($arObjectWithMoreParents['PARENT_ID']),explode(',',$arObjectWithMoreParents['MORE_PARENT_ID']));
			$arSectionsID = array();
			$resObjects = CWDI_Data::GetList(array('ID'=>'ASC'),array('PROFILE_ID'=>$arData['PROFILE']['ID'],'SESSION_ID'=>$arData['SESSION_ID'],'TYPE'=>'S','ID'=>$arMoreParents),array('ID','OBJECT_ID'));
			while($arObject = $resObjects->GetNext(false,false)){
				if($arObject['OBJECT_ID']>0) {
					$arSectionsID[] = $arObject['OBJECT_ID'];
				}
			}
			if(count($arSectionsID)>1) {
				CIBlockElement::SetElementSection($arObjectWithMoreParents['OBJECT_ID'],$arSectionsID);
				CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
					'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
				));
				if($bNeedUpdateFaset) {
					PropertyIndex\Manager::UpdateElementIndex($arObjectWithMoreParents['IBLOCK_ID'], $arObjectWithMoreParents['OBJECT_ID']);
				}
			}
		}
	}
	
	/**
	 *	Шаг: Деактивация элементов и разделов
	 */
	public static function Step_Deactivate(&$arData,$obHandler){
		self::ProfileSetStatus($arData['PROFILE']['ID'], 'DEACTIVATE', false, false, true);
		#$arIBlocks = $obHandler->GetProfileIBlocks($arData['PROFILE']);
		$arIBlocks = $arData['IBLOCKS'];
		$arOffersIBlocks = array();
		if($arData['PROFILE']['PARAMS']['LOAD_OFFERS']=='Y') {
			foreach($arIBlocks as $intIBlockID){
				$arCatalog = CWDI::GetCatalogArray($intIBlockID);
				if(is_array($arCatalog) && $arCatalog['OFFERS_IBLOCK_ID']>0) {
					$arOffersIBlocks[] = $arCatalog['OFFERS_IBLOCK_ID'];
				}
			}
		}
		$bUpdateSearch = $arData['PROFILE']['PARAMS']['SKIP_UPDATE_SEARCH']=='Y'?false:true;
		// Деактивация «старых» разделов
		if($arData['PROFILE']['PARAMS']['DEACTIVATE_MISSING_SECTIONS']=='Y'){
			foreach($arIBlocks as $intIBlockID){
				$arFilter = array(
					'IBLOCK_ID' => $intIBlockID,
					'ACTIVE' => 'Y',
					'!=UF_'.self::PROP_SESSION_ID => $arData['SESSION_ID'],
				);
				switch($arData['PROFILE']['PARAMS']['DEACTIVATE_MISSING_SECTIONS_TYPE']) {
					case 'profile':
						$arFilter['=UF_'.self::PROP_PROFILE_ID] = $arData['PROFILE']['ID'];
						break;
					case 'module':
						$arFilter['!UF_'.self::PROP_SESSION_ID] = false;
						$arFilter['>UF_'.self::PROP_PROFILE_ID] = 0;
						break;
					case 'all':
						// nothing
						break;
				}
				$resSections = CIBlockSection::GetList(array('ID'=>'ASC'),$arFilter,false,array('ID','IBLOCK_ID'));
				while($arSection = $resSections->GetNext(false,false)){
					self::PreventWaitTimeout();
					if($GLOBALS['WDI_IBLOCK_SECTION']->Update($arSection['ID'],array('ACTIVE'=>'N'),true,$bUpdateSearch,false)){
						CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
							'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
						));
					} else {
						$Message = GetMessage('WDI_ERROR_SECTION_DEACTIVATE',array('#ID#'=>$arSection['ID'],'#MESSAGE#'=>$GLOBALS['WDI_IBLOCK_SECTION']->LAST_ERROR));
						CWDI::L('[0013] '.$Message);
						CWDI::W('[0013] '.$Message);
						CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
					}
				}
			}
		}
		// Деактивация «старых» элементов
		if($arData['PROFILE']['PARAMS']['DEACTIVATE_MISSING_ELEMENTS']=='Y'){
			foreach($arIBlocks as $intIBlockID){
				$arFilter = array(
					'IBLOCK_ID' => $intIBlockID,
					'ACTIVE' => 'Y',
					'!=PROPERTY_'.self::PROP_SESSION_ID => $arData['SESSION_ID'],
				);
				switch($arData['PROFILE']['PARAMS']['DEACTIVATE_MISSING_ELEMENTS_TYPE']) {
					case 'profile':
						$arFilter['=PROPERTY_'.self::PROP_PROFILE_ID] = $arData['PROFILE']['ID'];
						break;
					case 'module':
						$arFilter['!PROPERTY_'.self::PROP_SESSION_ID] = false;
						$arFilter['>PROPERTY_'.self::PROP_PROFILE_ID] = 0;
						break;
					case 'all':
						// nothing
						break;
				}
				$resElements = CIBlockElement::GetList(array('ID'=>'ASC'),$arFilter,false,false,array('ID','IBLOCK_ID'));
				while($arElement = $resElements->GetNext(false,false)){
					self::PreventWaitTimeout();
					if($GLOBALS['WDI_IBLOCK_ELEMENT']->Update($arElement['ID'],array('ACTIVE'=>'N'),false,$bUpdateSearch,false)){
						CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
							'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
						));
					} else {
						$Message = GetMessage('WDI_ERROR_ELEMENT_DEACTIVATE',array('#ID#'=>$arElement['ID'],'#MESSAGE#'=>$GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR));
						CWDI::L('[0014] '.$Message);
						CWDI::W('[0014] '.$Message);
						CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
					}
				}
			}
		}
		// Деактивация «старых» торговых предложений
		if($arData['PROFILE']['PARAMS']['DEACTIVATE_MISSING_OFFERS']=='Y'){
			foreach($arOffersIBlocks as $intIBlockID){
				$arFilter = array(
					'IBLOCK_ID' => $intIBlockID,
					'ACTIVE' => 'Y',
					'!=PROPERTY_'.self::PROP_SESSION_ID => $arData['SESSION_ID'],
				);
				switch($arData['PROFILE']['PARAMS']['DEACTIVATE_MISSING_OFFERS_TYPE']) {
					case 'profile':
						$arFilter['=PROPERTY_'.self::PROP_PROFILE_ID] = $arData['PROFILE']['ID'];
						break;
					case 'module':
						$arFilter['!PROPERTY_'.self::PROP_SESSION_ID] = false;
						$arFilter['>PROPERTY_'.self::PROP_PROFILE_ID] = 0;
						break;
					case 'all':
						// nothing
						break;
				}
				$resElements = CIBlockElement::GetList(array('ID'=>'ASC'),$arFilter,false,false,array('ID','IBLOCK_ID'));
				while($arElement = $resElements->GetNext(false,false)){
					self::PreventWaitTimeout();
					if($GLOBALS['WDI_IBLOCK_ELEMENT']->Update($arElement['ID'],array('ACTIVE'=>'N'),false,$bUpdateSearch,false)){
						CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
							'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
						));
					} else {
						$Message = GetMessage('WDI_ERROR_OFFER_DEACTIVATE',array('#ID#'=>$arElement['ID'],'#MESSAGE#'=>$GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR));
						CWDI::L('[0015] '.$Message);
						CWDI::W('[0015] '.$Message);
						CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
					}
				}
			}
		}
		// Автоматическая активация/деактивация по остатку/цене
		if($GLOBALS['WDI_CATALOG_INCLUDED'] && ($arData['PROFILE']['PARAMS']['ACTIVATE_BY_QUANTITY_GENERAL']=='Y' || $arData['PROFILE']['PARAMS']['ACTIVATE_BY_QUANTITY_STORE']=='Y' || $arData['PROFILE']['PARAMS']['ACTIVATE_BY_PRICE']=='Y')){
			foreach($arIBlocks as $intIBlockID){
				$arCatalog = CWDI::GetCatalogArray($intIBlockID);
				if(is_array($arCatalog)) {
					$resElements = CIBlockElement::GetList(array('ID'=>'ASC'),array('IBLOCK_ID'=>$intIBlockID,'=PROPERTY_'.self::PROP_SESSION_ID=>$arData['SESSION_ID']),false,false,array('ID'));
					while($arElement = $resElements->GetNext(false,false)){
						self::PreventWaitTimeout();
						$bHasOffers = false;
						if($arCatalog['OFFERS_IBLOCK_ID']>0) {
							$resOffers = CIBlockElement::GetList(array('ID'=>'ASC'),array('IBLOCK_ID'=>$arCatalog['OFFERS_IBLOCK_ID'],'PROPERTY_'.$arCatalog['OFFERS_PROPERTY_ID']=>$arElement['ID']),false,false,array('ID'));
							while($arOffer = $resOffers->GetNext(false,false)) {
								$Active = self::CheckDeactivateProduct($arOffer['ID'],$arData)===false ? 'N' : 'Y';
								if($GLOBALS['WDI_IBLOCK_ELEMENT']->Update($arOffer['ID'],array('ACTIVE'=>$Active),false,$bUpdateSearch,false)){
									CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
										'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
									));
								} else {
									$Message = GetMessage('WDI_ERROR_OFFER_'.($Active=='N'?'DE':'').'ACTIVATE',array('#ID#'=>$arOffer['ID'],'#MESSAGE#'=>$GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR));
									CWDI::L('[0016] '.$Message);
									CWDI::W('[0016] '.$Message);
									CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
								}
								$bHasOffers = true;
							}
						}
						if(!$bHasOffers) {
							$Active = self::CheckDeactivateProduct($arElement['ID'],$arData)===false ? 'N' : 'Y';
							if($GLOBALS['WDI_IBLOCK_ELEMENT']->Update($arElement['ID'],array('ACTIVE'=>$Active),false,$bUpdateSearch,false)){
								CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
									'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
								));
							} else {
								$Message = GetMessage('WDI_ERROR_ELEMENT_'.($Active=='N'?'DE':'').'ACTIVATE',array('#ID#'=>$arElement['ID'],'#MESSAGE#'=>$GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR));
								CWDI::L('[0017] '.$Message);
								CWDI::W('[0017] '.$Message);
								CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
							}
						}
					}
				}
			}
		}
		return true;
	}
	
	/**
	 *	Проверка необходимости активации/деактивации товара по остатку/цене
	 */
	public static function CheckDeactivateProduct($ProductID, $arData){
		$arParams = $arData['PROFILE']['PARAMS'];
		$bActivateByQuantity = false;
		$bActivateByStoreQuantity = false;
		$bActivateByPrice = false;
		// проверка общего остатка
		if($arParams['ACTIVATE_BY_QUANTITY_GENERAL']=='Y') {
			$arCatalogProduct = CCatalogProduct::GetByID($ProductID);
			if(!is_array($arCatalogProduct) || $arCatalogProduct['QUANTITY']>0) {
				$bActivateByQuantity = true;
			}
		}
		// проверка остатка по складам
		if($arParams['ACTIVATE_BY_QUANTITY_STORE']=='Y' && is_array($arParams['ACTIVATE_BY_QUANTITY_STORE_LIST']) && !empty($arParams['ACTIVATE_BY_QUANTITY_STORE_LIST'])) {
			$intStoresQuantity = 0;
			$resStores = CCatalogStoreProduct::GetList(array('ID'=>'ASC'),array('PRODUCT_ID'=>$ProductID));
			while($arStore = $resStores->GetNext(false,false)){
				if(in_array($arStore['STORE_ID'],$arParams['ACTIVATE_BY_QUANTITY_STORE_LIST'])){
					$intStoresQuantity += $arStore['AMOUNT'];
				}
			}
			$bActivateByStoreQuantity = $intStoresQuantity>0;
		}
		// проверка цен
		if($arParams['ACTIVATE_BY_PRICE']=='Y' && is_array($arParams['ACTIVATE_BY_PRICE_LIST']) && !empty($arParams['ACTIVATE_BY_PRICE_LIST'])) {
			$fPriceSumm = 0;
			$resPrices = CPrice::GetListEx(array(),array('PRODUCT_ID'=>$ProductID));
			while($arPrice = $resPrices->GetNext(false,false)){
				if(in_array($arPrice['CATALOG_GROUP_ID'],$arParams['ACTIVATE_BY_PRICE_LIST'])){
					$fPriceSumm += $arPrice['PRICE'];
				}
			}
			$bActivateByPrice = $fPriceSumm>0;
		}
		// возвращаем результат
		return ($bActivateByQuantity===true || $bActivateByStoreQuantity===true || $bActivateByPrice===true ? true : false);
	}
	
	/**
	 *	Шаг: Применение параметров складского учета
	 */
	/*
	public static function Step_Stores(&$arData,$obHandler){
		return true;
	}
	*/
	
	/**
	 *	Шаг: Обработка остатков
	 */
	public static function Step_Quantity(&$arData,$obHandler){
		self::ProfileSetStatus($arData['PROFILE']['ID'], 'QUANTITY', false, false, true);
		$arIBlocks = $arData['IBLOCKS'];
		$arOffersIBlocks = array();
		if($arData['PROFILE']['PARAMS']['CLEAR_QUANTITY_MISSING_ELEMENTS']=='Y'){
			foreach($arIBlocks as $intIBlockID){
				$arFilter = array(
					'IBLOCK_ID' => $intIBlockID,
					'!=PROPERTY_'.self::PROP_SESSION_ID => $arData['SESSION_ID'],
				);
				switch($arData['PROFILE']['PARAMS']['CLEAR_QUANTITY_MISSING_ELEMENTS_TYPE']) {
					case 'profile':
						$arFilter['=PROPERTY_'.self::PROP_PROFILE_ID] = $arData['PROFILE']['ID'];
						break;
					case 'module':
						$arFilter['!PROPERTY_'.self::PROP_SESSION_ID] = false;
						$arFilter['>PROPERTY_'.self::PROP_PROFILE_ID] = 0;
						break;
					case 'all':
						// nothing
						break;
				}
				$resElements = CIBlockElement::GetList(array('ID'=>'ASC'),$arFilter,false,false,array('ID','IBLOCK_ID','NAME'));
				while($arElement = $resElements->GetNext(false,false)){
					self::PreventWaitTimeout();
					$arCatalogProduct = array(
						'ID' => $arElement['ID'],
						'QUANTITY' => 0,
					);
					CCatalogProduct::Add($arCatalogProduct);
					CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
						'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
					));
				}
			}
			if($arData['PROFILE']['PARAMS']['LOAD_OFFERS']=='Y') {
				foreach($arIBlocks as $intIBlockID){
					$arCatalog = CWDI::GetCatalogArray($intIBlockID);
					if(is_array($arCatalog) && $arCatalog['OFFERS_IBLOCK_ID']>0) {
						$arOffersIBlocks[] = $arCatalog['OFFERS_IBLOCK_ID'];
					}
				}
				foreach($arOffersIBlocks as $intIBlockID){
					$arFilter = array(
						'IBLOCK_ID' => $intIBlockID,
						'ACTIVE' => 'Y',
						'!=PROPERTY_'.self::PROP_SESSION_ID => $arData['SESSION_ID'],
					);
					switch($arData['PROFILE']['PARAMS']['CLEAR_QUANTITY_MISSING_ELEMENTS_TYPE']) {
						case 'profile':
							$arFilter['=PROPERTY_'.self::PROP_PROFILE_ID] = $arData['PROFILE']['ID'];
							break;
						case 'module':
							$arFilter['!PROPERTY_'.self::PROP_SESSION_ID] = false;
							$arFilter['>PROPERTY_'.self::PROP_PROFILE_ID] = 0;
							break;
						case 'all':
							// nothing
							break;
					}
					$resElements = CIBlockElement::GetList(array('ID'=>'ASC'),$arFilter,false,false,array('ID','IBLOCK_ID'));
					while($arElement = $resElements->GetNext(false,false)){
						self::PreventWaitTimeout();
						$arCatalogProduct = array(
							'ID' => $arElement['ID'],
							'QUANTITY' => 0,
						);
						CCatalogProduct::Add($arCatalogProduct);
						CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
							'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
						));
					}
				}
			}
		}
		return true;
	}
	
	/**
	 *	Шаг: Завершение
	 */
	public static function Step_Finish(&$arData,$obHandler){
		self::ProfileSetStatus($arData['PROFILE']['ID'], 'FINISHED', false, false, true);
		CWDI_Profile::SetFieldValue($arData['PROFILE']['ID'],array(
			'LAST_ERROR' => empty($strError) ? false : $strError,
			'DATE_LAST_SUCCESS' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
			'DATE_LAST_ACTION' => date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT)),
		));
		return true;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 *	Получение списка обработчиков (типов загрузки)
	 */
	public static function GetList() {
		$arResult = array();
		$Key = 'WDI_HANDLERS_LIST';
		if(is_array($GLOBALS[$Key]) && !empty($GLOBALS[$Key])) {
			return $GLOBALS[$Key];
		} else {
			$HandlersPath = BX_ROOT.'/modules/'.WDI_MODULE.'/handlers/';
			if (is_dir($_SERVER['DOCUMENT_ROOT'].$HandlersPath)) {
				$Handle = opendir($_SERVER['DOCUMENT_ROOT'].$HandlersPath);
				while (($File = readdir($Handle))!==false) {
					if ($File != '.' && $File != '..') {
						if (is_dir($_SERVER['DOCUMENT_ROOT'].$HandlersPath.$File) && is_file($_SERVER['DOCUMENT_ROOT'].$HandlersPath.$File.'/.description.php')) {
							require($_SERVER['DOCUMENT_ROOT'].$HandlersPath.$File.'/.description.php');
							if(is_array($arHandler) && !empty($arHandler['CODE'])) {
								$arHandler['DIR'] = $HandlersPath.$File;
								if(empty($arHandler['ICON']) && is_file($_SERVER['DOCUMENT_ROOT'].$arHandler['DIR'].'/icon.png')) {
									$arHandler['ICON'] = $arHandler['DIR'].'/icon.png';
								}
								if(!empty($arHandler['ICON']) && is_file($_SERVER['DOCUMENT_ROOT'].$arHandler['ICON'])) {
									$ImgType = pathinfo($arHandler['ICON'], PATHINFO_EXTENSION);
									$ImgData = file_get_contents($_SERVER['DOCUMENT_ROOT'].$arHandler['ICON']);
									$arHandler['ICON'] = 'data:image/' . $ImgType . ';base64,' . base64_encode($ImgData);
								}
								$arResult[$arHandler['CODE']] = $arHandler;
							}
						}
					}
				}
				closedir($Handle);
			}
			/*
			foreach(GetModuleEvents(WDI_MODULE, 'OnGetHandlersList', true) as $arEvent) {
				$arHandler = ExecuteModuleEventEx($arEvent);
				if(is_array($arHandler)) {
					// ToDo: custom handlers
				}
			}
			*/
			uasort($arResult, function ($a, $b) {
				return strnatcmp($a['NAME'],$b['NAME']);
			});
			$GLOBALS[$Key] = $arResult;
		}
		return $arResult;
	}
	
	/**
	 *	Получение свойств инфоблоков
	 */
	public static function GetIBlocksFileProps($arIBlocks=false){
		$arResult = array();
		//
		if(is_array($arIBlocks)){
			$arIBlocksTmp = $arIBlocks;
			foreach($arIBlocks as $intIBlockID){
				$arCatalog = CWDI::GetCatalogArray($intIBlockID);
				if(is_array($arCatalog) && $arCatalog['OFFERS_IBLOCK_ID']>0){
					$arIBlocksTmp[] = $arCatalog['OFFERS_IBLOCK_ID'];
				}
			}
			$arIBlocks = $arIBlocksTmp;
		}
		// Props for elements
		$resProps = CIBlockProperty::GetList(array('ID'=>'ASC'),array('PROPERTY_TYPE'=>'F'));
		while($arProp = $resProps->GetNext(false,false)){
			if(!is_array($arIBlocks) || in_array($arProp['IBLOCK_ID'],$arIBlocks)) {
				if(!is_array($arResult[$arProp['IBLOCK_ID']])) {
					$arResult[$arProp['IBLOCK_ID']] = array();
				}
				if(!is_array($arResult[$arProp['IBLOCK_ID']]['ELEMENT'])) {
					$arResult[$arProp['IBLOCK_ID']]['ELEMENT'] = array();
				}
				$arResult[$arProp['IBLOCK_ID']]['ELEMENT'][] = $arProp['ID'];
			}
		}
		// Props for sections
		foreach($arIBlocks as $IBlockID){
			$resData = CUserTypeEntity::GetList(array(), array('ENTITY_ID'=>'IBLOCK_2_SECTION','USER_TYPE_ID'=>'file'));
			while($arEntity = $resData->GetNext(false,false)) {
				if(!is_array($arResult[$IBlockID])) {
					$arResult[$IBlockID] = array();
				}
				if(!is_array($arResult[$IBlockID]['SECTION'])) {
					$arResult[$IBlockID]['SECTION'] = array();
				}
				$arResult[$IBlockID]['SECTION'][] = $arEntity['FIELD_NAME'];
			}
		}
		return $arResult;
	}
	
	/**
	 *	Получение временной папки на основе шаблона с макросами и массива профиля
	 */
	public static function GetTmpRealDir($arHandler,$arProfile,$Clear=false){
		if(empty($arHandler)){
			return false;
		}
		if(empty($arHandler['TMP_DIR'])) {
			$arHandler['TMP_DIR'] = '/#UPLOAD_DIR#/#MODULE_ID#/#HANDLER_CODE#/#PROFILE_ID#/';
		}
		$arHandler['TMP_DIR'] = str_replace('\\','/',$arHandler['TMP_DIR']);
		if(substr($arHandler['TMP_DIR'],-1)!='/') {
			$arHandler['TMP_DIR'] .= '/';
		}
		$arHandler['TMP_DIR'] = str_replace(array(
			'#UPLOAD_DIR#',
			'#MODULE_ID#',
			'#HANDLER_CODE#',
			'#PROFILE_ID#',
		),array(
			COption::GetOptionString('main', 'upload_dir', 'upload'),
			WDI_MODULE,
			ToLower($arHandler['CODE']),
			IntVal($arProfile['ID'])
		),$arHandler['TMP_DIR']);
		@mkdir($_SERVER['DOCUMENT_ROOT'].$arHandler['TMP_DIR'],BX_DIR_PERMISSIONS,true);
		/*
		if($Clear) {
			self::ClearTmpDir($arHandler['TMP_DIR']);
		}
		*/
		return $arHandler['TMP_DIR'];
	}
	
	/**
	 *	Очистка временной папки
	 */
	public static function ClearTmpDir($TmpDir){
		if(!empty($TmpDir) && $TmpDir!='/' && is_dir($_SERVER['DOCUMENT_ROOT'].$TmpDir)) {
			DeleteDirFilesEx($TmpDir);
			@mkdir($_SERVER['DOCUMENT_ROOT'].$TmpDir,BX_DIR_PERMISSIONS,true);
		}
	}
	
	/**
	 *	Создание необходимых свойств инфоблока (для элементов, разделов и предложений)
	 */
	public static function CreateProperties($IBlockID, $bSection=true, $bOffer=true) {
		if ($IBlockID>0) {
			// Создание свойств для текущего инфоблока: элементы
			self::CreatePropertiesElement($IBlockID);
			// Создание свойств для текущего инфоблока: разделы
			if($bSection) {
				self::CreatePropertiesSection($IBlockID);
			}
			// Создание свойств для инфоблока торговых предложений
			if ($bOffer && $GLOBALS['WDI_CATALOG_INCLUDED']) {
				$OffersIBlockID = IntVal(CWDI::GetOffersIBlockID($IBlockID));
				if ($OffersIBlockID>0) {
					self::CreatePropertiesElement($OffersIBlockID);
				}
			}
		}
	}
	public static function CreatePropertiesElement($IBlockID){
		$arElementProps = array(
			array(
				'NAME' => GetMessage('WDI_PROP_SESSION_ID_NAME'),
				'HINT' => GetMessage('WDI_PROP_SESSION_ID_DESC'),
				'CODE' => self::PROP_SESSION_ID,
				'XML_ID' => self::PROP_SESSION_ID,
				'PROPERTY_TYPE' => 'S',
				'COL_COUNT' => '40',
				'SORT' => '100001',
			),
			array(
				'NAME' => GetMessage('WDI_PROP_PROFILE_ID_NAME'),
				'HINT' => GetMessage('WDI_PROP_PROFILE_ID_DESC'),
				'CODE' => self::PROP_PROFILE_ID,
				'XML_ID' => self::PROP_PROFILE_ID,
				'PROPERTY_TYPE' => 'N',
				'COL_COUNT' => '10',
				'SORT' => '100002',
			),
			array(
				'NAME' => GetMessage('WDI_PROP_EXTERNAL_ID_NAME'),
				'HINT' => GetMessage('WDI_PROP_EXTERNAL_ID_DESC'),
				'CODE' => self::PROP_EXTERNAL_ID,
				'XML_ID' => self::PROP_EXTERNAL_ID,
				'PROPERTY_TYPE' => 'S',
				'COL_COUNT' => '40',
				'SORT' => '100003',
			),
			array(
				'NAME' => GetMessage('WDI_PROP_DATETIME_NAME'),
				'HINT' => GetMessage('WDI_PROP_DATETIME_DESC'),
				'CODE' => self::PROP_DATETIME,
				'XML_ID' => self::PROP_DATETIME,
				'PROPERTY_TYPE' => 'S',
				'USER_TYPE' => 'DateTime',
				'SORT' => '100004',
			),
		);
		$IBlockProperty = new CIBlockProperty;
		foreach($arElementProps as $arProp){
			$arProp = array_merge($arProp,array(
				'IBLOCK_ID' => $IBlockID,
				'ACTIVE' => 'Y',
			));
			$resProp = CIBlockProperty::GetList(array(),array('IBLOCK_ID'=>$IBlockID,'CODE'=>$arProp['CODE']));
			if ($arExistProp = $resProp->GetNext(false,false)) {
				$PropID = $arExistProp['ID'];
				$IBlockProperty->Update($PropID, $arProp);
			} else {
				$PropID = $IBlockProperty->Add($arProp);
			}
		}
		unset($IBlockProperty);
	}
	public static function CreatePropertiesSection($IBlockID){
		$arSectionProps = array(
			array(
				'USER_TYPE_ID' => 'string',
				'SETTINGS' => array('SIZE'=>'40'),
				'FIELD_NAME' => 'UF_'.self::PROP_SESSION_ID,
				'XML_ID' => self::PROP_SESSION_ID,
				'EDIT_FORM_LABEL' => array(
					'ru' => GetMessage('WDI_PROP_SESSION_ID_NAME'),
				),
				'HELP_MESSAGE' => array(
					'ru' => GetMessage('WDI_PROP_SESSION_ID_DESC'),
				),
				'SORT' => '100001',
			),
			array(
				'USER_TYPE_ID' => 'integer',
				'SETTINGS' => array('SIZE'=>'10'),
				'FIELD_NAME' => 'UF_'.self::PROP_PROFILE_ID,
				'XML_ID' => self::PROP_PROFILE_ID,
				'EDIT_FORM_LABEL' => array(
					'ru' => GetMessage('WDI_PROP_PROFILE_ID_NAME'),
				),
				'HELP_MESSAGE' => array(
					'ru' => GetMessage('WDI_PROP_PROFILE_ID_DESC'),
				),
				'SORT' => '100002',
			),
			array(
				'USER_TYPE_ID' => 'string',
				'SETTINGS' => array('SIZE'=>'40'),
				'FIELD_NAME' => 'UF_'.self::PROP_EXTERNAL_ID,
				'XML_ID' => self::PROP_EXTERNAL_ID,
				'EDIT_FORM_LABEL' => array(
					'ru' => GetMessage('WDI_PROP_EXTERNAL_ID_NAME'),
				),
				'HELP_MESSAGE' => array(
					'ru' => GetMessage('WDI_PROP_EXTERNAL_ID_DESCWDI_PROP_EXTERNAL_ID_DESC'),
				),
				'SORT' => '100003',
			),
			array(
				'USER_TYPE_ID' => 'datetime',
				'SETTINGS' => array('SIZE'=>'15'),
				'FIELD_NAME' => 'UF_'.self::PROP_DATETIME,
				'XML_ID' => self::PROP_DATETIME,
				'EDIT_FORM_LABEL' => array(
					'ru' => GetMessage('WDI_PROP_DATETIME_NAME'),
				),
				'HELP_MESSAGE' => array(
					'ru' => GetMessage('WDI_PROP_DATETIME_DESC'),
				),
				'SORT' => '100004',
			),
		);
		$obUserField = new CUserTypeEntity;
		foreach($arSectionProps as $arProp){
			$arProp = array_merge($arProp,array(
				'ENTITY_ID' => 'IBLOCK_'.$IBlockID.'_SECTION',
				'SHOW_FILTER' => 'N',
				'SHOW_IN_LIST' => 'N',
				'EDIT_IN_LIST' => 'N',
			));
			$resProp = CUserTypeEntity::GetList(array('ID'=>'ASC'), array('ENTITY_ID'=>$arProp['ENTITY_ID'],'FIELD_NAME'=>$arProp['FIELD_NAME']));
			if($arExistProp = $resProp->GetNext(false,false)) {
				$PropID = $arExistProp['ID'];
				$obUserField->Update($PropID, $arProp);
			} else {
				$PropID = $obUserField->Add($arProp);
			}
		}
		unset($obUserField);
	}
	
	/**
	 *	Подключение языкового файла модуля
	 */
	public static function IncludeLangFile($File){
		$File = str_replace('\\', '/', $File);
		$HandlersPath = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'].BX_ROOT.'/modules/'.WDI_MODULE.'/handlers'));
		$FileRel = substr($File,strlen($HandlersPath));
		if(preg_match('#^/([A-z0-9-_.]+)/(.*?)$#is',$FileRel,$M)) {
			$Handler = $M[1];
			unset($M[0],$M[1]);
			$FileRel = '/'.implode('/',$M);
			$LangFile = $HandlersPath.'/'.$Handler.'/lang/'.LANGUAGE_ID.$FileRel;
			if(is_file($LangFile)) {
				global $MESS;
				require($LangFile);
			}
		}
		return false;
	}
	
	/**
	 *	Подключение файла модуля
	 */
	public static function IncludeCommonFile($File,$arHandler,$arFields,$arData=array()){
		global $APPLICATION;
		$File = WDI_INCLUDE_DIR.$File;
		if(is_file($File)) {
			require($File);
		}
	}
	
	/**
	 *	Подключение (однократное) файла модуля
	 */
	public static function IncludeCommonFileOnce($File,$arHandler,$arFields,$arData){
		global $APPLICATION;
		$File = WDI_INCLUDE_DIR.$File;
		if(is_file($File)) {
			require_once($File);
		}
	}
	
	/**
	 *	Подключение файла обработчика
	 */
	public static function IncludeHandlerFile($File,$arHandler,$arFields,$arData=array()){
		global $APPLICATION;
		$File = $_SERVER['DOCUMENT_ROOT'].$arHandler['DIR'].$File;
		if(is_file($File)) {
			require($File);
		}
	}
	
	/**
	 *	Подключение (однократное) файла обработчика
	 */
	public static function IncludeHandlerFileOnce($File,$arHandler,$arFields,$arData=array()){
		global $APPLICATION;
		$File = $_SERVER['DOCUMENT_ROOT'].$arHandler['DIR'].$File;
		if(is_file($File)) {
			require_once($File);
		}
	}
	
	/**
	 *	Выполнение запроса к внешнему ресурсу
	 */
	public static function Request($arParams){
		if (!in_array($arParams['METHOD'],array('GET','POST','HEAD','PUT','DELETE'))) {
			$arParams['METHOD'] = 'GET';
		}
		if (!is_numeric($arParams['TIMEOUT']) || $arParams['TIMEOUT']<=0) {
			$arParams['TIMEOUT'] = 30;
		}
		if(!isset($arParams['HEADER'])) {
			$arParams['HEADER'] = '';
		}
		if (isset($arParams['BASIC_AUTH'])) {
			$arParams['HEADER'] .= 'Authorization: Basic '.$arParams['BASIC_AUTH']."\r\n";
		}
		if ($arParams['IGNORE_ERRORS']!==false) {
			$arParams['IGNORE_ERRORS'] = true;
		}
		#self::OnBeforeRequest($arParams);
		$arResponseHeaders = array();
		$IsCurl = function_exists('curl_version');
		if($IsCurl) {
			$Curl = curl_init();
			curl_setopt($Curl, CURLOPT_URL, $arParams['URL']);
			curl_setopt($Curl, CURLOPT_HEADER, true);
			curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($Curl, CURLOPT_TIMEOUT, $arParams['TIMEOUT']);
			curl_setopt($Curl, CURLOPT_HTTP_VERSION, $arParams['VERSION']=='1.0' ? CURL_HTTP_VERSION_1_0 : CURL_HTTP_VERSION_1_1);
			curl_setopt($Curl, CURLOPT_HTTPHEADER,array("Expect:"));
			curl_setopt($Curl, CURLOPT_FOLLOWLOCATION,true);
			if ($arParams['METHOD']=='POST') {
				curl_setopt($Curl, CURLOPT_POST, true);
			} else {
				curl_setopt($Curl, CURLOPT_CUSTOMREQUEST, $arParams['METHOD']);
				if ($Params['METHOD']=='HEAD') {
					curl_setopt($Curl, CURLOPT_NOBODY, true);
				}
			}
			curl_setopt($Curl, CURLOPT_CRLF, true);
			$arParams['HEADER'] .= 'Expect:'."\r\n";
			if (trim($arParams['HEADER'])!='') {
				curl_setopt($Curl, CURLOPT_HTTPHEADER, explode("\r\n",$arParams['HEADER']));
			}
			if (trim($arParams['CONTENT'])!='') {
				curl_setopt($Curl, CURLOPT_POSTFIELDS, $arParams['CONTENT']);
			}
			if ($arParams['SKIP_HTTPS_CHECK']===true) {
				curl_setopt($Curl, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($Curl, CURLOPT_SSL_VERIFYHOST, 0);
			}
			$strResult = curl_exec($Curl);
			$HeaderSize = curl_getinfo($Curl, CURLINFO_HEADER_SIZE);
			$arResponseHeaders = explode("\r\n",(substr($strResult, 0, $HeaderSize)));
			foreach($arResponseHeaders as $Key => $strHeader) {
				if (trim($strHeader)=='') {
					unset($arResponseHeaders[$Key]);
				}
			}
			$HttpCode = curl_getinfo($Curl, CURLINFO_HTTP_CODE);
			if(is_string($strResult) && !empty($strResult)) {
				$strResult = substr($strResult, $HeaderSize);
			}
			curl_close($Curl);
		} else {
			$arContext = array(
				'http' => array(
					'method' => $arParams['METHOD'],
					'timeout' => $arParams['TIMEOUT'],
					'ignore_errors' => $arParams['IGNORE_ERRORS'],
					'protocol_version' => '1.1',
				)
			);
			if (trim($arParams['HEADER'])!='') {
				$arContext['http']['header'] = $arParams['HEADER'];
			}
			if (trim($arParams['CONTENT'])!='') {
				$arContext['http']['content'] = $arParams['CONTENT'];
			}
			$arContext['http']['protocol_version'] = $arParams['VERSION']=='1.0' ? '1.0' : '1.1';
			$strResult = @file_get_contents($arParams['URL'], false, stream_context_create($arContext));
			$arResponseHeaders = $http_response_header;
		}
		if(is_array($arResponseHeaders)) {
			foreach($arResponseHeaders as $Key => $Value) {
				if(stristr($Value, 'content-encoding') && stristr($Value, 'gzip')) {
					$strResult = @gzinflate(substr($strResult,10));
					break;
				}
			}
		}
		$GLOBALS['WDI_RESPONSE_HEADERS'] = $arResponseHeaders;
		$GLOBALS['WDI_LAST_HTTP_STATUS'] = false;
		if(is_array($GLOBALS['WDI_RESPONSE_HEADERS'])){
			foreach($GLOBALS['WDI_RESPONSE_HEADERS'] as $strHeader){
				if(preg_match('#^HTTP/[\d.]+ (\d+)#i', $strHeader, $M)) {
					$GLOBALS['WDI_LAST_HTTP_STATUS'] = IntVal($M[1]);
				}
			}
		}
		#self::OnAfterRequest($arParams, $strResult, $arResponseHeaders, $GLOBALS['WDI_LAST_HTTP_STATUS']);
		return $strResult;
	}
	
	/**
	 *	Преобразование имени файла
	 */
	public static function GetFileBaseName($BaseName, $ProfileID){
		$BaseName = str_replace(array('?','|','$','*','^','&','@','/','\\','=','+','#','<','>',':','"','[',']',' '),'_',$BaseName);
		return '~'.$BaseName;
	}
	
	/**
	 *	Получение всех полей, свойств, параметров каталога и пр. для настройки соответствий
	 */
	public static function GetMatchesFields($IBlockID, $arHandler){
		$CacheKey = 'WDI_MATCHES_ALL_'.$IBlockID.'_'.$arHandler['CODE'];
		$arResult = $GLOBALS[$CacheKey];
		if(!is_array($arResult) || empty($arResult)) {
			$arResult = array(
				'ELEMENT' => array(),
				'SECTION' => array(),
				'OFFER' => array(),
			);
			$IBlockID = IntVal($IBlockID);
			$arCatalog = false;
			if($IBlockID>0) {
				if(1==1) {
					// ELEMENT
					$arResult['ELEMENT']['FIELDS'] = array(
						'NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_NAME'),
							'TYPE' => 'S',
						),
						'CODE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_CODE'),
							'TYPE' => 'S',
						),
						'EXTERNAL_ID' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_EXTERNAL_ID'),
							'TYPE' => 'S',
						),
						'SORT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_SORT'),
							'TYPE' => 'N:INT',
						),
						'ACTIVE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_ACTIVE'),
							'TYPE' => 'C',
						),
						'ACTIVE_FROM' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_ACTIVE_FROM'),
							'TYPE' => 'S:DateTime',
						),
						'ACTIVE_TO' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_ACTIVE_TO'),
							'TYPE' => 'S:DateTime',
						),
						'PREVIEW_TEXT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_PREVIEW_TEXT'),
							'TYPE' => 'S:HTML',
						),
						'DETAIL_TEXT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_DETAIL_TEXT'),
							'TYPE' => 'S:HTML',
						),
						'PREVIEW_PICTURE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_PREVIEW_PICTURE'),
							'TYPE' => 'F',
						),
						'DETAIL_PICTURE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_DETAIL_PICTURE'),
							'TYPE' => 'F',
						),
						'TAGS' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_TAGS'),
							'TYPE' => 'S',
						),
					);
					$arResult['ELEMENT']['PROPS'] = array();
					$arElementProps = CWDI::GetIBlockProps($IBlockID);
					foreach($arElementProps as $arProp){
						if(in_array($arProp['CODE'],array(self::PROP_SESSION_ID, self::PROP_PROFILE_ID, self::PROP_DATETIME, self::PROP_EXTERNAL_ID))) {
							continue;
						}
						$arPropItem = array(
							'NAME' => $arProp['NAME'],
							'CODE' => $arProp['CODE'],
							'TYPE' => $arProp['PROPERTY_TYPE'].(!empty($arProp['USER_TYPE'])?':'.$arProp['USER_TYPE']:''),
							'DATA' => $arProp,
						);
						if(ToUpper($arPropItem['TYPE'])=='S:DIRECTORY' && !empty($arPropItem['DATA']['USER_TYPE_SETTINGS']['TABLE_NAME'])) {
							$arPropItem['DATA']['_HLBLOCK_ID'] = CWDI::GetHighloadBlockIdByTableName($arPropItem['DATA']['USER_TYPE_SETTINGS']['TABLE_NAME']);
						}
						$arResult['ELEMENT']['PROPS']['PROPERTY_'.$arProp['ID']] = $arPropItem;
					}
					if($GLOBALS['WDI_CATALOG_INCLUDED']) {
						$arCatalog = CWDI::GetCatalogArray($IBlockID);
						$arStores = CWDI::GetStoresList();
					}
					if(is_array($arCatalog)) {
						$arPrices = CWDI::GetPriceTypeList();
						$arResult['ELEMENT']['CATALOG'] = array();
						foreach($arPrices as $arPrice){
							$arResult['ELEMENT']['CATALOG']['CATALOG_PRICE_'.$arPrice['ID']] = array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_PRICE',array('#PRICE#'=>$arPrice['NAME_LANG'])),
								'TYPE' => 'N:FLOAT',
							);
							$arResult['ELEMENT']['CATALOG']['CATALOG_CURRENCY_'.$arPrice['ID']] = array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_PRICE_CURRENCY',array('#PRICE#'=>$arPrice['NAME_LANG'])),
								'TYPE' => 'S',
							);
						}
						$arResult['ELEMENT']['CATALOG'] = array_merge($arResult['ELEMENT']['CATALOG'],array(
							'CATALOG_PURCHASING_PRICE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_PURCHASING_PRICE'),
								'TYPE' => 'N:FLOAT',
							),
							'CATALOG_PURCHASING_CURRENCY' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_PURCHASING_CURRENCY'),
								'TYPE' => 'S',
							),
							'CATALOG_CURRENCY' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_CURRENCY'),
								'TYPE' => 'S',
							),
							'CATALOG_QUANTITY' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_QUANTITY'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_QUANTITY_RESERVED' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_QUANTITY_RESERVED'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_WEIGHT' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_WEIGHT'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_LENGTH' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_LENGTH'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_WIDTH' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_WIDTH'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_HEIGHT' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_HEIGHT'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_MEASURE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_MEASURE'),
								'TYPE' => 'S',
							),
							'CATALOG_MEASURE_RATIO' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_MEASURE_RATIO'),
								'TYPE' => 'N:FLOAT',
							),
							'CATALOG_QUANTITY_TRACE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_QUANTITY_TRACE'),
								'TYPE' => 'C:THREE',
							),
							'CATALOG_CAN_BUY_ZERO' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_CAN_BUY_ZERO'),
								'TYPE' => 'C:THREE',
							),
							'CATALOG_SUBSCRIBE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_SUBSCRIBE'),
								'TYPE' => 'C:THREE',
							),
							'CATALOG_VAT_ID' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_VAT_ID'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_VAT_INCLUDED' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_VAT_INCLUDED'),
								'TYPE' => 'C',
							),
							'CATALOG_BARCODE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_BARCODE'),
								'TYPE' => 'S',
								'MULTIPLE' => 'Y',
							),
						));
						if(is_array($arStores)) {
							foreach($arStores as $arStore){
								$arResult['ELEMENT']['CATALOG']['CATALOG_STORE_'.$arStore['ID']] = array(
									'NAME' => GetMessage('WDI_IBLOCK_CATALOG_STORE',array('#STORE#'=>$arStore['TITLE'])),
									'TYPE' => 'N:FLOAT',
								);
							}
						}
					}
					$arResult['ELEMENT']['SEO'] = array(
						'ELEMENT_META_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_META_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_META_KEYWORDS' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_META_KEYWORDS'),
							'TYPE' => 'S',
						),
						'ELEMENT_META_DESCRIPTION' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_META_DESCRIPTION'),
							'TYPE' => 'S',
						),
						'ELEMENT_PAGE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_PAGE_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_PREVIEW_PICTURE_FILE_ALT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_PREVIEW_PICTURE_FILE_ALT'),
							'TYPE' => 'S',
						),
						'ELEMENT_PREVIEW_PICTURE_FILE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_PREVIEW_PICTURE_FILE_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_PREVIEW_PICTURE_FILE_NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_PREVIEW_PICTURE_FILE_NAME'),
							'TYPE' => 'S',
						),
						'ELEMENT_DETAIL_PICTURE_FILE_ALT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_DETAIL_PICTURE_FILE_ALT'),
							'TYPE' => 'S',
						),
						'ELEMENT_DETAIL_PICTURE_FILE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_DETAIL_PICTURE_FILE_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_DETAIL_PICTURE_FILE_NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_DETAIL_PICTURE_FILE_NAME'),
							'TYPE' => 'S',
						),
					);
				}
				if(1==1) {
					// SECTION
					$arResult['SECTION']['FIELDS'] = array(
						'NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_SECTION_NAME'),
							'TYPE' => 'S',
						),
						'CODE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_SECTION_CODE'),
							'TYPE' => 'S',
						),
						'EXTERNAL_ID' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_SECTION_EXTERNAL_ID'),
							'TYPE' => 'S',
						),
						'SORT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_SECTION_SORT'),
							'TYPE' => 'N:INT',
						),
						'ACTIVE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_SECTION_ACTIVE'),
							'TYPE' => 'C',
						),
						'DESCRIPTION' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_SECTION_DESCRIPTION'),
							'TYPE' => 'S:HTML',
						),
						'PICTURE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_SECTION_PICTURE'),
							'TYPE' => 'F',
						),
						'DETAIL_PICTURE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_SECTION_DETAIL_PICTURE'),
							'TYPE' => 'F',
						),
					);
					$arResult['SECTION']['PROPS'] = array();
					$arSectionProps = CWDI::GetSectionProps($IBlockID);
					foreach($arSectionProps as $arProp){
						if(in_array($arProp['FIELD_NAME'],array('UF_'.self::PROP_SESSION_ID, 'UF_'.self::PROP_PROFILE_ID, 'UF_'.self::PROP_DATETIME))) {
							continue;
						}
						$arPropItem = array(
							'NAME' => !empty($arProp['EDIT_FORM_LABEL'][LANGUAGE_ID])?$arProp['EDIT_FORM_LABEL'][LANGUAGE_ID]:$arProp['FIELD_NAME'],
							'CODE' => $arProp['FIELD_NAME'],
							'TYPE' => CWDI::GetSectionPropType($arProp['USER_TYPE_ID']),
							'DATA' => $arProp,
						);
						if(ToUpper($arPropItem['TYPE'])=='S:DIRECTORY' && !empty($arPropItem['DATA']['SETTINGS']['HLBLOCK_ID'])) {
							$arPropItem['DATA']['_HLBLOCK_ID'] = $arPropItem['DATA']['SETTINGS']['HLBLOCK_ID'];
						}
						$arResult['SECTION']['PROPS'][$arProp['FIELD_NAME']] = $arPropItem;
					}
					$arResult['SECTION']['SEO'] = array(
						'SECTION_META_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_META_TITLE'),
							'TYPE' => 'S',
						),
						'SECTION_META_KEYWORDS' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_META_KEYWORDS'),
							'TYPE' => 'S',
						),
						'SECTION_META_DESCRIPTION' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_META_DESCRIPTION'),
							'TYPE' => 'S',
						),
						'SECTION_PAGE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_PAGE_TITLE'),
							'TYPE' => 'S',
						),
						
						'SECTION_PICTURE_FILE_ALT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_PICTURE_FILE_ALT'),
							'TYPE' => 'S',
						),
						'SECTION_PICTURE_FILE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_PICTURE_FILE_TITLE'),
							'TYPE' => 'S',
						),
						'SECTION_PICTURE_FILE_NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_PICTURE_FILE_NAME'),
							'TYPE' => 'S',
						),
						
						'SECTION_DETAIL_PICTURE_FILE_ALT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_DETAIL_PICTURE_FILE_ALT'),
							'TYPE' => 'S',
						),
						'SECTION_DETAIL_PICTURE_FILE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_DETAIL_PICTURE_FILE_TITLE'),
							'TYPE' => 'S',
						),
						'SECTION_DETAIL_PICTURE_FILE_NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_DETAIL_PICTURE_FILE_NAME'),
							'TYPE' => 'S',
						),
					);
					$arResult['SECTION']['SEO_ELEMENTS'] = array(
						'ELEMENT_META_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_META_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_META_KEYWORDS' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_META_KEYWORDS'),
							'TYPE' => 'S',
						),
						'ELEMENT_META_DESCRIPTION' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_META_DESCRIPTION'),
							'TYPE' => 'S',
						),
						'ELEMENT_PAGE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_PAGE_TITLE'),
							'TYPE' => 'S',
						),
						
						'ELEMENT_PREVIEW_PICTURE_FILE_ALT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_PICTURE_FILE_ALT'),
							'TYPE' => 'S',
						),
						'ELEMENT_PREVIEW_PICTURE_FILE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_PICTURE_FILE_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_PREVIEW_PICTURE_FILE_NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_PICTURE_FILE_NAME'),
							'TYPE' => 'S',
						),
						
						'ELEMENT_DETAIL_PICTURE_FILE_ALT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_DETAIL_PICTURE_FILE_ALT'),
							'TYPE' => 'S',
						),
						'ELEMENT_DETAIL_PICTURE_FILE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_DETAIL_PICTURE_FILE_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_DETAIL_PICTURE_FILE_NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_SECTION_ELEMENT_DETAIL_PICTURE_FILE_NAME'),
							'TYPE' => 'S',
						),
					);
				}
				if($arCatalog['OFFERS_IBLOCK_ID']>0 && $arCatalog['OFFERS_PROPERTY_ID']>0) {
					$OffersIBlockID = $arCatalog['OFFERS_IBLOCK_ID'];
					// OFFER
					$arResult['OFFER']['FIELDS'] = array(
						'NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_NAME'),
							'TYPE' => 'S',
						),
						'CODE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_CODE'),
							'TYPE' => 'S',
						),
						'EXTERNAL_ID' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_EXTERNAL_ID'),
							'TYPE' => 'S',
						),
						'SORT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_SORT'),
							'TYPE' => 'N:INT',
						),
						'ACTIVE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_ACTIVE'),
							'TYPE' => 'C',
						),
						'ACTIVE_FROM' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_ACTIVE_FROM'),
							'TYPE' => 'S:DateTime',
						),
						'ACTIVE_TO' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_ACTIVE_TO'),
							'TYPE' => 'S:DateTime',
						),
						'PREVIEW_TEXT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_PREVIEW_TEXT'),
							'TYPE' => 'S:HTML',
						),
						/*
						'PREVIEW_TEXT_TYPE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_PREVIEW_TEXT_TYPE'),
							'TYPE' => 'S',
						),
						*/
						'DETAIL_TEXT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_DETAIL_TEXT'),
							'TYPE' => 'S:HTML',
						),
						/*
						'DETAIL_TEXT_TYPE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_DETAIL_TEXT_TYPE'),
							'TYPE' => 'S',
						),
						*/
						'PREVIEW_PICTURE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_PREVIEW_PICTURE'),
							'TYPE' => 'F',
						),
						'DETAIL_PICTURE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_DETAIL_PICTURE'),
							'TYPE' => 'F',
						),
						'TAGS' => array(
							'NAME' => GetMessage('WDI_IBLOCK_FIELD_ELEMENT_TAGS'),
							'TYPE' => 'S',
						),
					);
					$arResult['OFFER']['PROPS'] = array();
					if($OffersIBlockID>0) {
						$arOfferProps = CWDI::GetIBlockProps($OffersIBlockID);
						foreach($arOfferProps as $arProp){
							if(in_array($arProp['CODE'],array(self::PROP_SESSION_ID, self::PROP_PROFILE_ID, self::PROP_DATETIME))) {
								continue;
							}
							$arPropItem = array(
								'NAME' => $arProp['NAME'],
								'CODE' => $arProp['CODE'],
								'TYPE' => $arProp['PROPERTY_TYPE'].(!empty($arProp['USER_TYPE'])?':'.$arProp['USER_TYPE']:''),
								'DATA' => $arProp,
							);
							if(ToUpper($arPropItem['TYPE'])=='S:DIRECTORY' && !empty($arPropItem['DATA']['USER_TYPE_SETTINGS']['TABLE_NAME'])) {
								$arPropItem['DATA']['_HLBLOCK_ID'] = CWDI::GetHighloadBlockIdByTableName($arPropItem['DATA']['USER_TYPE_SETTINGS']['TABLE_NAME']);
							}
							$arResult['OFFER']['PROPS']['PROPERTY_'.$arProp['ID']] = $arPropItem;
						}
					}
					if($GLOBALS['WDI_CATALOG_INCLUDED']) {
						$arCatalog = CWDI::GetCatalogArray($OffersIBlockID);
					}
					if(is_array($arCatalog)) {
						$arPrices = CWDI::GetPriceTypeList();
						$arResult['OFFER']['CATALOG'] = array();
						foreach($arPrices as $arPrice){
							$arResult['OFFER']['CATALOG']['CATALOG_PRICE_'.$arPrice['ID']] = array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_PRICE',array('#PRICE#'=>$arPrice['NAME_LANG'])),
								'TYPE' => 'N:FLOAT',
							);
							$arResult['OFFER']['CATALOG']['CATALOG_CURRENCY_'.$arPrice['ID']] = array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_PRICE_CURRENCY',array('#PRICE#'=>$arPrice['NAME_LANG'])),
								'TYPE' => 'S',
							);
						}
						$arResult['OFFER']['CATALOG'] = array_merge($arResult['OFFER']['CATALOG'],array(
							'CATALOG_PURCHASING_PRICE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_PURCHASING_PRICE'),
								'TYPE' => 'N:FLOAT',
							),
							'CATALOG_PURCHASING_CURRENCY' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_PURCHASING_CURRENCY'),
								'TYPE' => 'S',
							),
							'CATALOG_CURRENCY' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_CURRENCY'),
								'TYPE' => 'S',
							),
							'CATALOG_QUANTITY' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_QUANTITY'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_QUANTITY_RESERVED' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_QUANTITY_RESERVED'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_WEIGHT' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_WEIGHT'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_LENGTH' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_LENGTH'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_WIDTH' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_WIDTH'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_HEIGHT' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_HEIGHT'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_MEASURE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_MEASURE'),
								'TYPE' => 'S',
							),
							'CATALOG_MEASURE_RATIO' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_MEASURE_RATIO'),
								'TYPE' => 'N:FLOAT',
							),
							'CATALOG_QUANTITY_TRACE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_QUANTITY_TRACE'),
								'TYPE' => 'C:THREE',
							),
							'CATALOG_CAN_BUY_ZERO' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_CAN_BUY_ZERO'),
								'TYPE' => 'C:THREE',
							),
							'CATALOG_SUBSCRIBE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_SUBSCRIBE'),
								'TYPE' => 'C:THREE',
							),
							'CATALOG_VAT_ID' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_VAT_ID'),
								'TYPE' => 'N:INT',
							),
							'CATALOG_VAT_INCLUDED' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_VAT_INCLUDED'),
								'TYPE' => 'C',
							),
							'CATALOG_BARCODE' => array(
								'NAME' => GetMessage('WDI_IBLOCK_CATALOG_BARCODE'),
								'TYPE' => 'S',
								'MULTIPLE' => 'Y',
							),
						));
						if(is_array($arStores)) {
							foreach($arStores as $arStore){
								$arResult['OFFER']['CATALOG']['CATALOG_STORE_'.$arStore['ID']] = array(
									'NAME' => GetMessage('WDI_IBLOCK_CATALOG_STORE',array('#STORE#'=>$arStore['TITLE'])),
									'TYPE' => 'N:FLOAT',
								);
							}
						}
					}
					$arResult['OFFER']['SEO'] = array(
						'ELEMENT_META_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_META_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_META_KEYWORDS' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_META_KEYWORDS'),
							'TYPE' => 'S',
						),
						'ELEMENT_META_DESCRIPTION' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_META_DESCRIPTION'),
							'TYPE' => 'S',
						),
						'ELEMENT_PAGE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_PAGE_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_PREVIEW_PICTURE_FILE_ALT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_PREVIEW_PICTURE_FILE_ALT'),
							'TYPE' => 'S',
						),
						'ELEMENT_PREVIEW_PICTURE_FILE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_PREVIEW_PICTURE_FILE_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_PREVIEW_PICTURE_FILE_NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_PREVIEW_PICTURE_FILE_NAME'),
							'TYPE' => 'S',
						),
						'ELEMENT_DETAIL_PICTURE_FILE_ALT' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_DETAIL_PICTURE_FILE_ALT'),
							'TYPE' => 'S',
						),
						'ELEMENT_DETAIL_PICTURE_FILE_TITLE' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_DETAIL_PICTURE_FILE_TITLE'),
							'TYPE' => 'S',
						),
						'ELEMENT_DETAIL_PICTURE_FILE_NAME' => array(
							'NAME' => GetMessage('WDI_IBLOCK_SEO_ELEMENT_DETAIL_PICTURE_FILE_NAME'),
							'TYPE' => 'S',
						),
					);
				}
			}
			foreach($arResult as $MatchesType => $arMatches){
				$arResult[$MatchesType]['CUSTOM'] = array();
			}
			CWDI::ExecuteHandlerEvent($arHandler,'OnGetMatchesFields',array(&$arResult, $IBlockID, $arHandler));
			foreach(GetModuleEvents(WDI_MODULE, 'OnGetMatchesFields', true) as $arEvent) {
				ExecuteModuleEventEx($arEvent, array(&$arResult, $IBlockID, $arHandler));
			}
			foreach($arResult['ELEMENT'] as $GroupType => $arGroup){
				if(!in_array($GroupType,array('FIELDS','PROPS','CATALOG','SEO','CUSTOM'))){
					unset($arResult['ELEMENT'][$GroupType]);
				}
			}
			foreach($arResult['OFFER'] as $GroupType => $arGroup){
				if(!in_array($GroupType,array('FIELDS','PROPS','CATALOG','SEO','CUSTOM'))){
					unset($arResult['OFFER'][$GroupType]);
				}
			}
			foreach($arResult['SECTION'] as $GroupType => $arGroup){
				if(!in_array($GroupType,array('FIELDS','PROPS','SEO','SEO_ELEMENTS','CUSTOM'))){
					unset($arResult['SECTION'][$GroupType]);
				}
			}
			foreach($arResult as $MatchesType => $arMatches){
				foreach($arMatches as $GroupType => $arGroup){
					$SortIndex = 0;
					foreach($arGroup as $Item => $arItem){
						$arResult[$MatchesType][$GroupType][$Item]['SORT'] = ++$SortIndex;
					}
				}
			}
			$GLOBALS[$CacheKey] = $arResult;
		}
		return $arResult;
	}
	
	/**
	 *	Получение группы для конкретного соответствия
	 */
	public static function GetMatchGroup($Code, $Matches){
		$strResult = '';
		if(is_array($Matches)) {
			foreach($Matches as $GroupCode => $arItems){
				if(is_array($arItems[$Code])) {
					$strResult = $GroupCode;
					break;
				}
			}
		}
		return $strResult;
	}
	
	/**
	 *	Получение метаданных (строка с подсказкой) для соответствия
	 */
	public static function GetMatchMetaData($MatchesType, $GroupType, $arData){
		$strResult = '';
		if($MatchesType=='ELEMENT' && $GroupType=='PROPS' && is_array($arData)) {
			$strResult = $arData['CODE'].', '.$arData['PROPERTY_TYPE'].(!empty($arData['USER_TYPE'])?':'.$arData['USER_TYPE']:'').($arData['MULTIPLE']=='Y'?'+++':'').', '.$arData['ID'];
		} elseif($MatchesType=='SECTION' && $GroupType=='PROPS' && is_array($arData)) {
			$strResult = $arData['FIELD_NAME'].', '.$arData['USER_TYPE_ID'].($arData['MULTIPLE']=='Y'?'+++':'').', '.$arData['ID'];
		} elseif($MatchesType=='OFFER' && $GroupType=='PROPS' && is_array($arData)) {
			$strResult = $arData['CODE'].', '.$arData['PROPERTY_TYPE'].(!empty($arData['USER_TYPE'])?':'.$arData['USER_TYPE']:'').($arData['MULTIPLE']=='Y'?'+++':'').', '.$arData['ID'];
		}
		return $strResult;
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 *	Обработка/загрузка всех соответствий
	 */
	final public static function ProcessMatches($arMatches, $arObject, $mCallback, $arFields, $arParams, $ExternalID){
		$arResult = array();
		if(is_array($arMatches)) {
			foreach($arMatches as $Target => $arMatch){
				if(!empty($arMatch['SOURCE'])) {
					if(!empty($arMatch['PARAMS'])) {
						parse_str($arMatch['PARAMS'],$arMatch['PARAMS']);
					}
					if(!is_array($arMatch['PARAMS'])) {
						$arMatch['PARAMS'] = array();
					}
					$arResult[$Target] = self::ProcessMatch($Target, $arMatch, $arObject, $mCallback, $arFields, $arParams);
				}
			}
		}
		$arResult['_EXTERNAL_ID'] = $ExternalID;
		return $arResult;
	}
	
	/**
	 *	Обработка/загрузка конкретного соответствия
	 */
	public static function ProcessMatch($Target, $arMatch, $arObject, $mCallback, $arFields, $arParams){
		$arResult = call_user_func_array($mCallback,array($Target,$arMatch,$arObject,$arParams));
		// For F
		if($arResult['MATCH']['TYPE']=='F') {
			// [MULTIPLE + skip_first_multiple_image]
			if($arResult['MATCH']['MULTIPLE']=='Y' && $arResult['MATCH']['PARAMS']['skip_first_multiple_image']=='Y' && is_array($arResult['RAW']) && !empty($arResult['RAW'])) {
				array_shift($arResult['RAW']);
			}
		}
		// For S:HTML
		if($arResult['MATCH']['TYPE']=='S:HTML') {
			// Auto (text || html)
			if($arResult['MATCH']['PARAMS']['html_type']=='skip' && !empty($arResult['RAW'])) {
				$Tags = 'a,b,big,br,center,code,div,font,h1,h2,h3,h4,h5,h6,i,input,img,label,li,ol,pre,q,span,select,small,strong,sub,sup,table,textarea,td,tr,u,ul,video';
				foreach(explode(',',$Tags) as $Tag){
					if(preg_match('#<'.$Tag.'(/|>|[\s])#is',$arResult['RAW'])){
						$arResult['MATCH']['PARAMS']['html_type'] = 'html';
						break;
					}
				}
			}
		}
		// Return result
		return $arResult;
	}
	
	/**
	 *	Разделения значения на множественные
	 */
	public static function ValueToMultiple($Value,$SeparatorType,$SeparatorOther,$Trim=true){
		$Separator = ',';
		if($SeparatorType=='other'){
			if(!empty($SeparatorOther)){
				$Separator = $SeparatorOther;
			}
		} else {
			$Separator = str_replace(array('new_line','tab','comma','semicolon','dash','dot','space'),array("\n","\t",',',';','-','.',' '),$SeparatorType);
		}
		$arResult = !empty($Value)?explode($Separator,$Value):array();
		if($Trim) {
			foreach($arResult as $Key => $Value){
				$arResult[$Key] = trim($Value);
			}
		}
		return $arResult;
	}
	
	/**
	 *	Обработка значения (приведение к нужному типу свойств элемента/раздела)
	 */
	public static function ProcessValue($ValueRaw,$Target,$IBlockID,$arMatch,$arFields,$arParams,$arData,$Create=true){
		$Value = $ValueRaw;
		$Target = ltrim($Target,WDI_FILTER_SYMBOLS);
		if($arMatch['MULTIPLE']=='Y' && !empty($arMatch['PARAMS']['multiple_separator']) && !($arMatch['PARAMS']['multiple_separator']=='other' && empty($arMatch['PARAMS']['multiple_separator_other']))) {
			$Value = CWDI_Handler::ValueToMultiple($Value, $arMatch['PARAMS']['multiple_separator'], $arMatch['PARAMS']['multiple_separator_other']);
		}
		$arMatchesAll = self::GetMatchesFields($IBlockID,$arData['HANDLER']);
		$MatchGroup = self::GetMatchGroup($Target,$arMatchesAll[$arParams['OBJECT_TYPE']]);
		switch($arParams['OBJECT_TYPE']){
			case 'ELEMENT':
			case 'OFFER':
				switch($MatchGroup){
					case 'FIELDS':
						switch($Target){
							case 'NAME':
								#
								break;
							case 'CODE':
								if ($arMatch['PARAMS']['convert_to_number']=='Y') {
									if($arMatch['PARAMS']['convert_to_number_type']=='float') {
										$Value = FloatVal($Value);
									} else {
										$Value = IntVal($Value);
									}
								}
								$Value = (string)$Value;
								break;
							case 'EXTERNAL_ID':
								#
								break;
							case 'SORT':
								$Value = IntVal($Value);
								if($Value<=0) {
									$Value = 500;
								}
								break;
							case 'ACTIVE':
								$Value = CWDI::GetFlagChecked($Value,$arMatch['PARAMS']['checkbox_values_y'],$arMatch['PARAMS']['checkbox_values_n'],false,true);
								break;
							case 'ACTIVE_FROM':
							case 'ACTIVE_TO':
								if(is_numeric($Value) && $Value>0) {
									$Value = round(($Value - 25569) * 86400);
									if($Value>0) {
										$Difference = date('Z');
										if(is_numeric($Difference)){
											$Value -= $Difference;
										}
										return date(CDatabase::DateFormatToPHP(FORMAT_DATETIME),$Value);
									}
								} elseif(!empty($Value)) {
									if(empty($arMatch['PARAMS']['date_format'])) {
										$arMatch['PARAMS']['date_format'] = FORMAT_DATETIME;
									}
									$TimeStamp = MakeTimeStamp($Value,$arMatch['PARAMS']['date_format']);
									if($TimeStamp>0) {
										return date(CDatabase::DateFormatToPHP(FORMAT_DATETIME),$TimeStamp);
									}
								} else {
									$Value = '';
								}
								break;
							case 'PREVIEW_TEXT':
							case 'DETAIL_TEXT':
								$Type = in_array($arMatch['PARAMS']['html_type'],array('text','html')) ? $arMatch['PARAMS']['html_type'] : '';
								if(empty($Type)) {
									$Type = 'text';
								}
								$Value = array(
									'TYPE' => $Type,
									'TEXT' => $Value,
								);
								break;
							case 'PREVIEW_PICTURE':
							case 'DETAIL_PICTURE':
								$Value = CWDI::MakeFileArray($Value, $arParams['IMAGES_PATH'], $arParams['SEARCH_IMAGES_RECURSIVE']);
								break;
							case 'TAGS':
								$Value = CWDI_Handler::ValueToMultiple($Value, $arMatch['PARAMS']['multiple_separator'], $arMatch['PARAMS']['multiple_separator_other']);
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									return trim($Value);
								});
								if(is_array($Value)){
									$Value = implode(', ',$Value);
								}
								break;
						}
						break;
						break;
					case 'PROPS':
						$arProperty = $arMatchesAll[$arParams['OBJECT_TYPE']][$MatchGroup][$Target]['DATA'];
						if(in_array($arProperty['PROPERTY_TYPE'],array('E','G'))) {
							$arProperty['_USER_TYPE'] = $arProperty['USER_TYPE'];
							$arProperty['USER_TYPE'] = '';
						}
						$PropType = $arProperty['PROPERTY_TYPE'].(!empty($arProperty['USER_TYPE'])?':'.$arProperty['USER_TYPE']:'');
						switch($PropType){
							case 'S':
								if ($arMatch['PARAMS']['convert_to_number']=='Y') {
									if($arMatch['PARAMS']['convert_to_number_type']=='float') {
										$Value = CWDI::ExecAction($Value,function($Value,$Params){
											return FloatVal($Value);
										});
									} else {
										$Value = CWDI::ExecAction($Value,function($Value,$Params){
											return IntVal($Value);
										});
									}
								}
								break;
							case 'L':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(!empty($Value) && $Params['IBLOCK_ID']>0 && !empty($Params['list_value_type'])) {
										$Params['list_value_type'] = ToUpper($Params['list_value_type']);
										$arFilter = array(
											'IBLOCK_ID' => $Params['IBLOCK_ID'],
											'PROPERTY_ID' => $Params['PROP_ID'],
										);
										$arFilter[$Params['list_value_type']] = $Value;
										$resItem = CIBlockPropertyEnum::GetList(array('ID'=>'ASC'),$arFilter);
										if($arItem = $resItem->GetNext(false,false)){
											return $arItem['ID'];
										} elseif($Params['CREATE']) {
											$arAddFields = array(
												'IBLOCK_ID' => $Params['IBLOCK_ID'],
												'PROPERTY_ID' => $Params['PROP_ID'],
												'VALUE' => $Value,
												'SORT' => $Params['list_value_type']=='SORT' ? IntVal($Value) : 500,
												'EXTERNAL_ID' => $Params['list_value_type']=='EXTERNAL_ID' ? trim($Value) : ToLower(MD5($Value)),
											);
											$EnumID = $GLOBALS['WDI_IBLOCK_PROPERTY_ENUM']->Add($arAddFields);
											if($EnumID) {
												return $EnumID;
											} else {
												$Message = GetMessage('WDI_ERROR_ADD_LIST_ENUM').print_r($arAddFields,1);
												CWDI::L('[0018] '.$Message);
												CWDI::W('[0018] '.$Message);
												CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
												#return false;
											}
										}
									}
									return false;
								},array_merge($arMatch['PARAMS'],array(
									'CREATE' => $Create,
									'PROP_ID' => IntVal($arProperty['ID']),
									'IBLOCK_ID' => IntVal($arProperty['IBLOCK_ID']),
								)));
								break;
							case 'N':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									$Value = str_replace(',','.',$Value);
									$Value = CWDI::Surcharge($Value, $Params['surcharge']);
									return FloatVal($Value);
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'S:Date':
							case 'S:DateTime':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(is_numeric($Value) && $Value>0) {
										$Value = round(($Value - 25569) * 86400);
										if($Value>0) {
											$Difference = date('Z');
											if(is_numeric($Difference)){
												$Value -= $Difference;
											}
											return date(CDatabase::DateFormatToPHP($Params['DATE_TYPE']=='Date'?FORMAT_DATE:FORMAT_DATETIME),$Value);
										}
									} elseif(!empty($Value)) {
										if(empty($Params['date_format'])) {
											$Params['date_format'] = $Params['DATE_TYPE']=='Date' ? FORMAT_DATE : FORMAT_DATETIME;
										}
										$TimeStamp = MakeTimeStamp($Value,$Params['date_format']);
										if($TimeStamp>0) {
											return date(CDatabase::DateFormatToPHP($Params['DATE_TYPE']=='Date'?FORMAT_DATE:FORMAT_DATETIME),$TimeStamp);
										}
									}
									return false;
								},array_merge($arMatch['PARAMS'],array(
									'DATE_TYPE' => $arProperty['USER_TYPE'],
								)));
								break;
							case 'S:map_yandex':
							case 'S:map_google':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if($Params['coordinates_swap']=='Y') {
										$arCoordinates = explode(',',$Value);
										if(count($arCoordinates)==2) {
											$Value = $arCoordinates[1].','.$arCoordinates[0];
										}
									}
									return $Value;
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'S:UserID':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(!empty($Value) && !empty($Params['user_value_type'])) {
										$Params['user_value_type'] = ToUpper($Params['user_value_type']);
										$arFilter = array();
										$arFilter[$Params['user_value_type']] = $Value;
										$resUser = CUser::GetList($By='ID',$Order='ASC',$arFilter);
										if($arUser = $resUser->GetNext(false,false)){
											return $arUser['ID'];
										}
									}
									return false; // Создавать пользователей не нужно
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'S:directory':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(!strlen($Value)) {
										return false;
									}
									$HlBlockID = CWDI::GetHighloadBlockIdByTableName($Params['PROPERTY']['USER_TYPE_SETTINGS']['TABLE_NAME']);
									if($HlBlockID>0 && !empty($Params['hlblock_value_type'])) {
										$Params['hlblock_value_type'] = ToUpper($Params['hlblock_value_type']);
										$HlBlockDataClass = CWDI::InitializeHighloadBlock($HlBlockID);
										if(!empty($HlBlockDataClass)) {
											$arFilter = array(
												$Params['hlblock_value_type'] => $Value,
											);
											$resItem = $HlBlockDataClass::GetList(array(
												'select' => array('UF_XML_ID'),
												'filter' => $arFilter,
												'order' => array('ID' => 'ASC'),
												'limit' => 1,
											));
											if ($arItem = $resItem->Fetch()) {
												return $arItem['UF_XML_ID'];
											} elseif($Params['CREATE'] && $Params['hlblock_value_type']!='ID') {
												$arFieldsAll = CWDI::GetHighloadBlockFields($HlBlockID);
												$arAddFields = array();
												$arAddFields['UF_XML_ID'] = $Params['hlblock_value_type']=='UF_XML_ID' ? $Value : CWDI::Translit($Value);
												if(isset($arFieldsAll['UF_NAME'])) {
													$arAddFields['UF_NAME'] = $Value;
												}
												$ElementID = false;
												if(!empty($arAddFields)) {
													$obResult = $HlBlockDataClass::Add($arAddFields);
													$ElementID = $obResult->GetID();
													if($ElementID) {
														return $arAddFields['UF_XML_ID'];
													}
												}
												if(!$ElementID) {
													return false;
												}
											}
										}
									}
									return $Value;
								},array_merge($arMatch['PARAMS'],array(
									'CREATE' => $Create,
									'PROPERTY' => $arProperty,
								)));
								break;
							case 'S:HTML':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									$Type = in_array($Params['html_type'],array('text','html')) ? $Params['html_type'] : '';
									if(empty($Type)) {
										$Type = 'text';
									}
									return array(
										'VALUE' => array(
											'TYPE' => $Type,
											'TEXT' => $Value,
										),
									);
								},array_merge($arMatch['PARAMS'],array(
								)));
								break;
							case 'S:FileMan':
								#
							case 'S:ElementXmlID':
								#
								break;
							case 'E':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if($Params['PROPERTY']['_USER_TYPE']=='EAutocomplete') {
										$Params['element_value_type'] = 'NAME';
									}
									if(!empty($Value) && $Params['PROPERTY']['LINK_IBLOCK_ID']>0 && !empty($Params['element_value_type'])) {
										$CompareKey = ToUpper($Params['element_value_type']);
										$arFilter = array(
											'IBLOCK_ID' => $Params['PROPERTY']['LINK_IBLOCK_ID'],
										);
										$arFilter[$CompareKey] = $Value;
										$resItem = CIBlockElement::GetList(array(),$arFilter,false,array('nTopCount'=>'1'),array('ID'));
										if($arItem = $resItem->GetNext(false,false)){
											return $arItem['ID'];
										} elseif($Params['CREATE'] && $CompareKey!='ID') {
											$arAddFields = array(
												'IBLOCK_ID' => $Params['PROPERTY']['LINK_IBLOCK_ID'],
												'NAME' => $Value,
												'CODE' => $CompareKey=='CODE' ? $Value : CWDI::Translit($Value),
												'SORT' => $CompareKey=='SORT' && is_numeric($Value) ? $Value : 500,
												'EXTERNAL_ID' => $Value,
											);
											if(!strlen($arAddFields['CODE'])){
												$arAddFields['CODE'] = '-';
											}
											$bUpdateSearch = $arData['PROFILE']['PARAMS']['SKIP_UPDATE_SEARCH']=='Y'?false:true;
											$ElementID = $GLOBALS['WDI_IBLOCK_ELEMENT']->Add($arAddFields,false,$bUpdateSearch,false); // ToDo: многие поля могут быть отмечены обязательными, в таком случае нужно их как-то заполнять
											if($ElementID) {
												return $ElementID;
											} else {
												$Message = GetMessage('WDI_ERROR_ADD_ELEMENT_ENUM',array('#MESSAGE#'=>$GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR)).print_r($arAddFields,1);
												CWDI::L('[0019] '.$Message);
												CWDI::W('[0019] '.$Message);
												CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
												#return false;
											}
										}
									}
									return false;
								},array_merge($arMatch['PARAMS'],array(
									'CREATE' => $Create,
									'PROPERTY' => $arProperty,
								)));
								break;
							case 'G':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if($Params['PROPERTY']['_USER_TYPE']=='SectionAuto') {
										$Params['section_value_type'] = 'NAME';
									}
									if(!empty($Value) && $Params['PROPERTY']['LINK_IBLOCK_ID']>0 && !empty($Params['section_value_type'])) {
										$CompareKey = ToUpper($Params['section_value_type']);
										$arFilter = array(
											'IBLOCK_ID' => $Params['PROPERTY']['LINK_IBLOCK_ID'],
										);
										$arFilter[$CompareKey] = $Value;
										$resSection = CIBlockSection::GetList(array(),$arFilter,false,array('ID'),array('nTopCount'=>'1'));
										if($arSection = $resSection->GetNext(false,false)){
											return $arSection['ID'];
										} elseif($Params['CREATE'] && $CompareKey!='ID') {
											$arAddFields = array(
												'IBLOCK_ID' => $Params['PROPERTY']['LINK_IBLOCK_ID'],
												'NAME' => $Value,
												'CODE' => $CompareKey=='CODE' ? $Value : CWDI::Translit($Value),
												'SORT' => $CompareKey=='SORT' && is_numeric($Value) ? $Value : 500,
												'EXTERNAL_ID' => $Value,
											);
											$bUpdateSearch = $arData['PROFILE']['PARAMS']['SKIP_UPDATE_SEARCH']=='Y'?false:true;
											$SectionID = $GLOBALS['WDI_IBLOCK_SECTION']->Add($arAddFields,true,$bUpdateSearch,false); // ToDo: многие поля могут быть отмечены обязательными, в таком случае нужно их как-то заполнять
											if($SectionID) {
												return $SectionID;
											} else {
												$Message = GetMessage('WDI_ERROR_ADD_SECTION_ENUM',array('#MESSAGE#'=>$GLOBALS['WDI_IBLOCK_SECTION']->LAST_ERROR)).print_r($arAddFields,1);
												CWDI::L('[0020] '.$Message);
												CWDI::W('[0020] '.$Message);
												CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
												#return false;
											}
										}
									}
									return false;
								},array_merge($arMatch['PARAMS'],array(
									'CREATE' => $Create,
									'PROPERTY' => $arProperty,
								)));
								break;
							case 'F':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									return CWDI::MakeFileArray($Value, $Params['IMAGES_PATH'], $arParams['SEARCH_IMAGES_RECURSIVE']);
								},array_merge($arMatch['PARAMS'],array(
									'IMAGES_PATH' => $arParams['IMAGES_PATH'],
								)));
								break;
						}
						break;
					case 'CATALOG':
						switch($Target){
							case 'CATALOG_QUANTITY':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									return CWDI::Surcharge($Value, $Params['surcharge']);
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'CATALOG_QUANTITY_TRACE':
							case 'CATALOG_CAN_BUY_ZERO':
							case 'CATALOG_SUBSCRIBE':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									return CWDI::GetFlagChecked($Value,$Params['checkbox_values_y'],$Params['checkbox_values_n'],$Params['checkbox_values_d'],true);
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'CATALOG_VAT_INCLUDED':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									return CWDI::GetFlagChecked($Value,$Params['checkbox_values_y'],$Params['checkbox_values_n'],false,true);
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'CATALOG_VAT_ID':
								$ValueNew = false;
								if(preg_match('#^(\d{1,2})%$#',$Value,$M) || preg_match('#^(\d{1,2})$#',$Value,$M)) {
									$ValueNew = $M[1];
								} elseif (preg_match('#^0\.(\d{1,2})$#',$Value,$M)){
									$ValueNew = $M[1];
								}
								if($ValueNew>0 && $ValueNew<100) {
									$ValueNew = CWDI::GetVatByValue($ValueNew,true);
								}
								if($ValueNew>0) {
									$Value = $ValueNew;
								} else {
									$Value = '';
								}
								break;
							case 'CATALOG_WEIGHT':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(is_numeric($Value)){
										$Value = $Value * (is_numeric($Params['weight_unit']) && $Params['weight_unit']>0 ? $Params['weight_unit'] : 1);
										$Value = CWDI::Surcharge($Value, $Params['surcharge']);
									}
									return $Value;
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'CATALOG_LENGTH':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(is_numeric($Value)){
										$Value = $Value * (is_numeric($Params['length_unit']) && $Params['length_unit']>0 ? $Params['length_unit'] : 1);
										$Value = CWDI::Surcharge($Value, $Params['surcharge']);
									}
									return $Value;
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'CATALOG_WIDTH':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(is_numeric($Value)){
										$Value = $Value * (is_numeric($Params['width_unit']) && $Params['width_unit']>0 ? $Params['width_unit'] : 1);
										$Value = CWDI::Surcharge($Value, $Params['surcharge']);
									}
									return $Value;
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'CATALOG_HEIGHT':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(is_numeric($Value)){
										$Value = $Value * (is_numeric($Params['height_unit']) && $Params['height_unit']>0 ? $Params['height_unit'] : 1);
										$Value = CWDI::Surcharge($Value, $Params['surcharge']);
									}
									return $Value;
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'CATALOG_MEASURE':
								$MeasureID = false;
								if (is_array($arData['PROFILE']['PARAMS']['MEASURE_DESIGNATIONS'])) {
									foreach($arData['PROFILE']['PARAMS']['MEASURE_DESIGNATIONS'] as $Key => $Measure) {
										if (trim(ToLower($Measure)) == trim(ToLower($Value))) {
											$MeasureID = $Key;
											break;
										}
									}
								}
								if ($MeasureID>0) {
									$Value = $MeasureID;
								}
								break;
							case 'MEASURE_RATIO':
								$Value = FloatVal(str_replace(',','.',$Value));
								if($Value<0) {
									$Value = 1;
								}
								break;
						}
						if(preg_match('#^CATALOG_PRICE_(\d+)$#i',$Target,$M)){
							$Value = CWDI::ExecAction($Value,function($Value,$Params){
								if(preg_match('#^(.*?)([\d.,]+)(.*?)$#i',$Value,$M)){
									$Value = $M[2];
									$Value = FloatVal(str_replace(',','.',$Value));
									$Value = CWDI::Surcharge($Value, $Params['surcharge']);
									$Value = $M[1].$Value.$M[3];
								}
								return $Value;
							},array_merge($arMatch['PARAMS'],array()));
							break;
						}
						break;
				}
				break;
			case 'SECTION':
				switch($MatchGroup){
					case 'FIELDS':
						switch($Target){
							case 'CODE':
								if ($arMatch['PARAMS']['convert_to_number']=='Y') {
									if($arMatch['PARAMS']['convert_to_number_type']=='float') {
										$Value = FloatVal($Value);
									} else {
										$Value = IntVal($Value);
									}
								}
								$Value = (string)$Value;
								break;
							case 'SORT':
								$Value = IntVal($Value);
								if($Value<=0) {
									$Value = 500;
								}
								break;
							case 'ACTIVE':
								$Value = CWDI::GetFlagChecked($Value,$arMatch['PARAMS']['checkbox_values_y'],$arMatch['PARAMS']['checkbox_values_n'],false,true);
								break;
							case 'DESCRIPTION':
								$Type = in_array($arMatch['PARAMS']['html_type'],array('text','html')) ? $arMatch['PARAMS']['html_type'] : '';
								if(empty($Type)) {
									$Type = 'text';
								}
								$Value = array(
									'TYPE' => $Type,
									'TEXT' => $Value,
								);
								break;
							case 'PICTURE':
							case 'DETAIL_PICTURE':
								$Value = CWDI::MakeFileArray($Value, $arParams['IMAGES_PATH'], $arParams['SEARCH_IMAGES_RECURSIVE']);
								break;
						}
						break;
						break;
					case 'PROPS':
						$arProperty = $arMatchesAll[$arParams['OBJECT_TYPE']][$MatchGroup][$Target]['DATA'];
						switch($arProperty['USER_TYPE_ID']){
							case 'string':
							case 'string_formatted':
								if ($arMatch['PARAMS']['convert_to_number']=='Y') {
									if($arMatch['PARAMS']['convert_to_number_type']=='float') {
										$Value = CWDI::ExecAction($Value,function($Value,$Params){
											return FloatVal($Value);
										});
									} else {
										$Value = CWDI::ExecAction($Value,function($Value,$Params){
											return IntVal($Value);
										});
									}
								}
								break;
							case 'integer':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									return IntVal($Value);
								});
								break;
							case 'double':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									return FloatVal($Value);
								});
								break;
							case 'date':
							case 'datetime':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(is_numeric($Value) && $Value>0) {
										$Value = round(($Value - 25569) * 86400);
										if($Value>0) {
											$Difference = date('Z');
											if(is_numeric($Difference)){
												$Value -= $Difference;
											}
											return date(CDatabase::DateFormatToPHP($Params['DATE_TYPE']=='date'?FORMAT_DATE:FORMAT_DATETIME),$Value);
										}
									} elseif(!empty($Value)) {
										if(empty($Params['date_format'])) {
											$Params['date_format'] = $Params['DATE_TYPE']=='date' ? FORMAT_DATE : FORMAT_DATETIME;
										}
										$TimeStamp = MakeTimeStamp($Value,$Params['date_format']);
										if($TimeStamp>0) {
											return date(CDatabase::DateFormatToPHP($Params['DATE_TYPE']=='date'?FORMAT_DATE:FORMAT_DATETIME),$TimeStamp);
										}
									}
									return false;
								},array_merge($arMatch['PARAMS'],array(
									'DATE_TYPE' => $arProperty['USER_TYPE_ID'],
								)));
								break;
							case 'boolean':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									return CWDI::GetFlagChecked($Value,$Params['checkbox_values_y'],$Params['checkbox_values_n']);
								},array_merge($arMatch['PARAMS'],array()));
								break;
							case 'file':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									return CWDI::MakeFileArray($Value, $Params['IMAGES_PATH'], $arParams['SEARCH_IMAGES_RECURSIVE']);
								},array_merge($arMatch['PARAMS'],array(
									'IMAGES_PATH' => $arParams['IMAGES_PATH'],
								)));
								break;
							case 'iblock_section':
								$IBlockID = IntVal($arProperty['SETTINGS']['IBLOCK_ID']);
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(!empty($Value) && $Params['IBLOCK_ID']>0 && !empty($Params['section_value_type'])) {
										$CompareKey = ToUpper($Params['section_value_type']);
										$arFilter = array(
											'IBLOCK_ID' => $IBlockID,
										);
										$arFilter[$CompareKey] = $Value;
										$resSection = CIBlockSection::GetList(array(),$arFilter,false,array('ID'),array('nTopCount'=>'1'));
										if($arSection = $resSection->GetNext(false,false)){
											return $arSection['ID'];
										} elseif($Params['CREATE']) {
											$arAddFields = array(
												'IBLOCK_ID' => $Params['IBLOCK_ID'],
												'NAME' => $Value,
												'CODE' => $CompareKey=='CODE' ? $Value : CWDI::Translit($Value),
												'SORT' => $CompareKey=='SORT' && is_numeric($Value) ? $Value : 500,
												'EXTERNAL_ID' => $Value,
											);
											$bUpdateSearch = $arData['PROFILE']['PARAMS']['SKIP_UPDATE_SEARCH']=='Y'?false:true;
											$SectionID = $GLOBALS['WDI_IBLOCK_SECTION']->Add($arAddFields,true,$bUpdateSearch,false); // ToDo: многие поля могут быть отмечены обязательными, в таком случае нужно их как-то заполнять
											if($SectionID) {
												return $SectionID;
											} else {
												$Message = GetMessage('WDI_ERROR_ADD_SECTION_ENUM',array('#MESSAGE#'=>$GLOBALS['WDI_IBLOCK_SECTION']->LAST_ERROR)).print_r($arAddFields,1);
												CWDI::L('[0021] '.$Message);
												CWDI::W('[0021] '.$Message);
												CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
												#return false;
											}
										}
									}
									return false;
								},array_merge($arMatch['PARAMS'],array(
									'CREATE' => $Create,
									'PROP_ID' => $arProperty['ID'],
									'IBLOCK_ID' => $IBlockID,
								)));
								break;
							case 'iblock_element':
								$IBlockID = IntVal($arProperty['SETTINGS']['IBLOCK_ID']);
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(!empty($Value) && $Params['IBLOCK_ID']>0 && !empty($Params['element_value_type'])) {
										$CompareKey = ToUpper($Params['element_value_type']);
										$arFilter = array(
											'IBLOCK_ID' => $IBlockID,
										);
										$arFilter[$CompareKey] = $Value;
										$resItem = CIBlockElement::GetList(array(),$arFilter,false,array('nTopCount'=>'1'),array('ID'));
										if($arItem = $resItem->GetNext(false,false)){
											return $arItem['ID'];
										} elseif($Params['CREATE']) {
											$arAddFields = array(
												'IBLOCK_ID' => $Params['IBLOCK_ID'],
												'NAME' => $Value,
												'CODE' => $CompareKey=='CODE' ? $Value : CWDI::Translit($Value),
												'SORT' => $CompareKey=='SORT' && is_numeric($Value) ? $Value : 500,
												'EXTERNAL_ID' => $Value,
											);
											$bUpdateSearch = $arData['PROFILE']['PARAMS']['SKIP_UPDATE_SEARCH']=='Y'?false:true;
											$ElementID = $GLOBALS['WDI_IBLOCK_ELEMENT']->Add($arAddFields,false,$bUpdateSearch,false); // ToDo: многие поля могут быть отмечены обязательными, в таком случае нужно их как-то заполнять
											if($ElementID) {
												return $ElementID;
											} else {
												$Message = GetMessage('WDI_ERROR_ADD_ELEMENT_ENUM',array('#MESSAGE#'=>$GLOBALS['WDI_IBLOCK_ELEMENT']->LAST_ERROR)).print_r($arAddFields,1);
												CWDI::L('[0022] '.$Message);
												CWDI::W('[0022] '.$Message);
												CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
												#return false;
											}
										}
									}
									return false;
								},array_merge($arMatch['PARAMS'],array(
									'CREATE' => $Create,
									'PROP_ID' => $arProperty['ID'],
									'IBLOCK_ID' => $IBlockID,
								)));
								break;
							case 'hlblock':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									$HlBlockID = $Params['PROPERTY']['_HLBLOCK_ID'];
									if($HlBlockID>0 && !empty($Params['hlblock_value_type'])) {
										if($HlBlockDataClass = CWDI::InitializeHighloadBlock($HlBlockID)) {
											$CompareKey = ToUpper($Params['hlblock_value_type']);
											$arFilter = array(
												$CompareKey => $Value,
											);
											$resItem = $HlBlockDataClass::GetList(array(
												'select' => array('ID'),
												'filter' => $arFilter,
												'order' => array('ID' => 'ASC'),
												'limit' => 1,
											));
											if ($arItem = $resItem->Fetch()) {
												return $arItem['ID'];
											} elseif($Params['CREATE']) {
												$arFieldsAll = CWDI::GetHighloadBlockFields($HlBlockID);
												$arAddFields = array();
												if(isset($arFieldsAll['UF_XML_ID'])) {
													$arAddFields['UF_XML_ID'] = $CompareKey=='UF_XML_ID' ? $Value : CWDI::Translit($Value);
												}
												if(isset($arFieldsAll['UF_NAME'])) {
													$arAddFields['UF_NAME'] = $Value;
												}
												$ElementID = false;
												if(!empty($arAddFields)) {
													$obResult = $HlBlockDataClass::Add($arAddFields);
													$ElementID = $obResult->GetID();
													if($ElementID) {
														return $ElementID;
													}
												}
												if(!$ElementID) {
													return false;
												}
											}
										}
									}
									return $Value;
								},array_merge($arMatch['PARAMS'],array(
									'CREATE' => $Create,
									'PROPERTY' => $arProperty,
								)));
								break;
							case 'enumeration':
								$Value = CWDI::ExecAction($Value,function($Value,$Params){
									if(!empty($Value) && !empty($Params['enum_value_type'])) {
										$Value = trim($Value);
										$arFilter = array(
											'USER_FIELD_ID' => $Params['PROP_ID'],
										);
										$CompareKey = ToUpper($Params['enum_value_type']);
										if($CompareKey=='EXTERNAL_ID') {
											$CompareKey = 'XML_ID';
										}
										$resEnum = $GLOBALS['WDI_USER_FIELD_ENUM']->GetList(array(),$arFilter);
										$arEnumsAll = array();
										$bEnumID = false;
										while($arEnum = $resEnum->GetNext(false,false)) {
											$arEnumsAll[$arEnum['ID']] = array(
												'XML_ID' => $arEnum['XML_ID'],
												'VALUE' => $arEnum['VALUE'],
												'SORT' => $arEnum['SORT'],
												'DEF' => $arEnum['DEF'],
											);
											if(ToUpper($arEnum[$CompareKey])==ToUpper($Value)) {
												$bEnumID = $arEnum['ID'];
											}
										}
										if($bEnumID) {
											return $bEnumID;
										} elseif($Params['CREATE']) {
											$arEnumsAll['n0'] = array(
												'XML_ID' => $Value,
												'VALUE' => $Value,
												'SORT' => $CompareKey=='SORT' && is_numeric($Value) ? $Value : 500,
											);
											$GLOBALS['WDI_USER_FIELD_ENUM']->SetEnumValues($Params['PROP_ID'], $arEnumsAll);
											$arFilter[$CompareKey] = $Value;
											$resEnum = $GLOBALS['WDI_USER_FIELD_ENUM']->GetList(array(),$arFilter);
											if($arEnum = $resEnum->GetNext(false,false)){
												$Value = $arEnum['ID'];
											}
										}
									}
									return $Value;
								},array_merge($arMatch['PARAMS'],array(
									'CREATE' => $Create,
									'PROP_ID' => $arProperty['ID'],
								)));
								break;
						}
						if($arProperty['MULTIPLE']=='Y' && !is_array($Value)) {
							$Value = array($Value);
						}
						break;
				}
				break;
			default:
				$Message = GetMessage('WDI_ERROR_INCORRECT_OBJECT',array('#OBJECT_TYPE#'=>$arParams['OBJECT_TYPE'],'#TARGET#'=>$Target,'#VALUE_RAW#'=>$ValueRaw));
				CWDI::L('[0023] '.$Message,true,true);
				CWDI::W('[0023] '.$Message);
				CWDI::E($arData['PROFILE']['IGNORE_ERRORS']);
				$Value = false;
				break;
		}
		return $Value;
	}
	
	/**
	 *	Загрузка полного массива свойств/параметров/каталога в специальную таблицу БД (b_wdi_data)
	 */
	public static function ReadObject($arObject, $Type, $ParentID, $IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $ExternalID, $arDebugData=false){
		$arMoreParentID = array();
		if(is_array($ParentID) && !empty($ParentID)){
			$arMoreParentID = array_slice($ParentID,1);
			$ParentID = IntVal(reset($ParentID));
		} elseif(!is_numeric($ParentID) || $ParentID<0) {
			$ParentID = 0;
		}
		//
		if(!strlen($ExternalID) && strlen($arObject['_EXTERNAL_ID'])){
			$ExternalID = $arObject['_EXTERNAL_ID'];
		}
		unset($arObject['_EXTERNAL_ID']);
		$arFields = array(
			'TYPE' => self::GetRowTypeShort($Type),
			'EXTERNAL_ID' => $ExternalID,
			'PARENT_ID' => $ParentID,
			'MORE_PARENT_ID' => implode(',',$arMoreParentID),
			'IBLOCK_ID' => IntVal($IBlockID),
			'SECTION_ID' => IntVal($SectionID),
			'FIELDS' => $arObject,
			'FILTER' => empty($arFilter) ? false : $arFilter,
			'SESSION_ID' => $SessionID,
			'PROFILE_ID' => IntVal($ProfileID),
			'DEBUG_DATA' => print_r($arDebugData,1),
		);
		foreach(GetModuleEvents(WDI_MODULE, 'OnReadObject', true) as $arEvent) {
			if (ExecuteModuleEventEx($arEvent, array(&$arFields))===false) {
				return false;
			}
		}
		$arFields['FIELDS'] = serialize($arFields['FIELDS']);
		$arFields['FILTER'] = $arFields['FILTER']===false ? '' : serialize($arFields['FILTER']);
		$obData = new CWDI_Data();
		$ID = $obData->Add($arFields);
		unset($obData);
		if($ID>0){
			return $ID;
		}
		return false;
	}

	/**
	 *	Получение односимвольного обозначения типа объекта
	 */
	public static function GetRowTypeShort($RowType){
		if($RowType=='ELEMENT') {
			return 'E';
		} elseif($RowType=='OFFER') {
			return 'O';
		} elseif($RowType=='SECTION') {
			return 'S';
		}
		return false;
	}

	/**
	 *	Генерация символьного кода для элемента
	 */
	private function GenerateProductCode($Name, $IBlockID) {
		$Code = '';
		$arIBlockParameters = CWDI::GetIBlockParameters($IBlockID);
		$arParams = $arIBlockParameters['CODE']['DEFAULT_VALUE'];
		$CodeIndex = 0;
		$Suffix = '';
		do {
			if ($arParams['UNIQUE']=='Y'){
				if ($CodeIndex>0) {
					$Suffix = $arParams['TRANS_SPACE'].$CodeIndex;
				}
				if ($CodeIndex<2) {
					$CodeIndex = 2;
				} else {
					$CodeIndex++;
				}
			}
			$Code = CUtil::Translit($Name, LANGUAGE_ID, array(
				'max_len' => IntVal($arParams['TRANS_LEN']) - strlen($Suffix),
				'change_case' => $arParams['TRANS_CASE'],
				'replace_space' => $arParams['TRANS_SPACE'],
				'replace_other' => $arParams['TRANS_OTHER'],
				'delete_repeat_replace' => $arParams['TRANS_EAT']=='Y'?'true':'false',
				'use_google' => $arParams['USE_GOOGLE']=='Y'?'true':'false',
			)).$Suffix;
		} while ($arParams['UNIQUE']=='Y' && self::CodeExists($Code,$IBlockID,'E'));
		return $Code;
	}
	
	/**
	 *	Генерация символьного кода для раздела
	 */
	private function GenerateSectionCode($Name, $IBlockID) {
		$Code = '';
		$arIBlockParameters = CWDI::GetIBlockParameters($IBlockID);
		$arParams = $arIBlockParameters['CODE']['DEFAULT_VALUE'];
		$CodeIndex = 0;
		$Suffix = '';
		do {
			if ($arParams['UNIQUE']=='Y'){
				if ($CodeIndex>0) {
					$Suffix = $arParams['TRANS_SPACE'].$CodeIndex;
				}
				if ($CodeIndex<2) {
					$CodeIndex = 2;
				} else {
					$CodeIndex++;
				}
			}
			$Code = CUtil::Translit($Name, LANGUAGE_ID, array(
				'max_len' => IntVal($arParams['TRANS_LEN']) - strlen($Suffix),
				'change_case' => $arParams['TRANS_CASE'],
				'replace_space' => $arParams['TRANS_SPACE'],
				'replace_other' => $arParams['TRANS_OTHER'],
				'delete_repeat_replace' => $arParams['TRANS_EAT']=='Y'?'true':'false',
				'use_google' => $arParams['USE_GOOGLE']=='Y'?'true':'false',
			)).$Suffix;
		} while ($arParams['UNIQUE']=='Y' && self::CodeExists($Code,$IBlockID,'S'));
		return $Code;
	}

	/**
	 *	Проверка существования товара/раздела/торг.предложения со сгенерированным символьным кодом
	 */
	private function CodeExists($Code, $IBlockID, $Type='E') {
		if ($Type=='S') {
			$resSection = CIBlockSection::GetList(array('ID'=>'ASC'),array('IBLOCK_ID'=>$IBlockID,'CODE'=>$Code,'CHECK_PERMISSIONS'=>'N'),false,array('ID'));
			if ($arSection = $resSection->GetNext(false,false)) {
				return true;
			}
		} else {
			return CIBlockElement::GetList(array(),array('IBLOCK_ID'=>$IBlockID,'CODE'=>$Code),array())>0;
		}
		return false;
	}

	/**
	 *	Удаление файлов профиля
	 */
	public function RemoveProfileFiles($arProfile) {
		if(!empty($arProfile['HANDLER'])) {
			$arHandlers = self::GetList();
			if(is_array($arHandlers[$arProfile['HANDLER']]) && !empty($arProfile['HANDLER'])) {
				$TmpDir = self::GetTmpRealDir($arHandlers[$arProfile['HANDLER']], $arProfile);
				$DefUpload = '/'.COption::GetOptionString('main', 'upload_dir', 'upload').'/';
				if(stripos($TmpDir,$DefUpload)===0) {
					DeleteDirFilesEx($TmpDir);
				}
			}
		}
	}
	
	/**
	 *	Установка текущего статуса для профиля
	 */
	public static function ProfileSetStatus($ProfileID, $StatusCode, $Index=false, $Count=false, $Force=false) {
		if($ProfileID>0 && CWDI::STATUS_INTERVAL>0) {
			$Key = 'WDI_PROFILE_'.$ProfileID.'_LAST_STATUS_TIME';
			$StatusText = GetMessage('WDI_STATUS_'.$StatusCode);
			if($Force || !isset($GLOBALS[$Key]) || CWDI::GetMicroTime()-$GLOBALS[$Key]>=CWDI::STATUS_INTERVAL) {
				global $DB;
				CWDI_Profile::SetFieldValue($ProfileID,'STATUS_CODE',$StatusCode);
				CWDI_Profile::SetFieldValue($ProfileID,'STATUS',$StatusText.'|'.$Index.'|'.$Count);
				$GLOBALS[$Key] = CWDI::GetMicroTime();
			}
		}
	}
	
	/**
	 *	Массив для отложенной загрузки изображений
	 */
	public function DelayDownload($Src, $ProfileID, $Callback, $CallbackArgs=array()){
		return array(
			'DELAY' => 'Y',
			'SRC' => $Src,
			'PROFILE' => $ProfileID,
			'CALLBACK' => $Callback,
			'CALLBACK_ARGS' => $CallbackArgs,
		);
	}
	
	/**
	 *	Prevent MySQL error on downtime timeout by `wait_timeout`
	 */
	protected function PreventWaitTimeout(){
		$strKey = 'WDI_TIME_PREVENT_WAIT_TIMEOUT';
		$intTime = 10; // 10 seconds
		if(!isset($GLOBALS[$strKey])){
			$GLOBALS[$strKey] = microtime(true);
		}else{
			$fTime = microtime(true);
			if($fTime - $GLOBALS[$strKey] > $intTime){
				$GLOBALS[$strKey] = $fTime;
				$GLOBALS['DB']->Query("SELECT 1;");
			}
		}
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 *	Абстрактная функция получения всех инфоблоков, загружаемых по данному профилю 
	 */
	abstract function GetProfileIBlocks($arProfile);
	
	/**
	 *	Абстрактная функция построения соответствий
	 */
	abstract function MakeMatches($SheetIndex);
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	#protected function OnBeforeRequest($arParams){}
	#protected function OnAfterRequest($arParams, $strResult, $arResponseHeaders, $intHttpStatus){}
	#protected function OnDelayImageDownload($arImage) {}
	#protected function OnObjectProcessed($ObjectID, $arObject, $arData, $arFields, $intResult) {}
	
	
}
?>