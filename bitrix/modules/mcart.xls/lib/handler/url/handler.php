<?php

namespace Mcart\Xls\Handler\Url;

use Bitrix\Main\Entity;
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
        return 'Url';
    }

    protected function getCustomFieldsMap() {
        global $USER;
        $ar = [];
        /*if(!$USER->IsAdmin()){
            return $ar;
        }
        $ar[] = new Entity\StringField(($code = 'TEST_REQUIRED'), [
                'required' => true,
                'title' => Loc::getMessage($this->locKey.'__'.$code)
            ]);
        $ar[] = new Entity\StringField(($code = 'TEST'), [
                'required' => false,
                'title' => Loc::getMessage($this->locKey.'__'.$code)
            ]);
        $ar[] = new Entity\EnumField(($code = 'TEST_LIST_REQUIRED'), [
                'required' => true,
                'title' => Loc::getMessage($this->locKey.'__'.$code),
                'values' => [
                    'k1' => 'v1',
                    'k2' => 'v2',
                    'k3' => 'v3',
                ],
            ]);
        $ar[] = new Entity\EnumField(($code = 'TEST_LIST'), [
                'required' => false,
                'title' => Loc::getMessage($this->locKey.'__'.$code),
                'values' => [
                    'k1' => 'v1',
                    'k2' => 'v2',
                    'k3' => 'v3',
                ],
            ]);*/
        return $ar;
    }

    public function importCell(Import $obImport, Cell $obCell, array $arCell, array $arItem){
        $arCell['isHyperlink'] = $obCell->hasHyperlink();
        if ($arCell['isHyperlink']) {
            $arCell['value_format'] = $obCell->getHyperlink()->getUrl();
        }
        return $arCell;
    }

}
