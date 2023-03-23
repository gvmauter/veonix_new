<?php

namespace Acrit\Import;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

include 'Autoloader.php';

//\Bitrix\Main\Loader::registerAutoLoadClasses(null, array(
//    '\PhpOffice\PhpSpreadsheet\Spreadsheet' => '/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php',
//    '\PhpOffice\PhpSpreadsheet\ReferenceHelper' => '/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/ReferenceHelper.php',
//    '\PhpOffice\PhpSpreadsheet\Reader\Xlsx' => '/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx.php',
//    '\PhpOffice\PhpSpreadsheet\Reader\DefaultReadFilter' => '/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/DefaultReadFilter.php',
//    '\PhpOffice\PhpSpreadsheet\Reader\IReader' => '/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/IReader.php',
//    '\PhpOffice\PhpSpreadsheet\Reader\IReadFilter' => '/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/IReadFilter.php',
//    '\PhpOffice\PhpSpreadsheet\Reader\BaseReader' => '/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/BaseReader.php',
//));

//require_once $_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php';

class XlsxStepReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
	private $need_row_start;
	private $need_row_end;
    public function __construct($row_start, $row_end)
    {
        $this->need_row_start = $row_start;
        $this->need_row_end = $row_end;
    }
    public function readCell($column, $row, $worksheetName = '') {
        if ($row >= $this->need_row_start && $row <= $this->need_row_end) {
            return true;
        }
        return false;
    }
}


class ImportXlsx extends Import
{
    private $source_addr;
    private $colnums;
    private $rowcount;
    private $field_delimiter;

    private function setDefaults() {
        if (!$this->field_delimiter) {
            $this->field_delimiter = '|';
        }
    }

    public function setSource() {
        parent::setSource();
        $this->source_addr = $this->arProfile['SOURCE'];
    }

    public function setFieldDelimiter($value) {
        if ($value) {
            $this->field_delimiter = $value;
        }
    }

    public function fields() {
        $arRows = $this->get(self::STEP_BY_COUNT, 1);
        if (!empty($arRows)) {
            foreach ($arRows as $i => $value) {
                if ($value) {
                    $arSourceFields[$i] = array(
                        'ID' => $i,
                        'NAME' => $value,
                        'EXAMPLE' => $value,
                    );
                }
            }
        }
        return $arSourceFields;
    }

    public function count() {
        $this->setDefaults();
        $param_row_start = (int)$this->arProfile['SOURCE_PARAM_1'];
        $param_row_start = $param_row_start > 0 ? $param_row_start : 1;
        $param_has_titles = $this->arProfile['SOURCE_PARAM_3'] != 'N' ? true : false;
        if ($param_has_titles) {
            $param_row_start++;
        }
        $reader = new Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($this->source_addr);
        $cells = $spreadsheet->getActiveSheet()->getCellCollection();
        $this->rowcount = $cells->getHighestRow() - $param_row_start;
        return $this->rowcount;
    }

    public function get($type=self::STEP_NO, $limit=0, $next_item=0) {
        $row_start = (int)$this->arProfile['SOURCE_PARAM_1'];
        $row_start = $row_start > 0 ? $row_start : 1;
        $reader = new Xlsx();
        $reader->setReadDataOnly(true);
        $filter =  new XlsxStepReadFilter($row_start, $row_start);
        $reader->setReadFilter($filter);
        $spreadsheet = $reader->load($this->source_addr);
        $cells = $spreadsheet->getActiveSheet()->getCellCollection();
        $arRow = array();
        for ($row = $row_start; $row <= $cells->getHighestRow(); $row++) {
            for ($col = 'A'; $col <= $cells->getHighestColumn(); $col++) {
                if ($cells->get($col . $row)) {
                    $arRow[] = $cells->get($col . $row)->getCalculatedValue();
                }
                else {
                    $arRow[] = '';
                }
            }
        }
        return $arRow;
    }

    public function import($type=self::STEP_NO, $limit=0, $next_item=0) {
        $item_start = 0;
        $item_end = 0;
        $this->setDefaults();
        $this->setFieldDelimiter($this->arProfile['SOURCE_PARAM_2']);
        $param_has_titles = $this->arProfile['SOURCE_PARAM_3'] != 'N' ? true : false;
        $param_row_start = (int)$this->arProfile['SOURCE_PARAM_1'];
        $param_row_start = $param_row_start > 0 ? $param_row_start - 1 : 0;
        if ($param_has_titles) {
            $param_row_start++;
        }
        if ($type == self::STEP_BY_COUNT) {
            $item_start = $next_item;
            $item_end = $next_item + $limit - 1;
        }
        elseif ($type == self::STEP_BY_TYME) {
	        $item_start = $next_item;
	        $step_time = $limit;
	        $start_time = time();
        }
        if ($this->source_addr) {
            $reader = new Xlsx();
            $reader->setReadDataOnly(true);
            //$filter = new XlsxStepReadFilter($item_start + 1, $item_end + 1);
            //$reader->setReadFilter($filter);
            $spreadsheet = $reader->load($this->source_addr);
            $cells = $spreadsheet->getActiveSheet()->getCellCollection();
            $this->rowcount = $cells->getHighestRow();
            $i = $next_item;
            while ($i <= $this->rowcount - 1) {
	            if (($type == self::STEP_BY_COUNT || $type == self::STEP_BY_TYME) && $i < $item_start && $i < $param_row_start) {
		            $i++;
		            continue;
	            }
	            if ($type == self::STEP_BY_COUNT) {
		            if ($i > $item_end) {
			            break;
		            }
	            }
	            elseif ($type == self::STEP_BY_TYME) {
		            $exec_time = time() - $start_time;
		            if ($step_time && $exec_time > $step_time) {
			            $item_end = $i;
			            break;
		            }
	            }
                $arRow = [];
                //$filter = new MyReadFilter($i+1);
                //$reader->setReadFilter($filter);
                //$spreadsheet = $reader->load($this->source_addr);
                //$cells = $spreadsheet->getActiveSheet()->getCellCollection();
                for ($col = 'A'; $col <= $cells->getHighestColumn(); $col++) {
                    if ($cells->get($col . ($i+1))) {
                        $value = $cells->get($col . ($i+1))->getCalculatedValue();
                        $value = $value == '#VALUE!' ? '' : $value;
                        if ($this->field_delimiter && strpos($value, $this->field_delimiter) !== false) {
                            $value = explode($this->field_delimiter, $value);
                        }
                        $arRow[] = $value;
                        //echo $col . ($i+1).':'.$spreadsheet->getActiveSheet()->getCell($col . ($i+1))->getValue().'<br>';
                    }
                    else {
                        $arRow[] = '';
                    }
                }
                $this->saveIBData($arRow, $i);
                $i++;
            }
        }
        return ($item_end + 1);
    }

    public function fieldsPreParams() {
        $arFieldsParams = array(
            'title' => GetMessage("ACRIT_IMPORT_XLSX_PARAMS_TITLE"),
        );
        $arFieldsParams['fields']['section'] = array(
            'DB_FIELD' => 'PARAM_1',
            'TYPE' => 'number',
            'DEFAULT' => '1',
            'LABEL' => GetMessage("ACRIT_IMPORT_XLSX_PARAM_1"),
            'PLACEHOLDER' => GetMessage("ACRIT_IMPORT_XLSX_PARAM_1_LABEL"),
            'HINT' => '',
        );
        $arFieldsParams['fields']['first_titles'] = array(
            'DB_FIELD' => 'PARAM_3',
            'TYPE' => 'boolean',
            'DEFAULT' => 'Y',
            'LABEL' => GetMessage("ACRIT_IMPORT_SOURCE_FIRST_TITLES_LABEL"),
            'PLACEHOLDER' => '',
            'HINT' => '',
        );
        $arFieldsParams['fields']['delimiter'] = array(
            'DB_FIELD' => 'PARAM_2',
            'TYPE' => 'string',
            'DEFAULT' => '|',
            'LABEL' => GetMessage('ACRIT_IMPORT_SOURCE_MULTIPLE_DELIMITER_LABEL'),
            'PLACEHOLDER' => '',
            'HINT' => '',
        );
        return $arFieldsParams;
    }

}
