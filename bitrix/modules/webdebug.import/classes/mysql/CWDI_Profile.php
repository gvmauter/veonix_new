<?
IncludeModuleLangFile(__FILE__);

class CWDI_Profile {
	public $LAST_ERROR;
	
	// Получение списка профилей
	public static function GetList($arSort=false, $arFilter=false) {
		global $DB;
		if (!is_array($arSort)) {$arSort = array('SORT'=>'ASC', 'NAME'=>'ASC');}
		foreach ($arSort as $Key => $Value) {
			$Value = ToUpper($Value);
			if ($Value!='ASC' && $Value!='DESC') {
				unset($arSort[$Key]);
			}
		}
		$arDates = array(
			$DB->DateToCharFunction('DATE_CREATED').' as `DATE_CREATED`',
			$DB->DateToCharFunction('DATE_MODIFIED').' as `DATE_MODIFIED`',
			$DB->DateToCharFunction('DATE_LAST_START').' as `DATE_LAST_START`',
			$DB->DateToCharFunction('DATE_LAST_SUCCESS').' as `DATE_LAST_SUCCESS`',
			$DB->DateToCharFunction('DATE_LAST_ACTION').' as `DATE_LAST_ACTION`',
			$DB->DateToCharFunction('DATE_FILE').' as `DATE_FILE`',
		);
		$SQL = 'SELECT *, '.implode(', ',$arDates).' FROM `b_wdi_profiles`';
		// Фильтр
		if (is_array($arFilter) && !empty($arFilter)) {
			foreach ($arFilter as $arFilterKey => $arFilterVal) {
				if (empty($arFilterVal)) {
					unset($arFilter[$arFilterKey]);
				}
			}
			$arWhere = array();
			foreach ($arFilter as $Key => $Value) {
				$SubStr2 = substr($Key, 0, 2);
				$SubStr1 = substr($Key, 0, 1);
				$Key = $DB->ForSQL($Key);
				$KeyRaw = CWDI::GetFilterKey($Key);
				$Value = $DB->ForSQL($Value);
				if (in_array($KeyRaw,array('DATE_CREATED','DATE_MODIFIED','DATE_LAST_START','DATE_LAST_START','DATE_LAST_SUCCESS','DATE_LAST_SUCCESS','DATE_LAST_ACTION','DATE_FILE'))) {
					$Value = CDatabase::FormatDate($Value, FORMAT_DATETIME, CWDI::MYSQL_DATE_FORMAT);
				}
				if ($SubStr2=='>=' || $SubStr2=='<=') {
					$Key1 = substr($Key, 2);
					if ($SubStr2 == '>=') {$arWhere[] = "`b_wdi_profiles`.`{$Key1}` >= '{$Value}'";}
					if ($SubStr2 == '<=') {$arWhere[] = "`b_wdi_profiles`.`{$Key1}` <= '{$Value}'";}
				} elseif ($SubStr1=='>' || $SubStr1=='<') {
					$Key1 = substr($Key, 1);
					if ($SubStr1 == '>') {$arWhere[] = "`b_wdi_profiles`.`{$Key1}` > '{$Value}'";}
					if ($SubStr1 == '<') {$arWhere[] = "`b_wdi_profiles`.`{$Key1}` < '{$Value}'";}
					if ($SubStr1 == '!') {$arWhere[] = "`b_wdi_profiles`.`{$Key1}` <> '{$Value}'";}
				} elseif ($SubStr1=='!') {
					$Key1 = substr($Key, 1);
					$arWhere[] = "`b_wdi_profiles`.`{$Key1}` <> '{$Value}'";
				} elseif ($SubStr1=='%') {
					$Key1 = substr($Key, 1);
					$arWhere[] = "upper(`b_wdi_profiles`.`{$Key1}`) like upper ('%{$Value}%') and `b_wdi_profiles`.`{$Key1}` IS NOT NULL";
				} else {
					$arWhere[] = "`b_wdi_profiles`.`{$Key}` = '{$Value}'";
				}
			}
			if (count($arWhere)>0) {
				$SQL .= ' WHERE '.implode(' AND ', $arWhere);
			}
		}
		// Сортировка
		if (is_array($arSort) && !empty($arSort)) {
			$SQL .= ' ORDER BY ';
			$arSortBy = array();
			foreach ($arSort as $arSortKey => $arSortItem) {
				$arSortKey = $DB->ForSQL($arSortKey);
				$arSortItem = $DB->ForSQL($arSortItem);
				if (!empty($arSortKey)) {
					$SortBy = "`{$arSortKey}`";
					if (!empty($arSortItem)) {
						$SortBy .= " {$arSortItem}";
					}
					$arSortBy[] = $SortBy;
				}
			}
			$SQL .= implode(', ', $arSortBy);
		}
		return $DB->Query($SQL, false, __LINE__);
	}
	
	// Получение профиля по ID
	public static function GetByID($ID) {
		global $DB;
		$ID = IntVal($ID);
		if($ID>0) {
			return self::GetList(false, array('ID'=>$ID));
		}
		return false;
	}
	
	// Добавление профиля
	public static function Add($arFields) {
		global $DB;
		if (!is_array($arFields) || empty($arFields)) {
			return false;
		}
		if (empty($arFields['NAME'])) {
			return false;
		}
		if (trim($arFields['DATE_CREATED'])!='') $arFields['DATE_CREATED'] = CDatabase::FormatDate($arFields['DATE_CREATED'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_MODIFIED'])!='') $arFields['DATE_MODIFIED'] = CDatabase::FormatDate($arFields['DATE_MODIFIED'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_LAST_START'])!='') $arFields['DATE_LAST_START'] = CDatabase::FormatDate($arFields['DATE_LAST_START'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_LAST_SUCCESS'])!='') $arFields['DATE_LAST_SUCCESS'] = CDatabase::FormatDate($arFields['DATE_LAST_SUCCESS'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_LAST_ACTION'])!='') $arFields['DATE_LAST_ACTION'] = CDatabase::FormatDate($arFields['DATE_LAST_ACTION'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_FILE'])!='') $arFields['DATE_FILE'] = CDatabase::FormatDate($arFields['DATE_FILE'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		$SQL_Keys = array();
		$SQL_Vals = array();
		foreach ($arFields as $Key => $Field) {
			$Key = $DB->ForSQL($Key);
			$Field = $DB->ForSQL($Field);
			$SQL_Keys[] = "`{$Key}`";
			$SQL_Vals[] = "'{$Field}'";
		}
		$SQL_Keys = implode(',',$SQL_Keys);
		$SQL_Vals = implode(',',$SQL_Vals);
		$SQL = "INSERT INTO `b_wdi_profiles` ({$SQL_Keys}) VALUES ({$SQL_Vals});";
		$resQuery = $DB->Query($SQL, false, __LINE__);
		if ($resQuery === false) {
			return false;
		}
		$LastID = $DB->LastID();
		if (is_numeric($LastID)) {
			return $LastID;
		} else {
			return false;
		}
	}
	
	// Изменение профиля
	public static function Update($ID, $arFields) {
		global $DB;
		$ID = IntVal($ID);
		if ($ID==0) {
			return false;
		}
		if (!is_array($arFields) || empty($arFields)) {
			return false;
		}
		if (isset($arFields['NAME']) && empty($arFields['NAME'])) {
			return false;
		}
		if (trim($arFields['DATE_CREATED'])!='') $arFields['DATE_CREATED'] = CDatabase::FormatDate($arFields['DATE_CREATED'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_MODIFIED'])!='') $arFields['DATE_MODIFIED'] = CDatabase::FormatDate($arFields['DATE_MODIFIED'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_LAST_START'])!='') $arFields['DATE_LAST_START'] = CDatabase::FormatDate($arFields['DATE_LAST_START'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_LAST_SUCCESS'])!='') $arFields['DATE_LAST_SUCCESS'] = CDatabase::FormatDate($arFields['DATE_LAST_SUCCESS'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_LAST_ACTION'])!='') $arFields['DATE_LAST_ACTION'] = CDatabase::FormatDate($arFields['DATE_LAST_ACTION'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		if (trim($arFields['DATE_FILE'])!='') $arFields['DATE_FILE'] = CDatabase::FormatDate($arFields['DATE_FILE'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT);
		$arSqlSet = array();
		foreach ($arFields as $Field => $Value) {
			$Field = $DB->ForSQL($Field);
			$Value = $Value===false ? 'NULL' : '\''.$DB->ForSQL($Value).'\'';
			$arSqlSet[] = "`{$Field}`={$Value}";
		}
		$arSqlSet = implode(',',$arSqlSet);
		$SQL = "UPDATE `b_wdi_profiles` SET {$arSqlSet} WHERE `ID`='{$ID}' LIMIT 1;";
		$resQuery = $DB->Query($SQL, true, __LINE__);
		if ($resQuery === false) {
			return false;
		}
		return $resQuery->AffectedRowsCount();
	}
	
	// Изменение значения поля для профиля
	public static function SetFieldValue($ID, $Data, $Data2=false){
		global $DB;
		$ID = IntVal($ID);
		if(!empty($Data) && is_string($Data) && (is_string($Data2) && !empty($Data2) || $Data2===false)) {
			$Data = array(
				$Data => $Data2,
			);
		}
		if($ID>0 && is_array($Data)){
			$arSqlSet = array();
			$arAvailableFields = self::GetAvailableFields();
			foreach($Data as $Field => $Value){
				$Field = $DB->ForSQL(ToUpper($Field));
				if(in_array($Field,$arAvailableFields)) {
					$Value = $Value===false ? 'NULL' : '\''.$DB->ForSQL($Value).'\'';
					$arSqlSet[] = "`{$Field}`={$Value}";
				}
			}
			if(!empty($arSqlSet)) {
				$arSqlSet = implode(',',$arSqlSet);
				$SQL = "UPDATE `b_wdi_profiles` SET {$arSqlSet} WHERE `ID`='{$ID}' LIMIT 1;";
				$reqQuery = $DB->Query($SQL, true, __LINE__);
				if ($reqQuery !== false) {
					return true;
				}
			}
		}
		return false;
	}
	
	// Удаление профиля
	public static function Delete($ID) {
		global $DB;
		$ID = IntVal($ID);
		if ($ID==0) {
			return false;
		}
		$resProfile = self::GetByID($ID);
		if ($arProfile = $resProfile->GetNext(false,false)) {
			$SQL = "DELETE FROM `b_wdi_profiles` WHERE `ID`='{$ID}' LIMIT 1;";
			$resDelete = $DB->Query($SQL, true, __LINE__);
			if($resDelete->result) {
				CWDI_Handler::RemoveProfileFiles($arProfile);
				foreach(GetModuleEvents(WDI_MODULE, 'OnAfterProfileDelete', true) as $arEvent) {
					ExecuteModuleEventEx($arEvent, array($ID, $arProfile));
				}
				return true;
			}
		}
		return false;
	}
	
	// Получение списка доступных полей для таблицы из БД
	public static function GetAvailableFields() {
		$PHPCache = new CPHPCache;
		$CacheLifeTime = 10*60;
		$CacheID = 'CWDI_Profile__GetAvailableFields';
		$CacheDir = '/wdi';
		if($PHPCache->InitCache($CacheLifeTime, $CacheID, $CacheDir)) {
			$arResult = $PHPCache->GetVars();
		} else {
			global $DB;
			$SQL = 'SHOW COLUMNS FROM `b_wdi_profiles`;';
			$resFields = $DB->Query($SQL, true, __LINE__);
			while ($arField = $resFields->GetNext(false,false)) {
				$arResult[] = $arField['Field'];
			}
			if($PHPCache->StartDataCache()) {
				$GLOBALS['CACHE_MANAGER']->StartTagCache($CacheDir);
				$GLOBALS['CACHE_MANAGER']->RegisterTag('wdi');
				$GLOBALS['CACHE_MANAGER']->EndTagCache();
				$PHPCache->EndDataCache($arResult); 
			}
		}
		return $arResult;
	}
}

?>