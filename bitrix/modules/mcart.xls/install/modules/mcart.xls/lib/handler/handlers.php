<?php

namespace Mcart\Xls\Handler;

use Bitrix\Main\Localization\Loc;
use Mcart\Xls\Spreadsheet\Import;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

Loc::loadMessages(__FILE__);

final class Handlers {
    private static $arHandlerCodes = [
        'Url',
        'Date',
        'DateTime',
        'Picture',
    ];
    private static $arHandlerValues;

    private static function initStatic(){
		if(is_array(static::$arHandlerValues)){
			return;
		}
		static::$arHandlerValues = [];
		foreach (static::$arHandlerCodes as $handlerCode) {
			$handlerClass = '\Mcart\Xls\Handler\\'.$handlerCode.'\Handler';
            /** @var Base $obHandler */
            $obHandler = $handlerClass::getInstance();
            $code = $handlerClass::getCode();
			$title = $obHandler->getTitle();
			static::$arHandlerValues[$title] = $code;
		}
		ksort(static::$arHandlerValues);
    }

    public static function getHandlerValues() {
        static::initStatic();
        return static::$arHandlerValues;
    }

    public static function getHandlerInstance($handlerCode) {
        static::initStatic();
        $code = (string)filter_var($handlerCode);
        if(!in_array($code, static::$arHandlerCodes)){
            return false;
        }
        $handlerClass = 'Mcart\Xls\Handler\\'.$code.'\Handler';
        return $handlerClass::getInstance();
    }

    public static function importCell(Import $obImport, Cell $obCell, array $arCell, array $arItem) {
        $handlerCode = filter_var(
            $arItem['HANDLER'],
            FILTER_VALIDATE_REGEXP,
            ['options' => ['regexp' => '/^[A-Z][0-9A-z]*$/']]
        );
		if (empty($handlerCode)) {
			return $arCell;
		}
		static::initStatic();
		if(!in_array($handlerCode, static::$arHandlerCodes)){
            return $arCell;
		}
		$handlerClass = 'Mcart\Xls\Handler\\'.$handlerCode.'\Handler';
        $obHandler = $handlerClass::getInstance();
		return $obHandler->importCell($obImport, $obCell, $arCell, $arItem);
    }

}
