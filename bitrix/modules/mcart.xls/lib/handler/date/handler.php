<?php

namespace Mcart\Xls\Handler\Date;

use Bitrix\Main\Localization\Loc;
use Mcart\Xls\Handler\Base;
use Mcart\Xls\Spreadsheet\Import;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use function ConvertTimeStamp;

Loc::loadMessages(__FILE__);

class Handler extends Base{

    /**
     * @return string
     */
    public static function getCode(){
        return 'Date';
    }

    public function importCell(Import $obImport, Cell $obCell, array $arCell, array $arItem){
        $arCell['isDateTime'] = Date::isDateTime($obCell);
        if ($arCell['isDateTime']) {
            $arCell['timestamp'] = Date::excelToTimestamp($arCell['value']);
            $arCell['value_format'] = ConvertTimeStamp($arCell['timestamp'], 'SHORT');
        }
        return $arCell;
    }

}
