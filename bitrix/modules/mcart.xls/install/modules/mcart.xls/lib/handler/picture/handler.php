<?php

namespace Mcart\Xls\Handler\Picture;

use Bitrix\Main\Localization\Loc;
use Mcart\Xls\Handler\Base;
use Mcart\Xls\Spreadsheet\Import;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

Loc::loadMessages(__FILE__);

class Handler extends Base{

    /**
     * @return string
     */
    public static function getCode(){
        return 'Picture';
    }

    public function importCell(Import $obImport, Cell $obCell, array $arCell, array $arItem){
        if(!$obImport->pictureMakeFileArray($arCell['coordinate'])){
            $arCell['value'] = $arCell['value_format'] = '';
            return $arCell;
        }
        $arPictures = $obImport->getPictures();
        $arCell['value_format'] = $arPictures[$arCell['coordinate']]['arFile'];
        return $arCell;
    }

}
