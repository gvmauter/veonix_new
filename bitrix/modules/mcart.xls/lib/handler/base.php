<?php

namespace Mcart\Xls\Handler;

use Bitrix\Main\DB\SqlExpression;
use Bitrix\Main\Entity\EntityError;
use Bitrix\Main\Entity\Field;
use Bitrix\Main\Entity\IValidator;
use Bitrix\Main\Entity\ScalarField;
use Bitrix\Main\Localization\Loc;
use Exception;
use Mcart\Xls\ORM\Profile\Column\CustomFieldsTable;
use Mcart\Xls\Spreadsheet\Import;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

Loc::loadMessages(__FILE__);

abstract class Base {

    protected $locPref = 'MCART_XLS_HANDLER_';
    protected $codeToUpper;
    protected $locKey;

	/** @var Field[] */
    protected $fields = [];

    public function __construct() {}

    /**
     *
     * @return Base
     */
    public static function getInstance() {
        static $arInstances = [];
        if ($arInstances[static::getCode()] === null) {
            $class = static::class;
            $arInstances[static::getCode()] = new $class();
            $arInstances[static::getCode()]->init();
        }
        return $arInstances[static::getCode()];
    }

    private function init() {
        $this->codeToUpper = strtoupper(static::getCode());
        $this->locKey = $this->locPref.$this->codeToUpper;
        foreach ($this->getCustomFieldsMap() as $field) {
            /** @var $field Field */
            $this->fields[$field->getName()] = $field;
        }
    }

    /**
     * @return string
     */
    abstract public static function getCode();

    /**
     * @return string
     */
    public function getTitle(){
        return Loc::getMessage($this->locKey);
    }

    /**
	 * Returns entity map definition.
	 * To get initialized fields @see \Bitrix\Main\Entity\Base::getFields() and \Bitrix\Main\Entity\Base::getField()
     *
     * @return array
     */
    protected function getCustomFieldsMap() {
        return [];
    }

	public function getCustomFields() {
		return $this->fields;
	}

    public function getCustomField($code) {
        return $this->fields[(string)filter_var($code)];
    }

    public function saveCustomFields(int $profileColumnId, array $arValues){
        if($profileColumnId <= 0 || !is_array($arValues)){
            return;
        }
        $arValues = $this->checkFields($profileColumnId, $arValues);
        $arNames = [];
        foreach ($arValues as $k => $ar) {
            $ar['NAME'] = trim((string)filter_var($ar['NAME']));
            if (empty($ar['NAME'])) {
                unset($arValues[$k]);
                continue;
            }
            $ar['VALUE'] = trim((string)filter_var($ar['VALUE']));
            if (empty($ar['VALUE'])) {
                continue;
            }
            $arNames[] = $ar['NAME'];
            $arFields = [
                'COLUMN_ID' => $profileColumnId,
                'HANDLER' => $this->getCode(),
                'NAME' => $ar['NAME'],
                'VALUE' => $ar['VALUE'],
            ];
            if ($ar['ID'] > 0) {
                $result = CustomFieldsTable::update($ar['ID'], $arFields);
            }else{
                $result = CustomFieldsTable::add($arFields);
            }
            if (!$result->isSuccess()) {
                throw new Exception ('<pre>'.print_r($result->getErrorMessages(), true).'<pre>');
            }
        }
        $ob = CustomFieldsTable::getList([
            'filter' => ['=COLUMN_ID' => $profileColumnId, '=HANDLER' => $this->getCode(), '!@NAME' => $arNames]
        ]);
        while ($arCustomField = $ob->fetch()) {
            CustomFieldsTable::delete($arCustomField['ID']);
        }
    }

    /**
     * @param Import $obImport
     * @param Cell $obCell
     * @param array $arCell
     * @param array $arItem
     * @return array
     */
    abstract function importCell(Import $obImport, Cell $obCell, array $arCell, array $arItem);

	private function checkFields(int $profileColumnId, array $arValues) {
        $data = [];
        foreach ($arValues as $ar) {
            $fieldName = (string)filter_var($ar['NAME']);
            if (empty($fieldName)) {
                continue;
            }
            $data[$fieldName] = (string)filter_var($ar['VALUE']);
        }
        $arValues = [];
        foreach ($this->getCustomFieldsMap() as $field) {
            if (!($field instanceof ScalarField)) {
                continue;
            }
            $fieldName = $field->getName();
            if (empty($fieldName)) {
                continue;
            }
            $v = $data[$fieldName];
            if ($field->isRequired() && ($v===null || $field->isValueEmpty($v))) {
                throw new Exception(Loc::getMessage("MAIN_ENTITY_FIELD_REQUIRED", ["#FIELD#" => $field->getTitle()]));
            }
            $arCustomField = CustomFieldsTable::getList([
                'filter' => ['=COLUMN_ID' => $profileColumnId, '=HANDLER' => $this->getCode(), '=NAME' => $fieldName]
            ])->fetch();
            $arValues[$fieldName] = [
                'ID' => $arCustomField['ID'],
                'NAME' => $fieldName,
                'VALUE' => $this->validateValue($v, $arCustomField['ID'], $data, $field)
            ];
        }
        return $arValues;
    }

	private function validateValue($value, $primary, $row, $field) {
        if ($value instanceof SqlExpression) {
            return '';
        }
        $validators = $field->getValidators();
        foreach ($validators as $validator) {
            if ($validator instanceof IValidator) {
                $vResult = $validator->validate($value, $primary, $row, $field);
            } else {
                $vResult = call_user_func_array($validator, [$value, $primary, $row, $field]);
            }
            if ($vResult === true) {
                continue;
            }
            if ($vResult instanceof EntityError) {
                throw new Exception($vResult->getMessage());
            } else {
                throw new Exception($vResult);
            }
        }
        return $value;
    }

}
