<?
IncludeModuleLangFile(__FILE__);

class CWDI_Data {
	
	// Get list
	public static function GetList($arSort=false, $arFilter=false, $arSelect=false) {
		global $DB;
		if (!is_array($arSort)) {$arSort = array("SORT"=>"ASC", "NAME"=>"ASC");}
		foreach ($arSort as $Key => $Value) {
			$Value = ToUpper($Value);
			if ($Value!="ASC" && $Value!="DESC") {
				unset($arSort[$Key]);
			}
		}
		$arDates = array(
			$DB->DateToCharFunction("DATETIME")." as `DATETIME`",
		);
		if(!is_array($arSelect) || empty($arSelect)) {
			$arSelect = array(
				'*',
				implode(', ',$arDates),
			);
		} else {
			foreach($arSelect as $Key => $Value){
				$arSelect[$Key] = "`{$Value}`";
			}
		}
		$SQL = 'SELECT DISTINCT '.implode(', ',$arSelect).' FROM `b_wdi_data`';
		// Filter
		if (is_array($arFilter) && !empty($arFilter)) {
			$arWhere = array();
			foreach ($arFilter as $Key => $Value) {
				$Operation1 = substr($Key,0,1);
				$Operation2 = substr($Key,0,2);
				$Key = $DB->ForSQL(ltrim($Key,WDI_FILTER_SYMBOLS));
				if (in_array($Operation2,array('>=','<='))) {
					$arWhere[] = "`b_wdi_data`.`{$Key}` {$Operation2} '{$Value}'";
				} elseif (in_array($Operation1,array('>','<'))) {
					$arWhere[] = "`b_wdi_data`.`{$Key}` {$Operation1} '{$Value}'";
				} elseif ($Operation1=='!') {
					if(is_array($Value)) {
						$Value = implode("','",$Value);
						$arWhere[] = "`b_wdi_data`.`{$Key}` NOT IN ('{$Value}')";
					} else {
						$arWhere[] = "`b_wdi_data`.`{$Key}` <> '{$Value}'";
					}
				} elseif ($Operation1=='%') {
					$arWhere[] = "UPPER(`b_wdi_data`.`{$Key}`) LIKE UPPER('%{$Value}%') AND `b_wdi_data`.`{$Key}` IS NOT NULL";
				} else {
					if(is_array($Value)) {
						$Value = implode("','",$Value);
						$arWhere[] = "`b_wdi_data`.`{$Key}` IN ('{$Value}')";
					} else {
						$arWhere[] = "`b_wdi_data`.`{$Key}` = '{$Value}'";
					}
				}
			}
			if (count($arWhere)>0) {
				$SQL .= " WHERE ".implode(" AND ", $arWhere);
			}
		}
		// Sort
		if (is_array($arSort) && !empty($arSort)) {
			$SQL .= " ORDER BY ";
			$arSortBy = array();
			foreach ($arSort as $arSortKey => $arSortItem) {
				$arSortKey = $DB->ForSQL($arSortKey);
				$arSortItem = $DB->ForSQL($arSortItem);
				if (trim($arSortKey)!="") {
					$SortBy = "`{$arSortKey}`";
					if (trim($arSortItem)!="") {
						$SortBy .= " {$arSortItem}";
					}
					$arSortBy[] = $SortBy;
				}
			}
			$SQL .= implode(", ", $arSortBy);
		}
		return $DB->Query($SQL, false, __LINE__);
	}
	
	// Get by ID
	public static function GetByID($ID) {
		global $DB;
		if (trim($ID)=="") {
			return false;
		} elseif (IntVal($ID)==0) {
			return self::GetList(false, array("CODE"=>htmlspecialchars($ID)));
		} else {
			return self::GetList(false, array("ID"=>$ID));
		}
	}
	
	// Add data
	public static function Add($arFields) {
		global $DB;
		if (!is_array($arFields) || empty($arFields)) {
			return false;
		}
		$arFields['DATETIME'] = !empty($arFields['DATETIME']) ? CDatabase::FormatDate($arFields['DATETIME'],FORMAT_DATETIME,CWDI::MYSQL_DATE_FORMAT) : date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT));
		$SQL_Keys = array();
		$SQL_Vals = array();
		foreach ($arFields as $Key => $Field) {
			$Key = $DB->ForSQL($Key);
			$Field = $DB->ForSQL($Field);
			$SQL_Keys[] = "`{$Key}`";
			$SQL_Vals[] = "'{$Field}'";
		}
		$SQL_Keys = implode(",",$SQL_Keys);
		$SQL_Vals = implode(",",$SQL_Vals);
		$SQL = "INSERT INTO `b_wdi_data` ({$SQL_Keys}) VALUES ({$SQL_Vals});";
		$reqQuery = $DB->Query($SQL, false, __LINE__);
		if ($reqQuery === false) {
			return false;
		}
		$LastID = $DB->LastID();
		if (is_numeric($LastID)) {
			return $LastID;
		}
		return false;
	}
	
	// Update
	public static function Update($ID, $arFields) {
		global $DB;
		$ID = IntVal($ID);
		if ($ID==0) {
			return false;
		}
		if (!is_array($arFields) || empty($arFields)) {
			return false;
		}
		if (isset($arFields["NAME"]) && trim($arFields["NAME"])=="") {
			return false;
		}
		$arSqlSet = array();
		foreach ($arFields as $Field => $Value) {
			$Field = $DB->ForSQL($Field);
			$Value = $Value===false ? 'NULL' : '\''.$DB->ForSQL($Value).'\'';
			$arSqlSet[] = "`{$Field}`={$Value}";
		}
		$arSqlSet = implode(',',$arSqlSet);
		$SQL = "UPDATE `b_wdi_data` SET {$arSqlSet} WHERE `ID`='{$ID}' LIMIT 1;";
		$resUpdate = $DB->Query($SQL, true, __LINE__);
		return is_object($resUpdate) && $resUpdate->AffectedRowsCount()>0;
	}
	
	// Delete
	public static function Delete($ID) {
		global $DB;
		$ID = IntVal($ID);
		if ($ID>0) {
			$SQL = "DELETE FROM `b_wdi_data` WHERE `ID`='{$ID}' LIMIT 1;";
			return $DB->Query($SQL, true, __LINE__);
		}
		return false;
	}
	
	// Delete profile data
	public static function DeleteProfileData($ProfileID) {
		global $DB;
		$ProfileID = IntVal($ProfileID);
		if ($ProfileID>0) {
			$SQL = "DELETE FROM `b_wdi_data` WHERE `PROFILE_ID`='{$ProfileID}';";
			return $DB->Query($SQL, true, __LINE__);
		}
		return false;
	}
	
	// Truncate
	public static function Truncate() {
		global $DB;
		$SQL = "TRUNCATE `b_wdi_data`;";
		return $DB->Query($SQL, true, __LINE__);
	}
	
	// Get available fields
	public static function GetAvailableFields() {
		$arResult = array();
		$PHPCache = new CPHPCache;
		$CacheLifeTime = 10*60;
		$CacheID = 'CWDI_Data__GetAvailableFields';
		if($PHPCache->InitCache($CacheLifeTime, $CacheID, '/')) {
			$arVars = $PHPCache->GetVars();
			$SECTION_TITLE = $arVars['SECTION_TITLE'];
		} else {
			global $DB;
			$SQL = 'SHOW COLUMNS FROM `b_wdi_data`';
			$resFields = $DB->Query($SQL, true, __LINE__);
			while ($arField = $resFields->GetNext(false,false)) {
				$arResult[] = $arField['Field'];
			}
		}
		return $arResult;
	}
}

?>