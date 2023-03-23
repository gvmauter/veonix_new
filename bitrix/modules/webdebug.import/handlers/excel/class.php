<?CWDI_Handler::IncludeLangFile(__FILE__);

class CWDI_Excel extends CWDI_Excel_All {
	
	const MODE_FORMAT = 'format';
	const MODE_COLUMNS = 'columns';
	const MODE_SIMPLE = 'simple'; // без разделов
	
	private $arLevels = array();
	
	/**
	 *	Получение даты файла (дата файла используется только как справочная информация)
	 */
	public function GetFileDate(){ // переопределение абстрактного класса
		if(is_array($this->arFile)){
			if(!empty($this->arFile['FILE_ORIGINAL']) && is_file($_SERVER['DOCUMENT_ROOT'].$this->arFile['FILE_ORIGINAL'])) {
				$this->arFile['FILE_MTIME'] = filemtime($_SERVER['DOCUMENT_ROOT'].$this->arFile['FILE_ORIGINAL']);
				$this->arFile['FILE_CTIME'] = filectime($_SERVER['DOCUMENT_ROOT'].$this->arFile['FILE_ORIGINAL']);
			}
			$FileDate = $this->arFile['FILE_MTIME'];
		}
		$FileDate = is_numeric($FileDate) && $FileDate>0 ? date(CDatabase::DateFormatToPHP(CWDI::MYSQL_DATE_FORMAT),$FileDate) : false;
		return $FileDate;
	}
	
	/**
	 *	Чтение строки файла
	 */
	public function ReadRow($RowIndex, &$arError, $SessionID){
		$arParams = $this->arFields['PARAMS'];
		$arMatches = $this->arFields['MATCHES']['S'][$this->intSheetIndex];
		$arSheetParams = $arParams['S'][$this->intSheetIndex];
		$IBlockID = $arParams['S'][$this->intSheetIndex]['IBLOCK_ID'];
		$SectionID = $arParams['S'][$this->intSheetIndex]['SECTION_ID'];
		// определение типа строки (раздел, товар или торговое предложение) на основе форматирования
		$RowType = $this->GetRowType($RowIndex); // SECTION || ELEMENT || OFFER
		$SectionDepth = 0;
		if($RowType=='ELEMENT' || $RowType=='OFFER' || preg_match('#^SECTION_(\d+)$#i',$RowType,$M)) {
			if(is_array($M) && $M[1]>0) {
				$RowType = 'SECTION';
				$SectionDepth = $M[1];
			}
		} else {
			$arError['TEXT'] = GetMessage('WDI_EXCEL_ERROR_ROW_IS_NOT_DETERMINED',array('#ROW_INDEX#'=>$RowIndex));
			return false;
		}
		// составление массивов полей и свойств для загрузки
		$arMatches = $arMatches[$RowType];
		$arAdditionalParams = array(
			'OBJECT_TYPE' => $RowType,
			'IBLOCK_ID' => $IBlockID,
			'ROW_INDEX' => $RowIndex,
			'SECTION_DEPTH' => $SectionDepth,
		);
		$arObject = $this->ProcessMatches($arMatches, array(), array($this,'ProcessMatchSingle'), $this->arFields, $arAdditionalParams, ($this->intSheetIndex+1).'_'.$RowIndex);
		//
		$ParentID = 0;
		// для режима "columns" загружаем указанные разделы
		if($arSheetParams['MODE']==self::MODE_COLUMNS){
			$ParentID = $this->ModeColumnsLoadSections($RowIndex, $arError, $SessionID);
		} elseif($arSheetParams['MODE']==self::MODE_FORMAT) {
			$ParentID = $this->GetParentID($RowType, $SectionDepth);
		} else {
			$ParentID = false;
		}
		//
		if($arSheetParams['MODE']==self::MODE_COLUMNS && $this->arFields['PARAMS']['LOAD_OFFERS']=='Y' && !empty($this->arFields['PARAMS']['S'][$this->intSheetIndex]['COLUMNS']['ELEMENT']['COLUMN'])){
			$ParentID = $this->ModeColumnsLoadParentProduct($RowIndex, $ParentID, $arError, $SessionID);
			$RowType = 'OFFER';
			$arAdditionalParams['OBJECT_TYPE'] = $RowType;
		}
		// составление фильтра
		$arFilter = $this->BuildFilter($arObject, $RowType, $arAdditionalParams);
		// сохранение в БД
		$ProfileID = $this->arFields['ID'];
		$ObjectID = $this->ReadObject($arObject, $RowType, $ParentID, $IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $arDebugData=array());
		$this->SetLastID($RowType, $SectionDepth, $ObjectID);
		// очищаем память
		unset($arParams, $arMatches, $arSheetParams, $IBlockID, $SectionID, $arObject, $ParentID, $arFilter, $RowType);
		// возвращаем массив объекта
		return $ObjectID>0 ? true : false;
	}
	
	/**
	 *	Определение типа строки (раздел, товар или торговое предложение)
	 */
	private function GetRowType($RowIndex){
		$strType = false;
		$Mode = $this->arFields['PARAMS']['S'][$this->intSheetIndex]['MODE'];
		if(empty($Mode)){
			$Mode = self::MODE_FORMAT;
		}
		switch ($Mode) {
			case self::MODE_FORMAT:
				$arFormatConditions = $this->arFields['PARAMS']['S'][$this->intSheetIndex]['FORMAT'];
				if(is_array($arFormatConditions)) {
					$arFormatConditions = array_reverse($arFormatConditions, true);
					foreach($arFormatConditions as $RowType => $arFormat){
						if(preg_match('#^COLUMN_(\d+)$#i',$arFormat['COLUMN'],$M) && ($RowType=='ELEMENT' || $RowType=='OFFER' || preg_match('#^SECTION_(\d+)$#i',$RowType))){ // $RowType=='ELEMENT' || $RowType=='OFFER' || preg_match('#^(SECTION_(\d+)$#i')
							$ColIndex = $M[1];
							$arCellValueHtml = $this->ReadCell($RowIndex,$ColIndex,'RICH_TEXT');
							$BgColor = $this->GetCellBackgroundColor($RowIndex,$ColIndex);
							$bMatches = $this->IsFormatMathes($arCellValueHtml, $arFormat, $BgColor, $RowIndex, $RowType);
							if($bMatches){
								$strType = $RowType;
							}
						}
					}
				}
				unset($arFormatConditions,$arFormat,$arCellValueHtml,$BgColor,$ColIndex,$bMatches,$RowType);
				break;
			case self::MODE_COLUMNS:
				if($this->arFields['PARAMS']['LOAD_OFFERS']=='Y' && !empty($this->arFields['PARAMS']['S'][$this->intSheetIndex]['COLUMNS']['ELEMENT']['COLUMN'])){
					$strType = 'OFFER';
				} else {
					$strType = 'ELEMENT';
				}
				break;
			case self::MODE_SIMPLE:
				$strType = 'ELEMENT';
				break;
		}
		unset($Mode, $arFormatConditions);
		return $strType;
	}
	
	/**
	 *	Проверка, что настройки проверки условий форматирования удовлетворяют существующему форматированию данной ячейки
	 */
	private function IsFormatMathes($arHtmlElements, $arFormatTest, $BgColor, $RowIndex, $Type){
		if(is_array($arHtmlElements) && is_array($arFormatTest)) {
			$arFormatReal = array(
				'BG_COLOR' => $BgColor,
				'FONT_FAMILY' => array(),
				'FONT_SIZE' => array(),
				'FONT_COLOR' => array(),
				'BOLD' => false,
				'ITALIC' => false,
				'UNDERLINE' => false,
				'STRIKE' => false,
			);
			if(empty($arHtmlElements)) {
				$arHtmlElements = array(array(
					'TEXT' =>  '',
					'FONT' => '',
					'SIZE' => '',
					'COLOR' => '',
					'B' => false,
					'I' => false,
					'U' => 'none',
					'S' => false,
				));
			}
			foreach($arHtmlElements as $arHTMLElement) {
				if(!empty($arHTMLElement['TEXT'])) {
					$arFormatReal['FONT_FAMILY'][ToUpper($arHTMLElement['FONT'])] = 'Y';
					$arFormatReal['FONT_SIZE'][$arHTMLElement['SIZE']] = 'Y';
					$arFormatReal['FONT_COLOR'][$arHTMLElement['COLOR']] = 'Y';
					$arFormatReal['BOLD'] = $arHTMLElement['B'] ? true : $arFormatReal['BOLD'];
					$arFormatReal['ITALIC'] = $arHTMLElement['I'] ? true : $arFormatReal['ITALIC'];
					$arFormatReal['UNDERLINE'] = $arHTMLElement['U']=='single' ? true : $arFormatReal['UNDERLINE'];
					$arFormatReal['STRIKE'] = $arHTMLElement['S'] ? true : $arFormatReal['STRIKE'];
				}
			}
			$arFormatReal['FONT_FAMILY'] = array_keys($arFormatReal['FONT_FAMILY']);
			$arFormatReal['FONT_SIZE'] = array_keys($arFormatReal['FONT_SIZE']);
			$arFormatReal['FONT_COLOR'] = array_keys($arFormatReal['FONT_COLOR']);
			//
			$bBgColor = $arFormatReal['BG_COLOR']=='#000000' && (empty($arFormatTest['BG_COLOR']) || $arFormatTest['BG_COLOR']=='#000') || $arFormatReal['BG_COLOR']==$arFormatTest['BG_COLOR'];
			$bFontFamily = empty($arFormatReal['FONT_FAMILY']) || in_array(ToUpper(trim($arFormatTest['FONT_FAMILY'])),$arFormatReal['FONT_FAMILY']);
			$bFontSize = empty($arFormatReal['FONT_SIZE']) || in_array($arFormatTest['FONT_SIZE'],$arFormatReal['FONT_SIZE']);
			$bFontColor = empty($arFormatReal['FONT_COLOR']) || in_array($arFormatTest['FONT_COLOR'],$arFormatReal['FONT_COLOR']);
			$bBold = $arFormatTest['BOLD']!='Y' || $arFormatTest['BOLD']=='Y' && $arFormatReal['BOLD']===true;
			$bItalic = $arFormatTest['ITALIC']!='Y' || $arFormatTest['ITALIC']=='Y' && $arFormatReal['ITALIC']===true;
			$bUnderline = $arFormatTest['UNDERLINE']!='Y' || $arFormatTest['UNDERLINE']=='Y' && $arFormatReal['UNDERLINE']===true;
			$bStrike = $arFormatTest['STRIKE']!='Y' || $arFormatTest['STRIKE']=='Y' && $arFormatReal['STRIKE']===true;
			//
			$bResult = $bBgColor && $bFontFamily && $bFontSize && $bFontColor && $bBold && $bItalic && $bUnderline && $bStrike;
			//
			unset($arFormatReal,$arHtmlElements,$arHTMLElement,$bBgColor,$bFontFamily,$bFontSize,$bFontColor,$bBold,$bItalic,$bUnderline,$bStrike);
			//
			if($bResult){
				return true;
			}
		}
		return false;
	}
	
	/**
	 *	Получение типа для сохранения
	 */
	private function GetObjectKey($RowType, $SectionDepth){
		return $RowType=='SECTION' ? $RowType.'_'.$SectionDepth : $RowType;
	}
	
	/**
	 *	Определение родителя
	 */
	private function GetParentID($RowType, $SectionDepth){
		if(!is_array($this->arLevels)){
			$this->arLevels = array();
		}
		switch($RowType) {
			case 'SECTION':
				if($SectionDepth>1) {
					return $this->arLevels[$this->GetObjectKey($RowType, $SectionDepth-1)];
				}
				break;
			case 'ELEMENT':
				return $this->arLevels['LAST_SECTION'];
				break;
			case 'OFFER':
				return $this->arLevels['ELEMENT'];
				break;
		}
		return 0;
	}
	
	/**
	 *	Сохранение последнего ID для разбора дерева разделов и товаров
	 */
	private function SetLastID($RowType, $SectionDepth, $ObjectID){
		if(!is_array($this->arLevels)){
			$this->arLevels = array();
		}
		$Key = $this->GetObjectKey($RowType, $SectionDepth);
		$this->arLevels[$Key] = $ObjectID;
		if($RowType=='SECTION') {
			$this->arLevels['LAST_SECTION'] = $ObjectID;
		}
	}
	
	/**
	 *	Получение массива для фильтрации разделов, товаров и торговых предложений (массив сохраняется в поле FILTER базы данных)
	 */
	private function BuildFilter($arObject, $RowType, $arAdditionalParams){
		$arFilter = array();
		$arParams = $this->arFields['PARAMS']['S'][$this->intSheetIndex];
		$arParams['LINK'][$RowType]['FIELD'] = ToUpper($arParams['LINK'][$RowType]['FIELD']);
		switch($arParams['LINK'][$RowType]['FIELD']){
			case 'OTHER':
				$arParams['LINK'][$RowType]['OTHER'] = ToUpper($arParams['LINK'][$RowType]['OTHER']);
				$Value = $this->GetLinkFilterValue($arObject,$arParams['LINK'][$RowType]['OTHER'],$RowType,$arAdditionalParams);
				if($Value!==false) {
					$arFilter[$arParams['LINK'][$RowType]['OTHER']] = $Value;
				}
				break;
			case 'HANDLER':
				$arFilterEvent = call_user_func_array($arParams['LINK'][$RowType]['HANDLER'],array($this, $arObject, $RowType, $arParams, $arAdditionalParams));
				if(is_array($arFilterEvent) && !empty($arFilterEvent)) {
					$arFilter = $arFilterEvent;
				}
				break;
			default:
				$Value = $this->GetLinkFilterValue($arObject,$arParams['LINK'][$RowType]['FIELD'],$RowType,$arAdditionalParams);
				if($Value!==false) {
					$arFilter[$arParams['LINK'][$RowType]['FIELD']] = $Value;
				}
				break;
		}
		$arFilterTmp = array();
		foreach($arFilter as $Key => $Value){
			$arFilterTmp['='.$Key] = $Value;
		}
		$arFilter = $arFilterTmp;
		unset($arParams,$Value,$arFilterTmp);
		return $arFilter;
	}
	
	/**
	 *	Для привязок разделов, товаров и предложений определяем значение привязки (напр., если привязка по свойству ARTICUL, то определяем сам артикул)
	 */
	private function GetLinkFilterValue($arObject, $Field, $RowType, $arAdditionalParams){
		$Value = false;
		if(!empty($arObject[$Field])) {
			return $arObject[$Field];
		}
		if($RowType=='ELEMENT' && preg_match('#^PROPERTY_([A-z0-9\-_]+)$#i',$Field,$M)){
			$PropertyCode = $M[1];
			if(is_numeric($PropertyCode) && !empty($arObject['PROPERTY_'.$PropertyCode])) {
				return $arObject['PROPERTY_'.$PropertyCode];
			} else {
				$resProp = CIBlockProperty::GetList(array(),array('IBLOCK_ID'=>$arAdditionalParams['IBLOCK_ID'],'CODE'=>$PropertyCode));
				if($arProp = $resProp->GetNext(false,false)) {
					if(!empty($arObject['PROPERTY_'.$arProp['ID']])) {
						unset($resProp);
						return $arObject['PROPERTY_'.$arProp['ID']];
					}
				}
			}
		}
		return $Value; // ToDo!!!!
	}
	
	/**
	 *	Для режима "columns" загружаем указанные разделы
	 */
	private function ModeColumnsLoadSections($RowIndex, &$arError, $SessionID){
		$arParams = $this->arFields['PARAMS'];
		$arMatches = $this->arFields['MATCHES']['S'][$this->intSheetIndex];
		$arSheetParams = $arParams['S'][$this->intSheetIndex];
		$IBlockID = $arParams['S'][$this->intSheetIndex]['IBLOCK_ID'];
		$SectionID = $arParams['S'][$this->intSheetIndex]['SECTION_ID'];
		$ProfileID = $this->arFields['ID'];
		$ParentID = 0;
		//
		$SectionsDepth = $arSheetParams['SECTIONS_DEPTH'];
		for($Level=1; $Level<=$SectionsDepth; $Level++){
			$ColumnName = $arSheetParams['COLUMNS']['SECTION_'.$Level]['COLUMN'];
			if(preg_match('#^COLUMN_(\d+)$#i',$ColumnName,$M)){
				$ColumnIndex = $M[1];
				$SectionName = $this->ReadCell($RowIndex,$ColumnIndex,'TEXT');
				$arObject = array(
					'NAME' => array(
						'RAW' => $SectionName,
						'MATCH' => array(
							'TYPE' => 'S',
							'MULTIPLE' => 'N',
							'IBLOCK_ID' => $IBlockID,
							'SOURCE' => $ColumnName,
							'PARAMS' => array(),
						),
						'PARAMS' => array(
							'OBJECT_TYPE' => 'SECTION',
							'IBLOCK_ID' => $IBlockID,
							'ROW_INDEX' => $RowIndex,
							'SECTION_DEPTH' => $Level,
							'COL_INDEX' => $ColumnIndex,
						),
					),
				);
				$arAdditionalParams = array(
					'OBJECT_TYPE' => 'SECTION',
					'IBLOCK_ID' => $IBlockID,
					'ROW_INDEX' => $RowIndex,
					'SECTION_DEPTH' => $SectionsDepth,
				);
				$arFilter = $arObject;
				foreach($arFilter as $Key => $arValue){
					$arFilter['='.$Key] = $arValue;
					unset($arFilter[$Key]);
				}
				$arObject['_EXTERNAL_ID'] = ($this->intSheetIndex+1).'_'.$RowIndex.'_'.$Level;
				$ParentID = $this->ReadObject($arObject, 'SECTION', $ParentID, $IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $arDebugData=array());
				if(!is_numeric($ParentID)){
					break;
				}
			}
		}
		unset($arParams,$arMatches,$arSheetParams,$IBlockID,$SectionID,$ProfileID,$ColumnName,$ColumnIndex,$SectionName,$Level,$arObject,$arFilter,$arAdditionalParams);
		return $ParentID;
	}
	
	/**
	 *	Для режима "columns" загружаем родительский товар для ТП
	 */
	private function ModeColumnsLoadParentProduct($RowIndex, $ParentID, &$arError, $SessionID){
		$arParams = $this->arFields['PARAMS'];
		$arMatches = $this->arFields['MATCHES']['S'][$this->intSheetIndex];
		$arSheetParams = $arParams['S'][$this->intSheetIndex];
		$IBlockID = $arParams['S'][$this->intSheetIndex]['IBLOCK_ID'];
		$SectionID = $arParams['S'][$this->intSheetIndex]['SECTION_ID'];
		$ProfileID = $this->arFields['ID'];
		//
		$ColumnName = $arSheetParams['COLUMNS']['ELEMENT']['COLUMN'];
		if(preg_match('#^COLUMN_(\d+)$#i',$ColumnName,$M)){
			$ColumnIndex = $M[1];
			$ElementName = $this->ReadCell($RowIndex,$ColumnIndex,'TEXT');
			$arObject = array(
				'NAME' => array(
					'RAW' => $ElementName,
					'MATCH' => array(
						'TYPE' => 'S',
						'MULTIPLE' => 'N',
						'IBLOCK_ID' => $IBlockID,
						'SOURCE' => $ColumnName,
						'PARAMS' => array(),
					),
					'PARAMS' => array(
						'OBJECT_TYPE' => 'ELEMENT',
						'IBLOCK_ID' => $IBlockID,
						'ROW_INDEX' => $RowIndex,
						'COL_INDEX' => $ColumnIndex,
					),
				),
			);
			$arAdditionalParams = array(
				'OBJECT_TYPE' => 'ELEMENT',
				'IBLOCK_ID' => $IBlockID,
				'ROW_INDEX' => $RowIndex,
			);
			$arFilter = $arObject;
			foreach($arFilter as $Key => $arValue){
				$arFilter['='.$Key] = $arValue;
				unset($arFilter[$Key]);
			}
			$arObject['_EXTERNAL_ID'] = ($this->intSheetIndex+1).'_'.$RowIndex.'_'.$ColumnIndex;
			$ParentID = $this->ReadObject($arObject, 'ELEMENT', $ParentID, $IBlockID, $SectionID, $SessionID, $ProfileID, $arFilter, $arDebugData=array());
			if(!is_numeric($ParentID)){
				return false;
			}
		}
		unset($arParams,$arMatches,$arSheetParams,$IBlockID,$SectionID,$ProfileID,$ColumnName,$ColumnIndex,$SectionName,$arObject,$arFilter,$arAdditionalParams);
		return $ParentID;
	}

}
?>